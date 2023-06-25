<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register</title>
</head>

<body>
    <div class="isolate bg-white sm:py-32 md:py-0 lg:px-8">
        
        <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
            aria-hidden="true">
            <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        
        <div class="mx-auto max-w-2xl text-center mt-6 md:mt-10">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">DAFTAR PESERTA PENGESAHAN</h2>
            <p class="mt-2 text-sm leading-8 text-gray-600 px-10 md:px-0">Dinas Ketenagakerjaan Bidang Penempatan Tenaga Kerja Dan Perluasan Kesempatan Kerja.</p>
        </div>
        
        <form method="POST" class="mx-auto lg:mt-1 max-w-xl sm:py-32 md:py-14 lg:py-7 lg:px-8 px-10" action="{{ route('register.siswa') }}">
         @csrf
            
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">

                <div class="sm:col-span-2">
                    <label for="username" class="block text-sm font-semibold leading-6 text-gray-900">Username</label>
                    <div class="mt-2.5">
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                            class="@error('name') is-invalid @enderror focus:outline-none focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  focus:ring-inset  sm:text-sm sm:leading-6">
                    </div>
                    @error('name')
                    <span class="invalid-feedback text-xs text-red-500" role="alert">
                        <strong>Username Telah Digunakan</strong>
                    </span>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Email</label>
                    <div class="mt-2.5">
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                            class="@error('email') is-invalid @enderror focus:outline-none focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  focus:ring-inset  sm:text-sm sm:leading-6">
                    </div>
                    @error('email')
                    <span class="invalid-feedback text-xs text-red-500" role="alert">
                        <strong>Email Telah Digunakan</strong>
                    </span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold leading-6 text-gray-900">Password</label>
                    <div class="mt-2.5">
                        <input type="password" name="password" id="password" value="{{ old('password') }}" required autofocus
                            class="@error('password') is-invalid @enderror focus:outline-none focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  focus:ring-inset  sm:text-sm sm:leading-6">
                    </div>
                    @error('password')
                    <span class="invalid-feedback text-xs text-red-500" role="alert">
                        <strong>Pastikan Sesuai Dengan Konfirmasi Password</strong>
                    </span>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold leading-6 text-gray-900">Konfirmasi Password</label>
                    <div class="mt-2.5">
                        <input type="password_confirmation" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" required autofocus
                            class="@error('password_confirmation') is-invalid @enderror focus:outline-none focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  focus:ring-inset  sm:text-sm sm:leading-6">
                    </div>
                    @error('password_confirmation')
                    <span class="invalid-feedback text-xs text-red-500" role="alert">
                        <strong>Pastikan Sesuai Dengan Konfirmasi Password</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="sm:col-span-2">
                    <button type="submit"
                        class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                </div>

        </form>
    </div>

</body>

</html>
