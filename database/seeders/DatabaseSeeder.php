<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(['username' => 'admin'], ['name' => 'Administrator', 'email' => 'admin@kasir.local', 'role' => 'admin', 'password' => Hash::make('12345')]);
        User::updateOrCreate(['username' => 'kasir1'], ['name' => 'Kasir Pertama', 'email' => 'kasir1@kasir.local', 'role' => 'kasir', 'password' => Hash::make('12345')]);
        User::updateOrCreate(['username' => 'kasir2'], ['name' => 'Kasir Kedua', 'email' => 'kasir2@kasir.local', 'role' => 'kasir', 'password' => Hash::make('12345')]);

        $categories = collect(['Minuman', 'Makanan', 'Snack', 'Bumbu'])->mapWithKeys(function ($name) {
            $category = Category::firstOrCreate(['nama_kategori' => $name]);
            return [$name => $category->id];
        });

        $products = [
            ['Susu Kapal Api 200ml', 15000, 50, 'KAI-001', 'Minuman'],
            ['Mie Instan Merk A', 3500, 100, 'MIA-001', 'Makanan'],
            ['Air Mineral 600ml', 5000, 75, 'AIR-001', 'Minuman'],
            ['Roti Tawar Putih', 20000, 25, 'RTM-001', 'Makanan'],
            ['Telur Ayam 1 Kg', 25000, 40, 'EGG-001', 'Makanan'],
            ['Beras Premium 5 Kg', 85000, 20, 'RCE-001', 'Makanan'],
            ['Gula Pasir 1 Kg', 12000, 60, 'SGR-001', 'Bumbu'],
            ['Minyak Goreng 2 L', 28000, 35, 'OIL-001', 'Bumbu'],
            ['Kopi Instan Kalengan', 18000, 45, 'KPI-001', 'Minuman'],
            ['Snack Keripik 100g', 8000, 80, 'SNK-001', 'Snack'],
        ];

        $productModels = [];
        foreach ($products as [$name, $price, $stock, $sku, $category]) {
            $productModels[] = Product::updateOrCreate(['sku' => $sku], ['nama_barang' => $name, 'harga' => $price, 'stok' => $stock, 'kategori_id' => $categories[$category]]);
        }

        $users = User::all();

        // Generate Dummy Transactions
        for ($i = 0; $i < 50; $i++) {
            $transactionDate = now()->subDays(rand(0, 30))->subHours(rand(0, 12));
            // Random items
            $itemCount = rand(1, 4);

            $total = 0;
            $details = [];
            for ($j = 0; $j < $itemCount; $j++) {
                $randomProduct = $productModels[array_rand($productModels)];
                $qty = rand(1, 3);
                $subtotal = $qty * $randomProduct->harga;
                $total += $subtotal;

                $details[] = [
                    'barang_id' => $randomProduct->id,
                    'jumlah' => $qty,
                    'harga_satuan' => $randomProduct->harga,
                    'subtotal' => $subtotal,
                    'diskon' => 0
                ];
            }

            // Add some flat discount rarely
            $transTotal = $total;
            $catatan = '';
            if (rand(1, 10) > 8) {
                $transTotal -= $transTotal * 0.1; // 10% off
                $catatan = 'Promo 10%';
            }

            $transTotal = max(0, $transTotal);
            // Calculate realistic bayar
            $bayar = (int) ceil($transTotal / 10000) * 10000;
            if ($bayar < $transTotal) $bayar += 10000; // Just to make sure it's larger

            $transaction = \App\Models\Transaction::create([
                'tanggal' => $transactionDate,
                'total' => $transTotal,
                'bayar' => $bayar,
                'kembalian' => $bayar - $transTotal,
                'user_id' => $users->random()->id,
                'status' => 'completed',
                'catatan' => $catatan
            ]);

            foreach ($details as $detail) {
                $transaction->details()->create($detail);
            }
        }
    }
}
