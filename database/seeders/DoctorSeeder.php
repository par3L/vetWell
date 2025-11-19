<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctors = [
            [
                'name' => 'drh. Sarah Wijaya',
                'email' => 'sarah.wijaya@vetwell.com',
                'phone' => '081234567890',
                'no_reg_dokter' => 'DRH001',
                'spesialisasi' => 'Bedah & Ortopedi',
                'position' => 'Kepala Dokter Hewan',
                'experience_years' => 15,
                'bio' => 'Spesialis bedah dan ortopedi dengan pengalaman lebih dari 15 tahun menangani berbagai kasus kompleks pada hewan kecil dan besar.',
            ],
            [
                'name' => 'drh. Michael Tan',
                'email' => 'michael.tan@vetwell.com',
                'phone' => '081234567891',
                'no_reg_dokter' => 'DRH002',
                'spesialisasi' => 'Penyakit Dalam',
                'position' => 'Dokter Hewan Senior',
                'experience_years' => 12,
                'bio' => 'Ahli penyakit dalam yang berpengalaman dalam diagnosis dan pengobatan penyakit metabolik, endokrin, dan sistem organ internal.',
            ],
            [
                'name' => 'drh. Lisa Amanda',
                'email' => 'lisa.amanda@vetwell.com',
                'phone' => '081234567892',
                'no_reg_dokter' => 'DRH003',
                'spesialisasi' => 'Hewan Eksotis',
                'position' => 'Dokter Hewan',
                'experience_years' => 8,
                'bio' => 'Spesialis hewan eksotis seperti reptil, burung, dan mamalia kecil dengan pendekatan holistik dan modern.',
            ],
        ];

        foreach ($doctors as $doctorData) {
            // Create user account for doctor
            $user = User::create([
                'name' => $doctorData['name'],
                'email' => $doctorData['email'],
                'password' => Hash::make('password'), // Default password
                'phone' => $doctorData['phone'],
                'role' => 'dokter',
            ]);

            // Create doctor profile
            Doctor::create([
                'user_id' => $user->id,
                'name' => $doctorData['name'],
                'phone' => $doctorData['phone'],
                'no_reg_dokter' => $doctorData['no_reg_dokter'],
                'spesialisasi' => $doctorData['spesialisasi'],
                'position' => $doctorData['position'],
                'experience_years' => $doctorData['experience_years'],
                'bio' => $doctorData['bio'],
                'photo' => null, // Can be added later
            ]);
        }
    }
}
