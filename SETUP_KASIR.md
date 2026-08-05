# Kasir Mini — Laravel

Aplikasi lama sudah dipindahkan ke `app-kasir` berbasis Laravel 12.

## Menjalankan lokal

1. Pastikan Apache/Nginx dan MySQL Laragon aktif.
2. Database `app-kasir` akan dibuat dengan perintah berikut jika belum ada:

   ```sql
   CREATE DATABASE `app-kasir` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

3. Dari folder ini jalankan:

   ```bash
   php artisan migrate --seed
   php artisan serve
   ```

   Atau arahkan document root Apache/Laragon ke folder `app-kasir/public`.

## Akun awal

| Username | Password | Role |
| --- | --- | --- |
| admin | 12345 | admin |
| kasir1 | 12345 | kasir |
| kasir2 | 12345 | kasir |

Segera ganti password melalui menu Profil sebelum dipakai di production.

## Email lupa password

Fitur lupa password memakai password broker Laravel dan mengirim link reset melalui SMTP. Salin konfigurasi SMTP ke `.env` lalu bersihkan cache konfigurasi:

```env
MAIL_MAILER=smtp
MAIL_SCHEME=tls
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=alamat-email-anda@gmail.com
MAIL_PASSWORD=app-password-gmail
MAIL_FROM_ADDRESS=alamat-email-anda@gmail.com
MAIL_FROM_NAME="Kasir Mini"
```

Untuk Gmail, gunakan App Password, bukan password login biasa. Setelah mengubah `.env`, jalankan `php artisan config:clear`. Tabel `password_reset_tokens` sudah dibuat oleh migration Laravel.

## Modul Laravel

- Dashboard: ringkasan pendapatan, transaksi, dan stok menipis.
- Kasir: keranjang produk, diskon, pembayaran, kembalian, dan pengurangan stok atomik.
- Barang: tambah, edit, hapus, cari, filter stok, SKU, kategori.
- Transaksi: transaksi manual, detail struk, dan riwayat.
- Penjualan: filter tanggal dan export CSV.
- Statistik: pendapatan harian dan produk terlaris.
- Profil: ubah data akun dan password.

Password pada seeder sudah memakai hashing Laravel. Kode PHP lama di root tetap disimpan sebagai arsip sampai aplikasi baru selesai dipasang di web server.
