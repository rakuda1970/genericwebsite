<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_collection_assignments', function (Blueprint $table) {
            $table->id();
            $table->integer('item_serial');
            $table->unsignedSmallInteger('collection_id');

            $table->unique(['item_serial', 'collection_id']);

            $table->foreign('item_serial')
                  ->references('item_serial')
                  ->on('products')
                  ->onDelete('cascade');

            $table->foreign('collection_id')
                  ->references('id')
                  ->on('collections')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_collection_assignments');
    }
};
