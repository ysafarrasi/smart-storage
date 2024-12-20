<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no ">
    <script type="text/javascript" src="{{ asset('jquery/jquery.min.js') }}"></script>
    <title>{{ __('users.tambahkan data personnel')}} - Penyimpanan Senjata Otomatis</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

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
                <a class="nav-link" href="{{ route('personnel') }}">
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
            <h1>{{ __('users.Tambah Data Pengguna') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('users.Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">{{ __('users.Halaman') }}</li>
                    <li class="breadcrumb-item"><a href="{{ route('personnel') }}">{{ __('users.Data Pengguna') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ __('users.Tambah Data Pengguna') }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('users.Tambah Data Pengguna') }}</h5>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Form Tambah Data Pengguna -->
                            <form method="POST" action="{{ route('personnel-store') }}" class="row g-3 needs-validation" novalidate>
                                @csrf

                                <!-- Input No Kartu RFID -->
                                <div class="col-12">
                                    <label for="nokartu" class="form-label">{{ __('users.No Kartu RFID') }}</label>
                                    <input
                                        type="text"
                                        name="nokartu"
                                        id="nokartu"
                                        placeholder="{{ __('users.Tempelkan Kartu RFID') }}"
                                        class="form-control"
                                        readonly
                                        required>
                                    <span id="rfidError" class="text-danger"></span>
                                </div>

                                <script>
                                    const rfidInput = document.getElementById('nokartu');
                                    const rfidError = document.getElementById('rfidError');
                                    setInterval(() => {
                                        fetch('http://192.168.1.10:8000/api/rfid-data')
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.code === 200 && data.data && data.data.length > 0) {
                                                    rfidInput.value = data.data[0].nokartu;
                                                    rfidError.innerText = '';
                                                } else {
                                                    rfidInput.value = '';
                                                    rfidError.innerText = '{{ __('users.RFID tidak terbaca, coba lagi') }}';
                                                }
                                            })
                                            .catch(() => {
                                                rfidError.innerText = '{{ __('users.Terjadi kesalahan saat mengambil data RFID') }}';
                                            });
                                    }, 1000);
                                </script>

                                <!-- Pilihan Load Cell ID (ID Senjata) -->
                                <div class="col-12">
                                    <label for="loadCellID" class="form-label">{{ __('ID Senjata') }}</label>
                                    <select class="form-select" name="loadCellID" id="loadCellID" required>
                                        <option value="">{{ __('users.Pilih ID Senjata') }}</option>
                                    </select>
                                    <span id="loadCellError" class="text-danger"></span>
                                </div>

                                <script>
                                    const loadCellSelect = document.getElementById('loadCellID');
                                    const loadCellError = document.getElementById('loadCellError');

                                    fetch('http://192.168.1.10:8000/api/load-cell-data')
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.code === 200 && data.data && data.data.length > 0) {
                                                data.data.forEach(item => {
                                                    const option = document.createElement('option');
                                                    option.value = item.loadCellID;
                                                    option.textContent = item.loadCellID;
                                                    loadCellSelect.appendChild(option);
                                                });
                                                loadCellError.innerText = '';
                                            } else {
                                                loadCellError.innerText = '{{ __('users.Tidak ada ID Senjata yang tersedia') }}.';
                                            }
                                        })
                                        .catch(() => {
                                            loadCellError.innerText = '{{ __('users.Terjadi kesalahan saat mengambil data ID Senjata') }}';
                                        });
                                </script>

                                <!-- Input Data Personnel -->
                                <div class="col-12">
                                    <label for="personnel_id" class="form-label">{{ __('ID Personnel') }}</label>
                                    <input type="text" class="form-control" name="personnel_id" id="personnel_id" required>
                                </div>

                                <div class="col-12">
                                    <label for="nama" class="form-label">{{ __('Nama Pengguna') }}</label>
                                    <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') }}" required>
                                </div>

                                <div class="col-12">
                                    <label for="pangkat" class="form-label">{{ __('users.Pangkat') }}</label>
                                    <input type="text" class="form-control" name="pangkat" id="pangkat" value="{{ old('pangkat') }}" required>
                                </div>

                                <div class="col-12">
                                    <label for="nrp" class="form-label">{{ __('users.NRP') }}</label>
                                    <input type="text" class="form-control" name="nrp" id="nrp" required>
                                </div>

                                <div class="col-12">
                                    <label for="jabatan" class="form-label">{{ __('users.Jabatan') }}</label>
                                    <input type="text" class="form-control" name="jabatan" id="jabatan" required>
                                </div>

                                <div class="col-12">
                                    <label for="kesatuan" class="form-label">{{ __('users.Kesatuan') }}</label>
                                    <input type="text" class="form-control" name="kesatuan" id="kesatuan" required>
                                </div>

                                <!-- Tombol Submit dan Reset -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->



    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/878a3fab63.js" crossorigin="anonymous"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>

