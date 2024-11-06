<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="{{ asset('jquery/jquery.min.js') }}"></script>

    <title>Tambah Data Personil - Penyimpanan Senjata Otomatis</title>
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
            </li><!-- End Profile Page Nav -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('personnel') }}">
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
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('daftaradmin.index') }}">
                    <i class="fa-solid fa-user-shield"></i>
                    <span>{{ __('users.DaftarkanAdmin') }}</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->
        </ul>

    </aside>
    <!-- End Sidebar-->
    

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
                                    <label for="nokartu" class="form-label">No Kartu</label>
                                    <input 
                                        type="text" 
                                        name="nokartu" 
                                        id="nokartu" 
                                        placeholder="Tempelkan Kartu RFID" 
                                        class="form-control" 
                                        readonly 
                                        required>
                                    <span id="rfidError" class="text-danger"></span>
                                </div>
        
                                <script>
                                    const interval = setInterval(() => {
                                        fetch('http://127.0.0.1/api/rfid-data')
                                            .then(response => response.json())
                                            .then(data => {
                                                const nokartuInput = document.getElementById('nokartu');
                                                const rfidError = document.getElementById('rfidError');
                                
                                                if (data && data.data && data.data.nokartu) {
                                                    nokartuInput.value = data.data.nokartu;
                                                    rfidError.innerText = ''; // Hapus pesan error
                                                    clearInterval(interval); // Hentikan interval setelah RFID terbaca
                                                } else {
                                                    nokartuInput.value = '';
                                                    rfidError.innerText = 'RFID tidak terbaca, coba lagi.';
                                                }
                                            })
                                            .catch(error => {
                                                console.error('Error fetching RFID data:', error);
                                                document.getElementById('rfidError').innerText = 'Terjadi kesalahan saat mengambil data RFID.';
                                            });
                                    }, 3000); // Cek setiap 3 detik
                                </script>                                                               
        
                                <!-- Pilihan Load Cell ID (ID Senjata) -->
                                <div class="col-12">
                                    <label for="loadCellID" class="form-label">{{ __('ID Senjata') }}</label>
                                    <select class="form-select" name="loadCellID" id="loadCellID" required>
                                        <option value="">Pilih ID Senjata</option>
        
                                        @php
                                            $weapons = DB::table('weapons')->distinct()->pluck('loadCellID');
                                        @endphp
        
                                        @foreach ($weapons as $item)
                                            @php
                                                $isUsed = App\Models\Personnel::where('loadCellID', $item)->exists();
                                            @endphp
        
                                            @if (!$isUsed)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
        
                                <!-- Input Data Personnel -->
                                <div class="col-12">
                                    <label for="personnel_id" class="form-label">{{ __('ID Personnel') }}</label>
                                    <input type="text" class="form-control" name="personnel_id" id="personnel_id" required>
                                </div>
        
                                <div class="col-12">
                                    <label for="nama" class="form-label">{{ __('Nama Pengguna') }}</label>
                                    <input type="text" class="form-control" name="nama" id="nama" required>
                                </div>
        
                                <div class="col-12">
                                    <label for="pangkat" class="form-label">{{ __('Pangkat') }}</label>
                                    <input type="text" class="form-control" name="pangkat" id="pangkat" required>
                                </div>
        
                                <div class="col-12">
                                    <label for="nrp" class="form-label">{{ __('NRP') }}</label>
                                    <input type="text" class="form-control" name="nrp" id="nrp" required>
                                </div>
        
                                <div class="col-12">
                                    <label for="jabatan" class="form-label">{{ __('Jabatan') }}</label>
                                    <input type="text" class="form-control" name="jabatan" id="jabatan" required>
                                </div>
        
                                <div class="col-12">
                                    <label for="kesatuan" class="form-label">{{ __('Kesatuan') }}</label>
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

