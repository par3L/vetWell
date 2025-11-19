<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Pet;
use App\Models\Service;
use App\Models\Doctor;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * menampilkan halaman dashboard utama user
     * berisi statistik, upcoming appointments, dan aktivitas terkini
     */
    public function index()
    {
        $user = Auth::user();
        
        // ambil semua pet milik user
        $pets = Pet::where('user_id', $user->id)->get();
        
        // ambil appointment yang akan datang (pending/confirmed dan waktu >= sekarang)
        // eager load relasi pet, doctor, dan services untuk menghindari N+1 query
        $upcomingAppointments = Appointment::where('user_id', $user->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->where('appointment_time', '>=', now())
            ->with(['pet', 'doctor.user', 'services'])
            ->orderBy('appointment_time', 'asc')
            ->take(5)
            ->get();
        
        // ambil appointment terbaru untuk aktivitas terkini
        // include transaction untuk menampilkan status pembayaran
        $recentAppointments = Appointment::where('user_id', $user->id)
            ->with(['pet', 'doctor.user', 'services', 'transaction'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        // hitung statistik untuk ditampilkan di card
        $stats = [
            'total_pets' => $pets->count(),
            'total_appointments' => Appointment::where('user_id', $user->id)->count(),
            'pending_appointments' => Appointment::where('user_id', $user->id)->where('status', 'pending')->count(),
            'completed_appointments' => Appointment::where('user_id', $user->id)->where('status', 'completed')->count(),
        ];
        
        return view('dashboard.index', compact('upcomingAppointments', 'recentAppointments', 'stats', 'pets'));
    }

    /**
     * menampilkan halaman daftar semua appointment milik user
     * include data untuk modal edit booking
     */
    public function bookings()
    {
        // ambil semua appointment milik user dengan pagination
        // eager load relasi untuk efisiensi query
        $appointments = Appointment::where('user_id', Auth::id())
            ->with(['pet', 'doctor.user', 'services', 'transaction'])
            ->orderBy('appointment_time', 'desc')
            ->paginate(10);
        
        // ambil data yang diperlukan untuk modal edit booking
        $pets = Pet::where('user_id', Auth::id())->get();
        $services = Service::all();
        $doctors = Doctor::with('user')->get();
        
        return view('dashboard.bookings', compact('appointments', 'pets', 'services', 'doctors'));
    }

    /**
     * menampilkan form untuk membuat appointment baru
     * menyediakan data pet, service, dan doctor untuk dipilih
     */
    public function createBooking()
    {
        $pets = Pet::where('user_id', Auth::id())->get();
        $services = Service::all();
        $doctors = Doctor::with('user')->get();
        
        return view('dashboard.create-booking', compact('pets', 'services', 'doctors'));
    }

    /**
     * menyimpan appointment baru ke database
     * mendukung multiple service selection dan random doctor
     */
    public function storeBooking(Request $request)
    {
        // validasi input dengan pesan error dalam bahasa indonesia
        $validated = $request->validate([
            'pet_id' => ['required', 'exists:pets,id'],
            'service_ids' => ['required', 'array', 'min:1'],
            'service_ids.*' => ['exists:services,id'],
            'doctor_id' => ['required'],
            'appointment_date' => ['required', 'date', 'after:today'],
            'appointment_time' => ['required', 'date_format:H:i'],
            'client_notes' => ['nullable', 'string', 'max:1000'],
        ], [
            'service_ids.required' => 'Pilih minimal satu layanan.',
            'service_ids.min' => 'Pilih minimal satu layanan.',
            'pet_id.required' => 'Pilih hewan peliharaan.',
            'doctor_id.required' => 'Pilih dokter.',
            'appointment_date.required' => 'Pilih tanggal janji.',
            'appointment_date.after' => 'Tanggal janji harus setelah hari ini.',
            'appointment_time.required' => 'Pilih waktu janji.',
        ]);

        // verifikasi bahwa pet milik user yang sedang login
        $pet = Pet::where('id', $validated['pet_id'])
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // handle pemilihan dokter secara random
        $doctorId = $validated['doctor_id'];
        if ($doctorId === 'random') {
            // ambil dokter secara acak dari database
            $doctorId = Doctor::inRandomOrder()->first()->id;
        } else {
            // validasi dokter yang dipilih ada di database
            Doctor::findOrFail($doctorId);
        }

        // gabungkan tanggal dan waktu menjadi satu datetime
        $appointmentDateTime = $validated['appointment_date'] . ' ' . $validated['appointment_time'];

        // cek apakah slot waktu tersebut sudah dibooking oleh orang lain
        $existingAppointment = Appointment::where('doctor_id', $doctorId)
            ->where('appointment_time', $appointmentDateTime)
            ->whereIn('status', ['pending', 'confirmed'])
            ->exists();

        if ($existingAppointment) {
            return back()->withErrors(['appointment_time' => 'Slot waktu ini sudah dibooking.'])->withInput();
        }

        // buat appointment baru dengan status pending
        $appointment = Appointment::create([
            'user_id' => Auth::id(),
            'pet_id' => $validated['pet_id'],
            'doctor_id' => $doctorId,
            'appointment_time' => $appointmentDateTime,
            'status' => 'pending',
            'client_notes' => $validated['client_notes'],
        ]);

        // attach service yang dipilih ke appointment (many-to-many)
        $appointment->services()->attach($validated['service_ids']);

        return redirect()->route('dashboard.bookings')
            ->with('success', 'Janji temu berhasil dibuat! Silakan tunggu konfirmasi.');
    }

    /**
     * update data appointment yang sudah ada
     * hanya appointment dengan status pending yang bisa diubah
     */
    public function updateBooking(Request $request, Appointment $appointment)
    {
        // verifikasi bahwa appointment milik user yang sedang login
        if ($appointment->user_id !== Auth::id()) {
            abort(403);
        }

        // hanya appointment pending yang bisa diubah
        if ($appointment->status !== 'pending') {
            return back()->withErrors(['error' => 'Hanya janji temu yang menunggu yang bisa diubah.']);
        }

        $validated = $request->validate([
            'pet_id' => ['required', 'exists:pets,id'],
            'service_ids' => ['required', 'array', 'min:1'],
            'service_ids.*' => ['exists:services,id'],
            'doctor_id' => ['required'],
            'appointment_date' => ['required', 'date', 'after:today'],
            'appointment_time' => ['required', 'date_format:H:i'],
            'client_notes' => ['nullable', 'string', 'max:1000'],
        ], [
            'service_ids.required' => 'Pilih minimal satu layanan.',
            'service_ids.min' => 'Pilih minimal satu layanan.',
            'pet_id.required' => 'Pilih hewan peliharaan.',
            'doctor_id.required' => 'Pilih dokter.',
            'appointment_date.required' => 'Pilih tanggal janji.',
            'appointment_date.after' => 'Tanggal janji harus setelah hari ini.',
            'appointment_time.required' => 'Pilih waktu janji.',
        ]);

        // Verify pet belongs to user
        Pet::where('id', $validated['pet_id'])
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Handle random doctor selection
        $doctorId = $validated['doctor_id'];
        if ($doctorId === 'random') {
            $doctorId = Doctor::inRandomOrder()->first()->id;
        } else {
            Doctor::findOrFail($doctorId);
        }

        // Combine date and time
        $appointmentDateTime = $validated['appointment_date'] . ' ' . $validated['appointment_time'];

        // Check if time slot is available (excluding current appointment)
        $existingAppointment = Appointment::where('doctor_id', $doctorId)
            ->where('appointment_time', $appointmentDateTime)
            ->where('id', '!=', $appointment->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->exists();

        if ($existingAppointment) {
            return back()->withErrors(['appointment_time' => 'Slot waktu ini sudah dibooking.'])->withInput();
        }

        $appointment->update([
            'pet_id' => $validated['pet_id'],
            'doctor_id' => $doctorId,
            'appointment_time' => $appointmentDateTime,
            'client_notes' => $validated['client_notes'],
        ]);

        // Sync services (only non-doctor-added services can be updated)
        $appointment->services()->wherePivot('added_by_doctor', false)->sync($validated['service_ids']);

        return redirect()->route('dashboard.bookings')
            ->with('success', 'Janji temu berhasil diperbarui!');
    }

    /**
     * membatalkan appointment yang sudah dibuat
     * hanya appointment pending/confirmed yang bisa dibatalkan
     */
    public function cancelBooking(Appointment $appointment)
    {
        // verifikasi appointment milik user yang sedang login
        if ($appointment->user_id !== Auth::id()) {
            abort(403);
        }

        // cek status, hanya pending atau confirmed yang bisa dibatalkan
        if (!in_array($appointment->status, ['pending', 'confirmed'])) {
            return back()->withErrors(['error' => 'Janji temu ini tidak dapat dibatalkan.']);
        }

        // update status menjadi cancelled
        $appointment->update(['status' => 'cancelled']);

        return redirect()->route('dashboard.bookings')
            ->with('success', 'Janji temu berhasil dibatalkan.');
    }

    /**
     * proses pembayaran untuk transaksi appointment
     * menggunakan dummy payment (langsung paid)
     */
    public function payTransaction(Transaction $transaction)
    {
        // verifikasi transaksi milik user ini melalui relasi appointment
        $appointment = $transaction->appointment;
        
        if ($appointment->user_id !== Auth::id()) {
            abort(403);
        }
        
        // hanya bisa bayar transaksi yang statusnya masih unpaid
        if ($transaction->status !== 'unpaid') {
            return back()->withErrors(['error' => 'Transaksi ini sudah dibayar.']);
        }
        
        // dummy payment - langsung ubah status ke paid tanpa payment gateway
        $transaction->update(['status' => 'paid']);
        
        return back()->with('success', 'Pembayaran berhasil! Terima kasih.');
    }
}
