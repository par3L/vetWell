@extends('admin.layout')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')

@section('content')
<div class="space-y-6">
    <!-- stat card -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- total doc -->
        <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED] hover:shadow-lg transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-[#5A7A76] mb-1">Dokter Registrasi</p>
                    <p class="text-3xl font-bold text-[#1A3A35]">{{ $stats['total_doctors'] }}</p>
                </div>
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#2D7A6E]/20 to-[#2D7A6E]/10 flex items-center justify-center">
                    <svg class="w-7 h-7 text-[#2D7A6E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- total staff -->
        <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED] hover:shadow-lg transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-[#5A7A76] mb-1">Jumlah Staff</p>
                    <p class="text-3xl font-bold text-[#1A3A35]">{{ $stats['total_staff'] }}</p>
                </div>
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#4A9FD8]/20 to-[#4A9FD8]/10 flex items-center justify-center">
                    <svg class="w-7 h-7 text-[#4A9FD8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- total user -->
        <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED] hover:shadow-lg transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-[#5A7A76] mb-1">User Registrasi</p>
                    <p class="text-3xl font-bold text-[#1A3A35]">{{ $stats['total_users'] }}</p>
                </div>
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#FF8F5B]/20 to-[#FF8F5B]/10 flex items-center justify-center">
                    <svg class="w-7 h-7 text-[#FF8F5B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- revenue -->
        <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED] hover:shadow-lg transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-[#5A7A76] mb-1">Revenue</p>
                    <p class="text-2xl font-bold text-[#1A3A35]">Rp {{ number_format($stats['total_revenue'], 0, ',', '.') }}</p>
                </div>
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#52C77B]/20 to-[#52C77B]/10 flex items-center justify-center">
                    <svg class="w-7 h-7 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- booking stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- total -->
        <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED] hover:shadow-lg transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-[#5A7A76] mb-1">Total Booking</p>
                    <p class="text-3xl font-bold text-[#1A3A35]">{{ $stats['total_bookings'] }}</p>
                </div>
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#4A9FD8]/20 to-[#4A9FD8]/10 flex items-center justify-center">
                    <svg class="w-7 h-7 text-[#4A9FD8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- cancelled -->
        <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED] hover:shadow-lg transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-[#5A7A76] mb-1">Booking Dibatalkan</p>
                    <p class="text-3xl font-bold text-[#1A3A35]">{{ $stats['cancelled_bookings'] }}</p>
                </div>
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#E85D5D]/20 to-[#E85D5D]/10 flex items-center justify-center">
                    <svg class="w-7 h-7 text-[#E85D5D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- complete -->
        <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED] hover:shadow-lg transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-[#5A7A76] mb-1">Booking Selesai</p>
                    <p class="text-3xl font-bold text-[#1A3A35]">{{ $stats['completed_bookings'] }}</p>
                </div>
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#52C77B]/20 to-[#52C77B]/10 flex items-center justify-center">
                    <svg class="w-7 h-7 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- recent -->
    <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED]">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-[#1A3A35]">Aktivitas Terkini</h2>
        </div>

        @if($recentAppointments->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-[#F0F8F6]">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-[#5A7A76] uppercase tracking-wider">Client</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-[#5A7A76] uppercase tracking-wider">Pet</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-[#5A7A76] uppercase tracking-wider">Dokter</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-[#5A7A76] uppercase tracking-wider">Waktu</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-[#5A7A76] uppercase tracking-wider">Status</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-[#5A7A76] uppercase tracking-wider">Pembayaran</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-[#5A7A76] uppercase tracking-wider">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#E5F0ED]">
                        @foreach($recentAppointments as $appointment)
                            <tr class="hover:bg-[#F0F8F6] transition-colors">
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#2D7A6E] to-[#4A9FD8] flex items-center justify-center text-white font-bold text-sm">
                                            {{ strtoupper(substr($appointment->user->name, 0, 1)) }}
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-semibold text-[#1A3A35]">{{ $appointment->user->name }}</p>
                                            <p class="text-xs text-[#5A7A76]">{{ $appointment->user->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <p class="text-sm font-semibold text-[#1A3A35]">{{ $appointment->pet->name }}</p>
                                    <p class="text-xs text-[#5A7A76]">{{ $appointment->pet->species }}</p>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <p class="text-sm font-semibold text-[#1A3A35]">{{ $appointment->doctor->name }}</p>
                                    <p class="text-xs text-[#5A7A76]">{{ $appointment->doctor->spesialisasi }}</p>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <p class="text-sm font-semibold text-[#1A3A35]">{{ $appointment->appointment_time->format('d M Y') }}</p>
                                    <p class="text-xs text-[#5A7A76]">{{ $appointment->appointment_time->format('H:i') }}</p>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold
                                        @if($appointment->status === 'pending') bg-[#FFE4CC] text-[#FF8F5B]
                                        @elseif($appointment->status === 'confirmed') bg-[#D4F4DD] text-[#52C77B]
                                        @elseif($appointment->status === 'completed') bg-[#52C77B] text-white
                                        @else bg-[#FDEAEA] text-[#E85D5D]
                                        @endif">
                                        {{ ucfirst($appointment->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    @if($appointment->transaction)
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $appointment->transaction->status === 'paid' ? 'bg-[#52C77B] text-white' : 'bg-[#FFB74D] text-white' }}">
                                            {{ $appointment->transaction->status === 'paid' ? '✓ Lunas' : 'Belum Bayar' }}
                                        </span>
                                    @else
                                        <span class="text-xs text-[#5A7A76]">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    @if($appointment->transaction)
                                        <p class="text-sm font-bold text-[#1A3A35]">Rp {{ number_format($appointment->transaction->total_amount, 0, ',', '.') }}</p>
                                    @else
                                        <span class="text-xs text-[#5A7A76]">-</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
@endsection
