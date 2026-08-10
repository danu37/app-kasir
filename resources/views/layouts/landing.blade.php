<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Beranda' }} · Kasir Mini</title>
    <meta name="description" content="{{ $description ?? 'Kasir Mini — sistem point of sale modern untuk toko, warung, dan usaha kecil menengah.' }}">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.19.0/dist/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>
<body class="lp-body">
<header class="lp-nav" id="lpNav">
    <div class="lp-container lp-nav-inner">
        <a class="lp-brand" href="{{ route('landing.home') }}">
            @include('partials.logo-mark', ['class' => 'lp-logo-mark'])
            <span><b>Kasir Mini</b><small>Point of Sale</small></span>
        </a>

        <nav class="lp-menu" aria-label="Navigasi utama">
            <a href="{{ route('landing.home') }}" class="{{ request()->routeIs('landing.home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('landing.about') }}" class="{{ request()->routeIs('landing.about') ? 'active' : '' }}">Tentang Kami</a>
            <a href="{{ route('landing.products') }}" class="{{ request()->routeIs('landing.products') ? 'active' : '' }}">Produk</a>
            <a href="{{ route('landing.pricing') }}" class="{{ request()->routeIs('landing.pricing') ? 'active' : '' }}">Harga</a>
            <a href="{{ route('landing.faq') }}" class="{{ request()->routeIs('landing.faq') ? 'active' : '' }}">FAQ</a>
        </nav>

        <div class="lp-nav-actions">
            @auth
                <a class="lp-btn primary" href="{{ route(auth()->user()->isAdmin() ? 'dashboard' : 'cashier.index') }}">
                    <i class="ti ti-layout-dashboard"></i> Masuk Aplikasi
                </a>
            @else
                <a class="lp-btn ghost" href="{{ route('login') }}">Masuk</a>
                <a class="lp-btn primary" href="{{ route('register') }}">Daftar gratis</a>
            @endauth
        </div>

        <button class="lp-burger" type="button" id="lpBurger" aria-label="Buka menu" aria-expanded="false">
            <i class="ti ti-menu-2"></i>
        </button>
    </div>
</header>

@yield('content')

<footer class="lp-footer">
    <div class="lp-container">
        <div class="lp-footer-grid">
            <div>
                <a class="lp-brand" href="{{ route('landing.home') }}">
                    @include('partials.logo-mark', ['class' => 'lp-logo-mark'])
                    <span><b>Kasir Mini</b><small>Point of Sale</small></span>
                </a>
                <p>Sistem kasir modern untuk membantu toko Anda menjual lebih cepat, stok lebih rapi, dan laporan lebih jelas.</p>
            </div>
            <div>
                <h4>Halaman</h4>
                <ul class="lp-footer-links">
                    <li><a href="{{ route('landing.home') }}">Home</a></li>
                    <li><a href="{{ route('landing.about') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('landing.products') }}">Produk</a></li>
                    <li><a href="{{ route('landing.pricing') }}">Harga</a></li>
                    <li><a href="{{ route('landing.faq') }}">FAQ</a></li>
                </ul>
            </div>
            <div>
                <h4>Akun</h4>
                <ul class="lp-footer-links">
                    <li><a href="{{ route('login') }}">Masuk</a></li>
                    <li><a href="{{ route('register') }}">Daftar</a></li>
                    <li><a href="{{ route('password.request') }}">Lupa password</a></li>
                </ul>
            </div>
        </div>
        <div class="lp-footer-bottom">
            <span>&copy; {{ date('Y') }} Kasir Mini. Semua hak dilindungi.</span>
            <span>Dibangun untuk UMKM Indonesia</span>
        </div>
    </div>
</footer>

<script>
    const nav = document.getElementById('lpNav');
    const burger = document.getElementById('lpBurger');

    const onScroll = () => {
        if (!nav) return;
        nav.classList.toggle('is-scrolled', window.scrollY > 8);
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });

    if (burger && nav) {
        burger.addEventListener('click', () => {
            const open = nav.classList.toggle('open');
            burger.setAttribute('aria-expanded', open ? 'true' : 'false');
            burger.querySelector('i')?.classList.toggle('ti-menu-2', !open);
            burger.querySelector('i')?.classList.toggle('ti-x', open);
        });
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    document.querySelectorAll('.lp-reveal').forEach((el) => observer.observe(el));
</script>
@stack('scripts')
</body>
</html>
