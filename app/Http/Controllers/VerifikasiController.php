<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class VerifikasiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Data::query();

            if ($request->verifikasi) {
                $query->where('Status', 'Belum Terverifikasi');
            } else {
                $query->where('Status', '!=', 'Belum Terverifikasi');
            }

            $data = $query->latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('data.verifikasi.edit', ['id' => $row->id]);
                    $deleteUrl = route('data.verifikasi.destroy', ['id' => $row->id]);
                    $btnn = '<a href="' . $editUrl . '" class="btn btn-sm btn-primary block my-1 editData">Edit</a>';
                    $btnn .= '<button class="btn btn-sm btn-danger deleteData2" data-id="' . $row->id . '">Delete</button>';
                    $btnn .= '<button class="btn btn-sm btn-success verifyData" data-verifikasi-id="' . $row->id . '">Verify</button>';
                    return $btnn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('data.verifikasi.index');
    }



   public function verifikasi($id)
{
    $data = Data::findOrFail($id);
    $data->update(['Status' => 'Terverifikasi']);

    return response()->json(['message' => 'Data successfully verified']);
}


    public function create()
{
    return view('data.verifikasi.create');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'NIK' => 'required|unique:data',
        'NamaLengkap' => 'required',
        'AlamatDomisili' => 'required',
        'JenisKelamin' => 'required',
        'PendidikanTerakhir' => 'required',
        'Jurusan' => 'required',
        'TanggalPengesahan' => 'required',
        'Status' => 'required',
    ], [
        'NIK.required' => 'NIK is required.',
        'NIK.unique' => 'NIK already exists.',
        'NamaLengkap.required' => 'Nama Lengkap is required.',
        'AlamatDomisili.required' => 'Alamat Domisili is required.',
        'JenisKelamin.required' => 'Jenis Kelamin is required.',
        'PendidikanTerakhir.required' => 'Pendidikan Terakhir is required.',
        'Jurusan.required' => 'Jurusan is required.',
        'TanggalPengesahan.required' => 'Tanggal Pengesahan is required.',
        'Status.required' => 'Status is required.',
    ]);

    Data::create($validatedData);

    return redirect()->route('data.verifikasi.index')->with('success', 'Data created successfully');
}



    public function edit($id)
{
    $data = Data::findOrFail($id);
    return view('data.verifikasi.edit', compact('data'));
}



public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'NIK' => 'required|unique:data,NIK,' . $id,
        'NamaLengkap' => 'required',
        'AlamatDomisili' => 'required',
        'JenisKelamin' => 'required',
        'PendidikanTerakhir' => 'required',
        'Jurusan' => 'required',
        'TanggalPengesahan' => 'required',
        'Status' => 'required',
    ]);

    $data = Data::findOrFail($id);
    $data->update($validatedData);

    Alert::success('Success', 'Data updated successfully')->autoClose(3000);

    return redirect()->route('data.verifikasi.index');
}


    public function destroy($id)
    {
        $data = Data::findOrFail($id);
        $data->delete();

        return response()->json(['message' => 'Data deleted successfully']);
    }
}
