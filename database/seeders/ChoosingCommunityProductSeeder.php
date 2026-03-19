<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Choosing Community – 2025 product set
 * Source: arielpremium.com/product-set/1298
 * Serials: 1117 – 1151
 */
class ChoosingCommunityProductSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $now = now()->toDateTimeString();

        // [serial, master_id, brand_id, description, L, W, H, dia, weight, material, year]
        $products = [

            // ── 2025 items ────────────────────────────────────────────────────
            [1117, 'WBA-FR25',  'Ariel', 'Freshman RPET Laundry Bag',                              20.0, 16.0,  0.25, null, 0.40, 'RPET Polyester',                    2025],
            [1118, 'WOR-CU25',  'Ariel', 'Cuddle Micro Plush Travel Blanket with Hood & Pillow',   50.0, 40.0,  3.0,  null, 1.50, 'Micro Plush Polyester',             2025],
            [1119, 'DTM-PG25',  'Ariel', 'Paragon 12 oz Recycled Tumbler',                          4.0,  4.0,  7.0,  4.0, 0.40, 'Recycled Polypropylene/Steel',      2025],
            [1120, 'WBA-PO25',  'Ariel', 'Polaris 20-Can RPET Cooler Backpack',                    17.0, 12.0, 10.0, null, 1.80, 'RPET Polyester',                    2025],
            [1121, 'WHF-PS25',  'Ariel', 'Popsicle Aqua Pearls Hot/Cold Pack',                      7.0,  3.0,  1.0, null, 0.25, 'Nylon/Gel Beads',                   2025],
            [1122, 'WLT-PX25',  'Ariel', 'Pixie Light-Up Wristband',                                7.5,  0.75, 0.25, null, 0.05, 'Silicone/LED',                     2025],
            [1123, 'WOF-EM25',  'Ariel', 'Emoji Pen',                                               5.5,  0.5,  0.5,  0.5, 0.04, 'Plastic',                          2025],
            [1124, 'WTE-AV25',  'Ariel', 'Avon 3-Card Phone Wallet with Magnetic Ring',             3.75, 2.5,  0.25, null, 0.08, 'Vegan Leather/Silicone',           2025],
            [1125, 'WTV-CL25',  'Ariel', 'Cloak Bag Hanger for Tables',                             2.5,  2.0,  0.5, null, 0.12, 'Zinc Alloy',                        2025],
            [1126, 'DWA-NV25',  'Ariel', 'Novo Combo 20 oz Insulated Mug with 12 oz Can Cooler',   4.0,  4.0,  9.0,  4.0, 1.20, 'Stainless Steel',                   2025],

            // ── 2024 items ────────────────────────────────────────────────────
            [1127, 'EAC-TB24',  'Ariel', 'Tribute 4-in-1 Charging Cable with Watch Charger',       5.0,  3.0,  1.0, null, 0.15, 'TPE/Braided Nylon',                 2024],
            [1128, 'WOR-SG24',  'Ariel', 'Best Buddy Tools Signature Key Ring',                     3.5,  1.5,  0.5, null, 0.10, 'Stainless Steel/Zinc Alloy',        2024],
            [1129, 'WOR-PB24',  'Ariel', 'Best Buddy Tools 8x21 Compact Pocket Binoculars',         4.5,  3.0,  1.5, null, 0.50, 'Polycarbonate/Rubber',              2024],
            [1130, 'LGB-NI24',  'Ariel', 'Nitro Super Bouncing Ball',                               2.0,  2.0,  2.0,  2.0, 0.10, 'Super Bounce Rubber',              2024],
            [1131, 'WBA-PT24',  'Ariel', 'Pearl Soft-Touch Tote Bag',                              16.0, 14.0,  4.0, null, 0.30, 'Non-Woven Polypropylene',           2024],
            [1132, 'WKA-FP24',  'Ariel', 'Firepit 5-Piece BBQ Set with Cutting Board',            14.0,  6.0,  3.0, null, 2.00, 'Stainless Steel/Bamboo',            2024],
            [1133, 'WGA-PC24',  'Ariel', 'Push Pop Cube',                                           2.0,  2.0,  2.0, null, 0.10, 'Silicone/ABS Plastic',             2024],
            [1134, 'WBA-CC24',  'Ariel', 'Cup Caddy Zippered Pouch for Large Mugs',                 6.0,  5.0,  5.0, null, 0.20, 'Neoprene',                         2024],
            [1135, 'WOF-SS24',  'Ariel', 'Saturn Spinning Ring Pen',                                5.5,  0.75, 0.75, 0.5, 0.05, 'ABS Plastic',                      2024],
            [1136, 'WGA-TH24',  'Ariel', 'Theta Spinning Top',                                      2.0,  2.0,  2.0,  2.0, 0.12, 'ABS Plastic/Metal',                2024],
            [1137, 'WSF-RL24',  'Ariel', 'Rally Pickleball Set',                                   17.0,  6.0,  4.0, null, 1.60, 'Polypropylene/Rubber',             2024],
            [1138, 'ALC-NL24',  'Ariel', 'AeroLOFT Never Lost Bluetooth Keychain',                  2.0,  1.5,  0.5, null, 0.05, 'ABS Plastic/Silicone',             2024],
            [1139, 'PAL-HE24',  'Ariel', 'Comfort Pals Heat Therapy Eye Pillow',                    9.0,  4.0,  1.5, null, 0.30, 'Polyester/Flaxseed Fill',           2024],

            // ── 2023 items ────────────────────────────────────────────────────
            [1140, 'WPC-MC23',  'Ariel', 'Microfiber Cleaning Cloth 6x6 in PVC Case',               6.0,  6.0,  0.1, null, 0.06, 'Microfiber/PVC',                   2023],
            [1141, 'WPC-GI23',  'Ariel', 'Gridiron 12x32 Waffle Microfiber Sports Towel',          32.0, 12.0,  0.25, null, 0.20, 'Microfiber',                      2023],
            [1142, 'WPC-SS23',  'Ariel', 'Seaside Full-Color 30x60 Microfiber Beach Towel',        60.0, 30.0,  0.5, null, 0.55, 'Microfiber',                        2023],
            [1143, 'WTV-ST23',  'Ariel', 'Fold N Go Adjustable Stadium Seat Cushion',              14.0, 12.0,  2.5, null, 0.90, 'Polyester/Foam',                   2023],

            // ── 2022 items ────────────────────────────────────────────────────
            [1144, 'WBA-SN22',  'Ariel', 'Sonnet Collapsible Cotton Mesh Tote',                    15.0, 13.0,  3.0, null, 0.25, 'Cotton Mesh',                      2022],
            [1145, 'WOR-SB22',  'Ariel', 'Sunburst 16 Inch Inflatable Beach Ball',                  8.0,  8.0,  1.0, null, 0.15, 'PVC Vinyl',                        2022],

            // ── Legacy items ──────────────────────────────────────────────────
            [1146, 'WHF-CC17',  'Ariel', 'Chap-Cube Vanilla Lip Balm',                              1.25, 1.25, 1.25, null, 0.06, 'SPF Beeswax',                     2017],
            [1147, 'WSA-SK15',  'Ariel', 'Safeguard Sunscreen Stick SPF 30',                        3.25, 1.0,  1.0,  1.0, 0.08, 'SPF 30 Compound',                  2015],
            [1148, 'WHF-BS13',  'Ariel', 'Lip Balm and Sunscreen Stick Combo',                      6.0,  1.5,  1.0, null, 0.14, 'SPF Wax Compound',                 2013],
            [1149, 'WOR-FB12',  'Ariel', 'Fun Flinger Foam Football',                                8.0,  5.0,  4.0, null, 0.20, 'Foam',                             2012],
            [1150, 'WTV-PB12',  'Ariel', 'Rainy Day Poncho Ball',                                    4.0,  4.0,  4.0,  4.0, 0.25, 'PEVA/Polyester',                  2012],
            [1151, 'WSA-GG11',  'Ariel', 'Gel Go 1 oz Hand Sanitizer',                              3.5,  1.25, 1.0, null, 0.10, 'Gel/LDPE Plastic',                 2011],
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
            'product_year'     => $p[10],
            'updated_at'       => $now,
        ], $products));

        // ── Category assignments ───────────────────────────────────────────────
        // 1=All  3=Bags  4=Blankets&Towels  5=Drinkware  6=Eco  7=Emergency
        // 8=Health  9=Home  10=HotCold  12=Lights&Tools  13=Novelties
        // 14=Office  15=Outdoors  17=Sports  18=Stress  19=Technology  20=Travel
        // 22=Choosing Community (featured)
        $categoryRows = [
            [1117, 1], [1117, 3], [1117, 6], [1117, 22],               // RPET laundry bag
            [1118, 1], [1118, 4], [1118, 20], [1118, 22],              // Travel blanket with hood
            [1119, 1], [1119, 5], [1119, 6], [1119, 22],              // Recycled tumbler
            [1120, 1], [1120, 3], [1120, 6], [1120, 22],              // RPET cooler backpack
            [1121, 1], [1121, 8], [1121, 10], [1121, 22],             // Hot/cold pack
            [1122, 1], [1122, 12], [1122, 13], [1122, 22],            // Light-up wristband
            [1123, 1], [1123, 13], [1123, 14], [1123, 22],            // Emoji pen
            [1124, 1], [1124, 19], [1124, 20], [1124, 22],            // Phone wallet
            [1125, 1], [1125, 20], [1125, 22],                        // Bag hanger
            [1126, 1], [1126, 5], [1126, 22],                         // Mug + can cooler combo
            [1127, 1], [1127, 19], [1127, 22],                        // 4-in-1 cable
            [1128, 1], [1128, 12], [1128, 22],                        // Signature key ring
            [1129, 1], [1129, 12], [1129, 15], [1129, 22],            // Pocket binoculars
            [1130, 1], [1130, 13], [1130, 17], [1130, 22],            // Bouncing ball
            [1131, 1], [1131, 3], [1131, 22],                         // Pearl soft tote
            [1132, 1], [1132, 9], [1132, 15], [1132, 22],             // BBQ set
            [1133, 1], [1133, 13], [1133, 18], [1133, 22],            // Push pop cube
            [1134, 1], [1134, 3], [1134, 20], [1134, 22],             // Cup caddy pouch
            [1135, 1], [1135, 13], [1135, 14], [1135, 22],            // Saturn spinning pen
            [1136, 1], [1136, 13], [1136, 18], [1136, 22],            // Spinning top
            [1137, 1], [1137, 15], [1137, 17], [1137, 22],            // Pickleball set
            [1138, 1], [1138, 12], [1138, 19], [1138, 22],            // Bluetooth keychain
            [1139, 1], [1139, 8], [1139, 10], [1139, 22],             // Eye pillow
            [1140, 1], [1140, 9], [1140, 14], [1140, 22],             // Cleaning cloth
            [1141, 1], [1141, 4], [1141, 17], [1141, 22],             // Sports towel 12x32
            [1142, 1], [1142, 4], [1142, 17], [1142, 22],             // Beach towel 30x60
            [1143, 1], [1143, 15], [1143, 17], [1143, 22],            // Stadium seat cushion
            [1144, 1], [1144, 3], [1144, 6], [1144, 22],              // Cotton mesh tote
            [1145, 1], [1145, 13], [1145, 15], [1145, 22],            // Inflatable beach ball
            [1146, 1], [1146, 8], [1146, 22],                         // Cube lip balm
            [1147, 1], [1147, 8], [1147, 15], [1147, 22],             // Sunscreen stick
            [1148, 1], [1148, 8], [1148, 22],                         // Lip balm + sunscreen combo
            [1149, 1], [1149, 13], [1149, 17], [1149, 22],            // Foam football
            [1150, 1], [1150, 7], [1150, 20], [1150, 22],             // Poncho ball
            [1151, 1], [1151, 8], [1151, 22],                         // Hand sanitizer
        ];

        DB::table('product_category_assignments')->insert(
            array_map(fn ($r) => ['item_serial' => $r[0], 'category_id' => $r[1]], $categoryRows)
        );

        // ── Brand assignments (All Brands = 1) ────────────────────────────────
        DB::table('product_brand_assignments')->insert(
            array_map(fn ($p) => ['item_serial' => $p[0], 'brand_id' => 1], $products)
        );

        // ── Collection assignments ─────────────────────────────────────────────
        // 1=Luxury  2=Eco  3=Sport  4=Tech  5=Value  6=Corporate Picks
        $collectionRows = [
            [1117, 2], [1117, 5],               // RPET bag         → Eco, Value
            [1118, 5], [1118, 6],               // Travel blanket   → Value, Corporate
            [1119, 2], [1119, 5],               // Recycled tumbler → Eco, Value
            [1120, 2], [1120, 5],               // RPET backpack    → Eco, Value
            [1121, 5],                          // Hot/cold pack    → Value
            [1122, 5],                          // Wristband        → Value
            [1123, 5],                          // Emoji pen        → Value
            [1124, 4], [1124, 5],               // Phone wallet     → Tech, Value
            [1125, 5],                          // Bag hanger       → Value
            [1126, 1], [1126, 6],               // Mug combo        → Luxury, Corporate
            [1127, 4], [1127, 5],               // Charging cable   → Tech, Value
            [1128, 5], [1128, 6],               // Key ring         → Value, Corporate
            [1129, 5], [1129, 6],               // Binoculars       → Value, Corporate
            [1130, 5],                          // Bouncing ball    → Value
            [1131, 5], [1131, 6],               // Pearl tote       → Value, Corporate
            [1132, 1], [1132, 6],               // BBQ set          → Luxury, Corporate
            [1133, 5],                          // Push pop cube    → Value
            [1134, 5], [1134, 6],               // Cup caddy        → Value, Corporate
            [1135, 5],                          // Spinning pen     → Value
            [1136, 5],                          // Spinning top     → Value
            [1137, 3], [1137, 6],               // Pickleball       → Sport, Corporate
            [1138, 4], [1138, 5],               // Bluetooth key    → Tech, Value
            [1139, 5], [1139, 6],               // Eye pillow       → Value, Corporate
            [1140, 5],                          // Cleaning cloth   → Value
            [1141, 3], [1141, 5],               // Sports towel     → Sport, Value
            [1142, 3], [1142, 6],               // Beach towel      → Sport, Corporate
            [1143, 3], [1143, 6],               // Seat cushion     → Sport, Corporate
            [1144, 2], [1144, 5],               // Mesh tote        → Eco, Value
            [1145, 3], [1145, 5],               // Beach ball       → Sport, Value
            [1146, 5],                          // Lip balm         → Value
            [1147, 5],                          // Sunscreen        → Value
            [1148, 5],                          // Lip+sun combo    → Value
            [1149, 3], [1149, 5],               // Foam football    → Sport, Value
            [1150, 5],                          // Poncho ball      → Value
            [1151, 5],                          // Hand sanitizer   → Value
        ];

        DB::table('product_collection_assignments')->insert(
            array_map(fn ($r) => ['item_serial' => $r[0], 'collection_id' => $r[1]], $collectionRows)
        );
    }
}
