<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\Doctor;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DoctorDashboardController extends Controller
{
    /**
     * menampilkan halaman dashboard dokter dengan list appointment
     */
    public function index()
    {
        // ambil data doctor dari user yang login
        $doctor = Doctor::where('user_id', Auth::id())->firstOrFail();
        
        // ambil semua appointment yang ditangani dokter ini
        $appointments = Appointment::where('doctor_id', $doctor->id)
            ->with(['pet', 'user', 'services'])
            ->orderBy('appointment_time', 'desc')
            ->paginate(10);
        
        // hitung statistik appointment berdasarkan status
        $stats = [
            'total_appointments' => Appointment::where('doctor_id', $doctor->id)->count(),
            'pending' => Appointment::where('doctor_id', $doctor->id)->where('status', 'pending')->count(),
            'confirmed' => Appointment::where('doctor_id', $doctor->id)->where('status', 'confirmed')->count(),
            'completed' => Appointment::where('doctor_id', $doctor->id)->where('status', 'completed')->count(),
        ];
        
        return view('doctor.dashboard', compact('appointments', 'stats', 'doctor'));
    }
    
    /**
     * menampilkan detail appointment untuk dokter
     */
    public function showAppointment(Appointment $appointment)
    {
        // ambil data doctor dari user yang login
        $doctor = Doctor::where('user_id', Auth::id())->firstOrFail();
        
        // verifikasi bahwa appointment ini ditangani oleh dokter ini
        if ($appointment->doctor_id !== $doctor->id) {
            abort(403, 'Anda tidak memiliki akses ke janji temu ini.');
        }
        
        // load relasi untuk tampilan detail
        $appointment->load(['pet', 'user', 'services']);
        $availableServices = Service::all();
        
        return view('doctor.appointment-detail', compact('appointment', 'availableServices'));
    }
    
    /**
     * menambahkan service tambahan ke appointment saat pemeriksaan
     * service ini ditandai sebagai added_by_doctor
     */
    public function addService(Request $request, Appointment $appointment)
    {
        // ambil data doctor dari user yang login
        $doctor = Doctor::where('user_id', Auth::id())->firstOrFail();
        
        // verifikasi bahwa appointment ini ditangani oleh dokter ini
        if ($appointment->doctor_id !== $doctor->id) {
            abort(403);
        }
        
        // validasi input service yang akan ditambah
        $validated = $request->validate([
            'service_ids' => ['required', 'array', 'min:1'],
            'service_ids.*' => ['exists:services,id'],
        ], [
            'service_ids.required' => 'Pilih minimal satu layanan untuk ditambahkan.',
            'service_ids.min' => 'Pilih minimal satu layanan untuk ditambahkan.',
        ]);
        
        // attach service dengan flag added_by_doctor = true
        foreach ($validated['service_ids'] as $serviceId) {
            // cek apakah service sudah ada, kalau belum baru ditambahkan
            if (!$appointment->services->contains($serviceId)) {
                $appointment->services()->attach($serviceId, ['added_by_doctor' => true]);
            }
        }
        
        return back()->with('success', 'Layanan berhasil ditambahkan ke janji temu.');
    }
    
    /**
     * menyimpan catatan dokter untuk appointment
     */
    public function updateNotes(Request $request, Appointment $appointment)
    {
        // ambil data doctor dari user yang login
        $doctor = Doctor::where('user_id', Auth::id())->firstOrFail();
        
        // verifikasi bahwa appointment ini ditangani oleh dokter ini
        if ($appointment->doctor_id !== $doctor->id) {
            abort(403);
        }
        
        // validasi input catatan dokter
        $validated = $request->validate([
            'doctor_notes' => ['required', 'string', 'max:2000'],
        ], [
            'doctor_notes.required' => 'Catatan dokter tidak boleh kosong.',
            'doctor_notes.max' => 'Catatan dokter maksimal 2000 karakter.',
        ]);
        
        // simpan catatan dokter
        $appointment->update([
            'doctor_notes' => $validated['doctor_notes'],
        ]);
        
        return back()->with('success', 'Catatan dokter berhasil diperbarui.');
    }
    
    /**
     * menyelesaikan appointment dan otomatis membuat transaksi
     * transaksi dibuat berdasarkan semua service yang di-attach
     */
    public function completeAppointment(Appointment $appointment)
    {
        // ambil data doctor dari user yang login
        $doctor = Doctor::where('user_id', Auth::id())->firstOrFail();
        
        // verifikasi bahwa appointment ini ditangani oleh dokter ini
        if ($appointment->doctor_id !== $doctor->id) {
            abort(403);
        }
        
        // hanya appointment confirmed yang bisa diselesaikan
        if ($appointment->status !== 'confirmed') {
            return back()->withErrors(['error' => 'Hanya janji temu yang sudah dikonfirmasi yang bisa diselesaikan.']);
        }
        
        // gunakan database transaction untuk atomicity
        DB::transaction(function () use ($appointment) {
            // ubah status appointment menjadi completed
            $appointment->update(['status' => 'completed']);
            
            // load semua service untuk hitung total
            $appointment->load('services');
            
            // hitung total amount dari semua service
            $totalAmount = 0;
            $transactionDetails = [];
            
            foreach ($appointment->services as $service) {
                $totalAmount += $service->price;
                // siapkan data detail untuk setiap service
                $transactionDetails[] = [
                    'service_id' => $service->id,
                    'description' => $service->name,
                    'quantity' => 1,
                    'price_at_transaction' => $service->price,
                    'subtotal' => $service->price,
                ];
            }
            
            // generate invoice number dengan format INV-YYYYMMDD-00001
            $invoiceNumber = 'INV-' . date('Ymd') . '-' . str_pad($appointment->id, 5, '0', STR_PAD_LEFT);
            
            // buat record transaction dengan status unpaid
            $transaction = Transaction::create([
                'appointment_id' => $appointment->id,
                'invoice_number' => $invoiceNumber,
                'total_amount' => $totalAmount,
                'status' => 'unpaid',
                'transaction_date' => now(),
            ]);
            
            // buat transaction details untuk setiap service
            foreach ($transactionDetails as $detail) {
                $transaction->transactionDetails()->create($detail);
            }
        });
        
        return redirect()->route('doctor.dashboard')
            ->with('success', 'Janji temu berhasil diselesaikan dan transaksi telah dibuat.');
    }
    
    /**
     * konfirmasi appointment yang masih pending
     * mengubah status dari pending menjadi confirmed
     */
    public function confirmAppointment(Appointment $appointment)
    {
        // ambil data doctor dari user yang login
        $doctor = Doctor::where('user_id', Auth::id())->firstOrFail();
        
        // verifikasi bahwa appointment ini ditangani oleh dokter ini
        if ($appointment->doctor_id !== $doctor->id) {
            abort(403);
        }
        
        // hanya appointment pending yang bisa dikonfirmasi
        if ($appointment->status !== 'pending') {
            return back()->withErrors(['error' => 'Hanya janji temu yang menunggu yang bisa dikonfirmasi.']);
        }
        
        // ubah status menjadi confirmed
        $appointment->update(['status' => 'confirmed']);
        
        return back()->with('success', 'Janji temu berhasil dikonfirmasi.');
    }
}
