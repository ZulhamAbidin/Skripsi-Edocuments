<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use Illuminate\Support\Facades\Auth;

class PencakerController extends Controller
{
   public function index()
    {
        $user = Auth::user();
        $pencakerData = $user->data()->where('Status', 'Terverifikasi')->get();

        // $user = Auth::user();
        // $pencakerData = $user->data;

        return view('pencaker.index', compact('pencakerData'));
    }

    public function create()
    {
        return view('pencaker.create');
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
            'TanggalPengesahan' => 'required|date',
        ]);

        $pencaker = new Data();
        $pencaker->NIK = $request->input('NIK');
        $pencaker->NamaLengkap = $request->input('NamaLengkap');
        $pencaker->AlamatDomisili = $request->input('AlamatDomisili');
        $pencaker->JenisKelamin = $request->input('JenisKelamin');
        $pencaker->PendidikanTerakhir = $request->input('PendidikanTerakhir');
        $pencaker->Jurusan = $request->input('Jurusan');
        $pencaker->TanggalPengesahan = $request->input('TanggalPengesahan');
        $pencaker->Status = 'BelumTerverifikasi';

        $user->data()->save($pencaker);

        return redirect()->route('pencaker.index')->with('success', 'Selanjutnya Ke Admin Agar Data Anda Segera Diverifikasi');
    }

    public function show($id)
    {
        $pencakerData = Data::findOrFail($id);
        $user = Auth::user();

        if ($pencakerData->user_id !== $user->id) {
            return redirect()->route('pencaker.index')->with('error', 'Anda tidak memiliki akses ke data ini.');
        }

        return view('pencaker.show', compact('pencakerData'));
    }

    public function edit($id)
    {
        $pencakerData = Data::findOrFail($id);
        $user = Auth::user();

        if ($pencakerData->user_id !== $user->id) {
            return redirect()->route('pencaker.index')->with('error', 'Anda tidak memiliki akses ke data ini.');
        }

        return view('pencaker.edit', compact('pencakerData'));
    }

    public function update(Request $request, $id)
    {
        $pencaker = Data::findOrFail($id);
        $user = Auth::user();

        if ($pencaker->user_id !== $user->id) {
            return redirect()->route('pencaker.index')->with('error', 'Data Anda Berhasil Di Edit Silahkan Hubungi Admin Untuk Memverifikasi Data Anda');
        }

        $request->validate([
            'NIK' => 'required|unique:data,NIK,'.$pencaker->id,
            'NamaLengkap' => 'required',
            'AlamatDomisili' => 'required',
            'JenisKelamin' => 'required',
            'PendidikanTerakhir' => 'required',
            'Jurusan' => 'required',
            'TanggalPengesahan' => 'required|date',
        ]);

        $pencaker->NIK = $request->input('NIK');
        $pencaker->NamaLengkap = $request->input('NamaLengkap');
        $pencaker->AlamatDomisili = $request->input('AlamatDomisili');
        $pencaker->JenisKelamin = $request->input('JenisKelamin');
        $pencaker->PendidikanTerakhir = $request->input('PendidikanTerakhir');
        $pencaker->Jurusan = $request->input('Jurusan');
        $pencaker->TanggalPengesahan = $request->input('TanggalPengesahan');

        $pencaker->save();

        return redirect()->route('pencaker.index')->with('success', 'Data Anda berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pencaker = Data::findOrFail($id);
        $user = Auth::user();

        if ($pencaker->user_id !== $user->id) {
            return redirect()->route('pencaker.index')->with('error', 'Anda tidak memiliki akses ke data ini.');
        }

        $pencaker->delete();

        return redirect()->route('pencaker.index')->with('success', 'Data pencaker berhasil dihapus.');
    }
        
}

