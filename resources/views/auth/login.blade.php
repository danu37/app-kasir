<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login · Kasir Mini</title>
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.19.0/dist/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="login-page">
    <div class="login-orb orb-a"></div>
    <div class="login-orb orb-b"></div>
    <div class="login-card">
        <div class="brand login-brand">
            <span class="brand-icon brand-mark">@include('partials.logo-mark', ['class' => 'logo-mark'])</span>
            <span><b>Kasir Mini</b><small>Sistem Point of Sale</small></span>
        </div>
        <h1>Selamat datang 👋</h1>
        <p class="muted">Masuk untuk mulai mengelola transaksi Anda.</p>

        @if(session('error'))
            <div class="alert error">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('login.store') }}">
            @csrf
            <label>Username
                <input name="username" value="{{ old('username') }}" placeholder="Masukkan username" required autofocus>
            </label>
            <label>Password
                <input type="password" name="password" placeholder="Masukkan password" required>
            </label>
            <label class="check"><input type="checkbox" name="remember"> Ingat saya</label>
            <button class="btn primary full" type="submit"><i class="ti ti-login-2"></i> Masuk ke Sistem</button>
        </form>
        <p class="login-help"><a href="{{ route('password.request') }}">Lupa password?</a> · <a href="{{ route('register') }}">Buat akun baru</a></p>
    </div>
</body>
</html>
