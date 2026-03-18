<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StressRelieverProductSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $now = now()->toDateTimeString();

        // ── New products (serials 1093–1116) ─────────────────────────────────
        $products = [
            // [serial, master_id,       brand_id,  description,                              L,    W,    H,   dia,   wt,   material]

            // Classic shapes
            [1093, 'STR-BALL01',   'Generic', 'Round Stress Ball',                       2.5,  2.5,  2.5,  2.5,  0.10, 'Polyurethane Foam', $now],
            [1094, 'STR-BALL02',   'Generic', 'Mini Stress Ball 1.5in',                  1.5,  1.5,  1.5,  1.5,  0.05, 'Polyurethane Foam', $now],
            [1095, 'STR-CUBE01',   'Generic', 'Stress Cube Fidget Toy',                  1.75, 1.75, 1.75, null,  0.08, 'ABS Plastic',       $now],
            [1096, 'STR-TWST01',   'Generic', 'Magic Snake Twist Puzzle',                7.0,  0.75, 0.75, null,  0.12, 'ABS Plastic',       $now],

            // Food & novelty shapes
            [1097, 'STR-PIZZA01',  'Generic', 'Pizza Slice Stress Reliever',             4.0,  3.5,  1.0,  null,  0.10, 'Polyurethane Foam', $now],
            [1098, 'STR-FRUIT01',  'Generic', 'Apple Stress Reliever',                   3.0,  3.0,  3.25, null,  0.10, 'Polyurethane Foam', $now],
            [1099, 'STR-DONUT01',  'Generic', 'Donut Stress Reliever',                   3.5,  3.5,  1.25, 3.5,   0.10, 'Polyurethane Foam', $now],
            [1100, 'STR-BRGR01',   'Generic', 'Burger Stress Reliever',                  3.5,  3.5,  2.0,  null,  0.12, 'Polyurethane Foam', $now],

            // Work & office shapes
            [1101, 'STR-HOUS01',   'Generic', 'House Shape Stress Reliever',             3.5,  3.0,  3.5,  null,  0.10, 'Polyurethane Foam', $now],
            [1102, 'STR-CAR01',    'Generic', 'Car Shape Stress Reliever',               4.5,  2.0,  1.75, null,  0.10, 'Polyurethane Foam', $now],
            [1103, 'STR-STAR01',   'Generic', 'Five-Point Star Stress Reliever',         3.5,  3.5,  1.0,  null,  0.08, 'Polyurethane Foam', $now],
            [1104, 'STR-HEART01',  'Generic', 'Heart Shape Stress Reliever',             3.25, 3.25, 1.0,  null,  0.08, 'Polyurethane Foam', $now],

            // Sports shapes
            [1105, 'STR-FBLL01',   'Generic', 'Football Stress Reliever',                4.5,  3.0,  3.0,  null,  0.10, 'Polyurethane Foam', $now],
            [1106, 'STR-BSBL01',   'Generic', 'Baseball Stress Reliever',                2.75, 2.75, 2.75, 2.75,  0.10, 'Polyurethane Foam', $now],
            [1107, 'STR-BSKT01',   'Generic', 'Basketball Stress Reliever',              2.75, 2.75, 2.75, 2.75,  0.10, 'Polyurethane Foam', $now],
            [1108, 'STR-GOLF01',   'Generic', 'Golf Ball Stress Reliever',               1.75, 1.75, 1.75, 1.75,  0.06, 'Polyurethane Foam', $now],

            // Fidget & sensory tools
            [1109, 'STR-FSPN01',   'Generic', 'Fidget Spinner 3-Blade',                  3.25, 3.25, 0.5,  null,  0.08, 'ABS Plastic',       $now],
            [1110, 'STR-POPTT01',  'Generic', 'Pop It Silicone Fidget Toy Square',       4.75, 4.75, 0.25, null,  0.12, 'Silicone',          $now],
            [1111, 'STR-MESH01',   'Generic', 'Mesh Squeeze Ball Stress Reliever',       2.5,  2.5,  2.5,  2.5,   0.12, 'Mesh/Gel Fill',     $now],
            [1112, 'STR-SNEK01',   'Generic', 'Stretchy String Fidget Toy',              7.0,  0.5,  0.5,  0.5,   0.05, 'TPR Rubber',        $now],

            // Sets & premium
            [1113, 'STR-DSKSET01', 'Generic', 'Desk Stress Relief Kit 5-Piece',          6.0,  4.0,  2.5,  null,  0.50, 'Mixed',             $now],
            [1114, 'STR-ZENPK01',  'Generic', 'Mini Zen Garden Desktop Kit',             7.0,  5.0,  2.0,  null,  0.40, 'Wood/Sand',         $now],
            [1115, 'STR-PUTTY01',  'Generic', 'Thinking Putty Stress Tin 2oz',           2.5,  2.5,  0.75, 2.5,   0.18, 'Silicone Putty',    $now],
            [1116, 'STR-TRBL01',   'Generic', 'Tangle Twist Fidget Toy',                 3.0,  3.0,  1.5,  null,  0.08, 'ABS Plastic',       $now],
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
        // 1=All Products  13=Novelties  14=Office  17=Sports & Fitness  18=Stress Relievers
        $categoryRows = [
            [1093, 1], [1093, 18],
            [1094, 1], [1094, 18],
            [1095, 1], [1095, 18], [1095, 13],
            [1096, 1], [1096, 18], [1096, 13],
            [1097, 1], [1097, 18], [1097, 13],
            [1098, 1], [1098, 18], [1098, 13],
            [1099, 1], [1099, 18], [1099, 13],
            [1100, 1], [1100, 18], [1100, 13],
            [1101, 1], [1101, 18],
            [1102, 1], [1102, 18],
            [1103, 1], [1103, 18], [1103, 13],
            [1104, 1], [1104, 18], [1104, 13],
            [1105, 1], [1105, 18], [1105, 17],
            [1106, 1], [1106, 18], [1106, 17],
            [1107, 1], [1107, 18], [1107, 17],
            [1108, 1], [1108, 18], [1108, 17],
            [1109, 1], [1109, 18], [1109, 13],
            [1110, 1], [1110, 18], [1110, 13],
            [1111, 1], [1111, 18],
            [1112, 1], [1112, 18], [1112, 13],
            [1113, 1], [1113, 18], [1113, 14],
            [1114, 1], [1114, 18], [1114, 14],
            [1115, 1], [1115, 18],
            [1116, 1], [1116, 18], [1116, 13],
        ];

        DB::table('product_category_assignments')->insert(
            array_map(fn ($r) => ['item_serial' => $r[0], 'category_id' => $r[1]], $categoryRows)
        );

        // ── Brand assignments (All Brands only) ───────────────────────────────
        DB::table('product_brand_assignments')->insert(
            array_map(fn ($s) => ['item_serial' => $s, 'brand_id' => 1], array_column($products, 0))
        );

        // ── Collection assignments ────────────────────────────────────────────
        // 5=Value  6=Corporate Picks  22=Choosing Community  23=Fidgets & Fun (featured cat)
        $collectionRows = [
            [1093, 5], [1093, 6],
            [1094, 5],
            [1095, 5], [1095, 6],
            [1096, 5],
            [1097, 5],
            [1098, 5],
            [1099, 5],
            [1100, 5],
            [1101, 5], [1101, 6],
            [1102, 5], [1102, 6],
            [1103, 5], [1103, 6],
            [1104, 5], [1104, 6],
            [1105, 5], [1105, 6],
            [1106, 5], [1106, 6],
            [1107, 5], [1107, 6],
            [1108, 5], [1108, 6],
            [1109, 5],
            [1110, 5],
            [1111, 5],
            [1112, 5],
            [1113, 5], [1113, 6],
            [1114, 5], [1114, 6],
            [1115, 5],
            [1116, 5],
        ];

        DB::table('product_collection_assignments')->insert(
            array_map(fn ($r) => ['item_serial' => $r[0], 'collection_id' => $r[1]], $collectionRows)
        );
    }
}
