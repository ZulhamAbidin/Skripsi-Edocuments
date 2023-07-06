<?php

namespace App\Http\Controllers;

use App\Models\Pengesahan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use DataTables;

use RealRashid\SweetAlert\Facades\Alert;

class DataController extends Controller
{
    public function index(Request $request)
{
    if ($request->ajax()) {
        $query = Pengesahan::query();

        if ($request->verifikasi) {
            $query->where('Status', 'Terverifikasi');
        }

        $data = $query->latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $editUrl = route('data.edit', ['id' => $row->id]);
                $deleteUrl = route('data.destroy', ['id' => $row->id]);
                $btn = '<a href="' . $editUrl . '" class="btn btn-sm btn-primary block my-1 editData">Edit</a>';
                $btn .= '<button class="btn btn-sm btn-danger deleteData" data-id="' . $row->id . '">Delete</button>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    return view('data.index');
}

    public function create()
{
    return view('data.create');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'NamaLengkap' => 'required',
        'AlamatDomisili' => 'required',
        'NoTelfon' => 'required',
        'Agama' => 'required',
        'JenisKelamin' => 'required',
        'PendidikanTerakhir' => 'required',
        'Jurusan' => 'required',
        'TanggalPengesahan' => 'required',
        'TanggalPengambilan' => 'required',
        'WaktuPengambilan' => 'required',
        'Total' => 'required',
        'Status' => 'required',
    ], [
        'NamaLengkap.required' => 'Nama Lengkap Wajib di Isi.',
        'AlamatDomisili.required' => 'Alamat Domisili Wajib di Isi.',
        'NoTelfon.required' => 'Wajib Di Isi',
        'Agama.required' => 'Wajib Di Isi',
        'JenisKelamin.required' => 'Jenis Kelamin Wajib di Isi.',
        'PendidikanTerakhir.required' => 'Pendidikan Terakhir Wajib di Isi.',
        'Jurusan.required' => 'Jurusan Wajib di Isi.',
        'TanggalPengesahan.required' => 'Tanggal Pengesahan Wajib di Isi.',
        'Total.required' => 'Wajib di Isi.',
        'Status.required' => 'Status Wajib di Isi.',
    ]);

    $validatedData['User_id'] = Auth::id();

    Pengesahan::create($validatedData);

    return redirect()->route('data.index')->with('success', 'Data Berhasil Ditambahkan');
}


    public function edit($id)
{
    $data = Pengesahan::findOrFail($id);
    return view('data.edit', compact('data'));
}


public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'NamaLengkap' => 'required',
        'AlamatDomisili' => 'required',
        'NoTelfon' => 'required',
        'Agama' => 'required',
        'JenisKelamin' => 'required',
        'PendidikanTerakhir' => 'required',
        'Jurusan' => 'required',
        'TanggalPengesahan' => 'required',
        'TanggalPengambilan' => 'required',
        'WaktuPengambilan' => 'required',
        'Total' => 'required',
        'Status' => 'required',
    ]);

    $data = Pengesahan::findOrFail($id);
    $data->update($validatedData);

    // Alert::success('Success', 'Data updated successfully')->autoClose(3000);

    return redirect()->route('data.index')->with('success', 'Data Berhasil Diperbaharui');
    // return redirect()->route('data.index');
}

    public function destroy($id)
    {
        $data = Pengesahan::findOrFail($id);
        $data->delete();

        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
}
