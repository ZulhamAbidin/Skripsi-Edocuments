@extends('layouts.main')

@section('container')
<div class="container">
    <h1>PERMINTAAN Verifikasi</h1>
   
    <!-- Tombol cetak -->
    @if ($pencakerData->isEmpty())
    <a href="{{ route('pencaker.create') }}" class="btn btn-primary">Silahkan Lengkapi Data Anda</a>
    @else
    <table class="table mt-3">
        <thead>
            <tr>
                {{-- <th>ID</th> --}}
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>Alamat Domisili</th>
                <th>Jenis Kelamin</th>
                <th>Pendidikan Terakhir</th>
                <th>Jurusan</th>
                <th>Tanggal Pengesahan</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pencakerData as $data)
            @if ($loop->first)
            {{-- Hanya menampilkan satu data --}}
            <tr>
                {{-- Tampilkan data --}}
                <td>{{ $data->NIK }}</td>
                <td>{{ $data->NamaLengkap }}</td>
                <td>{{ $data->AlamatDomisili }}</td>
                <td>{{ $data->JenisKelamin }}</td>
                <td>{{ $data->PendidikanTerakhir }}</td>
                <td>{{ $data->Jurusan }}</td>
                <td>{{ $data->TanggalPengesahan }}</td>
                <td>{{ $data->Status }}</td>
                <td>
                    @if ($data->Status !== 'BelumTerverifikasi')
                    <a href="{{ route('pencaker.show', $data->id) }}" class="button btn btn-primary">Print</a>
                    @endif
                    <a href="{{ route('pencaker.edit', $data->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('pencaker.destroy', $data->id) }}" method="POST"
                        style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="confirmDeletion(event)">Hapus</button>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    @endif
</div>


<script>
    function confirmDeletion(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.form.submit();
                }
            });
        }
</script>
@endsection