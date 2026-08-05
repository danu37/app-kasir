<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal')->useCurrent();
            $table->unsignedInteger('total');
            $table->unsignedInteger('bayar');
            $table->unsignedInteger('kembalian');
            $table->foreignId('user_id')->constrained('users')->restrictOnDelete();
            $table->enum('status', ['completed', 'pending', 'cancelled'])->default('completed');
            $table->text('catatan')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->index('tanggal');
        });

        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id')->constrained('transaksi')->cascadeOnDelete();
            $table->foreignId('barang_id')->constrained('barang')->restrictOnDelete();
            $table->unsignedInteger('jumlah');
            $table->unsignedInteger('harga_satuan');
            $table->unsignedInteger('subtotal');
            $table->unsignedInteger('diskon')->default(0);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
        Schema::dropIfExists('transaksi');
    }
};
