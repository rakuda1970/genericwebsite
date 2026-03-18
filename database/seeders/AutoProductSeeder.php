<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AutoProductSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $now = now()->toDateTimeString();

        // ── New products (serials 1065–1074) ─────────────────────────────────
        $products = [
            // [serial, master_id,       brand_id,  description,                            L,    W,    H,    dia,  weight, material]
            [1065, 'AUT-PUMP01',    'Generic', 'Portable Hand Tire Pump',                12.0,  3.0,  3.0, null,  0.60, 'Plastic/Metal',   $now],
            [1066, 'AUT-PUMP02',    'Generic', 'Electric Portable Air Compressor',        9.0,  4.0,  4.0, null,  1.20, 'ABS Plastic',     $now],
            [1067, 'AUT-GAUGE01',   'Generic', 'Digital Tire Pressure Gauge',             6.0,  2.0,  1.5, null,  0.18, 'ABS Plastic',     $now],
            [1068, 'AUT-GAUGE02',   'Generic', 'Analog Pencil Tire Pressure Gauge',       6.0,  0.75, 0.75,0.75, 0.08, 'Metal/Plastic',   $now],
            [1069, 'AUT-WARN01',    'Generic', 'Road Emergency Warning Triangle Set',    12.0, 10.0,  1.0, null,  1.00, 'Plastic',         $now],
            [1070, 'AUT-WARN02',    'Generic', 'LED Road Flare Emergency Kit 3-Pack',     4.0,  4.0,  2.0,  4.0,  0.90, 'Polycarbonate',   $now],
            [1071, 'AUT-SGLH01',    'Generic', 'Car Visor Sunglass Holder Clip',          4.5,  2.5,  1.5, null,  0.10, 'ABS Plastic',     $now],
            [1072, 'AUT-SGLH02',    'Generic', 'Dual-Slot Visor Sunglass Organizer',      6.0,  3.5,  2.0, null,  0.15, 'Leather-Look PU', $now],
            [1073, 'AUT-SCRP01',    'Generic', 'Heavy-Duty Ice Scraper with Snow Brush', 27.0,  5.0,  3.0, null,  0.55, 'Polypropylene',   $now],
            [1074, 'AUT-SCRP02',    'Generic', 'Telescoping Ice Scraper Snowbrush',      36.0,  5.0,  3.0, null,  0.80, 'Polypropylene',   $now],
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
        // 1=All Products  2=Auto  7=Emergency Preparedness  8=Health & Wellness
        $categoryRows = [
            [1065, 1], [1065, 2],               // Pump      → All, Auto
            [1066, 1], [1066, 2],               // Compressor → All, Auto
            [1067, 1], [1067, 2],               // Digital gauge → All, Auto
            [1068, 1], [1068, 2],               // Pencil gauge → All, Auto
            [1069, 1], [1069, 2], [1069, 7],    // Warning tri → All, Auto, Emergency
            [1070, 1], [1070, 2], [1070, 7],    // LED flare  → All, Auto, Emergency
            [1071, 1], [1071, 2],               // Visor holder → All, Auto
            [1072, 1], [1072, 2],               // Visor org → All, Auto
            [1073, 1], [1073, 2],               // Ice scraper → All, Auto
            [1074, 1], [1074, 2],               // Telescoping → All, Auto
        ];

        DB::table('product_category_assignments')->insert(
            array_map(fn ($r) => ['item_serial' => $r[0], 'category_id' => $r[1]], $categoryRows)
        );

        // ── Brand assignments ─────────────────────────────────────────────────
        // 1=All Brands (no specific brand for generic auto items)
        $serials = array_column($products, 0);
        DB::table('product_brand_assignments')->insert(
            array_map(fn ($s) => ['item_serial' => $s, 'brand_id' => 1], $serials)
        );

        // ── Collection assignments ────────────────────────────────────────────
        // 5=Value  6=Corporate Picks
        $collectionRows = [
            [1065, 5],               // Pump        → Value
            [1066, 5],               // Compressor  → Value
            [1067, 5], [1067, 6],    // Digital gauge → Value, Corporate
            [1068, 5],               // Pencil gauge → Value
            [1069, 5], [1069, 6],    // Warning tri → Value, Corporate
            [1070, 5], [1070, 6],    // LED flare   → Value, Corporate
            [1071, 5],               // Visor holder → Value
            [1072, 5],               // Visor org   → Value
            [1073, 5],               // Ice scraper → Value
            [1074, 5],               // Telescoping → Value
        ];

        DB::table('product_collection_assignments')->insert(
            array_map(fn ($r) => ['item_serial' => $r[0], 'collection_id' => $r[1]], $collectionRows)
        );
    }
}
