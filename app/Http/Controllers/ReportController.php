<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaction::with(['user', 'details.product'])->where('status', 'completed');
        if ($request->filled('from')) $query->whereDate('tanggal', '>=', $request->from);
        if ($request->filled('to')) $query->whereDate('tanggal', '<=', $request->to);
        $transactions = $query->latest('tanggal')->paginate(15)->withQueryString();
        $summary = ['count' => (clone $query)->count(), 'total' => (clone $query)->sum('total'), 'average' => (clone $query)->avg('total') ?? 0];
        return view('reports.sales', compact('transactions', 'summary'));
    }

    public function export(Request $request)
    {
        $transactions = Transaction::where('status', 'completed')->when($request->from, fn ($q) => $q->whereDate('tanggal', '>=', $request->from))->when($request->to, fn ($q) => $q->whereDate('tanggal', '<=', $request->to))->latest('tanggal')->get();
        return response()->streamDownload(function () use ($transactions) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID', 'Tanggal', 'Total', 'Bayar', 'Kembalian', 'Status']);
            foreach ($transactions as $transaction) fputcsv($handle, [$transaction->id, $transaction->tanggal->format('Y-m-d H:i'), $transaction->total, $transaction->bayar, $transaction->kembalian, $transaction->status]);
            fclose($handle);
        }, 'laporan-penjualan.csv', ['Content-Type' => 'text/csv']);
    }
}
