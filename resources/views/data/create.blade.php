

@extends('layouts.main')

@section('container')
<div class="main-container container-fluid">

    <div class="page-header">
        <h1 class="page-title">Tambah Data Pengesahan</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Data</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Data</h4>
                </div>


                <div class="card-body">

                    <form action="{{ route('data.store') }}" method="POST" class="form-horizontal">
                        @csrf

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input type="text" required name="NamaLengkap" id="NamaLengkap" value="{{ old('NamaLengkap') }}" class=" form-control @error('NamaLengkap') is-invalid @enderror">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Alamat Domisili</label>
                            <div class="col-md-9">
                                <select name="AlamatDomisili" class="form-control form-select"
                                    data-bs-placeholder="Select Alamat Domisili">
                                    <option value="Kota Makassar">Kota Makassar</option>
                                    <option value="Kota Palopo">Kota Palopo</option>
                                    <option value="Kota Parepare">Kota Parepare </option>
                                    <option value="Kabupaten Bantaeng">Kabupaten Bantaeng</option>
                                    <option value="Kabupaten Barru">Kabupaten Barru</option>
                                    <option value="Kabupaten Bone">Kabupaten Bone </option>
                                    <option value="Kabupaten Bulukumba">Kabupaten Bulukumba</option>
                                    <option value="Kabupaten Enrekang">Kabupaten Enrekang </option>
                                    <option value="Kabupaten Gowa">Kabupaten Gowa </option>
                                    <option value="Kabupaten Jeneponto">Kabupaten Jeneponto </option>
                                    <option value="Kabupaten Kepulauan Selayar">Kabupaten Kepulauan Selayar</option>
                                    <option value="Kabupaten Luwu">Kabupaten Luwu</option>
                                    <option value="Kabupaten Luwu Timur">Kabupaten Luwu Timur </option>
                                    <option value="Kabupaten Luwu Utara">Kabupaten Luwu Utara</option>
                                    <option value="Kabupaten Maros">Kabupaten Maros </option>
                                    <option value="Kabupaten Pangkajene dan Kepulauan">Kabupaten Pangkajene dan  Kepulauan</option>
                                    <option value="Kabupaten Pinrang">Kabupaten Pinrang </option>
                                    <option value="Kabupaten Sidenreng Rappang">Kabupaten Pinrang Rappang</option>
                                    <option value="Kabupaten Sinjai">Kabupaten Sinjai</option>
                                    <option value="Kabupaten Soppeng">Kabupaten Soppeng </option>
                                    <option value="Kabupaten Takalar">Kabupaten Takalar </option>
                                    <option value="Kabupaten Tana Toraja">Kabupaten Tana Toraja</option>
                                    <option value="Kabupaten Toraja Utara">Kabupaten Toraja Utara </option>
                                    <option value="Kabupaten Wajo">Kabupaten Wajo </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">NoTelfon</label>
                            <div class="col-md-9">
                                <input type="number" name="NoTelfon" id="NoTelfon" required value="{{ old('NoTelfon') }}"
                                    class="form-control @error('NoTelfon') is-invalid @enderror">
                            </div>
                            @error('NoTelfon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Agama</label>
                            <div class="col-md-9">
                                <input type="text" name="Agama" id="Agama" required value="{{ old('Agama') }}"
                                    class="form-control @error('Agama') is-invalid @enderror">
                            </div>
                            @error('Agama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Jenis Kelamin</label>
                            <div class="col-md-9">
                                <select name="JenisKelamin" class="form-control form-select" id="JenisKelamin" required
                                    data-bs-placeholder="JenisKelamin" value="{{ old('Jurusan') }}">
                                    <option value="PRIA">Pria</option>
                                    <option value="WANITA">Wanita</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Status</label>
                            <div class="col-md-9">
                                <select name="Status" class="form-control form-select" id="Status"required
                                    data-bs-placeholder="Status">
                                    <option value="Terverifikasi">Terverifikasi</option>
                                    <option value="Ditolak">Ditolak</option>
                                    <option value="BelumTerverifikasi">BelumTerverifikasi</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Pendidikan Terakhir</label>
                            <div class="col-md-9">
                                <select name="PendidikanTerakhir" class="form-control form-select" required
                                    id="PendidikanTerakhir" data-bs-placeholder="PendidikanTerakhir">
                                    <option value="SD / MI">SD</option>
                                    <option value="SMP / MTS">SMP</option>
                                    <option value="SMA / SMK">SMA</option>
                                    <option value="Diploma 3">Dimploma 3</option>
                                    <option value="Diploma">Diploma 4</option>
                                    <option value="Strata 1">Strata 1</option>
                                    <option value="Strata 2">Strata 2</option>
                                    <option value="Strata 3">Strata 3</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Jurusan</label>
                            <div class="col-md-9">
                                <input type="text" name="Jurusan" id="Jurusan" value="{{ old('Jurusan')}}" class=" form-control" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">TanggalPengesahan</label>
                            <div class="col-md-9">
                                <input type="date" name="TanggalPengesahan" id="dp1687894207649" placeholder="MM/DD/YYYY" class=" form-control fc-datepicker hasDatepicker" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Tanggal Pengambilan</label>
                            <div class="col-md-9">
                                <input type="date" name="TanggalPengambilan" id="dp1687894207649" placeholder="MM/DD/YYYY" class=" form-control fc-datepicker hasDatepicker" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Waktu Pengambilan</label>
                            <div class="col-md-9">
                                <input type="time" name="WaktuPengambilan" id="dp1687894207649" placeholder="MM/DD/YYYY" class=" form-control fc-datepicker hasDatepicker" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Jumlah Yang Ingin DI SAH kan</label>
                            <div class="col-md-9">
                                <select name="Total" class="form-control form-select" id="Lembar" required data-bs-placeholder="Lembar">
                                    <option value="1">1 Lembar</option>
                                    <option value="2">2 Lembar</option>
                                    <option value="3">3 Lembar</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4 mt-2">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mb-1">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@include('layouts.script')

@endsection