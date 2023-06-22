@extends('layouts.main')

@section('container')
<div class="container">

    <h1>Data Verifikasi</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>Alamat Domisili</th>
                <th>Jenis Kelamin</th>
                <th>Pendidikan Terakhir</th>
                <th>Jurusan</th>
                <th>Tanggal Pengesahan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->NIK }}</td>
                <td>{{ $item->NamaLengkap }}</td>
                <td>{{ $item->AlamatDomisili }}</td>
                <td>{{ $item->JenisKelamin }}</td>
                <td>{{ $item->PendidikanTerakhir }}</td>
                <td>{{ $item->Jurusan }}</td>
                <td>{{ $item->TanggalPengesahan }}</td>
                <td>{{ $item->Status }}</td>
                <td>
                    <form action="{{ route('verifikasi.destroy', $item) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                    @if ($item->Status === 'Belum Terverifikasi')
                    <a href="{{ route('verifikasi.verify', $item->id) }}" class="btn btn-success btn-sm">Verifikasi</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection