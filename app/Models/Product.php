<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = ['nama_barang', 'harga', 'stok', 'sku', 'deskripsi', 'kategori_id'];

    protected $casts = ['harga' => 'integer', 'stok' => 'integer'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'barang_id');
    }
}
