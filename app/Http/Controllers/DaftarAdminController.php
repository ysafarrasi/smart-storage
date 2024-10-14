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
    public function edit(User $user) {
        if (!$user) {
            return redirect()->route('daftaradmin.index')->with('error', 'Admin tidak ditemukan');
        }
        return view('admin.editadmin', compact('user'));
    }

    // Memperbarui data admin
    public function update(Request $request, $id) {
    $user = User::findOrFail($id);  
    $user->update($request->all());
    return redirect()->route('daftaradmin.index')->with('success', 'Admin berhasil diperbarui' );
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

}