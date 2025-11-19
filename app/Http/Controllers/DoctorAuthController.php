<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DoctorAuthController extends Controller
{
    /**
     * Show the doctor registration form.
     */
    public function showRegister()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role === 'dokter') {
                return redirect()->route('doctor.dashboard');
            }
            return redirect()->route('dashboard.index');
        }
        return view('auth.doctor-register');
    }

    /**
     * Handle doctor registration request.
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:20'],
            'no_reg_dokter' => ['required', 'string', 'unique:doctors,no_reg_dokter'],
            'spesialisasi' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'experience_years' => ['required', 'integer', 'min:0'],
            'bio' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:2048'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();

            // Create user account
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'role' => 'dokter',
            ]);

            // Handle photo upload
            $photoPath = null;
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoName = time() . '_' . $photo->getClientOriginalName();
                $photo->move(public_path('assets/doctors'), $photoName);
                $photoPath = 'assets/doctors/' . $photoName;
            }

            // Create doctor profile
            Doctor::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'phone' => $request->phone,
                'no_reg_dokter' => $request->no_reg_dokter,
                'spesialisasi' => $request->spesialisasi,
                'position' => $request->position,
                'experience_years' => $request->experience_years,
                'bio' => $request->bio,
                'photo' => $photoPath,
            ]);

            DB::commit();

            Auth::login($user);

            return redirect()->route('doctor.dashboard')->with('success', 'Registrasi dokter berhasil! Selamat datang di VetWell Clinic.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Terjadi kesalahan saat registrasi. Silakan coba lagi.'])->withInput();
        }
    }
}
