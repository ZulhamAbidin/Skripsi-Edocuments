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
                position: relative !important;
                left: auto !important;
                top: auto !important;
                right: 0px !important;
            }

            .buttons-excel,
            .buttons-pdf {
                margin-right: 10px !important;
                border-radius: 10px !important;
                margin-bottom: 10px !important;
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
                margin-bottom: 10px !important;
            }

            .buttons-excel {
                margin-left: 0 !important;
            }
        }

        .dataTables_filter {
            display: none;
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
            

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cetak Data Berdasarkan Rentang Waktu</h4>
                    </div>
                
                    <div class="card-body">
                        <div class="row">
                    
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Pilih Rentang Waktu Awal</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="wd-200 mg-b-30">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                </div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="date"
                                                    name="tglawal" id="tglawal">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Pilih Rentang Waktu Akhir</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="wd-200 mg-b-30">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <span class="fa fa-calendar tx-16 lh-0 op-6"></span>
                                                </div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="date"
                                                    name="tglakhir" id="tglakhir">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <a onclick="this.href='/cetak/cetak-data-pertanggal/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value "
                                            class="btn btn-primary block" target="_blank">Cetak</a>
                                    </div>
                                </div>
                            </div>
                    
                        </div>
                    </div>
                </div>

                <div class="card">
                
                    <div class="card-body pb-4">
                        <div class="input-group mb-2">
                            <input type="seach" class="form-control form-control" id="custom-search-input"
                                placeholder="Cari Data Yang Ingin Export @Makassar">
                            <span class="input-group-text btn btn-primary" id="search-button">Search</span>
                        </div>
                    </div>
                
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Export Custom Data Pengesahan</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered data-table" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama Lengkap</th>
                                        <th>Alamat Domisili</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Pendidikan Terakhir</th>
                                        <th>Jurusan</th>
                                        <th>Tanggal Pengesahan</th>
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
            $(function() {
                var table = $('#dataTable').DataTable({
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
                    ],
                    dom: 'Bfrtip',
                    buttons: [{
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

                $('#custom-search-input').on('keyup', function() {
                    var searchValue = $(this).val();
                    table.search(searchValue).draw();
                });
            });
        </script>
    @endpush
@endsection
