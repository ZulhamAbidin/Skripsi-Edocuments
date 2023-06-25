@extends('layouts.main')

@section('container')
    <div class="row mt-4">
        <div class="col-md-12">
            <a href="data/create" class="btn btn-primary" id="addData">Tambah Data</a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
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

@endsection

@push('scripts')
    <script>
        $(function() {
    
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
    
    
                    var table = $('.data-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: "{{ route('data.index') }}",
                            data: function(d) {
                                d.verifikasi =
                                    1; // Mengirim parameter verifikasi = 1 untuk memfilter data terverifikasi
                            }
                        },
                        columns: [{
                                data: 'DT_RowIndex',
                                name: 'DT_RowIndex',
                                orderable: false,
                                searchable: false
                            },
                            {
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
                            },
                            {
                                data: 'action',
                                name: 'action',
                                orderable: false,
                                searchable: false
                            },
                        ],
                    });
    
                    window.addEventListener('load', function() {
                        @if (session('success'))
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: '{{ session('success') }}',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        @endif
                    });
    
                    // Tambah data
                    $('#addData').click(function() {
                        $('#addDataForm').trigger('reset');
                        $('#addDataModal').modal('show');
                    });
    
    
    
                    // Edit data
                    $('body').on('click', '.editData', function() {
                        var id = $(this).data('id');
                        var url = "{{ url('data') }}" + '/' + id + '/edit';
    
                        $.get(url, function(data) {
                            $('#addDataForm').trigger('reset');
                            $('#addDataModal').modal('show');
                            $('#addDataModalLabel').text('Edit Data');
                            $('#addDataForm').attr('action', "{{ url('data') }}" + '/' + id);
                            $('#addDataForm #NIK').val(data.NIK);
                            $('#addDataForm #NamaLengkap').val(data.NamaLengkap);
                            $('#addDataForm #AlamatDomisili').val(data.AlamatDomisili);
                            $('#addDataForm #JenisKelamin').val(data.JenisKelamin);
                            $('#addDataForm #PendidikanTerakhir').val(data.PendidikanTerakhir);
                            $('#addDataForm #Jurusan').val(data.Jurusan);
                            $('#addDataForm #TanggalPengesahan').val(data.TanggalPengesahan);
                            $('#addDataForm #Status').val(data.Status);
                        });
                    });
    
                    // Update data
                    $('#addDataForm').on('submit', function(e) {
                        e.preventDefault();
                        var url = $(this).attr('action');
    
                        $.ajax({
                            url: url,
                            type: 'PUT',
                            data: $(this).serialize(),
                            success: function(response) {
                                $('#addDataModal').modal('hide');
                                table.ajax.reload();
                                Swal.fire('Berhasil', response.message, 'success');
                            },
                            error: function(xhr) {
                                Swal.fire('Error', xhr.responseJSON.message, 'error');
                            }
                        });
                    });
    
                    // Hapus data
                    $('body').on('click', '.deleteData', function() {
                        var id = $(this).data('id');
                        var url = "{{ url('data') }}" + '/' + id;
    
                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: "Data akan dihapus permanen!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, hapus',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: url,
                                    type: 'DELETE',
                                    success: function(response) {
                                        table.ajax.reload();
                                        Swal.fire('Berhasil', response.message, 'success');
                                    },
                                    error: function(xhr) {
                                        Swal.fire('Error', xhr.responseJSON.message, 'error');
                                    }
                                });
                            }
                        });
                    });
                });
    </script>

@endpush

