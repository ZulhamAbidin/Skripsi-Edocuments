

@extends('layouts.main')

@section('container')
<h1>Create Data</h1>

<form action="{{ route('data.store') }}" method="POST">
    @csrf

    <label for="NIK">NIK</label>
    <input type="text" name="NIK" id="NIK" value="{{ old('NIK') }}" class="@error('NIK') is-invalid @enderror">
    @error('NIK')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <br>

    <label for="NamaLengkap">Nama Lengkap</label>
    <input type="text" name="NamaLengkap" id="NamaLengkap" value="{{ old('NamaLengkap') }}"><br>

    <label for="AlamatDomisili">Alamat Domisili</label>
    <input type="text" name="AlamatDomisili" id="AlamatDomisili" value="{{ old('AlamatDomisili') }}"><br>

    <label for="JenisKelamin">Jenis Kelamin</label>
    <input type="text" name="JenisKelamin" id="JenisKelamin" value="{{ old('JenisKelamin') }}"><br>

    <label for="PendidikanTerakhir">Pendidikan Terakhir</label>
    <input type="text" name="PendidikanTerakhir" id="PendidikanTerakhir" value="{{ old('PendidikanTerakhir') }}"><br>

    <label for="Jurusan">Jurusan</label>
    <input type="text" name="Jurusan" id="Jurusan" value="{{ old('Jurusan') }}"><br>

    <label for="TanggalPengesahan">Tanggal Pengesahan</label>
    <input type="date" name="TanggalPengesahan" id="TanggalPengesahan" value="{{ old('TanggalPengesahan') }}"><br>

    <label for="Status">Status</label>
    <input type="text" name="Status" id="Status" value="{{ old('Status') }}"><br>

    <button type="submit">Create</button>
</form>
@endsection



