<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Service;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * untk dashboard admin dengan statistik website
     */
    public function index()
    {
        // hitung jumlah dokter yang sudah registrasi
        $totalDoctors = Doctor::count();
        
        // gitung jumlah staff (user dengan show_in_team = true dan tidak punya akun dokter)
        $totalStaff = User::where('show_in_team', true)
            ->whereDoesntHave('doctor')
            ->count();
        
        // hitung jumlah user yang telah registrasi (semua user)
        $totalUsers = User::count();
        
        // hitung total booking
        $totalBookings = Appointment::count();
        
        // hitung booking yang dibatalkan
        $cancelledBookings = Appointment::where('status', 'cancelled')->count();
        
        // hitung booking yang completed
        $completedBookings = Appointment::where('status', 'completed')->count();
        
        // hitung total revenue dari transaksi yang sudah paid
        $totalRevenue = Transaction::where('status', 'paid')->sum('total_amount');
        
        // data statistik untuk dashboard
        $stats = [
            'total_doctors' => $totalDoctors,
            'total_staff' => $totalStaff,
            'total_users' => $totalUsers,
            'total_bookings' => $totalBookings,
            'cancelled_bookings' => $cancelledBookings,
            'completed_bookings' => $completedBookings,
            'total_revenue' => $totalRevenue,
        ];
        
        // ambil recent appointments untuk aktivitas terkini
        $recentAppointments = Appointment::with(['user', 'pet', 'doctor.user', 'transaction'])
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
        
        return view('admin.index', compact('stats', 'recentAppointments'));
    }

    /**
     * Menampilkan halaman management team (dokter dan staff)
     */
    public function team()
    {
        // Ambil dokter yang sudah registrasi
        $doctors = Doctor::with('user')->get();
        
        // Ambil staff yang ditampilkan di team page
        $staffMembers = User::where('show_in_team', true)
            ->whereDoesntHave('doctor')
            ->get();
        
        return view('admin.team', compact('doctors', 'staffMembers'));
    }

    /**
     * Update status show_in_team untuk dokter
     */
    public function updateDoctorTeamStatus(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'bio' => 'nullable|string|max:1000',
        ]);
        
        // handle checkbox show_in_team
        // jika checkbox tidak dicentang, value tidak akan dikirim, jadi kita set false
        $validated['show_in_team'] = $request->has('show_in_team') ? true : false;
        
        $doctor->update($validated);
        
        return back()->with('success', 'Status dokter di team berhasil diperbarui!');
    }

    /**
     * Tambah staff member baru ke team page
     */
    public function storeStaff(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'position' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        // Handle photo upload
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('staff-photos', 'public');
        }
        
        // Set default password (bisa diubah nanti)
        $validated['password'] = bcrypt('password123');
        $validated['show_in_team'] = true;
        $validated['role'] = 'klien'; // Default role
        
        User::create($validated);
        
        return back()->with('success', 'Staff berhasil ditambahkan ke team!');
    }

    /**
     * Update staff member
     */
    public function updateStaff(Request $request, User $user)
    {
        // Pastikan user ini adalah staff (bukan dokter)
        if ($user->doctor) {
            return back()->withErrors(['error' => 'User ini adalah dokter, tidak bisa diupdate sebagai staff.']);
        }
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:20',
            'position' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        // handle checkbox show_in_team
        // jika checkbox tidak dicentang, value tidak akan dikirim, jadi kita set false
        $validated['show_in_team'] = $request->has('show_in_team') ? true : false;
        
        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $validated['photo'] = $request->file('photo')->store('staff-photos', 'public');
        }
        
        $user->update($validated);
        
        return back()->with('success', 'Staff berhasil diperbarui!');
    }

    /**
     * Hapus staff member
     */
    public function destroyStaff(User $user)
    {
        // Pastikan user ini adalah staff (bukan dokter)
        if ($user->doctor) {
            return back()->withErrors(['error' => 'User ini adalah dokter, tidak bisa dihapus sebagai staff.']);
        }
        
        // Delete photo if exists
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }
        
        $user->delete();
        
        return back()->with('success', 'Staff berhasil dihapus!');
    }

    /**
     * Menampilkan halaman management services
     */
    public function services()
    {
        $services = Service::all();
        
        return view('admin.services', compact('services'));
    }

    /**
     * Simpan service baru
     */
    public function storeService(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
        ]);
        
        Service::create($validated);
        
        return back()->with('success', 'Service berhasil ditambahkan!');
    }

    /**
     * Update service
     */
    public function updateService(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
        ]);
        
        $service->update($validated);
        
        return back()->with('success', 'Service berhasil diperbarui!');
    }

    /**
     * Hapus service
     */
    public function destroyService(Service $service)
    {
        // Check if service is being used in appointments
        if ($service->appointments()->count() > 0) {
            return back()->withErrors(['error' => 'Service ini tidak bisa dihapus karena sudah digunakan dalam appointment.']);
        }
        
        $service->delete();
        
        return back()->with('success', 'Service berhasil dihapus!');
    }
}
