<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_meta', function (Blueprint $table) {
            $table->integer('item_serial')->primary();
            $table->string('keywords', 500)->nullable();
            $table->string('meta_description', 500)->nullable();

            $table->foreign('item_serial')
                  ->references('item_serial')
                  ->on('products')
                  ->onDelete('cascade');
        });

        // FULLTEXT index so keyword searches can leverage MySQL's full-text engine.
        // keywords column is the primary surface; meta_description adds coverage.
        DB::statement(
            'ALTER TABLE product_meta ADD FULLTEXT INDEX ft_product_meta_search (keywords, meta_description)'
        );
    }

    public function down(): void
    {
        Schema::dropIfExists('product_meta');
    }
};
