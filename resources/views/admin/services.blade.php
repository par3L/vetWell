@extends('admin.layout')

@section('title', 'Kelola Services')
@section('page-title', 'Kelola Services')

@section('content')
<div class="space-y-6">
    <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED]">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-[#1A3A35]">Daftar Layanan</h2>
            <button onclick="openAddServiceModal()" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Layanan
            </button>
        </div>

        @if($services->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($services as $service)
                    <div class="bg-[#F0F8F6] rounded-xl p-6 border-2 border-[#E5F0ED] hover:shadow-lg transition-all duration-300">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="px-3 py-1 bg-[#2D7A6E]/10 text-[#2D7A6E] text-xs font-semibold rounded-full">{{ $service->category }}</span>
                                    @if($service->tag === 'populer')
                                        <span class="px-3 py-1 bg-[#FFB088]/10 text-[#FF8F5B] text-xs font-semibold rounded-full">POPULER</span>
                                    @elseif($service->tag === 'rekomendasi')
                                        <span class="px-3 py-1 bg-blue-50 text-blue-600 text-xs font-semibold rounded-full">REKOMENDASI</span>
                                    @endif
                                </div>
                                <h3 class="font-bold text-[#1A3A35] text-lg mb-2">{{ $service->name }}</h3>
                                <p class="text-sm text-[#5A7A76] mb-3 line-clamp-3">{{ $service->description }}</p>
                                <p class="text-2xl font-bold text-[#2D7A6E]">Rp {{ number_format($service->price, 0, ',', '.') }}</p>
                            </div>
                        </div>

                        <div class="flex gap-2 mt-4 pt-4 border-t border-[#E5F0ED]">
                            <button onclick="openEditServiceModal({{ json_encode($service) }})" class="flex-1 px-4 py-2 bg-[#2D7A6E] text-white font-semibold rounded-lg hover:bg-[#1F5951] transition-all duration-300">
                                Edit
                            </button>
                            <form method="POST" action="{{ route('admin.services.destroy', $service) }}" onsubmit="return confirm('Yakin ingin menghapus layanan ini?')" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full px-4 py-2 bg-[#E85D5D] text-white font-semibold rounded-lg hover:bg-[#D44545] transition-all duration-300">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <div class="w-20 h-20 rounded-full bg-[#F0F8F6] flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-[#5A7A76]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <p class="text-[#5A7A76] mb-4">Belum ada layanan yang ditambahkan</p>
                <button onclick="openAddServiceModal()" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Layanan Pertama
                </button>
            </div>
        @endif
    </div>
</div>

<!-- add form -->
<div id="addServiceModal" class="hidden fixed inset-0 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-2xl w-full">
        <div class="border-b border-[#E5F0ED] px-6 py-4 flex items-center justify-between">
            <h3 class="text-xl font-bold text-[#1A3A35]">Tambah Layanan Baru</h3>
            <button onclick="closeAddServiceModal()" class="text-[#5A7A76] hover:text-[#1A3A35]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form method="POST" action="{{ route('admin.services.store') }}" class="p-6 space-y-4">
            @csrf
            
            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Nama Layanan*</label>
                <input type="text" name="name" required class="w-full px-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E]" placeholder="Contoh: Konsultasi Umum">
            </div>

            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Kategori*</label>
                <select name="category" required class="w-full px-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E]">
                    <option value="">Pilih Kategori</option>
                    <option value="Konsultasi & Pemeriksaan">Konsultasi & Pemeriksaan</option>
                    <option value="Vaksinasi">Vaksinasi</option>
                    <option value="Bedah & Operasi">Bedah & Operasi</option>
                    <option value="Grooming & Perawatan">Grooming & Perawatan</option>
                    <option value="Rawat Inap & Laboratorium">Rawat Inap & Laboratorium</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Tag Layanan</label>
                <select name="tag" class="w-full px-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E]">
                    <option value="default">Default</option>
                    <option value="populer">Populer</option>
                    <option value="rekomendasi">Rekomendasi</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Deskripsi</label>
                <textarea name="description" rows="4" class="w-full px-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E]" placeholder="Deskripsi layanan..."></textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Harga*</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#5A7A76] font-semibold">Rp</span>
                    <input type="number" name="price" min="0" step="1000" required class="w-full pl-12 pr-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E]" placeholder="50000">
                </div>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="button" onclick="closeAddServiceModal()" class="flex-1 px-6 py-3 border-2 border-[#E5F0ED] text-[#5A7A76] font-semibold rounded-xl hover:bg-[#F0F8F6] transition-all duration-300">
                    Batal
                </button>
                <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-300">
                    Tambah Layanan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- edit form -->
<div id="editServiceModal" class="hidden fixed inset-0 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-2xl w-full">
        <div class="border-b border-[#E5F0ED] px-6 py-4 flex items-center justify-between">
            <h3 class="text-xl font-bold text-[#1A3A35]">Edit Layanan</h3>
            <button onclick="closeEditServiceModal()" class="text-[#5A7A76] hover:text-[#1A3A35]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form id="editServiceForm" method="POST" class="p-6 space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Nama Layanan*</label>
                <input type="text" id="edit_name" name="name" required class="w-full px-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E]">
            </div>

            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Kategori*</label>
                <select id="edit_category" name="category" required class="w-full px-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E]">
                    <option value="">Pilih Kategori</option>
                    <option value="Konsultasi & Pemeriksaan">Konsultasi & Pemeriksaan</option>
                    <option value="Vaksinasi">Vaksinasi</option>
                    <option value="Bedah & Operasi">Bedah & Operasi</option>
                    <option value="Grooming & Perawatan">Grooming & Perawatan</option>
                    <option value="Rawat Inap & Laboratorium">Rawat Inap & Laboratorium</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Tag Layanan</label>
                <select id="edit_tag" name="tag" class="w-full px-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E]">
                    <option value="default">Default</option>
                    <option value="populer">Populer</option>
                    <option value="rekomendasi">Rekomendasi</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Deskripsi</label>
                <textarea id="edit_description" name="description" rows="4" class="w-full px-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E]"></textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Harga*</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#5A7A76] font-semibold">Rp</span>
                    <input type="number" id="edit_price" name="price" min="0" step="1000" required class="w-full pl-12 pr-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E]">
                </div>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="button" onclick="closeEditServiceModal()" class="flex-1 px-6 py-3 border-2 border-[#E5F0ED] text-[#5A7A76] font-semibold rounded-xl hover:bg-[#F0F8F6] transition-all duration-300">
                    Batal
                </button>
                <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-300">
                    Update Layanan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openAddServiceModal() {
        document.getElementById('addServiceModal').classList.remove('hidden');
    }

    function closeAddServiceModal() {
        document.getElementById('addServiceModal').classList.add('hidden');
    }

    function openEditServiceModal(service) {
        const form = document.getElementById('editServiceForm');
        form.action = `/admin/services/${service.id}`;
        
        document.getElementById('edit_name').value = service.name;
        document.getElementById('edit_category').value = service.category || 'Konsultasi & Pemeriksaan';
        document.getElementById('edit_tag').value = service.tag || 'default';
        document.getElementById('edit_description').value = service.description || '';
        document.getElementById('edit_price').value = service.price;
        
        document.getElementById('editServiceModal').classList.remove('hidden');
    }

    function closeEditServiceModal() {
        document.getElementById('editServiceModal').classList.add('hidden');
    }
</script>
@endsection
