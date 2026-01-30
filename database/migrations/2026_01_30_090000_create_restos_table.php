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
        Schema::create('restos', function (Blueprint $table) {
            $table->id();
            $table->string('nama_resto');
            $table->text('deskripsi')->nullable();
            $table->string('alamat')->nullable();
            $table->string('jam_buka')->nullable();
            $table->string('jam_tutup')->nullable();
            $table->string('gambar')->nullable();
            $table->foreignId('daerah_id')->constrained('daerah')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restos');
    }
};
