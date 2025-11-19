<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Layanan Darurat 24/7 - VetWell Clinic</title>
    <meta name="description" content="Layanan darurat veteriner 24/7 untuk hewan peliharaan Anda. Segera hubungi kami untuk keadaan darurat.">
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:300,400,500,600,700|poppins:400,500,600,700|quicksand:400,500,600,700" rel="stylesheet">
    
    @vite('resources/css/app.css')
</head>
<body class="antialiased font-sans text-neutral-800">
    <x-navbar />

    <!-- hero section -->
    <section class="relative bg-gradient-to-br from-[#FDEAEA] via-white to-[#FFF5EC] overflow-hidden pt-32 pb-20">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-10 w-64 h-64 bg-[#E85D5D] rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-[#FFB088] rounded-full blur-3xl"></div>
        </div>

        <div class="container-custom relative z-10">
            <div class="max-w-5xl mx-auto text-center">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/80 backdrop-blur-sm rounded-full mb-6 shadow-sm border border-[#E85D5D]/30">
                    <svg class="w-5 h-5 text-[#E85D5D] animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span class="text-sm font-medium text-[#D44545]">Tersedia 24 Jam / 7 Hari</span>
                </div>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-heading font-bold text-[#1A3A35] mb-6">
                    Layanan <span class="text-[#E85D5D]">Darurat 24/7</span>
                </h1>
                
                <p class="text-lg md:text-xl text-[#5A7A76] leading-relaxed max-w-3xl mx-auto mb-10">
                    Kami siap memberikan perawatan darurat untuk hewan peliharaan Anda kapan pun dibutuhkan dengan tim medis yang selalu standby
                </p>

                <!-- Emergency Contact Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center mb-10">
                    <a href="tel:+6281234567890" class="group inline-flex items-center justify-center gap-3 bg-gradient-to-r from-[#E85D5D] to-[#D44545] hover:from-[#D44545] hover:to-[#C43535] text-white px-10 py-5 rounded-xl font-bold transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105 text-lg animate-pulse">
                        <svg class="w-7 h-7 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        Hubungi Darurat: +62 812-3456-7890
                    </a>
                </div>

                <!-- Emergency Response Stats -->
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 max-w-2xl mx-auto">
                    <div class="bg-white/80 backdrop-blur-sm p-5 rounded-2xl border border-[#E5F0ED] shadow-sm hover:shadow-md transition-all duration-300">
                        <div class="text-3xl lg:text-4xl font-bold text-[#E85D5D] mb-1">&lt;15</div>
                        <div class="text-sm text-[#5A7A76] font-medium">Menit Respons</div>
                    </div>
                    <div class="bg-white/80 backdrop-blur-sm p-5 rounded-2xl border border-[#E5F0ED] shadow-sm hover:shadow-md transition-all duration-300">
                        <div class="text-3xl lg:text-4xl font-bold text-[#E85D5D] mb-1">24/7</div>
                        <div class="text-sm text-[#5A7A76] font-medium">Selalu Siaga</div>
                    </div>
                    <div class="bg-white/80 backdrop-blur-sm p-5 rounded-2xl border border-[#E5F0ED] shadow-sm hover:shadow-md transition-all duration-300 col-span-2 md:col-span-1">
                        <div class="text-3xl lg:text-4xl font-bold text-[#E85D5D] mb-1">100%</div>
                        <div class="text-sm text-[#5A7A76] font-medium">Komitmen</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- When to seek emergency care -->
    <section class="py-16 lg:py-20 bg-white">
        <div class="container-custom">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#FDEAEA] rounded-full mb-4">
                    <svg class="w-4 h-4 text-[#E85D5D]" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm font-medium text-[#D44545]">Tanda-Tanda Darurat</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-heading font-bold text-[#1A3A35] mb-4">
                    Kapan Harus Mencari Perawatan Darurat?
                </h2>
                <p class="text-lg text-[#5A7A76]">
                    Hubungi kami segera jika hewan peliharaan Anda mengalami salah satu dari kondisi berikut
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Emergency Sign 1 -->
                <div class="group p-6 bg-gradient-to-br from-white to-[#FDEAEA] rounded-2xl border-2 border-[#E85D5D]/20 hover:border-[#E85D5D] transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="w-12 h-12 bg-[#E85D5D] rounded-xl flex items-center justify-center text-white mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold text-[#1A3A35] mb-2">Kesulitan Bernapas</h3>
                    <p class="text-[#5A7A76]">
                        Napas tersengal-sengal, mengi, atau bernafas dengan mulut terbuka (untuk kucing)
                    </p>
                </div>

                <!-- Emergency Sign 2 -->
                <div class="group p-6 bg-gradient-to-br from-white to-[#FDEAEA] rounded-2xl border-2 border-[#E85D5D]/20 hover:border-[#E85D5D] transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="w-12 h-12 bg-[#E85D5D] rounded-xl flex items-center justify-center text-white mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold text-[#1A3A35] mb-2">Tidak Sadarkan Diri</h3>
                    <p class="text-[#5A7A76]">
                        Pingsan, kejang, atau tidak responsif terhadap rangsangan
                    </p>
                </div>

                <!-- Emergency Sign 3 -->
                <div class="group p-6 bg-gradient-to-br from-white to-[#FDEAEA] rounded-2xl border-2 border-[#E85D5D]/20 hover:border-[#E85D5D] transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="w-12 h-12 bg-[#E85D5D] rounded-xl flex items-center justify-center text-white mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold text-[#1A3A35] mb-2">Pendarahan Parah</h3>
                    <p class="text-[#5A7A76]">
                        Pendarahan yang tidak berhenti setelah 5 menit tekanan langsung
                    </p>
                </div>

                <!-- Emergency Sign 4 -->
                <div class="group p-6 bg-gradient-to-br from-white to-[#FDEAEA] rounded-2xl border-2 border-[#E85D5D]/20 hover:border-[#E85D5D] transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="w-12 h-12 bg-[#E85D5D] rounded-xl flex items-center justify-center text-white mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold text-[#1A3A35] mb-2">Keracunan</h3>
                    <p class="text-[#5A7A76]">
                        Menelan zat beracun, makanan berbahaya, atau obat-obatan
                    </p>
                </div>

                <!-- Emergency Sign 5 -->
                <div class="group p-6 bg-gradient-to-br from-white to-[#FDEAEA] rounded-2xl border-2 border-[#E85D5D]/20 hover:border-[#E85D5D] transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="w-12 h-12 bg-[#E85D5D] rounded-xl flex items-center justify-center text-white mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold text-[#1A3A35] mb-2">Trauma Serius</h3>
                    <p class="text-[#5A7A76]">
                        Tertabrak kendaraan, jatuh dari ketinggian, atau cedera parah lainnya
                    </p>
                </div>

                <!-- Emergency Sign 6 -->
                <div class="group p-6 bg-gradient-to-br from-white to-[#FDEAEA] rounded-2xl border-2 border-[#E85D5D]/20 hover:border-[#E85D5D] transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="w-12 h-12 bg-[#E85D5D] rounded-xl flex items-center justify-center text-white mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold text-[#1A3A35] mb-2">Sulit Buang Air</h3>
                    <p class="text-[#5A7A76]">
                        Tidak bisa buang air kecil atau besar, menunjukkan tanda-tanda nyeri saat mencoba
                    </p>
                </div>

                <!-- Emergency Sign 7 -->
                <div class="group p-6 bg-gradient-to-br from-white to-[#FDEAEA] rounded-2xl border-2 border-[#E85D5D]/20 hover:border-[#E85D5D] transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="w-12 h-12 bg-[#E85D5D] rounded-xl flex items-center justify-center text-white mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold text-[#1A3A35] mb-2">Nyeri Ekstrem</h3>
                    <p class="text-[#5A7A76]">
                        Menjerit, menggigit, atau menunjukkan tanda-tanda nyeri yang tidak biasa
                    </p>
                </div>

                <!-- Emergency Sign 8 -->
                <div class="group p-6 bg-gradient-to-br from-white to-[#FDEAEA] rounded-2xl border-2 border-[#E85D5D]/20 hover:border-[#E85D5D] transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="w-12 h-12 bg-[#E85D5D] rounded-xl flex items-center justify-center text-white mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold text-[#1A3A35] mb-2">Muntah Berlebihan</h3>
                    <p class="text-[#5A7A76]">
                        Muntah terus-menerus atau muntah darah, disertai kelemahan
                    </p>
                </div>

                <!-- Emergency Sign 9 -->
                <div class="group p-6 bg-gradient-to-br from-white to-[#FDEAEA] rounded-2xl border-2 border-[#E85D5D]/20 hover:border-[#E85D5D] transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="w-12 h-12 bg-[#E85D5D] rounded-xl flex items-center justify-center text-white mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold text-[#1A3A35] mb-2">Heatstroke</h3>
                    <p class="text-[#5A7A76]">
                        Terengah-engah berlebihan, lidah merah terang, disorientasi setelah terpapar panas
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- What to expect -->
    <section class="py-16 lg:py-20 bg-gradient-to-b from-neutral-50 to-white">
        <div class="container-custom">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl md:text-5xl font-heading font-bold text-[#1A3A35] mb-4">
                    Apa yang Diharapkan
                </h2>
                <p class="text-lg text-[#5A7A76]">
                    Proses perawatan darurat kami dirancang untuk memberikan respons cepat dan efektif
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Step 1 -->
                <div class="relative">
                    <div class="bg-white p-8 rounded-3xl shadow-lg border-2 border-[#E5F0ED] hover:shadow-xl transition-all duration-300">
                        <div class="absolute -top-4 -left-4 w-12 h-12 bg-gradient-to-br from-[#2D7A6E] to-[#1F5951] rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg">
                            1
                        </div>
                        <div class="w-16 h-16 bg-[#E5F0ED] rounded-2xl flex items-center justify-center text-[#2D7A6E] mb-4 mx-auto">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-heading font-bold text-[#1A3A35] mb-2 text-center">Hubungi Kami</h3>
                        <p class="text-[#5A7A76] text-center">
                            Telepon segera ke nomor darurat kami 24/7
                        </p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="relative">
                    <div class="bg-white p-8 rounded-3xl shadow-lg border-2 border-[#E5F0ED] hover:shadow-xl transition-all duration-300">
                        <div class="absolute -top-4 -left-4 w-12 h-12 bg-gradient-to-br from-[#FFB088] to-[#FF8F5B] rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg">
                            2
                        </div>
                        <div class="w-16 h-16 bg-[#FFF5EC] rounded-2xl flex items-center justify-center text-[#FF8F5B] mb-4 mx-auto">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-heading font-bold text-[#1A3A35] mb-2 text-center">Penilaian Awal</h3>
                        <p class="text-[#5A7A76] text-center">
                            Tim kami akan menilai kondisi hewan peliharaan Anda
                        </p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="relative">
                    <div class="bg-white p-8 rounded-3xl shadow-lg border-2 border-[#E5F0ED] hover:shadow-xl transition-all duration-300">
                        <div class="absolute -top-4 -left-4 w-12 h-12 bg-gradient-to-br from-[#4A9FD8] to-[#357AB8] rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg">
                            3
                        </div>
                        <div class="w-16 h-16 bg-[#EFF7FC] rounded-2xl flex items-center justify-center text-[#4A9FD8] mb-4 mx-auto">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-heading font-bold text-[#1A3A35] mb-2 text-center">Perawatan Segera</h3>
                        <p class="text-[#5A7A76] text-center">
                            Stabilisasi dan perawatan medis darurat
                        </p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="relative">
                    <div class="bg-white p-8 rounded-3xl shadow-lg border-2 border-[#E5F0ED] hover:shadow-xl transition-all duration-300">
                        <div class="absolute -top-4 -left-4 w-12 h-12 bg-gradient-to-br from-[#52C77B] to-[#3DA85F] rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg">
                            4
                        </div>
                        <div class="w-16 h-16 bg-[#EDFAF2] rounded-2xl flex items-center justify-center text-[#52C77B] mb-4 mx-auto">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-heading font-bold text-[#1A3A35] mb-2 text-center">Follow-up</h3>
                        <p class="text-[#5A7A76] text-center">
                            Instruksi perawatan lanjutan dan monitoring
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Emergency Preparation Tips -->
    <section class="py-16 lg:py-20 bg-white">
        <div class="container-custom">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#E5F0ED] rounded-full mb-6">
                        <svg class="w-4 h-4 text-[#2D7A6E]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm font-medium text-[#1A3A35]">Tips Persiapan</span>
                    </div>
                    
                    <h2 class="text-4xl md:text-5xl font-heading font-bold text-[#1A3A35] mb-6">
                        Siapkan Diri untuk Keadaan Darurat
                    </h2>
                    
                    <p class="text-lg text-[#5A7A76] mb-8">
                        Bersiaplah sebelum terjadi keadaan darurat dapat menyelamatkan nyawa hewan peliharaan Anda
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 bg-[#52C77B] rounded-lg flex items-center justify-center text-white flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-[#1A3A35] mb-1">Simpan Nomor Darurat</h4>
                                <p class="text-[#5A7A76]">Simpan nomor telepon darurat kami di ponsel Anda</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 bg-[#52C77B] rounded-lg flex items-center justify-center text-white flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-[#1A3A35] mb-1">Kotak P3K Hewan</h4>
                                <p class="text-[#5A7A76]">Siapkan kotak P3K khusus untuk hewan peliharaan</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 bg-[#52C77B] rounded-lg flex items-center justify-center text-white flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-[#1A3A35] mb-1">Rekam Medis</h4>
                                <p class="text-[#5A7A76]">Simpan salinan rekam medis dan riwayat vaksinasi</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 bg-[#52C77B] rounded-lg flex items-center justify-center text-white flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-[#1A3A35] mb-1">Kenali Tanda Bahaya</h4>
                                <p class="text-[#5A7A76]">Pelajari tanda-tanda darurat pada hewan peliharaan</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 bg-[#52C77B] rounded-lg flex items-center justify-center text-white flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-[#1A3A35] mb-1">Transportasi</h4>
                                <p class="text-[#5A7A76]">Siapkan carrier atau metode transportasi yang aman</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="aspect-[4/3] rounded-3xl overflow-hidden shadow-2xl border-4 border-[#E5F0ED]">
                        <img src="{{ asset('assets/facility.jpg') }}" alt="Emergency Preparation" class="w-full h-full object-cover">
                    </div>
                    
                    <!-- Floating card -->
                    <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-2xl shadow-2xl border-2 border-[#E5F0ED] max-w-xs">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-10 h-10 bg-[#E85D5D] rounded-lg flex items-center justify-center text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-[#1A3A35]">24/7</p>
                                <p class="text-sm text-[#5A7A76]">Layanan Darurat</p>
                            </div>
                        </div>
                        <p class="text-sm text-[#E85D5D] font-semibold">Selalu Siap Membantu Anda</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Emergency CTA -->
    <section class="py-16 lg:py-20 bg-gradient-to-br from-[#E85D5D] to-[#D44545] relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        </div>
        
        <div class="container-custom text-center relative z-10">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-heading font-bold text-white mb-6">
                    Butuh Bantuan Darurat?
                </h2>
                <p class="text-xl text-white/90 mb-8">
                    Jangan ragu untuk menghubungi kami kapan saja. Setiap detik sangat berarti dalam keadaan darurat.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="tel:+6281234567890" class="inline-flex items-center justify-center gap-3 bg-white hover:bg-gray-50 text-[#E85D5D] px-10 py-5 rounded-xl font-bold transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105 text-lg">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        Hubungi Sekarang
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 border-2 border-white hover:bg-white/10 text-white px-8 py-5 rounded-xl font-semibold transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Lihat Lokasi
                    </a>
                </div>
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
