@extends('layouts.landing')

@section('content')
<section class="lp-page-hero">
    <div class="lp-container lp-page-hero-grid">
        <div>
            <span class="lp-kicker">Tentang Kami</span>
            <h1>Membantu UMKM menjual dengan lebih percaya diri</h1>
            <p>Kasir Mini lahir dari kebutuhan toko sehari-hari: transaksi cepat, stok akurat, dan laporan yang tidak membingungkan.</p>
        </div>
        <div class="lp-hero-stage lp-reveal">
            <div class="lp-illust-bare">
                <img src="{{ asset('images/landing/hero-pos.png') }}" alt="Ilustrasi tim Kasir Mini" style="border-radius:16px; box-shadow:0 12px 32px -8px rgba(225,29,72,0.15); object-fit:cover;" width="520" height="400">
            </div>
        </div>
    </div>
</section>

<section class="lp-section">
    <div class="lp-container lp-split">
        <div class="lp-reveal">
            <span class="lp-kicker">Cerita kami</span>
            <h2>Sederhana di depan,<br>andal di belakang</h2>
            <p class="lp-split-copy" style="margin:0 0 16px;color:var(--lp-muted);font-size:15px;line-height:1.7">
                Banyak pemilik usaha masih mengandalkan catatan kertas atau spreadsheet yang mudah ketinggalan. Kami merancang Kasir Mini agar tim kasir bisa langsung pakai, sementara admin tetap mendapat gambaran bisnis yang jelas.
            </p>
            <p style="margin:0;color:var(--lp-muted);font-size:15px;line-height:1.7">
                Fokus kami bukan fitur yang berlebihan, melainkan alur kerja yang tepat: jual, catat, pantau, dan evaluasi.
            </p>
        </div>
        <div class="lp-split-visual lp-reveal">
            <figure class="lp-photo lp-photo-wide lp-photo-tint">
                <img src="{{ asset('images/landing/photo-team.jpg') }}" alt="Tim UMKM berkolaborasi" loading="lazy" style="border-radius:16px; object-fit:cover;" width="800" height="500">
            </figure>
            <div class="lp-split-caption">
                <strong>Dibangun untuk ritme toko nyata</strong>
                <span>Antrean pelanggan, stok berubah cepat, keputusan berbasis data hari ini.</span>
            </div>
        </div>
    </div>
</section>

<section class="lp-section alt">
    <div class="lp-container">
        <div class="lp-section-head center lp-reveal">
            <span class="lp-kicker">Nilai kami</span>
            <h2>Tiga prinsip yang kami pegang</h2>
            <p>Setiap layar dan alur dirancang agar kerja kasir lebih ringan, bukan lebih rumit.</p>
        </div>
        <div class="lp-values">
            <article class="lp-value lp-reveal">
                <div class="lp-value-line"></div>
                <h3>Kecepatan</h3>
                <p>Antrean tidak boleh menunggu. Alur kasir dibuat ringkas agar transaksi selesai tanpa hambatan.</p>
            </article>
            <article class="lp-value lp-reveal">
                <div class="lp-value-line"></div>
                <h3>Ketelitian</h3>
                <p>Stok dan penjualan harus selaras. Setiap transaksi mengurangi inventori secara otomatis dan aman.</p>
            </article>
            <article class="lp-value lp-reveal">
                <div class="lp-value-line"></div>
                <h3>Kejelasan</h3>
                <p>Dashboard, statistik, dan laporan penjualan menampilkan angka yang mudah dipahami pemilik usaha.</p>
            </article>
        </div>
    </div>
</section>

<section class="lp-section">
    <div class="lp-container">
        <div class="lp-split" style="margin-bottom:40px">
            <div class="lp-split-visual lp-reveal">
                <figure class="lp-photo lp-photo-wide">
                    <img src="{{ asset('images/landing/photo-owner.jpg') }}" alt="Pemilik usaha di toko" loading="lazy" style="border-radius:16px; object-fit:cover;" width="800" height="500">
                </figure>
            </div>
            <div class="lp-reveal">
                <span class="lp-kicker">Untuk siapa</span>
                <h2>Siapa yang paling diuntungkan</h2>
                <p style="margin:0;color:var(--lp-muted);font-size:15px;line-height:1.7">Kasir Mini cocok untuk usaha yang ingin digitalisasi tanpa proses implementasi yang berat.</p>
            </div>
        </div>
        <div class="lp-modules">
            <article class="lp-module lp-reveal">
                <div class="lp-module-icon"><i class="ti ti-shopping-bag"></i></div>
                <div>
                    <h3>Toko kelontong & minimarket kecil</h3>
                    <p>Kelola ratusan SKU, pantau stok menipis, dan selesaikan pembayaran lebih cepat.</p>
                </div>
            </article>
            <article class="lp-module lp-reveal">
                <div class="lp-module-icon"><i class="ti ti-cup"></i></div>
                <div>
                    <h3>Warung kopi & cafe</h3>
                    <p>Catat penjualan harian, produk andalan, dan performa kasir dalam satu tempat.</p>
                </div>
            </article>
            <article class="lp-module lp-reveal">
                <div class="lp-module-icon"><i class="ti ti-shirt"></i></div>
                <div>
                    <h3>Toko fashion & aksesoris</h3>
                    <p>Organisasi kategori barang lebih rapi dengan riwayat transaksi yang bisa ditelusuri.</p>
                </div>
            </article>
            <article class="lp-module lp-reveal">
                <div class="lp-module-icon"><i class="ti ti-users"></i></div>
                <div>
                    <h3>Tim dengan multi peran</h3>
                    <p>Admin mengawasi bisnis; kasir fokus melayani pelanggan tanpa akses yang tidak perlu.</p>
                </div>
            </article>
        </div>
    </div>
</section>

<section class="lp-cta">
    <div class="lp-container lp-cta-inner">
        <div>
            <h2>Ingin melihat langsung bagaimana kerjanya?</h2>
            <p>Jelajahi modul produk atau buat akun untuk mencoba Kasir Mini.</p>
        </div>
        <div class="lp-cta-actions">
            <a class="lp-btn light xl" href="{{ route('landing.products') }}">Lihat produk</a>
            @guest
            <a class="lp-btn outline-light lg" href="{{ route('register') }}">Daftar sekarang</a>
            @endguest
        </div>
    </div>
</section>
@endsection