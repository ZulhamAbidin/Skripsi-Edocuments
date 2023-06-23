@extends('layouts.verifikasi')

@section('container')

<div class="container">
    <h1>Tambah Data</h1>

    <form action="{{ route('data.verifikasi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="NIK" class="form-label">NIK</label>
            <input type="text" class="form-control" id="NIK" name="NIK" value="{{ old('NIK') }}">
            @error('NIK')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="NamaLengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="NamaLengkap" name="NamaLengkap"
                value="{{ old('NamaLengkap') }}">
            @error('NamaLengkap')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="AlamatDomisili" class="form-label">Alamat Domisili</label>
            <input type="text" class="form-control" id="AlamatDomisili" name="AlamatDomisili"
                value="{{ old('AlamatDomisili') }}">
            @error('AlamatDomisili')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="JenisKelamin" class="form-label">Jenis Kelamin</label>
            <input type="text" class="form-control" id="JenisKelamin" name="JenisKelamin"
                value="{{ old('JenisKelamin') }}">
            @error('JenisKelamin')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="PendidikanTerakhir" class="form-label">Pendidikan Terakhir</label>
            <input type="text" class="form-control" id="PendidikanTerakhir" name="PendidikanTerakhir"
                value="{{ old('PendidikanTerakhir') }}">
            @error('PendidikanTerakhir')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control" id="Jurusan" name="Jurusan" value="{{ old('Jurusan') }}">
            @error('Jurusan')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="TanggalPengesahan" class="form-label">Tanggal Pengesahan</label>
            <input type="date" class="form-control" id="TanggalPengesahan" name="TanggalPengesahan"
                value="{{ old('TanggalPengesahan') }}">
            @error('TanggalPengesahan')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection