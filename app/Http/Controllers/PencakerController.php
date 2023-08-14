<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Data;
use App\Models\Pengesahan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class PencakerController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Data terverifikasi
        $pencakerData = Pengesahan::where('user_id', $user->id)
            ->whereIn('status', ['Terverifikasi'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Data looping
        $pencakerDataLooping = Pengesahan::where('user_id', $user->id)
            ->whereIn('status', ['Terverifikasi', 'Ditolak', 'BelumTerverifikasi'])
            ->orderBy('created_at', 'desc')
            ->get();

        // NIK user yang sedang login
        $NIK = $user->NIK;

        // alet waktu
        $latestTotal = Pengesahan::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->value('Total');

        // Data dengan status "BelumTerverifikasi" untuk tombol
        $pencakerDataButton = Pengesahan::where('user_id', $user->id)
            ->where('status', 'BelumTerverifikasi')
            ->get();

        $this->alert(); // Memanggil method alert() untuk meng-generate alert

        return view('pencaker.index', compact('pencakerData', 'user', 'pencakerDataButton', 'latestTotal', 'pencakerDataLooping', 'NIK'));
    }



    private function alert()
    {
        $user = Auth::user();
        $latestData = Pengesahan::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($latestData) {
            $status = $latestData->Status;
            $alasanPenolakan = $latestData->AlasanPenolakan;

            if ($status === 'Terverifikasi') {
                session()->flash('alert', [
                    'type' => 'success',
                    'message' => 'Data Anda telah terverifikasi.',
                ]);
            } elseif ($status === 'BelumTerverifikasi') {
                session()->flash('alert', [
                    'type' => 'warning',
                    'message' => 'Data Anda sedang dalam tahap verifikasi.',
                ]);
            } elseif ($status === 'Ditolak') {
                session()->flash('alert', [
                    'type' => 'danger',
                    'message' => 'Data Anda telah ditolak.',
                    'alasanPenolakan' => $alasanPenolakan,
                ]);
            }
        }
    }

    private function getStatus($data)
    {
        return $dataditolak->Status === 'Ditolak' ? 'Ditolak' : 'Diterima';
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'NamaLengkap' => 'required',
            'NoRegistrasi' => 'required',
            'TujuanPerusahaan' => 'required',
            'TempatTanggalLahir' => 'required',
            'AlamatDomisili' => 'required',
            'JenisKelamin' => 'required',
            'NoTelfon' => 'required',
            'StatusPerkawinan' => 'required',
            'PendidikanTerakhir' => 'required',
            'Jurusan' => 'required',
            'TanggalPengambilan' => 'required',
            'WaktuPengambilan' => 'required',
            'Total' => 'required',
        ]);

        $tanggalPengambilan = $request->input('TanggalPengambilan');
        $waktuPengambilan = $request->input('WaktuPengambilan');

        $existingData = Pengesahan::where('TanggalPengambilan', $tanggalPengambilan)
            ->where('WaktuPengambilan', $waktuPengambilan)
            ->count();

        if ($existingData >= 2) {
            return redirect()
                ->route('pencaker.index')
                ->with('error', 'Maaf, jumlah data untuk tanggal dan waktu pengambilan tersebut sudah mencapai batas maksimal.');
        }

        $pencaker = new Pengesahan();

        $pencaker->NamaLengkap = $request->input('NamaLengkap');
        $pencaker->NoRegistrasi = $request->input('NoRegistrasi');
        $pencaker->TujuanPerusahaan = $request->input('TujuanPerusahaan');
        $pencaker->TempatTanggalLahir = $request->input('TempatTanggalLahir');
        $pencaker->AlamatDomisili = $request->input('AlamatDomisili');
        $pencaker->JenisKelamin = $request->input('JenisKelamin');
        $pencaker->NoTelfon = $request->input('NoTelfon');
        $pencaker->StatusPerkawinan = $request->input('StatusPerkawinan');
        $pencaker->PendidikanTerakhir = $request->input('PendidikanTerakhir');
        $pencaker->Jurusan = $request->input('Jurusan');
        $pencaker->TanggalPengesahan = now();
        $pencaker->TanggalPengambilan = $request->input('TanggalPengambilan');
        $pencaker->WaktuPengambilan = $request->input('WaktuPengambilan');
        $pencaker->Total = $request->input('Total');
        $pencaker->Status = 'BelumTerverifikasi';
        $user->data()->save($pencaker);

        // Tambahkan pesan success ke dalam session
        Session::flash('success', 'Selanjutnya, harap hubungi admin untuk memverifikasi data Anda.');

        return redirect()->route('pencaker.index');
    }

    // public function showAlert()
    // {
    //     $currentDateTime = now();
    //     $tanggalSekarang = $currentDateTime->toDateString();
    //     $waktuSekarang = $currentDateTime->toTimeString();

    //     $pencakerData = Pengesahan::where('TanggalPengambilan', $tanggalSekarang)
    //         ->where('WaktuPengambilan', $waktuSekarang)
    //         ->where('status', 'Terverifikasi') // Menambahkan kondisi status="Terverifikasi"
    //         ->get();

    //     return view('pencaker.index', compact('pencakerData'));
    // }
}
