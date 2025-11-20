<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Layanan Kami - VetWell Clinic</title>
    <meta name="description" content="Layanan veteriner lengkap dari konsultasi hingga bedah. Perawatan terbaik untuk hewan peliharaan Anda.">
    <link rel="icon" type="image/png" href="{{ asset('logo2.png') }}">
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:300,400,500,600,700|poppins:400,500,600,700|quicksand:400,500,600,700" rel="stylesheet">
    
    @vite('resources/css/app.css')
</head>
<body class="antialiased font-sans text-neutral-800">
    <x-navbar />

    <!-- hero2 section -->
    <section class="relative bg-gradient-to-br from-[#F0F8F6] via-white to-[#FFF5EC] overflow-hidden pt-32 pb-20">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-10 w-64 h-64 bg-[#2D7A6E] rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-[#FFB088] rounded-full blur-3xl"></div>
        </div>

        <div class="container-custom relative z-10">
            <div class="max-w-5xl mx-auto text-center">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/80 backdrop-blur-sm rounded-full mb-6 shadow-sm">
                    <svg class="w-5 h-5 text-[#2D7A6E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                    </svg>
                    <span class="text-sm font-medium text-[#1A3A35]">Layanan Lengkap & Berkualitas</span>
                </div>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-heading font-bold text-[#1A3A35] mb-6">
                    Layanan Kesehatan Hewan<br>
                    <span class="bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] bg-clip-text text-transparent">Terlengkap untuk Peliharaan Anda</span>
                </h1>
                
                <p class="text-lg md:text-xl text-[#5A7A76] leading-relaxed max-w-3xl mx-auto mb-10">
                    Dari konsultasi hingga operasi, kami menyediakan berbagai layanan veteriner dengan standar medis terbaik dan teknologi modern
                </p>
            </div>
        </div>
    </section>

    <!-- main services-->
    <section class="py-16 lg:py-20 bg-white">
        <div class="container-custom">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#E5F0ED] rounded-full mb-4">
                    <svg class="w-4 h-4 text-[#2D7A6E]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                    </svg>
                    <span class="text-sm font-medium text-[#1A3A35]">Layanan Utama</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-heading font-bold text-[#1A3A35] mb-4">
                    Layanan yang Kami Tawarkan
                </h2>
                <p class="text-lg text-[#5A7A76]">
                    Dari pencegahan hingga perawatan kompleks, kami menyediakan semuanya
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- service 1: Konsultasi Umum -->
                <div class="group bg-gradient-to-br from-white to-[#F0F8F6] p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-[#E5F0ED] hover:border-[#2D7A6E] hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#2D7A6E] to-[#1F5951] rounded-2xl flex items-center justify-center text-white mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-heading font-bold text-[#1A3A35] mb-3">Konsultasi Umum</h3>
                    <p class="text-[#5A7A76] leading-relaxed mb-4">
                        Pemeriksaan kesehatan rutin, diagnosis penyakit, dan konsultasi mengenai perawatan hewan peliharaan Anda.
                    </p>
                    <ul class="space-y-2 text-sm text-[#5A7A76]">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Pemeriksaan fisik lengkap
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Diagnosis penyakit
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Konsultasi nutrisi & perawatan
                        </li>
                    </ul>
                </div>

                <!-- service 2: Vaksinasi -->
                <div class="group bg-gradient-to-br from-white to-[#FFF5EC] p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-[#E5F0ED] hover:border-[#FFB088] hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#FFB088] to-[#FF8F5B] rounded-2xl flex items-center justify-center text-white mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-heading font-bold text-[#1A3A35] mb-3">Vaksinasi</h3>
                    <p class="text-[#5A7A76] leading-relaxed mb-4">
                        Program vaksinasi lengkap untuk melindungi hewan peliharaan dari berbagai penyakit berbahaya.
                    </p>
                    <ul class="space-y-2 text-sm text-[#5A7A76]">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Vaksin inti (rabies, distemper)
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Vaksin non-inti
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Jadwal vaksinasi terencana
                        </li>
                    </ul>
                </div>

                <!-- service 3: Bedah & Operasi -->
                <div class="group bg-gradient-to-br from-white to-[#EFF7FC] p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-[#E5F0ED] hover:border-[#4A9FD8] hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#4A9FD8] to-[#357AB8] rounded-2xl flex items-center justify-center text-white mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-heading font-bold text-[#1A3A35] mb-3">Bedah & Operasi</h3>
                    <p class="text-[#5A7A76] leading-relaxed mb-4">
                        Prosedur bedah dengan peralatan modern dan tim ahli bedah berpengalaman untuk kesembuhan optimal.
                    </p>
                    <ul class="space-y-2 text-sm text-[#5A7A76]">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Sterilisasi/kastrasi
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Bedah jaringan lunak
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Bedah ortopedi
                        </li>
                    </ul>
                </div>

                <!-- service 4: Grooming -->
                <div class="group bg-gradient-to-br from-white to-[#EDFAF2] p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-[#E5F0ED] hover:border-[#52C77B] hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#52C77B] to-[#3DA85F] rounded-2xl flex items-center justify-center text-white mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-heading font-bold text-[#1A3A35] mb-3">Grooming</h3>
                    <p class="text-[#5A7A76] leading-relaxed mb-4">
                        Perawatan kebersihan dan kecantikan untuk menjaga penampilan dan kesehatan hewan peliharaan Anda.
                    </p>
                    <ul class="space-y-2 text-sm text-[#5A7A76]">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Mandi & blow dry
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Potong kuku & pembersihan telinga
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Styling & trimming
                        </li>
                    </ul>
                </div>

                <!-- service 5: Rawat Inap -->
                <div class="group bg-gradient-to-br from-white to-[#FFF8ED] p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-[#E5F0ED] hover:border-[#FFA94D] hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#FFA94D] to-[#FF8F33] rounded-2xl flex items-center justify-center text-white mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-heading font-bold text-[#1A3A35] mb-3">Rawat Inap</h3>
                    <p class="text-[#5A7A76] leading-relaxed mb-4">
                        Fasilitas rawat inap 24/7 dengan pemantauan intensif untuk pemulihan optimal hewan peliharaan Anda.
                    </p>
                    <ul class="space-y-2 text-sm text-[#5A7A76]">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Kandang nyaman & bersih
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Monitoring 24/7
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Perawatan intensif
                        </li>
                    </ul>
                </div>

                <!-- service 6: Pemeriksaan Lab -->
                <div class="group bg-gradient-to-br from-white to-[#FDEAEA] p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-[#E5F0ED] hover:border-[#E85D5D] hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#E85D5D] to-[#D44545] rounded-2xl flex items-center justify-center text-white mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-heading font-bold text-[#1A3A35] mb-3">Pemeriksaan Lab</h3>
                    <p class="text-[#5A7A76] leading-relaxed mb-4">
                        Laboratorium dengan peralatan canggih untuk diagnosis akurat dan cepat berbagai kondisi kesehatan.
                    </p>
                    <ul class="space-y-2 text-sm text-[#5A7A76]">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Tes darah lengkap
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Urinalisis & feses
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Mikroskopi & kultur
                        </li>
                    </ul>
                </div>

                <!-- service 7: Radiologi & Imaging -->
                <div class="group bg-gradient-to-br from-white to-[#F0F8F6] p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-[#E5F0ED] hover:border-[#2D7A6E] hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#2D7A6E] to-[#1F5951] rounded-2xl flex items-center justify-center text-white mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-heading font-bold text-[#1A3A35] mb-3">Radiologi & Imaging</h3>
                    <p class="text-[#5A7A76] leading-relaxed mb-4">
                        Teknologi pencitraan modern untuk diagnosis internal yang akurat dan non-invasif.
                    </p>
                    <ul class="space-y-2 text-sm text-[#5A7A76]">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            X-ray digital
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Ultrasound (USG)
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Interpretasi ahli radiologi
                        </li>
                    </ul>
                </div>

                <!-- service 8: Perawatan Gigi -->
                <div class="group bg-gradient-to-br from-white to-[#FFF5EC] p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-[#E5F0ED] hover:border-[#FFB088] hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#FFB088] to-[#FF8F5B] rounded-2xl flex items-center justify-center text-white mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-heading font-bold text-[#1A3A35] mb-3">Perawatan Gigi</h3>
                    <p class="text-[#5A7A76] leading-relaxed mb-4">
                        Kesehatan gigi dan mulut adalah bagian penting dari kesehatan keseluruhan hewan peliharaan Anda.
                    </p>
                    <ul class="space-y-2 text-sm text-[#5A7A76]">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Pembersihan karang gigi
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Pencabutan gigi
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Perawatan penyakit gusi
                        </li>
                    </ul>
                </div>

                <!-- service 9: Layanan Darurat -->
                <div class="group bg-gradient-to-br from-white to-[#FDEAEA] p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-[#E5F0ED] hover:border-[#E85D5D] hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#E85D5D] to-[#D44545] rounded-2xl flex items-center justify-center text-white mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-heading font-bold text-[#1A3A35] mb-3">Layanan Darurat 24/7</h3>
                    <p class="text-[#5A7A76] leading-relaxed mb-4">
                        Siap melayani keadaan darurat kapan pun hewan peliharaan Anda membutuhkan pertolongan segera.
                    </p>
                    <ul class="space-y-2 text-sm text-[#5A7A76]">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Tersedia 24 jam
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Respon cepat
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Perawatan intensif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA  -->
    <section class="py-16 lg:py-20 bg-gradient-to-br from-[#2D7A6E] to-[#1F5951] relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        </div>
        
        <div class="container-custom text-center relative z-10">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-heading font-bold text-white mb-6">
                Tertarik dengan Layanan Kami?
            </h2>
            <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                Hubungi kami untuk konsultasi atau buat janji temu hari ini
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('login') }}" class="inline-flex items-center gap-2 bg-[#FF8F5B] hover:bg-[#FF8F5B]/90 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Buat Janji Sekarang
                </a>
                <a href="{{ route('pricing') }}" class="inline-flex items-center gap-2 border-2 border-white hover:bg-white/10 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Lihat Harga
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
