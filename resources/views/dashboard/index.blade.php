@extends('dashboard.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Pets -->
        <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED] hover:shadow-lg transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-[#5A7A76] mb-1">Total Hewan</p>
                    <p class="text-3xl font-bold text-[#1A3A35]">{{ $stats['total_pets'] }}</p>
                </div>
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#FF8F5B]/20 to-[#FF8F5B]/10 flex items-center justify-center">
                    <svg class="w-7 h-7 text-[#FF8F5B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Appointments -->
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

        <!-- Pending Appointments -->
        <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED] hover:shadow-lg transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-[#5A7A76] mb-1">Menunggu</p>
                    <p class="text-3xl font-bold text-[#1A3A35]">{{ $stats['pending_appointments'] }}</p>
                </div>
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#FFB088]/20 to-[#FFB088]/10 flex items-center justify-center">
                    <svg class="w-7 h-7 text-[#FF8F5B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Completed Appointments -->
        <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED] hover:shadow-lg transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-[#5A7A76] mb-1">Selesai</p>
                    <p class="text-3xl font-bold text-[#1A3A35]">{{ $stats['completed_appointments'] }}</p>
                </div>
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#52C77B]/20 to-[#52C77B]/10 flex items-center justify-center">
                    <svg class="w-7 h-7 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Upcoming Appointments -->
        <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED]">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-[#1A3A35]">Janji Temu Mendatang</h2>
                <a href="{{ route('dashboard.bookings') }}" class="text-sm font-semibold text-[#2D7A6E] hover:text-[#1F5951] transition-colors">
                    Lihat Semua →
                </a>
            </div>

            @if($upcomingAppointments->count() > 0)
                <div class="space-y-4">
                    @foreach($upcomingAppointments as $appointment)
                        <div class="p-4 bg-[#F0F8F6] rounded-xl border border-[#E5F0ED] hover:shadow-md transition-all duration-300">
                            <div class="flex items-start justify-between mb-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#2D7A6E] to-[#4A9FD8] flex items-center justify-center text-white font-bold">
                                        {{ strtoupper(substr($appointment->pet->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-[#1A3A35]">{{ $appointment->pet->name }}</h3>
                                        <p class="text-sm text-[#5A7A76]">
                                            @foreach($appointment->services as $service)
                                                {{ $service->name }}@if(!$loop->last), @endif
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 rounded-full text-xs font-semibold 
                                    {{ $appointment->status === 'pending' ? 'bg-[#FFE4CC] text-[#FF8F5B]' : 'bg-[#D4F4DD] text-[#52C77B]' }}">
                                    {{ ucfirst($appointment->status) }}
                                </span>
                            </div>
                            <div class="flex items-center gap-4 text-sm text-[#5A7A76]">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>{{ $appointment->appointment_time->format('M d, Y') }}</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>{{ $appointment->appointment_time->format('h:i A') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <div class="w-20 h-20 rounded-full bg-[#F0F8F6] flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-[#5A7A76]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <p class="text-[#5A7A76] mb-4">Belum ada janji temu mendatang</p>
                    <a href="{{ route('dashboard.create-booking') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Buat Janji
                    </a>
                </div>
            @endif
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED]">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-[#1A3A35]">Aktivitas Terkini</h2>
            </div>

            @if($recentAppointments->count() > 0)
                <div class="space-y-4">
                    @foreach($recentAppointments as $appointment)
                        <div class="flex items-start gap-3 p-3 rounded-xl hover:bg-[#F0F8F6] transition-all duration-300">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center
                                {{ $appointment->status === 'completed' ? 'bg-[#D4F4DD]' : ($appointment->status === 'cancelled' ? 'bg-[#FDEAEA]' : 'bg-[#FFE4CC]') }}">
                                <svg class="w-5 h-5 
                                    {{ $appointment->status === 'completed' ? 'text-[#52C77B]' : ($appointment->status === 'cancelled' ? 'text-[#E85D5D]' : 'text-[#FF8F5B]') }}" 
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    @if($appointment->status === 'completed')
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    @elseif($appointment->status === 'cancelled')
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    @else
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    @endif
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-[#1A3A35] truncate">
                                    @foreach($appointment->services as $service)
                                        {{ $service->name }}@if(!$loop->last), @endif
                                    @endforeach
                                    - {{ $appointment->pet->name }}
                                </p>
                                <p class="text-xs text-[#5A7A76]">{{ $appointment->created_at->diffForHumans() }}</p>
                                @if($appointment->transaction)
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="text-xs font-bold text-[#1A3A35]">Rp {{ number_format($appointment->transaction->total_amount, 0, ',', '.') }}</span>
                                        <span class="px-2 py-0.5 rounded text-xs font-semibold {{ $appointment->transaction->status === 'paid' ? 'bg-[#52C77B] text-white' : 'bg-[#FFB74D] text-white' }}">
                                            {{ $appointment->transaction->status === 'paid' ? '✓ Lunas' : 'Belum Bayar' }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                            <span class="text-xs font-semibold 
                                {{ $appointment->status === 'completed' ? 'text-[#52C77B]' : ($appointment->status === 'cancelled' ? 'text-[#E85D5D]' : 'text-[#FF8F5B]') }}">
                                @if($appointment->status === 'pending')
                                    Menunggu
                                @elseif($appointment->status === 'confirmed')
                                    Dikonfirmasi
                                @elseif($appointment->status === 'completed')
                                    Selesai
                                @elseif($appointment->status === 'cancelled')
                                    Dibatalkan
                                @endif
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <div class="w-20 h-20 rounded-full bg-[#F0F8F6] flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-[#5A7A76]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <p class="text-[#5A7A76]">Belum ada aktivitas terkini</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] rounded-2xl p-8 text-white">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
            <div>
                <h2 class="text-2xl font-bold mb-2">Perlu buat janji temu?</h2>
                <p class="text-white/90">Pilih dari berbagai layanan veteriner kami</p>
            </div>
            <a href="{{ route('dashboard.create-booking') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-white text-[#2D7A6E] font-bold rounded-xl hover:shadow-xl transition-all duration-300 hover:scale-105">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Buat Janji Temu
            </a>
        </div>
    </div>
</div>
@endsection
