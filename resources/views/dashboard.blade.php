<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, sshirink-to-fit=no">
    <script type="text/javascript" src="{{ asset('jquery/jquery.min.js') }}"></script>

    <title>Dashboard - {{ __('users.Penyimpanan Senjata Otomatis') }}</title>
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
                <a class="nav-link" href="{{ route('dashboard') }}">
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
                <a class="nav-link collapsed" href="{{ route('daftaradmin.index') }}">
                    <i class="fa-solid fa-user-shield" style="color:#899bbd; margin-right: 10px;"></i>
                    <span>{{ __('users.DaftarkanAdmin') }}</span>
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
                <div class="col">
                    <div class="row">
                        <!-- Recent -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" id="filter-options">
                                        <li class="dropdown-header text-start">
                                            <h6>{{ __('users.Filter') }}</h6>
                                        </li>
                                        <li><a class="dropdown-item filter-option" data-filter="today" href="#">{{ __('users.Hari ini') }}</a></li>
                                        <li><a class="dropdown-item filter-option" data-filter="month" href="#">{{ __('users.Bulan ini') }}</a></li>
                                        <li><a class="dropdown-item filter-option" data-filter="year" href="#">{{ __('users.Tahun ini') }}</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">{{ __('users.Status Penggunaan Senjata') }}
                                        <span id="filter-label">{{ __('users. | Hari ini') }}</span>
                                    </h5>

                                    <div class="tab-content pt-2">
                                        <div class="row">
                                            <div class="row" id="rack-data">
                                                <!-- Data akan ditampilkan di sini -->
                                            </div>
                                        </div>
                                    </div>
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
                                            <!-- Data yang difilter akan ditampilkan di sini -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End Recent -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>

        <div class="d-flex justify-content-end mt-3">
            <button id="download-excel" class="btn btn-primary">
                <i class="bi bi-file-earmark-spreadsheet me-1"></i> {{__('users.unduh data excel')}}
            </button>
        </div>

        <!-- Import pustaka SheetJS -->
        <script src="{{ asset('assets/js/xlsx.full.min.js') }}"></script>

        <script>
            document.getElementById('download-excel').addEventListener('click', function () {
                // URL endpoint API untuk mengambil data
                var url = "{{ url('/api/dashboard') }}";

                // Inisialisasi permintaan AJAX
                var xhttp = new XMLHttpRequest();

                xhttp.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        var data = JSON.parse(xhttp.responseText);

                        // Format data untuk Excel dengan pengecekan null
                        var formattedData = data.map(function (row, index) {
                            return {
                                "No": index + 1,
                                "ID Senjata": row.loadCellID || 'N/A',
                                "ID Pengguna": row.personnel ? row.personnel.personnel_id || 'N/A' : 'N/A',
                                "Nama Pengguna": row.personnel ? row.personnel.nama || 'N/A' : 'N/A',
                                "Tanggal": row.tanggal || 'N/A',
                                "Waktu Keluar": row.time_out || 'N/A',
                                "Waktu Masuk": row.time_in || 'N/A'
                            };
                        });

                        // Konversi data JSON menjadi lembar kerja Excel
                        var ws = XLSX.utils.json_to_sheet(formattedData);

                        // Membuat workbook dan menambahkan worksheet ke dalamnya
                        var wb = XLSX.utils.book_new();
                        XLSX.utils.book_append_sheet(wb, ws, "Data Senjata");

                        // Mengunduh file Excel dengan nama "data_senjata.xlsx"
                        XLSX.writeFile(wb, "data_senjata.xlsx");
                    } else if (this.readyState === 4) {
                        // Handle error jika status bukan 200
                        console.error("Gagal mengambil data dari API: " + this.status);
                        alert("Gagal mengambil data. Periksa koneksi atau API.");
                    }
                };

                // Kirim permintaan GET ke endpoint API
                xhttp.open("GET", url, true);
                xhttp.send();
            });
        </script>







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
                            class: 'pill me-4' // Tambahkan margin kanan
                        }).append($('<div>', {
                            class: 'led led-green' + (rackData.status == '2' ? ' on' : '')
                        }));
                        var ledYellow = $('<div>', {
                            class: 'pill me-4' // Tambahkan margin kanan
                        }).append($('<div>', {
                            class: 'led led-orange' + (rackData.status == '1' ? ' on' : '')
                        }));
                        var ledRed = $('<div>', {
                            class: 'pill' // Tidak perlu margin kanan di akhir
                        }).append($('<div>', {
                            class: 'led led-red' + (rackData.status == '0' ? ' on' : '')
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

        // untuk status senjata
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

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const filterOptions = document.querySelectorAll('.filter-option');
        const filterLabel = document.getElementById('filter-label');
        const statusData = document.getElementById('status-data');

        filterOptions.forEach(option => {
            option.addEventListener('click', (event) => {
                event.preventDefault();
                const filter = option.getAttribute('data-filter');

                // Update label
                if (filter === 'today') {
                    filterLabel.textContent = '{{ __("users. | Hari ini") }}';
                } else if (filter === 'month') {
                    filterLabel.textContent = '{{ __("users.| Bulan ini") }}';
                } else if (filter === 'year') {
                    filterLabel.textContent = '{{ __("users.| Tahun ini") }}';
                }

                // Fetch and display filtered data
                fetchFilteredData(filter);
            });
        });

        function fetchFilteredData(filter) {
            // Contoh fetch data dari API (ubah URL sesuai backend Anda)
            const url = `/api/status-senjata?filter=${filter}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    displayData(data);
                })
                .catch(error => console.error('Error fetching data:', error));
        }

        function displayData(data) {
            statusData.innerHTML = ''; // Hapus data lama
            data.forEach((item, index) => {
                statusData.innerHTML += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.id_senjata}</td>
                        <td>${item.id_pengguna}</td>
                        <td>${item.nama_pengguna}</td>
                        <td>${item.tanggal}</td>
                        <td>${item.waktu_keluar}</td>
                        <td>${item.waktu_masuk}</td>
                    </tr>
                `;
            });
        }
    });
    </script>


</body>

</html>
