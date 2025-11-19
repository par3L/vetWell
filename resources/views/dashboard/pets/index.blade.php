@extends('dashboard.layout')

@section('title', 'Daftar Hewan Peliharaan')
@section('page-title', 'Hewan Peliharaan Saya')

@section('content')
<div class="space-y-6">
    <!-- Header dengan Tombol Tambah -->
    <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED]">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-xl font-bold text-[#1A3A35] mb-1">Kelola Hewan Peliharaan</h2>
                <p class="text-sm text-[#5A7A76]">Daftar hewan peliharaan yang terdaftar</p>
            </div>
            <a href="{{ route('pets.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Hewan
            </a>
        </div>
        
        <!-- Search Bar -->
        <form method="GET" action="{{ route('pets.index') }}" class="mt-4">
            <div class="relative">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ $search }}"
                    placeholder="Cari berdasarkan nama, jenis, atau ras..."
                    class="w-full px-4 py-3 pl-12 border-2 border-[#E5F0ED] rounded-xl focus:ring-2 focus:ring-[#2D7A6E] focus:border-[#2D7A6E] transition-all duration-300"
                >
                <svg class="w-5 h-5 text-[#5A7A76] absolute left-4 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </form>
    </div>

    <!-- Daftar Hewan -->
    @if($data->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($data as $pet)
                <div class="bg-white rounded-2xl border-2 border-[#E5F0ED] overflow-hidden hover:shadow-lg transition-all duration-300">
                    <!-- Foto Hewan -->
                    <div class="h-48 bg-gradient-to-br from-[#F0F8F6] to-[#FFF5EC] relative overflow-hidden">
                        @if($pet->photo)
                            <img src="{{ asset($pet->photo) }}" alt="{{ $pet->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-20 h-20 text-[#5A7A76]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Info Hewan -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#1A3A35] mb-2">{{ $pet->name }}</h3>
                        
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center gap-2 text-sm text-[#5A7A76]">
                                <svg class="w-4 h-4 text-[#4A9FD8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                                <span><strong>Jenis:</strong> {{ $pet->species }}</span>
                            </div>
                            
                            <div class="flex items-center gap-2 text-sm text-[#5A7A76]">
                                <svg class="w-4 h-4 text-[#FF8F5B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span><strong>Ras:</strong> {{ $pet->breed }}</span>
                            </div>
                            
                            <div class="flex items-center gap-2 text-sm text-[#5A7A76]">
                                <svg class="w-4 h-4 text-[#52C77B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span><strong>Lahir:</strong> {{ $pet->dob->format('d M Y') }}</span>
                            </div>
                            
                            <div class="flex items-center gap-2 text-sm text-[#5A7A76]">
                                <svg class="w-4 h-4 text-[#2D7A6E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span><strong>Kelamin:</strong> {{ $pet->gender === 'male' ? 'Jantan' : 'Betina' }}</span>
                            </div>
                        </div>
                        
                        <!-- Tombol Aksi -->
                        <div class="flex gap-2">
                            <a href="{{ route('pets.edit', $pet->id) }}" class="flex-1 px-4 py-2 bg-[#4A9FD8] hover:bg-[#2D7A6E] text-white font-semibold rounded-lg transition-all duration-300 text-sm text-center flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </a>
                            
                            <form method="POST" action="{{ route('pets.destroy', $pet->id) }}" 
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{ $pet->name }}?')"
                                class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full px-4 py-2 bg-[#E85D5D] hover:bg-[#D44545] text-white font-semibold rounded-lg transition-all duration-300 text-sm flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Empty State -->
        <div class="bg-white rounded-2xl p-12 border-2 border-[#E5F0ED] text-center">
            <div class="w-24 h-24 rounded-full bg-[#F0F8F6] flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-[#5A7A76]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-[#1A3A35] mb-2">Belum Ada Hewan Peliharaan</h3>
            <p class="text-[#5A7A76] mb-6">Tambahkan hewan peliharaan Anda untuk mulai membuat janji temu</p>
            <a href="{{ route('pets.create') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] text-white font-bold rounded-xl hover:shadow-xl transition-all duration-300 hover:scale-105">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Hewan Pertama
            </a>
        </div>
    @endif
</div>
@endsection
