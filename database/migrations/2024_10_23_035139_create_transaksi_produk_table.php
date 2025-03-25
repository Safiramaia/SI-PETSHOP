<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi_produk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade'); 
            $table->string('kode_pesanan')->unique()->nullable(); 
            $table->enum('metode_pembayaran', ['cash', 'credit_card'])->default('cash');
            $table->decimal('total_harga', 10, 2);
            $table->decimal('jumlah_uang', 10, 2)->nullable(); 
            $table->decimal('kembalian', 10, 2)->nullable();
            $table->timestamp('tanggal_transaksi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('status', ['pending', 'completed', 'canceled'])->default('pending');
            $table->timestamps(); 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_produk');
    }
};
