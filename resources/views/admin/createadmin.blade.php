<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, sshirink-to-fit=no">
    <script type="text/javascript" src="{{ asset('jquery/jquery.min.js') }}"></script>

    <title>{{ __('users.DaftarkanAdmin') }} - {{ __('users.Penyimpanan Senjata Otomatis') }}</title>
    <meta name="keywords" content="{{ $metaKeywords ?? 'default, keywords' }}">
    <title>{{ $metaTitle ?? 'Default Title' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/Logo G - STAS RG.png') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.css') }}">
    <script src="{{ asset('assets/fontawesome/js/all.min.js') }}" defer></script>
</head>

<body>
    @include('partials.header')

        <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar">

            <ul class="sidebar-nav" id="sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                        <i class="bi bi-grid"></i>
                        <span>{{ __('users.Dashboard') }}</span>
                    </a>
                </li><!-- End Dashboard Nav -->

                <li class="nav-heading">{{ __('users.Halaman') }}</li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('board') }}">
                        <i class="bi bi-clipboard"></i>
                        <span>{{ __('users.Papan Status Senjata') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('personnel') }}">
                        <i class="fa-solid fa-person-rifle" style="color:#899bbd; margin-right: 10px;"></i>
                        <span>{{ __('users.Data Pengguna') }}</span>
                    </a>
                </li><!-- End Profile Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('weapon') }}">
                        <i class="fa-solid fa-gun" style="color:#899bbd; margin-right: 10px;"></i>
                        <span>{{ __('users.Data Senjata') }}</span>
                    </a>
                </li><!-- End F.A.Q Page Nav -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('daftaradmin.index') }}">
                        <i class="fa-solid fa-user-shield" style="color:#899bbd; margin-right: 10px;"></i>
                        <span>{{ __('users.DaftarkanAdmin') }}</span>
                    </a>
                </li><!-- End F.A.Q Page Nav -->
            </ul>

        </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ __('users.tambahadmin') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('daftaradmin.index') }}"><i class="fa-solid fa-user-shield"></i></a></li>
                    <li class="breadcrumb-item">{{ __('users.Halaman') }}</li>
                    <li class="breadcrumb-item">{{ __('users.DaftarkanAdmin') }}</li>
                    <li class="breadcrumb-item active">{{ __('users.tambahadmin') }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('users.tambahadmin') }}</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('daftaradmin.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('users.masukannama') }}</label>
                                    <input id="name" type="text" class="form-control" name="name" required
                                        placeholder="{{ __('users.Masukan_Nama_Admin') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('users.masukanemail') }}</label>
                                    <input id="email" type="email" class="form-control" name="email" required
                                        placeholder="{{ __('users.Masukan_Email_Admin') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('users.Masukan_Password') }}</label>
                                    <input id="password" type="password" class="form-control" name="password" required
                                        placeholder="{{ __('users.Masukan_Kata_Sandi_Admin') }}">
                                    <small class="text-muted">{{ __('users.minimal8') }}</small>
                                </div>
                                <div class="mb-3">
                                    <label for="password-confirm" class="form-label">{{ __('users.Ulangi_Kata_Sandi') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required
                                        placeholder="{{ __('users.Ulangi_kata_Sandi_Admin') }}">
                                </div>
                                <button type="submit" class="btn btn-primary w-100">{{ __('users.tambahadmin') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="https://kit.fontawesome.com/878a3fab63.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
