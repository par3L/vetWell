<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLogin()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role === 'dokter') {
                return redirect()->route('doctor.dashboard');
            }
            return redirect()->route('dashboard.index');
        }
        return view('auth.login');
    }

    /**
     * Show the register form.
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
        return view('auth.register');
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();
            
            // Redirect based on user role
            if ($user->role === 'dokter') {
                return redirect()->intended(route('doctor.dashboard'))->with('success', 'Selamat datang kembali, Dr. ' . $user->name . '!');
            }
            
            return redirect()->intended(route('dashboard.index'))->with('success', 'Selamat datang kembali!');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->withInput($request->only('email'));
    }

    /**
     * Handle registration request.
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['nullable', 'string', 'max:20'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        Auth::login($user);

        return redirect()->route('dashboard.index')->with('success', 'Registrasi berhasil! Selamat datang di VetWell Clinic.');
    }

    /**
     * Handle logout request.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing')->with('success', 'Anda telah berhasil logout.');
    }
}
