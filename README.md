# Tugas Besar Sisterin Kelompok 2

Sugency berkolaborasi dengan core service dari The Catalogue, suatu layanan penyedia kebutuhan kucing. Kolaborasi antara Sugency dan The Catalogue menghasilkan fitur baru, yaitu WhiskerChoice. Fitur ini menargetkan pemenuhan kebutuhan kucing yang tepat sesuai dengan jenis nya.  Kerjasama yang unik antara Sugency dan The Catalogue ini diharapkan dapat meningkatkan kualitas pengalaman mengadopsi kucing. 

## Gambaran Proyek
Proyek ini terdiri dari dua modul utama:

1. **Sugency**
   - URL: [Modul Sugency](http://sisterin-kel3.hstn.me/tubes-sisterin/public/sugency)

2. **The Catalogue**
   - URL: [Modul The Catalogue](http://sisterin-kel3.hstn.me/tubes-sisterin/public/thecatalogue)

Setiap modul memiliki fungsi spesifik, dan dokumen ini akan menjelaskan cara menavigasi dan memanfaatkannya secara efektif.

---

## Cara Mengakses Proyek

### Prasyarat
- Perangkat dengan browser web dan koneksi internet aktif.
- Tidak diperlukan perangkat lunak tambahan; aplikasi dapat diakses langsung melalui URL yang disediakan.

### Tautan Akses
- **Modul Sugency:** [http://sisterin-kel3.hstn.me/tubes-sisterin/public/sugency](http://sisterin-kel3.hstn.me/tubes-sisterin/public/sugency)
- **Modul The Catalogue:** [http://sisterin-kel3.hstn.me/tubes-sisterin/public/thecatalogue](http://sisterin-kel3.hstn.me/tubes-sisterin/public/thecatalogue)

Klik pada tautan untuk membuka modul yang sesuai di browser web Anda.

---

## Deskripsi Modul

### Modul Sugency
- **Tujuan:** Modul ini menangani tugas-tugas terkait [deskripsikan tujuan secara singkat].
- **Rute:**
  - `/` Home
  - `/signup` Formulir Pendaftaran
  - `/login` Formulir Login
  - `/logout` Logout
  - `/profile` Halaman Profil
    - `/update` Perbarui Profil
  - `/adoption` Adopsi
    - `/info/(id)` Informasi Adopsi
    - `/request/(id)` Permintaan Adopsi
    - `/history` Riwayat Adopsi
  - `/admin` Admin
    - `/animals` Daftar Hewan
    - `/animals/add` Tambah Hewan
    - `/animals/store` Simpan Hewan
    - `/animals/edit/(id)` Edit Hewan
    - `/animals/update/(id)` Perbarui Hewan
    - `/animals/delete/(id)` Hapus Hewan
    - `/requests` Daftar Permintaan
    - `/requests/update/(id)/(status)` Perbarui Status Permintaan

### Modul The Catalogue
- **Tujuan:** Modul ini menyediakan [deskripsikan tujuan secara singkat].
- **Rute:**
  - `/` Home
  - `/signup` Formulir Pendaftaran
  - `/login` Formulir Login
  - `/logout` Logout
  - `/foods` Daftar Makanan
  - `/checkout` Checkout Pesanan
  - `/confirm-checkout` Konfirmasi Pesanan
  - `/history` Riwayat Pesanan
  - `/profile` Halaman Profil
    - `/update` Perbarui Profil

---

## Cara Menjalankan Proyek dengan Docker

### Prasyarat
- Pastikan Docker sudah terinstall di sistem Anda.
- File konfigurasi Docker tersedia di dalam repositori proyek.

### Langkah-Langkah
1. **Clone Repositori**
   Clone repositori proyek ke sistem lokal Anda:
   ```bash
   git clone https://github.com/Qibaal/tubes-sisterin.git
   ```

2. **Bangun dan Jalankan Kontainer**
   Jalankan perintah berikut untuk membangun dan menjalankan kontainer Docker:
   ```bash
   docker-compose up -d
   ```

3. **Akses Aplikasi**
   Setelah kontainer berhasil berjalan, akses aplikasi melalui URL berikut:
   - Sugency: [http://localhost:8080/sugency](http://localhost:8080/sugency)
   - The Catalogue: [http://localhost:8080/thecatalogue](http://localhost:8080/thecatalogue)

4. **Hentikan Kontainer**
   Untuk menghentikan kontainer, jalankan:
   ```bash
   docker-compose down
   ```

### Catatan Tambahan
- Pastikan port `8080` tidak digunakan oleh aplikasi lain di sistem Anda.
- Jika terjadi masalah, cek log dengan perintah:
  ```bash
  docker-compose logs
  ```

---

