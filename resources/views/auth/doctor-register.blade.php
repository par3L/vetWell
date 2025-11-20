<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi Dokter - VetWell Clinic</title>
    <meta name="description" content="Daftar sebagai dokter hewan di VetWell Clinic dan bergabung dengan tim profesional kami.">
    <link rel="icon" type="image/png" href="{{ asset('logo2.png') }}">
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:300,400,500,600,700|poppins:400,500,600,700|quicksand:400,500,600,700" rel="stylesheet">
    
    @vite('resources/css/app.css')
</head>
<body class="antialiased font-sans text-neutral-800 bg-gradient-to-br from-[#F0F8F6] via-white to-[#FFF5EC]">
    <!-- decor -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-0 left-0 w-96 h-96 bg-[#2D7A6E]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#4A9FD8]/10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-[#FFB088]/5 rounded-full blur-3xl"></div>
    </div>

    <div class="relative min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-3xl">
            <!-- logo/brand -->
            <div class="text-center mb-8">
                <a href="{{ route('landing') }}" class="inline-block group">
                    <img src="{{ asset('logo.png') }}" alt="VetWell Clinic Logo" class="h-20 w-auto mx-auto mb-4 transition-transform duration-300 group-hover:scale-110">
                </a>    
                <h2 class="text-2xl font-bold text-[#1A3A35] mb-2">Bergabung Dengan Tim VetWell</h2>
                <p class="text-[#5A7A76]">Daftar sebagai dokter hewan profesional</p>
            </div>

            <!-- card -->
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border-2 border-[#E5F0ED] p-8">
                <!-- if error -->
                @if($errors->any())
                    <div class="mb-6 p-4 bg-[#FDEAEA] border border-[#E85D5D] text-[#D44545] rounded-xl">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="text-sm">
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('doctor.register.post') }}" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    <!-- form info pribadi -->
                    <div class="border-b border-[#E5F0ED] pb-4">
                        <h3 class="text-lg font-bold text-[#1A3A35] mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#2D7A6E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Informasi Pribadi
                        </h3>

                        <div class="grid md:grid-cols-2 gap-4">
                            <!-- name -->
                            <div>
                                <label for="name" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                                    Nama Lengkap <span class="text-[#E85D5D]">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    value="{{ old('name') }}"
                                    required
                                    class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300 @error('name') border-[#E85D5D] @enderror"
                                    placeholder="drh. Nama Lengkap"
                                >
                            </div>

                            <!-- email -->
                            <div>
                                <label for="email" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                                    Email <span class="text-[#E85D5D]">*</span>
                                </label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    value="{{ old('email') }}"
                                    required
                                    class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300 @error('email') border-[#E85D5D] @enderror"
                                    placeholder="nama@email.com"
                                >
                            </div>

                            <!-- no -->
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                                    Nomor Telepon <span class="text-[#E85D5D]">*</span>
                                </label>
                                <input 
                                    type="tel" 
                                    name="phone" 
                                    id="phone" 
                                    value="{{ old('phone') }}"
                                    required
                                    class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300 @error('phone') border-[#E85D5D] @enderror"
                                    placeholder="08123456789"
                                >
                            </div>

                            <!-- noreg -->
                            <div>
                                <label for="no_reg_dokter" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                                    No. Registrasi Dokter <span class="text-[#E85D5D]">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="no_reg_dokter" 
                                    id="no_reg_dokter" 
                                    value="{{ old('no_reg_dokter') }}"
                                    required
                                    class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300 @error('no_reg_dokter') border-[#E85D5D] @enderror"
                                    placeholder="Nomor registrasi"
                                >
                            </div>
                        </div>
                    </div>

                    <!-- info profesi -->
                    <div class="border-b border-[#E5F0ED] pb-4">
                        <h3 class="text-lg font-bold text-[#1A3A35] mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#4A9FD8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Informasi Profesional
                        </h3>

                        <div class="grid md:grid-cols-2 gap-4">
                            <!-- posisi -->
                            <div>
                                <label for="position" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                                    Posisi <span class="text-[#E85D5D]">*</span>
                                </label>
                                <select 
                                    name="position" 
                                    id="position"
                                    required
                                    class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300 @error('position') border-[#E85D5D] @enderror"
                                >
                                    <option value="">Pilih Posisi</option>
                                    <option value="Dokter Hewan" {{ old('position') == 'Dokter Hewan' ? 'selected' : '' }}>Dokter Hewan</option>
                                </select>
                            </div>

                            <!-- spesialisasi -->
                            <div>
                                <label for="spesialisasi" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                                    Spesialisasi <span class="text-[#E85D5D]">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="spesialisasi" 
                                    id="spesialisasi" 
                                    value="{{ old('spesialisasi') }}"
                                    required
                                    class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300 @error('spesialisasi') border-[#E85D5D] @enderror"
                                    placeholder="contoh: Bedah & Ortopedi"
                                >
                            </div>

                            <!-- pengalaman -->
                            <div>
                                <label for="experience_years" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                                    Pengalaman (Tahun) <span class="text-[#E85D5D]">*</span>
                                </label>
                                <input 
                                    type="number" 
                                    name="experience_years" 
                                    id="experience_years" 
                                    value="{{ old('experience_years') }}"
                                    min="0"
                                    required
                                    class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300 @error('experience_years') border-[#E85D5D] @enderror"
                                    placeholder="10"
                                >
                            </div>

                            <!-- photo -->
                            <div>
                                <label for="photo" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                                    Foto Profil <span class="text-[#5A7A76] font-normal text-xs">(Opsional)</span>
                                </label>
                                <div class="relative">
                                    <input 
                                        type="file" 
                                        name="photo" 
                                        id="photo" 
                                        accept="image/jpeg,image/jpg,image/png"
                                        class="hidden"
                                        onchange="updateFileName(this)"
                                    >
                                    <label 
                                        for="photo" 
                                        class="flex items-center justify-center gap-2 w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl cursor-pointer hover:border-[#2D7A6E] hover:bg-[#F0F8F6] transition-all duration-300 @error('photo') border-[#E85D5D] @enderror"
                                    >
                                        <svg class="w-5 h-5 text-[#2D7A6E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span id="file-name" class="text-sm text-[#5A7A76]">Pilih Foto Profil</span>
                                    </label>
                                </div>
                                <p class="mt-1 text-xs text-[#5A7A76]">Format: JPG, JPEG, PNG. Maks 2MB</p>
                            </div>

                            <script>
                                function updateFileName(input) {
                                    const fileName = input.files[0]?.name || 'Pilih Foto Profil';
                                    document.getElementById('file-name').textContent = fileName;
                                    if (input.files[0]) {
                                        document.getElementById('file-name').classList.remove('text-[#5A7A76]');
                                        document.getElementById('file-name').classList.add('text-[#2D7A6E]', 'font-medium');
                                    }
                                }
                            </script>
                        </div>

                        <!-- bio -->
                        <div class="mt-4">
                            <label for="bio" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                                Bio / Deskripsi Singkat <span class="text-[#5A7A76] font-normal text-xs">(Opsional)</span>
                            </label>
                            <textarea 
                                name="bio" 
                                id="bio" 
                                rows="3"
                                class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300 @error('bio') border-[#E85D5D] @enderror"
                                placeholder="Ceritakan tentang pengalaman dan keahlian Anda..."
                            >{{ old('bio') }}</textarea>
                        </div>
                    </div>

                    <!-- password -->
                    <div>
                        <h3 class="text-lg font-bold text-[#1A3A35] mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            Keamanan Akun
                        </h3>

                        <div class="grid md:grid-cols-2 gap-4">
                            <!-- password -->
                            <div>
                                <label for="password" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                                    Password <span class="text-[#E85D5D]">*</span>
                                </label>
                                <input 
                                    type="password" 
                                    name="password" 
                                    id="password" 
                                    required
                                    class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300 @error('password') border-[#E85D5D] @enderror"
                                    placeholder="••••••••"
                                >
                                <p class="mt-1 text-xs text-[#5A7A76]">Minimal 8 karakter</p>
                            </div>

                            <!-- pasword2 -->
                            <div>
                                <label for="password_confirmation" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                                    Konfirmasi Password <span class="text-[#E85D5D]">*</span>
                                </label>
                                <input 
                                    type="password" 
                                    name="password_confirmation" 
                                    id="password_confirmation" 
                                    required
                                    class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300"
                                    placeholder="••••••••"
                                >
                            </div>
                        </div>
                    </div>

                    <!-- submit -->
                    <button 
                        type="submit"
                        class="w-full bg-gradient-to-r from-[#4A9FD8] to-[#2D7A6E] hover:from-[#2D7A6E] hover:to-[#1F5951] text-white font-bold py-4 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-[1.02] flex items-center justify-center gap-2"
                    >
                        <span>Daftar Sebagai Dokter</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </form>

                <!-- div -->
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-[#E5F0ED]"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-white text-[#5A7A76]">atau</span>
                    </div>
                </div>

                <!-- ref login -->
                <div class="text-center">
                    <p class="text-sm text-[#5A7A76]">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="font-semibold text-[#2D7A6E] hover:text-[#1F5951] transition-colors duration-300">
                            Login di sini
                        </a>
                    </p>
                    <p class="text-sm text-[#5A7A76] mt-2">
                        Registrasi sebagai pasien?
                        <a href="{{ route('register') }}" class="font-semibold text-[#4A9FD8] hover:text-[#2D7A6E] transition-colors duration-300">
                            Daftar di sini
                        </a>
                    </p>
                </div>
            </div>

            <!-- home -->
            <div class="mt-6 text-center">
                <a href="{{ route('landing') }}" class="inline-flex items-center gap-2 text-sm text-[#5A7A76] hover:text-[#2D7A6E] transition-colors duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</body>
</html>
