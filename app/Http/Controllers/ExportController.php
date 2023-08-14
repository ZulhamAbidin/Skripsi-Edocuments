<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengesahan;
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
        $data = Pengesahan::select(['id', 'NamaLengkap','NoRegistrasi', 'TujuanPerusahaan', 'TempatTanggalLahir', 'StatusPerkawinan', 'AlamatDomisili', 'NoTelfon', 'JenisKelamin', 'PendidikanTerakhir', 'Jurusan', 'TanggalPengesahan', 'Total'])
            ->where('Status', 'Terverifikasi')
            ->get();

        return DataTables::of($data)->make(true);
    }

    public function cetakForm()
    {
        return view('/cetak/cetak-pekerja-form');
    }

    public function cetakPekerjaPertanggal($tglawal, $tglakhir)
    {
        $cetakPertanggal = Pengesahan::whereBetween('TanggalPengesahan', [$tglawal, $tglakhir])
            ->where('Status', 'Terverifikasi')
            ->get();
        return view('export.cetak-pekerja-pertanggal', compact('cetakPertanggal', 'tglawal', 'tglakhir'));
    }
}
