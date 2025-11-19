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
    public function index()
    {
        // ambil data doctor dari user yang login
        $doctor = Doctor::where('user_id', Auth::id())->firstOrFail();
        
        // ambil appointment yang berkaitan dengan dokter ini
        $appointments = Appointment::where('doctor_id', $doctor->id)
            ->with(['pet', 'user', 'services'])
            ->orderBy('appointment_time', 'desc')
            ->paginate(10);
        
        // statistik
        $stats = [
            'total_appointments' => Appointment::where('doctor_id', $doctor->id)->count(),
            'pending' => Appointment::where('doctor_id', $doctor->id)->where('status', 'pending')->count(),
            'confirmed' => Appointment::where('doctor_id', $doctor->id)->where('status', 'confirmed')->count(),
            'completed' => Appointment::where('doctor_id', $doctor->id)->where('status', 'completed')->count(),
        ];
        
        return view('doctor.dashboard', compact('appointments', 'stats', 'doctor'));
    }
    
    public function showAppointment(Appointment $appointment)
    {
        // verifikasi appointment milik dokter ini
        $doctor = Doctor::where('user_id', Auth::id())->firstOrFail();
        
        if ($appointment->doctor_id !== $doctor->id) {
            abort(403, 'Anda tidak memiliki akses ke janji temu ini.');
        }
        
        $appointment->load(['pet', 'user', 'services']);
        $availableServices = Service::all();
        
        return view('doctor.appointment-detail', compact('appointment', 'availableServices'));
    }
    
    public function addService(Request $request, Appointment $appointment)
    {
        // verifikasi appointment milik dokter ini
        $doctor = Doctor::where('user_id', Auth::id())->firstOrFail();
        
        if ($appointment->doctor_id !== $doctor->id) {
            abort(403);
        }
        
        $validated = $request->validate([
            'service_ids' => ['required', 'array', 'min:1'],
            'service_ids.*' => ['exists:services,id'],
        ], [
            'service_ids.required' => 'Pilih minimal satu layanan untuk ditambahkan.',
            'service_ids.min' => 'Pilih minimal satu layanan untuk ditambahkan.',
        ]);
        
        // tambahkan service dengan flag added_by_doctor = true
        foreach ($validated['service_ids'] as $serviceId) {
            // cek apakah service sudah ada
            if (!$appointment->services->contains($serviceId)) {
                $appointment->services()->attach($serviceId, ['added_by_doctor' => true]);
            }
        }
        
        return back()->with('success', 'Layanan berhasil ditambahkan ke janji temu.');
    }
    
    public function updateNotes(Request $request, Appointment $appointment)
    {
        // verifikasi appointment milik dokter ini
        $doctor = Doctor::where('user_id', Auth::id())->firstOrFail();
        
        if ($appointment->doctor_id !== $doctor->id) {
            abort(403);
        }
        
        $validated = $request->validate([
            'doctor_notes' => ['required', 'string', 'max:2000'],
        ], [
            'doctor_notes.required' => 'Catatan dokter tidak boleh kosong.',
            'doctor_notes.max' => 'Catatan dokter maksimal 2000 karakter.',
        ]);
        
        $appointment->update([
            'doctor_notes' => $validated['doctor_notes'],
        ]);
        
        return back()->with('success', 'Catatan dokter berhasil diperbarui.');
    }
    
    public function completeAppointment(Appointment $appointment)
    {
        // verifikasi appointment milik dokter ini
        $doctor = Doctor::where('user_id', Auth::id())->firstOrFail();
        
        if ($appointment->doctor_id !== $doctor->id) {
            abort(403);
        }
        
        // hanya bisa menyelesaikan appointment yang confirmed
        if ($appointment->status !== 'confirmed') {
            return back()->withErrors(['error' => 'Hanya janji temu yang sudah dikonfirmasi yang bisa diselesaikan.']);
        }
        
        DB::transaction(function () use ($appointment) {
            // ubah status ke completed
            $appointment->update(['status' => 'completed']);
            
            // buat transaksi otomatis
            $appointment->load('services');
            
            // hitung total dari semua service
            $totalAmount = 0;
            $transactionDetails = [];
            
            foreach ($appointment->services as $service) {
                $totalAmount += $service->price;
                $transactionDetails[] = [
                    'service_id' => $service->id,
                    'description' => $service->name,
                    'quantity' => 1,
                    'price_at_transaction' => $service->price,
                    'subtotal' => $service->price,
                ];
            }
            
            // generate invoice number
            $invoiceNumber = 'INV-' . date('Ymd') . '-' . str_pad($appointment->id, 5, '0', STR_PAD_LEFT);
            
            // buat transaction
            $transaction = Transaction::create([
                'appointment_id' => $appointment->id,
                'invoice_number' => $invoiceNumber,
                'total_amount' => $totalAmount,
                'status' => 'unpaid',
                'transaction_date' => now(),
            ]);
            
            // buat transaction details
            foreach ($transactionDetails as $detail) {
                $transaction->transactionDetails()->create($detail);
            }
        });
        
        return redirect()->route('doctor.dashboard')
            ->with('success', 'Janji temu berhasil diselesaikan dan transaksi telah dibuat.');
    }
    
    public function confirmAppointment(Appointment $appointment)
    {
        // verifikasi appointment milik dokter ini
        $doctor = Doctor::where('user_id', Auth::id())->firstOrFail();
        
        if ($appointment->doctor_id !== $doctor->id) {
            abort(403);
        }
        
        // hanya bisa konfirmasi appointment yang pending
        if ($appointment->status !== 'pending') {
            return back()->withErrors(['error' => 'Hanya janji temu yang menunggu yang bisa dikonfirmasi.']);
        }
        
        $appointment->update(['status' => 'confirmed']);
        
        return back()->with('success', 'Janji temu berhasil dikonfirmasi.');
    }
}
