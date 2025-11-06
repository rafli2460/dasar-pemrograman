# Proyek Tugas Kelompok

Proyek ini adalah aplikasi web sederhana yang dibuat menggunakan PHP dan MySQL. Aplikasi ini memiliki fitur registrasi dan login pengguna.

## Fitur

*   **Registrasi Pengguna:** Pengguna baru dapat mendaftar dengan membuat username dan password.
*   **Login Pengguna:** Pengguna yang sudah terdaftar dapat masuk ke dalam aplikasi.
*   **Dashboard:** Setelah berhasil login, pengguna akan diarahkan ke halaman dashboard.
*   **Logout:** Pengguna dapat keluar dari aplikasi.

## Struktur Folder

*   `config/`: Berisi file konfigurasi database (`db.php`).
*   `public/`: Berisi file-file publik seperti CSS dan JavaScript.
*   `src/`: Berisi file-file utama aplikasi.
*   `index.php`: Halaman utama yang berisi form login dan registrasi.
*   `login.php`: Skrip untuk memproses login pengguna.
*   `register.php`: Skrip untuk memproses registrasi pengguna.
*   `dashboard.php`: Halaman dashboard yang hanya bisa diakses setelah login.
*   `logout.php`: Skrip untuk memproses logout pengguna.
*   `style.css`: File CSS untuk mengatur tampilan aplikasi.

## Cara Menjalankan Proyek

1.  **Database:**
    *   Pastikan Anda memiliki server database MySQL yang sedang berjalan.
    *   Buat database baru dengan nama `db_kelompok6`.
    *   Impor struktur tabel `users` ke dalam database Anda. Anda bisa menggunakan query SQL berikut:

    ```sql
    CREATE TABLE `users` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `username` varchar(255) NOT NULL,
      `password` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
    );
    ```

2.  **Konfigurasi:**
    *   Buka file `config/db.php`.
    *   Sesuaikan pengaturan koneksi database (`$databaseHost`, `$databaseUsername`, `$databasePassword`, `$databaseName`) dengan konfigurasi server Anda.

3.  **Web Server:**
    *   Jalankan proyek ini di web server yang mendukung PHP (misalnya XAMPP, WAMP, atau server bawaan PHP).
    *   Buka browser dan akses proyek sesuai dengan alamat yang Anda konfigurasi di web server.

## Catatan

*   Aplikasi ini menggunakan `password_hash()` untuk mengenkripsi password pengguna sebelum disimpan ke database.
*   Session digunakan untuk menjaga status login pengguna.
