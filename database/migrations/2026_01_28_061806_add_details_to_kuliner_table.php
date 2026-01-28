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
        Schema::table('kuliner', function (Blueprint $table) {
            $table->text('alamat')->nullable()->after('harga');
            $table->string('jam_buka', 10)->nullable()->after('alamat');
            $table->string('jam_tutup', 10)->nullable()->after('jam_buka');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kuliner', function (Blueprint $table) {
            $table->dropColumn(['alamat', 'jam_buka', 'jam_tutup']);
        });
    }
};
