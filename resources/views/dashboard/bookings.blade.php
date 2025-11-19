@extends('dashboard.layout')

@section('title', 'Janji Temu Saya')
@section('page-title', 'Janji Temu Saya')

@section('content')
<div class="space-y-6">
    <!-- Filter/Status Tabs -->
    <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED]">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-xl font-bold text-[#1A3A35] mb-1">Semua Janji Temu</h2>
                <p class="text-sm text-[#5A7A76]">Kelola dan lacak janji temu Anda</p>
            </div>
            <a href="{{ route('dashboard.create-booking') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Booking Baru
            </a>
        </div>
    </div>

    <!-- Appointments List -->
    @if($appointments->count() > 0)
        <div class="space-y-4">
            @foreach($appointments as $appointment)
                <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED] hover:shadow-lg transition-all duration-300">
                    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                        <!-- Appointment Info -->
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
                                        </div>
                                        <span class="px-4 py-1.5 rounded-full text-xs font-bold
                                            {{ $appointment->status === 'pending' ? 'bg-[#FFE4CC] text-[#FF8F5B]' : '' }}
                                            {{ $appointment->status === 'confirmed' ? 'bg-[#D4F4DD] text-[#52C77B]' : '' }}
                                            {{ $appointment->status === 'completed' ? 'bg-[#E3F2FD] text-[#4A9FD8]' : '' }}
                                            {{ $appointment->status === 'cancelled' ? 'bg-[#FDEAEA] text-[#E85D5D]' : '' }}">
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
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-3">
                                        <div class="flex items-start gap-2 text-sm">
                                            <svg class="w-4 h-4 text-[#4A9FD8] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                            </svg>
                                            <div class="flex-1">
                                                <span class="text-[#5A7A76]"><strong class="text-[#1A3A35]">Layanan:</strong></span>
                                                <div class="mt-1 space-y-1">
                                                    @foreach($appointment->services as $service)
                                                        <div class="flex items-center gap-2">
                                                            <span class="inline-block w-1.5 h-1.5 rounded-full bg-[#4A9FD8]"></span>
                                                            <span class="text-[#1A3A35]">{{ $service->name }}</span>
                                                            @if($service->pivot->added_by_doctor)
                                                                <span class="text-xs px-2 py-0.5 bg-[#E3F2FD] text-[#4A9FD8] rounded">Ditambah Dokter</span>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-center gap-2 text-sm">
                                            <svg class="w-4 h-4 text-[#2D7A6E] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            <span class="text-[#5A7A76]"><strong class="text-[#1A3A35]">Dokter:</strong> {{ $appointment->doctor->name }}</span>
                                        </div>
                                        
                                        <div class="flex items-center gap-2 text-sm">
                                            <svg class="w-4 h-4 text-[#FF8F5B] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span class="text-[#5A7A76]"><strong class="text-[#1A3A35]">Tanggal:</strong> {{ $appointment->appointment_time->format('d M Y') }}</span>
                                        </div>
                                        
                                        <div class="flex items-center gap-2 text-sm">
                                            <svg class="w-4 h-4 text-[#52C77B] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="text-[#5A7A76]"><strong class="text-[#1A3A35]">Waktu:</strong> {{ $appointment->appointment_time->format('H:i') }}</span>
                                        </div>
                                    </div>

                                    @if($appointment->client_notes)
                                        <div class="mt-3 p-3 bg-[#F0F8F6] rounded-lg">
                                            <p class="text-xs font-semibold text-[#1A3A35] mb-1">Catatan:</p>
                                            <p class="text-sm text-[#5A7A76]">{{ $appointment->client_notes }}</p>
                                        </div>
                                    @endif

                                    @if($appointment->transaction)
                                        <div class="mt-3 p-4 {{ $appointment->transaction->status === 'paid' ? 'bg-[#D4F4DD]' : 'bg-[#FFF8E1]' }} rounded-lg border-2 {{ $appointment->transaction->status === 'paid' ? 'border-[#52C77B]' : 'border-[#FFB74D]' }}">
                                            <div class="flex items-start justify-between gap-4">
                                                <div class="flex-1">
                                                    <p class="text-xs font-semibold {{ $appointment->transaction->status === 'paid' ? 'text-[#2E7D32]' : 'text-[#F57C00]' }} mb-1">Tagihan Pembayaran</p>
                                                    <p class="text-xs text-gray-600 mb-2">No. Invoice: {{ $appointment->transaction->invoice_number }}</p>
                                                    <div class="flex items-center gap-2">
                                                        <span class="text-xl font-bold {{ $appointment->transaction->status === 'paid' ? 'text-[#2E7D32]' : 'text-[#1A3A35]' }}">Rp {{ number_format($appointment->transaction->total_amount, 0, ',', '.') }}</span>
                                                        <span class="px-3 py-1 rounded-full text-xs font-bold {{ $appointment->transaction->status === 'paid' ? 'bg-[#52C77B] text-white' : 'bg-[#FFB74D] text-white' }}">
                                                            {{ $appointment->transaction->status === 'paid' ? 'Lunas' : 'Belum Dibayar' }}
                                                        </span>
                                                    </div>
                                                </div>
                                                @if($appointment->transaction->status === 'unpaid')
                                                    <form method="POST" action="{{ route('dashboard.pay-transaction', $appointment->transaction) }}" class="flex-shrink-0">
                                                        @csrf
                                                        <button 
                                                            type="submit"
                                                            onclick="return confirm('Konfirmasi pembayaran sebesar Rp {{ number_format($appointment->transaction->total_amount, 0, ',', '.') }}?')"
                                                            class="px-6 py-2.5 bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] text-white font-bold rounded-lg hover:shadow-lg transition-all duration-300 text-sm flex items-center gap-2"
                                                        >
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                            </svg>
                                                            Bayar Sekarang
                                                        </button>
                                                    </form>
                                                @else
                                                    <div class="flex items-center gap-2 text-[#2E7D32] flex-shrink-0">
                                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                        </svg>
                                                        <span class="text-sm font-bold">Terbayar</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-row lg:flex-col gap-2 lg:min-w-[140px]">
                            @if($appointment->status === 'pending')
                                <!-- Edit button for pending appointments -->
                                @php
                                    $editData = [
                                        'id' => $appointment->id,
                                        'pet_id' => $appointment->pet_id,
                                        'pet_name' => $appointment->pet->name,
                                        'doctor_id' => $appointment->doctor_id,
                                        'doctor_name' => $appointment->doctor->user->name,
                                        'appointment_date' => $appointment->appointment_time->format('Y-m-d'),
                                        'appointment_time' => $appointment->appointment_time->format('H:i'),
                                        'client_notes' => $appointment->client_notes,
                                        'service_ids' => $appointment->services->filter(fn($s) => !$s->pivot->added_by_doctor)->pluck('id')->toArray()
                                    ];
                                @endphp
                                <button 
                                    onclick='openEditModal(@json($editData))'
                                    class="flex-1 lg:flex-none px-4 py-2 bg-[#4A9FD8] hover:bg-[#2D7A6E] text-white font-semibold rounded-lg transition-all duration-300 text-sm flex items-center justify-center gap-2"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Ubah
                                </button>
                            @endif

                            @if(in_array($appointment->status, ['pending', 'confirmed']))
                                <!-- Cancel button -->
                                <form method="POST" action="{{ route('dashboard.cancel-booking', $appointment) }}" 
                                    onsubmit="return confirm('Apakah Anda yakin ingin membatalkan janji temu ini?')" 
                                    class="flex-1 lg:flex-none">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit"
                                        class="w-full px-4 py-2 bg-[#E85D5D] hover:bg-[#D44545] text-white font-semibold rounded-lg transition-all duration-300 text-sm flex items-center justify-center gap-2"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        Batal
                                    </button>
                                </form>
                            @endif

                            @if($appointment->status === 'confirmed')
                                <div class="flex-1 lg:flex-none px-4 py-2 bg-[#D4F4DD] text-[#2E7D32] font-semibold rounded-lg text-sm text-center">
                                    Dikonfirmasi ✓
                                </div>
                            @endif

                            @if(in_array($appointment->status, ['completed', 'cancelled']))
                                <div class="flex-1 lg:flex-none px-4 py-2 bg-[#F0F8F6] text-[#5A7A76] font-semibold rounded-lg text-sm text-center">
                                    @if($appointment->status === 'completed')
                                        Selesai
                                    @else
                                        Dibatalkan
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $appointments->links() }}
        </div>
    @else
        <!-- Empty State -->
        <div class="bg-white rounded-2xl p-12 border-2 border-[#E5F0ED] text-center">
            <div class="w-24 h-24 rounded-full bg-[#F0F8F6] flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-[#5A7A76]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-[#1A3A35] mb-2">Belum Ada Booking</h3>
            <p class="text-[#5A7A76] mb-6">Anda belum membuat janji temu. Buat janji temu pertama Anda sekarang!</p>
            <a href="{{ route('dashboard.create-booking') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] text-white font-bold rounded-xl hover:shadow-xl transition-all duration-300 hover:scale-105">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Buat Janji Temu Pertama
            </a>
        </div>
    @endif
</div>

<!-- Edit Modal -->
<div id="editModal" class="hidden fixed inset-0 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto p-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-2xl font-bold text-[#1A3A35]">Ubah Janji Temu</h3>
                <p class="text-sm text-[#5A7A76] mt-1">Perbarui detail janji temu Anda</p>
            </div>
            <button onclick="closeEditModal()" class="text-[#5A7A76] hover:text-[#E85D5D] transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <form id="editForm" method="POST" action="" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Pet Selection -->
            <div>
                <label for="edit_pet_id" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                    Pilih Hewan Peliharaan <span class="text-[#E85D5D]">*</span>
                </label>
                <select 
                    name="pet_id" 
                    id="edit_pet_id" 
                    required
                    class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300"
                >
                    <option value="">Pilih hewan peliharaan</option>
                    @foreach($pets ?? [] as $pet)
                        <option value="{{ $pet->id }}">
                            {{ $pet->name }} - {{ $pet->species }} ({{ $pet->breed }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Service Selection (Multiple) -->
            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-3">
                    Layanan yang Diperlukan <span class="text-[#E85D5D]">*</span>
                </label>
                <div id="edit_services_container" class="grid md:grid-cols-2 gap-3">
                    @foreach($services ?? [] as $service)
                        <label class="flex items-start gap-3 p-4 border-2 border-[#E5F0ED] rounded-xl cursor-pointer hover:border-[#2D7A6E] hover:bg-[#F0F8F6] transition-all duration-300">
                            <input 
                                type="checkbox" 
                                name="service_ids[]" 
                                value="{{ $service->id }}"
                                class="edit-service-checkbox mt-1 w-5 h-5 text-[#2D7A6E] border-[#E5F0ED] rounded focus:ring-2 focus:ring-[#2D7A6E]"
                            >
                            <div class="flex-1">
                                <p class="font-semibold text-[#1A3A35]">{{ $service->name }}</p>
                                <p class="text-sm text-[#2D7A6E] font-medium">Rp {{ number_format($service->price, 0, ',', '.') }}</p>
                            </div>
                        </label>
                    @endforeach
                </div>
                <p class="mt-2 text-xs text-[#5A7A76]">
                    💡 Layanan yang ditambahkan dokter tidak dapat dihapus
                </p>
            </div>

            <!-- Doctor Selection -->
            <div>
                <label for="edit_doctor_id" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                    Dokter Pilihan <span class="text-[#E85D5D]">*</span>
                </label>
                <select 
                    name="doctor_id" 
                    id="edit_doctor_id" 
                    required
                    class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300"
                >
                    <option value="">Pilih dokter</option>
                    <option value="random" class="font-semibold text-[#2D7A6E]">
                        🎲 Pilih Secara Acak / Bebas Dipilihkan
                    </option>
                    <option disabled>──────────</option>
                    @foreach($doctors ?? [] as $doctor)
                        <option value="{{ $doctor->id }}">
                            {{ $doctor->name }} - {{ $doctor->spesialisasi }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Date & Time Selection -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label for="edit_appointment_date" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                        Tanggal Janji <span class="text-[#E85D5D]">*</span>
                    </label>
                    <input 
                        type="date" 
                        name="appointment_date" 
                        id="edit_appointment_date" 
                        min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                        required
                        class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300"
                    >
                </div>

                <div>
                    <label for="edit_appointment_time" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                        Waktu Janji <span class="text-[#E85D5D]">*</span>
                    </label>
                    <input 
                        type="time" 
                        name="appointment_time" 
                        id="edit_appointment_time" 
                        required
                        class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300"
                    >
                </div>
            </div>

            <div>
                <label for="edit_client_notes" class="block text-sm font-semibold text-[#1A3A35] mb-2">
                    Catatan Tambahan <span class="text-[#5A7A76] font-normal text-xs">(Opsional)</span>
                </label>
                <textarea 
                    name="client_notes" 
                    id="edit_client_notes" 
                    rows="4"
                    maxlength="1000"
                    class="w-full px-4 py-3 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300"
                    placeholder="Persyaratan khusus atau gejala yang ingin Anda sampaikan..."
                ></textarea>
            </div>
            
            <div class="flex gap-4 pt-4">
                <button type="submit" class="flex-1 bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] text-white font-bold py-3 rounded-xl hover:shadow-lg transition-all duration-300">
                    Perbarui Janji Temu
                </button>
                <button type="button" onclick="closeEditModal()" class="px-6 py-3 border-2 border-[#E5F0ED] text-[#5A7A76] hover:bg-[#F0F8F6] font-semibold rounded-xl transition-all duration-300">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(appointment) {
        // Set form action
        const form = document.getElementById('editForm');
        form.action = `/dashboard/bookings/${appointment.id}`;
        
        // Populate form fields
        document.getElementById('edit_pet_id').value = appointment.pet_id;
        document.getElementById('edit_doctor_id').value = appointment.doctor_id;
        document.getElementById('edit_appointment_date').value = appointment.appointment_date;
        document.getElementById('edit_appointment_time').value = appointment.appointment_time;
        document.getElementById('edit_client_notes').value = appointment.client_notes || '';
        
        // Uncheck all service checkboxes first
        document.querySelectorAll('.edit-service-checkbox').forEach(checkbox => {
            checkbox.checked = false;
        });
        
        // Check services that are selected
        if (appointment.service_ids && appointment.service_ids.length > 0) {
            appointment.service_ids.forEach(serviceId => {
                const checkbox = document.querySelector(`.edit-service-checkbox[value="${serviceId}"]`);
                if (checkbox) {
                    checkbox.checked = true;
                }
            });
        }
        
        // Show modal
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
    
    // Close modal when clicking outside
    document.getElementById('editModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeEditModal();
        }
    });
</script>
@endsection
