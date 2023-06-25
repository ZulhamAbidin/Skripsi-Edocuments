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
                    <form action="{{ route('data.verifikasi.destroy', $item) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="confirmDeletion(event)">Hapus</button>
                    </form>
                    @if ($item->Status === 'BelumTerverifikasi')
                    <button class="btn btn-success btn-sm" onclick="confirmVerification({{ $item->id }})">Verifikasi</button>
                    <button class="btn btn-danger btn-sm" onclick="confirmRejection({{ $item->id }})">Tolak</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    @push('scripts')
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
                        window.location.href = "/data/verifikasi/verifikasi/" +
                            id; // Perbarui URL dengan path yang tepat
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

            function confirmRejection(id) {
            Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin menolak data ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
            reverseButtons: true,
            input: 'textarea',
            inputPlaceholder: 'Alasan penolakan...',
            inputAttributes: {
            'aria-label': 'Alasan penolakan'
            },
            inputValidator: (value) => {
            if (!value) {
            return 'Anda harus memasukkan alasan penolakan!';
            }
            }
            }).then((result) => {
            if (result.isConfirmed) {
            const alasanPenolakan = result.value;
            
            // Mengirim alasan penolakan ke server menggunakan Axios
            axios.post(`/data/verifikasi/reject/${id}`, {
            alasan: alasanPenolakan
            }).then(response => {
            Swal.fire({
            title: 'Berhasil',
            text: 'Data ditolak!',
            icon: 'success',
            showConfirmButton: false,
            timer: 3000
            }).then(() => {
            // Mengarahkan pengguna kembali ke halaman view/data/verifikasi/index
            window.location.href = '/data/verifikasi/index';
            });
            }).catch(error => {
            console.error(error);
            Swal.fire({
            title: 'Terjadi Kesalahan',
            text: 'Gagal menolak data.',
            icon: 'error',
            showConfirmButton: false,
            timer: 3000
            });
            });
            } else {
            Swal.fire({
            title: 'Dibatalkan',
            text: 'Penolakan data dibatalkan.',
            icon: 'info',
            showConfirmButton: false,
            timer: 3000
            });
            }
            });
            }
        </script>
    @endpush
@endsection
