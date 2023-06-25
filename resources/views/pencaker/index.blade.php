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
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>Alamat Domisili</th>
                <th>Jenis Kelamin</th>
                <th>Pendidikan Terakhir</th>
                <th>Jurusan</th>
                <th>Tanggal Pengesahan</th>
                <th>Status</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pencakerData as $data)
            <tr>
                <td>{{ $data->NIK }}</td>
                <td>{{ $data->NamaLengkap }}</td>
                <td>{{ $data->AlamatDomisili }}</td>
                <td>{{ $data->JenisKelamin }}</td>
                <td>{{ $data->PendidikanTerakhir }}</td>
                <td>{{ $data->Jurusan }}</td>
                <td>{{ $data->TanggalPengesahan }}</td>
                <td>{{ $data->alasan_penolakan }}</td>
                <td>{{ $data->Status }}</td>
                <td>
                    <a href="{{ route('pencaker.show', $data->id) }}" class="button btn btn-primary">Print</a>
                    <form action="{{ route('pencaker.destroy', $data->id) }}" method="POST"
                        style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="confirmDeletion(event)">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@endsection

@push('scripts')

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
            cancelButtonText: 'Batal',
            customClass: {
                container: 'swal-center' // Menambahkan kelas 'swal-center' untuk mengatur tampilan di tengah
            },
            appendTo: 'body' // Menampilkan alert di tengah halaman dengan mengabaikan elemen parent
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.form.submit();
            }
        });
    }

    @if (session('success'))
    Swal.fire({
        title: 'Sukses',
        text: '{{ session('success') }}',
        icon: 'success',
        showConfirmButton: false,
        timer: 2000,
        customClass: {
            container: 'swal-center' // Menambahkan kelas 'swal-center' untuk mengatur tampilan di tengah
        },
        appendTo: 'body' // Menampilkan alert di tengah halaman dengan mengabaikan elemen parent
    });
    @endif


</script>


@if ($pencakerData->contains('Status', 'Ditolak'))
<script>
    Swal.fire({
            title: 'Konfirmasi',
            text: 'Data Anda telah ditolak. Alasan penolakan: {{ $pencakerData->firstWhere('Status', 'Ditolak')->alasan_penolakan }}. Silakan hubungi administrator untuk informasi lebih lanjut.',
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            customClass: {
                container: 'swal-center' // Menambahkan kelas 'swal-center' untuk mengatur tampilan di tengah
            },
            appendTo: 'body' // Menampilkan alert di tengah halaman dengan mengabaikan elemen parent
        });
</script>
@endif
@endpush