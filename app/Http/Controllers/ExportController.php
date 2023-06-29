<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\PDF\CustomPDF;
use Yajra\DataTables\Facades\DataTables;

class ExportController extends Controller
{
    public function index()
    {
        return view('export.index');
    }

    public function getData()
    {
        $data = Data::select(['id', 'NIK', 'NamaLengkap', 'AlamatDomisili', 'JenisKelamin', 'PendidikanTerakhir', 'Jurusan', 'TanggalPengesahan', 'Status']);
        return DataTables::of($data)->make(true);
    } 

        public function cetakForm()
    {
        return view('/cetak/cetak-pekerja-form');
    }

    // public function cetakPekerjaPertanggal($tglawal, $tglakhir)
    // {
    //     $cetakPertanggal = Data::whereBetween('TanggalPengesahan', [$tglawal, $tglakhir])->get();
    //     return view('/export/cetak-pekerja-pertanggal', compact('cetakPertanggal'));
    // }
    public function cetakPekerjaPertanggal($tglawal, $tglakhir)
{
    $cetakPertanggal = Data::whereBetween('TanggalPengesahan', [$tglawal, $tglakhir])
        ->where('Status', 'Terverifikasi')
        ->get();
    return view('export.cetak-pekerja-pertanggal', compact('cetakPertanggal', 'tglawal', 'tglakhir'));
}


}
