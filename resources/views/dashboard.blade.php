<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, sshirink-to-fit=no">
    <script type="text/javascript" src="{{ asset('jquery/jquery.min.js') }}"></script>

    <title>Dashboard - {{ __('users.Penyimpanan Senjata Otomatis') }} - Automation Weapon Rack</title>
    <meta name="keywords" content="{{ $metaKeywords ?? 'default, keywords' }}">
    <title>{{ $metaTitle ?? 'Default Title' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Favicons -->
    <link href="{{ asset('img/Logo G - STAS RG.png') }}" rel="icon">

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
</head>

<body>
    @include('partials.header')

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>{{ __('users.Dashboard') }}</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">{{ __('users.halaman') }}</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('board') }}">
                    <i class="bi bi-clipboard"></i>
                    <span>{{ __('users.Papan Status Senjata') }}</span>
                </a>
            </li><!-- End Profile Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('personnel') }}">
                    <i class="fa-solid fa-person-rifle"></i>
                    <span>{{ __('users.Data Pengguna') }}</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('weapon') }}">
                    <i class="fa-solid fa-gun"></i>
                    <span>{{ __('users.Data Senjata') }}</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ __('users.Dashboard') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a>
                    </li>
                    <li class="breadcrumb-item active">{{ __('users.Dashboard') }}</li>
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

                                        <li><a class="dropdown-item" href="#">{{ __('users.Hari ini') }}</a></li>
                                        <li><a class="dropdown-item" href="#">{{ __('users.Bulan ini') }}</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">{{ __('users.Tahun ini') }}</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">{{ __('users.Status Penggunaan Senjata') }}
                                        <span>{{ __('users. | Hari ini') }}</span>
                                    </h5>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">{{ __('users.ID Senjata') }}</th>
                                                <th scope="col">{{ __('users.ID Pengguna') }}</th>
                                                <th scope="col">{{ __('users.Nama Pengguna') }}</th>
                                                <th scope="col">{{ __('users.Tanggal') }}</th>
                                                <th scope="col">{{ __('users.Waktu Keluar') }}</th>
                                                <th scope="col">{{ __('users.Waktu Masuk') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody id="status-data">
                                            {{-- @foreach ($statuses as $index => $status)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $status->loadCellID }}</td>
                                                    <td>{{ $status->personnel->personnel_id }}</td>
                                                    <td>{{ $status->personnel->nama }}</td>
                                                    <td>{{ $status->tanggal }}</td>
                                                    <td>{{ $status->time_out }}</td>
                                                    <td>{{ $status->time_in }}</td>
                                                </tr>
                                            @endforeach --}}
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

    @include('partials.footer')
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

    <script>
        $(document).ready(function() {
            function fetchStatuses() {
                console.log("Fetching statuses..."); // Log untuk memastikan fungsi dipanggil
                $.ajax({
                    url: "{{ url('/api/dashboard') }}",
                    method: "GET",
                    success: function(data) {
                        console.log("Data received: ", data); // Log untuk melihat data yang diterima
                        var dataTable = $('#status-data');
                        dataTable.empty();

                        $.each(data, function(index, status) {
                            dataTable.append('<tr>' +
                                '<td>' + (index + 1) + '</td>' +
                                '<td>' + (status.loadCellID || '') + '</td>' +
                                '<td>' + (status.personnel ? (status.personnel
                                    .personnel_id || '') : '') + '</td>' +
                                '<td>' + (status.personnel ? (status.personnel.nama || '') :
                                    '') + '</td>' +
                                '<td>' + (status.tanggal || '') + '</td>' +
                                '<td>' + (status.time_out || '') + '</td>' +
                                '<td>' + (status.time_in || '') + '</td>' +
                                '</tr>');
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("Error: ", textStatus, errorThrown);
                    }
                });
            }

            // Fetch statuses on page load
            fetchStatuses();

            // Fetch statuses every 30 seconds
            setInterval(fetchStatuses, 5000); // 30 seconds
        });
    </script>

</body>

</html>
