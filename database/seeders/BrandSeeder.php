<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // [id, name, slug, sort_order]
        $brands = [
            [1,  'All Brands',      'all-brands',      0],
            [2,  'Adidas',          'adidas',          1],
            [3,  'BIC',             'bic',             2],
            [4,  'Cutter & Buck',   'cutter-buck',     3],
            [5,  'Hanes',           'hanes',           4],
            [6,  'Koozie',          'koozie',          5],
            [7,  'Leatherman',      'leatherman',      6],
            [8,  'Moleskine',       'moleskine',       7],
            [9,  'Nike',            'nike',            8],
            [10, 'OGIO',            'ogio',            9],
            [11, 'Port Authority',  'port-authority',  10],
            [12, 'Stormtech',       'stormtech',       11],
            [13, 'Thermos',         'thermos',         12],
            [14, 'Titleist',        'titleist',        13],
            [15, 'Under Armour',    'under-armour',    14],
            [16, 'YETI',            'yeti',            15],
            [17, 'Zebra',           'zebra',           16],
        ];

        DB::table('brands')->insert(array_map(fn ($b) => [
            'id'         => $b[0],
            'name'       => $b[1],
            'slug'       => $b[2],
            'sort_order' => $b[3],
        ], $brands));
    }
}
