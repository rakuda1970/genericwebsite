<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // ── Product Categories (type = category) ──────────────
        $categories = [
            [1,  'All Products',               'all-products',               'category', 1],
            [2,  'Auto',                        'auto',                       'category', 2],
            [3,  'Bags',                        'bags',                       'category', 3],
            [4,  'Blankets & Towels',           'blankets-towels',            'category', 4],
            [5,  'Drinkware',                   'drinkware',                  'category', 5],
            [6,  'Eco Friendly & Sustainable',  'eco-friendly-sustainable',   'category', 6],
            [7,  'Emergency Preparedness',      'emergency-preparedness',     'category', 7],
            [8,  'Health & Wellness',           'health-wellness',            'category', 8],
            [9,  'Home',                        'home',                       'category', 9],
            [10, 'Hot & Cold Relief Packs',     'hot-cold-relief-packs',      'category', 10],
            [11, 'Journals & Notebooks',        'journals-notebooks',         'category', 11],
            [12, 'Lights & Tools',              'lights-tools',               'category', 12],
            [13, 'Novelties',                   'novelties',                  'category', 13],
            [14, 'Office',                      'office',                     'category', 14],
            [15, 'Outdoors & Leisure',          'outdoors-leisure',           'category', 15],
            [16, 'Packaging',                   'packaging',                  'category', 16],
            [17, 'Sports & Fitness',            'sports-fitness',             'category', 17],
            [18, 'Stress Relievers',            'stress-relievers',           'category', 18],
            [19, 'Technology',                  'technology',                 'category', 19],
            [20, 'Travel',                      'travel',                     'category', 20],

            // ── Featured (type = featured) ────────────────────
            [21, 'Best Sellers',                'best-sellers',               'featured',  1],
            [22, 'Choosing Community',          'choosing-community',         'featured',  2],
            [23, 'Fidgets & Fun',               'fidgets-fun',                'featured',  3],
            [24, 'New Products',                'new-products',               'featured',  4],
            [25, 'Purposeful Energy',           'purposeful-energy',          'featured',  5],
            [26, 'Quiet Luxury',                'quiet-luxury',               'featured',  6],
            [27, 'Retail Inspired Picks',       'retail-inspired-picks',      'featured',  7],
            [28, 'Revitalized Self',            'revitalized-self',           'featured',  8],
            [29, 'Sustainable Solutions',       'sustainable-solutions',      'featured',  9],
            [30, 'Tech Future',                 'tech-future',                'featured', 10],
            [31, 'Value Finds',                 'value-finds',                'featured', 11],
        ];

        DB::table('product_categories')->insert(array_map(fn ($c) => [
            'id'         => $c[0],
            'name'       => $c[1],
            'slug'       => $c[2],
            'type'       => $c[3],
            'sort_order' => $c[4],
        ], $categories));
    }
}
