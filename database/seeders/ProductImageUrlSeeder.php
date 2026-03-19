<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Populates main_image_url for every product that doesn't already have one.
 * The default value is a placehold.co URL using the product SKU as the label.
 * To swap in a real image, just UPDATE the main_image_url field for that row —
 * this seeder will not overwrite rows that already have a non-null URL.
 */
class ProductImageUrlSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $products = DB::table('products')
            ->whereNull('main_image_url')
            ->select('item_serial', 'item_master_id')
            ->get();

        foreach ($products as $product) {
            $sku  = $product->item_master_id ?? 'SKU';
            $url  = 'https://placehold.co/300x300/f3f4f6/9ca3af?text=' . rawurlencode($sku);

            DB::table('products')
                ->where('item_serial', $product->item_serial)
                ->update(['main_image_url' => $url]);
        }
    }
}
