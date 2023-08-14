


@extends('layouts.main')

@section('container')

<style>
    .capitalize-text {
        text-transform: capitalize !important;
    }
</style>

<div class="main-container container-fluid">

    <div class="page-header">
        <h1 class="page-title capitalize-text">Edit Data {{ old('NamaLengkap', $data->NamaLengkap) }}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Data</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Data</h4>
                </div>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>NIK Telah ada <li>
                         @endforeach
                    </ul>
                </div>
                @endif

                <div class="card-body">

                    <form action="{{ route('data.update', $data) }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('PUT')

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">No Registrasi</label>
                            <div class="col-md-9">
                                <input type="text" name="NoRegistrasi" id="NoRegistrasi" value="{{ old('NoRegistrasi', $data->NoRegistrasi) }}"
                                    class=" form-control">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Tujuan Perusahaan</label>
                            <div class="col-md-9">
                                <input type="text" name="TujuanPerusahaan" id="TujuanPerusahaan" value="{{ old('TujuanPerusahaan', $data->TujuanPerusahaan) }}"
                                    class=" form-control">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input type="text" name="NamaLengkap" id="NamaLengkap" value="{{ old('NamaLengkap', $data->NamaLengkap) }}"
                                    class=" form-control">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Tempat Tanggal Lahir</label>
                            <div class="col-md-9">
                                <input type="text" name="TempatTanggalLahir" id="TempatTanggalLahir" value="{{ old('TempatTanggalLahir', $data->TempatTanggalLahir) }}" class=" form-control">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Alamat Domisili</label>
                            <div class="col-md-9">
                                <select name="AlamatDomisili" class="form-control form-select"
                                    data-bs-placeholder="Select Alamat Domisili">
                                    <option value="{{ old('AlamatDomisili', $data->AlamatDomisili) }}" selected> {{ old('AlamatDomisili', $data->AlamatDomisili) }}</option>
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
                                    <option value="Kabupaten Pangkajene dan Kepulauan">Kabupaten Pangkajene dan Kepulauan</option>
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
                            <label class="col-md-3 form-label">Jenis Kelamin</label>
                            <div class="col-md-9">
                                <select name="JenisKelamin" class="form-control form-select" id="JenisKelamin" data-bs-placeholder="JenisKelamin">
                                    <option value="{{ old('JenisKelamin', $data->JenisKelamin) }}" selected>{{ old('JenisKelamin', $data->JenisKelamin) }}</option>
                                    <option value="PRIA">Pria</option>
                                    <option value="WANITA">Wanita</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Status Perkawinan</label>
                            <div class="col-md-9">
                                <select name="StatusPerkawinan" class="form-control form-select" id="StatusPerkawinan"
                                    data-bs-placeholder="StatusPerkawinan">
                                    <option value="{{ old('StatusPerkawinan', $data->StatusPerkawinan) }}" selected>{{ old('StatusPerkawinan',
                                        $data->StatusPerkawinan) }}</option>
                                        <option value="Belum Kawin">Belum Kawin</option>
                                        <option value="Kawin">Kawin</option>
                                        <option value="Cerai Hidup">Cerai Hidup</option>
                                        <option value="Cerai Mati">Cerai Mati</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">No Ponsel</label>
                            <div class="col-md-9">
                                <input type="number" name="NoTelfon" id="NoTelfon" value="{{ old('NoTelfon', $data->NoTelfon) }}" class="  form-control">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Status</label>
                            <div class="col-md-9">
                                <select name="Status" class="form-control form-select" id="Status"
                                    data-bs-placeholder="Status">
                                    <option value="{{ old('Status', $data->Status) }}" selected>{{ old('Status', $data->Status) }}</option>
                                    <option value="Terverifikasi">Terverifikasi</option>
                                    <option value="Ditolak">Ditolak</option>
                                    <option value="BelumTerverifikasi">BelumTerverifikasi</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Pendidikan Terakhir</label>
                            <div class="col-md-9">
                                <select name="PendidikanTerakhir" class="form-control form-select" id="PendidikanTerakhir"
                                    data-bs-placeholder="PendidikanTerakhir">
                                    <option value="{{ old('PendidikanTerakhir', $data->PendidikanTerakhir) }}">{{ old('PendidikanTerakhir', $data->PendidikanTerakhir) }}</option>
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
                                <input type="text" name="Jurusan" id="Jurusan" value="{{ old('Jurusan', $data->Jurusan) }}"
                                    class=" form-control">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">TanggalPengesahan</label>
                            <div class="col-md-9">
                                <input type="date" name="TanggalPengesahan" id="dp1687894207649" placeholder="MM/DD/YYYY" value="{{ old('TanggalPengesahan', $data->TanggalPengesahan) }}"
                                    class=" form-control fc-datepicker hasDatepicker" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">TanggalPengambilan</label>
                            <div class="col-md-9">
                                <input type="date" name="TanggalPengambilan" id="dp1687894207649" placeholder="MM/DD/YYYY"
                                    value="{{ old('TanggalPengambilan', $data->TanggalPengambilan) }}"
                                    class=" form-control fc-datepicker hasDatepicker" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">WaktuPengambilan</label>
                            <div class="col-md-9">
                                <input type="time" name="WaktuPengambilan" id="dp1687894207649" placeholder="MM/DD/YYYY"
                                    value="{{ old('WaktuPengambilan', $data->WaktuPengambilan) }}"
                                    class=" form-control fc-datepicker hasDatepicker" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Jumlah Yang Ingin Di SAH kan</label>
                            <div class="col-md-9">
                                <select name="Total" class="form-control form-select" id="Total" data-bs-placeholder="Total">
                                    <option value="{{ old('Total', $data->Total) }}" selected>{{ old('Total', $data->Total) }} Lembar</option>
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