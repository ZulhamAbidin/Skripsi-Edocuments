
@extends('layouts.main')

@section('container')


<div class="main-container container-fluid">

    <div class="page-header">
        <h1 class="page-title">History Data Pengesahan </h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Data</a></li>
                <li class="breadcrumb-item active" aria-current="page">Visit</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">

                <div class="card-header">
                    <h4 class="card-title">Data User</h4>
                </div>

               <div class="card-body">
                
                    <form class="form-horizontal">

                        <div class=" row mb-4">
                            <label class="col-md-3 form-label">Username</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" readonly="" value="{{ $user->name }}">
                            </div>
                        </div>
                        
                        <div class=" row mb-4">
                            <label class="col-md-3 form-label">Email</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" disabled="" value="{{ $user->email }}">
                            </div>
                        </div>
                        
                        
                        <div class=" row mb-4">
                            <label class="col-md-3 form-label">NIK</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" readonly="" value="{{ $user->NIK }}">
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        @foreach ($pengesahans as $pengesahan)

            <div class="card">

                <div class="card-header">
                    <h4 class="card-title">History Pengesahan pada tanggal {{ \Carbon\Carbon::parse($pengesahan->TanggalPengesahan)->formatLocalized('%d %B %Y') }}</h4>
                </div>

                <div class="card-body">
                    
                        <form class="form-horizontal">
                            
                            <div class=" row mb-4">
                                <label class="col-md-3 form-label">Nama Lengkap</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" readonly="" value="{{ $pengesahan->NamaLengkap }}">
                                </div>
                            </div>

                            <div class=" row mb-4">
                                <label class="col-md-3 form-label">Alamat Domisili</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" disabled="" value="{{ $pengesahan->AlamatDomisili }}">
                                </div>
                            </div>

                            <div class=" row mb-4">
                                <label class="col-md-3 form-label">Jenis Kelamin</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" readonly="" value="{{ $pengesahan->JenisKelamin }}">
                                </div>
                            </div>
                            
                            <div class=" row mb-4">
                                <label class="col-md-3 form-label">No Telfon</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" disabled="" value="{{ $pengesahan->NoTelfon }}">
                                </div>
                            </div>

                            <div class=" row mb-4">
                                <label class="col-md-3 form-label">Agama</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" readonly="" value="{{ $pengesahan->Agama }}">
                                </div>
                            </div>
                            
                            <div class=" row mb-4">
                                <label class="col-md-3 form-label">Pendidikan Terakhir</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" disabled="" value="{{ $pengesahan->PendidikanTerakhir }}">
                                </div>
                            </div>

                            <div class=" row mb-4">
                                <label class="col-md-3 form-label">Jurusan</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" readonly="" value="{{ $pengesahan->Jurusan }}">
                                </div>
                            </div>
                            
                            <div class=" row mb-4">
                                <label class="col-md-3 form-label">Tanggal Pengesahan</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" disabled="" value="{{ $pengesahan->TanggalPengesahan }}">
                                </div>
                            </div>

                            <div class=" row mb-4">
                                <label class="col-md-3 form-label">Tanggal Pengambilan</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" readonly="" value="{{ $pengesahan->TanggalPengambilan }}">
                                </div>
                            </div>
                            
                            <div class=" row mb-4">
                                <label class="col-md-3 form-label">Waktu Pengambilan</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" disabled="" value="{{ $pengesahan->WaktuPengambilan }}">
                                </div>
                            </div>

                            <div class=" row mb-4">
                                <label class="col-md-3 form-label">Lembar Yang Di SAH kan</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" readonly="" value="{{ $pengesahan->Total }}">
                                </div>
                            </div>
                            
                            <div class=" row mb-4">
                                <label class="col-md-3 form-label">Status</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" disabled="" value="{{ $pengesahan->Status }}">
                                </div>
                            </div>

                            @if ($pengesahan->AlasanPenolakan)
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Alasan Penolakan</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" readonly="" value="{{ $pengesahan->AlasanPenolakan }}">
                                    </div>
                                </div>
                            @endif
                            
                        </form>

                </div>
            </div>

        @endforeach

        </div>
    </div>
</div>


@endsection