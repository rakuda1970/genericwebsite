<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Sustainable Solutions product set
 * Source: arielpremium.com/products/eco-friendly-and-sustainable
 * Serials: 1152–1346  (195 products)
 *
 * Five products already seeded (from ChoosingCommunityProductSeeder) also
 * appear on this eco page.  Those serials are cross-assigned to category 6
 * and/or 29 here via insertOrIgnore so there are no duplicate errors:
 *   1117 WBA-FR25  1119 DTM-PG25  1120 WBA-PO25  1132 WKA-FP24  1144 WBA-SN22
 */
class SustainableSolutionsProductSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $now = now()->toDateTimeString();

        // Columns: [serial, sku, brand, description, L, W, H, dia, wt, material, year]
        $products = [

            // ── 2026 – Lights & Tools ──────────────────────────────────────────
            [1152, 'WLT-CF26', 'Ariel', 'Best Buddy Tools Rechargeable Carabiner Folding LED Light',  6.0,  2.5, 1.5, null, 0.25, 'ABS Plastic/Aluminum',           2026],
            [1153, 'WLT-MM26', 'Ariel', 'Best Buddy Tools Rechargeable Multi-Mode Zoom Flashlight',   7.0,  2.0, 2.0, null, 0.30, 'Aluminum/ABS Plastic',           2026],

            // ── 2026 – Drinkware ───────────────────────────────────────────────
            [1154, 'DSB-EP26', 'Ariel', 'SENSO 360 Explorer 16 oz Eco-Friendly Vacuum Tumbler',       3.25, 3.25, 6.5, 3.25, 0.45, 'Recycled Stainless Steel',       2026],
            [1155, 'DTM-TR26', 'Ariel', '360 Troy 16 oz Eco-Friendly Leak Proof Vacuum Tumbler',      3.25, 3.25, 6.5, 3.25, 0.45, 'Recycled Stainless Steel',       2026],
            [1156, 'DBT-RE26', 'Ariel', 'Reeves 30 oz RPET Reusable Sports Bottle',                   3.0,  3.0, 10.5, 3.0, 0.35, 'RPET Plastic',                   2026],
            [1157, 'DBT-RV26', 'Ariel', 'Reeves 22 oz RPET Reusable Sports Bottle',                   2.75, 2.75, 9.5, 2.75, 0.28, 'RPET Plastic',                  2026],
            [1158, 'DBT-AL26', 'Ariel', 'Aloha 25 oz RPET Reusable Translucent Bottle with Carabiner',3.0,  3.0, 10.0, 3.0, 0.32, 'RPET Plastic',                   2026],
            [1159, 'DTM-CL26', 'Ariel', 'Clio 20 oz 2-in-1 Recycled Acrylic Straw Tumbler',          3.5,  3.5,  8.5, 3.5, 0.40, 'Recycled Acrylic',               2026],

            // ── 2026 – Notebooks ───────────────────────────────────────────────
            [1160, 'WOF-PO26', 'Ariel', 'House Push Pop Spiral Notebook',                             8.25, 5.5,  0.5, null, 0.30, 'Recycled Paper/Cardboard',      2026],
            [1161, 'WOF-PR26', 'Ariel', 'Round Push Pop Spiral Notebook',                             8.25, 5.5,  0.5, null, 0.30, 'Recycled Paper/Cardboard',      2026],
            [1162, 'DBT-AO26', 'Ariel', 'Aloha 25 oz RPET Reusable Bottle with Carabiner',            3.0,  3.0, 10.0, 3.0, 0.32, 'RPET Plastic',                   2026],
            [1163, 'DBT-FG26', 'Ariel', 'Fargo 32 oz Eco-Friendly Recycled Stainless Steel Bottle',   3.25, 3.25,11.0, 3.25, 0.55, 'Recycled Stainless Steel',       2026],
            [1164, 'DBT-JS26', 'Ariel', 'Josi 25 oz RPET Reusable Sports Bottle',                     3.0,  3.0, 10.0, 3.0, 0.32, 'RPET Plastic',                   2026],
            [1165, 'DBT-LN26', 'Ariel', 'Lennon 20 oz Eco-Friendly Straw Lid Vacuum Bottle',          2.75, 2.75, 9.5, 2.75, 0.40, 'Recycled Stainless Steel',       2026],
            [1166, 'DBT-PT26', 'Ariel', 'Phantom 24 oz 2-in-1 Tritan Renew Reusable Bottle',          3.0,  3.0, 10.0, 3.0, 0.40, 'Tritan Renew Recycled Plastic',  2026],
            [1167, 'DBT-TS26', 'Ariel', 'Tasman 24 oz RPET Reusable Plastic Bottle',                  3.0,  3.0, 10.0, 3.0, 0.30, 'RPET Plastic',                   2026],

            // ── 2026 – Tech / Charging ─────────────────────────────────────────
            [1168, 'EAC-TR26', 'Ariel', 'Triumph 3-in-1 Charging Cable with 4-Port USB Hub Recycled', 5.0,  3.5,  1.5, null, 0.20, 'Recycled ABS/TPE',              2026],
            [1191, 'EAC-HX26', 'Ariel', 'Hex 6-in-1 Light-Up Charging Cable with Carabiner Recycled', 6.0,  3.0,  0.75, null, 0.18, 'Recycled ABS/TPE',             2026],
            [1192, 'EAC-QU26', 'Ariel', 'Quad 4-Port USB-C and USB-A Hub with Recycled ABS Case',      5.0,  2.5,  1.0, null, 0.20, 'Recycled ABS Plastic',         2026],
            [1193, 'EAC-TE26', 'Ariel', 'Tetra 4-in-1 Charging Cable with Recycled Case Phone Stand',  6.5,  3.0,  0.75, null, 0.18, 'Recycled ABS/TPE',            2026],

            // ── 2026 – Bags ────────────────────────────────────────────────────
            [1169, 'WBA-LD26', 'Ariel', 'Lakeshore Recycled Nylon Drawstring Bag',                    17.0, 14.0, 0.5, null, 0.40, 'Recycled Nylon',                 2026],
            [1170, 'WBA-LT26', 'Ariel', 'Lakeshore Recycled Nylon Tote',                              15.0, 13.0, 4.0, null, 0.45, 'Recycled Nylon',                 2026],
            [1171, 'WBA-LU26', 'Ariel', 'Lakeshore Recycled Nylon Utility Pouch with Carabiner',       7.0,  5.5,  2.0, null, 0.20, 'Recycled Nylon',                2026],
            [1207, 'WBA-GW26', 'Ariel', 'Gateway RPET Drawstring Bag',                                16.0, 13.0, 0.5, null, 0.35, 'RPET Polyester',                 2026],
            [1210, 'WBA-AM26', 'Ariel', 'Americana RPET 2-Compartment Lunch Cooler Bag',              11.0,  8.0,  7.0, null, 0.60, 'RPET Polyester/Foam',           2026],
            [1211, 'WBA-CR26', 'Ariel', 'Crossroads 12-Can RPET Cooler Bag',                          13.0, 10.0,  8.0, null, 0.70, 'RPET Polyester',                2026],

            // ── 2026 – Cutlery / Kitchen ───────────────────────────────────────
            [1172, 'WKA-BA26', 'Ariel', 'Bamboo Cutlery Set In Cotton Drawstring Pouch',               8.0,  4.0,  1.5, null, 0.30, 'Bamboo/Cotton',                 2026],

            // ── 2026 – Journals & Notebooks ────────────────────────────────────
            [1173, 'WOF-AL26', 'Ariel', 'Alliance Hardcover Journal With Sticky Flags and Pen',        8.25, 5.5,  0.75, null, 0.50, 'Recycled Hardcover/Paper',     2026],
            [1174, 'WOF-AR26', 'Ariel', 'Artisan Sketch Pad with 10-Piece Colored Pencil Set',         9.0,  6.5,  1.0, null, 0.55, 'Recycled Paper/Wood',           2026],
            [1175, 'WOF-AV26', 'Ariel', 'Avignon Repreve Recycled Hardcover Spiral Notebook with Pen', 8.25, 5.5,  0.75, null, 0.45, 'Repreve Recycled/Paper',        2026],
            [1176, 'WOF-BS26', 'Ariel', 'Bamboo Soft Spiral Notebook With Sticky Notes',               8.25, 5.5,  0.75, null, 0.40, 'Bamboo/Recycled Paper',         2026],
            [1177, 'WOF-CA26', 'Ariel', 'Canyon Recycled Softcover Journal',                           8.25, 5.5,  0.5, null, 0.35, 'Recycled Paper/Cover',          2026],
            [1178, 'WOF-CB26', 'Ariel', 'Camber Spiral Notebook with Colorful Sticky Notes and Pen',   8.25, 5.5,  0.75, null, 0.45, 'Recycled Paper',                2026],
            [1179, 'WOF-CE26', 'Ariel', 'Centrum Spiral Notebook With Elastic Closure',                8.25, 5.5,  0.5, null, 0.38, 'Recycled Paper/Elastic',        2026],
            [1180, 'WOF-CH26', 'Ariel', 'Charter Textured Softcover Journal with Pen',                 8.25, 5.5,  0.5, null, 0.40, 'Recycled Textured Cover/Paper', 2026],
            [1181, 'WOF-DO26', 'Ariel', 'Doodle Mini Softcover Jotbook',                               5.5,  4.25, 0.35, null, 0.18, 'Recycled Paper/Cover',         2026],
            [1182, 'WOF-PA26', 'Ariel', 'Parley Repreve Recycled Hardcover Spiral Notebook',           8.25, 5.5,  0.75, null, 0.45, 'Repreve Recycled/Paper',        2026],
            [1183, 'WOF-PH26', 'Ariel', 'Heart Push Pop Spiral Notebook',                              8.25, 5.5,  0.5, null, 0.30, 'Recycled Paper/Cardboard',      2026],
            [1184, 'WOF-PP26', 'Ariel', 'Paw Push Pop Spiral Notebook',                                8.25, 5.5,  0.5, null, 0.30, 'Recycled Paper/Cardboard',      2026],
            [1185, 'WOF-PS26', 'Ariel', 'Square Push Pop Spiral Notebook',                             8.25, 5.5,  0.5, null, 0.30, 'Recycled Paper/Cardboard',      2026],
            [1186, 'WOF-PX26', 'Ariel', 'Praxis Recycled Spiral Notebook with Sticky Flags',           8.25, 5.5,  0.5, null, 0.38, 'Recycled Paper',                2026],
            [1187, 'WOF-SK26', 'Ariel', 'Skywriter Combo Recycled Plastic Ball Pen and Highlighter',   5.5,  1.0,  0.75, null, 0.08, 'Recycled Plastic',             2026],

            // ── 2026 – More Drinkware ──────────────────────────────────────────
            [1188, 'DTM-AA26', 'Ariel', 'Alaia 30 oz 2-in-1 Recycled Stainless Steel Vacuum Tumbler',  3.75, 3.75, 8.5, 3.75, 0.60, 'Recycled Stainless Steel',      2026],
            [1189, 'DTM-LS26', 'Ariel', 'Luster 16 oz 2-in-1 Recycled Acrylic Straw Tumbler',          3.25, 3.25, 6.5, 3.25, 0.38, 'Recycled Acrylic',              2026],
            [1190, 'DTM-ML26', 'Ariel', 'Marli 20 oz 2-in-1 Eco-Friendly Tumbler',                     3.5,  3.5,  7.5, 3.5,  0.45, 'Recycled Plastic',              2026],
            [1194, 'WTV-CC26', 'Ariel', 'Cool Clip Rechargeable Portable Fan with Magnet Base',          5.0,  3.0,  4.0, null, 0.40, 'Recycled ABS Plastic',         2026],
            [1195, 'DBT-LX26', 'Ariel', 'Lexi 17 oz Eco-Friendly Vacuum Steel Bottle with Bamboo Lid',  2.75, 2.75, 9.5, 2.75, 0.45, 'Recycled Stainless Steel/Bamboo',2026],
            [1196, 'DBT-VD26', 'Ariel', 'Vida 22 oz RPET Reusable Sports Bottle with Bamboo Lid',       2.75, 2.75, 9.5, 2.75, 0.32, 'RPET Plastic/Bamboo',           2026],
            [1197, 'DMU-SN26', 'Ariel', 'Seneca 30 oz Eco-Friendly Straw Mug',                          3.75, 3.75, 8.5, 3.75, 0.50, 'Recycled Plastic',              2026],
            [1198, 'DTM-TA26', 'Ariel', 'Talia 16 oz Eco-Friendly Vacuum Insulated Tumbler',            3.25, 3.25, 6.5, 3.25, 0.45, 'Recycled Stainless Steel',      2026],
            [1199, 'WGA-PF26', 'Ariel', 'Massage Finger Fidget Spinner',                                3.25, 3.25, 0.5, null, 0.08, 'Recycled ABS Plastic',          2026],
            [1200, 'DTM-ZE26', 'Ariel', 'Izzie 16 oz Eco-Friendly Vacuum Insulated Tumbler',            3.25, 3.25, 6.5, 3.25, 0.45, 'Recycled Stainless Steel',      2026],
            [1201, 'DWA-TY26', 'Ariel', 'Tuscany 24 oz Eco-Friendly 2-in-1 Vacuum Insulated Bottle',    3.0,  3.0, 10.0, 3.0,  0.55, 'Recycled Stainless Steel',      2026],
            [1202, 'DBT-ED26', 'Ariel', 'Eden 30 oz Eco-Friendly Recycled Stainless Steel Bottle',      3.25, 3.25,11.0, 3.25, 0.55, 'Recycled Stainless Steel',       2026],
            [1203, 'DTM-HA26', 'Ariel', 'Havana 22 oz Recycled Polypropylene Tumbler Silicone Straw',   3.5,  3.5,  7.5, 3.5,  0.40, 'Recycled Polypropylene',        2026],
            [1204, 'DTM-TN26', 'Ariel', 'Tonal 16 oz Eco-Friendly Tumbler',                             3.25, 3.25, 6.5, 3.25, 0.38, 'Recycled Plastic',              2026],
            [1205, 'DWA-AT26', 'Ariel', 'Alta 20 oz Eco-Friendly Vacuum Insulated Straw Mug',           3.5,  3.5,  7.5, 3.5,  0.50, 'Recycled Stainless Steel',      2026],
            [1206, 'DWA-MO26', 'Ariel', 'Minos 21 oz Eco-Friendly 2-in-1 Vacuum Insulated Tumbler',    3.5,  3.5,  7.5, 3.5,  0.55, 'Recycled Stainless Steel',      2026],

            // ── 2026 – Tech & Cables ───────────────────────────────────────────
            [1208, 'EAC-BO26', 'Ariel', 'Bolt 4-in-1 39in Bamboo and RPET 100W Charging Data Cable',   5.0,  3.5,  1.0, null, 0.18, 'Bamboo/RPET',                   2026],

            // ── 2026 – Apparel ─────────────────────────────────────────────────
            [1212, 'WSC-SA26', 'Ariel', 'Custom Athletic Socks USA Made',                               9.0,  4.0,  1.0, null, 0.15, 'Recycled Cotton/Polyester',     2026],
            [1213, 'WSC-SC26', 'Ariel', 'Custom Crew Socks USA Made',                                   9.0,  4.0,  1.0, null, 0.15, 'Recycled Cotton/Polyester',     2026],
            [1214, 'WSC-SK26', 'Ariel', 'Custom Ankle Socks USA Made',                                  7.0,  4.0,  0.75, null, 0.12, 'Recycled Cotton/Polyester',    2026],
            [1215, 'WSC-SQ26', 'Ariel', 'Custom Athletic Quarter Crew Socks USA Made',                  8.0,  4.0,  0.75, null, 0.13, 'Recycled Cotton/Polyester',    2026],

            // ── 2026 – Accessories ─────────────────────────────────────────────
            [1216, 'WTE-BM26', 'Ariel', 'Bamboo Phone Stand with Stress Reliever Keyboard',             5.25, 4.0,  1.5, null, 0.25, 'Bamboo/Silicone',               2026],

            // ── 2025 – Lights & Tools ──────────────────────────────────────────
            [1217, 'WLT-RC25', 'Ariel', 'Best Buddy Tools Rechargeable Carabiner LED Flashlight',       5.0,  2.0,  1.5, null, 0.20, 'Aluminum/ABS Plastic',          2025],
            [1241, 'WPC-AL25', 'Ariel', 'Allure Rechargeable Dual Pocket Mirror with 2 Light Modes',    5.5,  3.5,  1.0, null, 0.35, 'ABS Plastic/Mirror',            2025],

            // ── 2025 – Kitchen ─────────────────────────────────────────────────
            [1218, 'WKA-CA25', 'Ariel', 'Canteen Stackable Lunch Box With Utensils',                   10.0,  7.0,  5.0, null, 0.80, 'Recycled Plastic/SS',           2025],
            [1219, 'WKA-CH25', 'Ariel', 'Chuckwagon Stackable Lunch Box With Bamboo Lid and Utensils', 10.0,  7.0,  5.0, null, 0.90, 'Recycled Plastic/Bamboo',       2025],

            // ── 2025 – Drinkware ───────────────────────────────────────────────
            [1220, 'DTM-HA25', 'Ariel', 'Harbor 40 oz Recycled Tumbler with Straw',                     4.0,  4.0, 11.0, 4.0,  0.60, 'Recycled Polypropylene',        2025],
            [1225, 'WOF-AM25', 'Ariel', 'The Ambassador Executive Spiral Journal',                      8.25, 5.5,  0.75, null, 0.50, 'Recycled Cover/Paper',          2025],
            [1226, 'DWA-SA25', 'Ariel', 'Sanzio 21 oz RPET Bottle with Bamboo Lid',                     3.0,  3.0, 10.0, 3.0,  0.38, 'RPET Plastic/Bamboo',           2025],
            [1227, 'DBT-AV25', 'Ariel', 'Avento 25 oz Recycled Aluminum Bottle with Silicone Loop',     2.75, 2.75,10.0, 2.75, 0.45, 'Recycled Aluminum',             2025],
            [1228, 'DBT-HU25', 'Ariel', 'Husky 24 oz RPET Bottle',                                      3.0,  3.0, 10.0, 3.0,  0.30, 'RPET Plastic',                  2025],
            [1229, 'DBT-SW25', 'Ariel', 'Switchback 27 oz RPET Bottle with Snap-Top Lid and Carabiner', 3.0,  3.0, 10.5, 3.0,  0.35, 'RPET Plastic',                  2025],
            [1232, 'DBT-CA25', 'Ariel', 'Cabrio 24 oz Recycled Stainless Steel Vacuum Insulated Bottle',3.0,  3.0, 10.0, 3.0,  0.55, 'Recycled Stainless Steel',       2025],
            [1233, 'DBT-CB25', 'Ariel', 'Cabrio 32 oz Recycled Stainless Steel Vacuum Insulated Bottle',3.25, 3.25,11.0, 3.25, 0.65, 'Recycled Stainless Steel',       2025],
            [1234, 'DBT-CM25', 'Ariel', 'Cameo 23 oz PLA Sports Bottle with Silicone Loop Handle',      3.0,  3.0, 10.0, 3.0,  0.38, 'PLA Bioplastic/Silicone',       2025],

            // ── 2025 – Tech / Power ────────────────────────────────────────────
            [1221, 'EPB-FU25', 'Ariel', 'Fusion 5000mAh Solar-Charging Power Bank',                     5.5,  3.0,  0.75, null, 0.55, 'Recycled ABS/Solar Panel',     2025],
            [1209, 'EAC-CA25', 'Ariel', 'Cask Portable Charging Cable with Spinner',                    4.0,  3.0,  0.75, null, 0.12, 'Recycled ABS/TPE',             2025],

            // ── 2025 – Notebooks ───────────────────────────────────────────────
            [1222, 'WOF-CO25', 'Ariel', 'Corral Hardcover Journal',                                     8.25, 5.5,  0.75, null, 0.50, 'Recycled Hardcover/Paper',     2025],
            [1223, 'WOF-EV25', 'Ariel', 'Evergreen Kraft Notebook',                                     8.25, 5.5,  0.5, null, 0.35, 'Kraft Recycled Paper',          2025],

            // ── 2025 – Bags ────────────────────────────────────────────────────
            [1224, 'WBA-CY25', 'Ariel', 'Calypso 75GSM Recycled Non-Woven Polypropylene Insulated Tote',15.0,13.0,  4.0, null, 0.45, 'Recycled Non-Woven PP',         2025],
            [1235, 'WBA-GA25', 'Ariel', 'Galley RPET Insulated Lunch Bag',                              12.0,  9.0,  7.0, null, 0.55, 'RPET Polyester',               2025],

            // ── 2025 – Kitchen / Home ──────────────────────────────────────────
            [1230, 'WKA-MF25', 'Ariel', 'Rechargeable Milk Frother',                                     7.0,  2.5,  2.5, null, 0.25, 'Recycled ABS/Stainless',       2025],
            [1231, 'WHO-DY25', 'Ariel', 'Dynamo Rechargeable Portable Vacuum Cleaner',                   9.0,  4.0,  4.0, null, 0.90, 'Recycled ABS Plastic',         2025],
            [1236, 'WHO-TD25', 'Ariel', 'Toss N Dry 2-Piece Reusable Dryer Balls in Cotton Pouch',       4.0,  3.5,  3.0, 3.5,  0.30, 'Natural Rubber/Cotton',        2025],
            [1237, 'WKA-GO25', 'Ariel', 'On-The-Go Collapsible Cutlery Set',                             7.0,  2.0,  1.5, null, 0.20, 'Wheat Straw/Silicone',         2025],
            [1238, 'WKA-NO25', 'Ariel', 'Nosh Recycled Polypropylene Lunch Box',                        10.0,  7.0,  4.5, null, 0.60, 'Recycled Polypropylene',       2025],
            [1239, 'WKA-PM25', 'Ariel', 'Pitmaster Recycled Cotton Apron',                              32.0, 24.0,  0.5, null, 0.70, 'Recycled Cotton',              2025],

            // ── 2024 – Lights ──────────────────────────────────────────────────
            [1240, 'WLT-GX24', 'Ariel', 'Best Buddy Tools Galaxy Rechargeable Combo LED Lantern Flashlight',6.0, 3.0, 3.0, null, 0.55, 'ABS Plastic/Aluminum',        2024],
            [1242, 'WLT-DM24', 'Ariel', 'Best Buddy Tools Duo Beam Rechargeable LED and COB Flashlight',  6.0,  2.0, 2.0, null, 0.28, 'Aluminum/ABS Plastic',        2024],
            [1243, 'WLT-ZM24', 'Ariel', 'Best Buddy Tools Zoom Rechargeable Aluminum Telescopic LED Flashlight',7.5, 1.75,1.75,null,0.38, 'Aluminum',                  2024],
            [1273, 'WLT-CM24', 'Ariel', 'Best Buddy Tools Comet 2-in-1 Rechargeable COB Lightbar Headlamp', 8.0, 2.5, 2.0, null, 0.45, 'ABS Plastic/Aluminum',        2024],
            [1274, 'WLT-RR24', 'Ariel', 'Best Buddy Tools Retro Pop Up Rechargeable COB Lantern',          4.0,  4.0, 5.0, null, 0.45, 'ABS Plastic',                 2024],

            // ── 2024 – Drinkware ───────────────────────────────────────────────
            [1244, 'DBT-NX24', 'Ariel', 'Nexus 27 oz Recycled Aluminum Bottle with Flip-Top Lid Carabiner',2.75,2.75,10.5,2.75,0.45, 'Recycled Aluminum',           2024],
            [1258, 'DBT-LG24', 'Ariel', 'Lagoon 20 oz RPET Bottle',                                      2.75, 2.75, 9.0, 2.75, 0.28, 'RPET Plastic',               2024],
            [1264, 'DTM-ST24', 'Ariel', 'Stirling 18 oz Glass Tumbler with Silicone Sleeve and PP Straw',  3.5,  3.5, 7.5, 3.5,  0.60, 'Recycled Glass/Silicone',   2024],
            [1268, 'DNM-CT24', 'Ariel', 'NAYAD Cortado 16 oz Coffee Grounds Recycled Polypropylene Mug',   3.5,  3.5, 6.5, 3.5,  0.55, 'Coffee Grounds/Recycled PP', 2024],

            // ── 2024 – Tech / Charging ─────────────────────────────────────────
            [1245, 'EAC-MF23', 'Ariel', 'Magport Bamboo 15W Wireless Charger',                           5.0,  5.0,  0.5, null, 0.40, 'FSC Bamboo',                   2023],
            [1248, 'ESP-BS24', 'Ariel', 'Bamboo Wireless Speaker with 10W Wireless Charger',               6.5,  6.5,  1.5, null, 0.80, 'FSC Bamboo',                  2024],
            [1249, 'EPB-BB24', 'Ariel', 'FSC Bamboo RPET 2000mAh Mini Power Bank',                        4.5,  2.0,  0.75, null, 0.35, 'FSC Bamboo/RPET',            2024],
            [1250, 'ESP-ES24', 'Ariel', 'EcoSound Bamboo Recycled Aluminum Wireless Speaker',              5.5,  3.0,  3.0, null, 0.60, 'Bamboo/Recycled Aluminum',    2024],
            [1253, 'EAC-BR24', 'Ariel', 'Bamboo Retractable 3-in-1 Charging Cable with Dual Inputs',       4.0,  3.0,  0.75, null, 0.15, 'Bamboo/TPE',                 2024],
            [1256, 'EAC-BD24', 'Ariel', 'Bamboo Dual Port USB and Type-C Hub',                             4.5,  2.5,  0.75, null, 0.18, 'FSC Bamboo',                 2024],
            [1277, 'EPB-SV24', 'Ariel', 'Sovereign 4000mAh Wireless Charging Power Bank Recycled Case',    5.0,  2.75, 0.75, null, 0.50, 'Recycled ABS/Bamboo',        2024],
            [1278, 'WMG-BM24', 'Ariel', 'Bamboo Magnetic Power Clip',                                      2.5,  1.5,  0.75, null, 0.12, 'FSC Bamboo',                 2024],
            [1303, 'EAC-LG23', 'Ariel', 'Legion 3-in-1 Charging Station with Ambient Lamp',               7.0,  5.0,  5.0, null, 0.90, 'Recycled ABS/Bamboo',         2023],

            // ── 2024 – Bags ────────────────────────────────────────────────────
            [1246, 'ALB-EC24', 'Ariel', 'AeroLOFT ECO Anywhere Crossbody Mini Backpack',                  11.0,  9.0,  3.0, null, 0.55, 'Recycled Polyester',          2024],
            [1247, 'ALB-EH24', 'Ariel', 'AeroLOFT ECO Anywhere Belt Bag',                                  9.0,  5.0,  2.0, null, 0.35, 'Recycled Polyester',          2024],
            [1269, 'WBA-SB24', 'Ariel', 'Savanna Jute and Recycled Cotton Backpack',                      16.0, 14.0,  5.0, null, 0.70, 'Jute/Recycled Cotton',        2024],
            [1270, 'WBA-SC24', 'Ariel', 'Savanna Jute and Recycled Cotton Cooler Bag',                    13.0, 10.0,  7.0, null, 0.65, 'Jute/Recycled Cotton',        2024],
            [1271, 'WBA-SD24', 'Ariel', 'Savanna Jute and Recycled Cotton Drawstring Backpack',           15.0, 13.0,  0.5, null, 0.40, 'Jute/Recycled Cotton',        2024],
            [1272, 'WBA-ST24', 'Ariel', 'Savanna Jute and Recycled Cotton Cooler Tote',                   14.0, 12.0,  6.0, null, 0.65, 'Jute/Recycled Cotton',        2024],

            // ── 2024 – Accessories / Phone ─────────────────────────────────────
            [1251, 'WTE-TV24', 'Ariel', 'Traveler Adjustable Phone Carrier and Lanyard',                   8.0,  3.5,  0.5, null, 0.15, 'Bamboo/Nylon',                2024],
            [1259, 'WTT-BA24', 'Ariel', 'Best Buddy Tools Bamboo Multi-Tool with Carabiner',               4.5,  2.0,  1.0, null, 0.25, 'FSC Bamboo/Stainless Steel',  2024],
            [1260, 'WKA-BA24', 'Ariel', 'Bamboo Coaster with Bottle Opener',                               4.0,  4.0,  0.25, null, 0.15, 'FSC Bamboo',                 2024],
            [1267, 'WKA-PT24', 'Ariel', 'Pop Top Bamboo Bottle Opener',                                    4.0,  1.5,  0.75, null, 0.12, 'FSC Bamboo',                 2024],

            // ── 2024 – Notebooks & Journals ────────────────────────────────────
            [1254, 'WOF-EX24', 'Ariel', 'Executive FSC Journal with Textured Grommet Spine',              8.25, 5.5,  0.75, null, 0.55, 'FSC Certified Paper/Cover',   2024],
            [1255, 'WOF-GF24', 'Ariel', 'GrassField Cork Recycled Journal with Pen',                      8.25, 5.5,  0.75, null, 0.50, 'Cork/Recycled Paper',         2024],
            [1257, 'WOF-PL24', 'Ariel', 'Plantation Fruit and Nut Pulp Paper Journal',                    8.25, 5.5,  0.5, null, 0.40, 'Fruit/Nut Pulp Paper',        2024],
            [1261, 'WOF-SV24', 'Ariel', 'Savvy Recycled Journal',                                         8.25, 5.5,  0.5, null, 0.38, 'Recycled Cover/Paper',        2024],
            [1262, 'WOF-EL24', 'Ariel', 'Elan Hardcover Journal with Pen Loop and Inner Pocket',          8.25, 5.5,  0.75, null, 0.50, 'Recycled Hardcover/Paper',    2024],
            [1263, 'WOF-ET24', 'Ariel', 'Elite Softcover FSC Leatherette Journal',                        8.25, 5.5,  0.5, null, 0.45, 'FSC Leatherette/Paper',       2024],
            [1265, 'WOF-KR24', 'Ariel', 'Kraft Recycled Journal',                                         8.25, 5.5,  0.5, null, 0.35, 'Kraft Recycled Paper',        2024],
            [1266, 'WOF-PR24', 'Ariel', 'Prairie Fragrant Grass Recycled Spiral Notebook with Pen',       8.25, 5.5,  0.75, null, 0.40, 'Recycled Grass Paper',        2024],
            [1275, 'WOF-AG24', 'Ariel', 'Agenda Recycled Spiral Notebook with Sticky Notes and Pen',      8.25, 5.5,  0.75, null, 0.45, 'Recycled Paper',              2024],
            [1276, 'WOF-FL24', 'Ariel', 'Flip Recycled Spiral Notebook with Pen',                         8.25, 5.5,  0.5, null, 0.38, 'Recycled Paper',              2024],

            // ── 2023 – Tech / Charging ─────────────────────────────────────────
            [1279, 'WTE-FP23', 'Ariel', 'Bamboo Portable Phone Stand',                                     3.5,  3.0,  3.0, null, 0.15, 'FSC Bamboo',                  2023],
            [1280, 'WTE-FB23', 'Ariel', 'Bamboo Bloc Phone Stand',                                         3.5,  3.0,  3.0, null, 0.15, 'FSC Bamboo',                  2023],
            [1281, 'EAC-PF23', 'Ariel', 'Panda Bamboo 15W Wireless Charger with Dual USB Ports',           5.0,  5.0,  0.5, null, 0.45, 'FSC Bamboo',                  2023],
            [1283, 'EAC-FB23', 'Ariel', 'FSC Bamboo Wireless Charger Portable Phone Stand',                5.5,  4.5,  1.5, null, 0.50, 'FSC Bamboo',                  2023],
            [1284, 'EAC-TR23', 'Ariel', 'Trident 15W Wireless Charger Made With FSC Cork Recycled Plastic',5.0,  5.0,  0.5, null, 0.45, 'FSC Cork/Recycled Plastic',   2023],
            [1285, 'ESP-OV23', 'Ariel', 'Ovation 10W Stereo Speaker Made With FSC Cork Recycled Plastic',  6.0,  3.0,  3.0, null, 0.70, 'FSC Cork/Recycled Plastic',   2023],
            [1286, 'WOF-JF23', 'Ariel', 'Jot N Plot FSC Eco-Friendly Organizer Notebook',                  8.25, 5.5,  0.75, null, 0.50, 'FSC Paper/Recycled Cover',    2023],
            [1287, 'EPB-BF23', 'Ariel', 'Bamboo 5000mAh Type-C Power Bank',                                5.0,  2.5,  0.75, null, 0.55, 'FSC Bamboo',                  2023],
            [1288, 'EPB-FS23', 'Ariel', 'FSC Bamboo 5000mAh Dual Port Power Bank with Wireless Charger',   5.5,  3.0,  0.75, null, 0.60, 'FSC Bamboo',                  2023],
            [1289, 'EAC-BL23', 'Ariel', 'Bamboo 3-in-1 39in Charging Cable',                               5.0,  3.0,  1.0, null, 0.18, 'FSC Bamboo/TPE',              2023],
            [1290, 'EAC-BS23', 'Ariel', 'Bamboo 3-in-1 6in Charging Cable',                                3.5,  2.5,  0.75, null, 0.12, 'FSC Bamboo/TPE',              2023],
            [1291, 'EPB-FB23', 'Ariel', 'Bamboo 10000mAh Dual Port Power Bank with 10W Wireless Charger',  6.0,  3.0,  0.75, null, 0.85, 'FSC Bamboo',                  2023],

            // ── 2023 – Tools / Kitchen ─────────────────────────────────────────
            [1252, 'ESP-MF23', 'Ariel', 'Mahogany Wireless Speaker with Wireless Charger',                 6.0,  4.0,  3.0, null, 0.80, 'Mahogany Wood',               2023],
            [1292, 'WTT-AS23', 'Ariel', 'Assay 3ft Tape Measure with Light',                               3.5,  3.5,  1.5, null, 0.20, 'Recycled ABS Plastic',        2023],
            [1293, 'WKA-FB23', 'Ariel', 'Bamboo Cutting Board',                                            12.0,  8.0,  0.5, null, 0.80, 'FSC Bamboo',                  2023],
            [1299, 'WKA-DF23', 'Ariel', 'Double Decker Lunch Box with FSC Bamboo Lid and Utensils',        10.0,  7.0,  6.0, null, 1.00, 'Recycled Plastic/FSC Bamboo', 2023],
            [1300, 'WOF-FS23', 'Ariel', 'Bamboo Sticky Note Dispenser with Phone Holder',                   5.0,  4.5,  4.0, null, 0.30, 'FSC Bamboo',                  2023],

            // ── 2023 – Drinkware ───────────────────────────────────────────────
            [1301, 'DBT-AS23', 'Ariel', 'Asbury 24 oz Recycled Aluminum Bottle',                           2.75, 2.75,10.0, 2.75, 0.45, 'Recycled Aluminum',           2023],

            // ── 2023 – Lights ──────────────────────────────────────────────────
            [1302, 'WLT-NS23', 'Ariel', 'Best Buddy Tools Northstar Rechargeable COB Light Magnet Stand',   5.0,  3.5,  2.0, null, 0.40, 'ABS Plastic/Aluminum',        2023],
            [1313, 'WLT-LY23', 'Ariel', 'Lyra Rechargeable COB Worklight and LED Flashlight',               9.0,  2.5,  2.0, null, 0.45, 'ABS Plastic/Aluminum',        2023],
            [1314, 'WLT-ST23', 'Ariel', 'Best Buddy Tools Starlight Rechargeable LED Headlamp',             6.5,  3.0,  2.0, null, 0.35, 'ABS Plastic',                 2023],

            // ── 2023 – Journals ────────────────────────────────────────────────
            [1304, 'WOF-VQ23', 'Ariel', 'Vaquero Recycled Leather Journal',                                 8.25, 5.5,  0.75, null, 0.55, 'Recycled Leatherette/Paper',  2023],

            // ── 2023 – Bags ────────────────────────────────────────────────────
            [1294, 'WBA-CC23', 'Ariel', 'Carina RPET and Cork Insulated Cooler Bag',                       12.0,  9.0,  7.0, null, 0.60, 'RPET Polyester/Cork',         2023],
            [1295, 'WBA-CD23', 'Ariel', 'Carina RPET and Cork Drawstring Backpack',                        15.0, 13.0,  0.5, null, 0.40, 'RPET Polyester/Cork',         2023],
            [1296, 'WBA-CT23', 'Ariel', 'Carina RPET and Cork Tote Bag',                                   15.0, 13.0,  4.0, null, 0.50, 'RPET Polyester/Cork',         2023],
            [1305, 'WBA-SC23', 'Ariel', 'Schooner RPET Canvas Lunch Tote',                                 12.0,  9.0,  6.0, null, 0.55, 'RPET Canvas',                 2023],
            [1306, 'WBA-SL23', 'Ariel', 'Sloop RPET Canvas Drawstring Backpack',                           16.0, 14.0,  0.5, null, 0.45, 'RPET Canvas',                 2023],
            [1309, 'WBA-CN23', 'Ariel', 'Carnival RPET Cooler Tote',                                       14.0, 12.0,  5.0, null, 0.55, 'RPET Polyester',              2023],
            [1310, 'WBA-OR23', 'Ariel', 'Orion 5 oz 50/50 Recycled Cotton Drawstring Backpack',            16.0, 13.0,  0.5, null, 0.45, '50/50 Recycled Cotton/Poly',  2023],
            [1311, 'WBA-OT23', 'Ariel', 'Orion 10 oz 50/50 Recycled Cotton Tote',                          15.0, 14.0,  4.0, null, 0.55, '50/50 Recycled Cotton/Poly',  2023],

            // ── 2023 – Home / Eco Accessories ─────────────────────────────────
            [1307, 'WKA-BC23', 'Ariel', 'Bamboo 4-Piece Coaster Set',                                       5.0,  4.5,  1.5, null, 0.40, 'FSC Bamboo',                  2023],
            [1308, 'DBT-PU23', 'Ariel', 'Puebla 26 oz RPET Bottle',                                         3.0,  3.0, 10.5, 3.0,  0.32, 'RPET Plastic',               2023],
            [1312, 'WKA-BM23', 'Ariel', 'Bamboo Marble Combo Coaster',                                       4.0,  4.0,  0.5, null, 0.18, 'Bamboo/Marble',              2023],

            // ── 2023 – Apparel ─────────────────────────────────────────────────
            [1315, 'WOR-FV23', 'Ariel', 'Farview Roll Up Cuff RPET Knit Beanie',                            10.0,  8.0,  2.0, null, 0.30, 'RPET Recycled Knit',          2023],
            [1316, 'WOR-SU23', 'Ariel', 'Sundance RPET Knit Beanie',                                        10.0,  8.0,  2.0, null, 0.28, 'RPET Recycled Knit',          2023],

            // ── 2023 – Eyewear ─────────────────────────────────────────────────
            [1317, 'WPC-BB23', 'Ariel', 'Bamboo Recycled Polycarbonate UV400 Sunglasses',                    5.5,  6.0,  1.5, null, 0.10, 'Bamboo/Recycled Polycarbonate',2023],
            [1318, 'WPC-WG23', 'Ariel', 'Westgate Recycled Polycarbonate UV400 Sunglasses',                  5.5,  6.0,  1.5, null, 0.08, 'Recycled Polycarbonate',      2023],

            // ── 2023 – Blankets ────────────────────────────────────────────────
            [1297, 'WOR-PD23', 'Ariel', 'Pinnacle Dye Sublimated RPET Polar Fleece Blanket',               60.0, 50.0,  2.0, null, 1.10, 'RPET Recycled Polar Fleece',  2023],
            [1298, 'WOR-PN23', 'Ariel', 'Pinnacle RPET Polar Fleece Blanket',                              60.0, 50.0,  2.0, null, 1.00, 'RPET Recycled Polar Fleece',  2023],

            // ── 2022 ───────────────────────────────────────────────────────────
            [1319, 'DNT-NE22', 'Ariel', 'NAYAD Neo 16 oz Coffee Grounds Recycled Polypropylene Tumbler',   3.25, 3.25, 6.5, 3.25, 0.55, 'Coffee Grounds/Recycled PP',   2022],
            [1320, 'WLT-BR22', 'Ariel', 'Broadway Clip-On Ring Light',                                      4.5,  4.5,  0.75, null, 0.20, 'ABS Plastic/LED',             2022],
            [1321, 'WLT-GS22', 'Ariel', 'Bike Light Gift Set',                                              7.0,  4.0,  2.5, null, 0.50, 'ABS Plastic/Aluminum',        2022],
            [1322, 'ESP-EM22', 'Ariel', 'Empire Bamboo Wireless Speaker with 5W Wireless Charger',          5.5,  5.5,  2.0, null, 0.80, 'FSC Bamboo',                  2022],
            [1323, 'WLT-BL22', 'Ariel', 'Best Buddy Tools Beam Rechargeable Pocket COB Light with Clip',    5.0,  2.5,  1.0, null, 0.25, 'ABS Plastic/Aluminum',        2022],
            [1324, 'DWA-CU22', 'Ariel', 'Cusano 22 oz Vacuum Insulated Stainless Steel Bottle Bamboo Cap',  2.75, 2.75, 9.5, 2.75, 0.55, 'Stainless Steel/Bamboo',      2022],
            [1325, 'DWA-ML22', 'Ariel', 'Milan 10 oz Ceramic Tumbler with Bamboo Lid',                      3.5,  3.5,  5.0, 3.5,  0.65, 'Ceramic/Bamboo',              2022],
            [1326, 'WBA-SR22', 'Ariel', 'Sunray RPET Reusable Shopping Bag',                               15.0, 13.0,  0.5, null, 0.30, 'RPET Polyester',              2022],
            [1327, 'WLT-LT22', 'Ariel', 'Lucent Rechargeable Bike Taillight',                               3.5,  2.0,  1.5, null, 0.12, 'ABS Plastic/Aluminum',        2022],
            [1328, 'WLT-NL22', 'Ariel', 'Best Buddy Tools Nightline COB plus LED Rechargeable Headlamp',    6.5,  3.0,  2.0, null, 0.35, 'ABS Plastic',                 2022],
            [1329, 'WBA-BZ22', 'Ariel', 'Bazaar RPET Folding Reusable Tote Bag',                           15.0, 13.0,  0.5, null, 0.28, 'RPET Polyester',              2022],
            [1330, 'WBA-GG22', 'Ariel', 'Grab N Go RPET Budget Drawstring Backpack',                       16.0, 13.0,  0.5, null, 0.30, 'RPET Polyester',              2022],
            [1331, 'WKA-PT22', 'Ariel', '6-in-1 Portable Wheatstraw Tableware Set',                         7.0,  2.0,  2.0, null, 0.25, 'Wheat Straw Fiber',           2022],
            [1332, 'WOF-RP22', 'Ariel', 'Reprise RPET Textured Journal With Stone Paper',                   8.25, 5.5,  0.75, null, 0.50, 'RPET Textured/Stone Paper',  2022],
            [1333, 'WOF-RV22', 'Ariel', 'Revue RPET Textured Journal',                                      8.25, 5.5,  0.5, null, 0.40, 'RPET Textured/Paper',         2022],
            [1282, 'DMU-BM22', 'Ariel', 'Bamboo Mug Warmer with 8 oz Ceramic Mug',                          6.0,  6.0,  4.0, null, 1.20, 'FSC Bamboo/Ceramic',          2022],

            // ── 2021 ───────────────────────────────────────────────────────────
            [1334, 'EHE-AT21', 'Ariel', 'Allegro TWS Earbuds with Solar Powered Charging Case',              4.5,  3.5,  2.0, null, 0.35, 'Recycled ABS/Solar Panel',    2021],
            [1335, 'EAC-SU21', 'Ariel', 'Sunrise Alarm Clock with Himalayan Salt Lamp Wireless Charger',     5.5,  5.5,  6.0, null, 1.10, 'Natural Salt Crystal/ABS',   2021],
            [1336, 'DWP-CS21', 'Ariel', 'Cafe 17 oz Sustainable To-Go Cup USA Made',                         4.0,  4.0,  6.5, 4.0,  0.35, 'Recycled Paperboard/PET',    2021],
            [1337, 'DMU-SP21', 'Ariel', 'Sip N Stir 12 oz Bamboo Polypropylene Mug with Spoon',              3.5,  3.5,  5.5, 3.5,  0.50, 'Bamboo/Recycled PP',          2021],

            // ── 2020 ───────────────────────────────────────────────────────────
            [1338, 'WPC-CR20', 'Ariel', 'Chiller RPET Cooling Towel',                                       36.0, 12.0,  0.25, null, 0.20, 'RPET Microfiber',             2020],
            [1339, 'WHO-EW20', 'Ariel', 'Eco Wheat Straw Kit With Cleaning Brush',                           8.0,  2.5,  2.5, null, 0.25, 'Wheat Straw Fiber',           2020],
            [1340, 'WPC-DW20', 'Ariel', 'Doral Wheat Straw Sunglasses',                                      5.5,  6.0,  1.5, null, 0.08, 'Wheat Straw Fiber',           2020],

            // ── 2018 ───────────────────────────────────────────────────────────
            [1341, 'DBT-LU18', 'Ariel', 'Light-Up 20 oz Tritan Bottle plus Solar Lantern',                   3.0,  3.0, 10.5, 3.0,  0.55, 'Tritan/Solar Panel',          2018],

            // ── 2010 ───────────────────────────────────────────────────────────
            [1342, 'WOF-RN10', 'Ariel', 'Promo Write Recycled Notebook',                                    8.25, 5.5,  0.5, null, 0.35, 'Recycled Paper/Cover',        2010],
            [1343, 'WOF-RW10', 'Ariel', 'Recycle Write Notebook and Pen',                                   8.25, 5.5,  0.5, null, 0.38, 'Recycled Paper/Cover',        2010],
            [1344, 'WOF-TG10', 'Ariel', 'Think Green Recycled Notepad and Pen',                              8.25, 5.5,  0.5, null, 0.35, 'Recycled Paper',              2010],
            [1345, 'WBA-PR10', 'Ariel', 'Picnic RPET Cooler Bag',                                           13.0, 10.0,  8.0, null, 0.65, 'RPET Polyester',              2010],
            [1346, 'WBA-XR10', 'Ariel', 'XL Insulated RPET Shopping Bag',                                   18.0, 14.0,  6.0, null, 0.80, 'RPET Polyester',              2010],
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

        // ── Category assignments ──────────────────────────────────────────────
        // 1=All  3=Bags  4=Blankets  5=Drinkware  6=Eco  9=Home  11=Journals
        // 12=Lights  13=Novelties  14=Office  15=Outdoors  17=Sports
        // 18=Stress  19=Tech  20=Travel  29=Sustainable Solutions (featured)
        $catMap = [
            // Lights & rechargeable tools
            1152 => [1,6,12,29],    1153 => [1,6,12,29],
            1217 => [1,6,12,29],    1240 => [1,6,12,15,29],
            1241 => [1,6,9,29],     1242 => [1,6,12,29],    1243 => [1,6,12,29],
            1273 => [1,6,12,29],    1274 => [1,6,12,29],
            1302 => [1,6,12,29],    1313 => [1,6,12,29],    1314 => [1,6,12,29],
            1320 => [1,6,12,29],    1321 => [1,6,12,15,29], 1323 => [1,6,12,29],
            1327 => [1,6,12,15,29], 1328 => [1,6,12,29],

            // Drinkware
            1154 => [1,5,6,29],     1155 => [1,5,6,29],
            1156 => [1,5,6,29],     1157 => [1,5,6,29],     1158 => [1,5,6,29],
            1159 => [1,5,6,29],     1162 => [1,5,6,29],     1163 => [1,5,6,29],
            1164 => [1,5,6,29],     1165 => [1,5,6,29],     1166 => [1,5,6,29],
            1167 => [1,5,6,29],
            1188 => [1,5,6,29],     1189 => [1,5,6,29],     1190 => [1,5,6,29],
            1195 => [1,5,6,29],     1196 => [1,5,6,29],     1197 => [1,5,6,29],
            1198 => [1,5,6,29],     1200 => [1,5,6,29],     1201 => [1,5,6,20,29],
            1202 => [1,5,6,29],     1203 => [1,5,6,29],     1204 => [1,5,6,29],
            1205 => [1,5,6,29],     1206 => [1,5,6,29],
            1220 => [1,5,6,29],     1226 => [1,5,6,20,29],  1227 => [1,5,6,29],
            1228 => [1,5,6,29],     1229 => [1,5,6,15,29],  1232 => [1,5,6,29],
            1233 => [1,5,6,29],     1234 => [1,5,6,29],
            1244 => [1,5,6,29],     1258 => [1,5,6,29],
            1264 => [1,5,6,29],     1268 => [1,5,6,29],
            1282 => [1,5,6,9,29],   1301 => [1,5,6,29],
            1308 => [1,5,6,29],
            1319 => [1,5,6,29],     1324 => [1,5,6,29],     1325 => [1,5,6,9,29],
            1336 => [1,5,6,29],     1337 => [1,5,6,9,29],   1341 => [1,5,6,12,29],

            // Bags, totes, coolers, backpacks
            1169 => [1,3,6,29],     1170 => [1,3,6,29],     1171 => [1,3,6,20,29],
            1207 => [1,3,6,29],     1210 => [1,3,6,29],     1211 => [1,3,6,29],
            1224 => [1,3,6,29],     1235 => [1,3,6,29],
            1246 => [1,3,6,20,29],  1247 => [1,3,6,20,29],
            1269 => [1,3,6,29],     1270 => [1,3,6,29],     1271 => [1,3,6,29],
            1272 => [1,3,6,29],
            1294 => [1,3,6,29],     1295 => [1,3,6,29],     1296 => [1,3,6,29],
            1305 => [1,3,6,29],     1306 => [1,3,6,29],     1309 => [1,3,6,29],
            1310 => [1,3,6,29],     1311 => [1,3,6,29],
            1326 => [1,3,6,29],     1329 => [1,3,6,29],     1330 => [1,3,6,29],
            1345 => [1,3,6,29],     1346 => [1,3,6,29],

            // Journals & Notebooks
            1160 => [1,6,11,14,29], 1161 => [1,6,11,14,29],
            1173 => [1,6,11,14,29], 1174 => [1,6,11,14,29], 1175 => [1,6,11,14,29],
            1176 => [1,6,11,29],    1177 => [1,6,11,14,29], 1178 => [1,6,11,14,29],
            1179 => [1,6,11,14,29], 1180 => [1,6,11,14,29], 1181 => [1,6,11,14,29],
            1182 => [1,6,11,14,29], 1183 => [1,6,11,29],    1184 => [1,6,11,29],
            1185 => [1,6,11,29],    1186 => [1,6,11,14,29], 1187 => [1,6,14,29],
            1222 => [1,6,11,14,29], 1223 => [1,6,11,29],    1225 => [1,6,11,14,29],
            1254 => [1,6,11,14,29], 1255 => [1,6,11,14,29], 1257 => [1,6,11,29],
            1261 => [1,6,11,14,29], 1262 => [1,6,11,14,29], 1263 => [1,6,11,14,29],
            1265 => [1,6,11,14,29], 1266 => [1,6,11,29],    1275 => [1,6,11,14,29],
            1276 => [1,6,11,14,29], 1286 => [1,6,11,14,29], 1304 => [1,6,11,14,29],
            1332 => [1,6,11,14,29], 1333 => [1,6,11,14,29],
            1342 => [1,6,11,29],    1343 => [1,6,11,14,29], 1344 => [1,6,14,29],

            // Tech / Charging
            1168 => [1,6,19,29],    1191 => [1,6,12,19,29], 1192 => [1,6,19,29],
            1193 => [1,6,19,29],    1208 => [1,6,19,29],    1209 => [1,6,19,29],
            1221 => [1,6,19,29],    1245 => [1,6,19,29],    1248 => [1,6,19,29],
            1249 => [1,6,19,29],    1250 => [1,6,19,29],    1252 => [1,6,19,29],
            1253 => [1,6,19,29],    1256 => [1,6,19,29],    1277 => [1,6,19,29],
            1278 => [1,6,14,19,29], 1279 => [1,6,14,19,29], 1280 => [1,6,14,19,29],
            1281 => [1,6,19,29],    1283 => [1,6,19,29],    1284 => [1,6,19,29],
            1285 => [1,6,19,29],    1287 => [1,6,19,29],    1288 => [1,6,19,29],
            1289 => [1,6,19,29],    1290 => [1,6,19,29],    1291 => [1,6,19,29],
            1303 => [1,6,19,29],    1322 => [1,6,19,29],    1334 => [1,6,19,29],
            1335 => [1,6,9,19,29],

            // Kitchen & Home
            1172 => [1,6,9,29],     1218 => [1,6,9,29],     1219 => [1,6,9,29],
            1230 => [1,6,9,29],     1231 => [1,6,9,14,29],  1236 => [1,6,9,29],
            1237 => [1,6,9,20,29],  1238 => [1,6,9,29],     1239 => [1,6,9,29],
            1259 => [1,6,12,15,29], 1260 => [1,6,9,29],     1267 => [1,6,9,29],
            1292 => [1,6,12,29],    1293 => [1,6,9,29],     1299 => [1,6,9,29],
            1300 => [1,6,9,14,29],  1307 => [1,6,9,29],     1312 => [1,6,9,29],
            1331 => [1,6,9,29],     1339 => [1,6,9,29],

            // Apparel & wearables
            1212 => [1,6,17,29],    1213 => [1,6,17,29],    1214 => [1,6,17,29],
            1215 => [1,6,17,29],    1315 => [1,6,17,29],    1316 => [1,6,17,29],

            // Accessories / phone stands
            1194 => [1,6,14,29],    1216 => [1,6,14,29],    1251 => [1,6,19,20,29],

            // Eyewear & personal accessories
            1317 => [1,6,15,29],    1318 => [1,6,15,29],    1338 => [1,4,6,17,29],
            1340 => [1,6,13,15,29],

            // Blankets
            1297 => [1,4,6,29],     1298 => [1,4,6,29],

            // Fidget / Stress
            1199 => [1,6,13,18,29],

            // Eco home classics
            1329 => [1,3,6,29],
        ];

        $catRows = [];
        foreach ($catMap as $serial => $cats) {
            foreach ($cats as $cat) {
                $catRows[] = ['item_serial' => $serial, 'category_id' => $cat];
            }
        }
        DB::table('product_category_assignments')->insertOrIgnore($catRows);

        // ── Cross-assign already-seeded eco products to category 6 and 29 ────
        $crossover = [
            [1117, 29], // WBA-FR25 already has 6
            [1119, 29], // DTM-PG25 already has 6
            [1120, 29], // WBA-PO25 already has 6
            [1132,  6], [1132, 29], // WKA-FP24 missing 6
            [1144, 29], // WBA-SN22 already has 6
        ];
        DB::table('product_category_assignments')->insertOrIgnore(
            array_map(fn ($r) => ['item_serial' => $r[0], 'category_id' => $r[1]], $crossover)
        );

        // ── Brand assignments (All Brands = 1) ────────────────────────────────
        DB::table('product_brand_assignments')->insertOrIgnore(
            array_map(fn ($p) => ['item_serial' => $p[0], 'brand_id' => 1], $products)
        );

        // ── Collection assignments ─────────────────────────────────────────────
        // 1=Luxury  2=Eco  3=Sport  4=Tech  5=Value  6=Corporate Picks
        $colMap = [
            // Premium/luxury eco items
            1154 => [1,2],  1155 => [1,2],  1163 => [1,2],  1165 => [2,6],
            1188 => [1,2],  1195 => [1,2,6],1198 => [1,2],  1200 => [1,2],
            1201 => [1,2,6],1202 => [1,2],  1205 => [1,2,6],1206 => [1,2,6],
            1220 => [2,6],  1226 => [2,6],  1227 => [2,6],  1232 => [1,2,6],
            1233 => [1,2,6],1244 => [2,6],  1248 => [1,2,6],1250 => [1,2,6],
            1252 => [1,2,6],1264 => [1,2,6],1268 => [1,2,6],1282 => [1,2,6],
            1291 => [1,4,2],1303 => [1,4,2],1324 => [1,2],  1325 => [1,2],
            1335 => [1,2],

            // Tech eco
            1168 => [2,4],  1191 => [2,4],  1192 => [2,4],  1193 => [2,4],
            1208 => [2,4],  1209 => [2,4],  1221 => [2,4],  1245 => [2,4,6],
            1249 => [2,4],  1253 => [2,4],  1256 => [2,4],  1277 => [2,4,6],
            1278 => [2,4],  1279 => [2,4],  1280 => [2,4],  1281 => [2,4,6],
            1283 => [2,4,6],1284 => [2,4,6],1285 => [2,4,6],1287 => [2,4],
            1288 => [2,4,6],1289 => [2,4],  1290 => [2,4],  1322 => [2,4,6],
            1334 => [2,4],

            // Sport eco
            1212 => [2,3,6],1213 => [2,3,6],1214 => [2,3],  1215 => [2,3,6],
            1315 => [2,3],  1316 => [2,3],  1338 => [2,3,5],

            // Value eco (mass eco products)
            1156 => [2,5],  1157 => [2,5],  1158 => [2,5],  1159 => [2,5],
            1160 => [2,5],  1161 => [2,5],  1162 => [2,5],  1164 => [2,5],
            1166 => [2,5],  1167 => [2,5],  1169 => [2,5],  1170 => [2,5],
            1171 => [2,5],  1172 => [2,5],  1173 => [2,6],  1174 => [2,5],
            1175 => [2,5],  1176 => [2,5],  1177 => [2,5],  1178 => [2,5],
            1179 => [2,5],  1180 => [2,6],  1181 => [2,5],  1182 => [2,5],
            1183 => [2,5],  1184 => [2,5],  1185 => [2,5],  1186 => [2,5],
            1187 => [2,5],  1189 => [2,5],  1190 => [2,5],  1194 => [2,5],
            1196 => [2,5],  1197 => [2,5],  1199 => [2,5],  1203 => [2,5],
            1204 => [2,5],  1207 => [2,5],  1210 => [2,5],  1211 => [2,5],
            1216 => [2,5],  1217 => [2,5],  1218 => [2,5],  1219 => [2,5,6],
            1222 => [2,5,6],1223 => [2,5],  1224 => [2,5],  1225 => [2,6],
            1228 => [2,5],  1229 => [2,5],  1230 => [2,5],  1231 => [2,5],
            1234 => [2,5],  1235 => [2,5],  1236 => [2,5],  1237 => [2,5],
            1238 => [2,5],  1239 => [2,5,6],1240 => [2,5,6],1241 => [2,5],
            1242 => [2,5],  1243 => [2,6],  1246 => [2,5],  1247 => [2,5],
            1251 => [2,5],  1254 => [2,6],  1255 => [2,5,6],1257 => [2,5],
            1258 => [2,5],  1259 => [2,5,6],1260 => [2,5],  1261 => [2,5],
            1262 => [2,6],  1263 => [2,6],  1265 => [2,5],  1266 => [2,5],
            1267 => [2,5],  1269 => [2,5,6],1270 => [2,5,6],1271 => [2,5],
            1272 => [2,5,6],1273 => [2,5,6],1274 => [2,5],  1275 => [2,5,6],
            1276 => [2,5],  1286 => [2,5,6],1292 => [2,5],  1293 => [2,5,6],
            1294 => [2,5,6],1295 => [2,5],  1296 => [2,5,6],1297 => [2,5,6],
            1298 => [2,5],  1299 => [2,5,6],1300 => [2,5],  1301 => [2,5],
            1302 => [2,5],  1304 => [2,6],  1305 => [2,5,6],1306 => [2,5],
            1307 => [2,5],  1308 => [2,5],  1309 => [2,5],  1310 => [2,5],
            1311 => [2,5,6],1312 => [2,5],  1313 => [2,5],  1314 => [2,5],
            1317 => [2,5],  1318 => [2,5],  1319 => [2,5,6],1320 => [2,5],
            1321 => [2,5,6],1323 => [2,5],  1326 => [2,5],  1327 => [2,5],
            1328 => [2,5],  1329 => [2,5],  1330 => [2,5],  1331 => [2,5],
            1332 => [2,5],  1333 => [2,5],  1336 => [2,5],  1337 => [2,5],
            1339 => [2,5],  1340 => [2,5],  1341 => [2,5],  1342 => [2,5],
            1343 => [2,5],  1344 => [2,5],  1345 => [2,5],  1346 => [2,5],
            1152 => [2,5],  1153 => [2,5],
        ];

        $colRows = [];
        foreach ($colMap as $serial => $cols) {
            foreach ($cols as $col) {
                $colRows[] = ['item_serial' => $serial, 'collection_id' => $col];
            }
        }
        DB::table('product_collection_assignments')->insertOrIgnore($colRows);
    }
}
