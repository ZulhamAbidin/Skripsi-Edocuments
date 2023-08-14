@extends('layouts.main')

@section('container')
    <style>
        .capitalize-text {
            text-transform: capitalize !important;
        }
    </style>

    <div class="main-container container-fluid">

        <div class="page-header">
            <h1 class="page-title capitalize-text">Edit User</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit User</h4>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('management.update', ['id' => $user->id]) }}" method="POST" class="form-horizontal">
                            @csrf
                            @method('PUT')

                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Username</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" id="name" value="{{ $user->name }}"
                                        class=" form-control">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Email</label>
                                <div class="col-md-9">
                                    <input type="email" name="email" id="email" value="{{ $user->email }}" class=" form-control">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Password</label>
                                <div class="col-md-9">
                                    <input type="password" name="password" id="password" class=" form-control">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Role</label>
                                <div class="col-md-9">
                                    <select name="role_id" class="form-control form-select" id="role_id">
                                        <option value="{{ old('role_id') }}" selected></option>
                                        <option value="1">Admin</option>
                                        <option value="2">Magang</option>
                                        <option value="3">Pengunjung</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-4 mt-2">
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary mb-1">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
