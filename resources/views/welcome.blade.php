<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .typed-cursor {
            display: none !important;
        }
    </style>
</head>

<body>
    <div class="bg-white">

        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only"></span>
                        <img class="h-8 w-auto" src="{{ asset('assets/images/brand/logo-3.png') }}" alt="">
                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button type="button"
                        class="mobile-menu-button -m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="#Home" class="text-sm font-semibold leading-6 text-gray-900">Home</a>
                    <a href="#Experience" class="text-sm font-semibold leading-6 text-gray-900">Masukan</a>
                    <a href="#Contact" class="text-sm font-semibold leading-6 text-gray-900">Contact</a>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <a href="/login"
                        class="{{ auth()->check() ? 'hidden' : '' }} rounded-md flex bg-indigo-500 px-3.5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                        </span>Login
                    </a>
                </div>
            </nav>

            <!-- Mobile menu, show/hide based on menu open state. -->
            <div class="mobile-menu hidden lg:hidden" role="dialog" aria-modal="true">

                <div
                    class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                    <div class="flex items-center justify-between">

                        <a href="" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                            <img class="h-8 w-auto" src="{{ asset('assets/images/brand/logo-3.png') }}" alt="">
                        </a>
                        <button type="button" class="-m-2.5 mobile-menu-close rounded-md p-2.5 text-gray-700">
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-500/10">

                            <div class="space-y-2 py-6">
                                <a
                                    href="#/"class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-indigo-500 hover:text-slate-50">Home</a>
                                <a href="#Experience"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-indigo-500 hover:text-slate-50">Masukan<a>
                                        <a href="#Contact"
                                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-indigo-500 hover:text-slate-50">Contact</a>
                                        <a href="/login"
                                            class="{{ auth()->check() ? 'hidden' : '' }} -mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-indigo-500 hover:text-slate-50 ">Login</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section id="1">
            <div class="relative z-40 isolate px-6 lg:px-8 mt-24 md:mt-36">

                <div class="absolute inset-x-0 -top-40 -z-40 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                    aria-hidden="true">
                    <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                    </div>
                </div>

                <div class="mx-auto grid grid-cols-7 my-6 md:my-10 px-4 gap-x-8  ">

                    <div class="col-span-7 md:col-span-4 text-left">
                        <h1 id="typed-text" class="zulham text-start fw-bold text-indigo-500 font-bold text-3xl"></h1>
                        <p class="mt-4 text-sm leading-8 text-gray-600 text-justify">Bidang Penempatan Tenaga Kerja
                            Dan Perluasan Kesempatan Kerja Menerbitkan Kartu AK1 atau kartu tanda pencari kerja yang
                            sering disebut dengan kartu kuning. Kartu ini dikeluarkan Dinas Ketenagakerjaan atau
                            Disnaker dengan tujuan untuk pendataan para pencari kerja.</p>
                        <div class="mt-5 flex items-center md:justify-start gap-x-6">
                            @if (auth()->check())
                                @if (auth()->user()->role_id == 3)
                                    <a href="/pencaker"
                                        class="rounded-md flex bg-indigo-500 px-3.5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                        Dashboard
                                    </a>
                                @elseif(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                    <a href="/dashboard"
                                        class="rounded-md flex bg-indigo-500 px-3.5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                        Dashboard
                                    </a>
                                @endif
                            @else
                                <a href="/register"
                                    class="rounded-md flex bg-indigo-500 px-3.5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><span><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                        </svg></span>Daftar Sekarang </a>
                                <a href="/login"
                                    class="text-xs font-semibold leading-6 text-gray-900 border rounded-lg px-10 py-1.5 hover:bg-indigo-500 hover:text-white border-gray-300">Login
                                    <span aria-hidden="true">→</span></a>
                            @endif
                        </div>

                    </div>

                    <div class="col-span-7 md:col-span-3 pt-10 md:flex md:pt-2 md:pl-12">
                        <div class="transparent">
                            <img class="object-cover rounded-lg" src="{{ asset('image/ok.webp') }}">
                        </div>
                    </div>

                </div>



                {{-- <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                    aria-hidden="true">
                    <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                    </div>
                </div> --}}

                <hr class="mt-3 bg-gray-700">
            </div>
        </section>

        <section class="mx-4" id="Experience">

            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <div class="relative h-56 overflow-hidden rounded-lg">

                    @foreach ($pengalamanList as $pengalaman)
                        <div class="hidden duration-700 ease-in-out gap-y-6 mt-10 pt-4 w-full px-4 md:px-64" data-carousel-item>

                            <div class="flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#3B82F6" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 mr-1 w-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                </svg>
                                <p class="text-sm font-semibold leading-6 text-gray-900 text-center pb-2">{{ $pengalaman->user->name }}</p>
                            </div>

                            <p class="mt-1 text-xs text-wrap leading-5 text-gray-500 text-center"> {{ $pengalaman->pengalamanpengunjung }}</p>
                            
                            @if (Auth::check() && in_array(Auth::user()->role_id, [1, 2]))
                                <form action="{{ route('pengalaman.delete', $pengalaman->id) }}" method="POST" class="delete-form flex justify-center pt-6">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-md delete-btn delete-form flex bg-red-500 px-3.5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Delete</button>
                                </form>
                            @endif

                        </div>
                    @endforeach

                </div>
            </div>

            <hr class="z-50 mt-3 bg-gray-700">

        </section>

        <section class="mx-4" id="Contact">

            <div class="absolute bottom-0 inset-x-0  -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>

            <div class="grid grid-cols-4 pt-10 gap-x-10 gap-y-8 md:max-w-6xl mx-auto ">

                <div class="col-span-4 md:col-span-1  rounded-xl text-gray-800">
                    <div class="w-16 h-16 flex mx-auto rounded-xl mb-3 bg-[#F0EFFF] text-[#6C5FFC]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 mx-auto" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                    </div>
                    <p class="text-sm md:text-sm font-semibold  leading-6 text-gray-900 text-center pb-2">Alamat
                    </p>
                    <p class="text-xs text-wrap leading-5 px-14 md:px-0 text-gray-500 text-center">Jl. A. P.
                        Pettarani No.72, Banta-Bantaeng, Kec. Rappocini, Kota Makassar, Sulawesi Selatan 90222</p>
                </div>

                <div class="col-span-4 md:col-span-1 rounded-xl text-gray-800">
                    <div class="w-16 h-16 flex mx-auto rounded-xl mb-3 bg-[#F0EFFF] text-[#6C5FFC]">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 mx-auto" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>

                    </div>
                    <p class="text-sm md:text-sm font-semibold  leading-6 text-gray-900 text-center pb-2">Phone</p>
                    <p class="text-xs text-wrap leading-5 px-14 md:px-0 text-gray-500 text-center">(0411) 853930
                    </p>
                </div>

                <div class="col-span-4 md:col-span-1  rounded-xl text-gray-800">
                    <div class="w-16 h-16 flex mx-auto rounded-xl mb-3 bg-[#F0EFFF] text-[#6C5FFC]">
                        <svg class="w-6 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>

                    </div>
                    <p class="text-sm md:text-sm font-semibold leading-6 text-gray-900 text-center pb-2">Contact
                    </p>
                    <p class="text-xs text-wrap leading-5 px-14 md:px-0 text-gray-500 text-center">
                        disnaker@makassar.go.id</p>
                </div>

                <div class="col-span-4 md:col-span-1  rounded-xl text-gray-800">
                    <div class="w-16 h-16 flex mx-auto rounded-xl mb-3 bg-[#F0EFFF] text-[#6C5FFC]">
                        <svg class="w-7 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                    </div>
                    <p class="text-sm md:text-sm font-semibold leading-6 text-gray-900 text-center pb-2">Jam
                        Operasional</p>
                    <p class="text-xs text-wrap leading-5 px-14 md:px-0 text-gray-500 text-center">Senin – Jum’at
                        (08.00 – 16.00 WIB)</p>
                </div>

            </div>

            <hr class="z-50 mt-10 bg-gray-700">

        </section>

        <section class="mx-4" id="4">
            <div class="isolate bg-white px-6 py-24 pb-5 lg:px-8">
                <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
                    aria-hidden="true">
                    <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                    </div>
                </div>
                <div class="mx-auto max-w-2xl text-center">
                    <h2 class="text-xl font-semibold tracking-tight text-gray-900 md:text-3xl">Kotak Saran Dan Masukan
                    </h2>
                    <p class="mt-2 text-sm  text-gray-600 text-wrap leading-5 capitalize text-center">
                        Saran dan Masukan mengenai pelayan kami</p>
                </div>

                <form action="{{ route('welcome.submit') }}" method="POST" class="mx-auto mt-6 md:20 max-w-xl ">
                    @csrf
                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">

                        <div class="sm:col-span-2">
                            <label for="text"
                                class="block text-xs md:text-sm font-semibold leading-6 text-gray-900">Username</label>
                            <div class="mt-2.5">
                                <input type="text" name="name" id="name" autocomplete="name"
                                    class="block w-full text-xs rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="email"
                                class="block text-xs md:text-sm font-semibold leading-6 text-gray-900">Email</label>
                            <div class="mt-2.5">
                                <input type="email" name="email" id="email" autocomplete="email"
                                    class="block w-full text-xs rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="message"
                                class="block text-xs md:text-sm font-semibold leading-6 text-gray-900">Message</label>
                            <div class="mt-2.5">
                                <textarea name="pengalamanpengunjung" id="message" rows="4"
                                    class="block w-full text-xs rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:leading-6"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="mt-5">
                        <button type="submit"
                            class="block w-full text-xs rounded-md bg-indigo-600 px-3.5 py-2.5 text-center  font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Let's
                            Submit</button>
                    </div>
                </form>
            </div>

        </section>

        <footer class="bg-white rounded-lg shadow ">
            <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
                <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
                <span class="block text-sm text-gray-500 sm:text-center ">© 2023 <a href=""
                        class="hover:underline">Zulham Abidin & Edocuments</a>. All Rights Reserved.</span>
            </div>
        </footer>

    </div>

    <script src="{{ asset('assets/js/alert/sweetalert2.all.min.js') }}"></script>
    <link href="{{ asset('assets/js/alert/sweetalert2.min.css') }}" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12/lib/typed.min.js"></script>
    <script src="{{ asset('assets/navbar.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const deleteForms = document.querySelectorAll('.delete-form');
    
            deleteForms.forEach((form) => {
                form.addEventListener('submit', (event) => {
                    event.preventDefault();
    
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Apakah Anda Yakin Ingin Menghapus Saran Dan Masukan?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Delete',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    
        @if(session('success'))
            Swal.fire({
                title: 'Success',
                text: '{{ session('success') }}',
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        @if(session('error'))
        Swal.fire({
        title: 'Error',
        text: '{{ session('error') }}',
        icon: 'error',
        timer: 3000,
        showConfirmButton: false
        });
        @endif
    
    </script>

</body>

</html>
