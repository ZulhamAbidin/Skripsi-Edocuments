<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PencakerController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $pencakerData = Data::where('user_id', $user->id)
            ->whereIn('status', ['Terverifikasi', 'Ditolak'])
            ->get();

        $pencakerDataButton = Data::where('user_id', $user->id)
            ->where('status', 'BelumTerverifikasi')
            ->get();

        $status = 'Ditolak';

        // Mendapatkan nilai waktu pengambilan dari database
        $pencaker = Data::find(1); // Ubah sesuai dengan query yang sesuai untuk mengambil data yang diinginkan

        // Mengirimkan nilai waktu pengambilan dan data lainnya ke view
        return view('pencaker.index', compact('pencakerData', 'user', 'status', 'pencakerDataButton', 'pencaker'));
    }

    private function getStatus($data)
    {
        return $data->Status === 'Ditolak' ? 'Ditolak' : 'Diterima';
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'NIK' => 'required|unique:data',
            'NamaLengkap' => 'required',
            'AlamatDomisili' => 'required',
            'JenisKelamin' => 'required',
            'PendidikanTerakhir' => 'required',
            'Jurusan' => 'required',
            'TanggalPengambilan' => 'required',
            'WaktuPengambilan' => 'required',
            'otal' => 'required',
        ]);

        $existingData = Data::where('TanggalPengambilan', $request->input('tanggal_pengambilan'))
            ->where('WaktuPengambilan', $request->input('waktu_pengambilan'))
            ->count();

        if ($existingData >= 2) {
            return redirect()
                ->route('pencaker.index')
                ->with('error', 'Maaf, jumlah data untuk tanggal dan waktu pengambilan tersebut sudah mencapai batas maksimal.');
        }

        $pencaker = new Data();
        $pencaker->NIK = $request->input('NIK');
        $pencaker->NamaLengkap = $request->input('NamaLengkap');
        $pencaker->AlamatDomisili = $request->input('AlamatDomisili');
        $pencaker->JenisKelamin = $request->input('JenisKelamin');
        $pencaker->PendidikanTerakhir = $request->input('PendidikanTerakhir');
        $pencaker->Jurusan = $request->input('Jurusan');
        $pencaker->TanggalPengesahan = now();
        $pencaker->TanggalPengambilan = $request->input('TanggalPengambilan');
        $pencaker->WaktuPengambilan = $request->input('WaktuPengambilan');
        $pencaker->Total = $request->input('Total');
        $pencaker->Status = 'BelumTerverifikasi';

        $user->data()->save($pencaker);

        return redirect()
            ->route('pencaker.index')
            ->with('success', 'Selanjutnya, harap hubungi admin untuk memverifikasi data Anda.');
    }

    /* public function edit($id)
    {
        $pencakerData = Data::findOrFail($id);
        $user = Auth::user();

        if ($pencakerData->user_id !== $user->id) {
            return redirect()
                ->route('pencaker.index')
                ->with('error', 'Anda tidak memiliki akses ke data ini.');
        }

        return view('pencaker.edit', compact('pencakerData', 'user'));
    } */

    /* public function update(Request $request, $id)
    {
        $pencaker = Data::findOrFail($id);
        $user = Auth::user();

        if ($pencaker->user_id !== $user->id) {
            return redirect()
                ->route('pencaker.index')
                ->with('error', 'Anda tidak memiliki akses ke data ini.');
        }

        $request->validate([
            'NIK' => 'required|unique:data,NIK,' . $pencaker->id,
            'NamaLengkap' => 'required',
            'AlamatDomisili' => 'required',
            'JenisKelamin' => 'required',
            'PendidikanTerakhir' => 'required',
            'Jurusan' => 'required',
            'TanggalPengesahan' => 'required|date',
            'Status' => 'required',
        ]);

        $pencaker->NIK = $request->input('NIK');
        $pencaker->NamaLengkap = $request->input('NamaLengkap');
        $pencaker->AlamatDomisili = $request->input('AlamatDomisili');
        $pencaker->JenisKelamin = $request->input('JenisKelamin');
        $pencaker->PendidikanTerakhir = $request->input('PendidikanTerakhir');
        $pencaker->Jurusan = $request->input('Jurusan');
        $pencaker->TanggalPengesahan = $request->input('TanggalPengesahan');
        $pencaker->Status = $request->input('Status');

        $pencaker->save();

        return redirect()
            ->route('pencaker.index')
            ->with('success', 'Data Anda berhasil diperbarui.');
    } */

    // public function destroy($id)
    // {
    //     $pencakerData = Data::findOrFail($id);
    //     $pencakerData->delete();

    //     return redirect()
    //         ->route('pencaker.index')
    //         ->with('success', 'Data berhasil dihapus.');
    // }

    public function showAlert()
    {
        $currentDateTime = now();
        $tanggalSekarang = $currentDateTime->toDateString();
        $waktuSekarang = $currentDateTime->toTimeString();

        $pencakerData = Data::where('TanggalPengambilan', $tanggalSekarang)
            ->where('WaktuPengambilan', $waktuSekarang)
            ->where('status', 'Terverifikasi') // Menambahkan kondisi status="Terverifikasi"
            ->get();

        return view('pencaker.index', compact('pencakerData'));
    }
}
