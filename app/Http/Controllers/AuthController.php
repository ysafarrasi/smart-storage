<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menangani proses login
    public function login(Request $request)
    {
        // Validasi input name dan password
        $request->validate([
            'name' => 'required|filled',
            'password' => 'required|filled',
        ]);

        // Cek apakah user dengan name tersebut ada
        $user = User::where('name', $request->name)->first();

        // Jika user ada dan password cocok
        if ($user && $request->password == $user->password) {
            // Login user
            Auth::login($user);

            // Redirect ke dashboard setelah login berhasil
            return redirect()->intended(route('dashboard'));
        }

        // Jika login gagal, redirect kembali dengan error
        return back()->withErrors([
            'name' => 'Name atau password salah.',
        ])->withInput();
    }

    public function logout(Request $request)    
    {
        // Logout user dan hapus session
        Auth::logout();

        // Hapus session yang sedang aktif
        $request->session()->invalidate();

        // Buat token session baru
        $request->session()->regenerateToken();

        // Redirect ke halaman login setelah logout berhasil
        return redirect()->route('index');
    }

}