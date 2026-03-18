<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('item_serial')->primary();
            $table->string('item_master_id', 15)->nullable();
            $table->string('item_brand_id', 50)->nullable();
            $table->string('item_description', 100)->nullable();
            $table->double('item_length')->nullable();
            $table->double('item_width')->nullable();
            $table->double('item_height')->nullable();
            $table->double('item_diameter')->nullable();
            $table->double('item_weight')->nullable();
            $table->string('material', 50)->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
