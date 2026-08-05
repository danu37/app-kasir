<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category')->when($request->filled('q'), fn ($query) => $query->where(function ($q) use ($request) {
            $q->where('nama_barang', 'like', '%'.$request->q.'%')->orWhere('sku', 'like', '%'.$request->q.'%');
        }))->when($request->filled('stock'), function ($query) use ($request) {
            return match ($request->stock) {
                'habis' => $query->where('stok', 0), 'menipis' => $query->whereBetween('stok', [1, 5]),
                'tersedia' => $query->where('stok', '>', 5), default => $query,
            };
        })->latest()->paginate(10)->withQueryString();
        $summary = ['total' => Product::count(), 'tersedia' => Product::where('stok', '>', 5)->count(), 'menipis' => Product::whereBetween('stok', [1, 5])->count(), 'habis' => Product::where('stok', 0)->count()];
        return view('products.index', compact('products', 'summary'));
    }

    public function create() { return view('products.form', ['product' => new Product(), 'categories' => Category::orderBy('nama_kategori')->get()]); }

    public function store(Request $request)
    {
        Product::create($this->validated($request));
        return redirect()->route('products.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(Product $product) { return view('products.form', ['product' => $product, 'categories' => Category::orderBy('nama_kategori')->get()]); }

    public function update(Request $request, Product $product)
    {
        $product->update($this->validated($request, $product));
        return redirect()->route('products.index')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        if ($product->details()->exists()) return back()->with('error', 'Barang tidak dapat dihapus karena sudah dipakai dalam transaksi.');
        $product->delete();
        return back()->with('success', 'Barang berhasil dihapus.');
    }

    private function validated(Request $request, ?Product $product = null): array
    {
        return $request->validate(['nama_barang' => ['required', 'string', 'max:200'], 'harga' => ['required', 'integer', 'min:0'], 'stok' => ['required', 'integer', 'min:0'], 'sku' => ['nullable', 'string', 'max:100', 'unique:barang,sku,'.($product?->id ?? 'NULL')], 'kategori_id' => ['nullable', 'exists:kategori_barang,id'], 'deskripsi' => ['nullable', 'string']]);
    }
}
