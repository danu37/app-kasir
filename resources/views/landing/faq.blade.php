@extends('layouts.landing')

@section('content')
<section class="lp-page-hero">
    <div class="lp-container">
        <span class="lp-kicker">FAQ</span>
        <h1>Pertanyaan yang sering diajukan</h1>
        <p>Jawaban singkat seputar penggunaan Kasir Mini untuk toko dan tim Anda.</p>
    </div>
</section>

<section class="lp-section">
    <div class="lp-container">
        <div class="lp-faq">
            <details class="lp-reveal" open>
                <summary>Apa itu Kasir Mini?<i class="ti ti-plus"></i></summary>
                <p>Kasir Mini adalah aplikasi point of sale berbasis web untuk mengelola penjualan, stok barang, riwayat transaksi, dan laporan usaha secara terpusat.</p>
            </details>
            <details class="lp-reveal">
                <summary>Siapa yang bisa menggunakan aplikasi ini?<i class="ti ti-plus"></i></summary>
                <p>Cocok untuk UMKM seperti toko kelontong, warung, cafe, hingga toko ritel kecil yang membutuhkan kasir digital tanpa kompleksitas berlebih.</p>
            </details>
            <details class="lp-reveal">
                <summary>Apa perbedaan peran Admin dan Kasir?<i class="ti ti-plus"></i></summary>
                <p>Admin biasanya mengakses dashboard, laporan, dan statistik. Kasir fokus pada modul penjualan dan transaksi harian. Keduanya tetap bisa mengelola profil masing-masing.</p>
            </details>
            <details class="lp-reveal">
                <summary>Apakah stok otomatis berkurang saat penjualan?<i class="ti ti-plus"></i></summary>
                <p>Ya. Setiap transaksi penjualan mengurangi stok produk secara otomatis agar inventori tetap sinkron dengan penjualan aktual.</p>
            </details>
            <details class="lp-reveal">
                <summary>Bisakah saya melihat laporan penjualan?<i class="ti ti-plus"></i></summary>
                <p>Bisa. Modul laporan menyediakan filter tanggal dan opsi ekspor CSV. Ada juga statistik pendapatan harian serta produk terlaris.</p>
            </details>
            <details class="lp-reveal">
                <summary>Bagaimana jika saya lupa password?<i class="ti ti-plus"></i></summary>
                <p>Gunakan tautan “Lupa password” di halaman login. Sistem akan mengirimkan link reset melalui email yang terdaftar di akun Anda.</p>
            </details>
            <details class="lp-reveal">
                <summary>Apakah perlu instalasi khusus di komputer kasir?<i class="ti ti-plus"></i></summary>
                <p>Kasir Mini berjalan di browser. Selama server aplikasi tersedia dan perangkat terhubung, Anda bisa langsung memakai kasir tanpa instalasi desktop khusus.</p>
            </details>
            <details class="lp-reveal">
                <summary>Bagaimana cara mulai memakai Kasir Mini?<i class="ti ti-plus"></i></summary>
                <p>Daftar akun baru, masuk ke aplikasi, tambahkan data barang, lalu mulai transaksi dari menu Kasir. Untuk demo internal, akun awal juga tersedia di dokumentasi setup.</p>
            </details>
        </div>
    </div>
</section>

<section class="lp-cta">
    <div class="lp-container lp-cta-inner">
        <div>
            <h2>Masih ada pertanyaan?</h2>
            <p>Mulai coba aplikasinya — atau pelajari lebih lanjut di halaman produk.</p>
        </div>
        <div class="lp-cta-actions">
            @guest
                <a class="lp-btn light xl" href="{{ route('register') }}">Buat akun</a>
            @else
                <a class="lp-btn light xl" href="{{ route(auth()->user()->isAdmin() ? 'dashboard' : 'cashier.index') }}">Buka aplikasi</a>
            @endguest
            <a class="lp-btn outline-light lg" href="{{ route('landing.products') }}">Lihat produk</a>
        </div>
    </div>
</section>
@endsection
