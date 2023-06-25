@extends('layouts.main')

@section('container')
<div class="container">
    <h1>Pengajuan Pengesahan</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>Alamat Domisili</th>
                <th>Jenis Kelamin</th>
                <th>Pendidikan Terakhir</th>
                <th>Jurusan</th>
                <th>Tanggal Pengesahan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->NIK }}</td>
                <td>{{ $item->NamaLengkap }}</td>
                <td>{{ $item->AlamatDomisili }}</td>
                <td>{{ $item->JenisKelamin }}</td>
                <td>{{ $item->PendidikanTerakhir }}</td>
                <td>{{ $item->Jurusan }}</td>
                <td>{{ $item->TanggalPengesahan }}</td>
                <td>{{ $item->Status }}</td>
                <td>
                    <form action="{{ route('verifikasi.destroy', $item) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="confirmDeletion(event)">Hapus</button>
                    </form>
                    @if ($item->Status === 'BelumTerverifikasi')
                    <button class="btn btn-success btn-sm"
                        onclick="confirmVerification({{ $item->id }})">Verifikasi</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function confirmVerification(id) {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin memverifikasi data ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('verifikasi.verify', '') }}/" + id;
            } else {
                Swal.fire({
                    title: 'Dibatalkan',
                    text: 'Verifikasi data dibatalkan.',
                    icon: 'info',
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        });
    }
</script>

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