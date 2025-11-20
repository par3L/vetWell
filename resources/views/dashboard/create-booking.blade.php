@extends('dashboard.layout')

@section('title', 'Buat Janji Temu')
@section('page-title', 'Buat Janji Temu Baru')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-2xl p-8 border-2 border-[#E5F0ED] shadow-lg">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-[#1A3A35] mb-2">Jadwalkan Kunjungan Anda</h2>
            <p class="text-[#5A7A76]">Isi detail di bawah ini untuk membuat janji temu hewan peliharaan Anda</p>
        </div>

        <form method="POST" action="{{ route('dashboard.store-booking') }}" class="space-y-6">
            @csrf

            <!-- selection pet -->
            <div>
                <label for="pet_id" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                    Pilih Hewan Peliharaan <span class="text-[#E85D5D]">*</span>
                </label>
                @if($pets->count() > 0)
                    <select 
                        name="pet_id" 
                        id="pet_id" 
                        required
                        class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300 @error('pet_id') border-[#E85D5D] @enderror"
                    >
                        <option value="">Pilih hewan peliharaan</option>
                        @foreach($pets as $pet)
                            <option value="{{ $pet->id }}" {{ old('pet_id') == $pet->id ? 'selected' : '' }}>
                                {{ $pet->name }} - {{ $pet->species }} ({{ $pet->breed }})
                            </option>
                        @endforeach
                    </select>
                @else
                    <div class="p-4 bg-[#FFF5EC] border border-[#FF8F5B] rounded-xl">
                        <p class="text-sm text-[#FF8F5B]">Anda perlu mendaftarkan hewan peliharaan terlebih dahulu sebelum membuat janji temu. <a href="{{ route('pets.create') }}" class="font-semibold underline">Daftarkan sekarang</a></p>
                    </div>
                @endif
                @error('pet_id')
                    <p class="mt-1 text-sm text-[#E85D5D]">{{ $message }}</p>
                @enderror
            </div>

            <!-- layanan  -->
            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-3">
                    Layanan yang Diperlukan <span class="text-[#E85D5D]">*</span>
                </label>
                <div class="grid md:grid-cols-2 gap-3">
                    @foreach($services as $service)
                        <label class="flex items-start gap-3 p-4 border-2 border-[#E5F0ED] rounded-xl cursor-pointer hover:border-[#2D7A6E] hover:bg-[#F0F8F6] transition-all duration-300">
                            <input 
                                type="checkbox" 
                                name="service_ids[]" 
                                value="{{ $service->id }}"
                                {{ is_array(old('service_ids')) && in_array($service->id, old('service_ids')) ? 'checked' : '' }}
                                class="mt-1 w-5 h-5 text-[#2D7A6E] border-[#E5F0ED] rounded focus:ring-2 focus:ring-[#2D7A6E]"
                            >
                            <div class="flex-1">
                                <p class="font-semibold text-[#1A3A35]">{{ $service->name }}</p>
                                <p class="text-sm text-[#2D7A6E] font-medium">Rp {{ number_format($service->price, 0, ',', '.') }}</p>
                            </div>
                        </label>
                    @endforeach
                </div>
                @error('service_ids')
                    <p class="mt-2 text-sm text-[#E85D5D]">{{ $message }}</p>
                @enderror
            </div>

            <!-- doctor -->
            <div>
                <label for="doctor_id" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                    Dokter Pilihan <span class="text-[#E85D5D]">*</span>
                </label>
                <select 
                    name="doctor_id" 
                    id="doctor_id" 
                    required
                    class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300 @error('doctor_id') border-[#E85D5D] @enderror"
                >
                    <option value="">Pilih dokter</option>
                    <option value="random" {{ old('doctor_id') == 'random' ? 'selected' : '' }} class="font-semibold text-[#2D7A6E]">
                        Pilih Secara Acak / Bebas Dipilihkan
                    </option>
                    <option disabled>──────────</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                            {{ $doctor->name }} - {{ $doctor->spesialisasi }}
                        </option>
                    @endforeach
                </select>
                <p class="mt-1 text-xs text-[#5A7A76]">
                    Pilih "Pilih Secara Acak" jika tidak memiliki preferensi dokter tertentu
                </p>
                @error('doctor_id')
                    <p class="mt-1 text-sm text-[#E85D5D]">{{ $message }}</p>
                @enderror
            </div>

            <!-- tanggal -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label for="appointment_date" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                        Tanggal Janji <span class="text-[#E85D5D]">*</span>
                    </label>
                    <input 
                        type="date" 
                        name="appointment_date" 
                        id="appointment_date" 
                        value="{{ old('appointment_date') }}"
                        min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                        required
                        class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300 @error('appointment_date') border-[#E85D5D] @enderror"
                    >
                    @error('appointment_date')
                        <p class="mt-1 text-sm text-[#E85D5D]">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="appointment_time" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                        Waktu Janji <span class="text-[#E85D5D]">*</span>
                    </label>
                    <input 
                        type="time" 
                        name="appointment_time" 
                        id="appointment_time" 
                        value="{{ old('appointment_time') }}"
                        required
                        class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300 @error('appointment_time') border-[#E85D5D] @enderror"
                    >
                    @error('appointment_time')
                        <p class="mt-1 text-sm text-[#E85D5D]">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- notes client -->
            <div>
                <label for="client_notes" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                    Catatan Tambahan <span class="text-[#5A7A76] font-normal text-xs">(Opsional)</span>
                </label>
                <textarea 
                    name="client_notes" 
                    id="client_notes" 
                    rows="4"
                    maxlength="1000"
                    class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300 @error('client_notes') border-[#E85D5D] @enderror"
                    placeholder="Persyaratan khusus atau gejala yang ingin Anda sampaikan..."
                >{{ old('client_notes') }}</textarea>
                @error('client_notes')
                    <p class="mt-1 text-sm text-[#E85D5D]">{{ $message }}</p>
                @enderror
            </div>

            <!-- tips -->
            <div class="p-4 bg-[#E8F5E9] border border-[#52C77B] rounded-xl">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-[#52C77B] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="text-sm text-[#2E7D32]">
                        <p class="font-semibold mb-1">Informasi Penting:</p>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Janji temu Anda akan berstatus <strong>Menunggu</strong> hingga dikonfirmasi oleh admin kami</li>
                            <li>Anda dapat memperbarui detail janji temu selama statusnya masih menunggu</li>
                            <li>Setelah dikonfirmasi, perubahan tidak dapat dilakukan (tapi masih bisa dibatalkan)</li>
                            <li>Harap datang 10 menit lebih awal untuk janji temu Anda</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- action btn -->
            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                <button 
                    type="submit"
                    @if($pets->count() == 0) disabled @endif
                    class="flex-1 bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] hover:from-[#1F5951] hover:to-[#2D7A6E] text-white font-bold py-4 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-[1.02] flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Buat Janji Temu</span>
                </button>
                <a 
                    href="{{ route('dashboard.index') }}"
                    class="flex-1 sm:flex-none px-8 py-4 border-2 border-[#E5F0ED] text-[#5A7A76] hover:bg-[#F0F8F6] hover:text-[#2D7A6E] font-semibold rounded-xl transition-all duration-300 text-center"
                >
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
