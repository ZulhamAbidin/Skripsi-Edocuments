@extends('layouts.main')

@section('container')
<div class="container">
    <h1>Data Pencaker</h1>
    <a href="{{ route('pencaker.create') }}" class="btn btn-primary">Tambah Data</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>Alamat Domisili</th>
                <th>Jenis Kelamin</th>
                <th>Pendidikan Terakhir</th>
                <th>Jurusan</th>
                <th>Tanggal Pengesahan</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pencakerData as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->NIK }}</td>
                <td>{{ $data->NamaLengkap }}</td>
                <td>{{ $data->AlamatDomisili }}</td>
                <td>{{ $data->JenisKelamin }}</td>
                <td>{{ $data->PendidikanTerakhir }}</td>
                <td>{{ $data->Jurusan }}</td>
                <td>{{ $data->TanggalPengesahan }}</td>
                <td>{{ $data->Status }}</td>
                <td>
                    <a href="{{ route('pencaker.show', $data->id) }}" class="btn btn-info">Detail</a>
                    <a href="{{ route('pencaker.edit', $data->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('pencaker.destroy', $data->id) }}" method="POST"
                        style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection