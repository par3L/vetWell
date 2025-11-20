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

    <!-- pricing by category -->
    <section class="py-16 lg:py-20 bg-white">
        <div class="container-custom">
            @foreach($servicesByCategory as $category => $services)
            <div class="mb-16">
                <div class="text-center mb-12">
                    @php
                        $categoryColors = [
                            'Konsultasi & Pemeriksaan' => ['bg' => 'bg-[#E5F0ED]', 'text' => 'text-[#2D7A6E]', 'border' => 'border-[#2D7A6E]', 'hover' => 'hover:border-[#2D7A6E]', 'gradient' => 'from-white to-[#F0F8F6]'],
                            'Vaksinasi' => ['bg' => 'bg-[#FFF5EC]', 'text' => 'text-[#FFB088]', 'border' => 'border-[#FFB088]', 'hover' => 'hover:border-[#FFB088]', 'gradient' => 'from-white to-[#FFF5EC]'],
                            'Bedah & Operasi' => ['bg' => 'bg-red-50', 'text' => 'text-red-600', 'border' => 'border-red-600', 'hover' => 'hover:border-red-500', 'gradient' => 'from-white to-red-50'],
                            'Grooming & Perawatan' => ['bg' => 'bg-blue-50', 'text' => 'text-[#4A9FD8]', 'border' => 'border-[#4A9FD8]', 'hover' => 'hover:border-[#4A9FD8]', 'gradient' => 'from-white to-blue-50'],
                            'Rawat Inap & Laboratorium' => ['bg' => 'bg-purple-50', 'text' => 'text-purple-600', 'border' => 'border-purple-600', 'hover' => 'hover:border-purple-500', 'gradient' => 'from-white to-purple-50'],
                        ];
                        $colors = $categoryColors[$category] ?? ['bg' => 'bg-gray-100', 'text' => 'text-gray-700', 'border' => 'border-gray-700', 'hover' => 'hover:border-gray-600', 'gradient' => 'from-white to-gray-50'];
                    @endphp
                    <div class="inline-flex items-center gap-2 px-4 py-2 {{ $colors['bg'] }} rounded-full mb-4">
                        <svg class="w-4 h-4 {{ $colors['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <span class="text-sm font-medium text-[#1A3A35]">Kategori {{ $loop->iteration }}</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-heading font-bold text-[#1A3A35]">{{ $category }}</h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-{{ $services->count() >= 4 ? '4' : '3' }} gap-6">
                    @foreach($services as $service)
                    <div class="group bg-gradient-to-br {{ $colors['gradient'] }} p-6 rounded-2xl border-2 border-[#E5F0ED] {{ $colors['hover'] }} hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-start justify-between mb-3">
                            @if($service->tag === 'populer')
                                <span class="px-3 py-1 {{ $colors['bg'] }} {{ $colors['text'] }} text-xs font-semibold rounded-full">POPULER</span>
                            @elseif($service->tag === 'rekomendasi')
                                <span class="px-3 py-1 bg-[#FFB088]/10 text-[#FF8F5B] text-xs font-semibold rounded-full">REKOMENDASI</span>
                            @else
                                <span class="px-3 py-1 bg-gray-100 text-gray-600 text-xs font-semibold rounded-full">LAYANAN</span>
                            @endif
                            <svg class="w-5 h-5 {{ $colors['text'] }} opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#1A3A35] mb-2">{{ $service->name }}</h3>
                        <div class="mb-4">
                            <p class="text-3xl font-bold {{ $colors['text'] }} mb-1">Rp {{ number_format($service->price, 0, ',', '.') }}</p>
                            <p class="text-sm text-[#5A7A76]">per layanan</p>
                        </div>
                        <p class="text-[#5A7A76] text-sm leading-relaxed">{{ $service->description }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- CTA section -->
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
                Buat janji temu sekarang dan dapatkan layanan terbaik untuk hewan peliharaan Anda
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center gap-2 bg-[#FF8F5B] hover:bg-[#FF8F5B]/90 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Buat Janji Sekarang
                </a>
                <a href="{{ route('services') }}" class="inline-flex items-center justify-center gap-2 bg-white text-[#2D7A6E] hover:bg-white/90 px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Info Layanan
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
