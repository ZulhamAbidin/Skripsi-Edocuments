@extends('layouts.main')

@section('container')
    
<div class="container">
    
    <h1>Tambah Data Pencaker</h1>
    <form action="{{ route('pencaker.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" id="nik" name="NIK" required>
        </div>
        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="NamaLengkap" required>
        </div>
        <div class="form-group">
            <label for="alamat_domisili">Alamat Domisili</label>
            <input type="text" class="form-control" id="alamat_domisili" name="AlamatDomisili" required>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <input type="text" class="form-control" id="jenis_kelamin" name="JenisKelamin" required>
        </div>
        <div class="form-group">
            <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
            <input type="text" class="form-control" id="pendidikan_terakhir" name="PendidikanTerakhir" required>
        </div>
        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <input type="text" class="form-control" id="jurusan" name="Jurusan" required>
        </div>
        <div class="form-group">
            <label for="tanggal_pengesahan">Tanggal Pengesahan</label>
            <input type="date" class="form-control" id="tanggal_pengesahan" name="TanggalPengesahan" required>
        </div>
       <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="Status">
                <option value="BelumTerverifikasi">BelumTerverifikasi</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
{{-- 
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <nav class="border-gray-200 bg-slate-50 ">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center">
                <img src="../assets/images/brand/logo-3.png" class="h-8 mr-3" alt="Flowbite Logo" />
            </a>
            <button data-collapse-toggle="navbar-hamburger" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 "
                aria-controls="navbar-hamburger" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full" id="navbar-hamburger">
                <ul class="flex flex-col mt-4 rounded-lg gap-y-1 bg-gray-50 ">
                    <li>
                        <a href="#" class="block py-2 pl-3 pr-4 text-white bg-blue-500 rounded"
                            aria-current="page">Lengkapi Data</a>
                    </li>
                    <li>
                        <a href="/pencaker/"
                        class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 ">Lihat Data</a>
                    </li>
                    <li>
                        <form action="/logout" method="post" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100">
                            @csrf
                        
                            <button type="submit" class="btn"><i class="dropdown-icon fe fe-alert-circle"></i> Logout</button>
                        </form>
                       
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
</body>

</html> --}}