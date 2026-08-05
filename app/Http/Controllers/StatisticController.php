<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index()
    {
        $start = Carbon::now()->startOfMonth();
        $previousStart = $start->copy()->subMonth();
        $previousEnd = $start->copy()->subDay();
        $current = Transaction::where('status', 'completed')->where('tanggal', '>=', $start);
        $previous = Transaction::where('status', 'completed')->whereBetween('tanggal', [$previousStart, $previousEnd]);
        $daily = Transaction::selectRaw('DATE(tanggal) as day, SUM(total) as total')->where('status', 'completed')->where('tanggal', '>=', $start)->groupBy('day')->orderBy('day')->get();
        $topProducts = DB::table('detail_transaksi')->join('barang', 'barang.id', '=', 'detail_transaksi.barang_id')->join('transaksi', 'transaksi.id', '=', 'detail_transaksi.transaksi_id')->where('transaksi.status', 'completed')->where('transaksi.tanggal', '>=', $start)->select('barang.nama_barang', DB::raw('SUM(detail_transaksi.jumlah) as units'), DB::raw('SUM(detail_transaksi.subtotal) as revenue'))->groupBy('barang.id', 'barang.nama_barang')->orderByDesc('units')->take(5)->get();
        $stats = ['revenue' => $current->sum('total'), 'transactions' => $current->count(), 'average' => $current->avg('total') ?? 0, 'items' => $topProducts->sum('units'), 'previousRevenue' => $previous->sum('total'), 'products' => Product::count()];
        return view('statistics', compact('stats', 'daily', 'topProducts'));
    }
}
