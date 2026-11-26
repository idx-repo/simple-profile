# Catatan Pengujian (Testing Notes & Report)
**Proyek: Simple Profile (Yii 2 Implementation)**

Dokumen ini mencatat metodologi, matriks pengujian, log eksekusi, serta hasil verifikasi fungsional dari aplikasi **Simple Profile** berbasis **Yii 2** (`yii2app/`).

---

## 1. Lingkungan Pengujian (Test Environment)

| Komponen | Spesifikasi / Versi |
| :--- | :--- |
| **Sistem Operasi** | openSUSE Leap 15.6 (x86_64) |
| **PHP Runtime** | PHP 8.4.28 (cli) (built via phpbrew, NTS) |
| **Ekstensi PHP Aktif** | `pdo`, `pdo_mysql`, `mbstring`, `openssl`, `curl`, `dom`, `xml`, `zip`, `bcmath` |
| **Basis Data** | MariaDB Server 10.x / MySQL Protocol |
| **Nama Database** | `simple_profile` |
| **Framework Web** | Yii Framework v2.0.54 |
| **UI Framework** | Bootstrap 4 (`yiisoft/yii2-bootstrap4`) |
| **Web Server** | PHP Built-in Development Server (`127.0.0.1:8080`) |

---

## 2. Matriks Kasus Uji & Hasil (Test Cases & Results)

| ID Kasus Uji | Modul / Fitur yang Diuji | Skenario Pengujian | Hasil yang Diharapkan | Status |
| :---: | :--- | :--- | :--- | :---: |
| **TC-01** | **Linting Sintaks PHP** | Validasi seluruh file model, controller, view, dan migration via `php -l`. | Tidak ditemukan syntax error pada seluruh file. | **PASS** |
| **TC-02** | **Koneksi Database PDO** | Pengujian koneksi PDO ke database `simple_profile` via TCP `127.0.0.1:3306`. | Koneksi berhasil dan 6 tabel teridentifikasi (`companies`, `profiles`, `shareholders`, `commisioners`, `directors`, `users`). | **PASS** |
| **TC-03** | **Otentikasi Pengguna & Password Hashing** | Verifikasi pencarian user aktif `admin` dan validasi kata sandi terenkripsi (bcrypt). | Kata sandi benar (`admin`) diterima; kata sandi salah (`wrong`) ditolak. | **PASS** |
| **TC-04** | **CRUD Emiten & Relasi Eager Loading** | Pembuatan record master `Company` [BBCA] dan relasi anak (`Profile`, `Shareholder`, `Commissioner`, `Director`). | Seluruh entitas tersimpan dan berhasil di-load via query `with([...])` tanpa N+1 query. | **PASS** |
| **TC-05** | **Endpoint HTTP - Halaman Utama** | Akses `GET /index.php?r=site/index` via cURL. | Respon `HTTP 200 OK`, navbar Bootstrap 4 termuat lengkap dengan menu "Perusahaan". | **PASS** |
| **TC-06** | **Endpoint HTTP - Halaman Login** | Akses `GET /index.php?r=site/login` via cURL. | Respon `HTTP 200 OK`, form login dan token CSRF ter-render. | **PASS** |
| **TC-07** | **Endpoint HTTP - Daftar Perusahaan** | Akses `GET /index.php?r=company/index` via cURL. | Respon `HTTP 200 OK`, tabel GridView menampilkan daftar emiten dengan tombol aksi. | **PASS** |
| **TC-08** | **Endpoint HTTP - Master-Detail Tabs** | Akses `GET /index.php?r=company/view&id=1` via cURL. | Respon `HTTP 200 OK`, 4 tab Bootstrap aktif dan seluruh rincian data emiten ter-render. | **PASS** |

---

## 3. Log Eksekusi Aktual

### A. Log Eksekusi Uji Integrasi Model & Otentikasi CLI
Perintah eksekusi:
```bash
/home/asep/.phpbrew/php/php-8.4.28/bin/php -r "
require 'yii2app/vendor/autoload.php';
require 'yii2app/vendor/yiisoft/yii2/Yii.php';
\$config = require 'yii2app/config/console.php';
new yii\console\Application(\$config);
...
"
```

**Output Log Aktual:**
```text
=== TEST USER AUTHENTICATION ===
Admin user found (ID: 1)
Password validation (admin): PASS
Password validation (wrong): PASS
=== TEST COMPANY CRUD ===
Created company BBCA (ID: 1)
Created profile for BBCA
Created 2 shareholders for BBCA
Created 2 commissioners for BBCA
Created 2 directors for BBCA
=== VERIFY RELATIONS VIA EAGER LOADING ===
Company: [BBCA] PT Bank Central Asia Tbk.
Profile HQ Address: Menara BCA, Grand Indonesia, Jl. M.H. Thamrin No. 1, Jakarta 10310
Shareholders count: 2
Commissioners count: 2
Directors count: 2
=== ALL TESTS PASSED SUCCESSFULLY! ===
```

---

### B. Log Eksekusi Uji Permintaan HTTP (cURL)

#### 1. Uji Rute Daftar Perusahaan (`/index.php?r=company/index`)
```text
HTTP/1.1 200 OK
Host: 127.0.0.1:8080
X-Powered-By: PHP/8.4.28
Content-Type: text/html; charset=UTF-8
<title>Daftar Perusahaan &amp; Emiten</title>
```

#### 2. Uji Rute Master-Detail Tabs (`/index.php?r=company/view&id=1`)
```text
HTTP/1.1 200 OK
Host: 127.0.0.1:8080
X-Powered-By: PHP/8.4.28
Content-Type: text/html; charset=UTF-8
<title>[BBCA] PT Bank Central Asia Tbk.</title>
```

**Verifikasi Struktur Tab Bootstrap 4 yang Dihasilkan:**
```html
<ul id="w4" class="nav-tabs mb-3 font-weight-bold nav" role="tablist">
    <li class="nav-item"><a class="nav-link active" href="#w4-tab0" data-toggle="tab">Profil Perusahaan</a></li>
    <li class="nav-item"><a class="nav-link" href="#w4-tab1" data-toggle="tab">Pemegang Saham (2)</a></li>
    <li class="nav-item"><a class="nav-link" href="#w4-tab2" data-toggle="tab">Dewan Komisaris (2)</a></li>
    <li class="nav-item"><a class="nav-link" href="#w4-tab3" data-toggle="tab">Dewan Direksi (2)</a></li>
</ul>
```

---

## 4. Panduan Menjalankan Pengujian Secara Mandiri

### 1. Menjalankan Uji Otomatis via CLI
```bash
phpbrew use php-8.4.28
cd yii2app
# Menjalankan console application check
./yii
```

### 2. Menjalankan Server Web & Uji Manual di Browser
```bash
phpbrew use php-8.4.28
cd yii2app
./yii serve --port=8080
```
Buka browser pada alamat:
- **Halaman Utama**: `http://localhost:8080/index.php`
- **Halaman Login**: `http://localhost:8080/index.php?r=site/login` (Login: `admin` / `admin`)
- **Modul Perusahaan**: `http://localhost:8080/index.php?r=company/index`
- **Detail Emiten**: `http://localhost:8080/index.php?r=company/view&id=1`
