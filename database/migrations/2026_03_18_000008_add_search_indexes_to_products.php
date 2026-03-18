<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Adds two indexes that power SearchController:
 *
 *  1. FULLTEXT on (item_description, material)
 *     Used for keyword searches via MATCH … AGAINST in Boolean Mode.
 *     MySQL InnoDB default minimum token size is 3 characters
 *     (innodb_ft_min_token_size); shorter terms fall back to LIKE in code.
 *
 *  2. B-tree index on item_master_id
 *     Accelerates exact and prefix SKU look-ups (item_master_id = ? / LIKE 'X%').
 */
return new class extends Migration
{
    public function up(): void
    {
        // B-tree index for SKU look-ups
        Schema::table('products', function (Blueprint $table) {
            $table->index('item_master_id', 'idx_products_master_id');
        });

        // FULLTEXT index for keyword search
        // Blueprint::fullText() is available in Laravel 9+; using DB::statement
        // here for explicit InnoDB FULLTEXT syntax compatibility.
        DB::statement(
            'ALTER TABLE products ADD FULLTEXT INDEX ft_products_search (item_description, material)'
        );
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE products DROP INDEX ft_products_search');

        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('idx_products_master_id');
        });
    }
};
