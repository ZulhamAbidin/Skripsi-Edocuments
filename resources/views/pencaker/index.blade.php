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

        <header class="absolute inset-x-0 top-0 z-40">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">

                <div class="flex lg:flex-1">
                    <a href="" class="-m-1.5 p-1.5">
                        <img src="{{ asset('assets/images/brand/logo-3.png') }}" class="h-8 w-auto" alt="logo">
                    </a>
                </div>

                <div class="flex gap-x-6">
                    <a href="/profile" class="rounded-md mobile-menu-button bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
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
                        bidang penempatan tenaga kerja dan perluasan kesempatan kerja, Dinas ketenagakerjaan kota
                        makassar.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">

                        @if ($pencakerDataButton->isEmpty() && $pencakerData->isEmpty())
                        <button type="button"
                            class="rounded-md mobile-menu-button bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Lengkapi
                            Data Anda →</button>
                        @elseif ($pencakerDataButton->isNotEmpty() && $pencakerData->isEmpty())
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


            

                <div class="relative overflow-x-auto mt-10 mx-4 lg:mx-64">
                    @foreach ($pencakerData as $data)


                @if ($data->Status == 'Ditolak')
                <div class="bg-red-100 border my-10 border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Maaf!</strong>
                    <span class="block sm:inline">Data Anda telah ditolak.</span>
                    <span class="block sm:inline capitalize">Dengan Alasan {{ $data->alasan_penolakan }} Hapus Data Anda Dan Lengkapi
                        Kembali Data Anda.</span>
                </div>
                @elseif ($data->Status == 'Terverifikasi')
                <div class="bg-green-100 border my-10 border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Selamat!</strong>
                    <span class="block sm:inline">Data Anda telah diverifikasi.</span>
                    <span class="block sm:inline">Silakan ke admin untuk melanjutkan hasil Pengesahan.</span>
                </div>
                @endif

               @if (session('error'))
            <div class="bg-red-100 border my-10 border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
            @endif
            

            
                        <div>
                            <div class="px-4 sm:px-0 flex justify-between">
                                
                                <div class="">
                                    
                                    <h3 class="text-base font-semibold leading-7 text-gray-900">Data Diri Anda</h3>
                                    <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Peserta Pengesahan Kartu AK1 .</p>
                                </div>
                                <div class="pt-2">

                                    <form action="{{ route('pencaker.destroy', $data->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="rounded-md bg-red-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 delete-button">Hapus</button>
                                    </form>
                                     </div>
                                
                                

                            </div>
                            <div class="mt-6 border-t border-gray-100">
                                <dl class="divide-y divide-gray-100">
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">NIK</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $data->NIK }}
                                        </dd>
                                    </div>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Nama Lengkap</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            {{ $data->NamaLengkap }}</dd>
                                    </div>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Alamat Domisili</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            {{ $data->AlamatDomisili }}</dd>
                                    </div>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Jenis Kelamin</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            {{ $data->JenisKelamin }}</dd>
                                    </div>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Jurusan</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            {{ $data->Jurusan }}</dd>
                                    </div>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Tanggal Pengesahan</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            {{ $data->TanggalPengesahan }}</dd>
                                    </div>
                                </dl>

                            </div>
                        </div>

                        
                    </div>
                @endforeach
        </div>

        <div class="fixed mt-20 md:mt-0 mobile-menu hidden animate__animated animate__backInDown inset-0 z-50 overflow-y-auto rounded-3xl">
            <div class="md:flex min-h-full items-end justify-center text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="flex min-h-full flex-col justify-center px-6 lg:px-8">
                            <h2 class="mt-3 text-left text-sm tracking-tight text-gray-900 font-semibold">Lengkapi
                                Terlebih
                                Dahulu Data Diri Anda</h2>


                            <div class="mt-10 w-full md:max-w-lg">
                                <form action="{{ route('pencaker.store') }}" method="POST">

                                    @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                    @endif
                                    
                                    @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                    @csrf
                                    <div class="mb-4">
                                        <label for="NIK" class="block text-sm pb-1 font-medium text-gray-900">NIK</label>
                                        <input id="NIK" name="NIK" type="number" autocomplete="NIK" required class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
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
                                            <option value="Kabupaten Kepulauan Selayar">Kabupaten Kepulauan Selayar</option>
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
                                        <select id="JenisKelamin" name="JenisKelamin" class="block w-full px-3 py-2 border capitalize border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                                            <option value="PRIA">Pria</option>
                                            <option value="WANITA">Wanita</option>
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
                                        <input id="Jurusan" name="Jurusan" type="text" autocomplete="Jurusan" required class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                                    </div>

                                    <div class="flex gap-x-2 mb-10 mt-5">
                                        <button type="button" class="mobile-menu-close w-full px-3 py-1.5 text-sm font-semibold text-white bg-yellow-500 rounded-md hover:bg-yellow-500 focus:outline-none focus-visible:ring focus-visible:ring-yellow-500 focus-visible:ring-opacity-50">Close
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
            text: 'Data Anda telah ditolak. Alasan penolakan: {{ $pencakerData->firstWhere("Status", "Ditolak")->alasanpenolakan }}.
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
