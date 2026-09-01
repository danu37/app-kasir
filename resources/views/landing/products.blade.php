@extends('layouts.landing')

@section('content')
<section class="lp-page-hero">
    <div class="lp-container lp-page-hero-grid">
        <div>
            <span class="lp-kicker">Produk</span>
            <h1>Modul lengkap untuk operasional toko</h1>
            <p>Dari kasir live hingga laporan penjualan — semua alur penting tersedia dalam satu sistem terintegrasi.</p>
        </div>
        <figure class="lp-photo lp-photo-wide lp-photo-tint lp-reveal">
            <img src="{{ asset('images/landing/photo-laptop.jpg') }}" alt="Dashboard dan laporan di laptop" loading="lazy" style="border-radius:16px; object-fit:cover;" width="800" height="500">
        </figure>
    </div>
</section>

<section class="lp-section">
    <div class="lp-container">
        <div class="lp-section-head lp-reveal">
            <span class="lp-kicker">Modul utama</span>
            <h2>Apa yang Anda dapatkan</h2>
            <p>Setiap modul fokus pada satu pekerjaan — ditampilkan sederhana, tanpa clutter.</p>
        </div>

        <div class="lp-showcase">
            <article class="lp-show-row lp-reveal">
                <div class="lp-show-media">
                    <figure class="lp-photo">
                        <img src="{{ asset('images/landing/photo-cashier.jpg') }}" alt="Kasir Live" loading="lazy" style="border-radius:12px; object-fit:cover;" width="640" height="440">
                    </figure>
                </div>
                <div class="lp-show-copy">
                    <div class="lp-product-num">01 · Kasir Live</div>
                    <h3>Penjualan di meja depan</h3>
                    <p>Keranjang, diskon, pembayaran, dan kembalian otomatis dalam satu layar cepat agar antrean tetap lancar.</p>
                </div>
            </article>

            <article class="lp-show-row lp-reveal">
                <div class="lp-show-media">
                    <figure class="lp-photo">
                        <img src="{{ asset('images/landing/photo-inventory.jpg') }}" alt="Manajemen Barang" loading="lazy" style="border-radius:12px; object-fit:cover;" width="640" height="440">
                    </figure>
                </div>
                <div class="lp-show-copy">
                    <div class="lp-product-num">02 · Manajemen Barang</div>
                    <h3>Stok & katalog rapi</h3>
                    <p>Kelola SKU, kategori, harga, dan status stok tanpa spreadsheet terpisah. Stok otomatis ikut transaksi.</p>
                </div>
            </article>

            <article class="lp-show-row lp-reveal">
                <div class="lp-show-media">
                    <figure class="lp-photo">
                        <img src="{{ asset('images/landing/photo-laptop.jpg') }}" alt="Dashboard & laporan" loading="lazy" style="border-radius:12px; object-fit:cover;" width="640" height="440">
                    </figure>
                </div>
                <div class="lp-show-copy">
                    <div class="lp-product-num">03 · Dashboard & Laporan</div>
                    <h3>Angka bisnis yang mudah dibaca</h3>
                    <p>Ringkasan pendapatan, riwayat transaksi, filter tanggal, ekspor CSV, hingga statistik produk terlaris.</p>
                </div>
            </article>

            <article class="lp-show-row lp-reveal">
                <div class="lp-show-media">
                    <figure class="lp-photo">
                        <img src="{{ asset('images/landing/photo-shop.jpg') }}" alt="Operasional toko" loading="lazy" style="border-radius:12px; object-fit:cover;" width="640" height="440">
                    </figure>
                </div>
                <div class="lp-show-copy">
                    <div class="lp-product-num">04 · Multi peran</div>
                    <h3>Admin pantau, kasir fokus jual</h3>
                    <p>Kontrol akses rapi: admin melihat performa usaha, kasir menangani layanan pelanggan di meja depan.</p>
                </div>
            </article>
        </div>
    </div>
</section>

<section class="lp-section alt">
    <div class="lp-container">
        <div class="lp-section-head center lp-reveal">
            <span class="lp-kicker">Keamanan & akun</span>
            <h2>Kontrol akses yang rapi</h2>
            <p>Setiap pengguna punya peran yang sesuai, plus pengelolaan profil dan password sendiri.</p>
        </div>
        <div class="lp-modules">
            <article class="lp-module lp-reveal">
                <div class="lp-module-icon"><i class="ti ti-shield-lock"></i></div>
                <div>
                    <h3>Peran Admin & Kasir</h3>
                    <p>Admin mengakses dashboard dan laporan. Kasir fokus pada penjualan dan layanan pelanggan.</p>
                </div>
            </article>
            <article class="lp-module lp-reveal">
                <div class="lp-module-icon"><i class="ti ti-user-circle"></i></div>
                <div>
                    <h3>Profil pengguna</h3>
                    <p>Perbarui data akun dan ganti password langsung dari dalam aplikasi.</p>
                </div>
            </article>
            <article class="lp-module lp-reveal">
                <div class="lp-module-icon"><i class="ti ti-key"></i></div>
                <div>
                    <h3>Reset password</h3>
                    <p>Alur lupa password tersedia agar akses tetap aman tanpa mengganggu operasional.</p>
                </div>
            </article>
            <article class="lp-module lp-reveal">
                <div class="lp-module-icon"><i class="ti ti-database"></i></div>
                <div>
                    <h3>Stok atomik</h3>
                    <p>Pengurangan stok saat transaksi dirancang agar data inventori tetap konsisten.</p>
                </div>
            </article>
        </div>
    </div>
</section>

<section class="lp-cta">
    <div class="lp-container lp-cta-inner">
        <div>
            <h2>Coba seluruh modul sekarang</h2>
            <p>Buat akun dan mulai kelola penjualan toko Anda dengan Kasir Mini.</p>
        </div>
        <div class="lp-cta-actions">
            @guest
            <a class="lp-btn light xl" href="{{ route('register') }}"><i class="ti ti-user-plus"></i> Daftar</a>
            <a class="lp-btn outline-light lg" href="{{ route('login') }}">Masuk</a>
            @else
            <a class="lp-btn light xl" href="{{ route(auth()->user()->isAdmin() ? 'dashboard' : 'cashier.index') }}">Buka aplikasi</a>
            @endguest
        </div>
    </div>
</section>
@endsection