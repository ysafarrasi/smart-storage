<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no">
    <script type="text/javascript" src="{{ asset('jquery/jquery.min.js') }}"></script>

    <title>{{ __('users.Senjata') }} - {{ __('users.Penyimpanan Senjata Otomatis') }}</title>
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
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

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
                <a class="nav-link" href="{{ route('weapon') }}">
                    <i class="fa-solid fa-gun" style="color:#899bbd; margin-right: 10px;"></i>
                    <span>{{ __('users.Data Senjata') }}</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('daftaradmin.index') }}">
                    <i class="fa-solid fa-user-shield" style="color:#899bbd; margin-right: 10px;"></i>
                    <span>{{ __('users.DaftarkanAdmin') }}</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <!-- Page content here -->

        <div class="pagetitle">
            <h1>{{ __('users.Data Senjata') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a>
                    </li>
                    <li class="  breadcrumb-item">{{ __('users.Halaman') }}</li>
                    <li class="breadcrumb-item active">{{ __('users.Data Senjata') }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col">
                    <div class="row">
                        <!-- Recent -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>{{ __('users.Filter') }}</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#" onclick="filterData('today')">{{ __('Hari ini') }}</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="filterData('week')">{{ __('Minggu ini') }}</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="filterData('month')">{{ __('Bulan ini') }}</a></li>
                                    </ul>
                                </div>
                                <script>
                                    function filterData(filter) {
                                        let url = new URL(window.location.href);
                                        url.searchParams.set('filter', filter);
                                        window.location.href = url.toString();
                                    }
                                </script>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ __('users.Data Senjata') }}
                                        @if (request()->query('filter') == 'today')
                                            <span>{{ __(' | Hari ini') }}</span>
                                        @elseif (request()->query('filter') == 'week')
                                            <span>{{ __(' | Minggu ini') }}</span>
                                        @elseif (request()->query('filter') == 'month')
                                            <span>{{ __(' | Bulan ini') }}</span>
                                        @else
                                            <span>{{ __(' | Semua') }}</span>
                                        @endif
                                    </h5>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">{{ __('users.ID Senjata') }}</th>
                                                <th scope="col">{{ __('users.Nomor Rak') }}</th>
                                                <th scope="col" style="min-width: 120px;">{{ __('users.Status') }}</th>
                                                <th scope="col">{{ __('users.Berat') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody id="weapon-data">
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div><!-- End Recent -->

                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>

    </main><!-- End #main -->
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
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">

            $(document).ready(function() {
            function loadData() {
            $.ajax({
                url: '/api/load-cell-data',
                type: 'GET',
                success: function(response) {
                    var weaponData = $('#weapon-data');
                    weaponData.empty();

                    // Pastikan data array berada di response.data
                    $.each(response.data, function(index, item) {
                        var status = item.status == '0' ? 'Tidak Tersedia' :
                                    item.status == '1' ? 'Masuk Tidak Ada Magazine' :
                                    item.status == '2' ? 'Masuk Ada Magazine' : 'Status Tidak Diketahui';

                        weaponData.append('<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + item.loadCellID + '</td>' +
                            '<td>' + item.rackNumber + '</td>' +
                            '<td>' + status + '</td>' +
                            '<td>' + item.weight + ' Gram</td>' +
                            '</tr>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + ' ' + error);
                }
            });
        }
        // Panggil fungsi loadData saat halaman selesai dimuat
        loadData();
        // Memuat data setiap 5 detik});
        loadData(); // Initial load
        setInterval(loadData, 5000); // Refresh every 5 seconds
        });
    </script>
</body>

</html>
