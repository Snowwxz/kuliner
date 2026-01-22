<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kuliner', function (Blueprint $table) {
    $table->id();
    $table->string('nama_kuliner', 150);
    $table->foreignId('kategori_id')
          ->constrained('kategori')
          ->onDelete('cascade');

    $table->foreignId('daerah_id')
          ->constrained('daerah')
          ->onDelete('cascade');

    $table->text('deskripsi');
    $table->text('bahan_utama');
    $table->text('cara_penyajian');
    $table->string('gambar')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuliner');
    }
};
