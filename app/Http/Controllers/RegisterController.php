<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Registered;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function showSiswaRegistrationForm()
    {
        return view('auth.register-siswa');
    }

    // public function registerSiswa(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     $role = Role::where('name', 'siswa')->first();

    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);
    //     $user->role()->associate($role);
    //     $user->save();

    //     Auth::login($user);

    //     return redirect()->route('pencaker.index');
    // }

    //baru
    public function registerSiswa(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'NIK' => 'required|string|max:255|unique:users',
        ]);

        $role = Role::where('name', 'siswa')->first();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->NIK = $request->NIK; // Menambahkan pengisian kolom NIK
        $user->password = Hash::make($request->password);
        $user->role()->associate($role);
        $user->save();

        Auth::login($user);

        return redirect()->route('pencaker.index');
    }

    public function showGuruRegistrationForm()
    {
        return view('auth.register-guru');
    }

    // public function registerGuru(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     $role = Role::where('name', 'guru')->first();

    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);
    //     $user->role()->associate($role);
    //     $user->save();

    //     Alert::success('Success', 'Pendaftaran guru berhasil.');

    //     return redirect()->route('management.index');
    // }

    //Baru
    public function registerGuru(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'NIK' => 'required|string|max:255|unique:users',
        ]);

        $role = Role::where('name', 'guru')->first();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->NIK = $request->NIK; // Menambahkan pengisian kolom NIK
        $user->role()->associate($role);
        $user->save();

        Alert::success('Success', 'Pendaftaran guru berhasil.');

        return redirect()->route('management.index');
    }

    public function registerKepalaSekolah(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'NIK' => 'required|string|max:255|unique:users',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = 1; // Atur role_id menjadi 1 untuk kepala sekolah
        $user->NIK = $request->NIK; // Menambahkan pengisian kolom NIK
        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
