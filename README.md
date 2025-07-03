# 🔒 Automation Weapon Rack ⚙️

![License](https://img.shields.io/badge/license-MIT-green.svg)
![Platform](https://img.shields.io/badge/platform-Arduino%20Mega%20%2B%20Ethernet%20Shield-blue.svg)
![Status](https://img.shields.io/badge/status-Prototype-orange.svg)

Sistem otomasi untuk **Weapon Rack (Lemari Senjata)** yang bertujuan meningkatkan keamanan, efisiensi, dan kemudahan monitoring. Sistem ini memanfaatkan Arduino Mega, Ethernet Shield, sensor, serta dashboard berbasis web untuk memantau status rak senjata secara real-time.

⚠️ **Catatan:** Repository ini adalah versi prototipe untuk keperluan edukasi dan pengembangan. Tidak memuat informasi rahasia, spesifikasi teknis militer, atau detail keamanan sebenarnya.

---

## 🚀 Fitur Utama

✅ Monitoring kondisi weapon rack otomatis
✅ Sistem notifikasi saat terjadi pelanggaran akses
✅ Deteksi pintu rak terbuka/tutup menggunakan sensor
✅ Otomatisasi kontrol akses (solenoid lock opsional)
✅ Dashboard monitoring berbasis web
✅ Komunikasi microcontroller ke server via REST API Laravel

---

## 💻 Teknologi, Bahasa & Framework yang Digunakan

| Komponen               | Teknologi/Framework                         |
| ---------------------- | ------------------------------------------- |
| **Microcontroller**    | Arduino Mega + Ethernet Shield              |
| **Bahasa Pemrograman** | C/C++ untuk firmware Arduino                |
| **Dashboard Web**      | HTML, CSS, JavaScript, PHP                  |
| **Framework Web**      | Laravel (PHP Framework)                     |
| **API Komunikasi**     | REST API bawaan Laravel (HTTP via Ethernet) |
| **Database**           | MySQL dengan PhpMyAdmin sebagai GUI         |

---

## 📁 Struktur Direktori

```
automation-weapon-rack/
├── firmware/           # Source code Arduino Mega
├── web-dashboard/      # Project Laravel dan Frontend
├── schematics/         # Wiring diagram & rancangan rangkaian
├── docs/               # Dokumentasi tambahan, flow sistem
├── images/             # Diagram, foto prototype
├── README.md           # File ini
```

---

## 📊 Potensi Pengembangan

* Autentikasi pengguna lebih aman (RFID, sidik jari)
* Sistem alarm otomatis jika akses ilegal
* Penyempurnaan dashboard dengan grafik & statistik
* Backup power supply untuk kondisi darurat
* Pencatatan log berbasis waktu real-time

---

## 🤝 Kontribusi

Pull Request, masukan, dan ide pengembangan sangat terbuka.
Silakan buat issue jika menemukan bug atau butuh fitur baru.

---

## ⚠️ Disclaimer

Proyek ini dikembangkan sebagai prototipe edukasi atau sistem internal.
Penggunaan pada sistem senjata nyata harus sesuai standar keamanan & regulasi yang berlaku.

---

## 📧 Kontak

Untuk pertanyaan atau kolaborasi:
📬 \[[email@example.com](mailto:email@example.com)]

---
