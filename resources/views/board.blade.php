<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, sshirink-to-fit=no">
    <script type="text/javascript" src="{{ asset('jquery/jquery.min.js') }}jquery/jquery.min.js"></script>

    <title>{{ __('users.Penyimpanan Senjata Otomatis') }} - Automation Weapon Rack</title>
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

    <!-- Main CSS -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

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
                <a class="nav-link" href="{{ route('board') }}">
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
            <h1>{{ __('users.Papan Status Senjata') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item">{{ __('users.Halaman') }}</li>
                    <li class="breadcrumb-item active">{{ __('users.Data Senjata') }}</li>
                </ol>
            </nav>
        </div>

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body pt-4 d-flex flex-column align-items-center">
                            <img src="{{ asset('assets/img/Indicator Lights for Weapon Use.png') }}"
                                alt="Weapon Status Board" width="200px">
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">{{ __('users.Papan Status Senjata') }}</button>
                                </li>
                            </ul>

                            <div class="tab-content pt-2">
                                <div class="row">
                                    <div class="row" id="rack-data">
                                        <!-- Data akan ditampilkan di sini -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Fungsi untuk memuat data secara real-time
            function loadData() {
                $.ajax({
                    url: '{{ route('load-data') }}',
                    type: 'GET',
                    success: function(response) {
                        updateUI(response);
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            // Fungsi untuk memperbarui UI
            function updateUI(data) {
                $('#rack-data').empty(); // Kosongkan data sebelum memuat yang baru
                if (data.length > 0) {
                    // Tampilkan data
                    data.forEach(function(rackData) {
                        var rackElement = $('<div>', {
                            id: 'rack' + rackData.rackNumber,
                            class: 'col-lg-6'
                        });
                        var card = $('<div>', {
                            class: 'card'
                        });
                        var cardBody = $('<div>', {
                            class: 'card-body'
                        });
                        var cardTitle = $('<h5>', {
                            class: 'card-title',
                            text: 'Rack ' + rackData.rackNumber
                        });
                        var senjataContainer = $('<div>', {
                            id: 'senjata' + rackData.loadCellID,
                            class: 'container d-flex justify-content-evenly align-item-center'
                        });

                        // Menentukan warna LED berdasarkan status
                        var ledGreen = $('<div>', {
                            class: 'pill'
                        }).append($('<div>', {
                            class: 'led led-green' + (rackData.status == '1' ? ' on' : '')
                        }));
                        var ledYellow = $('<div>', {
                            class: 'pill'
                        }).append($('<div>', {
                            class: 'led led-yellow' + (rackData.status == '2' ? ' on' : '')
                        }));
                        var ledRed = $('<div>', {
                            class: 'pill'
                        }).append($('<div>', {
                            class: 'led led-red' + (rackData.status == '-1' ? ' on' : '')
                        }));

                        senjataContainer.append(ledGreen, ledYellow, ledRed);
                        cardBody.append(cardTitle, senjataContainer);
                        card.append(cardBody);
                        rackElement.append(card);
                        $('#rack-data').append(rackElement);
                    });
                } else {
                    // Tampilkan pesan jika tidak ada data yang tersedia
                    $('#rack-data').html('<p>No data available.</p>');
                }
            }


            // Memuat data pertama kali
            loadData();
            // Memuat data setiap 5 detik
            setInterval(loadData, 5000);
        });
    </script>
</body>

</html>
