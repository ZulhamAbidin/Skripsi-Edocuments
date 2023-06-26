{{-- @extends('layouts.main')

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
                <form action="{{ route('pencaker.destroy', $data->id) }}" method="POST" style="display: inline-block">
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
--}}


<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="bg-white">

        <header class="absolute inset-x-0 top-0 z-40">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">

                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5">
                        <img src="../assets/images/brand/logo-3.png" class="h-8 w-auto" alt="logo">
                    </a>
                </div>

                <form action="/logout" method="post" class="flex lg:hidden">
                    @csrf
                    <button type="submit" class="text-sm font-semibold leading-6 text-gray-900">Logout
                        <span aria-hidden="true">&rarr;</span>
                    </button>
                </form>

                <form action="/logout" method="post" class="hidden lg:flex lg:flex-1 lg:justify-end">
                    @csrf
                    <button type="submit" class="text-sm font-semibold leading-6 text-gray-900">Logout
                        <span aria-hidden="true">&rarr;</span>
                    </button>
                </form>
            </nav>
        </header>

        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="mx-auto max-w-2xl pt-10">
                <div class="sm:mb-8 sm:flex sm:justify-center">
                    <div
                        class="relative text-center my-6 py-2 rounded-full px-3 lg:py-1 capitalize text-indigo-600 text-sm leading-6  ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                        Selamat Datang {{ Auth::user()->name }}.
                    </div>
                </div>
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Pengesahan AK1</h1>
                    <p class="mt-6 text-lg capitalize leading-8 text-gray-600">
                        bidang penempatan tenaga kerja dan perluasakan kesempatan kerja Dinas ketenagakerjaan kota
                        makassar.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="#"
                            class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Lengkapi
                            Data Anda →</a>
                        <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Lengkapi Data Anda<span
                                aria-hidden="true">→</span></a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>

        <div class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">

            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="flex min-h-full flex-col justify-center px-6 lg:px-8">
                                <h2 class="mt-3 text-left text-sm tracking-tight text-gray-900 font-semibold">Lengkapi
                                    Terlebih Dahulu Data Diri Anda </h2>
                                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                                    <form class="space-y-6" action="#" method="POST">
                                        <div>
                                            <label for="nik"
                                                class="block text-sm font-medium leading-6 text-gray-900">NIK</label>
                                            <div class="mt-2">
                                                <input id="nik" name="nik" type="number" autocomplete="nik" required
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>

                                        <div>
                                            <label for="nama_lengkap"
                                                class="block text-sm font-medium leading-6 text-gray-900">Nama
                                                Lengkap</label>
                                            <div class="mt-2">
                                                <input id="nama_lengkap" name="nama_lengkap" type="nama_lengkap"
                                                    autocomplete="nama_lengkap" required
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>

                                        <div>
                                            <label for="alamat_domisili"
                                                class="block text-sm font-medium leading-6 text-gray-900">Alamat
                                                Domisili</label>
                                            <div class="mt-2">
                                                <input id="alamat_domisili" name="alamat_domisili"
                                                    type="alamat_domisili" autocomplete="alamat_domisili" required
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>


                                        <div>
                                            <label for="alamat_domisili" class="block text-sm font-medium leading-6 text-gray-900">Alamat Domisili</label>
                                            <div class="mt-2">
                                                    <select id="alamat_domisili" name="alamat_domisili" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                        <option value="ID">Indonesia</option>
                                                        <option value="US">United States</option>
                                                        <option value="CA">Canada</option>
                                                        <option value="EU">Europe</option>
                                                    </select>
                                            </div>
                                        </div>

                                        <div>
                                            <button type="submit"
                                                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                                                in</button>
                                        </div>
                                    </form>

                                    <p class="mt-10 text-center text-sm text-gray-500">
                                        Not a member?
                                        <a href="#"
                                            class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Start
                                            a 14 day free
                                            trial</a>
                                    </p>
                                </div>
                            </div>

                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                                        Deactivate
                                        account</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">Are you sure you want to deactivate your
                                            account? All
                                            of your data will be permanently removed. This action cannot be undone.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="button"
                                class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Deactivate</button>
                            <button type="button"
                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/navbar.js') }}"></script>
    <script>
        // Fungsi untuk konfirmasi penghapusan
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

        // Menambahkan event listener pada tombol penghapusan
        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach((button) => {
            button.addEventListener('click', confirmDeletion);
        });

        @if(session('success'))
        Swal.fire({
            title: 'Sukses',
            text: '{{ session('
            success ') }}',
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
            text: 'Data Anda telah ditolak. Alasan penolakan: {{ $pencakerData->firstWhere('
            Status ', '
            Ditolak ')->alasan_penolakan }}. Silakan hubungi administrator untuk informasi lebih lanjut.',
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

</body>

</html>
