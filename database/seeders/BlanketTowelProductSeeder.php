<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlanketTowelProductSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $now = now()->toDateTimeString();

        // ── New products (serials 1075–1092) ─────────────────────────────────
        $products = [
            // [serial, master_id,      brand_id,  description,                                L,    W,    H,   dia,  wt,   material]

            // Blankets
            [1075, 'BLK-FLEECE01', 'Generic', 'Promotional Fleece Blanket 50x60',           60.0, 50.0,  2.0, null, 1.20, 'Polyester Fleece',      $now],
            [1076, 'BLK-SHERPA01', 'Generic', 'Sherpa Lined Throw Blanket 50x60',           60.0, 50.0,  3.0, null, 2.00, 'Sherpa/Polyester',      $now],
            [1077, 'BLK-WOVEN01',  'Generic', 'Woven Knit Throw Blanket 50x60',             60.0, 50.0,  2.5, null, 1.80, 'Acrylic Knit',          $now],
            [1078, 'BLK-LOGO01',   'Generic', 'Full-Color Sublimated Blanket 50x60',        60.0, 50.0,  2.0, null, 1.10, 'Polyester',             $now],
            [1079, 'BLK-POLAR01',  'Generic', 'Polar Fleece Stadium Blanket 48x58',         58.0, 48.0,  1.5, null, 0.90, 'Polar Fleece',          $now],

            // Towels
            [1080, 'TWL-BEACH01',  'Generic', 'Promotional Beach Towel 30x60',              60.0, 30.0,  0.5, null, 0.70, 'Cotton Terry',          $now],
            [1081, 'TWL-GOLF01',   'Titleist', 'Golf Caddy Towel 16x24',                   24.0, 16.0,  0.5, null, 0.30, 'Cotton Terry',          $now],
            [1082, 'TWL-GYM01',    'Generic', 'Microfiber Gym Towel 15x36',                36.0, 15.0,  0.5, null, 0.25, 'Microfiber',            $now],
            [1083, 'TWL-SPORT01',  'Generic', 'Sport Cooling Towel 12x33',                 33.0, 12.0,  0.25,null, 0.15, 'PVA/Microfiber',        $now],
            [1084, 'TWL-BATH01',   'Generic', 'Promotional Bath Towel 27x54',              54.0, 27.0,  0.5, null, 0.80, 'Cotton Terry',          $now],
            [1085, 'TWL-MFSET01',  'Generic', 'Microfiber Towel 3-Piece Set',              12.0,  8.0,  2.0, null, 0.50, 'Microfiber',            $now],

            // Travel / Convenience Promotional Blankets
            [1086, 'TRV-PKBL01',   'Generic', 'Packable Travel Blanket with Snap Case',    50.0, 40.0,  1.0, null, 0.60, 'Polyester Ripstop',     $now],
            [1087, 'TRV-PKBL02',   'Generic', 'Compact Stadium Travel Blanket 40x50',      50.0, 40.0,  1.5, null, 0.75, 'Polyester Fleece',      $now],
            [1088, 'TRV-PILLO01',  'Generic', 'Travel Blanket & Pillow Combo Set',         40.0, 30.0,  3.0, null, 1.00, 'Polyester',             $now],
            [1089, 'TRV-PNCHO01',  'Generic', 'Fleece Travel Poncho Blanket One Size',     52.0, 48.0,  2.0, null, 0.80, 'Polar Fleece',          $now],
            [1090, 'TRV-AIRBL01',  'Generic', 'Airline-Size Promotional Fleece Blanket',   36.0, 24.0,  1.0, null, 0.45, 'Polyester Fleece',      $now],
            [1091, 'TRV-CARBL01',  'Generic', 'Car Emergency Blanket Emergency Foil',      52.0, 82.0,  0.25,null, 0.10, 'Mylar Foil',            $now],
            [1092, 'TRV-PKTWL01',  'Generic', 'Packable Microfiber Travel Towel 24x48',   48.0, 24.0,  0.25,null, 0.30, 'Microfiber',            $now],
        ];

        DB::table('products')->insert(array_map(fn ($p) => [
            'item_serial'      => $p[0],
            'item_master_id'   => $p[1],
            'item_brand_id'    => $p[2],
            'item_description' => $p[3],
            'item_length'      => $p[4],
            'item_width'       => $p[5],
            'item_height'      => $p[6],
            'item_diameter'    => $p[7],
            'item_weight'      => $p[8],
            'material'         => $p[9],
            'updated_at'       => $p[10],
        ], $products));

        // ── Category assignments ──────────────────────────────────────────────
        // 1=All Products  4=Blankets & Towels  17=Sports & Fitness  20=Travel  7=Emergency
        $categoryRows = [
            [1075, 1], [1075, 4],                       // Fleece blanket       → All, Blankets
            [1076, 1], [1076, 4],                       // Sherpa throw         → All, Blankets
            [1077, 1], [1077, 4],                       // Woven knit throw     → All, Blankets
            [1078, 1], [1078, 4],                       // Sublimated blanket   → All, Blankets
            [1079, 1], [1079, 4], [1079, 17],           // Stadium blanket      → All, Blankets, Sports
            [1080, 1], [1080, 4], [1080, 17],           // Beach towel          → All, Blankets, Sports
            [1081, 1], [1081, 4], [1081, 17],           // Golf towel           → All, Blankets, Sports
            [1082, 1], [1082, 4], [1082, 17],           // Gym towel            → All, Blankets, Sports
            [1083, 1], [1083, 4], [1083, 17],           // Cooling towel        → All, Blankets, Sports
            [1084, 1], [1084, 4],                       // Bath towel           → All, Blankets
            [1085, 1], [1085, 4],                       // Microfiber set       → All, Blankets
            [1086, 1], [1086, 4], [1086, 20],           // Packable travel bl   → All, Blankets, Travel
            [1087, 1], [1087, 4], [1087, 20],           // Compact stadium bl   → All, Blankets, Travel
            [1088, 1], [1088, 4], [1088, 20],           // Blanket+pillow combo → All, Blankets, Travel
            [1089, 1], [1089, 4], [1089, 20],           // Poncho blanket       → All, Blankets, Travel
            [1090, 1], [1090, 4], [1090, 20],           // Airline fleece       → All, Blankets, Travel
            [1091, 1], [1091, 4], [1091, 20], [1091, 7],// Emergency foil       → All, Blankets, Travel, Emergency
            [1092, 1], [1092, 4], [1092, 20],           // Packable towel       → All, Blankets, Travel
        ];

        DB::table('product_category_assignments')->insert(
            array_map(fn ($r) => ['item_serial' => $r[0], 'category_id' => $r[1]], $categoryRows)
        );

        // ── Brand assignments (All Brands = 1; Golf towel also gets Titleist = 14) ──
        $brandRows = [];
        foreach (array_column($products, 0) as $serial) {
            $brandRows[] = ['item_serial' => $serial, 'brand_id' => 1];
        }
        // Golf towel is a Titleist product
        $brandRows[] = ['item_serial' => 1081, 'brand_id' => 14];

        DB::table('product_brand_assignments')->insert($brandRows);

        // ── Collection assignments ────────────────────────────────────────────
        // 1=Luxury  3=Sport  5=Value  6=Corporate Picks
        $collectionRows = [
            [1075, 5], [1075, 6],   // Fleece blanket       → Value, Corporate
            [1076, 1], [1076, 6],   // Sherpa throw         → Luxury, Corporate
            [1077, 1], [1077, 6],   // Woven knit           → Luxury, Corporate
            [1078, 6],              // Sublimated           → Corporate
            [1079, 3], [1079, 6],   // Stadium blanket      → Sport, Corporate
            [1080, 3], [1080, 6],   // Beach towel          → Sport, Corporate
            [1081, 1], [1081, 3], [1081, 6], // Golf towel → Luxury, Sport, Corporate
            [1082, 3], [1082, 5],   // Gym towel            → Sport, Value
            [1083, 3], [1083, 5],   // Cooling towel        → Sport, Value
            [1084, 5], [1084, 6],   // Bath towel           → Value, Corporate
            [1085, 5],              // Microfiber set       → Value
            [1086, 5], [1086, 6],   // Packable travel bl   → Value, Corporate
            [1087, 5], [1087, 6],   // Compact stadium      → Value, Corporate
            [1088, 1], [1088, 6],   // Blanket+pillow       → Luxury, Corporate
            [1089, 5],              // Poncho blanket       → Value
            [1090, 5], [1090, 6],   // Airline fleece       → Value, Corporate
            [1091, 5],              // Emergency foil       → Value
            [1092, 5], [1092, 6],   // Packable towel       → Value, Corporate
        ];

        DB::table('product_collection_assignments')->insert(
            array_map(fn ($r) => ['item_serial' => $r[0], 'collection_id' => $r[1]], $collectionRows)
        );
    }
}
