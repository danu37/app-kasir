<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register · Kasir Mini</title>
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.19.0/dist/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .btn-google {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background-color: #ffffff;
            color: #3c4043;
            border: 1px solid #dadce0;
            font-weight: 600;
            padding: 10px 16px;
            border-radius: 8px;
            transition: background-color 0.2s, box-shadow 0.2s;
            text-decoration: none;
            width: 100%;
            margin-bottom: 24px;
            font-family: inherit;
            box-sizing: border-box;
        }

        .btn-google:hover {
            background-color: #f8f9fa;
            box-shadow: 0 1px 3px rgba(60, 64, 67, 0.3);
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
            color: #8c8c8c;
            font-size: 0.875rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }

        .divider:not(:empty)::before {
            margin-right: .75em;
        }

        .divider:not(:empty)::after {
            margin-left: .75em;
        }
    </style>
</head>

<body class="login-page">
    <div class="login-orb orb-a"></div>
    <div class="login-orb orb-b"></div>
    <div class="login-card">
        <div class="brand login-brand"><span class="brand-icon brand-mark">@include('partials.logo-mark', ['class' => 'logo-mark'])</span><span><b>Kasir Mini</b><small>Sistem Point of Sale</small></span></div>
        <h1>Buat akun baru</h1>
        <p class="muted">Daftar sebagai kasir untuk mulai menggunakan sistem.</p>
        @if($errors->any())<div class="alert error">{{ $errors->first() }}</div>@endif
        <form method="POST" action="{{ route('register.store') }}">
            @csrf
            <label>Nama Lengkap<input name="name" value="{{ old('name') }}" required autofocus></label>
            <label>Username<input name="username" value="{{ old('username') }}" required></label>
            <label>Email<input type="email" name="email" value="{{ old('email') }}" required></label>
            <label>Password<input type="password" name="password" required></label>
            <label>Konfirmasi Password<input type="password" name="password_confirmation" required></label>
            <button class="btn primary full" type="submit"><i class="ti ti-user-plus"></i> Daftar Sekarang</button>
        </form>

        <div class="divider">atau</div>
        <a href="{{ route('google.login') }}" class="btn-google">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="18px" height="18px">
                <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" />
                <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" />
                <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.519-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" />
                <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z" />
            </svg>
            Daftar dengan Google
        </a>

        <p class="login-help">Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
    </div>
</body>

</html>