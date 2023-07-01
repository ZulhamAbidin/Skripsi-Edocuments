<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/logo-2.png') }}" />
    <title>E-Document</title>
    <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/js/alert/sweetalert2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/js/alert/sweetalert2.min.css') }}" rel="stylesheet" />
    
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/colors/color1.css') }}" />
    <style>
        .typed-cursor {
            display: none !important;
        }


        .section.pb-0 {
            text-align: center !important;
        }
    </style>
</head>

<body class="app ltr landing-page horizontal">
    <div id="global-loader">
        <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            <div class="hor-header header">
                <div class="container main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                            href="javascript:void(0)"></a>
                        <!-- sidebar-toggle-->
                        <a class="logo-horizontal " href="/">
                            <img src="{{ asset('assets/images/brand/logo.png') }}" class="header-brand-img desktop-logo" alt="logo">
                            <img src="{{ asset('assets/images/brand/logo-3.png') }}" class="header-brand-img light-logo1" alt="logo">
                        </a>
                        <!-- LOGO -->
                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                            </button>
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse bg-white px-0" id="navbarSupportedContent-4">
                                    <!-- SEARCH -->
                                    <div class="header-nav-right p-5">

                                        @if (auth()->check())
                                            @if (auth()->user()->role_id == 3)
                                                <a href="/pencaker"
                                                    class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto">Ke
                                                    Dashboard</a>
                                            @elseif(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                                <a href="/dashboard"
                                                    class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto">Dashboard</a>
                                            @endif
                                        @else
                                            <a href="/register"
                                                class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto">Register
                                            </a>
                                            <a href="/login"
                                                class="btn ripple btn-min w-sm btn-primary me-2 my-auto">Login
                                            </a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <!-- /app-Header -->

            <div class="landing-top-header overflow-hidden">
                <div class="top sticky overflow-hidden">
                    <!--APP-SIDEBAR-->
                    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                    <div class="app-sidebar bg-transparent horizontal-main">
                        <div class="container">
                            <div class="row">
                                <div class="main-sidemenu navbar px-0">
                                    <a class="navbar-brand ps-0 d-none d-lg-block" href="#">
                                        <img alt="" class="logo-2" src="{{ asset('assets/images/brand/logo-3.png') }}">
                                        <img src="{{ asset('assets/images/brand/logo.png') }}" class="logo-3" alt="logo">
                                    </a>
                                    <ul class="side-menu">
                                        <li class="slide">
                                            <a class="side-menu__item active" data-bs-toggle="slide"
                                                href="#home"><span class="side-menu__label">Home</span></a>
                                        </li>

                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" href="#Clients"><span
                                                    class="side-menu__label">Testimonials</span></a>
                                        </li>

                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" href="#footer"><span
                                                    class="side-menu__label">About</span></a>
                                        </li>
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" href="#Contact"><span
                                                    class="side-menu__label">Contact</span></a>
                                        </li>
                                    </ul>
                                    <div class="header-nav-right d-none d-lg-flex">
                                        @if (auth()->check())
                                        @if (auth()->user()->role_id == 3)
                                        <a href="/pencaker" class="btn ripple btn-min w-lg mb-3 me-2 btn-primary">Ke
                                            Dashboard</a>
                                        @elseif(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                        <a href="/dashboard" class="btn ripple btn-min w-lg mb-3 me-2 btn-primary">Dashboard</a>
                                        @endif
                                        @else
                                        <a href="/register" class="btn ripple btn-min w-lg mb-3 me-2 btn-primary"><i class="fa fa-lock me-2"></i> Daftar
                                            Sekarang</a>
                                        <a href="/login" class="btn ripple btn-min w-lg btn-outline-primary mb-3 me-2"><i class="fa fa-lock me-2"></i> Login</a>
                                        @endif

                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/APP-SIDEBAR-->
                </div>
                <div class="demo-screen-headline main-demo main-demo-1 spacing-top overflow-hidden reveal"
                    id="home">
                    <div class="container px-sm-0">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 mb-5 pb-5 animation-zidex pos-relative">
                                <h4 class="fw-semibold mt-7">Selamat Datang</h4>
                                <h1 id="typed-text" class="zulham text-start fw-bold text-primary"></h1>
                                <h6 class="pb-3">
                                    Bidang Penempatan Tenaga Kerja Dan Perluasan Kesempatan Kerja Menerbitkan Kartu AK1
                                    atau kartu tanda pencari kerja yang sering disebut dengan kartu kuning. Kartu ini
                                    dikeluarkan
                                    Dinas Ketenagakerjaan atau Disnaker dengan tujuan untuk pendataan para pencari kerja
                                </h6>
                                @if (auth()->check())
                                    @if (auth()->user()->role_id == 3)
                                        <a href="/pencaker" class="btn ripple btn-min w-lg mb-3 me-2 btn-primary">Ke
                                            Dashboard</a>
                                    @elseif(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                        <a href="/dashboard" class="btn ripple btn-min w-lg mb-3 me-2 btn-primary">Dashboard</a>
                                    @endif
                                @else
                                    <a href="/register" class="btn ripple btn-min w-lg mb-3 me-2 btn-primary"><i
                                            class="fa fa-lock me-2"></i> Daftar
                                        Sekarang</a>
                                    <a href="/login" class="btn ripple btn-min w-lg btn-outline-primary mb-3 me-2"><i
                                            class="fa fa-lock me-2"></i> Login</a>
                                @endif
                            </div>
                            <div class="col-xl-6 col-lg-6 my-auto">
                                <img src="{{ asset('image/okk.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--app-content open-->
            <div class="main-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container">

                        <div class="">

                            <!-- ROW-1 OPEN -->
                            <div class="section pb-0">
                                <div class="container">
                                    <div class="row">
                                        <h4 class="text-center fw-semibold">Statistics</h4>
                                        <span class="landing-title"></span>
                                        <h2 class="text-center fw-semibold mb-7">Pengunjung.</h2>
                                    </div>
                                    <div
                                        class="row text-center justify-items-center d-flex justify-content-center services-statistics landing-statistics">
                                        <div class="col-xl-3 col-md-6 col-lg-6">
                                            <div class="card">
                                                <div class="card-body bg-primary-transparent">
                                                    <div class="counter-status">
                                                        <div
                                                            class="counter-icon bg-primary-transparent box-shadow-primary">
                                                            <i class="fe fe-layers text-primary fs-23"></i>
                                                        </div>
                                                        <div class="test-body text-center">
                                                            <h1 class=" mb-0">
                                                                <span
                                                                    class="counter fw-semibold counter ">{{ $totalData }}</span>+
                                                            </h1>
                                                            <div class="counter-text">
                                                                <h5 class="font-weight-normal mb-0 ">Total Pengunjung
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- ROW-1 CLOSED -->

                            <!-- ROW-9 OPEN -->
                            <div class="testimonial-owl-landing section pb-0" id="Clients">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card bg-transparent">
                                                <div class="card-body pt-5">
                                                    <h4 class="text-center fw-semibold text-white-80">Pengalaman
                                                        Pengunjung </h4>
                                                    <span class="landing-title"></span>
                                                    <h2 class="text-center fw-semibold text-white mb-7">bagaimana
                                                        pengalaman pengunjung mengenai pelayanan kami.</h2>
                                                    <div class="testimonial-carousel">

                                                        @foreach ($pengalamanList as $pengalaman)
                                                            <div class="slide text-center">
                                                                <div class="row">
                                                                    <div class="col-xl-8 col-md-12 d-block mx-auto">
                                                                        <div class="testimonia">
                                                                            <p class="text-white-80">
                                                                                <i
                                                                                    class="fa fa-quote-left fs-20 text-white-80"></i>{{ $pengalaman->pengalamanpengunjung }}
                                                                            </p>
                                                                            <h3 class="title">
                                                                                {{ $pengalaman->user->name }}</h3>
                                                                            <div class="rating-stars block my-rating-5 mb-5"
                                                                                data-rating="4"></div>
                                                                            @if (Auth::check() && in_array(Auth::user()->role_id, [1, 2]))
                                                                                <form
                                                                                    action="{{ route('pengalaman.delete', $pengalaman->id) }}"
                                                                                    method="POST"
                                                                                    class="delete-form">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit"
                                                                                        class="delete-btn btn btn-danger">Delete</button>
                                                                                </form>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-image-landing section pb-0" id="Contact">
                                <div class="container">
                                    <div class="">
                                        <div class="card card-shadow reveal">
                                            <h4 class="text-center fw-semibold mt-7">Contact</h4>
                                            <span class="landing-title"></span>
                                            <h2 class="text-center fw-semibold mb-0 px-2">Get in Touch with <span
                                                    class="text-primary">US.</span></h2>
                                            <div class="card-body p-5 pb-6 text-dark">
                                                <div class="statistics-info p-4">
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-9">
                                                            <div class="mt-3">
                                                                <div class="text-dark">
                                                                    <div class="services-statistics reveal my-5">
                                                                        <div class="row text-center">
                                                                            <div class="col-xl-3 col-md-6 col-lg-6">
                                                                                <div class="card">
                                                                                    <div class="card-body p-0">
                                                                                        <div class="counter-status">
                                                                                            <div
                                                                                                class="counter-icon bg-primary-transparent box-shadow-primary">
                                                                                                <i
                                                                                                    class="fe fe-map-pin text-primary fs-23"></i>
                                                                                            </div>
                                                                                            <h4
                                                                                                class="mb-2 fw-semibold">
                                                                                                Alamat</h4>
                                                                                            <p>Jl. A. P. Pettarani
                                                                                                No.72, Banta-Bantaeng,
                                                                                                Kec. Rappocini, Kota
                                                                                                Makassar, Sulawesi
                                                                                                Selatan 90222 </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-3 col-md-6 col-lg-6">
                                                                                <div class="card">
                                                                                    <div class="card-body p-0">
                                                                                        <div class="counter-status">
                                                                                            <div
                                                                                                class="counter-icon bg-secondary-transparent box-shadow-secondary">
                                                                                                <i
                                                                                                    class="fe fe-phone text-secondary fs-23"></i>
                                                                                            </div>
                                                                                            <h4
                                                                                                class="mb-2 fw-semibold">
                                                                                                Phone</h4>
                                                                                            <p class="mb-0">(0411)
                                                                                                853930 </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-3 col-md-6 col-lg-6">
                                                                                <div class="card">
                                                                                    <div class="card-body p-0">
                                                                                        <div class="counter-statuss">
                                                                                            <div
                                                                                                class="counter-icon bg-success-transparent box-shadow-success">
                                                                                                <i
                                                                                                    class="fe fe-mail text-success fs-23"></i>
                                                                                            </div>
                                                                                            <h4
                                                                                                class="mb-2 fw-semibold">
                                                                                                Contact</h4>
                                                                                            <p class="mb-0">
                                                                                                disnaker@makassar.go.id
                                                                                            </p>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-3 col-md-6 col-lg-6">
                                                                                <div class="card">
                                                                                    <div class="card-body p-0">
                                                                                        <div class="counter-status">
                                                                                            <div
                                                                                                class="counter-icon bg-danger-transparent box-shadow-danger">
                                                                                                <i
                                                                                                    class="fe fe-airplay text-danger fs-23"></i>
                                                                                            </div>
                                                                                            <h4
                                                                                                class="mb-2 fw-semibold">
                                                                                                Jam Operasional</h4>
                                                                                            <p class="mb-0">Senin –
                                                                                                Jum’at (08.00 – 16.00
                                                                                                WIB)</p>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-9">
                                                            <div class="">

                                                                <form action="{{ route('welcome.submit') }}"
                                                                    method="POST"
                                                                    class="form-horizontal reveal revealrotate m-t-20">
                                                                    @csrf

                                                                    <div class="form-group">
                                                                        <div class="col-xs-12">
                                                                            <input class="form-control" type="text"
                                                                                name="name" id="name"
                                                                                required=""
                                                                                placeholder="Username*">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-12">
                                                                            <input class="form-control" type="email"
                                                                                name="email" id="name"
                                                                                required="" placeholder="Email*">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-12">
                                                                            <textarea class="form-control" id="pengalamanpengunjung" name="pengalamanpengunjung"
                                                                                placeholder="bagaimana tanggapan anda dengan pelayanan kami ?*" rows="5"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="submit"
                                                                            class="btn btn-primary btn-rounded  waves-effect waves-light">Submit</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- CONTAINER CLOSED-->
                </div>
            </div>
            <!--app-content closed-->
        </div>

        <!-- FOOTER OPEN -->
        <div class="demo-footer" id="footer">
            <div class="container">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="top-footer">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12 col-md-12 reveal revealleft">
                                        <h6>About</h6>
                                        <p>Bidang Penempatan Tenaga Kerja Dan Perluasan Kesempatan Kerja adalah salah
                                            satu bidang di dinas ketenagakerjaan mempunyai tugas pokok dan fungsi
                                            menerbitkan Kartu AK1 atau kartu tanda pencari kerja yang sering disebut
                                            pula dengan kartu kuning. Kartu ini dikeluarkan oleh
                                            lembaga pemerintah, Dinas Ketenagakerjaan atau Disnaker, yang dibuat dengan
                                            tujuan untuk pendataan para pencari kerja.
                                        </p>
                                        <p class="mb-5 mb-lg-2">Website ini adalah salah satu bentuk implementasi dari
                                            pendataan para pencari kerja tersebut
                                        </p>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 col-md-4 reveal revealleft">
                                        <h6>Alur</h6>
                                        <ul class="list-unstyled mb-5 mb-lg-0">
                                            <li><a href="">Register</a></li>
                                            <li><a href="">Login</a></li>
                                            <li><a href="">Dashboard</a></li>
                                            <li><a href="">Ajukan Permintaan Verifikasi Data</a></li>
                                            <li><a href="">*Aprroval Pengajuan</a></li>
                                            <li><a href="">Lanjutkan Tahap Pengesahan</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 col-md-4 reveal revealleft">
                                        <h6>Information</h6>
                                        <ul class="list-unstyled mb-5 mb-lg-0">
                                            <li><a href="">Testimonials</a></li>
                                            <li><a href="">Contact US</a></li>
                                            <li><a href="">About</a></li>
                                            <li><a href="">Services</a></li>
                                            <li><a href="">Footer</a></li>
                                            <li><a href="">Terms and Services</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4 col-sm-12 col-md-4 reveal revealleft">
                                        <div class="">
                                            <a href="#"><img loading="lazy" alt="" class="logo-2 mb-3"
                                                    src="{{ asset('assets/images/brand/logo-3.png') }}"></a>
                                            <a href="#"><img src="{{ asset('assets/images/brand/logo.png') }}"
                                                    class="logo-3" alt="logo"></a>
                                            <p>Website ini adalah salah satu bentuk implementasi dari pendataan para
                                                pencari kerja yang berdomisili kota makassar.</p>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your email"
                                                        aria-label="Example text with button addon"
                                                        aria-describedby="button-addon1">
                                                    <button class="btn btn-primary" type="button"
                                                        id="button-addon2">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-list mt-6">
                                            <button type="button" class="btn btn-icon rounded-pill"><i
                                                    class="fa fa-facebook"></i></button>
                                            <button type="button" class="btn btn-icon rounded-pill"><i
                                                    class="fa fa-youtube"></i></button>
                                            <button type="button" class="btn btn-icon rounded-pill"><i
                                                    class="fa fa-twitter"></i></button>
                                            <button type="button" class="btn btn-icon rounded-pill"><i
                                                    class="fa fa-instagram"></i></button>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <footer class="main-footer px-0 pb-0 text-center">
                                <div class="row ">
                                    <div class="col-md-12 col-sm-12">
                                        Copyright © <span id="year"></span> <a
                                            href="javascript:void(0)">E-Document</a>.
                                        With by <a href="javascript:void(0)"> Zulham Abidin </a> All rights reserved.
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FOOTER CLOSED -->
    </div>

    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <script>
        var typed = new Typed('#typed-text', {
            strings: ['Disnaker Kota Makassar Pengesahan Kartu AK1'],
            typeSpeed: 150,
            backSpeed: 150,
            loop: true
        });
    </script>

    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const deleteForms = document.querySelectorAll('.delete-form');

            deleteForms.forEach((form) => {
                form.addEventListener('submit', (event) => {
                    event.preventDefault();

                    swal({
                        title: 'Are you sure?',
                        text: 'Apakah Anda Yakin Ingin Menghapus Pengalaman Pengguna ?',
                        icon: 'warning',
                        buttons: ['Cancel', 'Delete'],
                        dangerMode: true,
                    }).then((confirmed) => {
                        if (confirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });

        @if (session('success'))
            Swal.fire({
            title: 'Success',
            text: '{{ session('success') }}',
            icon: 'success',
            timer: 3000,
            showConfirmButton: false
            });
        @endif
    </script>

   

    <script src="{{ asset('assets/js/alert/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('assets/js/alert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/alert/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/alert/sweetalert2.min.js') }}"></script>

    <script src="{{ asset('assets/js/typed.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counters/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counters/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counters/counters-1.js') }}"></script>
    <script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/plugins/company-slider/slider.js') }}"></script>
    <script src="{{ asset('assets/plugins/rating/jquery-rate-picker.js') }}"></script>
    <script src="{{ asset('assets/plugins/rating/rating-picker.js') }}"></script>
    <script src="{{ asset('assets/plugins/ratings-2/jquery.star-rating.js') }}"></script>
    <script src="{{ asset('assets/plugins/ratings-2/star-rating.js') }}"></script>
    <script src="{{ asset('assets/js/sticky.js') }}"></script>
    <script src="{{ asset('assets/js/landing.js') }}"></script>

</body>

</html>
