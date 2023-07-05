@extends('layouts.main')

@section('container')

<div class="main-container container-fluid">

    <div class="page-header">
        <h1 class="page-title">Pengajuan Pengesahan</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Data</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pengajuan</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">

                <div class="card-body pb-4">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="search-input" placeholder="Searching.....">
                        <span class="input-group-text btn btn-primary">Search</span>
                    </div>
                </div>
                
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pengajuan Data Pengesahan</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table border text-nowrap text-md-nowrap table-hover mb-0 text-center" id="data-table">
                            <thead>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>Alamat Domisili</th>
                                    <th>No Ponsel</th>
                                    <th>Agama</th>
                                    <th class="col-1 text-center" style="vertical-align: bottom; line-height: 1,5;">Jenis<br>Kelamin</th>
                                    <th class="col-1 text-center" style="vertical-align: bottom; line-height: 1,5;">Pendidikan<br>Terakhir</th>
                                    <th>Jurusan</th>
                                    <th class="col-1 text-center" style="vertical-align: bottom; line-height: 1,5;">Tanggal<br>Pengesahan</th>
                                    <th class="col-1 text-center" style="vertical-align: bottom; line-height: 1,5;">Tanggal<br>Pengambilan</th>
                                    <th class="col-1 text-center" style="vertical-align: bottom; line-height: 1,5;">Waktu<br>Pengambilan</th>
                                    <th class="col-1 text-center" style="vertical-align: bottom; line-height: 1,5;">Lembar Yang<br>di SAH kan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="searchResults">
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->NamaLengkap }}</td>
                                    <td>{{ $item->AlamatDomisili }}</td>
                                    <td>{{ $item->NoTelfon }}</td>
                                    <td>{{ $item->Agama }}</td>
                                    <td>{{ $item->JenisKelamin }}</td>
                                    <td>{{ $item->PendidikanTerakhir }}</td>
                                    <td>{{ $item->Jurusan }}</td>
                                    <td>{{ $item->TanggalPengesahan }}</td>
                                    <td>{{ $item->TanggalPengambilan }}</td>
                                    <td>{{ $item->WaktuPengambilan }}</td>
                                    <td>{{ $item->Total }}</td>
                                    <td>{{ $item->Status }}</td>
                                    <td class="float-end">
                                        <form action="{{ route('data.verifikasi.destroy', $item) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="confirmDeletion(event)">Hapus</button>
                                        </form>
                                        @if ($item->Status === 'BelumTerverifikasi')
                                        <button class="btn btn-success btn-sm"
                                            onclick="confirmVerification({{ $item->id }})">Verifikasi</button>
                                        <button class="btn btn-danger btn-sm " onclick="confirmRejection({{ $item->id }})">Tolak</button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
                window.location.href = "/data/verifikasi/verifikasi/" + id; // Perbarui URL dengan path yang tepat
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Data berhasil diverifikasi.',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                });
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
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Data berhasil dihapus.',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                });
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

    $(document).ready(function () {
        var searchTimeout;
        var tableBody = $('#data-table tbody');

        $('#search-input').on('keyup', function () {
            clearTimeout(searchTimeout);
            var searchValue = $(this).val();

            searchTimeout = setTimeout(function () {
                fetchSearchResults(searchValue);
            }, 500);
        });

        function fetchSearchResults(searchValue) {
            $.ajax({
                url: '/data/verifikasi/search',
                method: 'GET',
                data: {
                    search: searchValue
                },
                success: function (response) {
                    displaySearchResults(response);
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        }

        function displaySearchResults(data) {
            tableBody.empty();

            // Tampilkan data hasil pencarian
            $.each(data, function (index, item) {
                var row = $('<tr>');
                row.append($('<td>').text(item.NIK));
                row.append($('<td>').text(item.NamaLengkap));
                row.append($('<td>').text(item.AlamatDomisili));
                row.append($('<td>').text(item.JenisKelamin));
                row.append($('<td>').text(item.PendidikanTerakhir));
                row.append($('<td>').text(item.Jurusan));
                row.append($('<td>').text(item.TanggalPengesahan));
                row.append($('<td>').text(item.Status));

                var actionCell = $('<td>').html(item.Aksi); // Menggunakan .html() untuk menyisipkan kode HTML button aksi
                row.append(actionCell);

                tableBody.append(row);
            });
        }
    });
</script>
@endpush


@endsection