<!-- resources/views/dashboard/data/edit.blade.php -->
{{-- 
@extends('layouts.verifikasi')

@section('container')
<h1>Edit Data</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>NIK Telah ada
        <li>
            @endforeach
    </ul>
</div>
@endif

<form action="{{ route('data.verifikasi.update', $data) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="NIK">NIK</label>
    <input type="text" name="NIK" id="NIK" value="{{ old('NIK', $data->NIK) }}"><br>

    <label for="NamaLengkap">Nama Lengkap</label>
    <input type="text" name="NamaLengkap" id="NamaLengkap" value="{{ old('NamaLengkap', $data->NamaLengkap) }}"><br>

    <label for="AlamatDomisili">Alamat Domisili</label>
    <input type="text" name="AlamatDomisili" id="AlamatDomisili"
        value="{{ old('AlamatDomisili', $data->AlamatDomisili) }}"><br>

    <label for="JenisKelamin">Jenis Kelamin</label>
    <input type="text" name="JenisKelamin" id="JenisKelamin" value="{{ old('JenisKelamin', $data->JenisKelamin) }}"><br>

    <label for="PendidikanTerakhir">Pendidikan Terakhir</label>
    <input type="text" name="PendidikanTerakhir" id="PendidikanTerakhir"
        value="{{ old('PendidikanTerakhir', $data->PendidikanTerakhir) }}"><br>

    <label for="Jurusan">Jurusan</label>
    <input type="text" name="Jurusan" id="Jurusan" value="{{ old('Jurusan', $data->Jurusan) }}"><br>

    <label for="TanggalPengesahan">Tanggal Pengesahan</label>
    <input type="text" name="TanggalPengesahan" id="TanggalPengesahan"
        value="{{ old('TanggalPengesahan', $data->TanggalPengesahan) }}"><br>

    <label for="Status">Status</label>
    <input type="text" name="Status" id="Status" value="{{ old('Status', $data->Status) }}"><br>

    <button type="submit">Update</button>
</form>

@endsection --}}