<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = 'detail_transaksi';
    const UPDATED_AT = null;
    protected $fillable = ['transaksi_id', 'barang_id', 'jumlah', 'harga_satuan', 'subtotal', 'diskon'];
    protected $casts = ['jumlah' => 'integer', 'harga_satuan' => 'integer', 'subtotal' => 'integer', 'diskon' => 'integer'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaksi_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'barang_id');
    }
}
