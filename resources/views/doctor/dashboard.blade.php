@extends('doctor.layout')

@section('title', 'Dashboard Dokter')
@section('page-title', 'Janji Temu Saya')

@section('content')
<div class="space-y-6">
    <!-- stat card -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED] hover:shadow-lg transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-[#5A7A76] mb-1">Total Booking</p>
                    <p class="text-3xl font-bold text-[#1A3A35]">{{ $stats['total_appointments'] }}</p>
                </div>
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#4A9FD8]/20 to-[#4A9FD8]/10 flex items-center justify-center">
                    <svg class="w-7 h-7 text-[#4A9FD8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED] hover:shadow-lg transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-[#5A7A76] mb-1">Menunggu</p>
                    <p class="text-3xl font-bold text-[#1A3A35]">{{ $stats['pending'] }}</p>
                </div>
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#FFB088]/20 to-[#FFB088]/10 flex items-center justify-center">
                    <svg class="w-7 h-7 text-[#FF8F5B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED] hover:shadow-lg transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-[#5A7A76] mb-1">Dikonfirmasi</p>
                    <p class="text-3xl font-bold text-[#1A3A35]">{{ $stats['confirmed'] }}</p>
                </div>
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#52C77B]/20 to-[#52C77B]/10 flex items-center justify-center">
                    <svg class="w-7 h-7 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED] hover:shadow-lg transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-[#5A7A76] mb-1">Selesai</p>
                    <p class="text-3xl font-bold text-[#1A3A35]">{{ $stats['completed'] }}</p>
                </div>
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#4A9FD8]/20 to-[#4A9FD8]/10 flex items-center justify-center">
                    <svg class="w-7 h-7 text-[#4A9FD8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- list booking -->
    @if($appointments->count() > 0)
        <div class="space-y-4">
            @foreach($appointments as $appointment)
                <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED] hover:shadow-lg transition-all duration-300">
                    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                        <!-- detail -->
                        <div class="flex-1">
                            <div class="flex items-start gap-4 mb-4">
                                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-[#2D7A6E] to-[#4A9FD8] flex items-center justify-center text-white font-bold text-xl flex-shrink-0">
                                    {{ strtoupper(substr($appointment->pet->name, 0, 2)) }}
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-start justify-between mb-2">
                                        <div>
                                            <h3 class="text-lg font-bold text-[#1A3A35]">{{ $appointment->pet->name }}</h3>
                                            <p class="text-sm text-[#5A7A76]">{{ $appointment->pet->species }} - {{ $appointment->pet->breed }}</p>
                                            <p class="text-sm text-[#5A7A76]">Owner: {{ $appointment->user->name }}</p>
                                        </div>
                                        <span class="px-4 py-1.5 rounded-full text-xs font-bold
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
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-3 text-sm">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-[#FF8F5B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span class="text-[#1A3A35]">{{ $appointment->appointment_time->format('d M Y, H:i') }}</span>
                                        </div>
                                        <div class="flex items-start gap-2">
                                            <svg class="w-4 h-4 text-[#4A9FD8] mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                            </svg>
                                            <div>
                                                @foreach($appointment->services as $service)
                                                    <span class="text-[#1A3A35]">{{ $service->name }}</span>@if(!$loop->last), @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- action btn -->
                        <div class="flex flex-row lg:flex-col gap-2 lg:min-w-[160px]">
                            <a href="{{ route('doctor.appointment.show', $appointment) }}" 
                                class="flex-1 lg:flex-none px-4 py-2 bg-[#4A9FD8] hover:bg-[#2D7A6E] text-white font-semibold rounded-lg transition-all duration-300 text-sm flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                Detail
                            </a>
                            
                            @if($appointment->status === 'pending')
                                <form method="POST" action="{{ route('doctor.appointment.confirm', $appointment) }}" class="flex-1 lg:flex-none">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="w-full px-4 py-2 bg-[#52C77B] hover:bg-[#2E7D32] text-white font-semibold rounded-lg transition-all duration-300 text-sm flex items-center justify-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Konfirmasi
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- pagination -->
        <div class="mt-6">
            {{ $appointments->links() }}
        </div>
    @else
        <!-- no bookings -->
        <div class="bg-white rounded-2xl p-12 border-2 border-[#E5F0ED] text-center">
            <div class="w-24 h-24 rounded-full bg-[#F0F8F6] flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-[#5A7A76]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-[#1A3A35] mb-2">Belum Ada Janji Temu</h3>
            <p class="text-[#5A7A76]">Anda belum memiliki janji temu yang terjadwal.</p>
        </div>
    @endif
</div>
@endsection
