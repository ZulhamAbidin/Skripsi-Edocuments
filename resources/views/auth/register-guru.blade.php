{{-- @extends('layouts.main')

@section('container')
<div class="main-container container-fluid">

    <div class="page-header">
        <h1 class="page-title">Tambah User Magang</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Tambah</a></li>
                <li class="breadcrumb-item active" aria-current="page">User</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Users</h4>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('register.guru') }}" class="form-horizontal">
                        @csrf

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input type="text" required autofocus name="name" id="name" value="{{ old('name') }}"
                                    class=" form-control @error('name') is-invalid @enderror">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Email</label>
                            <div class="col-md-9">
                                <input type="email" required autofocus name="email" id="email" value="{{ old('email') }}"
                                    class=" form-control @error('email') is-invalid @enderror">
                        
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Password</label>
                            <div class="col-md-9">
                                <input type="password" required autofocus name="password" id="password" value="{{ old('password') }}"
                                    class=" form-control @error('password') is-invalid @enderror">
                        
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Password-confirm</label>
                            <div class="col-md-9">
                                <input type="password_confirmation" required autofocus name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}"
                                    class=" form-control @error('password_confirm') is-invalid @enderror">
                            </div>
                        </div>

                        <div class="row mb-4 mt-2">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mb-1">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection --}}


@extends('layouts.main')

@section('container')
    <div class="main-container container-fluid">

        <div class="page-header">
            <h1 class="page-title">Tambah User Magang</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Tambah</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Users</h4>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('register.guru') }}" class="form-horizontal">
                            @csrf

                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Nama Lengkap</label>
                                <div class="col-md-9">
                                    <input type="text" required autofocus name="name" id="name"
                                        value="{{ old('name') }}"
                                        class=" form-control @error('name') is-invalid @enderror">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Email</label>
                                <div class="col-md-9">
                                    <input type="email" required autofocus name="email" id="email"
                                        value="{{ old('email') }}"
                                        class=" form-control @error('email') is-invalid @enderror">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Password</label>
                                <div class="col-md-9">
                                    <input type="password" required autofocus name="password" id="password"
                                        value="{{ old('password') }}"
                                        class=" form-control @error('password') is-invalid @enderror">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Password-confirm</label>
                                <div class="col-md-9">
                                    <input type="password" required autofocus name="password_confirmation"
                                        id="password_confirmation" value="{{ old('password_confirmation') }}"
                                        class=" form-control @error('password_confirm') is-invalid @enderror">
                                </div>
                            </div>

                            <div class="row mb-4 mt-2">
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary mb-1">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

