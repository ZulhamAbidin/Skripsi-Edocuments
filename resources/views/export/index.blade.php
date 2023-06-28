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
    @media screen and (min-width: 768px) {
        .dt-buttons {
            position: absolute !important;
            left: 0 !important;
            top: 0 !important;
        }

        .buttons-excel,
        .buttons-pdf {
            margin-right: 10px !important;
            margin-top: 20px !important;
            border-radius: 10px !important;
        }

        .buttons-excel {
            margin-left: 25px !important;
        }
    }

    @media screen and (max-width: 768px) {
        .dt-buttons {
            position: relative !important;
            left: auto !important;
            top: auto !important;
            display: flex;
            justify-content: center;
        }

        .buttons-excel,
        .buttons-pdf {
            margin-right: 10px !important;
            margin-top: 20px !important;
            border-radius: 10px !important;
            display: block !important;
        }

        .buttons-excel {
            margin-left: 0 !important;
        }
    }
</style>

<div class="main-container container-fluid">

    <div class="page-header">
        <h1 class="page-title">Export Data Pengesahan</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Export</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="col-md-12">
                <div class="card">
                    {{-- <a href="data/create" class="btn btn-primary " id="addData">Tambah Data</a> --}}
                    <div class="card-header">Export Data</div>

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
</div>





    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

    @push('scripts')
    <script>
        $(function () {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('export.data') }}",
                columns: [{
                        data: 'NIK',
                        name: 'NIK'
                    },
                    {
                        data: 'NamaLengkap',
                        name: 'NamaLengkap'
                    },
                    {
                        data: 'AlamatDomisili',
                        name: 'AlamatDomisili'
                    },
                    {
                        data: 'JenisKelamin',
                        name: 'JenisKelamin'
                    },
                    {
                        data: 'PendidikanTerakhir',
                        name: 'PendidikanTerakhir'
                    },
                    {
                        data: 'Jurusan',
                        name: 'Jurusan'
                    },
                    {
                        data: 'TanggalPengesahan',
                        name: 'TanggalPengesahan'
                    },
                    {
                        data: 'Status',
                        name: 'Status'
                    }
                ],
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excel',
                        text: 'Export to Excel'
                    },
                    {
                        extend: 'pdf',
                        text: 'Export to PDF',
                        customize: function (doc) {
                            // Tambahkan header dari file header.blade.php
                            var headerView = '{!! addslashes(view('
                            export.header ')) !!}';
                            var headerHtml = $('<div>').html(headerView).text();
                            doc.content.splice(0, 0, {
                                margin: [0, 0, 0, 10],
                                alignment: 'center',
                                layout: 'noBorders',
                                table: {
                                    widths: ['*'],
                                    body: [
                                        [{
                                            stack: [{
                                                text: headerHtml,
                                                alignment: 'center',
                                                margin: [0, 0, 0, 5]
                                            }]
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