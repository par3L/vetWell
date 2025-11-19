<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Pemeriksaan Umum',
                'description' => 'Pemeriksaan kesehatan menyeluruh untuk hewan peliharaan Anda',
                'price' => 150000,
            ],
            [
                'name' => 'Vaksinasi',
                'description' => 'Program vaksinasi lengkap untuk melindungi hewan peliharaan',
                'price' => 200000,
            ],
            [
                'name' => 'Grooming',
                'description' => 'Perawatan dan grooming profesional untuk hewan peliharaan',
                'price' => 100000,
            ],
            [
                'name' => 'Dental Care',
                'description' => 'Perawatan gigi dan mulut untuk kesehatan optimal',
                'price' => 250000,
            ],
            [
                'name' => 'Bedah Minor',
                'description' => 'Prosedur bedah kecil seperti sterilisasi dan kastrasi',
                'price' => 800000,
            ],
            [
                'name' => 'Bedah Major',
                'description' => 'Prosedur bedah kompleks dengan peralatan modern',
                'price' => 2000000,
            ],
            [
                'name' => 'Rawat Inap',
                'description' => 'Perawatan intensif dan rawat inap dengan monitoring 24/7',
                'price' => 300000,
            ],
            [
                'name' => 'Laboratorium',
                'description' => 'Pemeriksaan laboratorium lengkap dan diagnosis',
                'price' => 350000,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
