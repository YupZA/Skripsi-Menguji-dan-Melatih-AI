<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        // ✅ VALIDASI DI DEPAN
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|min:6',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // update nama
        $user->name = $request->name;

        // update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // upload foto profil
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')
                ->store('profile_photos', 'public');

            $user->profile_photo = $path;
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui');
    }

}
