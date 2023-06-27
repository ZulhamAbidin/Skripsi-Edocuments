@extends('layouts.main')

@section('container')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- <a href="data/create" class="btn btn-primary " id="addData">Tambah Data</a> --}}
                    <div class="card-header">Data</div>
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


