<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class DataController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Data::latest()->get();
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

    return redirect()->route('data.index')->with('success', 'Data created successfully');
}



    public function edit($id)
{
    $data = Data::findOrFail($id);
    return view('data.edit', compact('data'));
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

    return redirect()->route('data.index');
}



    public function destroy($id)
    {
        $data = Data::findOrFail($id);
        $data->delete();

        return response()->json(['message' => 'Data deleted successfully']);
    }
}
