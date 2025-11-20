<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class PetController extends Controller
{
    /**
     * menampilkan daftar hewan peliharaan milik user
     */
    public function index(Request $request)
    {
        // ambil input pencarian dari request
        $search = $request->input('search');
        
        // query data pet dengan fitur pencarian
        $data = Pet::query()
            ->where('user_id', Auth::id())
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('species', 'like', "%{$search}%")
                    ->orWhere('breed', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('dashboard.pets.index', [
            'data' => $data,
            'title' => 'Daftar Hewan Peliharaan',
            'search' => $search,
        ]);
    }

    /**
     * menampilkan form untuk menambah hewan peliharaan baru
     */
    public function create()
    {
        return view('dashboard.pets.create', [
            'title' => 'Tambah Hewan Peliharaan',
        ]);
    }

    /**
     * menyimpan data hewan peliharaan baru ke database
     */
    public function store(Request $request)
    {
        // validasi data yang dikirim dari form
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'dob' => 'required|date|before:today',
            'gender' => 'required|in:male,female',
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'name.required' => 'Nama hewan wajib diisi',
            'species.required' => 'Jenis hewan wajib diisi',
            'breed.required' => 'Ras hewan wajib diisi',
            'dob.required' => 'Tanggal lahir wajib diisi',
            'dob.before' => 'Tanggal lahir harus sebelum hari ini',
            'gender.required' => 'Jenis kelamin wajib dipilih',
            'photo.required' => 'Foto hewan wajib diupload',
            'photo.image' => 'File harus berupa gambar',
            'photo.mimes' => 'Format foto harus jpeg, jpg, atau png',
            'photo.max' => 'Ukuran foto maksimal 2MB',
        ]);

        // proses upload foto ke storage/pet-photos
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('pet-photos', 'public');
        }

        // simpan data ke database
        Pet::create([
            'user_id' => Auth::id(),
            'name' => $validateData['name'],
            'species' => $validateData['species'],
            'breed' => $validateData['breed'],
            'dob' => $validateData['dob'],
            'gender' => $validateData['gender'],
            'photo' => $photoPath ?? null,
        ]);

        return redirect()->route('pets.index')->with('success', 'Hewan peliharaan berhasil ditambahkan!');
    }

    /**
     * menampilkan form untuk mengedit data hewan peliharaan
     */
    public function edit(string $id)
    {
        // cari data pet berdasarkan id
        $pet = Pet::findOrFail($id);
        
        // pastikan pet milik user yang sedang login
        if ($pet->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('dashboard.pets.edit', [
            'title' => 'Edit Hewan Peliharaan',
            'pet' => $pet,
        ]);
    }

    /**
     * memperbarui data hewan peliharaan di database
     */
    public function update(Request $request, string $id)
    {
        // cari data pet berdasarkan id
        $pet = Pet::findOrFail($id);
        
        // pastikan pet milik user yang sedang login
        if ($pet->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        // validasi data yang dikirim dari form edit
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'dob' => 'required|date|before:today',
            'gender' => 'required|in:male,female',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'name.required' => 'Nama hewan wajib diisi',
            'species.required' => 'Jenis hewan wajib diisi',
            'breed.required' => 'Ras hewan wajib diisi',
            'dob.required' => 'Tanggal lahir wajib diisi',
            'dob.before' => 'Tanggal lahir harus sebelum hari ini',
            'gender.required' => 'Jenis kelamin wajib dipilih',
            'photo.image' => 'File harus berupa gambar',
            'photo.mimes' => 'Format foto harus jpeg, jpg, atau png',
            'photo.max' => 'Ukuran foto maksimal 2MB',
        ]);

        // jika ada foto baru diupload
        if ($request->hasFile('photo')) {
            // hapus foto lama jika ada
            if ($pet->photo) {
                Storage::disk('public')->delete($pet->photo);
            }
            
            // upload foto baru ke storage/pet-photos
            $validateData['photo'] = $request->file('photo')->store('pet-photos', 'public');
        }

        // update data di database
        $pet->update($validateData);

        return redirect()->route('pets.index')->with('success', 'Data hewan peliharaan berhasil diperbarui!');
    }

    /**
     * menghapus data hewan peliharaan dari database
     */
    public function destroy(string $id)
    {
        // cari data pet berdasarkan id
        $pet = Pet::findOrFail($id);
        
        // pastikan pet milik user yang sedang login
        if ($pet->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        // hapus foto jika ada
        if ($pet->photo) {
            Storage::disk('public')->delete($pet->photo);
        }
        
        // hapus data dari database
        $pet->delete();

        return redirect()->route('pets.index')->with('success', 'Hewan peliharaan berhasil dihapus!');
    }
}
