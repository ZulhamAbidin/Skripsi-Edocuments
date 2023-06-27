<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use Illuminate\Support\Facades\Auth;

class PencakerController extends Controller
{



    public function index()
{
    $pencakerData = Data::where('status', 'Terverifikasi')->orWhere('status', 'Ditolak')->get();
    $pencakerDataButton = Data::where('status', 'BelumTerverifikasi')->get();
    $user = Auth::user();
    $status = 'Ditolak';

    return view('pencaker.index', compact('pencakerData', 'user', 'status', 'pencakerDataButton'));
}




    private function getStatus($data)
    {
        return $data->Status === 'Ditolak' ? 'Ditolak' : 'Diterima';
    }


    public function store(Request $request)
{
    $user = Auth::user();

    if ($user->data()->exists()) {
        return redirect()->route('pencaker.index')->with('error', 'Anda sudah memiliki data yang terkait.');
    }

    $request->validate([
        'NIK' => 'required|unique:data',
        'NamaLengkap' => 'required',
        'AlamatDomisili' => 'required',
        'JenisKelamin' => 'required',
        'PendidikanTerakhir' => 'required',
        'Jurusan' => 'required',
    ]);

    $pencaker = new Data();
    $pencaker->NIK = $request->input('NIK');
    $pencaker->NamaLengkap = $request->input('NamaLengkap');
    $pencaker->AlamatDomisili = $request->input('AlamatDomisili');
    $pencaker->JenisKelamin = $request->input('JenisKelamin');
    $pencaker->PendidikanTerakhir = $request->input('PendidikanTerakhir');
    $pencaker->Jurusan = $request->input('Jurusan');
    $pencaker->TanggalPengesahan = now();
    $pencaker->Status = 'BelumTerverifikasi'; // Menetapkan nilai default untuk kolom Status

    $user->data()->save($pencaker);

    return redirect()->route('pencaker.index')->with('success', 'Selanjutnya, harap hubungi admin untuk memverifikasi data Anda.');
}


    public function edit($id)
    {
        $pencakerData = Data::findOrFail($id);
        $user = Auth::user();

        if ($pencakerData->user_id !== $user->id) {
            return redirect()->route('pencaker.index')->with('error', 'Anda tidak memiliki akses ke data ini.');
        }

        return view('pencaker.edit', compact('pencakerData', 'user'));
    }

    public function update(Request $request, $id)
    {
        $pencaker = Data::findOrFail($id);
        $user = Auth::user();

        if ($pencaker->user_id !== $user->id) {
            return redirect()->route('pencaker.index')->with('error', 'Anda tidak memiliki akses ke data ini.');
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

        return redirect()->route('pencaker.index')->with('success', 'Data Anda berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pencakerData = Data::findOrFail($id);
        // Perform any additional logic for deletion, such as checking permissions or relationships
    
        $pencakerData->delete();

        return redirect()->route('pencaker.index')->with('success', 'Data berhasil dihapus.');
    }

    
}
