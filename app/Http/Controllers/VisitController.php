<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use App\Models\Pengesahan;

class VisitController extends Controller
{
public function index(Request $request)
{
    if ($request->ajax()) {
        $pengesahans = Pengesahan::with('user')->latest()->get();

        return DataTables::of($pengesahans)
            ->addColumn('NIK', function ($pengesahan) {
                return $pengesahan->user->NIK;
            })
            ->addColumn('NamaLengkap', function ($pengesahan) {
                return $pengesahan->NamaLengkap;
            })
            ->addColumn('NoTelfon', function ($pengesahan) {
                return $pengesahan->NoTelfon;
            })
            ->addColumn('AlamatDomisili', function ($pengesahan) {
                return $pengesahan->AlamatDomisili;
            })
            ->addColumn('TanggalPengesahan', function ($pengesahan) {
                return $pengesahan->TanggalPengesahan;
            })
            ->addColumn('action', function ($pengesahan) {
                // Tambahkan aksi yang diinginkan
                return '<a href="' . route('visit.show', $pengesahan->user->id) . '" class="view btn btn-primary btn-sm">View</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    return view('visit.index');
}


    public function show($user_id)
    {
        $user = User::findOrFail($user_id);
        $pengesahans = Pengesahan::where('user_id', $user_id)->get();

        return view('visit.show', compact('user', 'pengesahans'));
    }
}
