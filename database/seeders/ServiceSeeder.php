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
                'name' => 'Konsultasi Umum',
                'category' => 'Konsultasi & Pemeriksaan',
                'description' => 'Pemeriksaan kesehatan umum dan konsultasi dengan dokter hewan',
                'price' => 150000,
            ],
            [
                'name' => 'Check-up Lengkap',
                'category' => 'Konsultasi & Pemeriksaan',
                'description' => 'Pemeriksaan menyeluruh termasuk tes darah dan urin',
                'price' => 350000,
            ],
            [
                'name' => 'Konsultasi Spesialis',
                'category' => 'Konsultasi & Pemeriksaan',
                'description' => 'Konsultasi dengan dokter spesialis berpengalaman',
                'price' => 250000,
            ],
            
            [
                'name' => 'Vaksin Rabies',
                'category' => 'Vaksinasi',
                'description' => 'Vaksin anti rabies untuk anjing & kucing',
                'price' => 100000,
            ],
            [
                'name' => 'Vaksin Distemper',
                'category' => 'Vaksinasi',
                'description' => 'Vaksin pencegahan distemper',
                'price' => 120000,
            ],
            [
                'name' => 'Vaksin Parvovirus',
                'category' => 'Vaksinasi',
                'description' => 'Vaksin pencegahan parvovirus',
                'price' => 150000,
            ],
            [
                'name' => 'Paket Vaksinasi Lengkap',
                'category' => 'Vaksinasi',
                'description' => 'Paket vaksinasi lengkap untuk perlindungan maksimal',
                'price' => 500000,
            ],
            
            [
                'name' => 'Sterilisasi Kucing Betina',
                'category' => 'Bedah & Operasi',
                'description' => 'Operasi sterilisasi untuk kucing betina, termasuk perawatan pasca operasi',
                'price' => 800000,
            ],
            [
                'name' => 'Kastrasi Kucing Jantan',
                'category' => 'Bedah & Operasi',
                'description' => 'Operasi kastrasi untuk kucing jantan, termasuk perawatan pasca operasi',
                'price' => 500000,
            ],
            [
                'name' => 'Sterilisasi Anjing Betina',
                'category' => 'Bedah & Operasi',
                'description' => 'Operasi sterilisasi untuk anjing betina dengan perawatan intensif',
                'price' => 1500000,
            ],
            [
                'name' => 'Kastrasi Anjing Jantan',
                'category' => 'Bedah & Operasi',
                'description' => 'Operasi kastrasi untuk anjing jantan dengan perawatan intensif',
                'price' => 1000000,
            ],
            [
                'name' => 'Bedah Minor',
                'category' => 'Bedah & Operasi',
                'description' => 'Operasi kecil seperti pengangkatan tumor, jahit luka, dll',
                'price' => 500000,
            ],
            [
                'name' => 'Bedah Mayor',
                'category' => 'Bedah & Operasi',
                'description' => 'Operasi kompleks dengan perawatan intensif',
                'price' => 2000000,
            ],
            
            [
                'name' => 'Mandi Basic',
                'category' => 'Grooming & Perawatan',
                'description' => 'Mandi, blow dry, dan potong kuku',
                'price' => 75000,
            ],
            [
                'name' => 'Grooming Full',
                'category' => 'Grooming & Perawatan',
                'description' => 'Mandi, styling, potong kuku, bersih telinga',
                'price' => 200000,
            ],
            [
                'name' => 'Trimming',
                'category' => 'Grooming & Perawatan',
                'description' => 'Potong dan styling bulu',
                'price' => 150000,
            ],
            [
                'name' => 'Spa Treatment',
                'category' => 'Grooming & Perawatan',
                'description' => 'Perawatan spa lengkap dengan aromaterapi',
                'price' => 300000,
            ],
            
            [
                'name' => 'Rawat Inap',
                'category' => 'Rawat Inap & Laboratorium',
                'description' => 'Perawatan intensif dengan monitoring 24/7 (per hari)',
                'price' => 150000,
            ],
            [
                'name' => 'Tes Darah',
                'category' => 'Rawat Inap & Laboratorium',
                'description' => 'Pemeriksaan darah lengkap (CBC)',
                'price' => 200000,
            ],
            [
                'name' => 'X-Ray',
                'category' => 'Rawat Inap & Laboratorium',
                'description' => 'Foto rontgen digital per area',
                'price' => 250000,
            ],
            [
                'name' => 'USG',
                'category' => 'Rawat Inap & Laboratorium',
                'description' => 'Ultrasonografi untuk diagnosis',
                'price' => 300000,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
