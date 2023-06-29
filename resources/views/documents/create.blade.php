@extends('layouts.main')

@section('container')
<div class="main-container container-fluid">

    <div class="page-header">
        <h1 class="page-title">Upload Document</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Upload</a></li>
                <li class="breadcrumb-item active" aria-current="page">Document</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Upload Document</h4>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                </div>


                <div class="card-body">

                    <form action="{{ route('documents.store') }}" class="form-horizontal" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Judul Document</label>
                            <div class="col-md-9">
                                <input type="text" required name="title" id="title" required class=" form-control">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">File Document</label>
                            <div class="col-md-9">
                                <input type="file" required name="file" id="file" required class=" form-control">
                            </div>
                        </div>

                        <div class="row mb-4 mt-2">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mb-1">Upload</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault();

            var form = $(this);
            var url = form.attr('action');
            var formData = new FormData(form[0]);

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    Swal.fire({
                        title: 'Success',
                        text: 'Document uploaded successfully!',
                        icon: 'success'
                    }).then(function() {
                        window.location.href = '/documents';
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Error',
                        text: xhr.responseText,
                        icon: 'error'
                    });
                }
            });
        });
    });
</script>
@endpush