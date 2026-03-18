<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $now = now()->toDateTimeString();

        $products = [

            // ── Adidas ───────────────────────────────────────────────────────────
            [1001, 'ADI-TSHIRT01', 'Adidas', 'Adidas Classic Logo T-Shirt',        10.0,  8.0,  0.5,  null, 0.40, 'Polyester',         $now],
            [1002, 'ADI-CAP01',    'Adidas', 'Adidas Structured Cap',               12.0,  9.0,  6.0,  null, 0.25, 'Cotton/Polyester',  $now],
            [1003, 'ADI-DUFFEL01', 'Adidas', 'Adidas Sport Duffel Bag',            22.0, 12.0, 12.0,  null, 1.50, 'Polyester',         $now],
            [1004, 'ADI-BTL01',    'Adidas', 'Adidas Sport Water Bottle 24oz',      3.0,  3.0, 11.0,  3.0,  0.50, 'Plastic',           $now],

            // ── BIC ──────────────────────────────────────────────────────────────
            [1005, 'BIC-PEN01',    'BIC',    'BIC Clic Stic Ballpoint Pen',         5.5,  0.5,  0.5,  0.5,  0.04, 'Plastic',           $now],
            [1006, 'BIC-MRK01',    'BIC',    'BIC Permanent Marker Black',          5.0,  0.75, 0.75, 0.75, 0.06, 'Plastic',           $now],
            [1007, 'BIC-STYLUS01', 'BIC',    'BIC 2-in-1 Stylus Pen',              5.5,  0.5,  0.5,  0.5,  0.05, 'Plastic',           $now],
            [1008, 'BIC-HLTR01',   'BIC',    'BIC Brite Liner Highlighter',         5.0,  0.75, 0.75, 0.75, 0.05, 'Plastic',           $now],

            // ── Cutter & Buck ────────────────────────────────────────────────────
            [1009, 'CNB-POLO01',   'Cutter & Buck', 'Cutter & Buck Drytec Polo',   14.0, 10.0,  0.75, null, 0.50, 'Polyester',         $now],
            [1010, 'CNB-VEST01',   'Cutter & Buck', 'Cutter & Buck Insulated Vest',14.0, 10.0,  1.5,  null, 0.80, 'Polyester Fill',    $now],
            [1011, 'CNB-JACKET01', 'Cutter & Buck', 'Cutter & Buck Full Zip Jacket',14.0,10.0,  2.0,  null, 1.20, 'Polyester Fleece',  $now],
            [1012, 'CNB-TOTE01',   'Cutter & Buck', 'Cutter & Buck Tour Tote Bag', 15.0, 13.0,  5.0,  null, 0.90, 'Canvas',            $now],

            // ── Hanes ────────────────────────────────────────────────────────────
            [1013, 'HAN-TSHIRT01', 'Hanes', 'Hanes ComfortSoft T-Shirt',           12.0,  9.0,  0.5,  null, 0.35, 'Cotton',            $now],
            [1014, 'HAN-LS01',     'Hanes', 'Hanes Long Sleeve Tee',               12.0,  9.0,  0.75, null, 0.45, 'Cotton',            $now],
            [1015, 'HAN-HOODIE01', 'Hanes', 'Hanes Pullover Hoodie',               13.0, 10.0,  1.5,  null, 0.90, 'Cotton/Polyester',  $now],
            [1016, 'HAN-POLO01',   'Hanes', 'Hanes Jersey Polo Shirt',             12.0,  9.0,  0.75, null, 0.50, 'Cotton',            $now],

            // ── Koozie ───────────────────────────────────────────────────────────
            [1017, 'KOZ-CAN01',    'Koozie', 'Koozie Can Cooler',                   4.0,  3.0,  3.0,  3.0,  0.08, 'Neoprene',          $now],
            [1018, 'KOZ-BTL01',    'Koozie', 'Koozie Bottle Sleeve',                5.0,  3.0,  3.0,  3.0,  0.10, 'Neoprene',          $now],
            [1019, 'KOZ-CUP01',    'Koozie', 'Koozie Triple-Vacuum Cup 12oz',       4.0,  4.0,  6.0,  4.0,  0.50, 'Stainless Steel',   $now],
            [1020, 'KOZ-LUNCH01',  'Koozie', 'Koozie Insulated Lunch Bag',         10.0,  8.0,  6.0,  null, 0.50, 'Neoprene',          $now],

            // ── Leatherman ───────────────────────────────────────────────────────
            [1021, 'LMN-SQUIRT01', 'Leatherman', 'Leatherman Squirt PS4',           2.5,  1.0,  0.5,  null, 0.18, 'Stainless Steel',   $now],
            [1022, 'LMN-WINGM01',  'Leatherman', 'Leatherman Wingman Multi-Tool',   4.0,  1.5,  0.75, null, 0.35, 'Stainless Steel',   $now],
            [1023, 'LMN-SKLTL01',  'Leatherman', 'Leatherman Skeletool',            4.5,  1.5,  0.75, null, 0.27, 'Stainless Steel',   $now],
            [1024, 'LMN-SHEATH01', 'Leatherman', 'Leatherman Nylon Sheath',         5.0,  3.0,  1.0,  null, 0.15, 'Nylon',             $now],

            // ── Moleskine ────────────────────────────────────────────────────────
            [1025, 'MOL-NBLG01',   'Moleskine', 'Moleskine Classic Notebook Large', 8.25, 5.0,  0.5,  null, 0.55, 'Hardcover/Paper',   $now],
            [1026, 'MOL-NBPK01',   'Moleskine', 'Moleskine Pocket Notebook',        5.5,  3.5,  0.35, null, 0.25, 'Hardcover/Paper',   $now],
            [1027, 'MOL-PEN01',    'Moleskine', 'Moleskine Classic Ballpoint Pen',  5.5,  0.5,  0.5,  0.5,  0.08, 'Resin',             $now],
            [1028, 'MOL-PLAN01',   'Moleskine', 'Moleskine Weekly Planner Large',   8.25, 5.0,  0.5,  null, 0.50, 'Hardcover/Paper',   $now],

            // ── Nike ─────────────────────────────────────────────────────────────
            [1029, 'NIK-DRFIT01',  'Nike', 'Nike Dri-FIT T-Shirt',                 12.0,  9.0,  0.5,  null, 0.35, 'Polyester',         $now],
            [1030, 'NIK-CAP01',    'Nike', 'Nike Dri-FIT Swoosh Cap',              12.0,  9.0,  6.0,  null, 0.20, 'Polyester',         $now],
            [1031, 'NIK-BKPK01',   'Nike', 'Nike Brasilia Backpack',               18.0, 13.0,  8.0,  null, 1.20, 'Polyester',         $now],
            [1032, 'NIK-BTL01',    'Nike', 'Nike Stainless Steel Bottle 24oz',      3.0,  3.0, 11.0,  3.0,  0.60, 'Stainless Steel',   $now],

            // ── OGIO ─────────────────────────────────────────────────────────────
            [1033, 'OGI-METRO01',  'OGIO', 'OGIO Metro Backpack',                  20.0, 14.0,  8.0,  null, 1.80, 'Polyester',         $now],
            [1034, 'OGI-DUFF01',   'OGIO', 'OGIO Endurance Duffle',                24.0, 13.0, 12.0,  null, 1.50, 'Polyester',         $now],
            [1035, 'OGI-SLEVE01',  'OGIO', 'OGIO Laptop Sleeve 15in',              16.0, 11.0,  1.0,  null, 0.40, 'Neoprene',          $now],
            [1036, 'OGI-POLO01',   'OGIO', 'OGIO Caliber 2.0 Polo',               12.0,  9.0,  0.75, null, 0.50, 'Polyester',         $now],

            // ── Port Authority ───────────────────────────────────────────────────
            [1037, 'PAC-SOFT01',   'Port Authority', 'Port Authority Soft Shell Jacket', 14.0, 10.0, 2.0,  null, 1.10, 'Polyester',    $now],
            [1038, 'PAC-POLO01',   'Port Authority', 'Port Authority Silk Touch Polo',   12.0,  9.0, 0.75, null, 0.45, 'Poly/Cotton',  $now],
            [1039, 'PAC-CAP01',    'Port Authority', 'Port Authority Structured Cap',    12.0,  9.0, 6.0,  null, 0.20, 'Cotton',       $now],
            [1040, 'PAC-VEST01',   'Port Authority', 'Port Authority Value Fleece Vest', 13.0, 10.0, 1.5,  null, 0.70, 'Polyester',    $now],

            // ── Stormtech ────────────────────────────────────────────────────────
            [1041, 'STM-TRITN01',  'Stormtech', 'Stormtech Triton Softshell Jacket',14.0, 10.0,  2.5,  null, 1.30, 'Polyester',        $now],
            [1042, 'STM-NAUT01',   'Stormtech', 'Stormtech Nautilus Vest',          13.0, 10.0,  1.5,  null, 0.80, 'Polyester',        $now],
            [1043, 'STM-OTTWA01',  'Stormtech', 'Stormtech Ottawa Hoodie',          14.0, 10.0,  2.0,  null, 1.00, 'Polyester Fleece', $now],
            [1044, 'STM-PONCH01',  'Stormtech', 'Stormtech Tempest Poncho',          6.0,  6.0,  2.0,  null, 0.50, 'Polyester',        $now],

            // ── Thermos ──────────────────────────────────────────────────────────
            [1045, 'THR-VAC24',    'Thermos', 'Thermos Stainless Bottle 24oz',       3.0,  3.0, 10.0,  3.0,  0.75, 'Stainless Steel',  $now],
            [1046, 'THR-FOOD16',   'Thermos', 'Thermos Stainless Food Jar 16oz',     4.0,  4.0,  5.0,  4.0,  0.60, 'Stainless Steel',  $now],
            [1047, 'THR-MUG16',    'Thermos', 'Thermos Stainless Travel Mug 16oz',   4.0,  4.0,  6.0,  4.0,  0.55, 'Stainless Steel',  $now],
            [1048, 'THR-VAC40',    'Thermos', 'Thermos Stainless Bottle 40oz',       3.5,  3.5, 12.0,  3.5,  1.00, 'Stainless Steel',  $now],

            // ── Titleist ─────────────────────────────────────────────────────────
            [1049, 'TTL-PROV1-12', 'Titleist', 'Titleist Pro V1 Golf Balls 12-Pack', 8.0,  5.0,  2.0,  null, 1.00, 'Surlyn/Urethane',  $now],
            [1050, 'TTL-CAP01',    'Titleist', 'Titleist Tour Performance Cap',      12.0,  9.0,  6.0,  null, 0.20, 'Polyester',        $now],
            [1051, 'TTL-STBAG01',  'Titleist', 'Titleist Hybrid 14 Stand Bag',      36.0, 14.0, 10.0,  null, 5.50, 'Polyester',        $now],
            [1052, 'TTL-TOWEL01',  'Titleist', 'Titleist Golf Towel',               22.0, 16.0,  0.25, null, 0.30, 'Cotton',           $now],

            // ── Under Armour ─────────────────────────────────────────────────────
            [1053, 'UAR-TECH01',   'Under Armour', 'Under Armour Tech 2.0 T-Shirt', 12.0,  9.0,  0.5,  null, 0.30, 'Polyester',        $now],
            [1054, 'UAR-POLO01',   'Under Armour', 'Under Armour Performance Polo', 12.0,  9.0,  0.75, null, 0.45, 'Polyester',        $now],
            [1055, 'UAR-CAP01',    'Under Armour', 'Under Armour Blitzing Cap',     12.0,  9.0,  6.0,  null, 0.20, 'Polyester',        $now],
            [1056, 'UAR-HOODIE01', 'Under Armour', 'Under Armour Hustle Fleece Hoodie',14.0,10.0, 1.5, null, 0.85, 'Poly/Cotton',      $now],

            // ── YETI ─────────────────────────────────────────────────────────────
            [1057, 'YET-RAM20',    'YETI', 'YETI Rambler 20oz Tumbler',              3.5,  3.5,  6.875, 3.5, 0.75, 'Stainless Steel',  $now],
            [1058, 'YET-RAM30',    'YETI', 'YETI Rambler 30oz Tumbler',              3.75, 3.75, 8.5,  3.75, 0.95, 'Stainless Steel',  $now],
            [1059, 'YET-HOPPER12', 'YETI', 'YETI Hopper Flip 12 Soft Cooler',      12.0,  9.0, 12.0,  null, 5.00, 'TPU/Nylon',        $now],
            [1060, 'YET-MUG14',    'YETI', 'YETI Rambler 14oz Mug',                 4.0,  4.0,  5.0,  4.0,  0.60, 'Stainless Steel',  $now],

            // ── Zebra ────────────────────────────────────────────────────────────
            [1061, 'ZBR-F301',     'Zebra', 'Zebra F-301 Ballpoint Pen',             5.5,  0.5,  0.5,  0.5,  0.05, 'Steel/Plastic',    $now],
            [1062, 'ZBR-SARASA01', 'Zebra', 'Zebra Sarasa Clip Gel Pen',             5.5,  0.5,  0.5,  0.5,  0.04, 'Plastic',          $now],
            [1063, 'ZBR-MLDLNR01', 'Zebra', 'Zebra Mildliner Highlighter Set',      5.5,  0.5,  0.5,  0.5,  0.04, 'Plastic',          $now],
            [1064, 'ZBR-GFTSET01', 'Zebra', 'Zebra Pen & Notebook Gift Set',         8.0,  5.0,  1.0,  null, 0.45, 'Mixed',            $now],
        ];

        $rows = array_map(fn ($p) => [
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
        ], $products);

        DB::table('products')->insert($rows);
    }
}
