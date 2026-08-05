<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaksi';
    const UPDATED_AT = null;

    protected $fillable = ['tanggal', 'total', 'bayar', 'kembalian', 'user_id', 'status', 'catatan'];

    protected $casts = [
        'tanggal' => 'datetime',
        'total' => 'integer',
        'bayar' => 'integer',
        'kembalian' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'transaksi_id');
    }
}
