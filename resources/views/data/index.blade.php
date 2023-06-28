@extends('layouts.main')

@section('container')

<style>.dataTables_filter 
    {
        display: none;
    }
</style>

<div class="main-container container-fluid">

    <div class="page-header">
        <h1 class="page-title">List Data Pengesahan</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Data</a></li>
                <li class="breadcrumb-item active" aria-current="page">List</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">

                <div class="card-body pb-4">
                    <div class="input-group mb-2">
                        <input type="seach" class="form-control form-control" id="search-input" placeholder="Searching.....">
                        <span class="input-group-text btn btn-primary" id="search-button">Search</span>
                    </div>
                </div>
    
            </div>
    
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Data Pengesahan</h4>
                </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.script')

@endsection


