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

}
