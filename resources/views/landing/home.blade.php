@extends('layouts.landing')

@section('content')
<section class="lp-hero">
    <div class="lp-container lp-hero-grid">
        <div class="lp-hero-copy">
            <div class="lp-badge">
                <span class="lp-badge-dot" aria-hidden="true"></span>
                Point of Sale modern untuk UMKM
            </div>
            <h1>Kasir cepat.<br>Stok rapi.<br><em>Usaha lebih jelas.</em></h1>
            <p class="lp-hero-lead">Kelola penjualan, inventori, dan laporan dalam satu platform yang sederhana — dirancang agar toko Anda bergerak lebih cepat setiap hari.</p>
            <div class="lp-hero-cta">
                @auth
                <a class="lp-btn primary xl" href="{{ route(auth()->user()->isAdmin() ? 'dashboard' : 'cashier.index') }}">
                    <i class="ti ti-arrow-right"></i> Buka aplikasi
                </a>
                <a class="lp-btn ghost lg" href="{{ route('landing.products') }}">Lihat produk</a>
                @else
                <a class="lp-btn primary xl" href="{{ route('register') }}">
                    Mulai gratis <i class="ti ti-arrow-right"></i>
                </a>
                <a class="lp-btn ghost lg" href="{{ route('login') }}">Masuk ke akun</a>
                @endauth
            </div>
            <div class="lp-hero-trust">
                <div class="lp-trust-item">
                    <strong>Realtime</strong>
                    <span>Kasir & stok sinkron</span>
                </div>
                <div class="lp-trust-item">
                    <strong>Multi peran</strong>
                    <span>Admin & kasir</span>
                </div>
                <div class="lp-trust-item">
                    <strong>Laporan</strong>
                    <span>Siap ekspor CSV</span>
                </div>
            </div>
        </div>

        <div class="lp-hero-visual">
            <div class="lp-hero-stage">
                <div class="lp-float-card lp-float-a">
                    <i class="ti ti-cash"></i>
                    <div>
                        <b>Transaksi cepat</b>
                        <span>Bayar & kembalian otomatis</span>
                    </div>
                </div>
                <div class="lp-illust-bare lp-illust-float">
                    <img src="{{ asset('images/landing/hero-pos.png') }}" alt="Sistem Kasir Modern" style="border-radius:16px; box-shadow:0 12px 32px -8px rgba(225,29,72,0.15); object-fit:cover;" width="640" height="480">
                </div>
                <div class="lp-float-card lp-float-b">
                    <i class="ti ti-chart-arrows-vertical"></i>
                    <div>
                        <b>Insight harian</b>
                        <span>Pantau penjualan toko</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="lp-section">
    <div class="lp-container">
        <div class="lp-section-head center lp-reveal">
            <span class="lp-kicker">Fitur inti</span>
            <h2>Semua yang dibutuhkan operasional toko</h2>
            <p>Antarmuka bersih, alur singkat, dan fokus pada pekerjaan harian — tanpa kompleksitas yang tidak perlu.</p>
        </div>
        <div class="lp-features">
            <article class="lp-feature lp-reveal">
                <div class="lp-feature-icon"><i class="ti ti-bolt"></i></div>
                <h3>Kasir kilat</h3>
                <p>Pilih produk, terapkan diskon, terima pembayaran, dan hitung kembalian dalam beberapa ketukan saja.</p>
            </article>
            <article class="lp-feature lp-reveal">
                <div class="lp-feature-icon"><i class="ti ti-package"></i></div>
                <h3>Stok akurat</h3>
                <p>Inventori otomatis berkurang saat penjualan, lengkap dengan peringatan barang yang mulai menipis.</p>
            </article>
            <article class="lp-feature lp-reveal">
                <div class="lp-feature-icon"><i class="ti ti-chart-bar"></i></div>
                <h3>Laporan jelas</h3>
                <p>Pantau pendapatan, produk terlaris, dan ekspor data penjualan untuk evaluasi usaha Anda.</p>
            </article>
        </div>
    </div>
</section>

<section class="lp-section alt">
    <div class="lp-container">
        <div class="lp-section-head lp-reveal">
            <span class="lp-kicker">Benefit</span>
            <h2>Mengapa pemilik toko memilih Kasir Mini</h2>
            <p>Dirancang seperti produk SaaS profesional: cepat dipakai, mudah dipahami, dan siap tumbuh bersama usaha Anda.</p>
        </div>
        <div class="lp-benefits">
            <article class="lp-benefit lp-reveal">
                <div class="lp-benefit-num">01</div>
                <div>
                    <h3>Siap pakai tanpa ribet</h3>
                    <p>Daftar, masukkan barang, lalu mulai transaksi. Tidak perlu setup panjang atau pelatihan berat.</p>
                </div>
            </article>
            <article class="lp-benefit lp-reveal">
                <div class="lp-benefit-num">02</div>
                <div>
                    <h3>Kontrol peran yang rapi</h3>
                    <p>Admin melihat performa bisnis. Kasir fokus melayani pelanggan di meja depan dengan aman.</p>
                </div>
            </article>
            <article class="lp-benefit lp-reveal">
                <div class="lp-benefit-num">03</div>
                <div>
                    <h3>Data penjualan terpusat</h3>
                    <p>Riwayat transaksi, detail struk, dan statistik harian tersedia kapan saja untuk keputusan cepat.</p>
                </div>
            </article>
            <article class="lp-benefit lp-reveal">
                <div class="lp-benefit-num">04</div>
                <div>
                    <h3>Tampilan modern & ringan</h3>
                    <p>UI bersih berwarna merah khas brand Anda — nyaman dipakai seharian di perangkat desktop maupun tablet.</p>
                </div>
            </article>
        </div>
    </div>
</section>

<section class="lp-section">
    <div class="lp-container lp-split">
        <div class="lp-split-visual lp-reveal">
            <div class="lp-mood-grid">
                <figure class="lp-photo lp-photo-wash lp-photo-tint">
                    <img src="{{ asset('images/landing/photo-cashier.jpg') }}" alt="Pembayaran di kasir toko" loading="lazy" style="border-radius:16px; object-fit:cover;" width="700" height="900">
                    <figcaption class="lp-photo-label">
                        <strong>Kasir yang lebih ringan</strong>
                        <span>Transaksi cepat tanpa antrean bertele-tele</span>
                    </figcaption>
                </figure>
                <figure class="lp-photo">
                    <img src="{{ asset('images/landing/photo-shop.jpg') }}" alt="Suasana toko ritel" loading="lazy" style="border-radius:16px; object-fit:cover;" width="500" height="400">
                </figure>
                <figure class="lp-photo">
                    <img src="{{ asset('images/landing/photo-owner.jpg') }}" alt="Pemilik usaha melayani pelanggan" loading="lazy" style="border-radius:16px; object-fit:cover;" width="500" height="400">
                </figure>
            </div>
        </div>
        <div class="lp-split-copy lp-reveal">
            <span class="lp-kicker">Cocok untuk UMKM</span>
            <h2>Dari warung sampai toko ritel kecil</h2>
            <p>Tinggalkan catatan manual. Kasir Mini membantu Anda mengelola penjualan digital dengan alur yang familiar bagi tim toko.</p>
            <ul class="lp-checklist">
                <li><i class="ti ti-circle-check"></i> Multi user dengan peran admin dan kasir</li>
                <li><i class="ti ti-circle-check"></i> Manajemen barang lengkap dengan SKU & kategori</li>
                <li><i class="ti ti-circle-check"></i> Riwayat transaksi dan detail struk</li>
                <li><i class="ti ti-circle-check"></i> Statistik pendapatan siap pakai</li>
            </ul>
            <div style="margin-top:28px">
                <a class="lp-btn primary lg" href="{{ route('landing.products') }}">Jelajahi produk <i class="ti ti-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<section class="lp-cta">
    <div class="lp-container lp-cta-inner">
        <div>
            <h2>Siap modernisasi kasir toko Anda?</h2>
            <p>Buat akun sekarang dan mulai catat penjualan dengan lebih rapi hari ini — gratis untuk memulai.</p>
        </div>
        <div class="lp-cta-actions">
            @guest
            <a class="lp-btn light xl" href="{{ route('register') }}"><i class="ti ti-user-plus"></i> Buat akun gratis</a>
            <a class="lp-btn outline-light lg" href="{{ route('landing.faq') }}">Baca FAQ</a>
            @else
            <a class="lp-btn light xl" href="{{ route(auth()->user()->isAdmin() ? 'dashboard' : 'cashier.index') }}">Masuk aplikasi</a>
            @endguest
        </div>
    </div>
</section>
@endsection