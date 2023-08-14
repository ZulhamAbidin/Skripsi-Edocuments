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

                        <form action="{{ route('management.search') }}" method="GET" class="input-group mb-2">
                            <input type="text" name="search" class="form-control form-control" id="search-input"
                                placeholder="Searching.....">
                            <button type="submit" class="input-group-text btn btn-primary"  id="search-button">Search</button>
                        </form>

                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List User</h4>
                    </div>

                    <div class="card-body ">
                        <div class="table-responsive">
                            <table id="users-table"class="table border text-nowrap text-md-nowrap table-md mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center">NO</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Peran</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $row->NIK }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>
                                                @if ($row->role->name == 'siswa')
                                                Pengunjung
                                                @elseif ($row->role->name == 'guru')
                                                Admin Magang
                                                @elseif ($row->role->name == 'kepala sekolah')
                                                Admin
                                                @else
                                                {{ $row->role->name }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('management.edit', ['id' => $row->id]) }}"
                                                        class="btn btn-sm mx-1 btn-primary">Edit</a>
                                                    <form class="inline" id="deleteForm{{ $row->id }}"
                                                        action="{{ route('management.destroy', ['id' => $row->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm mx-1 btn-danger btn-delete"
                                                            data-id="{{ $row->id }}">Delete</button>
                                                    </form>
                                                    @if ($row->role_id !== 1 && $row->role_id !== 2)
                                                        <a href="{{ route('visit.show', $row->id) }}"
                                                            class="view btn btn-sm mx-1 btn-info btn-md">Visit User</a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                @if (!empty($message))
                                <div class="text-center text-danger pb-2">{{ $message }}</div>
                                @endif
                            </table>

                        </div>
                    </div>

                    <div class="card-footer mt-4">
                        @if (isset($totalTime))
                            Menampilkan dengan Total waktu: {{ number_format($totalTime, 1, '.', ',') }} detik
                        @endif
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-delete');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-id');

                    Swal.fire({
                        title: 'Apakah Anda yakin ingin menghapus pengguna ini?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Delete',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('deleteForm' + userId).submit();
                        }
                    });
                });
            });

            // Cek jika ada pesan sukses, tampilkan alert SweetAlert
            const successMessage = "{{ session('success') }}";
            if (successMessage) {
                Swal.fire('Sukses', successMessage, 'success');
            }
        });
    </script>
@endpush


{{-- @push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // var table = $('#users-table').DataTable({
            //     processing: true,
            //     serverSide: true,
            //     searching: true,
            //     ajax: {
            //         url: "{{ route('management.index') }}",
            //         type: "GET"
            //     },
            //     columns: [{
            //             data: 'id',
            //             name: 'id'
            //         },
            //         {
            //             data: 'name',
            //             name: 'name'
            //         },
            //         {
            //             data: 'email',
            //             name: 'email'
            //         },
            //         {
            //             data: 'role.name',
            //             name: 'role.name',
            //             render: function(data) {
            //                 if (data === 'kepala_sekolah') {
            //                     return 'admin';
            //                 } else if (data === 'guru') {
            //                     return 'magang';
            //                 } else if (data === 'siswa') {
            //                     return 'pengunjung';
            //                 } else {
            //                     return data;
            //                 }
            //             }
            //         },
            //         {
            //             data: 'action',
            //             name: 'action',
            //             orderable: false,
            //             searchable: false
            //         }
            //     ]
            // });

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

            @if (session('success'))
                Swal.fire({
                    title: 'Success',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    timer: 3000,
                    showConfirmButton: false
                });
            @endif

        });
    </script>
@endpush --}}
