@extends('layouts.main')

@section('container')
    <style>
        .dataTables_filter {
            display: none;
        }

        td .action-buttons {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
        }

        td .action-buttons .btn {
            display: block !important;
            width: 100% !important;
            margin-bottom: 5px !important;
        }
    </style>

    <div class="main-container container-fluid">

        <div class="page-header">
            <h1 class="page-title">List Document</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Document</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">

                    {{-- <div class="card-body pb-4">
                    <div class="input-group mb-2">
                        <input type="seach" class="form-control form-control" id="search-input"
                            placeholder="Searching.....">
                        <span class="input-group-text btn btn-primary" id="search-button">Search</span>
                    </div>
                </div> --}}

                    <div class="card-body pb-4">
                        <div class="input-group mb-2">
                            <input type="search" class="form-control" id="search-input" placeholder="Searching.....">
                            <span class="input-group-text btn btn-primary" id="search-button">Search</span>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Document</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="document-table">
                                <thead>
                                    <tr>
                                        <th class="w-full">Title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="" method="POST">
                        @csrf
                        @method('PUT')
    
                        <div class="form-group">
                            <label for="editTitle">Title</label>
                            <input type="text" name="title" id="editTitle" class="form-control" required>
                        </div>
    
                        <div class="form-group">
                            <label for="editDocument">Document</label>
                            <input type="file" name="document" id="editDocument" class="form-control" required>
                        </div>
    
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var dataTable = $('#document-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('documents.get') }}',
                    data: function(d) {
                        d.search = $('#search-input').val(); // Mengambil nilai dari input pencarian
                    }
                },
                columns: [{
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            var actionButtons = '<div class="action-buttons">';
                            actionButtons += data;
                            actionButtons += '</div>';
                            return '<td>' + actionButtons + '</td>';
                        }
                    }
                ],
                columnDefs: [{
                        width: '90%',
                        targets: 0
                    } // Mengatur lebar kolom 'Title' menjadi 90%
                ]
            });

            // Menghandle klik tombol "Search"
            $('#search-button').on('click', function() {
                dataTable.draw();
            });

            // Menghandle pencarian live saat mengetik
            $('#search-input').on('keyup', function() {
                dataTable.draw();
            });

            // Menangani klik tombol Edit
            $(document).on('click', '.edit-document', function() {
                var documentId = $(this).data('document-id');
                var title = $(this).data('document-title');
                var document = $(this).data('document');

                // Mengisi nilai input modal dengan data judul dan dokumen
                $('#editForm').attr('action', '/documents/' + documentId);
                $('#editTitle').val(title);
                $('#editDocument').val(document);

                // Membuka modal
                $('#editModal').modal('show');
            });

            // Mengirim permintaan AJAX untuk menyimpan perubahan judul dan dokumen
            $('#editForm').submit(function(e) {
                e.preventDefault();

                var form = $(this);
                var url = form.attr('action');
                var title = form.find('#title').val(); // Mengambil nilai judul dari input dengan id "title"

                // Membuat objek FormData untuk mengirim data form, termasuk file
                var formData = new FormData(form[0]);
                formData.append('_method', 'PUT'); // Menggunakan metode PUT
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('title', title);

                // Mengirim permintaan AJAX untuk menyimpan perubahan judul dan dokumen
                $.ajax({
                    url: url,
                    type: 'POST', // Tetap menggunakan metode POST untuk penggunaan Laravel
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Menampilkan pesan sukses menggunakan SweetAlert
                        Swal.fire('Success', response.message, 'success');

                        // Menutup modal
                        $('#editModal').modal('hide');

                        // Memuat ulang tabel dokumen
                        $('#document-table').DataTable().ajax.reload();
                    },
                    error: function(xhr) {
                        // Menampilkan pesan error menggunakan SweetAlert
                        Swal.fire('Error', xhr.responseText, 'error');
                    }
                });
            });

            // Menggunakan event delegation untuk menangani klik tombol delete
            $(document).on('click', '.delete-document', function(e) {
                e.preventDefault();

                var documentId = $(this).data('document-id');

                // Konfirmasi penghapusan menggunakan SweetAlert
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menghapus data ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Mengirim permintaan penghapusan menggunakan AJAX
                        $.ajax({
                            url: '/documents/' + documentId,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                // Menampilkan pesan sukses
                                Swal.fire('Sukses', response.message, 'success');

                                // Memuat ulang tabel dokumen
                                $('#document-table').DataTable().ajax.reload();
                            },
                            error: function(xhr) {
                                // Menampilkan pesan error
                                Swal.fire('Error',
                                    'Terjadi kesalahan saat menghapus data.',
                                    'error');
                            }
                        });
                    }
                });
            });


        });
    </script>
@endpush
