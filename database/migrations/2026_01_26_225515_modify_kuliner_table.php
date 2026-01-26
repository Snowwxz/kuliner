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
            // Drop foreign key first if it exists, assume standard naming
            // $table->dropForeign(['kategori_id']);
            // Or use the constraint name directly if known, but array syntax is safer if standard naming used
            // Since we can't be 100% sure of the constraint name without checking DB, we'll try standard array syntax
            // If it fails, we might need to check constraint name.
            // Let's assume standard Laravel convention: table_column_foreign

            // However, to be safe and avoid migration errors if key doesn't exist or name mismatch,
            // we can try to drop the column directly, some DB drivers handle FK drop automatically or throw error.
            // Best practice is to drop FK first.

            $table->dropForeign(['kategori_id']);
            $table->dropColumn('kategori_id');
            $table->text('gmaps_link')->nullable()->after('gambar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kuliner', function (Blueprint $table) {
            $table->dropColumn('gmaps_link');
            $table->foreignId('kategori_id')->nullable()->constrained('kategori');
        });
    }
};
