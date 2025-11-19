<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Pet;
use App\Models\Service;
use App\Models\Doctor;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    // ==================== PET API ====================
    
    /**
     * ambil semua data pet milik user yang login
     */
    public function getPets()
    {
        $pets = Pet::where('user_id', Auth::id())->get();
        
        $response = [
            'status' => 'success',
            'message' => 'Data pet berhasil diambil',
            'data' => $pets
        ];
        
        return response()->json($response);
    }
    
    /**
     * tambah pet baru
     */
    public function createPet(Request $request)
    {
        // validasi input dari request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'breed' => 'nullable|string|max:100',
            'gender' => 'required|in:male,female',
            'dob' => 'nullable|date',
            'photo' => 'nullable|string',
        ]);
        
        // set user_id otomatis dari user yang login
        $validated['user_id'] = Auth::id();
        
        // buat pet baru
        $pet = Pet::create($validated);
        
        $response = [
            'status' => 'success',
            'message' => 'Pet berhasil ditambahkan',
            'data' => $pet
        ];
        
        return response()->json($response);
    }
    
    /**
     * update data pet
     */
    public function updatePet(Request $request, $id)
    {
        // cari pet berdasarkan id dan pastikan milik user yang login
        $pet = Pet::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        
        // validasi input dari request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'breed' => 'nullable|string|max:100',
            'gender' => 'required|in:male,female',
            'dob' => 'nullable|date',
            'photo' => 'nullable|string',
        ]);
        
        // update data pet
        $pet->update($validated);
        
        $response = [
            'status' => 'success',
            'message' => 'Pet berhasil diperbarui',
            'data' => $pet
        ];
        
        return response()->json($response);
    }
    
    /**
     * hapus pet
     */
    public function destroyPet($id)
    {
        // cari pet berdasarkan id dan pastikan milik user yang login
        $pet = Pet::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        
        // hapus pet
        $pet->delete();
        
        $response = [
            'status' => 'success',
            'message' => 'Pet berhasil dihapus'
        ];
        
        return response()->json($response);
    }
    
    // ==================== APPOINTMENT API ====================
    
    /**
     * ambil semua appointment milik user
     */
    public function getAppointments()
    {
        $appointments = Appointment::where('user_id', Auth::id())
            ->with(['pet', 'doctor.user', 'services', 'transaction'])
            ->orderBy('appointment_time', 'desc')
            ->get();
        
        $response = [
            'status' => 'success',
            'message' => 'Data appointment berhasil diambil',
            'data' => $appointments
        ];
        
        return response()->json($response);
    }
    
    /**
     * buat appointment baru
     */
    public function createAppointment(Request $request)
    {
        // validasi input dari request
        $validated = $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'service_ids' => 'required|array|min:1',
            'service_ids.*' => 'exists:services,id',
            'doctor_id' => 'required',
            'appointment_date' => 'required|date|after:today',
            'appointment_time' => 'required|date_format:H:i',
            'client_notes' => 'nullable|string|max:1000',
        ]);
        
        // verifikasi bahwa pet milik user yang sedang login
        $pet = Pet::where('id', $validated['pet_id'])
            ->where('user_id', Auth::id())
            ->firstOrFail();
        
        // handle pemilihan dokter (bisa random atau pilih spesifik)
        $doctorId = $validated['doctor_id'];
        if ($doctorId === 'random') {
            // pilih dokter secara acak
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
            return response()->json([
                'status' => 'error',
                'message' => 'Slot waktu ini sudah dibooking'
            ], 422);
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
        
        // load relasi untuk response
        $appointment->load(['pet', 'doctor.user', 'services']);
        
        $response = [
            'status' => 'success',
            'message' => 'Appointment berhasil dibuat',
            'data' => $appointment
        ];
        
        return response()->json($response);
    }
    
    /**
     * update appointment
     */
    public function updateAppointment(Request $request, $id)
    {
        // cari appointment berdasarkan id dan pastikan milik user yang login
        $appointment = Appointment::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        
        // hanya appointment pending yang bisa diubah
        if ($appointment->status !== 'pending') {
            return response()->json([
                'status' => 'error',
                'message' => 'Hanya appointment pending yang bisa diubah'
            ], 422);
        }
        
        // validasi input dari request
        $validated = $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'service_ids' => 'required|array|min:1',
            'service_ids.*' => 'exists:services,id',
            'doctor_id' => 'required',
            'appointment_date' => 'required|date|after:today',
            'appointment_time' => 'required|date_format:H:i',
            'client_notes' => 'nullable|string|max:1000',
        ]);
        
        // verifikasi bahwa pet milik user yang sedang login
        Pet::where('id', $validated['pet_id'])
            ->where('user_id', Auth::id())
            ->firstOrFail();
        
        // handle pemilihan dokter (bisa random atau pilih spesifik)
        $doctorId = $validated['doctor_id'];
        if ($doctorId === 'random') {
            $doctorId = Doctor::inRandomOrder()->first()->id;
        } else {
            Doctor::findOrFail($doctorId);
        }
        
        // gabungkan tanggal dan waktu menjadi satu datetime
        $appointmentDateTime = $validated['appointment_date'] . ' ' . $validated['appointment_time'];
        
        // cek apakah slot waktu tersebut sudah dibooking (exclude appointment ini)
        $existingAppointment = Appointment::where('doctor_id', $doctorId)
            ->where('appointment_time', $appointmentDateTime)
            ->where('id', '!=', $appointment->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->exists();
        
        if ($existingAppointment) {
            return response()->json([
                'status' => 'error',
                'message' => 'Slot waktu ini sudah dibooking'
            ], 422);
        }
        
        // update data appointment
        $appointment->update([
            'pet_id' => $validated['pet_id'],
            'doctor_id' => $doctorId,
            'appointment_time' => $appointmentDateTime,
            'client_notes' => $validated['client_notes'],
        ]);
        
        // sync services (exclude service yang ditambah dokter)
        $appointment->services()->wherePivot('added_by_doctor', false)->sync($validated['service_ids']);
        
        // load relasi untuk response
        $appointment->load(['pet', 'doctor.user', 'services']);
        
        $response = [
            'status' => 'success',
            'message' => 'Appointment berhasil diperbarui',
            'data' => $appointment
        ];
        
        return response()->json($response);
    }
    
    /**
     * cancel appointment
     */
    public function cancelAppointment($id)
    {
        // cari appointment berdasarkan id dan pastikan milik user yang login
        $appointment = Appointment::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        
        // cek status, hanya pending atau confirmed yang bisa dibatalkan
        if (!in_array($appointment->status, ['pending', 'confirmed'])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Appointment ini tidak dapat dibatalkan'
            ], 422);
        }
        
        // update status menjadi cancelled
        $appointment->update(['status' => 'cancelled']);
        
        $response = [
            'status' => 'success',
            'message' => 'Appointment berhasil dibatalkan'
        ];
        
        return response()->json($response);
    }
    
    // ==================== SERVICE API ====================
    
    /**
     * ambil semua service yang tersedia
     */
    public function getServices()
    {
        $services = Service::all();
        
        $response = [
            'status' => 'success',
            'message' => 'Data service berhasil diambil',
            'data' => $services
        ];
        
        return response()->json($response);
    }
    
    // ==================== DOCTOR API ====================
    
    /**
     * ambil semua doctor yang tersedia
     */
    public function getDoctors()
    {
        $doctors = Doctor::with('user')->get();
        
        $response = [
            'status' => 'success',
            'message' => 'Data doctor berhasil diambil',
            'data' => $doctors
        ];
        
        return response()->json($response);
    }
    
    // ==================== TRANSACTION API ====================
    
    /**
     * bayar transaksi (dummy payment)
     */
    public function payTransaction($id)
    {
        // cari transaksi dan pastikan milik user yang login (via relasi appointment)
        $transaction = Transaction::whereHas('appointment', function($query) {
            $query->where('user_id', Auth::id());
        })->findOrFail($id);
        
        // hanya bisa bayar transaksi yang statusnya masih unpaid
        if ($transaction->status !== 'unpaid') {
            return response()->json([
                'status' => 'error',
                'message' => 'Transaksi ini sudah dibayar'
            ], 422);
        }
        
        // dummy payment - langsung ubah status ke paid tanpa payment gateway
        $transaction->update(['status' => 'paid']);
        
        $response = [
            'status' => 'success',
            'message' => 'Pembayaran berhasil'
        ];
        
        return response()->json($response);
    }
}
