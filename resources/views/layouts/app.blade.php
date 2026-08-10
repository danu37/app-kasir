<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Kasir Mini' }} · Kasir Mini</title>
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.19.0/dist/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<aside class="sidebar">
    <a class="brand" href="{{ route(auth()->user()->isAdmin() ? 'dashboard' : 'cashier.index') }}"><span class="brand-icon brand-mark">@include('partials.logo-mark', ['class' => 'logo-mark'])</span><span><b>Kasir Mini</b><small>Point of Sale</small></span></a>
    <div class="nav-label">Menu Utama</div>
    @if(auth()->user()->isAdmin()) <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="ti ti-layout-dashboard"></i>Dashboard</a> @endif
    <a class="nav-link {{ request()->routeIs('cashier.*') ? 'active' : '' }}" href="{{ route('cashier.index') }}"><i class="ti ti-cash-register"></i>Kasir <span class="live">Live</span></a>
    <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}"><i class="ti ti-packages"></i>Barang</a>
    <a class="nav-link {{ request()->routeIs('transactions.create') ? 'active' : '' }}" href="{{ route('transactions.create') }}"><i class="ti ti-receipt"></i>Transaksi</a>
    <a class="nav-link {{ request()->routeIs('transactions.index', 'transactions.show') ? 'active' : '' }}" href="{{ route('transactions.index') }}"><i class="ti ti-history"></i>Riwayat</a>
    <div class="nav-label section-gap">Laporan</div>
    <a class="nav-link {{ request()->routeIs('reports.*') ? 'active' : '' }}" href="{{ route('reports.sales') }}"><i class="ti ti-chart-bar"></i>Penjualan</a>
    <a class="nav-link {{ request()->routeIs('statistics') ? 'active' : '' }}" href="{{ route('statistics') }}"><i class="ti ti-report-analytics"></i>Statistik</a>
    <div class="sidebar-user"><div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div><div class="user-copy"><b>{{ auth()->user()->name }}</b><small>{{ ucfirst(auth()->user()->role) }}</small></div><form method="POST" action="{{ route('logout') }}">@csrf<button class="icon-btn" title="Keluar"><i class="ti ti-logout"></i></button></form></div>
</aside>
<main class="main"><header class="topbar"><div><div class="eyebrow">{{ now()->translatedFormat('l, d F Y') }}</div><h1>{{ $heading ?? ($title ?? 'Kasir Mini') }}</h1></div><div class="top-actions"><a class="profile-link" href="{{ route('profile.edit') }}"><span class="avatar light">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</span><span><b>{{ auth()->user()->name }}</b><small>{{ ucfirst(auth()->user()->role) }}</small></span></a></div></header><section class="content">
    @if(session('success'))<div class="alert success"><i class="ti ti-circle-check"></i>{{ session('success') }}</div>@endif
    @if(session('error'))<div class="alert error"><i class="ti ti-alert-circle"></i>{{ session('error') }}</div>@endif
    @if($errors->any())<div class="alert error"><i class="ti ti-alert-circle"></i><span>{{ $errors->first() }}</span></div>@endif
    @yield('content')
</section></main>
@stack('scripts')
</body></html>
