<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('landing.home', [
            'title' => 'Beranda',
            'description' => 'Kasir Mini — sistem point of sale modern untuk toko, warung, dan usaha kecil menengah.',
        ]);
    }

    public function about()
    {
        return view('landing.about', [
            'title' => 'Tentang Kami',
            'description' => 'Kenali Kasir Mini: misi, nilai, dan untuk siapa aplikasi kasir ini dibuat.',
        ]);
    }

    public function products()
    {
        return view('landing.products', [
            'title' => 'Produk',
            'description' => 'Modul Kasir Mini: kasir live, manajemen barang, transaksi, dashboard, laporan, dan statistik.',
        ]);
    }

    public function pricing()
    {
        return view('landing.pricing', [
            'title' => 'Harga',
            'description' => 'Paket harga Kasir Mini: Gratis, Pro, dan Bisnis — pilih yang sesuai kebutuhan toko Anda.',
        ]);
    }

    public function faq()
    {
        return view('landing.faq', [
            'title' => 'FAQ',
            'description' => 'Pertanyaan umum seputar penggunaan Kasir Mini untuk toko dan UMKM.',
        ]);
    }
}
