@extends('layouts.main')

@section('container')
<div class="container">
    <h1>Tambah Data Pencaker</h1>
    <form action="{{ route('pencaker.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" id="nik" name="NIK" required>
        </div>
        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="NamaLengkap" required>
        </div>
        <div class="form-group">
            <label for="alamat_domisili">Alamat Domisili</label>
            <input type="text" class="form-control" id="alamat_domisili" name="AlamatDomisili" required>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <input type="text" class="form-control" id="jenis_kelamin" name="JenisKelamin" required>
        </div>
        <div class="form-group">
            <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
            <input type="text" class="form-control" id="pendidikan_terakhir" name="PendidikanTerakhir" required>
        </div>
        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <input type="text" class="form-control" id="jurusan" name="Jurusan" required>
        </div>
        <div class="form-group">
            <label for="tanggal_pengesahan">Tanggal Pengesahan</label>
            <input type="date" class="form-control" id="tanggal_pengesahan" name="TanggalPengesahan" required>
        </div>
        {{-- <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="Status">
                <option value="BelumTerverifikasi">BelumTerverifikasi</option>
            </select>
        </div> --}}
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection