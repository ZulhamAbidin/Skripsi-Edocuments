@extends('layouts.main')

@section('container')
    <style>
        .dataTables_filter {
            display: none;
        }
    </style>

    <div class="main-container container-fluid">

        <div class="page-header">
            <h1 class="page-title">Management User</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">

                    <div class="card-body pb-4">
                        <div class="input-group mb-2">
                            <input type="seach" class="form-control form-control" id="search-input"
                                placeholder="Searching.....">
                            <span class="input-group-text btn btn-primary" id="search-button">Search</span>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List User</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="users-table"class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Peran</th>
                                        <th>Aksi</th>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            var table = $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                searching: true, // Mengaktifkan fitur pencarian
                ajax: "{{ route('management.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'role.name',
                        name: 'role.name',
                        render: function(data) {
                            if (data === 'kepala_sekolah') {
                                return 'admin';
                            } else if (data === 'guru') {
                                return 'magang';
                            } else if (data === 'siswa') {
                                return 'pengunjung';
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            // Tangani aksi pencarian saat pengguna mengetik
            $('#search-input').on('keyup', function() {
                var searchValue = $(this).val();
                table.search(searchValue).draw();
            });

            // Hapus user
            $('#users-table').on('click', '.btn-delete', function() {
                var userId = $(this).data('id');
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menghapus pengguna ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('management') }}/" + userId,
                            type: "POST",
                            data: {
                                _method: 'DELETE',
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(data) {
                                Swal.fire({
                                    title: 'Sukses',
                                    text: 'Pengguna berhasil dihapus',
                                    icon: 'success',
                                    timer: 1500,
                                    showConfirmButton: false
                                });
                                table.ajax.reload();
                            },
                            error: function(xhr, status, error) {
                                console.log(xhr.responseText);
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Terjadi kesalahan saat menghapus pengguna',
                                    icon: 'error',
                                    timer: 1500,
                                    showConfirmButton: false
                                });
                            }
                        });
                    }
                });
            });

            // Edit user
            $('#users-table').on('click', '.btn-edit', function() {
                var userId = $(this).data('id');
                window.location.href = "{{ url('management') }}/" + userId + "/edit";
            });

            
        });
    </script>
@endpush
