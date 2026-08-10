@extends('layouts.landing')

@section('content')
<section class="lp-page-hero">
    <div class="lp-container" style="text-align:center;max-width:680px;margin-inline:auto">
        <span class="lp-kicker">Harga</span>
        <h1>Paket sederhana,<br>nilai yang jelas</h1>
        <p style="margin-inline:auto">Pilih paket yang sesuai skala toko Anda. Mulai gratis, upgrade kapan saja saat bisnis berkembang.</p>
    </div>
</section>

<section class="lp-section" style="padding-top:40px">
    <div class="lp-container">
        <div class="lp-billing lp-reveal" id="lpBilling" data-period="monthly">
            <button type="button" class="lp-billing-btn is-active" data-period="monthly">Bulanan</button>
            <button type="button" class="lp-billing-btn" data-period="yearly">
                Tahunan
                <span class="lp-save-badge">Hemat</span>
            </button>
        </div>

        <div class="lp-pricing">
            {{-- Gratis --}}
            <article class="lp-price-card lp-reveal">
                <div class="lp-price-head">
                    <h3>Gratis</h3>
                    <p>Cocok untuk mencoba Kasir Mini di toko kecil.</p>
                </div>
                <div class="lp-price-amount">
                    <strong data-price-monthly="Rp 0" data-price-yearly="Rp 0">Rp 0</strong>
                    <span data-suffix-monthly="/bulan" data-suffix-yearly="/tahun">/bulan</span>
                </div>
                <ul class="lp-price-features">
                    <li><i class="ti ti-check"></i> 1 akun kasir</li>
                    <li><i class="ti ti-check"></i> Hingga 50 produk</li>
                    <li><i class="ti ti-check"></i> Kasir live & keranjang</li>
                    <li><i class="ti ti-check"></i> Riwayat transaksi dasar</li>
                    <li class="is-muted"><i class="ti ti-minus"></i> Laporan & ekspor CSV</li>
                    <li class="is-muted"><i class="ti ti-minus"></i> Multi cabang</li>
                </ul>
                @guest
                    <a class="lp-btn ghost lg lp-price-cta" href="{{ route('register') }}">Mulai gratis</a>
                @else
                    <a class="lp-btn ghost lg lp-price-cta" href="{{ route(auth()->user()->isAdmin() ? 'dashboard' : 'cashier.index') }}">Buka aplikasi</a>
                @endguest
            </article>

            {{-- Pro — highlighted --}}
            <article class="lp-price-card is-featured lp-reveal">
                <div class="lp-popular">Paling Populer</div>
                <div class="lp-price-head">
                    <h3>Pro</h3>
                    <p>Untuk toko yang butuh operasional lengkap setiap hari.</p>
                </div>
                <div class="lp-price-amount">
                    <strong data-price-monthly="Rp 99.000" data-price-yearly="Rp 990.000">Rp 99.000</strong>
                    <span data-suffix-monthly="/bulan" data-suffix-yearly="/tahun">/bulan</span>
                </div>
                <p class="lp-price-note" data-note-monthly="Tagihan bulanan, batalkan kapan saja" data-note-yearly="Setara Rp 82.500/bulan · hemat 2 bulan">Tagihan bulanan, batalkan kapan saja</p>
                <ul class="lp-price-features">
                    <li><i class="ti ti-check"></i> Hingga 5 akun pengguna</li>
                    <li><i class="ti ti-check"></i> Produk & stok tanpa batas</li>
                    <li><i class="ti ti-check"></i> Kasir, diskon & kembalian</li>
                    <li><i class="ti ti-check"></i> Dashboard & statistik</li>
                    <li><i class="ti ti-check"></i> Laporan penjualan + ekspor CSV</li>
                    <li><i class="ti ti-check"></i> Peringatan stok menipis</li>
                </ul>
                @guest
                    <a class="lp-btn primary lg lp-price-cta" href="{{ route('register') }}">Coba Pro</a>
                @else
                    <a class="lp-btn primary lg lp-price-cta" href="{{ route(auth()->user()->isAdmin() ? 'dashboard' : 'cashier.index') }}">Lanjutkan Pro</a>
                @endguest
            </article>

            {{-- Bisnis --}}
            <article class="lp-price-card lp-reveal">
                <div class="lp-price-head">
                    <h3>Bisnis</h3>
                    <p>Untuk skala lebih besar dengan kontrol dan dukungan prioritas.</p>
                </div>
                <div class="lp-price-amount">
                    <strong data-price-monthly="Rp 249.000" data-price-yearly="Rp 2.490.000">Rp 249.000</strong>
                    <span data-suffix-monthly="/bulan" data-suffix-yearly="/tahun">/bulan</span>
                </div>
                <p class="lp-price-note" data-note-monthly="Termasuk onboarding singkat" data-note-yearly="Setara Rp 207.500/bulan · hemat 2 bulan">Termasuk onboarding singkat</p>
                <ul class="lp-price-features">
                    <li><i class="ti ti-check"></i> Pengguna & peran tanpa batas</li>
                    <li><i class="ti ti-check"></i> Semua fitur paket Pro</li>
                    <li><i class="ti ti-check"></i> Multi cabang / outlet</li>
                    <li><i class="ti ti-check"></i> Laporan lanjutan</li>
                    <li><i class="ti ti-check"></i> Dukungan prioritas</li>
                    <li><i class="ti ti-check"></i> Konsultasi setup awal</li>
                </ul>
                @guest
                    <a class="lp-btn ghost lg lp-price-cta" href="{{ route('register') }}">Hubungi penjualan</a>
                @else
                    <a class="lp-btn ghost lg lp-price-cta" href="{{ route('landing.faq') }}">Pelajari lebih lanjut</a>
                @endguest
            </article>
        </div>
    </div>
</section>

<section class="lp-section alt" style="padding-block:64px">
    <div class="lp-container">
        <div class="lp-section-head center lp-reveal" style="margin-bottom:32px">
            <span class="lp-kicker">Termasuk di semua paket</span>
            <h2>Semua paket termasuk:</h2>
        </div>
        <div class="lp-included lp-reveal">
            <div class="lp-included-item">
                <i class="ti ti-shield-lock"></i>
                <div>
                    <strong>Keamanan data</strong>
                    <span>Akses terlindungi dengan peran pengguna</span>
                </div>
            </div>
            <div class="lp-included-item">
                <i class="ti ti-layout-dashboard"></i>
                <div>
                    <strong>Akses dashboard</strong>
                    <span>Pantau aktivitas toko dari satu layar</span>
                </div>
            </div>
            <div class="lp-included-item">
                <i class="ti ti-refresh"></i>
                <div>
                    <strong>Update sistem</strong>
                    <span>Perbaikan & peningkatan berkala</span>
                </div>
            </div>
            <div class="lp-included-item">
                <i class="ti ti-headset"></i>
                <div>
                    <strong>Dukungan pengguna</strong>
                    <span>Bantuan dasar via kanal dukungan</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="lp-section">
    <div class="lp-container">
        <div class="lp-section-head center lp-reveal">
            <span class="lp-kicker">FAQ harga</span>
            <h2>Pertanyaan seputar paket</h2>
            <p>Jawaban singkat sebelum Anda memilih paket.</p>
        </div>
        <div class="lp-faq">
            <details class="lp-reveal" open>
                <summary>Apakah paket Gratis benar-benar gratis?<i class="ti ti-plus"></i></summary>
                <p>Ya. Paket Gratis dapat dipakai tanpa biaya untuk memulai. Batasan ada pada jumlah produk dan pengguna — upgrade ke Pro saat toko membutuhkan lebih banyak kapasitas.</p>
            </details>
            <details class="lp-reveal">
                <summary>Bagaimana cara pembayaran?<i class="ti ti-plus"></i></summary>
                <p>Pembayaran dapat dilakukan secara bulanan atau tahunan. Detail metode pembayaran akan dikonfirmasi saat Anda mengaktifkan paket berbayar.</p>
            </details>
            <details class="lp-reveal">
                <summary>Bisakah upgrade atau downgrade paket?<i class="ti ti-plus"></i></summary>
                <p>Bisa. Anda dapat naik ke Pro atau Bisnis kapan saja. Downgrade juga tersedia; penyesuaian fitur dan kuota akan mengikuti paket baru pada periode berikutnya.</p>
            </details>
            <details class="lp-reveal">
                <summary>Bagaimana jika ingin membatalkan?<i class="ti ti-plus"></i></summary>
                <p>Anda dapat membatalkan perpanjangan sebelum periode berikutnya. Akses paket berbayar tetap aktif hingga akhir masa yang sudah dibayar.</p>
            </details>
        </div>
    </div>
</section>

<section class="lp-cta">
    <div class="lp-container lp-cta-inner">
        <div>
            <h2>Siap mengelola toko dengan lebih mudah?</h2>
            <p>Mulai dari paket Gratis dan tingkatkan kapasitas saat bisnis Anda tumbuh.</p>
        </div>
        <div class="lp-cta-actions">
            @guest
                <a class="lp-btn light xl" href="{{ route('register') }}"><i class="ti ti-rocket"></i> Mulai gratis sekarang</a>
                <a class="lp-btn outline-light lg" href="{{ route('landing.products') }}">Lihat produk</a>
            @else
                <a class="lp-btn light xl" href="{{ route(auth()->user()->isAdmin() ? 'dashboard' : 'cashier.index') }}">Buka aplikasi</a>
            @endguest
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    (function () {
        const root = document.getElementById('lpBilling');
        if (!root) return;

        const buttons = root.querySelectorAll('.lp-billing-btn');
        const amounts = document.querySelectorAll('.lp-price-amount strong');
        const suffixes = document.querySelectorAll('.lp-price-amount span');
        const notes = document.querySelectorAll('.lp-price-note');

        const apply = (period) => {
            root.dataset.period = period;
            buttons.forEach((btn) => {
                btn.classList.toggle('is-active', btn.dataset.period === period);
            });

            amounts.forEach((el) => {
                el.textContent = el.getAttribute('data-price-' + period) || el.textContent;
            });
            suffixes.forEach((el) => {
                el.textContent = el.getAttribute('data-suffix-' + period) || el.textContent;
            });
            notes.forEach((el) => {
                const next = el.getAttribute('data-note-' + period);
                if (next) el.textContent = next;
            });
        };

        buttons.forEach((btn) => {
            btn.addEventListener('click', () => apply(btn.dataset.period));
        });
    })();
</script>
@endpush
