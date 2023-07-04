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
                    <p class="mt-6 text-lg capitalize leading-8 text-gray-600"> bidang penempatan tenaga kerja dan perluasan kesempatan kerja, Dinas ketenagakerjaan kota makassar.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <button type="button"  class="rounded-md mobile-menu-button bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Tambah Data Pengesahan</button>
                        @if ($pencakerDataButton->isNotEmpty() && $pencakerData->isEmpty())
                            <button type="button"
                                class="rounded-md bg-yellow-400 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-yellow-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-400">Harap
                                tunggu, data Anda dalam tahap verifikasi</button>
                        @elseif ($status == 'Terverifikasi')
                            <button type="button"
                                class="rounded-md bg-green-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-500">Data
                                Anda telah terverifikasi</button>
                        @endif
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

        {{-- terbaru --}}
        <div class="relative overflow-x-auto mt-10 mx-4 lg:mx-64">

            @if (!$pencakerDataLooping->isEmpty() && $pencakerDataLooping->first()->Status == 'Ditolak')
                <div class="bg-red-100 border my-10 border-red-400 text-red-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">Maaf!</strong>
                    <span class="block sm:inline">Data Anda telah ditolak.</span>
                    <span class="block sm:inline capitalize">Dengan Alasan
                        {{ $pencakerDataLooping->first()->alasan_penolakan }} Silahkan Mengajukan Kembali</span>
                </div>
            @endif

        </div>


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
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg md:mx-10 px-4 lg:mx-6 mb-96">
            <table class="w-full text-sm text-left text-gray-500">
                <caption class="p-5 text-lg font-semibold text-left text-gray-900"> History Pengesahan
                    <p class="mt-1 text-sm font-normal text-gray-500 ">History Pengesahan Kartu AK1 BIdang Penempatan
                        Tenaga Kerja Dan Perluasan Kesempatan Kerja.</p>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-transparent text-center">
                    <tr>
                        <th scope="col" class="px-2 py-7">
                            NIK
                        </th>
                        <th scope="col" class="px-2 py-7">
                            Nama Lengkap
                        </th>
                        <th scope="col" class="px-2 py-7">
                            Alamat Domisili
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
                                {{ $data->NIK }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $data->NamaLengkap }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $data->AlamatDomisili }}
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
                            <td class="px-2 py-4">
                                {{ $data->Total }}
                            </td>
                            <td class="px-4 py-4">
                                @if ($data->Status == 'Ditolak')
                                    <div class="Ditolak bg-red-500 text-slate-50 px-2 py-2 rounded-lg">Ditolak</div>
                                @elseif ($data->Status == 'Terverifikasi')
                                    <div class="Terverifikasi bg-indigo-500 text-slate-50 px-2 py-2 rounded-lg">
                                        Terverifikasi</div>
                                @elseif ($data->Status == 'BelumTerverifikasi')
                                    <div class="SedangDiproses bg-yellow-400 text-slate-50 px-2 py-2 rounded-lg">
                                        Diproses</div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- modaladd --}}
        {{-- <div class="fixed mt-20 md:mt-0 mobile-menu hidden animate__animated animate__backInDown inset-0 z-50 overflow-y-auto rounded-3xl">
                <div class="md:flex min-h-full items-end justify-center text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="flex min-h-full flex-col justify-center px-6 lg:px-8">
                                <h2 class="mt-3 text-left text-sm tracking-tight text-gray-900 font-semibold">Lengkapi Terlebih  Dahulu Data Diri Anda</h2>
                                <div class="mt-10 w-full md:max-w-lg">
                                    <form method="POST" action="{{ route('pencaker.store') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="NIK">NIK</label>
                                            <input id="NIK" type="text"
                                                class="form-control @error('NIK') is-invalid @enderror" name="NIK"
                                                value="{{ old('NIK') }}" required autocomplete="NIK" autofocus>
                                            @error('NIK')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="NamaLengkap">Nama Lengkap</label>
                                            <input id="NamaLengkap" type="text"
                                                class="form-control @error('NamaLengkap') is-invalid @enderror"
                                                name="NamaLengkap" value="{{ old('NamaLengkap') }}" required
                                                autocomplete="NamaLengkap">
                                            @error('NamaLengkap')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="AlamatDomisili">Alamat Domisili</label>
                                            <input id="AlamatDomisili" type="text"
                                                class="form-control @error('AlamatDomisili') is-invalid @enderror"
                                                name="AlamatDomisili" value="{{ old('AlamatDomisili') }}" required
                                                autocomplete="AlamatDomisili">
                                            @error('AlamatDomisili')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="JenisKelamin">Jenis Kelamin</label>
                                            <select id="JenisKelamin"
                                                class="form-control @error('JenisKelamin') is-invalid @enderror"
                                                name="JenisKelamin" required autocomplete="JenisKelamin">
                                                <option value="Laki-laki"  {{ old('JenisKelamin') == 'Laki-laki' ? 'selected' : '' }}>  Laki-laki</option>
                                                <option value="Perempuan" {{ old('JenisKelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan  </option>
                                            </select>
                                            @error('JenisKelamin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="PendidikanTerakhir">Pendidikan Terakhir</label>
                                            <input id="PendidikanTerakhir" type="text"
                                                class="form-control @error('PendidikanTerakhir') is-invalid @enderror"
                                                name="PendidikanTerakhir" value="{{ old('PendidikanTerakhir') }}"
                                                required autocomplete="PendidikanTerakhir">
                                            @error('PendidikanTerakhir')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="Jurusan">Jurusan</label>
                                            <input id="Jurusan" type="text"
                                                class="form-control @error('Jurusan') is-invalid @enderror" name="Jurusan"
                                                value="{{ old('Jurusan') }}" required autocomplete="Jurusan">
                                            @error('Jurusan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="TanggalPengambilan">Tanggal Pengambilan</label>
                                            <input id="TanggalPengambilan" type="date"
                                                class="form-control @error('TanggalPengambilan') is-invalid @enderror"
                                                name="TanggalPengambilan" value="{{ old('TanggalPengambilan') }}"
                                                required>
                                            @error('TanggalPengambilan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="WaktuPengambilan">Waktu Pengambilan</label>
                                            <select id="WaktuPengambilan"
                                                class="form-control @error('WaktuPengambilan') is-invalid @enderror"
                                                name="WaktuPengambilan" required>
                                                <option value="">Pilih Waktu</option>
                                                <option value="22:00:00">Now</option>
                                                <option value="07:30:00">07:30 - 08:30</option>
                                                <option value="08:30:00">08:30 - 09:30</option>
                                                <option value="09:30:00">09:30 - 10:30</option>
                                                <option value="10:30:00">10:30 - 11:30</option>
                                            </select>
                                            @error('WaktuPengambilan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="Total">Jumlah Yang Disahkan</label>
                                            <input id="Total" type="text" class="form-control @error('Total') is-invalid @enderror" name="Total"
                                                value="{{ old('Total') }}" required autocomplete="Total" autofocus>
                                            @error('Total')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
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
            </div> --}}

        <div  class="fixed mt-20 md:mt-0 mobile-menu hidden animate__animated animate__backInDown inset-0 z-50 overflow-y-auto rounded-3xl">
            <div class="md:flex min-h-full items-end justify-center text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="flex min-h-full flex-col justify-center px-6 lg:px-8">
                            <h2 class="mt-3 text-left text-sm tracking-tight text-gray-900 font-semibold">Lengkapi Terlebih Dahulu Data Diri Anda</h2>
                                <div class="mt-10 w-full md:max-w-lg">
                                    <form action="{{ route('pencaker.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-4">
                                            <label for="NIK" class="block text-sm pb-1 font-medium text-gray-900">NIK</label>
                                            <input id="NIK" name="NIK" type="number" autocomplete="NIK" required class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                                                @error('NIK')
                                                    <span class="invalid-feedback text-red-500" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror 
                                        </div>

                                        <div class="mb-4">
                                            <label for="NamaLengkap" class="block pb-1 text-sm font-medium text-gray-900">Nama Lengkap</label>
                                            <input id="NamaLengkap" name="NamaLengkap" type="text" autocomplete="NamaLengkap" required class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                                            
                                        </div>

                                        <div class="mb-4">
                                            <label for="AlamatDomisili" class="block text-sm pb-1 font-medium text-gray-900">Alamat Domisili</label>
                                            <select id="AlamatDomisili" name="AlamatDomisili" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
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
                                                <option value="Kabupaten Kepulauan Selayar">Kabupaten Kepulauan Selayar </option>
                                                <option value="Kabupaten Luwu">Kabupaten Luwu</option>
                                                <option value="Kabupaten Luwu Timur">Kabupaten Luwu Timur </option>
                                                <option value="Kabupaten Luwu Utara">Kabupaten Luwu Utara</option>
                                                <option value="Kabupaten Maros">Kabupaten Maros </option>
                                                <option value="Kabupaten Pangkajene dan Kepulauan">Kabupaten Pangkajene dan Kepulauan</option>
                                                <option value="Kabupaten Pinrang">Kabupaten Pinrang </option>
                                                <option value="Kabupaten Sidenreng Rappang">Kabupaten Pinrang Rappang</option>
                                                <option value="Kabupaten Sinjai">Kabupaten Sinjai</option>
                                                <option value="Kabupaten Soppeng">Kabupaten Soppeng </option>
                                                <option value="Kabupaten Takalar">Kabupaten Takalar </option>
                                                <option value="Kabupaten Tana Toraja">Kabupaten Tana Toraja</option>
                                                <option value="Kabupaten Toraja Utara">Kabupaten Toraja Utara </option>
                                                <option value="Kabupaten Wajo">Kabupaten Wajo </option>
                                            </select>
                                        </div>

                                        <div class="mb-4">
                                            <label for="JenisKelamin" class="block pb-1 text-sm font-medium text-gray-900">Jenis Kelamin</label>
                                            <select id="JenisKelamin" name="JenisKelamin"  class="block w-full px-3 py-2 border capitalize border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                                                <option value="Pria">Pria</option>
                                                <option value="Wanita">Wanita</option>
                                            </select>
                                        </div>

                                        <div class="mb-4">
                                            <label for="PendidikanTerakhir" class="block text-sm pb-1 font-medium text-gray-900">Pendidikan Terakhir</label>
                                            <select id="PendidikanTerakhir" name="PendidikanTerakhir" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                                                <option value="SD / MI">SD</option>
                                                <option value="SMP / MTS">SMP</option>
                                                <option value="SMA / SMK">SMA</option>
                                                <option value="Diploma 3">Dimploma 3</option>
                                                <option value="Diploma">Diploma 4</option>
                                                <option value="Strata 1">Strata 1</option>
                                                <option value="Strata 2">Strata 2</option>
                                                <option value="Strata 3">Strata 3</option>
                                            </select>
                                        </div>

                                        <div class="mb-4">
                                            <label for="Jurusan" class="block text-sm pb-1 font-medium text-gray-900">Jurusan</label>
                                            <input id="Jurusan" name="Jurusan" type="text" autocomplete="Jurusan" required  class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                                        </div>

                                        <div class="mb-4">
                                            <label for="TanggalPengambilan" class="block text-sm pb-1 font-medium text-gray-900">TanggalPengambilan</label>
                                            <input id="TanggalPengambilan" name="TanggalPengambilan" type="date" autocomplete="TanggalPengambilan" required class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                                        </div>

                                        <div class="mb-4">
                                            <label for="WaktuPengambilan" class="block text-sm pb-1 font-medium text-gray-900">WaktuPengambilan</label>
                                            <select id="WaktuPengambilan" name="WaktuPengambilan" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                                                <option value="07:30:00">07:30 - 08:30</option>
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
                                            <label for="Total" class="block pb-1 text-sm font-medium text-gray-900">Jumat Yang Di SAH kan</label>
                                            <select id="Total" name="Total" class="block w-full px-3 py-2 border capitalize border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                                                <option value="">Pilih</option>
                                                <option value="1 Lembar">1 Lembar</option>
                                                <option value="2 Lembar">2 Lembar</option>
                                                <option value="3 Lembar">3 Lembar</option>
                                            </select>
                                            <p class="text-xs pt-1 text-red-500">kami sangat merekomendasikan anda untuk memilih opsi ke 3</p>
                                        </div>

                                        <div class="flex gap-x-2 mb-10 mt-5">
                                            <button type="button"
                                                class="mobile-menu-close w-full px-3 py-1.5 text-sm font-semibold text-white bg-yellow-500 rounded-md hover:bg-yellow-500 focus:outline-none focus-visible:ring focus-visible:ring-yellow-500 focus-visible:ring-opacity-50">Close</button>
                                            <button type="submit" class="w-full px-3 py-1.5 text-sm font-semibold text-white bg-indigo-600 rounded-md hover:bg-indigo-500 focus:outline-none focus-visible:ring focus-visible:ring-indigo-500 focus-visible:ring-opacity-50">Submit</button>
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

    @if ($pencakerData->contains('Status', 'Ditolak'))
        <script>
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Data Anda telah ditolak. Alasan penolakan: {{ $pencakerData->firstWhere('Status', 'Ditolak')->alasanpenolakan }}.
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
    @endif

</body>

</html>
