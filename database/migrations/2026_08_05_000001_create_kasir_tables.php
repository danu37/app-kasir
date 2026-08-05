<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kategori_barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori', 100)->unique();
            $table->text('deskripsi')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang', 200);
            $table->unsignedInteger('harga');
            $table->unsignedInteger('stok')->default(0);
            $table->string('sku', 100)->nullable()->unique();
            $table->text('deskripsi')->nullable();
            $table->foreignId('kategori_id')->nullable()->constrained('kategori_barang')->nullOnDelete();
            $table->timestamps();
            $table->index('nama_barang');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barang');
        Schema::dropIfExists('kategori_barang');
    }
};
