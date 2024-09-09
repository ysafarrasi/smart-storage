<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, sshirink-to-fit=no">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>

    <title><?= __('Dashboard - Penyimpanan Senjata Otomatis') ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/Logo G - STAS RG.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

</head>

<body>
    @include('partials.header')

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span><?= __('Dashboard') ?></span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading"><?= __('Halaman') ?></li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('board') }}">
                    <i class="bi bi-clipboard"></i>
                    <span><?= __('Papan Status Senjata') ?></span>
                </a>
            </li><!-- End Profile Page Nav -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('personnel') }}">
                    <i class="fa-solid fa-person-rifle"></i>
                    <span><?= __('Data Pengguna') ?></span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('weapon') }}">
                    <i class="fa-solid fa-gun"></i>
                    <span><?= __('Data Senjata') ?></span>
                </a>
            </li><!-- End F.A.Q Page Nav -->
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1><?= __('Data Pengguna') ?></h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a>
                    </li>
                    <li class="breadcrumb-item"><?= __('Halaman') ?></li>
                    <li class="breadcrumb-item active"><?= __('Data Personel') ?></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="mt-5">
            <h2>Apakah kamu yakin untuk menghapus id senjata {{ $personnel->weapon_id }} dengan nama
                {{ $personnel->name }}
            </h2>
            <form style="display:inline-block" action="/personnel-destroy/{{ $personnel->personnel_id }}"
                method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('personnel') }}" class="btn btn-primary">Cancel</a>
        </div>

    </main><!-- End #main -->

    @include('partials.footer')
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="https://kit.fontawesome.com/878a3fab63.js" crossorigin="anonymous"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>
