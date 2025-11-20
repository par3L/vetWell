<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Service;

class PublicController extends Controller
{
    /**
     * menampilkan halaman team
     */
    public function team()
    {
        // ambil dokter yang ditampilkan di team page
        $doctors = Doctor::where('show_in_team', true)
            ->with('user')
            ->get();
        
        // ambil staff yang ditampilkan di team page
        $staff = User::where('show_in_team', true)
            ->whereDoesntHave('doctor')
            ->get();
        
        return view('about.team', compact('doctors', 'staff'));
    }
    
    /**
     * menampilkan halaman services/index
     */
    public function services()
    {
        $servicesByCategory = Service::all()->groupBy('category');
        
        return view('services.index', compact('servicesByCategory'));
    }
    
    /**
     * menampilkan halaman pricing
     */
    public function pricing()
    {
        $servicesByCategory = Service::all()->groupBy('category');
        
        return view('services.pricing', compact('servicesByCategory'));
    }
}

