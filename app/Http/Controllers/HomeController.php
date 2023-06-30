<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Data;
use App\Models\Pengalaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
{
    $totalData = Data::where('status', 'Terverifikasi')->count();
    $pengalamanList = Pengalaman::with('user')->get();

    return view('welcome', compact('pengalamanList', 'totalData'));
    // return view('welcome', compact('pengalamanList'));
}



    public function createForm()
    {
        return view('welcome');
    }

//   public function submitForm(Request $request)
//     {
//         // Validasi input form
//         $validatedData = $request->validate([
//             'name' => 'required',
//             'email' => 'required|email',
//             'pengalamanpengunjung' => 'required',
//         ]);

//         // Cek apakah user terdaftar dan memiliki data yang terverifikasi
//         $user = User::where('name', $validatedData['name'])
//             ->where('email', $validatedData['email'])
//             ->first();

//         if (!$user || !$user->hasVerifiedData()) {
//             // Jika user tidak terdaftar atau tidak memiliki data yang terverifikasi
//             return redirect()->back()->with('error', 'User tidak terdaftar atau data belum terverifikasi.');
//         }

//         // Simpan data baru ke dalam tabel pengalaman
//         $pengalaman = new Pengalaman;
//         $pengalaman->user_id = $user->id;
//         $pengalaman->pengalamanpengunjung = $validatedData['pengalamanpengunjung'];
//         $pengalaman->save();

//         // Redirect ke halaman sukses atau melakukan tindakan lain yang sesuai
//         return redirect()->back()->with('success', 'Data berhasil disimpan.');
//     }

public function submitForm(Request $request)
{
    // Validasi input form
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'pengalamanpengunjung' => 'required',
    ]);

    // Cek apakah user terdaftar dan memiliki data yang terverifikasi
    $user = User::where('name', $validatedData['name'])
        ->where('email', $validatedData['email'])
        ->first();

    if (!$user || !$user->hasVerifiedData()) {
        // Jika user tidak terdaftar atau tidak memiliki data yang terverifikasi
        return redirect()->back()->with('error', 'User tidak terdaftar atau data belum terverifikasi.');
    }

    // Cek apakah user sudah memiliki data pengalaman sebelumnya
    if ($user->pengalaman()->exists()) {
        return redirect()->back()->with('error', 'Anda sudah mengisi form sebelumnya.');
    }

    // Simpan data baru ke dalam tabel pengalaman
    $pengalaman = new Pengalaman;
    $pengalaman->user_id = $user->id;
    $pengalaman->pengalamanpengunjung = $validatedData['pengalamanpengunjung'];
    $pengalaman->save();

    // Redirect ke halaman sukses atau melakukan tindakan lain yang sesuai
    return redirect()->back()->with('success', 'Data berhasil disimpan.');
}

public function deletePengalaman($id)
{
    $pengalaman = Pengalaman::findOrFail($id);

    // Hapus data pengalaman jika role_id adalah 1 atau 2 dan telah login
    if (Auth::check() && in_array(Auth::user()->role_id, [1, 2])) {
        $pengalaman->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    } else {
        return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menghapus data ini.');
    }
}


}
