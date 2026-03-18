<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_category_assignments', function (Blueprint $table) {
            $table->id();
            $table->integer('item_serial');
            $table->unsignedSmallInteger('category_id');

            $table->unique(['item_serial', 'category_id']);

            $table->foreign('item_serial')
                  ->references('item_serial')
                  ->on('products')
                  ->onDelete('cascade');

            $table->foreign('category_id')
                  ->references('id')
                  ->on('product_categories')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_category_assignments');
    }
};
