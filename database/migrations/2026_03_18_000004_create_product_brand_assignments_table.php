<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_brand_assignments', function (Blueprint $table) {
            $table->id();
            $table->integer('item_serial');
            $table->unsignedSmallInteger('brand_id');

            $table->unique(['item_serial', 'brand_id']);

            $table->foreign('item_serial')
                  ->references('item_serial')
                  ->on('products')
                  ->onDelete('cascade');

            $table->foreign('brand_id')
                  ->references('id')
                  ->on('brands')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_brand_assignments');
    }
};
