<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, sshirink-to-fit=no">
    <script type="text/javascript" src="{{ asset('jquery/jquery.min.js') }}"></script>

    <title>{{ __('users.Papan Status Senjata')}} {{ __('users.Penyimpanan Senjata Otomatis') }}</title>
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
    <!-- Main CSS -->
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
                <a class="nav-link collapsed " href="{{ route('dashboard') }}">
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
                <a class="nav-link collapsed" href="{{ route('daftaradmin.index') }}">
                    <i class="fa-solid fa-user-shield" style="color:#899bbd; margin-right: 10px;"></i>
                    <span>{{ __('users.DaftarkanAdmin') }}</span>
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
                            <p class="mt-3 text-center font-sans font-semibold">
                                {{__('users.weapon_status_color')}}
                                <br>
                                <span class="text-success">{{ __('users.green_status') }}
                                <br>
                                <span class="text-warning">{{ __('users.yellow_status') }}
                                <br>
                                <span class="text-danger">{{ __('users.red_status') }}
                            </p>
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
            // Fungsi untuk memuat data secara real-time
            function loadData() {
                $.ajax({
                    url: 'api/load-cell-data',
                    type: 'GET',
                    success: function(response) {
                        updateUI(response.data);
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
                            class: 'card-body d-flex flex-column align-items-center text-center' // Center alignment
                        });
                        var cardTitle = $('<h5>', {
                            class: 'card-title',
                            text: 'Rack ' + rackData.rackNumber
                        });
                        var senjataContainer = $('<div>', {
                            id: 'senjata' + rackData.loadCellID,
                            class: 'container d-flex justify-content-center align-items-center mb-2' // Center LEDs
                        });

                        // Menentukan warna LED berdasarkan status
                        var ledGreen = $('<div>', {
                            class: 'pill me-2' // Tambahkan margin kanan
                        }).append($('<div>', {
                            class: 'led led-green' + (rackData.status == '2' ? ' on' : ''),
                            css: {
                                marginRight: '10px' // Tambahkan jarak antar indikator
                            }
                        }));
                        var ledYellow = $('<div>', {
                            class: 'pill me-2' // Tambahkan margin kanan
                        }).append($('<div>', {
                            class: 'led led-orange' + (rackData.status == '1' ? ' on' : ''),
                            css: {
                                marginRight: '10px' // Tambahkan jarak antar indikator
                            }
                        }));
                        var ledRed = $('<div>', {
                            class: 'pill' // Tidak perlu margin kanan di akhir
                        }).append($('<div>', {
                            class: 'led led-red' + (rackData.status == '0' ? ' on' : ''),
                            css: {
                                marginRight: '10px' // Tambahkan jarak antar indikator
                            }
                        }));

                        senjataContainer.append(ledGreen, ledYellow, ledRed);

                        // Menambahkan keterangan status dengan span
                        var statusDescription = $('<span>', {
                            class: 'status-description',
                            css: {
                                fontSize: '12px', // Memperkecil ukuran tulisan
                                fontWeight: 'normal', // Mengurangi ketebalan font
                                display: 'block', // Make it a block element for proper centering
                                marginTop: '8px' // Add some spacing above the text
                            }
                        });

                        // Menentukan warna teks berdasarkan status
                        if (rackData.status == '2') {
                            statusDescription.text('Available with a magazine.');
                            statusDescription.css('color', 'green'); // Warna hijau
                        } else if (rackData.status == '1') {
                            statusDescription.text('Available without a magazine.');
                            statusDescription.css('color', 'orange'); // Warna kuning/orange
                        } else if (rackData.status == '0') {
                            statusDescription.text('Not available on the rack.');
                            statusDescription.css('color', 'red'); // Warna merah
                        }

                        // Append status description below the LEDs
                        cardBody.append(cardTitle, senjataContainer, statusDescription);
                        card.append(cardBody);
                        rackElement.append(card);
                        $('#rack-data').append(rackElement);
                    });
                } else {
                    // Tampilkan pesan jika tidak ada data yang tersedia
                    $('#rack-data').html('<p>Data tidak tersedia.</p>');
                }
            }

            // Memuat data pertama kali
            loadData();
            // Memuat data setiap 2 detik
            setInterval(loadData, 2000);
        });
    </script>

</body>

</html>
