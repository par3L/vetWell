<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harga Layanan - VetWell Clinic</title>
    <meta name="description" content="Harga layanan veteriner yang transparan dan kompetitif. Perawatan berkualitas dengan harga terjangkau.">
    <link rel="icon" type="image/png" href="{{ asset('logo2.png') }}">
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:300,400,500,600,700|poppins:400,500,600,700|quicksand:400,500,600,700" rel="stylesheet">
    
    @vite('resources/css/app.css')
</head>
<body class="antialiased font-sans text-neutral-800">
    <x-navbar />

    <!-- hero section -->
    <section class="relative bg-gradient-to-br from-[#F0F8F6] via-white to-[#FFF5EC] overflow-hidden pt-32 pb-20">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-10 w-64 h-64 bg-[#2D7A6E] rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-[#FFB088] rounded-full blur-3xl"></div>
        </div>

        <div class="container-custom relative z-10 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#E5F0ED] rounded-full mb-6">
                <svg class="w-5 h-5 text-[#2D7A6E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-sm font-medium text-[#1A3A35]">Harga Transparan & Kompetitif</span>
            </div>
            
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-heading font-bold text-[#1A3A35] mb-6">
                Harga <span class="text-[#2D7A6E]">Layanan</span>
            </h1>
            
            <p class="text-xl md:text-2xl text-[#5A7A76] leading-relaxed max-w-3xl mx-auto">
                Investasi terbaik untuk kesehatan dan kebahagiaan hewan peliharaan Anda
            </p>
        </div>
    </section>

    <!-- Pricing Tables -->
    <section class="py-16 lg:py-20 bg-white">
        <div class="container-custom">
            <!-- Konsultasi & Pemeriksaan -->
            <div class="mb-16">
                <div class="text-center mb-12">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#E5F0ED] rounded-full mb-4">
                        <svg class="w-4 h-4 text-[#2D7A6E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <span class="text-sm font-medium text-[#1A3A35]">Kategori 1</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-heading font-bold text-[#1A3A35]">Konsultasi & Pemeriksaan</h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Konsultasi Umum -->
                    <div class="group bg-gradient-to-br from-white to-[#F0F8F6] p-6 rounded-2xl border-2 border-[#E5F0ED] hover:border-[#2D7A6E] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-start justify-between mb-3">
                            <span class="px-3 py-1 bg-[#2D7A6E]/10 text-[#2D7A6E] text-xs font-semibold rounded-full">POPULER</span>
                            <svg class="w-5 h-5 text-[#2D7A6E] opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#1A3A35] mb-2">Konsultasi Umum</h3>
                        <div class="mb-4">
                            <p class="text-3xl font-bold text-[#2D7A6E] mb-1">Rp 150.000</p>
                            <p class="text-sm text-[#5A7A76]">per kunjungan</p>
                        </div>
                        <p class="text-[#5A7A76] text-sm leading-relaxed">Pemeriksaan kesehatan umum dan konsultasi dengan dokter hewan</p>
                    </div>

                    <!-- Check-up Lengkap -->
                    <div class="group bg-gradient-to-br from-white to-[#F0F8F6] p-6 rounded-2xl border-2 border-[#E5F0ED] hover:border-[#2D7A6E] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-start justify-between mb-3">
                            <span class="px-3 py-1 bg-[#FFB088]/10 text-[#FF8F5B] text-xs font-semibold rounded-full">REKOMENDASI</span>
                            <svg class="w-5 h-5 text-[#2D7A6E] opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#1A3A35] mb-2">Check-up Lengkap</h3>
                        <div class="mb-4">
                            <p class="text-3xl font-bold text-[#2D7A6E] mb-1">Rp 350.000</p>
                            <p class="text-sm text-[#5A7A76]">per sesi</p>
                        </div>
                        <p class="text-[#5A7A76] text-sm leading-relaxed">Pemeriksaan menyeluruh termasuk tes darah dan urin</p>
                    </div>

                    <!-- Konsultasi Spesialis -->
                    <div class="group bg-gradient-to-br from-white to-[#F0F8F6] p-6 rounded-2xl border-2 border-[#E5F0ED] hover:border-[#2D7A6E] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-start justify-between mb-3">
                            <span class="px-3 py-1 bg-[#4A9FD8]/10 text-[#4A9FD8] text-xs font-semibold rounded-full">PREMIUM</span>
                            <svg class="w-5 h-5 text-[#2D7A6E] opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#1A3A35] mb-2">Konsultasi Spesialis</h3>
                        <div class="mb-4">
                            <p class="text-3xl font-bold text-[#2D7A6E] mb-1">Rp 250.000</p>
                            <p class="text-sm text-[#5A7A76]">per kunjungan</p>
                        </div>
                        <p class="text-[#5A7A76] text-sm leading-relaxed">Konsultasi dengan dokter spesialis berpengalaman</p>
                    </div>
                </div>
            </div>

            <!-- Vaksinasi -->
            <div class="mb-16">
                <div class="text-center mb-12">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#FFF5EC] rounded-full mb-4">
                        <svg class="w-4 h-4 text-[#FFB088]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span class="text-sm font-medium text-[#1A3A35]">Kategori 2</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-heading font-bold text-[#1A3A35]">Vaksinasi</h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Rabies -->
                    <div class="group bg-gradient-to-br from-white to-[#FFF5EC] p-6 rounded-2xl border-2 border-[#E5F0ED] hover:border-[#FFB088] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="w-12 h-12 bg-[#FFB088]/20 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-[#FF8F5B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-[#1A3A35] mb-2">Vaksin Rabies</h3>
                        <p class="text-2xl font-bold text-[#FF8F5B] mb-3">Rp 100.000</p>
                        <p class="text-[#5A7A76] text-sm leading-relaxed">Vaksin anti rabies untuk anjing & kucing</p>
                    </div>

                    <!-- Distemper -->
                    <div class="group bg-gradient-to-br from-white to-[#FFF5EC] p-6 rounded-2xl border-2 border-[#E5F0ED] hover:border-[#FFB088] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="w-12 h-12 bg-[#FFB088]/20 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-[#FF8F5B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-[#1A3A35] mb-2">Vaksin Distemper</h3>
                        <p class="text-2xl font-bold text-[#FF8F5B] mb-3">Rp 120.000</p>
                        <p class="text-[#5A7A76] text-sm leading-relaxed">Vaksin pencegahan distemper</p>
                    </div>

                    <!-- Parvovirus -->
                    <div class="group bg-gradient-to-br from-white to-[#FFF5EC] p-6 rounded-2xl border-2 border-[#E5F0ED] hover:border-[#FFB088] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="w-12 h-12 bg-[#FFB088]/20 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-[#FF8F5B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-[#1A3A35] mb-2">Vaksin Parvovirus</h3>
                        <p class="text-2xl font-bold text-[#FF8F5B] mb-3">Rp 150.000</p>
                        <p class="text-[#5A7A76] text-sm leading-relaxed">Vaksin pencegahan parvovirus</p>
                    </div>

                    <!-- Paket Lengkap -->
                    <div class="group relative bg-gradient-to-br from-[#FF8F5B] to-[#FFB088] p-6 rounded-2xl border-2 border-[#FFB088] hover:shadow-xl transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                        <div class="absolute top-2 right-2">
                            <span class="px-2 py-1 bg-white/30 backdrop-blur-sm text-white text-xs font-bold rounded-full">HEMAT 20%</span>
                        </div>
                        <div class="w-12 h-12 bg-white/30 backdrop-blur-sm rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Paket Lengkap</h3>
                        <p class="text-2xl font-bold text-white mb-3">Rp 500.000</p>
                        <p class="text-white/90 text-sm leading-relaxed">Paket vaksinasi lengkap untuk perlindungan maksimal</p>
                    </div>
                </div>
            </div>

            <!-- Bedah & Operasi -->
            <div class="mb-16">
                <div class="text-center mb-12">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#EFF7FC] rounded-full mb-4">
                        <svg class="w-4 h-4 text-[#4A9FD8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span class="text-sm font-medium text-[#1A3A35]">Kategori 3</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-heading font-bold text-[#1A3A35]">Bedah & Operasi</h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Sterilisasi Kucing -->
                    <div class="group bg-gradient-to-br from-white to-[#EFF7FC] p-6 rounded-2xl border-2 border-[#E5F0ED] hover:border-[#4A9FD8] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-[#4A9FD8]/10 text-[#4A9FD8] text-xs font-semibold rounded-full">BETINA</span>
                        </div>
                        <h3 class="text-xl font-bold text-[#1A3A35] mb-2">Sterilisasi Kucing</h3>
                        <p class="text-3xl font-bold text-[#4A9FD8] mb-3">Rp 800.000</p>
                        <p class="text-[#5A7A76] text-sm leading-relaxed mb-4">Operasi sterilisasi untuk kucing betina, termasuk perawatan pasca operasi</p>
                        <div class="flex items-center gap-2 text-xs text-[#5A7A76]">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Termasuk pemeriksaan & obat</span>
                        </div>
                    </div>

                    <!-- Kastrasi Kucing -->
                    <div class="group bg-gradient-to-br from-white to-[#EFF7FC] p-6 rounded-2xl border-2 border-[#E5F0ED] hover:border-[#4A9FD8] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-[#4A9FD8]/10 text-[#4A9FD8] text-xs font-semibold rounded-full">JANTAN</span>
                        </div>
                        <h3 class="text-xl font-bold text-[#1A3A35] mb-2">Kastrasi Kucing</h3>
                        <p class="text-3xl font-bold text-[#4A9FD8] mb-3">Rp 500.000</p>
                        <p class="text-[#5A7A76] text-sm leading-relaxed mb-4">Operasi kastrasi untuk kucing jantan, termasuk perawatan pasca operasi</p>
                        <div class="flex items-center gap-2 text-xs text-[#5A7A76]">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Termasuk pemeriksaan & obat</span>
                        </div>
                    </div>

                    <!-- Sterilisasi Anjing -->
                    <div class="group bg-gradient-to-br from-white to-[#EFF7FC] p-6 rounded-2xl border-2 border-[#E5F0ED] hover:border-[#4A9FD8] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-[#4A9FD8]/10 text-[#4A9FD8] text-xs font-semibold rounded-full">BETINA</span>
                        </div>
                        <h3 class="text-xl font-bold text-[#1A3A35] mb-2">Sterilisasi Anjing</h3>
                        <p class="text-3xl font-bold text-[#4A9FD8] mb-3">Rp 1.500.000</p>
                        <p class="text-[#5A7A76] text-sm leading-relaxed mb-4">Operasi sterilisasi untuk anjing betina dengan perawatan intensif</p>
                        <div class="flex items-center gap-2 text-xs text-[#5A7A76]">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Termasuk rawat inap 1 hari</span>
                        </div>
                    </div>

                    <!-- Kastrasi Anjing -->
                    <div class="group bg-gradient-to-br from-white to-[#EFF7FC] p-6 rounded-2xl border-2 border-[#E5F0ED] hover:border-[#4A9FD8] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-[#4A9FD8]/10 text-[#4A9FD8] text-xs font-semibold rounded-full">JANTAN</span>
                        </div>
                        <h3 class="text-xl font-bold text-[#1A3A35] mb-2">Kastrasi Anjing</h3>
                        <p class="text-3xl font-bold text-[#4A9FD8] mb-3">Rp 1.000.000</p>
                        <p class="text-[#5A7A76] text-sm leading-relaxed mb-4">Operasi kastrasi untuk anjing jantan dengan perawatan intensif</p>
                        <div class="flex items-center gap-2 text-xs text-[#5A7A76]">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Termasuk rawat inap 1 hari</span>
                        </div>
                    </div>

                    <!-- Bedah Minor -->
                    <div class="group bg-gradient-to-br from-white to-[#EFF7FC] p-6 rounded-2xl border-2 border-[#E5F0ED] hover:border-[#4A9FD8] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-[#52C77B]/10 text-[#52C77B] text-xs font-semibold rounded-full">MINOR</span>
                        </div>
                        <h3 class="text-xl font-bold text-[#1A3A35] mb-2">Bedah Minor</h3>
                        <p class="text-3xl font-bold text-[#4A9FD8] mb-1">Mulai Rp 500.000</p>
                        <p class="text-xs text-[#5A7A76] mb-3">tergantung prosedur</p>
                        <p class="text-[#5A7A76] text-sm leading-relaxed mb-4">Operasi kecil seperti pengangkatan tumor, jahit luka, dll</p>
                        <div class="flex items-center gap-2 text-xs text-[#5A7A76]">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Konsultasi harga detail</span>
                        </div>
                    </div>

                    <!-- Bedah Mayor -->
                    <div class="group bg-gradient-to-br from-white to-[#EFF7FC] p-6 rounded-2xl border-2 border-[#E5F0ED] hover:border-[#4A9FD8] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-[#E85D5D]/10 text-[#E85D5D] text-xs font-semibold rounded-full">MAYOR</span>
                        </div>
                        <h3 class="text-xl font-bold text-[#1A3A35] mb-2">Bedah Mayor</h3>
                        <p class="text-3xl font-bold text-[#4A9FD8] mb-1">Mulai Rp 2.000.000</p>
                        <p class="text-xs text-[#5A7A76] mb-3">tergantung kompleksitas</p>
                        <p class="text-[#5A7A76] text-sm leading-relaxed mb-4">Operasi kompleks dengan perawatan intensif</p>
                        <div class="flex items-center gap-2 text-xs text-[#5A7A76]">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Termasuk rawat inap</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grooming -->
            <div class="mb-16">
                <div class="text-center mb-12">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#EDFAF2] rounded-full mb-4">
                        <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm font-medium text-[#1A3A35]">Kategori 4</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-heading font-bold text-[#1A3A35]">Grooming & Perawatan</h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Mandi Basic -->
                    <div class="group bg-gradient-to-br from-white to-[#EDFAF2] p-6 rounded-2xl border-2 border-[#E5F0ED] hover:border-[#52C77B] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-[#52C77B]/10 text-[#52C77B] text-xs font-semibold rounded-full">BASIC</span>
                        </div>
                        <h3 class="text-xl font-bold text-[#1A3A35] mb-2">Mandi Basic</h3>
                        <p class="text-3xl font-bold text-[#52C77B] mb-3">Rp 75.000</p>
                        <p class="text-[#5A7A76] text-sm leading-relaxed mb-4">Mandi, blow dry, dan potong kuku</p>
                        <div class="flex items-center gap-2 text-xs text-[#5A7A76]">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Perawatan dasar harian</span>
                        </div>
                    </div>

                    <!-- Grooming Full -->
                    <div class="group bg-gradient-to-br from-[#52C77B] to-[#2D7A6E] text-white p-6 rounded-2xl border-2 border-[#52C77B] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-xs font-semibold rounded-full">POPULER</span>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Grooming Full</h3>
                        <p class="text-3xl font-bold mb-3">Rp 200.000</p>
                        <p class="text-white/90 text-sm leading-relaxed mb-4">Mandi, styling, potong kuku, bersih telinga</p>
                        <div class="flex items-center gap-2 text-xs text-white/80">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Perawatan lengkap</span>
                        </div>
                    </div>

                    <!-- Trimming -->
                    <div class="group bg-gradient-to-br from-white to-[#EDFAF2] p-6 rounded-2xl border-2 border-[#E5F0ED] hover:border-[#52C77B] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-[#52C77B]/10 text-[#52C77B] text-xs font-semibold rounded-full">STYLING</span>
                        </div>
                        <h3 class="text-xl font-bold text-[#1A3A35] mb-2">Trimming</h3>
                        <p class="text-3xl font-bold text-[#52C77B] mb-3">Rp 150.000</p>
                        <p class="text-[#5A7A76] text-sm leading-relaxed mb-4">Potong dan styling bulu</p>
                        <div class="flex items-center gap-2 text-xs text-[#5A7A76]">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Gaya sesuai ras hewan</span>
                        </div>
                    </div>

                    <!-- Spa Treatment -->
                    <div class="group bg-gradient-to-br from-white to-[#EDFAF2] p-6 rounded-2xl border-2 border-[#E5F0ED] hover:border-[#52C77B] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-[#FFB088]/10 text-[#FF8F5B] text-xs font-semibold rounded-full">PREMIUM</span>
                        </div>
                        <h3 class="text-xl font-bold text-[#1A3A35] mb-2">Spa Treatment</h3>
                        <p class="text-3xl font-bold text-[#52C77B] mb-3">Rp 300.000</p>
                        <p class="text-[#5A7A76] text-sm leading-relaxed mb-4">Perawatan spa lengkap dengan aromaterapi</p>
                        <div class="flex items-center gap-2 text-xs text-[#5A7A76]">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Relaksasi maksimal</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rawat Inap & Lab -->
            <div>
                <div class="text-center mb-12">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#FFF8ED] rounded-full mb-4">
                        <svg class="w-4 h-4 text-[#FFA94D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <span class="text-sm font-medium text-[#1A3A35]">Kategori 5</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-heading font-bold text-[#1A3A35]">Rawat Inap & Laboratorium</h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Rawat Inap -->
                    <div class="group bg-gradient-to-br from-white to-[#FFF8ED] p-6 rounded-2xl border-2 border-[#E5F0ED] hover:border-[#FFA94D] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-[#FFA94D]/10 text-[#FFA94D] text-xs font-semibold rounded-full">PERAWATAN</span>
                        </div>
                        <h3 class="text-xl font-bold text-[#1A3A35] mb-2">Rawat Inap</h3>
                        <p class="text-3xl font-bold text-[#FFA94D] mb-1">Rp 150.000</p>
                        <p class="text-xs text-[#5A7A76] mb-3">per hari</p>
                        <p class="text-[#5A7A76] text-sm leading-relaxed mb-4">Perawatan intensif dengan monitoring 24/7</p>
                        <div class="flex items-center gap-2 text-xs text-[#5A7A76]">
                            <svg class="w-4 h-4 text-[#FFA94D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Termasuk makan & obat</span>
                        </div>
                    </div>

                    <!-- Tes Darah -->
                    <div class="group bg-gradient-to-br from-white to-[#FFF8ED] p-6 rounded-2xl border-2 border-[#E5F0ED] hover:border-[#FFA94D] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-[#FFA94D]/10 text-[#FFA94D] text-xs font-semibold rounded-full">DIAGNOSTIK</span>
                        </div>
                        <h3 class="text-xl font-bold text-[#1A3A35] mb-2">Tes Darah</h3>
                        <p class="text-3xl font-bold text-[#FFA94D] mb-3">Rp 200.000</p>
                        <p class="text-[#5A7A76] text-sm leading-relaxed mb-4">Pemeriksaan darah lengkap (CBC)</p>
                        <div class="flex items-center gap-2 text-xs text-[#5A7A76]">
                            <svg class="w-4 h-4 text-[#FFA94D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Hasil dalam 2-3 jam</span>
                        </div>
                    </div>

                    <!-- X-Ray -->
                    <div class="group bg-gradient-to-br from-white to-[#FFF8ED] p-6 rounded-2xl border-2 border-[#E5F0ED] hover:border-[#FFA94D] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-[#FFA94D]/10 text-[#FFA94D] text-xs font-semibold rounded-full">DIAGNOSTIK</span>
                        </div>
                        <h3 class="text-xl font-bold text-[#1A3A35] mb-2">X-Ray</h3>
                        <p class="text-3xl font-bold text-[#FFA94D] mb-3">Rp 250.000</p>
                        <p class="text-[#5A7A76] text-sm leading-relaxed mb-4">Foto rontgen digital per area</p>
                        <div class="flex items-center gap-2 text-xs text-[#5A7A76]">
                            <svg class="w-4 h-4 text-[#FFA94D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Teknologi digital HD</span>
                        </div>
                    </div>

                    <!-- USG -->
                    <div class="group bg-gradient-to-br from-white to-[#FFF8ED] p-6 rounded-2xl border-2 border-[#E5F0ED] hover:border-[#FFA94D] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-[#FFA94D]/10 text-[#FFA94D] text-xs font-semibold rounded-full">DIAGNOSTIK</span>
                        </div>
                        <h3 class="text-xl font-bold text-[#1A3A35] mb-2">USG</h3>
                        <p class="text-3xl font-bold text-[#FFA94D] mb-3">Rp 300.000</p>
                        <p class="text-[#5A7A76] text-sm leading-relaxed mb-4">Ultrasonografi untuk diagnosis</p>
                        <div class="flex items-center gap-2 text-xs text-[#5A7A76]">
                            <svg class="w-4 h-4 text-[#FFA94D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Hasil real-time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="py-16 lg:py-20 bg-gradient-to-b from-neutral-50 to-white">
        <div class="container-custom">
            <div class="bg-gradient-to-br from-[#F0F8F6] to-[#E5F0ED] p-8 lg:p-12 rounded-3xl border-2 border-[#2D7A6E]/20">
                <div class="grid lg:grid-cols-2 gap-8 items-center">
                    <div>
                        <h3 class="text-3xl font-heading font-bold text-[#1A3A35] mb-4">Informasi Penting</h3>
                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-[#52C77B] rounded-full flex items-center justify-center text-white flex-shrink-0 mt-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <p class="text-[#5A7A76]"><span class="font-semibold text-[#1A3A35]">Harga dapat berubah</span> tergantung kondisi dan berat hewan peliharaan</p>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-[#52C77B] rounded-full flex items-center justify-center text-white flex-shrink-0 mt-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <p class="text-[#5A7A76]"><span class="font-semibold text-[#1A3A35]">Konsultasi gratis</span> untuk estimasi biaya lebih detail</p>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-[#52C77B] rounded-full flex items-center justify-center text-white flex-shrink-0 mt-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <p class="text-[#5A7A76]"><span class="font-semibold text-[#1A3A35]">Sistem pembayaran</span> tunai, transfer, dan kartu kredit</p>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-[#52C77B] rounded-full flex items-center justify-center text-white flex-shrink-0 mt-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <p class="text-[#5A7A76]"><span class="font-semibold text-[#1A3A35]">Paket hemat</span> tersedia untuk layanan berkala</p>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-[#52C77B] rounded-full flex items-center justify-center text-white flex-shrink-0 mt-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <p class="text-[#5A7A76]"><span class="font-semibold text-[#1A3A35]">Garansi layanan</span> untuk operasi dan perawatan tertentu</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-8 rounded-2xl shadow-lg border-2 border-[#E5F0ED]">
                        <div class="text-center mb-6">
                            <div class="w-20 h-20 bg-gradient-to-br from-[#FFB088] to-[#FF8F5B] rounded-full flex items-center justify-center text-white mx-auto mb-4">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h4 class="text-2xl font-heading font-bold text-[#1A3A35] mb-2">Butuh Estimasi Biaya?</h4>
                            <p class="text-[#5A7A76]">Hubungi kami untuk konsultasi dan estimasi biaya yang lebih akurat</p>
                        </div>
                        <a href="{{ route('contact') }}" class="block w-full text-center bg-gradient-to-r from-[#FF8F5B] to-[#FFB088] hover:from-[#FF8F5B]/90 hover:to-[#FFB088]/90 text-white px-6 py-4 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl">
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 lg:py-20 bg-gradient-to-br from-[#2D7A6E] to-[#1F5951] relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        </div>
        
        <div class="container-custom text-center relative z-10">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-heading font-bold text-white mb-6">
                Siap Memulai Perawatan?
            </h2>
            <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                Investasi terbaik untuk kesehatan hewan peliharaan Anda dimulai hari ini
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('login') }}" class="inline-flex items-center gap-2 bg-[#FF8F5B] hover:bg-[#FF8F5B]/90 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Buat Janji Sekarang
                </a>
                <a href="{{ route('services') }}" class="inline-flex items-center gap-2 border-2 border-white hover:bg-white/10 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Lihat Layanan
                </a>
            </div>
        </div>
    </section>

    <x-footer />

    <button id="scrollTop" class="fixed bottom-8 right-8 w-14 h-14 bg-gradient-to-br from-primary-600 to-primary-700 text-white rounded-full shadow-2xl hover:shadow-3xl hover:scale-110 transition-all duration-300 opacity-0 invisible z-50 flex items-center justify-center group">
        <svg class="w-6 h-6 transition-transform group-hover:-translate-y-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>

    <script>
        const scrollTopBtn = document.getElementById('scrollTop');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollTopBtn.classList.remove('opacity-0', 'invisible');
                scrollTopBtn.classList.add('opacity-100', 'visible');
            } else {
                scrollTopBtn.classList.add('opacity-0', 'invisible');
                scrollTopBtn.classList.remove('opacity-100', 'visible');
            }
        });

        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>
