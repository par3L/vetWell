<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hubungi Kami - VetWell Clinic</title>
    <meta name="description" content="Hubungi VetWell Clinic untuk pertanyaan, kritik, atau saran. Kami siap membantu Anda 24/7.">
    
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span class="text-sm font-medium text-[#1A3A35]">Kami Siap Membantu 24/7</span>
                </div>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-heading font-bold text-[#1A3A35] mb-6">
                    <span class="bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] bg-clip-text text-transparent">Hubungi Kami</span>
                </h1>
                
                <p class="text-lg md:text-xl text-[#5A7A76] leading-relaxed max-w-3xl mx-auto mb-10">
                    Punya pertanyaan atau ingin membuat janji? Kami ada di sini untuk membantu Anda
                </p>

                <!-- Quick Contact Options -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 max-w-3xl mx-auto">
                    <a href="tel:+628123456789" class="bg-white/80 backdrop-blur-sm p-5 rounded-2xl border border-[#E5F0ED] shadow-sm hover:shadow-md hover:border-[#2D7A6E] transition-all duration-300 group">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5 text-[#2D7A6E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span class="text-sm font-semibold text-[#1A3A35] group-hover:text-[#2D7A6E] transition-colors">Telepon</span>
                        </div>
                    </a>
                    <a href="mailto:info@vetwell.com" class="bg-white/80 backdrop-blur-sm p-5 rounded-2xl border border-[#E5F0ED] shadow-sm hover:shadow-md hover:border-[#4A9FD8] transition-all duration-300 group">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5 text-[#4A9FD8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="text-sm font-semibold text-[#1A3A35] group-hover:text-[#4A9FD8] transition-colors">Email</span>
                        </div>
                    </a>
                    <a href="https://wa.me/628123456789" target="_blank" class="bg-white/80 backdrop-blur-sm p-5 rounded-2xl border border-[#E5F0ED] shadow-sm hover:shadow-md hover:border-[#52C77B] transition-all duration-300 group">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5 text-[#52C77B]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                            <span class="text-sm font-semibold text-[#1A3A35] group-hover:text-[#52C77B] transition-colors">WhatsApp</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- contact info & form section -->
    <section class="py-16 lg:py-20 bg-white">
        <div class="container-custom">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16">
                <!-- Contact Information -->
                <div class="space-y-8">
                    <div>
                        <h2 class="text-3xl md:text-4xl font-heading font-bold text-[#1A3A35] mb-4">
                            Informasi Kontak
                        </h2>
                        <p class="text-lg text-[#5A7A76]">
                            Jangan ragu untuk menghubungi kami melalui salah satu saluran di bawah ini
                        </p>
                    </div>

                    <!-- Contact Cards -->
                    <div class="space-y-4">
                        <!-- Phone -->
                        <div class="group flex items-start gap-4 p-6 bg-gradient-to-br from-[#F0F8F6] to-white rounded-2xl border-2 border-[#E5F0ED] hover:border-[#2D7A6E] transition-all duration-300 hover:shadow-lg">
                            <div class="w-14 h-14 bg-gradient-to-br from-[#2D7A6E] to-[#1F5951] rounded-xl flex items-center justify-center text-white flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-heading font-bold text-[#1A3A35] mb-1">Telepon</h3>
                                <p class="text-[#5A7A76] mb-2">Hubungi kami kapan saja, 24/7</p>
                                <a href="tel:+6281234567890" class="text-lg font-semibold text-[#2D7A6E] hover:text-[#1F5951] transition-colors">
                                    +62 812-3456-7890
                                </a>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="group flex items-start gap-4 p-6 bg-gradient-to-br from-[#FFF5EC] to-white rounded-2xl border-2 border-[#E5F0ED] hover:border-[#FFB088] transition-all duration-300 hover:shadow-lg">
                            <div class="w-14 h-14 bg-gradient-to-br from-[#FFB088] to-[#FF8F5B] rounded-xl flex items-center justify-center text-white flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-heading font-bold text-[#1A3A35] mb-1">Email</h3>
                                <p class="text-[#5A7A76] mb-2">Kirim email kepada kami</p>
                                <a href="mailto:info@vetwellclinic.com" class="text-lg font-semibold text-[#FF8F5B] hover:text-[#FF7A3D] transition-colors">
                                    info@vetwellclinic.com
                                </a>
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="group flex items-start gap-4 p-6 bg-gradient-to-br from-[#EFF7FC] to-white rounded-2xl border-2 border-[#E5F0ED] hover:border-[#4A9FD8] transition-all duration-300 hover:shadow-lg">
                            <div class="w-14 h-14 bg-gradient-to-br from-[#4A9FD8] to-[#357AB8] rounded-xl flex items-center justify-center text-white flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-heading font-bold text-[#1A3A35] mb-1">Alamat</h3>
                                <p class="text-[#5A7A76] mb-2">Kunjungi klinik kami</p>
                                <p class="text-lg font-semibold text-[#4A9FD8]">
                                    Jl. Kesehatan No. 123<br>
                                    Jakarta Selatan, 12345
                                </p>
                            </div>
                        </div>

                        <!-- Working Hours -->
                        <div class="group flex items-start gap-4 p-6 bg-gradient-to-br from-[#EDFAF2] to-white rounded-2xl border-2 border-[#E5F0ED] hover:border-[#52C77B] transition-all duration-300 hover:shadow-lg">
                            <div class="w-14 h-14 bg-gradient-to-br from-[#52C77B] to-[#3DA85F] rounded-xl flex items-center justify-center text-white flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-heading font-bold text-[#1A3A35] mb-1">Jam Operasional</h3>
                                <p class="text-[#5A7A76] mb-2">Buka setiap hari</p>
                                <div class="space-y-1">
                                    <p class="font-semibold text-[#52C77B]">Senin - Jumat: 08:00 - 20:00</p>
                                    <p class="font-semibold text-[#52C77B]">Sabtu - Minggu: 09:00 - 18:00</p>
                                    <p class="text-sm text-[#E85D5D] font-semibold mt-2">🚨 Layanan Darurat: 24/7</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-gradient-to-br from-white to-[#F0F8F6] p-8 lg:p-10 rounded-3xl shadow-xl border-2 border-[#E5F0ED]">
                    <h2 class="text-3xl md:text-4xl font-heading font-bold text-[#1A3A35] mb-4">
                        Kirim Pesan
                    </h2>
                    <p class="text-lg text-[#5A7A76] mb-8">
                        Isi formulir di bawah ini dan kami akan segera menghubungi Anda kembali
                    </p>

                    <form action="#" method="POST" class="space-y-6">
                        @csrf
                        
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                                Nama Lengkap <span class="text-[#E85D5D]">*</span>
                            </label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-4 py-3 rounded-xl border-2 border-[#E5F0ED] focus:border-[#2D7A6E] focus:ring-4 focus:ring-[#2D7A6E]/10 outline-none transition-all duration-300"
                                placeholder="Masukkan nama lengkap Anda">
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                                Alamat Email <span class="text-[#E85D5D]">*</span>
                            </label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-3 rounded-xl border-2 border-[#E5F0ED] focus:border-[#2D7A6E] focus:ring-4 focus:ring-[#2D7A6E]/10 outline-none transition-all duration-300"
                                placeholder="nama@email.com">
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                                Nomor Telepon <span class="text-[#E85D5D]">*</span>
                            </label>
                            <input type="tel" id="phone" name="phone" required
                                class="w-full px-4 py-3 rounded-xl border-2 border-[#E5F0ED] focus:border-[#2D7A6E] focus:ring-4 focus:ring-[#2D7A6E]/10 outline-none transition-all duration-300"
                                placeholder="+62 812-3456-7890">
                        </div>

                        <!-- Subject -->
                        <div>
                            <label for="subject" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                                Subjek <span class="text-[#E85D5D]">*</span>
                            </label>
                            <select id="subject" name="subject" required
                                class="w-full px-4 py-3 rounded-xl border-2 border-[#E5F0ED] focus:border-[#2D7A6E] focus:ring-4 focus:ring-[#2D7A6E]/10 outline-none transition-all duration-300">
                                <option value="">Pilih subjek</option>
                                <option value="appointment">Janji Temu</option>
                                <option value="inquiry">Pertanyaan Umum</option>
                                <option value="emergency">Keadaan Darurat</option>
                                <option value="feedback">Kritik & Saran</option>
                                <option value="other">Lainnya</option>
                            </select>
                        </div>

                        <!-- Message -->
                        <div>
                            <label for="message" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                                Pesan <span class="text-[#E85D5D]">*</span>
                            </label>
                            <textarea id="message" name="message" rows="5" required
                                class="w-full px-4 py-3 rounded-xl border-2 border-[#E5F0ED] focus:border-[#2D7A6E] focus:ring-4 focus:ring-[#2D7A6E]/10 outline-none transition-all duration-300 resize-none"
                                placeholder="Tulis pesan Anda di sini..."></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full group inline-flex items-center justify-center gap-2 bg-gradient-to-r from-[#FF8F5B] to-[#FFB088] hover:from-[#FF8F5B]/90 hover:to-[#FFB088]/90 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-[1.02]">
                            <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-16 lg:py-20 bg-gradient-to-b from-neutral-50 to-white">
        <div class="container-custom">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-heading font-bold text-[#1A3A35] mb-4">
                    Lokasi Kami
                </h2>
                <p class="text-lg text-[#5A7A76]">
                    Temukan kami di peta dan kunjungi klinik kami
                </p>
            </div>

            <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-[#E5F0ED] h-[400px] lg:h-[500px]">
                <!-- Placeholder for Google Maps -->
                <div class="w-full h-full bg-gradient-to-br from-[#F0F8F6] to-[#E5F0ED] flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-20 h-20 text-[#2D7A6E] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <p class="text-xl font-semibold text-[#1A3A35]">VetWell Clinic</p>
                        <p class="text-[#5A7A76]">Jl. Kesehatan No. 123, Jakarta Selatan</p>
                        <!-- In production, replace with actual Google Maps embed -->
                        <a href="https://maps.google.com" target="_blank" class="inline-flex items-center gap-2 mt-4 text-[#2D7A6E] hover:text-[#1F5951] font-semibold">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            Buka di Google Maps
                        </a>
                    </div>
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
