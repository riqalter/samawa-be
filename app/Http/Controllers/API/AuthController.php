<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Handle register request.
     */
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Buat user baru
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Generate token Sanctum
        $token = $user->createToken('authToken')->plainTextToken;

        // Response
        return response()->json([
            'status'  => 'success',
            'message' => 'Register berhasil!',
            'user'    => $user,
            'token'   => $token,
        ], 201);
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Cek kecocokan password
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Email atau password salah.',
            ], 401);
        }

        // Hapus token sebelumnya (opsional, tergantung kebutuhan)
        // $user->tokens()->delete();

        // Generate token Sanctum baru
        $token = $user->createToken('authToken')->plainTextToken;

        // Response
        return response()->json([
            'status'  => 'success',
            'message' => 'Login berhasil!',
            'user'    => $user,
            'token'   => $token,
        ], 200);
    }

    /**
     * Kembalikan data user yang sedang login.
     */
    public function user(Request $request)
    {
        return response()->json([
            'status' => 'success',
            'user'   => $request->user(), // user() akan secara otomatis mengambil user dari token
        ], 200);
    }

    /**
     * Handle logout request.
     */
    public function logout(Request $request)
    {
        // Menghapus token saat ini
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Logout berhasil!',
        ], 200);
    }
}
