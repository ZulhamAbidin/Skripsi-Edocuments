<!-- resources/views/form-create.blade.php -->

@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Data</div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('pencaker.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label for="NIK">NIK</label>
                            @if ($hasExistingData)
                            <input type="text" name="NIK" id="NIK" class="form-control" value="{{ $user->data->NIK }}" readonly>
                            @else
                            <input type="text" name="NIK" id="NIK" class="form-control" value="{{ old('NIK') }}" required>
                            @endif
                            @error('NIK')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="NamaLengkap">Nama Lengkap</label>
                            <input type="text" name="NamaLengkap" id="NamaLengkap" class="form-control" value="{{ old('NamaLengkap') }}"
                                required>
                            @error('NamaLengkap')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="AlamatDomisili">Alamat Domisili</label>
                            <textarea name="AlamatDomisili" id="AlamatDomisili" class="form-control"
                                required>{{ old('AlamatDomisili') }}</textarea>
                            @error('AlamatDomisili')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="JenisKelamin">Jenis Kelamin</label>
                            <select name="JenisKelamin" id="JenisKelamin" class="form-control" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" {{ old('JenisKelamin')==='Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('JenisKelamin')==='Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('JenisKelamin')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="PendidikanTerakhir">Pendidikan Terakhir</label>
                            <input type="text" name="PendidikanTerakhir" id="PendidikanTerakhir" class="form-control"
                                value="{{ old('PendidikanTerakhir') }}" required>
                            @error('PendidikanTerakhir')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="Jurusan">Jurusan</label>
                            <input type="text" name="Jurusan" id="Jurusan" class="form-control" value="{{ old('Jurusan') }}" required>
                            @error('Jurusan')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="TanggalPengambilan">Tanggal Pengambilan</label>
                            <input type="date" name="TanggalPengambilan" id="TanggalPengambilan" class="form-control"
                                value="{{ old('TanggalPengambilan') }}" required>
                            @error('TanggalPengambilan')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="WaktuPengambilan">Waktu Pengambilan</label>
                            <input type="text" name="WaktuPengambilan" id="WaktuPengambilan" class="form-control"
                                value="{{ old('WaktuPengambilan') }}" required>
                            @error('WaktuPengambilan')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="Total">Total</label>
                            <input type="text" name="Total" id="Total" class="form-control" value="{{ old('Total') }}" required>
                            @error('Total')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection