@extends('admin.layout')

@section('title', 'Kelola Team')
@section('page-title', 'Kelola Team')

@section('content')
<div class="space-y-6">
    <!-- section 1: doc -->
    <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED]">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-[#1A3A35]">Dokter yang Terdaftar</h2>
        </div>

        @if($doctors->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($doctors as $doctor)
                    <div class="bg-[#F0F8F6] rounded-xl p-6 border-2 border-[#E5F0ED] hover:shadow-lg transition-all duration-300">
                        <div class="flex items-start gap-4">
                            @if($doctor->photo)
                                <img src="{{ Storage::url($doctor->photo) }}" alt="{{ $doctor->name }}" class="w-16 h-16 rounded-full object-cover">
                            @else
                                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-[#2D7A6E] to-[#4A9FD8] flex items-center justify-center text-white font-bold text-xl">
                                    {{ strtoupper(substr($doctor->name, 0, 1)) }}
                                </div>
                            @endif
                            <div class="flex-1">
                                <h3 class="font-bold text-[#1A3A35] mb-1">{{ $doctor->name }}</h3>
                                <p class="text-sm text-[#5A7A76] mb-2">{{ $doctor->spesialisasi }}</p>
                                <p class="text-xs text-[#5A7A76]">{{ $doctor->position }}</p>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-t border-[#E5F0ED]">
                            <form method="POST" action="{{ route('admin.doctor.update-team-status', $doctor) }}" class="space-y-3">
                                @csrf
                                @method('PUT')
                                
                                <!-- toggle show doctor -->
                                <div class="flex items-center justify-between">
                                    <label class="text-sm font-semibold text-[#1A3A35]">Tampilkan di Team Page</label>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="show_in_team" value="1" {{ $doctor->show_in_team ? 'checked' : '' }} class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-[#2D7A6E]/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#2D7A6E]"></div>
                                    </label>
                                </div>

                                <!-- bio -->
                                <div>
                                    <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Bio untuk Team Page</label>
                                    <textarea name="bio" rows="3" class="w-full px-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E] text-sm" placeholder="Tambahkan bio dokter...">{{ $doctor->bio }}</textarea>
                                </div>

                                <button type="submit" class="w-full px-4 py-2 bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] text-white font-semibold rounded-lg hover:shadow-lg transition-all duration-300">
                                    Update
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <p class="text-[#5A7A76]">Belum ada dokter yang terdaftar</p>
            </div>
        @endif
    </div>

    <!-- section2: staff -->
    <div class="bg-white rounded-2xl p-6 border-2 border-[#E5F0ED]">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-[#1A3A35]">Staff Team</h2>
            <button onclick="openAddStaffModal()" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Staff
            </button>
        </div>

        @if($staffMembers->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($staffMembers as $staff)
                    <div class="bg-[#F0F8F6] rounded-xl p-6 border-2 border-[#E5F0ED] hover:shadow-lg transition-all duration-300">
                        <div class="flex items-start gap-4 mb-4">
                            @if($staff->photo)
                                <img src="{{ Storage::url($staff->photo) }}" alt="{{ $staff->name }}" class="w-16 h-16 rounded-full object-cover">
                            @else
                                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-[#FF8F5B] to-[#FFB088] flex items-center justify-center text-white font-bold text-xl">
                                    {{ strtoupper(substr($staff->name, 0, 1)) }}
                                </div>
                            @endif
                            <div class="flex-1">
                                <h3 class="font-bold text-[#1A3A35] mb-1">{{ $staff->name }}</h3>
                                <p class="text-sm text-[#5A7A76] mb-1">{{ $staff->position }}</p>
                                <p class="text-xs text-[#5A7A76]">{{ $staff->email }}</p>
                                <p class="text-xs text-[#5A7A76]">{{ $staff->phone }}</p>
                            </div>
                        </div>

                        @if($staff->bio)
                            <p class="text-sm text-[#5A7A76] mb-4 line-clamp-3">{{ $staff->bio }}</p>
                        @endif

                        <div class="flex gap-2">
                            <button onclick="openEditStaffModal({{ json_encode($staff) }})" class="flex-1 px-4 py-2 bg-[#2D7A6E] text-white font-semibold rounded-lg hover:bg-[#1F5951] transition-all duration-300">
                                Edit
                            </button>
                            <form method="POST" action="{{ route('admin.staff.destroy', $staff) }}" onsubmit="return confirm('Yakin ingin menghapus staff ini?')" class="flex-1">
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <p class="text-[#5A7A76] mb-4">Belum ada staff yang ditambahkan</p>
                <button onclick="openAddStaffModal()" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Staff Pertama
                </button>
            </div>
        @endif
    </div>
</div>

<!-- add form -->
<div id="addStaffModal" class="hidden fixed inset-0 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="sticky top-0 bg-white border-b border-[#E5F0ED] px-6 py-4 flex items-center justify-between">
            <h3 class="text-xl font-bold text-[#1A3A35]">Tambah Staff Baru</h3>
            <button onclick="closeAddStaffModal()" class="text-[#5A7A76] hover:text-[#1A3A35]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form method="POST" action="{{ route('admin.staff.store') }}" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf
            
            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Nama Lengkap*</label>
                <input type="text" name="name" required class="w-full px-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E]" placeholder="Nama staff">
            </div>

            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Email*</label>
                <input type="email" name="email" required class="w-full px-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E]" placeholder="email@example.com">
            </div>

            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">No. Telepon*</label>
                <input type="text" name="phone" required class="w-full px-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E]" placeholder="08xxxxxxxxxx">
            </div>

            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Posisi/Jabatan*</label>
                <input type="text" name="position" required class="w-full px-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E]" placeholder="Contoh: Receptionist, Assistant">
            </div>

            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Bio</label>
                <textarea name="bio" rows="3" class="w-full px-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E]" placeholder="Bio singkat staff..."></textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Foto</label>
                <input type="file" name="photo" accept="image/jpeg,image/png,image/jpg" class="w-full px-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E]">
                <p class="text-xs text-[#5A7A76] mt-1">Format: JPG, PNG (Max: 2MB)</p>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="button" onclick="closeAddStaffModal()" class="flex-1 px-6 py-3 border-2 border-[#E5F0ED] text-[#5A7A76] font-semibold rounded-xl hover:bg-[#F0F8F6] transition-all duration-300">
                    Batal
                </button>
                <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-300">
                    Tambah Staff
                </button>
            </div>
        </form>
    </div>
</div>

<!-- edit form -->
<div id="editStaffModal" class="hidden fixed inset-0 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="sticky top-0 bg-white border-b border-[#E5F0ED] px-6 py-4 flex items-center justify-between">
            <h3 class="text-xl font-bold text-[#1A3A35]">Edit Staff</h3>
            <button onclick="closeEditStaffModal()" class="text-[#5A7A76] hover:text-[#1A3A35]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form id="editStaffForm" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Nama Lengkap*</label>
                <input type="text" id="edit_name" name="name" required class="w-full px-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E]">
            </div>

            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Email*</label>
                <input type="email" id="edit_email" name="email" required class="w-full px-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E]">
            </div>

            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">No. Telepon*</label>
                <input type="text" id="edit_phone" name="phone" required class="w-full px-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E]">
            </div>

            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Posisi/Jabatan*</label>
                <input type="text" id="edit_position" name="position" required class="w-full px-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E]">
            </div>

            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Bio</label>
                <textarea id="edit_bio" name="bio" rows="3" class="w-full px-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E]"></textarea>
            </div>

            <div class="flex items-center justify-between">
                <label class="text-sm font-semibold text-[#1A3A35]">Tampilkan di Team Page</label>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" id="edit_show_in_team" name="show_in_team" value="1" class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-[#2D7A6E]/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#2D7A6E]"></div>
                </label>
            </div>

            <div>
                <label class="block text-sm font-semibold text-[#1A3A35] mb-2">Foto Baru</label>
                <input type="file" name="photo" accept="image/jpeg,image/png,image/jpg" class="w-full px-4 py-2 border-2 border-[#E5F0ED] rounded-lg focus:outline-none focus:border-[#2D7A6E]">
                <p class="text-xs text-[#5A7A76] mt-1">Format: JPG, PNG (Max: 2MB)</p>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="button" onclick="closeEditStaffModal()" class="flex-1 px-6 py-3 border-2 border-[#E5F0ED] text-[#5A7A76] font-semibold rounded-xl hover:bg-[#F0F8F6] transition-all duration-300">
                    Batal
                </button>
                <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-[#2D7A6E] to-[#4A9FD8] text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-300">
                    Update Staff
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openAddStaffModal() {
        document.getElementById('addStaffModal').classList.remove('hidden');
    }

    function closeAddStaffModal() {
        document.getElementById('addStaffModal').classList.add('hidden');
    }

    function openEditStaffModal(staff) {
        const form = document.getElementById('editStaffForm');
        form.action = `/admin/staff/${staff.id}`;
        
        document.getElementById('edit_name').value = staff.name;
        document.getElementById('edit_email').value = staff.email;
        document.getElementById('edit_phone').value = staff.phone;
        document.getElementById('edit_position').value = staff.position || '';
        document.getElementById('edit_bio').value = staff.bio || '';
        document.getElementById('edit_show_in_team').checked = staff.show_in_team;
        
        document.getElementById('editStaffModal').classList.remove('hidden');
    }

    function closeEditStaffModal() {
        document.getElementById('editStaffModal').classList.add('hidden');
    }
</script>
@endsection
