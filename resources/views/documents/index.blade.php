@extends('layouts.main')

@section('container')
    <div class="container">
        <h1>Document Management</h1>
        <a href="{{ route('documents.create') }}" class="btn btn-primary mb-3">Upload Document</a>
        <table class="table table-bordered" id="document-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>


    <!-- Modal Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Dokumen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form Edit -->
                    <form id="editForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file" class="form-control-file" id="file" name="file">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $('#document-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('documents.index') }}',
                columns: [{
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            // Menangani klik tombol Edit
            $(document).on('click', '.edit-document', function() {
                var documentId = $(this).data('document-id');
                var title = $(this).data('document-title');

                // Mengisi nilai input modal dengan data judul
                $('#editForm').attr('action', '/documents/' + documentId);
                $('#editTitle').val(title);

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
