<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VetWell Clinic - Memberikan Yang Terbaik Untuk Peliharaan Anda</title>
    <meta name="description" content="Professional veterinary services with compassionate care for your beloved pets. 24/7 emergency care, expert veterinarians, and modern facilities.">
    
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:300,400,500,600,700|poppins:400,500,600,700|quicksand:400,500,600,700" rel="stylesheet">
    
    @vite('resources/css/app.css')
</head>
<body class="antialiased font-sans text-neutral-800">
    <!-- navbar -->
    <x-navbar />

    <!-- hero section dengan -->
    <section class="relative bg-gradient-to-br from-[#F0F8F6] via-white to-[#FFF5EC] overflow-hidden pt-24 lg:pt-32 pb-20">
        <!-- dekoratif background -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-10 w-64 h-64 bg-[#2D7A6E] rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-[#FFB088] rounded-full blur-3xl"></div>
        </div>

        <div class="container-custom relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <!-- hero content -->
                <div class="space-y-8 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#E5F0ED] rounded-full border border-[#C7DDD8]">
                        <svg class="w-5 h-5 text-[#2D7A6E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span class="text-sm font-medium text-[#1A3A35]">layanan veteriner terpercaya sejak 2015</span>
                    </div>
                    
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-heading font-bold leading-tight text-[#1A3A35]">
                        Perawatan Terbaik untuk <span class="text-[#2D7A6E] relative inline-block">Anabul Anda
                            <svg class="absolute -bottom-2 left-0 w-full h-3 text-[#FFB088]" viewBox="0 0 200 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 10C50 2 150 2 198 10" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                            </svg>
                        </span>
                    </h1>
                    
                    <p class="text-xl md:text-2xl text-[#5A7A76] leading-relaxed max-w-2xl mx-auto lg:mx-0">
                        Layanan veteriner profesional dengan sentuhan personal. Kami memperlakukan hewan peliharaan Anda seperti keluarga, karena mereka memang keluarga.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#book" class="group inline-flex items-center justify-center gap-2 bg-[#FF8F5B] hover:bg-[#FF8F5B]/90 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105">
                            <svg class="w-6 h-6 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Buat Janji
                        </a>
                        <a href="{{ route('emergency') }}" class="group inline-flex items-center justify-center gap-2 border-2 border-[#2D7A6E] hover:bg-[#2D7A6E] text-[#2D7A6E] hover:text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300">
                            <svg class="w-6 h-6 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            Darurat 24/7
                        </a>
                    </div>
                </div>

                <!-- hero image -->
                <div class="relative">
                    <div class="relative z-10 rounded-3xl overflow-hidden shadow-2xl">
                        <img src="{{ asset('assets/hero-section.webp') }}" alt="Perawatan Hewan di VetWell" class="w-full h-auto object-cover">
                    </div>
                    
                    <!-- floating card 1 -->
                    <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-2xl shadow-2xl border border-[#E5F0ED] transform hover:scale-105 transition-transform duration-300 z-20">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-[#52C77B]/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-8 h-8 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <div class="font-bold text-lg text-[#1A3A35]">Tersedia 24/7</div>
                                <div class="text-sm text-[#5A7A76]">Siap Darurat</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- floating card 2 -->
                    <div class="absolute -top-6 -right-6 bg-white p-5 rounded-2xl shadow-2xl border border-[#E5F0ED] transform hover:scale-105 transition-transform duration-300 hidden lg:block z-20">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-[#2D7A6E]/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-7 h-7 text-[#2D7A6E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <div>
                                <div class="font-bold text-[#1A3A35]">Tim Ahli</div>
                                <div class="text-sm text-[#5A7A76]">Dokter Tersertifikasi</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- section tentang klinik -->
    <section id="about" class="py-16 lg:py-20 bg-gradient-to-b from-white to-neutral-50">
        <div class="container-custom">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#E5F0ED] rounded-full mb-4">
                    <svg class="w-4 h-4 text-[#2D7A6E]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <span class="text-sm font-medium text-[#1A3A35]">Keunggulan Kami</span>
                </div>
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-heading font-bold text-[#1A3A35] mb-6">
                    Mengapa Memilih Kami?
                </h2>
                <p class="text-lg md:text-xl text-[#5A7A76] leading-relaxed">
                    Kami menggabungkan keahlian medis canggih dengan kasih sayang yang tulus untuk memberikan perawatan terbaik bagi sahabat berbulu Anda.
                </p>
            </div>

            <!-- grid fitur klinik -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- fitur 1: tim dokter expert -->
                <div class="group relative bg-gradient-to-br from-white to-[#F0F8F6] p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-[#E5F0ED] hover:border-[#2D7A6E] overflow-hidden hover:-translate-y-2">
                    <!-- pattern background -->
                    <div class="absolute top-0 right-0 w-32 h-32 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#2D7A6E" d="M45,-55C58.2,-45.7,68.5,-32.4,73.5,-17.1C78.5,-1.9,78.2,15.3,71.1,29.3C64.1,43.3,50.3,54.1,35.3,61.1C20.3,68.1,4.1,71.3,-12.2,69.1C-28.5,66.9,-45,59.3,-56.8,47.5C-68.6,35.7,-75.7,19.7,-76.2,3.4C-76.7,-12.9,-70.6,-29.5,-60.3,-42.3C-50,-55.1,-35.5,-64.1,-20.5,-68.9C-5.5,-73.7,10,-74.3,23.8,-68.8C37.6,-63.3,49.8,-51.7,45,-55Z" transform="translate(100 100)" />
                        </svg>
                    </div>
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#2D7A6E] to-[#1F5951] rounded-2xl flex items-center justify-center text-white group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300 flex-shrink-0">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div class="w-10 h-10 bg-[#2D7A6E]/10 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#2D7A6E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-heading font-semibold text-[#1A3A35] mb-3">Dokter Hewan Ahli</h3>
                    <p class="text-[#5A7A76] leading-relaxed">
                        Tim kami terdiri dari dokter hewan yang sangat berkualitas dan berpengalaman yang berdedikasi untuk kesejahteraan hewan peliharaan Anda.
                    </p>
                </div>

                <!-- fitur 2: fasilitas modern -->
                <div class="group relative bg-gradient-to-br from-white to-[#EFF7FC] p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-[#E5F0ED] hover:border-[#4A9FD8] overflow-hidden hover:-translate-y-2">
                    <!-- pattern background -->
                    <div class="absolute top-0 right-0 w-32 h-32 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#4A9FD8" d="M45,-55C58.2,-45.7,68.5,-32.4,73.5,-17.1C78.5,-1.9,78.2,15.3,71.1,29.3C64.1,43.3,50.3,54.1,35.3,61.1C20.3,68.1,4.1,71.3,-12.2,69.1C-28.5,66.9,-45,59.3,-56.8,47.5C-68.6,35.7,-75.7,19.7,-76.2,3.4C-76.7,-12.9,-70.6,-29.5,-60.3,-42.3C-50,-55.1,-35.5,-64.1,-20.5,-68.9C-5.5,-73.7,10,-74.3,23.8,-68.8C37.6,-63.3,49.8,-51.7,45,-55Z" transform="translate(100 100)" />
                        </svg>
                    </div>
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#4A9FD8] to-[#357AB8] rounded-2xl flex items-center justify-center text-white group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300 flex-shrink-0">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div class="w-10 h-10 bg-[#4A9FD8]/10 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#4A9FD8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-heading font-semibold text-[#1A3A35] mb-3">Fasilitas Modern</h3>
                    <p class="text-[#5A7A76] leading-relaxed">
                        Peralatan canggih dan fasilitas yang nyaman memastikan perawatan terbaik untuk hewan peliharaan Anda.
                    </p>
                </div>

                <!-- fitur 3: compassionate care -->
                <div class="group relative bg-gradient-to-br from-white to-[#FFF5EC] p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-[#E5F0ED] hover:border-[#FFB088] overflow-hidden hover:-translate-y-2">
                    <!-- pattern background -->
                    <div class="absolute top-0 right-0 w-32 h-32 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#FFB088" d="M45,-55C58.2,-45.7,68.5,-32.4,73.5,-17.1C78.5,-1.9,78.2,15.3,71.1,29.3C64.1,43.3,50.3,54.1,35.3,61.1C20.3,68.1,4.1,71.3,-12.2,69.1C-28.5,66.9,-45,59.3,-56.8,47.5C-68.6,35.7,-75.7,19.7,-76.2,3.4C-76.7,-12.9,-70.6,-29.5,-60.3,-42.3C-50,-55.1,-35.5,-64.1,-20.5,-68.9C-5.5,-73.7,10,-74.3,23.8,-68.8C37.6,-63.3,49.8,-51.7,45,-55Z" transform="translate(100 100)" />
                        </svg>
                    </div>
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#FFB088] to-[#FF8F5B] rounded-2xl flex items-center justify-center text-white group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300 flex-shrink-0">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <div class="w-10 h-10 bg-[#FFB088]/10 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#FF8F5B]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-heading font-semibold text-[#1A3A35] mb-3">Perawatan Penuh Kasih</h3>
                    <p class="text-[#5A7A76] leading-relaxed">
                        Kami memperlakukan setiap hewan peliharaan dengan cinta dan hormat, membuat kunjungan mereka senyaman mungkin.
                    </p>
                </div>

                <!-- fitur 4: emergency 24/7 -->
                <div class="group relative bg-gradient-to-br from-white to-[#FDEAEA] p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-[#E5F0ED] hover:border-[#E85D5D] overflow-hidden hover:-translate-y-2">
                    <!-- pattern background -->
                    <div class="absolute top-0 right-0 w-32 h-32 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#E85D5D" d="M45,-55C58.2,-45.7,68.5,-32.4,73.5,-17.1C78.5,-1.9,78.2,15.3,71.1,29.3C64.1,43.3,50.3,54.1,35.3,61.1C20.3,68.1,4.1,71.3,-12.2,69.1C-28.5,66.9,-45,59.3,-56.8,47.5C-68.6,35.7,-75.7,19.7,-76.2,3.4C-76.7,-12.9,-70.6,-29.5,-60.3,-42.3C-50,-55.1,-35.5,-64.1,-20.5,-68.9C-5.5,-73.7,10,-74.3,23.8,-68.8C37.6,-63.3,49.8,-51.7,45,-55Z" transform="translate(100 100)" />
                        </svg>
                    </div>
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#E85D5D] to-[#D44545] rounded-2xl flex items-center justify-center text-white group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300 flex-shrink-0">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="w-10 h-10 bg-[#E85D5D]/10 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#E85D5D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-heading font-semibold text-[#1A3A35] mb-3">Darurat 24/7</h3>
                    <p class="text-[#5A7A76] leading-relaxed">
                        Layanan darurat 24 jam tersedia kapan pun hewan peliharaan Anda membutuhkan perawatan mendesak.
                    </p>
                </div>

                <!-- fitur 5: easy booking -->
                <div class="group relative bg-gradient-to-br from-white to-[#FFF8ED] p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-[#E5F0ED] hover:border-[#FFA94D] overflow-hidden hover:-translate-y-2">
                    <!-- pattern background -->
                    <div class="absolute top-0 right-0 w-32 h-32 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#FFA94D" d="M45,-55C58.2,-45.7,68.5,-32.4,73.5,-17.1C78.5,-1.9,78.2,15.3,71.1,29.3C64.1,43.3,50.3,54.1,35.3,61.1C20.3,68.1,4.1,71.3,-12.2,69.1C-28.5,66.9,-45,59.3,-56.8,47.5C-68.6,35.7,-75.7,19.7,-76.2,3.4C-76.7,-12.9,-70.6,-29.5,-60.3,-42.3C-50,-55.1,-35.5,-64.1,-20.5,-68.9C-5.5,-73.7,10,-74.3,23.8,-68.8C37.6,-63.3,49.8,-51.7,45,-55Z" transform="translate(100 100)" />
                        </svg>
                    </div>
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#FFA94D] to-[#FF8F33] rounded-2xl flex items-center justify-center text-white group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300 flex-shrink-0">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="w-10 h-10 bg-[#FFA94D]/10 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#FFA94D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-heading font-semibold text-[#1A3A35] mb-3">Booking Mudah</h3>
                    <p class="text-[#5A7A76] leading-relaxed">
                        Jadwalkan janji temu secara online atau melalui telepon dengan sistem booking yang mudah digunakan.
                    </p>
                </div>

                <!-- fitur 6: affordable pricing -->
                <div class="group relative bg-gradient-to-br from-white to-[#EDFAF2] p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-[#E5F0ED] hover:border-[#52C77B] overflow-hidden hover:-translate-y-2">
                    <!-- pattern background -->
                    <div class="absolute top-0 right-0 w-32 h-32 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#52C77B" d="M45,-55C58.2,-45.7,68.5,-32.4,73.5,-17.1C78.5,-1.9,78.2,15.3,71.1,29.3C64.1,43.3,50.3,54.1,35.3,61.1C20.3,68.1,4.1,71.3,-12.2,69.1C-28.5,66.9,-45,59.3,-56.8,47.5C-68.6,35.7,-75.7,19.7,-76.2,3.4C-76.7,-12.9,-70.6,-29.5,-60.3,-42.3C-50,-55.1,-35.5,-64.1,-20.5,-68.9C-5.5,-73.7,10,-74.3,23.8,-68.8C37.6,-63.3,49.8,-51.7,45,-55Z" transform="translate(100 100)" />
                        </svg>
                    </div>
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#52C77B] to-[#3DA85F] rounded-2xl flex items-center justify-center text-white group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300 flex-shrink-0">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="w-10 h-10 bg-[#52C77B]/10 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-heading font-semibold text-[#1A3A35] mb-3">Harga Terjangkau</h3>
                    <p class="text-[#5A7A76] leading-relaxed">
                        Layanan veteriner berkualitas dengan harga kompetitif dan sistem pembayaran yang transparan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- section core values -->
    <section id="values" class="py-16 lg:py-20 bg-gradient-to-b from-neutral-50 to-white">
        <div class="container-custom">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#E5F0ED] rounded-full mb-4">
                    <svg class="w-4 h-4 text-[#2D7A6E]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <span class="text-sm font-medium text-[#1A3A35]">Nilai Inti Kami</span>
                </div>
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-heading font-bold text-[#1A3A35] mb-6">
                    Apa yang Kami Perjuangkan
                </h2>
                <p class="text-lg md:text-xl text-[#5A7A76] leading-relaxed">
                    Nilai-nilai inti kami memandu semua yang kami lakukan di Klinik VetWell.
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- value 1: trust dengan gambar vet.jpg -->
                <div class="group relative overflow-hidden rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-[#E5F0ED] hover:border-[#2D7A6E] hover:-translate-y-2 animate-fade-in">
                    <div class="aspect-[4/3] relative">
                        <img src="{{ asset('assets/vet.jpg') }}" alt="Kepercayaan - Dokter Hewan" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 group-hover:rotate-1">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A3A35] via-[#1A3A35]/70 to-transparent"></div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-[#2D7A6E] transition-all duration-300 group-hover:rotate-12">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-heading font-bold text-[#FF8F5B] group-hover:text-[#FFB088] transition-colors duration-300">Kepercayaan</h3>
                        </div>
                        <p class="text-sm leading-relaxed text-white/90">
                            Membangun hubungan berdasar kejujuran dan keandalan.
                        </p>
                    </div>
                </div>

                <!-- value 2: compassion dengan gambar care.jpg -->
                <div class="group relative overflow-hidden rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-[#E5F0ED] hover:border-[#FFB088] hover:-translate-y-2 animate-fade-in" style="animation-delay: 150ms;">
                    <div class="aspect-[4/3] relative">
                        <img src="{{ asset('assets/care.jpg') }}" alt="Kasih Sayang - Perawatan Hewan" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 group-hover:rotate-1">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A3A35] via-[#1A3A35]/70 to-transparent"></div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-[#FFB088] transition-all duration-300 group-hover:rotate-12">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-heading font-bold text-[#FF8F5B] group-hover:text-[#FFB088] transition-colors duration-300">Kepedulian</h3>
                        </div>
                        <p class="text-sm leading-relaxed text-white/90">
                            Memperlakukan setiap hewan peliharaan dengan penuh cinta.
                        </p>
                    </div>
                </div>

                <!-- value 3: excellence dengan gambar facility.jpg -->
                <div class="group relative overflow-hidden rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-[#E5F0ED] hover:border-[#4A9FD8] hover:-translate-y-2 animate-fade-in" style="animation-delay: 300ms;">
                    <div class="aspect-[4/3] relative">
                        <img src="{{ asset('assets/facility.jpg') }}" alt="Keunggulan - Fasilitas Modern" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 group-hover:rotate-1">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A3A35] via-[#1A3A35]/70 to-transparent"></div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-[#4A9FD8] transition-all duration-300 group-hover:rotate-12">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-heading font-bold text-[#FF8F5B] group-hover:text-[#FFB088] transition-colors duration-300">Keunggulan</h3>
                        </div>
                        <p class="text-sm leading-relaxed text-white/90">
                            Memberikan standar perawatan veteriner tertinggi.
                        </p>
                    </div>
                </div>

                <!-- value 4: innovation dengan gambar inovation.jpg -->
                <div class="group relative overflow-hidden rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-[#E5F0ED] hover:border-[#52C77B] hover:-translate-y-2 animate-fade-in" style="animation-delay: 450ms;">
                    <div class="aspect-[4/3] relative">
                        <img src="{{ asset('assets/inovation.jpg') }}" alt="Inovasi - Teknologi Modern" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 group-hover:rotate-1">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A3A35] via-[#1A3A35]/70 to-transparent"></div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-[#52C77B] transition-all duration-300 group-hover:rotate-12">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-heading font-bold text-[#FF8F5B] group-hover:text-[#FFB088] transition-colors duration-300">Inovasi</h3>
                        </div>
                        <p class="text-sm leading-relaxed text-white/90">
                            Mengadopsi teknik dan teknologi modern.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- section call to action -->
    <section id="book" class="py-16 lg:py-20 bg-gradient-to-br from-[#F0F8F6] via-white to-[#FFF5EC] relative overflow-hidden">
        <!-- decorative elements -->
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-0 left-0 w-96 h-96 bg-[#2D7A6E]/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#FFB088]/20 rounded-full blur-3xl"></div>
        </div>
        
        <div class="container-custom text-center relative z-10">
            <div class="max-w-4xl mx-auto space-y-8">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white rounded-full mb-4 shadow-sm">
                    <svg class="w-5 h-5 text-[#FF8F5B]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                    </svg>
                    <span class="text-sm font-medium text-[#1A3A35]">Hubungi Kami</span>
                </div>
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-heading font-bold leading-tight text-[#1A3A35]">
                    Siap Memberikan Perawatan Terbaik untuk Hewan Peliharaan Anda?
                </h2>
                <p class="text-xl md:text-2xl text-[#5A7A76] leading-relaxed">
                    Buat janji temu hari ini dan rasakan perbedaan VetWell.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
                    <a href="{{ route('login') }}" class="group inline-flex items-center justify-center gap-2 bg-[#FF8F5B] hover:bg-[#FF8F5B]/90 text-white px-10 py-5 rounded-xl font-semibold transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105 text-lg">
                        <svg class="w-6 h-6 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Buat Janji
                    </a>
                    <a href="{{ route('contact') }}" class="group inline-flex items-center justify-center gap-2 bg-[#2D7A6E] hover:bg-[#1F5951] text-white px-10 py-5 rounded-xl font-semibold transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105 text-lg">
                        <svg class="w-6 h-6 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <x-footer />

    <!-- tombol scroll to top -->
    <button id="scrollTop" class="fixed bottom-8 right-8 w-14 h-14 bg-gradient-to-br from-primary-600 to-primary-700 text-white rounded-full shadow-2xl hover:shadow-3xl hover:scale-110 transition-all duration-300 opacity-0 invisible z-50 flex items-center justify-center group">
        <svg class="w-6 h-6 transition-transform group-hover:-translate-y-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>

    <script>
        // scroll to top button functionality
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

        // smooth scroll untuk anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        const offsetTop = target.offsetTop - 80;
                        window.scrollTo({
                            top: offsetTop,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });

        // intersection observer untuk animasi on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                }
            });
        }, observerOptions);

        // observe semua card dan section
        document.querySelectorAll('section > div > div').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>
