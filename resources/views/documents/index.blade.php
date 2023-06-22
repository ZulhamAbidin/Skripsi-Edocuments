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
        });


       
    </script>
@endpush
