@extends('doctor.layout')

@section('title', 'Edit Profile')
@section('page-title', 'Edit Profile')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- card profile -->
    <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED]">
        <h2 class="text-xl font-bold text-[#1A3A35] mb-6">Informasi Akun</h2>
        
        <form method="POST" action="{{ route('doctor.profile.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- foto profile -->
            <div class="flex items-start gap-6">
                <div class="flex-shrink-0">
                    <div class="relative">
                        @if(Auth::user()->doctor && Auth::user()->doctor->photo)
                            <img id="preview-photo" src="{{ Storage::url(Auth::user()->doctor->photo) }}" alt="Profile Photo" class="w-24 h-24 rounded-full object-cover border-4 border-[#E5F0ED]">
                        @else
                            <div id="preview-photo" class="w-24 h-24 rounded-full bg-gradient-to-br from-[#2D7A6E] to-[#4A9FD8] flex items-center justify-center text-white font-bold text-3xl border-4 border-[#E5F0ED]">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        @endif
                        <label for="photo" class="absolute bottom-0 right-0 bg-[#2D7A6E] text-white p-2 rounded-full cursor-pointer hover:bg-[#1F5951] transition-all duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </label>
                    </div>
                </div>
                <div class="flex-1">
                    <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Foto Profile</label>
                    <input type="file" id="photo" name="photo" accept="image/jpeg,image/png,image/jpg" class="hidden">
                    <p class="text-sm text-[#5A7A76] mb-2">Klik icon kamera untuk mengganti foto</p>
                    <p class="text-xs text-[#5A7A76]">Format: JPG, PNG (Max: 2MB)</p>
                </div>
            </div>

            <!-- nama lengkap -->
            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E] transition-all duration-300" placeholder="Masukkan nama lengkap">
            </div>

            <!-- no telepon -->
            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">No. Telepon</label>
                <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}" class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E] transition-all duration-300" placeholder="08xxxxxxxxxx">
            </div>

            <!-- email -->
            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E] transition-all duration-300" placeholder="email@example.com">
                <p class="text-xs text-[#5A7A76] mt-1">jika email diubah, data akan diperbarui di database</p>
            </div>

            <!-- spesialisasi -->
            @if(Auth::user()->doctor)
            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Spesialisasi</label>
                <input type="text" name="spesialisasi" value="{{ old('spesialisasi', Auth::user()->doctor->spesialisasi) }}" class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E] transition-all duration-300" placeholder="Contoh: Bedah, Umum">
            </div>

            <!-- posisi -->
            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Posisi</label>
                <input type="text" name="position" value="{{ old('position', Auth::user()->doctor->position) }}" class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E] transition-all duration-300" placeholder="Contoh: Dokter Hewan Senior">
            </div>
            @endif

            <!-- button submit -->
            <div class="flex gap-3 pt-4">
                <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-300">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <!-- card ganti password -->
    <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED]">
        <h2 class="text-xl font-bold text-[#1A3A35] mb-6">Ganti Password</h2>
        
        <form method="POST" action="{{ route('doctor.profile.update-password') }}" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- password lama -->
            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Password Lama</label>
                <input type="password" name="current_password" required class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E] transition-all duration-300" placeholder="Masukkan password lama">
            </div>

            <!-- password baru -->
            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Password Baru</label>
                <input type="password" name="new_password" required class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E] transition-all duration-300" placeholder="Masukkan password baru">
                <p class="text-xs text-[#5A7A76] mt-1">minimal 8 karakter</p>
            </div>

            <!-- konfirmasi password baru -->
            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Konfirmasi Password Baru</label>
                <input type="password" name="new_password_confirmation" required class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E] transition-all duration-300" placeholder="Konfirmasi password baru">
            </div>

            <!-- button submit -->
            <div class="flex gap-3 pt-4">
                <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-[#E85D5D] to-[#FF8F5B] text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-300">
                    Ganti Password
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // preview foto sebelum upload
    document.getElementById('photo').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('preview-photo');
                if (preview.tagName === 'IMG') {
                    preview.src = e.target.result;
                } else {
                    // ganti div dengan img
                    const newImg = document.createElement('img');
                    newImg.id = 'preview-photo';
                    newImg.src = e.target.result;
                    newImg.className = 'w-24 h-24 rounded-full object-cover border-4 border-[#E5F0ED]';
                    preview.parentNode.replaceChild(newImg, preview);
                }
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
