<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tim Kami - VetWell Clinic</title>
    <meta name="description" content="Temui tim dokter hewan dan staf profesional kami yang berdedikasi untuk merawat hewan peliharaan Anda.">
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

        <div class="container-custom relative z-10">
            <div class="max-w-5xl mx-auto text-center">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/80 backdrop-blur-sm rounded-full mb-6 shadow-sm">
                    <svg class="w-5 h-5 text-[#2D7A6E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="text-sm font-medium text-[#1A3A35]">Profesional & Berpengalaman</span>
                </div>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-heading font-bold text-[#1A3A35] mb-6">
                    Tim <span class="bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] bg-clip-text text-transparent">VetWell</span>
                </h1>
                
                <p class="text-lg md:text-xl text-[#5A7A76] leading-relaxed max-w-3xl mx-auto mb-10">
                    Bertemu dengan para profesional berdedikasi yang berkomitmen untuk memberikan perawatan terbaik untuk hewan peliharaan Anda
                </p>

                <!-- Team Stats -->
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6 max-w-2xl mx-auto">
                    <div class="bg-white/80 backdrop-blur-sm p-5 rounded-2xl border border-[#E5F0ED] shadow-sm hover:shadow-md transition-all duration-300">
                        <div class="text-3xl lg:text-4xl font-bold text-[#2D7A6E] mb-1">{{ $doctors->count() }}</div>
                        <div class="text-sm text-[#5A7A76] font-medium">Dokter Hewan</div>
                    </div>
                    <div class="bg-white/80 backdrop-blur-sm p-5 rounded-2xl border border-[#E5F0ED] shadow-sm hover:shadow-md transition-all duration-300">
                        <div class="text-3xl lg:text-4xl font-bold text-[#FF8F5B] mb-1">{{ $staff->count() }}</div>
                        <div class="text-sm text-[#5A7A76] font-medium">Staf Ahli</div>
                    </div>
                    <div class="bg-white/80 backdrop-blur-sm p-5 rounded-2xl border border-[#E5F0ED] shadow-sm hover:shadow-md transition-all duration-300 col-span-2 md:col-span-1">
                        <div class="text-3xl lg:text-4xl font-bold text-[#4A9FD8] mb-1">10+</div>
                        <div class="text-sm text-[#5A7A76] font-medium">Tahun Pengalaman</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- section dokter hewan -->
    <section class="py-16 lg:py-20 bg-white">
        <div class="container-custom">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#E5F0ED] rounded-full mb-4">
                    <svg class="w-4 h-4 text-[#2D7A6E]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                    </svg>
                    <span class="text-sm font-medium text-[#1A3A35]">Dokter Hewan Kami</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-heading font-bold text-[#1A3A35] mb-4">
                    Dokter Hewan Profesional
                </h2>
                <p class="text-lg text-[#5A7A76]">
                    Tim dokter hewan tersertifikasi dengan pengalaman lebih dari 10 tahun
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($doctors as $doctor)
                <!-- Dokter {{ $loop->iteration }} -->
                <div class="group relative bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-[#E5F0ED] hover:border-[#2D7A6E] hover:-translate-y-2">
                    <div class="aspect-[3/4] relative overflow-hidden bg-gradient-to-br from-[#F0F8F6] to-[#E5F0ED]">
                        @if($doctor->photo)
                            <img src="{{ Storage::url($doctor->photo) }}" alt="{{ $doctor->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        @else
                            <img src="{{ asset('assets/vet.jpg') }}" alt="{{ $doctor->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A3A35]/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-heading font-bold text-[#1A3A35] mb-2">{{ $doctor->name }}</h3>
                        <div class="flex items-center gap-2 text-[#2D7A6E] mb-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="font-semibold">{{ $doctor->position ?? 'Dokter Hewan' }}</span>
                        </div>
                        <p class="text-[#5A7A76] leading-relaxed mb-4">
                            {{ $doctor->bio ?? 'Dokter hewan profesional dengan pengalaman luas dalam merawat hewan peliharaan.' }}
                        </p>
                        <div class="flex items-center gap-2 text-sm text-[#5A7A76]">
                            <svg class="w-4 h-4 text-[#FFB088]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span>Spesialisasi: {{ $doctor->specialization ?? 'Umum' }}</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-[#5A7A76] text-lg">Belum ada dokter yang ditampilkan.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- section staff -->
    <section class="py-16 lg:py-20 bg-gradient-to-b from-neutral-50 to-white">
        <div class="container-custom">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#FFF5EC] rounded-full mb-4">
                    <svg class="w-4 h-4 text-[#FF8F5B]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                    </svg>
                    <span class="text-sm font-medium text-[#1A3A35]">Tim Pendukung Kami</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-heading font-bold text-[#1A3A35] mb-4">
                    Staf Profesional
                </h2>
                <p class="text-lg text-[#5A7A76]">
                    Tim pendukung yang ramah dan terlatih untuk melayani Anda
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($staff as $member)
                <!-- Staff {{ $loop->iteration }} -->
                <div class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-[#E5F0ED] hover:border-[#FFB088] hover:-translate-y-1">
                    <div class="aspect-square relative overflow-hidden bg-gradient-to-br from-[#FFF5EC] to-[#FFE5D9]">
                        @if($member->photo)
                            <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        @else
                            <img src="{{ asset('assets/hero-section.webp') }}" alt="{{ $member->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        @endif
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-heading font-bold text-[#1A3A35] mb-1">{{ $member->name }}</h3>
                        <div class="flex items-center gap-1 text-[#FF8F5B] mb-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span class="text-sm font-semibold">{{ $member->position ?? 'Staf' }}</span>
                        </div>
                        <p class="text-sm text-[#5A7A76]">
                            {{ $member->bio ?? 'Staf profesional yang berdedikasi melayani dengan sepenuh hati.' }}
                        </p>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-[#5A7A76] text-lg">Belum ada staf yang ditampilkan.</p>
                </div>
                @endforelse
            </div>
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
                Siap Bertemu Tim Kami?
            </h2>
            <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                Buat janji temu hari ini dan rasakan perawatan profesional dari tim VetWell
            </p>
            <a href="{{ route('login') }}" class="inline-flex items-center gap-2 bg-[#FF8F5B] hover:bg-[#FF8F5B]/90 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Buat Janji Sekarang
            </a>
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
