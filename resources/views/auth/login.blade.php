<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/logo-2.png') }}" />
</head>

<body>
    <div class="isolate bg-white sm:py-3 md:py-0 lg:px-8">
        
            <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
                aria-hidden="true">
                <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        
            <div class="mx-auto max-w-xl text-center mt-6 md:mt-10">
                <h2 class="text-2xl md:text-3xl font-bold tracking-tight text-gray-900">LOGIN PESERTA</h2>
                <p class="mt-2 text-sm leading-8 text-gray-600 px-10 md:px-0 lg:px-10">Dinas Ketenagakerjaan Bidang Penempatan
                    Tenaga Kerja Dan Perluasan Kesempatan Kerja.</p>
            </div>

        <form method="POST" action="{{ route('login') }}"
            class="mx-auto lg:mt-1 max-w-lg sm:py-32 md:py-14 lg:py-7 lg:px-8 px-10">
            @csrf

            @if ($errors->has('email'))
            <div class="fixed top-0 left-0 bg-red-200 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                <p class="font-bold">Perhatian!</p>
                <p class="text-sm">Username Atau Password Tidak Sesuai</p>
            </div>
            @endif

            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">

                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Email</label>
                    <div class="mt-2.5">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            autocomplete="username"
                            class="focus:outline-none focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  focus:ring-inset  sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="password" class="block text-sm font-semibold leading-6 text-gray-900">Password</label>
                    <div class="mt-2.5 relative">
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="focus:outline-none focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  focus:ring-inset  sm:text-sm sm:leading-6">
                        <button type="button" onclick="togglePasswordVisibility()"
                            class="absolute top-2 right-2 text-gray-500 focus:outline-none">
                            <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="h-6 w-6">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                    d="M2 12s2-2 5-2 5 2 5 2 2 3.5 2 6.5-2 6.5-2 6.5-5 2-5 2-2-3.5-2-6.5 2-6.5 2-6.5-2-6.5-2-6.5zM15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    @if ($errors->has('password'))
                    <span>{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="sm:col-span-2">
                    <button type="submit"
                        class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                </div>

        </form>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('text-gray-500');
                eyeIcon.classList.add('text-indigo-600');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('text-indigo-600');
                eyeIcon.classList.add('text-gray-500');
            }
        }
    </script>

</body>

</html>