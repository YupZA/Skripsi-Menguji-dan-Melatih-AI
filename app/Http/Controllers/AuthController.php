<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            $rules['kelas'] = 'required';
        }

        if ($request->role === 'guru') {
            $rules['nip'] = 'required|unique:users,nip';
            // $rules['bidang'] = 'required';
        }

        $request->validate($rules);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
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

        return redirect('/login');
    }
}
