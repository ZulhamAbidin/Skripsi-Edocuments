@extends('layouts.main')

@section('container')
<div class="container">
    <h1>Detail Data Pencaker</h1>
    <table class="table mt-3">
        {{-- <tr>
            <th>ID</th>
            <td>{{ $pencakerData->id }}</td>
        </tr> --}}
        <tr>
            <th>NIK</th>
            <td>{{ $pencakerData->NIK }}</td>
        </tr>
        <tr>
            <th>Nama Lengkap</th>
            <td>{{ $pencakerData->NamaLengkap }}</td>
        </tr>
        <tr>
            <th>Alamat Domisili</th>
            <td>{{ $pencakerData->AlamatDomisili }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $pencakerData->JenisKelamin }}</td>
        </tr>
        <tr>
            <th>Pendidikan Terakhir</th>
            <td>{{ $pencakerData->PendidikanTerakhir }}</td>
        </tr>
        <tr>
            <th>Jurusan</th>
            <td>{{ $pencakerData->Jurusan }}</td>
        </tr>
        <tr>
            <th>Tanggal Pengesahan</th>
            <td>{{ $pencakerData->TanggalPengesahan }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $pencakerData->Status }}</td>
        </tr>
    </table>
</div>
@endsection