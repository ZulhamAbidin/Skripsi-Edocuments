{{-- @extends('layouts.main')

@section('container')
    <div class="container">
        <h1>Data Export</h1>
        <div class="card">
            <div class="card-body">
                <table id="dataTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat Domisili</th>
                            <th>Jenis Kelamin</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Jurusan</th>
                            <th>Tanggal Pengesahan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

 --}}


@extends('layouts.main')

@section('container')


<style>
    .buttons-excel,
    .buttons-pdf {
        float: left;
        margin-right: 10px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- <a href="data/create" class="btn btn-primary " id="addData">Tambah Data</a> --}}
                <div class="card-header">Data</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered data-table" id="dataTable">
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

<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

@push('scripts')
<script>

    $(function() {
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('export.data') }}",
            columns: [
                { data: 'NIK', name: 'NIK' },
                { data: 'NamaLengkap', name: 'NamaLengkap' },
                { data: 'AlamatDomisili', name: 'AlamatDomisili' },
                { data: 'JenisKelamin', name: 'JenisKelamin' },
                { data: 'PendidikanTerakhir', name: 'PendidikanTerakhir' },
                { data: 'Jurusan', name: 'Jurusan' },
                { data: 'TanggalPengesahan', name: 'TanggalPengesahan' },
                { data: 'Status', name: 'Status' }
            ],
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excel',
                    text: 'Export to Excel'
                },
                {
                    extend: 'pdf',
                    text: 'Export to PDF',
                    customize: function(doc) {
                        // Tambahkan header dari file header.blade.php
                        var headerView = '{!! addslashes(view('export.header')) !!}';
                        var headerHtml = $('<div>').html(headerView).text();
                        doc.content.splice(0, 0, {
                            margin: [0, 0, 0, 10],
                            alignment: 'center',
                            layout: 'noBorders',
                            table: {
                                widths: ['*'],
                                body: [
                                    [{
                                        stack: [
                                            {
                                                text: headerHtml,
                                                alignment: 'center',
                                                margin: [0, 0, 0, 5]
                                            }
                                        ]
                                    }]
                                ]
                            }
                        });
                    }
                }
            ]
        });
    });
</script>
@endpush

@endsection