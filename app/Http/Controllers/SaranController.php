<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Saran;
use App\Models\Pengesahan;
use Illuminate\Http\Request;

class SaranController extends Controller
{
    public function index()
    {
        $saran = Saran::all();

        return view('welcome', ['saran' => $saran]);
    }

    public function create()
    {
        return view('welcome.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'saran' => 'required',
        ]);

        // Cek apakah pengguna dengan email dan nama yang diberikan ada di dalam tabel "users"
        $user = User::where('email', $validatedData['email'])
            ->where('name', $validatedData['nama'])
            ->first();

        if ($user) {
            // Cek apakah pengguna memiliki pengesahan terverifikasi
            $pengesahan = Pengesahan::where('user_id', $user->id)
                ->where('status', 'Terverifikasi')
                ->first();

            if ($pengesahan) {
                // Periksa apakah pengguna sudah memiliki data saran sebelumnya
                $existingSaran = Saran::where('email', $validatedData['email'])
                    ->where('nama', $validatedData['nama'])
                    ->first();

                if ($existingSaran) {
                    return redirect()
                        ->back()
                        ->with('error', 'Anda sudah mengirimkan saran sebelumnya.');
                }

                // Buat objek Saran baru
                $saran = new Saran();
                $saran->nama = $validatedData['nama'];
                $saran->email = $validatedData['email'];
                $saran->saran = $validatedData['saran'];
                $saran->save();

                return redirect()
                    ->back()
                    ->with('success', 'Kotak saran berhasil dikirim!');
            }
        }

        return redirect()
            ->back()
            ->with('error', 'Email dan nama yang Anda berikan tidak valid atau belum terverifikasi.');
    }

    public function destroy($id)
    {
        // Cek role_id pengguna yang sedang login
        $role_id = auth()->user()->role_id;

        // Hanya izinkan penghapusan jika role_id adalah 1 atau 2
        if ($role_id == 1 || $role_id == 2) {
            $saran = Saran::findOrFail($id);
            $saran->delete();
            return redirect()
                ->back()
                ->with('success', 'Data saran berhasil dihapus!');
        }

        return redirect()
            ->back()
            ->with('error', 'Anda tidak memiliki izin untuk menghapus data saran.');
    }
}
