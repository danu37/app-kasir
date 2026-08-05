<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CashierController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->where('stok', '>', 0)->orderBy('nama_barang')->get();
        return view('cashier.index', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(['cart' => ['required', 'array', 'min:1'], 'cart.*.id' => ['required', 'integer'], 'cart.*.qty' => ['required', 'integer', 'min:1'], 'discount' => ['nullable', 'numeric', 'min:0', 'max:100'], 'bayar' => ['required', 'integer', 'min:0']]);
        $discount = (float) ($data['discount'] ?? 0);

        try {
            $transaction = DB::transaction(function () use ($data, $discount) {
                $cart = collect($data['cart'])->groupBy('id')->map(fn ($items) => $items->sum('qty'));
                $products = Product::whereIn('id', $cart->keys())->lockForUpdate()->get()->keyBy('id');
                if ($products->count() !== $cart->count()) throw new \RuntimeException('Ada barang yang tidak ditemukan.');

                $subtotal = 0;
                foreach ($cart as $id => $qty) {
                    $product = $products[$id];
                    if ($qty > $product->stok) throw new \RuntimeException("Stok {$product->nama_barang} tidak mencukupi.");
                    $subtotal += $product->harga * $qty;
                }
                $discountAmount = (int) round($subtotal * $discount / 100);
                $total = max(0, $subtotal - $discountAmount);
                if ($data['bayar'] < $total) throw new \RuntimeException('Nominal bayar kurang dari total.');

                $transaction = Transaction::create(['tanggal' => now(), 'total' => $total, 'bayar' => $data['bayar'], 'kembalian' => $data['bayar'] - $total, 'user_id' => auth()->id(), 'status' => 'completed']);
                foreach ($cart as $id => $qty) {
                    $product = $products[$id];
                    $transaction->details()->create(['barang_id' => $id, 'jumlah' => $qty, 'harga_satuan' => $product->harga, 'subtotal' => $product->harga * $qty, 'diskon' => $discountAmount]);
                    $product->decrement('stok', $qty);
                }
                return $transaction;
            });
        } catch (\RuntimeException $exception) {
            return back()->withInput()->with('error', $exception->getMessage());
        }

        return redirect()->route('transactions.show', $transaction)->with('success', 'Transaksi berhasil diproses.');
    }
}
