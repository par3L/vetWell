@extends('dashboard.layout')

@section('title', $title)
@section('page-title', $title)

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl p-8 border-2 border-[#E5F0ED] shadow-lg">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-[#1A3A35] mb-2">{{ $title }}</h2>
            <p class="text-[#5A7A76]">Perbarui data hewan peliharaan Anda</p>
        </div>

        <form method="POST" action="{{ route('pets.update', $pet->id) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- nama -->
            <div>
                <label for="name" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                    Nama Hewan <span class="text-[#E85D5D]">*</span>
                </label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    value="{{ old('name', $pet->name) }}"
                    required
                    class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300 @error('name') border-[#E85D5D] @enderror"
                >
                @error('name')
                    <p class="mt-1 text-sm text-[#E85D5D]">{{ $message }}</p>
                @enderror
            </div>

            <!-- jenis/ras -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label for="species" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                        Jenis Hewan <span class="text-[#E85D5D]">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="species" 
                        id="species" 
                        value="{{ old('species', $pet->species) }}"
                        required
                        class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300 @error('species') border-[#E85D5D] @enderror"
                    >
                    @error('species')
                        <p class="mt-1 text-sm text-[#E85D5D]">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="breed" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                        Ras <span class="text-[#E85D5D]">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="breed" 
                        id="breed" 
                        value="{{ old('breed', $pet->breed) }}"
                        required
                        class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300 @error('breed') border-[#E85D5D] @enderror"
                    >
                    @error('breed')
                        <p class="mt-1 text-sm text-[#E85D5D]">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- tgl lahir/gender -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label for="dob" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                        Tanggal Lahir <span class="text-[#E85D5D]">*</span>
                    </label>
                    <input 
                        type="date" 
                        name="dob" 
                        id="dob" 
                        value="{{ old('dob', $pet->dob->format('Y-m-d')) }}"
                        max="{{ date('Y-m-d') }}"
                        required
                        class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300 @error('dob') border-[#E85D5D] @enderror"
                    >
                    @error('dob')
                        <p class="mt-1 text-sm text-[#E85D5D]">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="gender" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                        Jenis Kelamin <span class="text-[#E85D5D]">*</span>
                    </label>
                    <select 
                        name="gender" 
                        id="gender"
                        required
                        class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300 @error('gender') border-[#E85D5D] @enderror"
                    >
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="male" {{ old('gender', $pet->gender) == 'male' ? 'selected' : '' }}>Jantan</option>
                        <option value="female" {{ old('gender', $pet->gender) == 'female' ? 'selected' : '' }}>Betina</option>
                    </select>
                    @error('gender')
                        <p class="mt-1 text-sm text-[#E85D5D]">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- foto (opt) -->
            <div>
                <label for="photo" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                    Foto Hewan <span class="text-[#5A7A76] font-normal text-xs">(Opsional - kosongkan jika tidak ingin mengubah)</span>
                </label>
                
                <!-- cur foto -->
                @if($pet->photo)
                    <div class="mb-4 p-4 bg-[#F0F8F6] rounded-xl">
                        <p class="text-sm text-[#5A7A76] mb-2">Foto saat ini:</p>
                        <img src="{{ Storage::url($pet->photo) }}" alt="{{ $pet->name }}" class="w-32 h-32 object-cover rounded-lg">
                    </div>
                @endif
                
                <div class="relative">
                    <input 
                        type="file" 
                        name="photo" 
                        id="photo" 
                        accept="image/jpeg,image/jpg,image/png"
                        class="hidden"
                        onchange="updatePhotoPreview(this)"
                    >
                    <label 
                        for="photo" 
                        id="photo-dropzone"
                        class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed border-[#E5F0ED] rounded-xl cursor-pointer hover:border-[#2D7A6E] hover:bg-[#F0F8F6] transition-all duration-300 @error('photo') border-[#E85D5D] @enderror"
                    >
                        <div id="photo-preview" class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-12 h-12 mb-3 text-[#5A7A76]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="mb-2 text-sm text-[#5A7A76]"><span class="font-semibold">Klik untuk upload foto baru</span></p>
                            <p class="text-xs text-[#5A7A76]">PNG, JPG, JPEG (Maks. 2MB)</p>
                        </div>
                        <img id="photo-img" class="hidden w-full h-full object-cover rounded-xl" alt="Preview">
                    </label>
                </div>
                @error('photo')
                    <p class="mt-1 text-sm text-[#E85D5D]">{{ $message }}</p>
                @enderror
            </div>

            <!-- action btn -->
            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                <button 
                    type="submit"
                    class="flex-1 bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] hover:from-[#1F5951] hover:to-[#2D7A6E] text-white font-bold py-4 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-[1.02] flex items-center justify-center gap-2"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Perbarui Data</span>
                </button>
                <a 
                    href="{{ route('pets.index') }}"
                    class="flex-1 sm:flex-none px-8 py-4 border-2 border-[#E5F0ED] text-[#5A7A76] hover:bg-[#F0F8F6] hover:text-[#2D7A6E] font-semibold rounded-xl transition-all duration-300 text-center"
                >
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    function updatePhotoPreview(input) {
        const preview = document.getElementById('photo-preview');
        const img = document.getElementById('photo-img');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.classList.add('hidden');
                img.classList.remove('hidden');
                img.src = e.target.result;
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    const dropzone = document.getElementById('photo-dropzone');
    const fileInput = document.getElementById('photo');

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropzone.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropzone.addEventListener(eventName, () => {
            dropzone.classList.add('border-[#2D7A6E]', 'bg-[#F0F8F6]');
        });
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropzone.addEventListener(eventName, () => {
            dropzone.classList.remove('border-[#2D7A6E]', 'bg-[#F0F8F6]');
        });
    });

    dropzone.addEventListener('drop', function(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        
        fileInput.files = files;
        updatePhotoPreview(fileInput);
    });
</script>
@endsection
