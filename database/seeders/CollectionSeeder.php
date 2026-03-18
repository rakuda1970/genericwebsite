<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollectionSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // [id, name, slug, sort_order]
        $collections = [
            [1, 'Luxury Collection',  'luxury-collection',   1],
            [2, 'Eco Collection',     'eco-collection',      2],
            [3, 'Sport Collection',   'sport-collection',    3],
            [4, 'Tech Collection',    'tech-collection',     4],
            [5, 'Value Collection',   'value-collection',    5],
            [6, 'Corporate Picks',    'corporate-picks',     6],
        ];

        DB::table('collections')->insert(array_map(fn ($c) => [
            'id'         => $c[0],
            'name'       => $c[1],
            'slug'       => $c[2],
            'sort_order' => $c[3],
        ], $collections));
    }
}
