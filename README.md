# Dokumentasi Praktikum PBKK

Dokumentasi ini berisi hasil pengerjaan praktikum Pengembangan Aplikasi Berbasis Kerangka Kerja (PBKK) menggunakan CodeIgniter 4. Praktikum mencakup penerapan konsep dasar framework, pengelolaan data menggunakan CRUD, autentikasi pengguna, hingga pengembangan aplikasi berbasis web.

## Identitas

- **Nama:** [Nama]
- **NRP:** [NRP]
- **Mata Kuliah:** Pengembangan Aplikasi Berbasis Kerangka Kerja (PBKK)
- **Framework:** CodeIgniter 4

## Teknologi yang Digunakan

| Teknologi | Keterangan |
|---|---|
| PHP | Bahasa pemrograman |
| CodeIgniter 4 | Framework pengembangan web |
| MySQL | Database |
| Bootstrap | Framework CSS |
| SB Admin | Template dashboard |
| Laragon | Local development environment |

---

# Latihan 1 — Rasa Resto

## 1. Instalasi dan Konfigurasi CodeIgniter

Pada latihan pertama, dilakukan instalasi dan konfigurasi framework CodeIgniter 4 sebagai dasar pengembangan aplikasi Rasa Resto. Proses instalasi dilakukan melalui Composer, kemudian konfigurasi database disesuaikan dengan database MySQL yang digunakan.

![Struktur Project Rasa Resto](docs/latihan1/01-struktur-project.png)

*Gambar 1. Struktur direktori project Rasa Resto.*

## 2. Fungsi Router dan Controller

Router digunakan untuk mengatur alamat URL yang dapat diakses oleh pengguna dan menghubungkannya dengan controller yang sesuai. Controller bertugas menerima request, memproses logika aplikasi, serta menghubungkan data dengan view yang akan ditampilkan.

![Konfigurasi Routes](docs/latihan1/02-routes.png)

*Gambar 2. Konfigurasi routing pada aplikasi.*

![Controller](docs/latihan1/03-controller.png)

*Gambar 3. Implementasi controller.*

## 3. Menggunakan Bootstrap untuk View Aplikasi

Bootstrap digunakan untuk membantu membangun tampilan aplikasi agar lebih responsif dan konsisten. Komponen seperti navbar, button, form, dan tabel dimanfaatkan untuk menyusun antarmuka aplikasi Rasa Resto.

![Halaman Utama](docs/latihan1/04-homepage.png)

*Gambar 4. Tampilan halaman utama Rasa Resto.*

## 4. Menggunakan Template Bootstrap SB Admin

Template SB Admin diterapkan untuk membangun tampilan dashboard pada halaman pengelolaan aplikasi. Template ini menyediakan komponen antarmuka seperti sidebar, navbar, card, dan tabel sehingga tampilan halaman admin lebih terstruktur.

![Dashboard SB Admin](docs/latihan1/05-dashboard.png)

*Gambar 5. Tampilan dashboard menggunakan SB Admin.*

## 5. Mengenal Model dan CRUD

Model digunakan sebagai penghubung antara aplikasi dengan database. Pada latihan ini diterapkan operasi CRUD (Create, Read, Update, Delete) untuk mengelola data restoran. Pengguna dapat menambahkan data baru, melihat daftar data, memperbarui informasi, serta menghapus data yang sudah tidak diperlukan.

![Halaman Data](docs/latihan1/06-data.png)

*Gambar 6. Halaman daftar data.*

![Form Tambah Data](docs/latihan1/07-create.png)

*Gambar 7. Form penambahan data.*

![Form Edit Data](docs/latihan1/08-update.png)

*Gambar 8. Form perubahan data.*

## 6. Penanganan File Upload

Fitur file upload digunakan untuk memungkinkan pengguna mengunggah berkas melalui aplikasi. File yang diunggah akan divalidasi sebelum disimpan ke direktori yang telah ditentukan.

![Form Upload](docs/latihan1/09-upload-form.png)

*Gambar 9. Formulir unggah file.*

![Hasil Upload](docs/latihan1/10-upload-result.png)

*Gambar 10. Hasil proses unggah file.*

## 7. Mengatur Akses User

Pengaturan akses pengguna diterapkan melalui fitur autentikasi agar halaman tertentu hanya dapat diakses oleh pengguna yang telah melakukan login. Dengan demikian, akses terhadap fitur pengelolaan aplikasi dapat dibatasi sesuai kebutuhan.

![Halaman Login](docs/latihan1/11-login.png)

*Gambar 11. Halaman login pengguna.*

![Setelah Login](docs/latihan1/12-after-login.png)

*Gambar 12. Tampilan aplikasi setelah pengguna berhasil login.*

---

# Latihan 2A — SIAKAD

## Deskripsi Aplikasi

SIAKAD merupakan aplikasi Sistem Informasi Akademik yang dikembangkan untuk membantu pengelolaan data akademik. Aplikasi ini mencakup pengelolaan data mahasiswa, dosen, mata kuliah, Kartu Rencana Studi (KRS), serta nilai mahasiswa.

## Implementasi Aplikasi

Pengembangan aplikasi dilakukan menggunakan CodeIgniter 4 dengan menerapkan konsep Model-View-Controller (MVC). Model digunakan untuk mengelola interaksi dengan database, controller menangani proses aplikasi, sedangkan view digunakan untuk menampilkan antarmuka kepada pengguna.

### Data Mahasiswa

![Data Mahasiswa](docs/latihan2a/01-mahasiswa.png)

*Gambar 13. Halaman pengelolaan data mahasiswa.*

### Data Dosen

![Data Dosen](docs/latihan2a/02-dosen.png)

*Gambar 14. Halaman pengelolaan data dosen.*

### Data Mata Kuliah

![Data Mata Kuliah](docs/latihan2a/03-mata-kuliah.png)

*Gambar 15. Halaman pengelolaan data mata kuliah.*

### Kartu Rencana Studi

![KRS](docs/latihan2a/04-krs.png)

*Gambar 16. Halaman pengelolaan KRS.*

### Data Nilai

![Nilai](docs/latihan2a/05-nilai.png)

*Gambar 17. Halaman pengelolaan nilai mahasiswa.*

---

# Latihan 2B — Vaselle

## Deskripsi Aplikasi

Vaselle merupakan aplikasi e-commerce sederhana yang berfokus pada penjualan produk vas dan dekorasi rumah. Aplikasi ini dikembangkan menggunakan CodeIgniter 4 dan MySQL dengan menerapkan konsep MVC.

Aplikasi memiliki dua jenis pengguna, yaitu admin dan customer. Customer dapat melihat katalog produk, memasukkan produk ke keranjang, melakukan checkout, serta melihat riwayat pesanan. Sementara itu, admin dapat mengelola produk dan memantau pesanan yang masuk.

## Teknologi dan Konfigurasi

Aplikasi dikembangkan menggunakan PHP, CodeIgniter 4, MySQL, dan Bootstrap. Database yang digunakan bernama `db_vaselle`.

Untuk menjalankan aplikasi pada lingkungan lokal, server dapat dijalankan menggunakan perintah berikut:

```bash
php spark serve --port 8080
