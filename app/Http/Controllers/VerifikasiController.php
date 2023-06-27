<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerifikasiController extends Controller
{
    public function index()
    {
        $data = Data::all();
        return view('data.verifikasi.index', compact('data'));
    }

    public function destroy(Data $item)
    {
        $item->delete();
        return redirect()
            ->route('data.verifikasi.index')
            ->with('success', 'Data berhasil dihapus');
    }

    public function reject(Request $request, $id)
    {
        $this->validate($request, [
            'alasan' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $data = Data::findOrFail($id);
            $data->Status = 'Ditolak';
            $data->alasan_penolakan = $request->alasan; // Simpan alasan penolakan ke kolom "alasan_penolakan"
            $data->save();

            // Lakukan tindakan lain yang diperlukan, seperti mengirim notifikasi, dsb.

            DB::commit();

            return redirect()
                ->route('data.verifikasi.index')
                ->with('success', 'Data berhasil ditolak');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
    
    public function show($id)
    {
        $data = Data::findOrFail($id);

        // Logika untuk menghasilkan file unduhan (misalnya, membuat PDF)

        // Contoh menggunakan Laravel PDF untuk membuat file PDF
        $pdf = PDF::loadView('pencaker.show', compact('data'));
        $pdfPath = storage_path('app/public/downloads/' . $data->id . '.pdf');
        $pdf->save($pdfPath);

        // Mengembalikan respons unduhan
        return response()->download($pdfPath);
    }

    public function verifikasi($id)
    {
        DB::beginTransaction();

        try {
            $data = Data::findOrFail($id);
            $data->Status = 'Terverifikasi';
            $data->save();

            // Lakukan tindakan lain yang diperlukan, seperti mengirim notifikasi, dsb.

            DB::commit();

            return redirect()
                ->route('data.verifikasi.index')
                ->with('success', 'Data berhasil diverifikasi');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
