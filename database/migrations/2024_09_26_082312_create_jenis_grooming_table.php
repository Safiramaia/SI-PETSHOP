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
        Schema::create('jenis_grooming', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jenis')->unique();
            $table->text('deskripsi')->nullable(); 
            $table->decimal('harga', 10, 2)->nullable();
            $table->string('durasi')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_grooming');
    }
};
