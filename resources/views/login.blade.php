<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>{{__('users.Penyimpanan Senjata Otomatis')}} - Automation Weapon Rack</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    <header id="header" class="header fixed-top">
        <div class="navbar navbar-light bg-light shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <img src="assets/img/stas-rg_logo-removebg-preview.png" alt="Logo" width="90px">
                </a>

                <div class="d-flex align-items-center">
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ app()->getLocale() == 'id' ? 'Bahasa Indonesia' : 'English' }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route('setlocale', ['locale' => 'id']) }}">Bahasa Indonesia</a></li>
                            <li><a class="dropdown-item" href="{{ route('setlocale', ['locale' => 'en']) }}">English</a></li>
                        </ul>
                    </div>
                </div>
            </div>
    </header>

    <main id="main">
        

        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">{{ __('users.Penyimpanan Senjata Otomatis') }}</h1>
                    <p class="lead text-body-secondary">
                        {{__('users.Deskripsi')}}
                    </p>
                    <p>

                        <button type="button" class="button" data-bs-toggle="modal"
                            data-bs-target="#verticalycentered">
                            {{ __('users.Mulai')}}
                            <div class="hoverEffect">
                                <div>
                                </div>
                            </div>
                        </button>

                    <div class="modal fade" id="verticalycentered" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ __('users.Mulai')}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('login') }}" method="POST" class="row g-3 needs-validation" novalidate>
                                        @csrf
                                        <div class="col-12">
                                            <label for="name" class="form-label">{{__('users.Masukan_username')}}</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="Password" class="form-label">{{__('users.Masukan_Password')}}</label>
                                            <input type="password" name="password" class="form-control"
                                                id="password" required>
                                        </div>

                                        <div class="modal-footer">
                                            <div class="col-12">
                                                <!-- <p class="small mb-0">Akun tidak terdaftar? <a href="registrasi.php">Daftarkan sebuah akun</a></p> -->
                                            </div>
                                            <button type="submit">
                                                {{ __('users.Masuk')}}
                                                <div class="star-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                                        version="1.1"
                                                        style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                                        viewBox="0 0 784.11 815.53"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <defs></defs>
                                                        <g id="Layer_x0020_1">
                                                            <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                                                            <path class="fil0"
                                                                d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="star-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                                        version="1.1"
                                                        style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                                        viewBox="0 0 784.11 815.53"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <defs></defs>
                                                        <g id="Layer_x0020_1">
                                                            <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                                                            <path class="fil0"
                                                                d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="star-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                                        version="1.1"
                                                        style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                                        viewBox="0 0 784.11 815.53"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <defs></defs>
                                                        <g id="Layer_x0020_1">
                                                            <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                                                            <path class="fil0"
                                                                d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="star-4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                                        version="1.1"
                                                        style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                                        viewBox="0 0 784.11 815.53"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <defs></defs>
                                                        <g id="Layer_x0020_1">
                                                            <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                                                            <path class="fil0"
                                                                d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="star-5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                                        version="1.1"
                                                        style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                                        viewBox="0 0 784.11 815.53"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <defs></defs>
                                                        <g id="Layer_x0020_1">
                                                            <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                                                            <path class="fil0"
                                                                d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="star-6">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                                        version="1.1"
                                                        style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                                        viewBox="0 0 784.11 815.53"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <defs></defs>
                                                        <g id="Layer_x0020_1">
                                                            <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                                                            <path class="fil0"
                                                                d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        </p>
                    </div>
                </div>
        </section>

        @if (Session('status'))
            <div class="alert alert-danger">
                {{ Session()->get('message') }}
            </div>
        @endif
        <div class="album py-5 justify-between-content border-top">
            <div class="container">
                <h1 class="mb-3 text-black my-10" style="font-weight: bold;">Dokumentasi Weapon Rack</h1>

                <div class="my-5"></div>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <!-- Slides with indicators -->
                            <div id="carouselExampleIndicators1" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators1"
                                        data-bs-slide-to="0" class="active" aria-current="true"
                                        aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators1"
                                        data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators1"
                                        data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="assets/img/Slide 1 Card 1.jpg" class="d-block w-100" alt="..."
                                            width="100%" height="240">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/img/Slide 2 Card 1.jpg" class="d-block w-100" alt="..."
                                            width="100%" height="240">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/img/Slide 3 Card 1.jpg" class="d-block w-100" alt="..."
                                            width="100%" height="240">
                                    </div>
                                </div>

                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators1" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators1" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>

                            </div><!-- End Slides with indicators -->
                            <div class="card-body">
                                <p class="card-text mt-3">{{__('users.deskripsicard1')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <!-- Slides with indicators -->
                            <div id="carouselExampleIndicators2" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators2"
                                        data-bs-slide-to="0" class="active" aria-current="true"
                                        aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators2"
                                        data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators2"
                                        data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="assets/img/Slide 1 Card 2.jpeg" class="d-block w-100" alt="..."
                                            width="100%" height="240">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/img/Slide 2 Card 2.jpeg" class="d-block w-100" alt="..."
                                            width="100%" height="240">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/img/Slide 3 Card 2.jpeg" class="d-block w-100" alt="..."
                                            width="100%" height="240">
                                    </div>
                                </div>

                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators2" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators2" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>

                            </div><!-- End Slides with indicators -->
                            <div class="card-body">
                                <p class="card-text mt-3">{{__('users.deskripsicard2')}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <!-- Slides with indicators -->
                            <div id="carouselExampleIndicators3" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators3"
                                        data-bs-slide-to="0" class="active" aria-current="true"
                                        aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators3"
                                        data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators3"
                                        data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="assets/img/Slide 1 Card 3.jpeg" class="d-block w-100" alt="..."
                                            width="100%" height="240">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/img/Slide 2 Card 3.jpeg" class="d-block w-100" alt="..."
                                            width="100%" height="240">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/img/Slide 3 Card 3.jpeg" class="d-block w-100" alt="..."
                                            width="100%" height="240">
                                    </div>
                                </div>

                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators3" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators3" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>

                            </div><!-- End Slides with indicators -->
                            <div class="card-body">
                                <p class="card-text mt-3">{{__('users.deskripsicard3')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Slide video --}}
        <div class="album py-5" background-image="assets/img/background.jpg"> 
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <video controls width="100%" height="240">
                                <source src="assets/vid/Development of Automation Weapon Rack.mp4" type="video/webm" class="d-block w-100" />
                            </video>
                            <div class="card-body">
                                <p class="card-text mt-3">{{__('users.deskripsivideo')}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <video controls width="100%" height="240">
                                <source src="assets/vid/.mp4" type="video/webm" class="d-block w-100" />
                            </video>
                            <div class="card-body">
                                <p class="card-text mt-3">{{__('users.deskripsivideo2')}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                </div>
                            </div>
                        </div>
                    </div>   

                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <video controls width="100%" height="240">
                                <source src="assets/vid/.mp4" type="video/webm" class="d-block w-100" />
                            </video>
                            <div class="card-body">
                                <p class="card-text mt-3">{{__('users.deskripsivideo3')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    @include('partials.footer')


    </a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
