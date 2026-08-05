<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $todayTransactions = Transaction::whereDate('tanggal', $today)->where('status', 'completed');
        $stats = ['revenue' => (clone $todayTransactions)->sum('total'), 'transactions' => (clone $todayTransactions)->count(), 'products' => Product::count(), 'lowStock' => Product::where('stok', '<=', 5)->count()];
        $recentTransactions = Transaction::with('user')->latest('tanggal')->take(8)->get();
        $lowStockProducts = Product::where('stok', '<=', 5)->orderBy('stok')->take(5)->get();
        return view('dashboard', compact('stats', 'recentTransactions', 'lowStockProducts'));
    }
}
