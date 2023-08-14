<?php

namespace App\Http\Controllers;

use App\Models\Pengesahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\HtmlString;

class VerifikasiController extends Controller
{
    public function index()
    {
        $data = Pengesahan::where('Status', '!=', 'Terverifikasi')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('data.verifikasi.index', compact('data'));
    }

    public function destroy(Pengesahan $item)
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
            $data = Pengesahan::findOrFail($id);
            $data->Status = 'Ditolak';
            $data->AlasanPenolakan = $request->alasan; // Simpan alasan penolakan ke kolom "alasan_penolakan"
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
        $data = Pengesahan::findOrFail($id);

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
            $data = Pengesahan::findOrFail($id);
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

    public function search(Request $request)
    {
        $search = $request->input('search');

        $data = Pengesahan::where('Status', '!=', 'Terverifikasi')
            ->where(function ($query) use ($search) {
                $query
                    ->orWhere('NamaLengkap', 'LIKE', '%' . $search . '%')
                    ->orWhere('AlamatDomisili', 'LIKE', '%' . $search . '%')
                    ->orWhere('NoTelfon', 'LIKE', '%' . $search . '%')
                    ->orWhere('Agama', 'LIKE', '%' . $search . '%')
                    ->orWhere('JenisKelamin', 'LIKE', '%' . $search . '%')
                    ->orWhere('PendidikanTerakhir', 'LIKE', '%' . $search . '%')
                    ->orWhere('Jurusan', 'LIKE', '%' . $search . '%')
                    ->orWhere('TanggalPengesahan', 'LIKE', '%' . $search . '%')
                    ->orWhere('Status', 'LIKE', '%' . $search . '%');
            })
            ->get();

        $data = $data->map(function ($item) {
            $aksi = '';
            if ($item->Status === 'BelumTerverifikasi') {
                $aksi .= '<button class="btn btn-success btn-sm" onclick="confirmVerification(' . $item->id . ')">Verifikasi</button>';
                $aksi .= '<button class="btn btn-danger btn-sm" onclick="confirmRejection(' . $item->id . ')">Tolak</button>';
            }
            $aksi .= '<form action="' . route('data.verifikasi.destroy', $item) . '" method="POST" class="d-inline">';
            $aksi .= csrf_field();
            $aksi .= new HtmlString('<input type="hidden" name="_method" value="DELETE">');
            $aksi .= '<button type="submit" class="btn btn-danger btn-sm" onclick="confirmDeletion(event)">Hapus</button>';
            $aksi .= '</form>';

            $item['Aksi'] = $aksi;
            return $item;
        });
        return response()->json($data);
    }
}
