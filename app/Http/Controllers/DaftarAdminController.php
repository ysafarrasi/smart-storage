<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;

class DaftarAdminController extends Controller
{
    // Menampilkan daftar admin
    public function index() {
        $user = User::all();
        return view('admin.daftaradmin', compact('user'));
    }

    // Menampilkan form tambah admin
    public function create() {
        return view('admin.createadmin');
    }

    // Menyimpan admin baru
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create($validated);
        return redirect()->route('daftaradmin.index')->with('success', 'Admin berhasil ditambahkan');
    }

    // Menampilkan form edit admin
    public function edit($id)
    {
        $user = User::findOrFail($id);  // Mengambil data user berdasarkan ID
        return view('admin.editadmin', compact('user'));  // Menampilkan halaman edit dengan data user
    }

    // Metode untuk menangani pembaruan data admin
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|confirmed|min:8',  // Validasi password jika ada
        ]);

        $user = User::findOrFail($id);  // Mengambil data user berdasarkan ID

        // Update data admin
        $user->name = $request->name;
        $user->email = $request->email;

        // Cek apakah password diisi, jika ya, maka update password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Simpan perubahan
        $user->save();

        // Redirect atau beri notifikasi sukses
        return redirect()->route('daftaradmin.index')->with('success', 'Admin berhasil diperbarui.');
    }



    // Menampilkan detail admin
    public function show(User $user) {
        return view('admin.daftaradmin', compact('user'));
    }

    // Menghapus admin
    public function destroy($id) {
        $user = User::findOrFail($id);
        if ($user->delete()) {
            return redirect()->route('daftaradmin.index')->with('success', 'Admin berhasil dihapus');
        } else {
            return redirect()->route('daftaradmin.index')->with('error', 'Gagal menghapus admin')->withInput();
        }
    }

    // Tambahkan method patch
}
