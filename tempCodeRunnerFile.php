<?php
    // Menampilkan pilihan kepada user
    echo "Pilih salah satu:\n";
    echo "[1] Untuk menampilkan rata-rata.\n";
    echo "[2] Untuk menampilkan penjumlahan.\n";
    echo "[3] Untuk menampilkan rata-rata dan penjumlahan.\n";
    echo "[Lainnya] Untuk keluar.\n";
    echo "Masukkan pilihan Anda: ";
    $choice = (int)trim(fgets(STDIN));
    
    // Inisialisasi variabel
    $sum = 0;
    $count = 0;
    
    // Meminta input angka dari user
    echo "Masukkan angka (masukkan 'stop' untuk berhenti):\n";
    while (true) {
        $input = trim(fgets(STDIN));
        
        if (strtolower($input) === '=') {
            break;
        }
        
        // Menambahkan input ke penjumlahan dan menghitung jumlah input
        $sum += (float)$input;
        $count++;
    }
    
    // Jika ada angka yang dimasukkan, hitung rata-rata dan tampilkan hasil
    if ($count > 0) {
        $average = $sum / $count;
    
        switch ($choice) {
            case 1:
                echo "Rata-rata: " . $average . "\n";
                break;
            case 2:
                echo "Penjumlahan: " . $sum . "\n";
                break;
            case 3:
                echo "Rata-rata: " . $average . "\n";
                echo "Penjumlahan: " . $sum . "\n";
                break;
            default:
                echo "Keluar dari program.\n";
                break;
        }
    } else {
        echo "Tidak ada angka yang dimasukkan.\n";
    }
?>