<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductYearSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $serials = DB::table('products')->pluck('item_serial');

        foreach ($serials as $serial) {
            DB::table('products')
                ->where('item_serial', $serial)
                ->update(['product_year' => rand(2018, 2026)]);
        }
    }
}
