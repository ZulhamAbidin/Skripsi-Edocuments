<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VerifikasiController extends Controller
{
    public function index()
    {
        $data = Data::where('Status', 'Belum Terverifikasi')->get();
        return view('data.verifikasi.index', compact('data'));
    }

    public function verify($id)
    {
        $data = Data::findOrFail($id);
        $data->update(['Status' => 'Terverifikasi']);

        Alert::success('Sukses', 'Data berhasil diverifikasi!')->persistent(true)->autoClose(3000);

        return redirect()->route('verifikasi.index');
    }

    public function destroy(Data $data)
    {
        $data->delete();

        Alert::success('Sukses', 'Data berhasil dihapus!')->persistent(true)->autoClose(3000);

        return redirect()->route('verifikasi.index');
    }
}
