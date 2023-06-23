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
@endsection

@push('scripts')
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    $(document).ready(function() {
        $('#document-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('documents.index') }}',
            columns: [
                { data: 'title', name: 'title' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
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
                            Swal.fire('Error', 'Terjadi kesalahan saat menghapus data.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>

@endpush
