@extends('doctor.layout')

@section('title', 'Detail Janji Temu')
@section('page-title', 'Detail Janji Temu')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">
    <!-- back -->
    <a href="{{ route('doctor.dashboard') }}" class="inline-flex items-center gap-2 text-[#2D7A6E] hover:text-[#1F5951] font-semibold">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Dashboard
    </a>

    <!-- pet/owner detail -->
    <div class="bg-white rounded-2xl p-8 border-2 border-[#E5F0ED]">
        <div class="flex items-start gap-6 mb-6">
            @if($appointment->pet->photo)
                <img src="{{ asset($appointment->pet->photo) }}" alt="{{ $appointment->pet->name }}" class="w-32 h-32 rounded-xl object-cover">
            @else
                <div class="w-32 h-32 rounded-xl bg-gradient-to-br from-[#2D7A6E] to-[#4A9FD8] flex items-center justify-center text-white font-bold text-4xl">
                    {{ strtoupper(substr($appointment->pet->name, 0, 2)) }}
                </div>
            @endif
            
            <div class="flex-1">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <h2 class="text-2xl font-bold text-[#1A3A35]">{{ $appointment->pet->name }}</h2>
                        <p class="text-[#5A7A76]">{{ $appointment->pet->species }} - {{ $appointment->pet->breed }}</p>
                        <p class="text-sm text-[#5A7A76] mt-1">Kelamin: {{ $appointment->pet->gender === 'male' ? 'Jantan' : 'Betina' }} | Lahir: {{ $appointment->pet->dob->format('d M Y') }}</p>
                    </div>
                    <span class="px-4 py-2 rounded-xl text-sm font-bold
                        {{ $appointment->status === 'pending' ? 'bg-[#FFE4CC] text-[#FF8F5B]' : '' }}
                        {{ $appointment->status === 'confirmed' ? 'bg-[#D4F4DD] text-[#52C77B]' : '' }}
                        {{ $appointment->status === 'completed' ? 'bg-[#E3F2FD] text-[#4A9FD8]' : '' }}
                        {{ $appointment->status === 'cancelled' ? 'bg-[#FDEAEA] text-[#E85D5D]' : '' }}">
                        @if($appointment->status === 'pending') Menunggu
                        @elseif($appointment->status === 'confirmed') Dikonfirmasi
                        @elseif($appointment->status === 'completed') Selesai
                        @else Dibatalkan
                        @endif
                    </span>
                </div>

                <div class="grid md:grid-cols-2 gap-4 p-4 bg-[#F0F8F6] rounded-xl">
                    <div>
                        <p class="text-xs font-semibold text-[#5A7A76] mb-1">Pemilik</p>
                        <p class="font-semibold text-[#1A3A35]">{{ $appointment->user->name }}</p>
                        <p class="text-sm text-[#5A7A76]">{{ $appointment->user->email }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-[#5A7A76] mb-1">Waktu Janji Temu</p>
                        <p class="font-semibold text-[#1A3A35]">{{ $appointment->appointment_time->format('d M Y') }}</p>
                        <p class="text-sm text-[#5A7A76]">{{ $appointment->appointment_time->format('H:i') }} WIB</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- services -->
    <div class="bg-white rounded-2xl p-8 border-2 border-[#E5F0ED]">
        <h3 class="text-xl font-bold text-[#1A3A35] mb-4">Layanan</h3>
        <div class="space-y-3">
            @foreach($appointment->services as $service)
                <div class="flex items-center justify-between p-4 bg-[#F0F8F6] rounded-xl">
                    <div>
                        <p class="font-semibold text-[#1A3A35]">{{ $service->name }}</p>
                        <p class="text-sm text-[#2D7A6E] font-medium">Rp {{ number_format($service->price, 0, ',', '.') }}</p>
                    </div>
                    @if($service->pivot->added_by_doctor)
                        <span class="px-3 py-1 bg-[#E3F2FD] text-[#4A9FD8] text-xs font-semibold rounded-lg">Ditambah Dokter</span>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- layanan tambahan -->
        @if($appointment->status === 'confirmed')
            <div class="mt-6 p-6 bg-[#FFF5EC] border-2 border-[#FF8F5B] rounded-xl">
                <h4 class="font-semibold text-[#1A3A35] mb-3">Tambah Layanan</h4>
                <form method="POST" action="{{ route('doctor.appointment.add-service', $appointment) }}" class="space-y-4">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-3">
                        @foreach($availableServices as $service)
                            @if(!$appointment->services->contains($service->id))
                                <label class="flex items-start gap-3 p-4 border-2 border-[#E5F0ED] rounded-xl cursor-pointer hover:border-[#2D7A6E] hover:bg-white transition-all duration-300">
                                    <input type="checkbox" name="service_ids[]" value="{{ $service->id }}" class="mt-1 w-5 h-5 text-[#2D7A6E] border-[#E5F0ED] rounded">
                                    <div class="flex-1">
                                        <p class="font-semibold text-[#1A3A35]">{{ $service->name }}</p>
                                        <p class="text-sm text-[#2D7A6E]">Rp {{ number_format($service->price, 0, ',', '.') }}</p>
                                    </div>
                                </label>
                            @endif
                        @endforeach
                    </div>
                    <button type="submit" class="w-full py-3 bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] text-white font-bold rounded-xl hover:shadow-lg transition-all duration-300">
                        Tambahkan Layanan Terpilih
                    </button>
                </form>
            </div>
        @endif
    </div>

    <!-- note client -->
    @if($appointment->client_notes)
        <div class="bg-white rounded-2xl p-8 border-2 border-[#E5F0ED]">
            <h3 class="text-xl font-bold text-[#1A3A35] mb-3">Catatan Klien</h3>
            <p class="text-[#5A7A76] whitespace-pre-line">{{ $appointment->client_notes }}</p>
        </div>
    @endif

    <!-- note doc -->
    <div class="bg-white rounded-2xl p-8 border-2 border-[#E5F0ED]">
        <h3 class="text-xl font-bold text-[#1A3A35] mb-4">Catatan Dokter</h3>
        
        @if($appointment->status === 'confirmed')
            <form method="POST" action="{{ route('doctor.appointment.update-notes', $appointment) }}" class="space-y-4">
                @csrf
                @method('PUT')
                <textarea 
                    name="doctor_notes" 
                    rows="6" 
                    class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300"
                    placeholder="Masukkan catatan diagnosis, treatment, atau informasi penting lainnya..."
                >{{ old('doctor_notes', $appointment->doctor_notes) }}</textarea>
                <button type="submit" class="px-6 py-3 bg-[#4A9FD8] hover:bg-[#2D7A6E] text-white font-semibold rounded-xl transition-all duration-300">
                    Simpan Catatan
                </button>
            </form>
        @elseif($appointment->doctor_notes)
            <p class="text-[#5A7A76] whitespace-pre-line p-4 bg-[#F0F8F6] rounded-xl">{{ $appointment->doctor_notes }}</p>
        @else
            <p class="text-[#5A7A76] italic">Belum ada catatan dokter</p>
        @endif
    </div>

    <!-- action button -->
    @if($appointment->status === 'confirmed')
        <div class="bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold mb-1">Selesaikan Janji Temu</h3>
                    <p class="text-white/90">Tandai janji temu ini sebagai selesai setelah pemeriksaan selesai</p>
                </div>
                <form method="POST" action="{{ route('doctor.appointment.complete', $appointment) }}" onsubmit="return confirm('Apakah Anda yakin ingin menyelesaikan janji temu ini?')">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="px-8 py-4 bg-white text-[#2D7A6E] font-bold rounded-xl hover:shadow-xl transition-all duration-300 hover:scale-105">
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Selesaikan
                        </span>
                    </button>
                </form>
            </div>
        </div>
    @endif
</div>
@endsection
