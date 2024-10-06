<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class APIUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input yang diterima
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255', // Nama harus diisi, tipe string, maksimal 255 karakter
            'email' => 'required|string|email|max:255|unique:users', // Email harus diisi, tipe string, email, maksimal 255 karakter, dan unik
            'password' => 'required|string|min:6|confirmed', // Password harus diisi, tipe string, minimal 6 karakter, dan harus sama dengan konfirmasi password
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            // Kembalikan respon error
            return response()->json([
                'message' => 'Gagal menambahkan user, silahkan coba lagi',
                'errors' => $validator->errors()->messages()
            ], 400);
        }

        // Buat user baru
        $user = User::create([
            'name' => $request->input('name'), // Nama
            'email' => $request->input('email'), // Email
            'password' => Hash::make($request->input('password')), // Password yang dienkripsi
        ]);

        // Buat token untuk user
        $token = $user->createToken('nama_token', ['*'])->plainTextToken; // Buat token dengan nama "nama_token" dan scope "*" (semua)

        // Kembalikan respon sukses
        return response()->json([
            'message' => 'User created successfully',
            'data' => $user,
            'token' => $token
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Gagal mengupdate user, silahkan coba lagi',
                'errors' => $validator->errors()->messages()
            ], 400);
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        return response()->json([
            'message' => 'User updated successfully',
            'data' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully'
        ]);
    }
}

