<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Password · Kasir Mini</title>
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.19.0/dist/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="login-page">
    <div class="login-orb orb-a"></div><div class="login-orb orb-b"></div>
    <div class="login-card">
        <div class="brand login-brand"><span class="brand-icon brand-mark">@include('partials.logo-mark', ['class' => 'logo-mark'])</span><span><b>Kasir Mini</b><small>Sistem Point of Sale</small></span></div>
        <h1>Lupa password?</h1>
        <p class="muted">Masukkan email akun Anda. Kami akan mengirimkan link untuk membuat password baru.</p>
        @if(session('success'))<div class="alert success">{{ session('success') }}</div>@endif
        @if(session('error'))<div class="alert error">{{ session('error') }}</div>@endif
        @if($errors->any())<div class="alert error">{{ $errors->first() }}</div>@endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <label>Email Akun<input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus></label>
            <button class="btn primary full" type="submit"><i class="ti ti-mail-forward"></i> Kirim Link Reset</button>
        </form>
        <p class="login-help"><a href="{{ route('login') }}">← Kembali ke login</a></p>
    </div>
</body>
</html>
