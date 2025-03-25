<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('grooming', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_jenis')->constrained('jenis_grooming')->onDelete('cascade');
            $table->dateTime('tanggal_booking');
            $table->string('nama_kucing');
            $table->decimal('berat', 5, 2); 
            $table->integer('umur'); 
            $table->decimal('harga_total', 10, 2);
            $table->enum('status', ['menunggu', 'selesai', 'dibatalkan', 'payment'])->default('menunggu');
            // $table->boolean('is_deleted')->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grooming');
    }
};
