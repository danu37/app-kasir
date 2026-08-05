<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'kategori_barang';
    public $timestamps = false;
    protected $fillable = ['nama_kategori', 'deskripsi'];
}
