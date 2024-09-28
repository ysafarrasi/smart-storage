<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="{{ asset('jquery/jquery.min.js') }}"></script>

    <title>{{ __('Edit Data Personel - Penyimpanan Senjata Otomatis') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/stasrg1-modified.png') }}" rel="icon">

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

    <!-- pembacaan no kartu otmatis dengan js -->
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#norfid").load('nokartu.php')
            }, 2); // pembacaan file no kartu sesuai detik karena 0 jadi refresh langsung muncul
        });
    </script>
</head>

<body>
    @include('partials.header')

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>{{ __('Dashboard') }}</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">{{ __('Halaman') }}</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('board') }}">
                    <i class="bi bi-clipboard"></i>
                    <span>{{ __('Papan Status Senjata') }}</span>
                </a>
            </li><!-- End Profile Page Nav -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('personnel') }}">
                    <i class="fa-solid fa-person-rifle"></i>
                    <span>{{ __('Data Pengguna') }}</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('weapon') }}">
                    <i class="fa-solid fa-gun"></i>>
                    <span>{{ __('Data Senjata') }}</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ __('Edit Data Personel') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{
                            __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item">{{ __('Halaman') }}</li>
                    <li class="breadcrumb-item"><a href="{{ route('personnel') }}">{{ __('Data Personel') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ __('Edit Data Personel') }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('Edit Data Personel') }}</h5>
                            <!--Data Akses -->
                            <form method="POST" action="{{ route('personnel')}} "
                                class="row g-3 needs-validation">
                                @method('POST')
                                @csrf
                                <div id="norfid"></div>

                                <div class="col-12">
                                    <label class="col-sm-2 col-form-label">{{ __('ID Senjata') }}</label>
                                    <div class="col">
                                        <select class="form-select" name="loadCellID" id="loadCellID" required>
                                            <option value="{{ $personnel->loadCellID }}">{{ $personnel->loadCellID }}</option>
                                            @php
                                                $weapon = DB::table('weapons')->distinct()->pluck('loadCellID');
                                            @endphp

                                            @foreach ($weapon as $item)
                                                @if ($item != $personnel->loadCellID)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="inputEmail" class="form-label">{{ __('ID Personnel') }}</label>
                                    <input type="text" class="form-control" name="personnel_id" id="personnel_id"
                                        value="{{ $personnel->personel_id }}" required>
                                </div>
                                <div class="col-12">
                                    <label for="inputText" class="form-label">{{ __('Nama Pengguna') }}</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $personnel->name }}" required>
                                </div>
                                <div class="col-12">
                                    <label for="inputText" class="form-label">{{ __('Pangkat') }}</label>
                                    <input type="text" class="form-control" name="rank" id="rank"
                                        value="{{ $personnel->rank }}" required>
                                </div>
                                <div class="col-12">
                                    <label for="inputNumber" class="form-label">{{ __('NRP') }}</label>
                                    <input type="text" class="form-control" name="nrp" id="nrp"
                                        value="{{ $personnel->nrp }}" required>
                                </div>
                                <div class="col-12">
                                    <label for="inputText" class="form-label">{{ __('Jabatan') }}</label>
                                    <input type="text" class="form-control" name="position" id="position"
                                        value="{{ $personnel->position }}" required>
                                </div>
                                <div class="col-12">
                                    <label for="inputText" class="form-label">{{ __('Kesatuan') }}</label>
                                    <input type="text" class="form-control" name="unit" id="unit"
                                        value="{{ $personnel->unit }}" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" name="btnSubmit"id="btnSubmit">{{ __('Simpan') }}</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- Vertical Form -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
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

