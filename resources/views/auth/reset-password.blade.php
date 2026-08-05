<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password · Kasir Mini</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.19.0/dist/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="login-page">
    <div class="login-orb orb-a"></div><div class="login-orb orb-b"></div>
    <div class="login-card">
        <div class="brand login-brand"><span class="brand-icon"><i class="ti ti-building-store"></i></span><span><b>Kasir Mini</b><small>Sistem Point of Sale</small></span></div>
        <h1>Buat password baru</h1>
        <p class="muted">Masukkan password baru untuk akun Anda.</p>
        @if(session('error'))<div class="alert error">{{ session('error') }}</div>@endif
        @if($errors->any())<div class="alert error">{{ $errors->first() }}</div>@endif
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <label>Email Akun<input type="email" name="email" value="{{ old('email', $email) }}" required></label>
            <label>Password Baru<input type="password" name="password" required></label>
            <label>Konfirmasi Password<input type="password" name="password_confirmation" required></label>
            <button class="btn primary full" type="submit"><i class="ti ti-lock-check"></i> Simpan Password Baru</button>
        </form>
    </div>
</body>
</html>
