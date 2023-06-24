<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Registered;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showSiswaRegistrationForm()
    {
        return view('auth.register-siswa');
    }

    public function registerSiswa(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $role = Role::where('name', 'siswa')->first();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role()->associate($role);
        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function showGuruRegistrationForm()
    {
        return view('auth.register-guru');
    }

    public function registerGuru(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $role = Role::where('name', 'guru')->first();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role()->associate($role);
        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard');
    }

        public function showKepalaSekolahRegistrationForm()
    {
        return view('auth.register-kepala-sekolah');
    }

    public function registerKepalaSekolah(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = 1; // Atur role_id menjadi 1 untuk kepala sekolah
        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
