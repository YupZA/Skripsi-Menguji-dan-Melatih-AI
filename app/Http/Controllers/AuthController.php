<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:siswa,guru',
        ];

        if ($request->role === 'siswa') {
            $rules['nis'] = 'required|unique:users,nis';
            $rules['token_kelas'] = 'required';
        }

        if ($request->role === 'guru') {
            $rules['nip'] = 'required|unique:users,nip';
        }

        $request->validate($rules);

        $kelasId = null;

        if ($request->role === 'siswa') {
            $kelas = Kelas::where('token', $request->token_kelas)->first();

            if (!$kelas) {
                return back()->withErrors([
                    'token_kelas' => 'Token kelas tidak ditemukan'
                ])->withInput();
            }

            $kelasId = $kelas->id;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'nis' => $request->nis,
            'kelas_id' => $kelasId,
            'nip' => $request->nip,
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return auth()->user()->isGuru()
                ? redirect('/guru/dashboard')
                : redirect('/landing-page/beranda');
        }

        return back()->withErrors([
            'email' => 'Login gagal',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/landing-page/beranda');
    }
}
