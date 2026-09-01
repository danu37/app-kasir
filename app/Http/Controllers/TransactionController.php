<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::with('user')->when($request->filled('q'), fn($q) => $q->where('id', $request->q)->orWhereDate('tanggal', $request->q))->latest('tanggal')->paginate(15)->withQueryString();
        $totals = ['count' => Transaction::count(), 'total' => Transaction::where('status', 'completed')->sum('total'), 'change' => Transaction::where('status', 'completed')->sum('kembalian')];
        return view('transactions.index', compact('transactions', 'totals'));
    }

    public function create()
    {
        return view('transactions.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['harga' => ['required', 'integer', 'min:0'], 'diskon' => ['required', 'numeric', 'min:0', 'max:100'], 'bayar' => ['required', 'integer', 'min:0'], 'catatan' => ['nullable', 'string']]);
        $discount = (int) round($data['harga'] * $data['diskon'] / 100);
        $total = max(0, $data['harga'] - $discount);
        if ($data['bayar'] < $total) return back()->withInput()->with('error', 'Nominal bayar kurang dari total.');
        $transaction = Transaction::create(['tanggal' => now(), 'total' => $total, 'bayar' => $data['bayar'], 'kembalian' => $data['bayar'] - $total, 'user_id' => auth()->id(), 'status' => 'completed', 'catatan' => $data['catatan'] ?? null]);
        return redirect()->route('transactions.show', $transaction)->with('success', 'Transaksi berhasil disimpan.');
    }

    public function show(Transaction $transaction)
    {
        $transaction->load(['details.product', 'user']);
        return view('transactions.show', compact('transaction'));
    }

    public function print(Transaction $transaction)
    {
        $transaction->load(['details.product', 'user']);
        return view('transactions.print', compact('transaction'));
    }
}
