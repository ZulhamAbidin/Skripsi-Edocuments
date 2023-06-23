@extends('layouts.main')

@section('container')
<div class="container">
    <h1>Edit Data Pencaker</h1>
    <form action="{{ route('pencaker.update', $pencakerData->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" id="nik" name="NIK" value="{{ $pencakerData->NIK }}" required>
        </div>
        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="NamaLengkap"
                value="{{ $pencakerData->NamaLengkap }}" required>
        </div>
        <div class="form-group">
            <label for="alamat_domisili">Alamat Domisili</label>
            <input type="text" class="form-control" id="alamat_domisili" name="AlamatDomisili"
                value="{{ $pencakerData->AlamatDomisili }}" required>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <input type="text" class="form-control" id="jenis_kelamin" name="JenisKelamin"
                value="{{ $pencakerData->JenisKelamin }}" required>
        </div>
        <div class="form-group">
            <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
            <input type="text" class="form-control" id="pendidikan_terakhir" name="PendidikanTerakhir"
                value="{{ $pencakerData->PendidikanTerakhir }}" required>
        </div>
        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <input type="text" class="form-control" id="jurusan" name="Jurusan" value="{{ $pencakerData->Jurusan }}"
                required>
        </div>
        <div class="form-group">
            <label for="tanggal_pengesahan">Tanggal Pengesahan</label>
            <input type="date" class="form-control" id="tanggal_pengesahan" name="TanggalPengesahan"
                value="{{ $pencakerData->TanggalPengesahan }}" required>
        </div>
        {{-- <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="Status">
                <option value="BelumTerverifikasi" {{ $pencakerData->Status == 'BelumTerverifikasi' ? 'selected' : ''
                    }}>Belum Terverifikasi</option>
                <option value="Terverifikasi" {{ $pencakerData->Status == 'Terverifikasi' ? 'selected' : ''
                    }}>Terverifikasi</option>
            </select>
        </div> --}}
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection