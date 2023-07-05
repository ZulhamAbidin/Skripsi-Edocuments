<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('assets/js/alert/sweetalert2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/js/alert/sweetalert2.min.css') }}" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body>
    <div class="bg-white">

        {{-- header --}}
        <header class="absolute inset-x-0 top-0 z-40">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">

                <div class="flex lg:flex-1">
                    <a href="" class="-m-1.5 p-1.5">
                        <img src="{{ asset('assets/images/brand/logo-3.png') }}" class="h-8 w-auto" alt="logo">
                    </a>
                </div>

                <div class="flex gap-x-6">
                    <a href="/profile"
                        class="rounded-md mobile-menu-button bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Profile
                    </a>
                    <form action="{{ route('logout') }}" method="post" class="flex lg:hidden">
                        @csrf
                        <button type="submit" class="text-sm font-semibold leading-6 text-gray-900">Logout
                            <span aria-hidden="true">&rarr;</span>
                        </button>
                    </form>

                    <form action="{{ route('logout') }}" method="post" class="hidden lg:flex lg:flex-1 lg:justify-end">
                        @csrf
                        <button type="submit" class="text-sm font-semibold leading-6 text-gray-900">Logout
                            <span aria-hidden="true">&rarr;</span>
                        </button>
                    </form>

                </div>
            </nav>
        </header>





        {{-- jumbotron --}}
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
                    <p class="mt-6 text-lg capitalize leading-8 text-gray-600"> bidang penempatan tenaga kerja dan
                        perluasan kesempatan kerja, Dinas ketenagakerjaan kota makassar.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <button type="button"
                            class="rounded-md mobile-menu-button bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Tambah Data Pengesahan</button>


                    </div>
                </div>
            </div>

            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>

            <hr class="mt-20 w-full bg-gray-500">

        </div>


        
        @if (session('alert'))
            <div class="max-w-md mx-auto mt-10 rounded-lg shadow-xl py-4 @if (session('alert.type') === 'success') bg-green-500 @elseif(session('alert.type') === 'warning') bg-amber-500 @elseif(session('alert.type') === 'danger') bg-red-500 @endif text-white font-light rounded-t px-4">
                <div class="flex">
                    <svg class="fill-current h-6 w-6 text-slate-50 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                    </svg>
                    <strong>{{ session('alert.message') }}</strong>
                </div>
                @if (session('alert.alasanPenolakan'))
                    <p class="pl-10">Alasan Penolakan: {{ session('alert.alasanPenolakan') }}</p>
                @endif
            </div>
        @endif


       

        {{-- terbaru --}}



        <style>
            .swal2-popup .swal2-title {
                font-size: 20px !important;
                /* Ubah ukuran font sesuai kebutuhan */
            }

            .swal2-popup .swal2-content {
                font-size: 15px !important;
                /* Ubah ukuran font sesuai kebutuhan */
            }
        </style>

        {{-- alert --}}
        @if (
            $pencakerData->isNotEmpty() &&
                $pencakerData->first()->TanggalPengambilan &&
                $pencakerData->first()->WaktuPengambilan)
            @php
                $currentDateTime = now();
                $currentDate = $currentDateTime->toDateString();
                $currentTime = $currentDateTime->format('H:i:s');
                $alertStartTime = \Carbon\Carbon::parse($pencakerData->first()->TanggalPengambilan . ' ' . $pencakerData->first()->WaktuPengambilan);
                $alertEndTime = $alertStartTime->copy()->addHour();
                $isAlertActive = $currentDateTime->between($alertStartTime, $alertEndTime);
            @endphp

            @if ($isAlertActive)
                <script>
                    setTimeout(function() {
                        Swal.fire({
                            title: 'Waktu Pengambilan Telah Tiba',
                            text: 'Kartu Kuning sebanyak {{ $latestTotal }} Telah DiSAH kan',
                            icon: 'info',
                            showConfirmButton: true,
                            customClass: {
                                content: 'text-sm' // Ubah ukuran font sesuai kebutuhan, misalnya 'text-lg', 'text-xl', dll.
                            }
                        });
                    }, 1000);
                </script>
            @endif
        @endif

        {{-- history --}}
        <div class="relative overflow-x-auto shadow-xl sm:rounded-lg md:mx-10 px-4 lg:mx-6 mb-96 mt-10">
            <table class="w-full text-sm text-left text-gray-500">
                <caption class="p-5 text-lg font-semibold text-left text-gray-900"> History Pengesahan
                    <p class="mt-1 text-sm font-normal text-gray-500 ">History Pengesahan Kartu AK1 BIdang Penempatan
                        Tenaga Kerja Dan Perluasan Kesempatan Kerja.</p>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-transparent text-center border-b-2 border-gray-300">
                    <tr>
                        <th scope="col" class="px-2 py-7">
                            Nama Lengkap
                        </th>
                        <th scope="col" class="px-2 py-7">
                            Alamat Domisili
                        </th>
                        <th scope="col" class="px-2 py-7">
                            No Ponsel
                        </th>
                        <th scope="col" class="px-2 py-7">
                            Agama
                        </th>
                        <th scope="col" class="px-2 py-7">
                            Pendidikan Terakhir
                        </th>
                        <th scope="col" class="px-2 py-7">
                            Jurusan
                        </th>
                        <th scope="col" class="px-2 py-7">
                            Tanggal Pengambilan Kartu AK1
                        </th>
                        <th scope="col" class="px-2 py-7">
                            Waktu Pengambilan
                        </th>
                        <th scope="col" class="px-2 py-7">
                            Jumlah
                        </th>
                        <th scope="col" class="px-2 py-7">
                            Status
                        </th>
                    </tr>
                </thead>

                <tbody class="text-center">
                    @foreach ($pencakerDataLooping as $data)
                        <tr class="border-b ">
                            <td class="px-2 py-4">
                                {{ $data->NamaLengkap }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $data->AlamatDomisili }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $data->NoTelfon }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $data->Agama }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $data->PendidikanTerakhir }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $data->Jurusan }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $data->TanggalPengambilan }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $data->WaktuPengambilan }}
                            </td>
                            <td class="px-2  w-20 py-4">
                                {{ $data->Total }}
                            </td>
                            <td class="px-4 py-4">
                                @if ($data->Status == 'Ditolak')
                                    <div class="Ditolak bg-red-500 text-slate-50 px-2 py-2 rounded-lg">Ditolak</div>
                                @elseif ($data->Status == 'Terverifikasi')
                                    <div class="Terverifikasi bg-green-500 text-slate-50 px-2 py-2 rounded-lg">
                                        Terverifikasi</div>
                                @elseif ($data->Status == 'BelumTerverifikasi')
                                    <div class="SedangDiproses bg-amber-500 text-slate-50 px-2 py-2 rounded-lg">
                                        Diproses</div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- modaladd --}}
        <div
            class="fixed mt-20 md:mt-0 mobile-menu hidden animate__animated animate__backInDown inset-0 z-50 overflow-y-auto rounded-3xl">
            <div class="md:flex min-h-full items-end justify-center text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="flex min-h-full flex-col justify-center px-6 lg:px-8">
                            <h2 class="mt-3 text-left text-sm tracking-tight text-gray-900 font-semibold">Lengkapi
                                Terlebih Dahulu Data Diri Anda</h2>
                            <div class="mt-10 w-full md:max-w-lg">
                                <form action="{{ route('pencaker.store') }}" method="POST">
                                    @csrf

                                    <div class="mb-4">
                                        <label for="NamaLengkap"
                                            class="block pb-1 text-sm font-medium text-gray-900">Nama Lengkap</label>
                                        <input value="Zulham Abidin" id="NamaLengkap" name="NamaLengkap"
                                            type="text" autocomplete="NamaLengkap" required
                                            class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                                    </div>

                                    <div class="mb-4">
                                        <label for="AlamatDomisili"
                                            class="block text-sm pb-1 font-medium text-gray-900">Alamat
                                            Domisili</label>
                                        <select id="AlamatDomisili" name="AlamatDomisili"
                                            class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                                            <option value="Kota Makassar">Kota Makassar</option>
                                            <option value="Kota Palopo">Kota Palopo</option>
                                            <option value="Kota Parepare">Kota Parepare </option>
                                            <option value="Kabupaten Bantaeng">Kabupaten Bantaeng</option>
                                            <option value="Kabupaten Barru">Kabupaten Barru</option>
                                            <option value="Kabupaten Bone">Kabupaten Bone </option>
                                            <option value="Kabupaten Bulukumba">Kabupaten Bulukumba</option>
                                            <option value="Kabupaten Enrekang">Kabupaten Enrekang </option>
                                            <option value="Kabupaten Gowa">Kabupaten Gowa </option>
                                            <option value="Kabupaten Jeneponto">Kabupaten Jeneponto </option>
                                            <option value="Kabupaten Kepulauan Selayar">Kabupaten Kepulauan Selayar
                                            </option>
                                            <option value="Kabupaten Luwu">Kabupaten Luwu</option>
                                            <option value="Kabupaten Luwu Timur">Kabupaten Luwu Timur </option>
                                            <option value="Kabupaten Luwu Utara">Kabupaten Luwu Utara</option>
                                            <option value="Kabupaten Maros">Kabupaten Maros </option>
                                            <option value="Kabupaten Pangkajene dan Kepulauan" selected>Kabupaten
                                                Pangkajene dan Kepulauan</option>
                                            <option value="Kabupaten Pinrang">Kabupaten Pinrang </option>
                                            <option value="Kabupaten Sidenreng Rappang">Kabupaten Pinrang Rappang
                                            </option>
                                            <option value="Kabupaten Sinjai">Kabupaten Sinjai</option>
                                            <option value="Kabupaten Soppeng">Kabupaten Soppeng </option>
                                            <option value="Kabupaten Takalar">Kabupaten Takalar </option>
                                            <option value="Kabupaten Tana Toraja">Kabupaten Tana Toraja</option>
                                            <option value="Kabupaten Toraja Utara">Kabupaten Toraja Utara </option>
                                            <option value="Kabupaten Wajo">Kabupaten Wajo </option>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="JenisKelamin"
                                            class="block pb-1 text-sm font-medium text-gray-900">Jenis Kelamin</label>
                                        <select id="JenisKelamin" name="JenisKelamin"
                                            class="block w-full px-3 py-2 border capitalize border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                                            <option value="Pria" selected>Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="PendidikanTerakhir"
                                            class="block text-sm pb-1 font-medium text-gray-900">Pendidikan
                                            Terakhir</label>
                                        <select id="PendidikanTerakhir" name="PendidikanTerakhir"
                                            class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                                            <option value="SD / MI">SD</option>
                                            <option value="SMP / MTS">SMP</option>
                                            <option value="SMA / SMK">SMA</option>
                                            <option value="Diploma 3">Dimploma 3</option>
                                            <option value="Diploma">Diploma 4</option>
                                            <option value="Strata 1" selected>Strata 1</option>
                                            <option value="Strata 2">Strata 2</option>
                                            <option value="Strata 3">Strata 3</option>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="NoTelfon" class="block text-sm pb-1 font-medium text-gray-900">No
                                            Ponsel</label>
                                        <input value="0895801138822" id="NoTelfon" name="NoTelfon" type="number"
                                            autocomplete="NoTelfon"
                                            class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                                        @error('NoTelfon')
                                            <span class="invalid-feedback text-red-500" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="Agama"
                                            class="block pb-1 text-sm font-medium text-gray-900">Agama</label>
                                        <input value="Islam" id="Agama" name="Agama" type="text"
                                            autocomplete="Agama" required
                                            class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                                    </div>

                                    <div class="mb-4">
                                        <label for="Jurusan"
                                            class="block text-sm pb-1 font-medium text-gray-900">Jurusan</label>
                                        <input value="Pendidikan Teknik Elektro" id="Jurusan" name="Jurusan"
                                            type="text" autocomplete="Jurusan" required
                                            class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                                    </div>

                                    <div class="mb-4">
                                        <label for="TanggalPengambilan"
                                            class="block text-sm pb-1 font-medium text-gray-900">TanggalPengambilan</label>
                                        <input id="TanggalPengambilan" name="TanggalPengambilan" type="date"
                                            autocomplete="TanggalPengambilan" required
                                            class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                                    </div>

                                    <div class="mb-4">
                                        <label for="WaktuPengambilan"
                                            class="block text-sm pb-1 font-medium text-gray-900">WaktuPengambilan</label>
                                        <select id="WaktuPengambilan" name="WaktuPengambilan"
                                            class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                                            <option value="07:30:00" selected>07:30 - 08:30</option>
                                            <option value="08:30:00">08:30 - 09:30</option>
                                            <option value="09:30:00">09:30 - 10:30</option>
                                            <option value="10:30:00">10:30 - 11:30</option>
                                            <option value="12:30:00">12:30 - 13:30</option>
                                            <option value="13:30:00">13:30 - 14:30</option>
                                            <option value="14:30:00">14:30 - 15:30</option>
                                            <option value="15:30:00">15:30 - 16:30</option>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="Total"
                                            class="block pb-1 text-sm font-medium text-gray-900">Jumat Yang Di SAH
                                            kan</label>
                                        <select id="Total" name="Total"
                                            class="block w-full px-3 py-2 border capitalize border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                                            <option value="">Pilih</option>
                                            <option value="1 Lembar">1 Lembar</option>
                                            <option value="2 Lembar">2 Lembar</option>
                                            <option value="3 Lembar" selected>3 Lembar</option>
                                        </select>
                                        <p class="text-xs pt-1 text-red-500">kami sangat merekomendasikan anda untuk
                                            memilih opsi ke 3</p>
                                    </div>

                                    <div class="flex gap-x-2 mb-10 mt-5">
                                        <button type="button"
                                            class="mobile-menu-close w-full px-3 py-1.5 text-sm font-semibold text-white bg-yellow-500 rounded-md hover:bg-yellow-500 focus:outline-none focus-visible:ring focus-visible:ring-yellow-500 focus-visible:ring-opacity-50">Close</button>
                                        <button type="submit"
                                            class="w-full px-3 py-1.5 text-sm font-semibold text-white bg-indigo-600 rounded-md hover:bg-indigo-500 focus:outline-none focus-visible:ring focus-visible:ring-indigo-500 focus-visible:ring-opacity-50">Submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- sweetalert2 --}}
    <script src="{{ asset('assets/js/alert/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('assets/js/alert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/alert/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/alert/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/navbar.js') }}"></script>

    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Error',
                text: '{{ session('error') }}',
                icon: 'error',
                showConfirmButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.querySelector('.swal2-confirm').style.display = 'none';
                }
            });
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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

        @if (session('success'))
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

    {{-- @if ($pencakerData->contains('Status', 'Ditolak'))
        <script>
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Data Anda telah ditolak. Alasan penolakan: {{ $pencakerData->firstWhere('Status', 'Ditolak')->alasanPZenolakan }}.
                Silakan hubungi administrator untuk informasi lebih lanjut.
                ',
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
    @endif --}}

</body>

</html>
