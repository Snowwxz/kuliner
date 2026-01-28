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
        Schema::create('ulasan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kuliner_id')->constrained('kuliner')->onDelete('cascade');
            $table->string('nama_pengulas');
            $table->integer('rating');
            $table->text('isi_ulasan');
            $table->timestamps();
        });

        Schema::dropIfExists('feedbacks'); // Remove generic table if it exists as we're replacing intent
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan');
    }
};
