<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategoryAssignmentSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Category IDs (from ProductCategorySeeder)
        // 1=All Products  2=Auto          3=Bags          4=Blankets & Towels
        // 5=Drinkware     6=Eco Friendly  7=Emergency     8=Health & Wellness
        // 9=Home          10=Hot/Cold     11=Journals     12=Lights & Tools
        // 13=Novelties    14=Office       15=Outdoors     16=Packaging
        // 17=Sports       18=Stress       19=Technology   20=Travel
        // 21=Best Sellers 22=Community    23=Fidgets      24=New Products
        // 25=Purposeful   26=Quiet Luxury 27=Retail       28=Revitalized
        // 29=Sustainable  30=Tech Future  31=Value Finds

        // Format: [item_serial, [category_ids...]]
        $assignments = [

            // ── Adidas ──────────────────────────────────────────────────────────
            [1001, [1, 17]],                       // T-Shirt → All, Sports
            [1002, [1, 17]],                       // Cap → All, Sports
            [1003, [1,  3, 17, 20]],               // Duffel → All, Bags, Sports, Travel
            [1004, [1,  5, 17,  8]],               // Bottle → All, Drinkware, Sports, Health

            // ── BIC ──────────────────────────────────────────────────────────────
            [1005, [1, 14]],                       // Pen → All, Office
            [1006, [1, 14]],                       // Marker → All, Office
            [1007, [1, 14, 19]],                   // Stylus Pen → All, Office, Technology
            [1008, [1, 14]],                       // Highlighter → All, Office

            // ── Cutter & Buck ───────────────────────────────────────────────────
            [1009, [1, 17]],                       // Polo → All, Sports
            [1010, [1, 17, 15]],                   // Vest → All, Sports, Outdoors
            [1011, [1, 17, 15, 20]],               // Jacket → All, Sports, Outdoors, Travel
            [1012, [1,  3]],                       // Tote → All, Bags

            // ── Hanes ────────────────────────────────────────────────────────────
            [1013, [1, 17,  8]],                   // T-Shirt → All, Sports, Health
            [1014, [1, 17]],                       // Long Sleeve → All, Sports
            [1015, [1, 17]],                       // Hoodie → All, Sports
            [1016, [1, 17]],                       // Polo → All, Sports

            // ── Koozie ───────────────────────────────────────────────────────────
            [1017, [1,  5, 31]],                   // Can Cooler → All, Drinkware, Value Finds
            [1018, [1,  5, 31]],                   // Bottle Sleeve → All, Drinkware, Value Finds
            [1019, [1,  5, 21]],                   // Vacuum Cup → All, Drinkware, Best Sellers
            [1020, [1,  3,  5]],                   // Lunch Bag → All, Bags, Drinkware

            // ── Leatherman ───────────────────────────────────────────────────────
            [1021, [1, 12, 15, 21]],               // Squirt → All, Lights/Tools, Outdoors, Best Sellers
            [1022, [1, 12, 15, 21]],               // Wingman → All, Lights/Tools, Outdoors, Best Sellers
            [1023, [1, 12, 15]],                   // Skeletool → All, Lights/Tools, Outdoors
            [1024, [1, 12]],                       // Sheath → All, Lights/Tools

            // ── Moleskine ────────────────────────────────────────────────────────
            [1025, [1, 11, 14, 26]],               // Notebook Lg → All, Journals, Office, Quiet Luxury
            [1026, [1, 11, 14]],                   // Notebook Pk → All, Journals, Office
            [1027, [1, 14]],                       // Pen → All, Office
            [1028, [1, 11, 14, 26]],               // Planner → All, Journals, Office, Quiet Luxury

            // ── Nike ─────────────────────────────────────────────────────────────
            [1029, [1, 17, 21]],                   // T-Shirt → All, Sports, Best Sellers
            [1030, [1, 17]],                       // Cap → All, Sports
            [1031, [1,  3, 17]],                   // Backpack → All, Bags, Sports
            [1032, [1,  5, 17]],                   // Bottle → All, Drinkware, Sports

            // ── OGIO ──────────────────────────────────────────────────────────────
            [1033, [1,  3, 20]],                   // Metro Backpack → All, Bags, Travel
            [1034, [1,  3, 17, 20]],               // Duffle → All, Bags, Sports, Travel
            [1035, [1,  3, 19]],                   // Laptop Sleeve → All, Bags, Technology
            [1036, [1, 17]],                       // Polo → All, Sports

            // ── Port Authority ───────────────────────────────────────────────────
            [1037, [1, 17, 15]],                   // Soft Shell Jacket → All, Sports, Outdoors
            [1038, [1, 17]],                       // Polo → All, Sports
            [1039, [1, 17]],                       // Cap → All, Sports
            [1040, [1, 17]],                       // Vest → All, Sports

            // ── Stormtech ────────────────────────────────────────────────────────
            [1041, [1, 17, 15, 6]],                // Softshell Jacket → All, Sports, Outdoors, Eco
            [1042, [1, 17, 15]],                   // Vest → All, Sports, Outdoors
            [1043, [1, 17]],                       // Hoodie → All, Sports
            [1044, [1, 17, 15, 20]],               // Poncho → All, Sports, Outdoors, Travel

            // ── Thermos ──────────────────────────────────────────────────────────
            [1045, [1,  5, 20, 21]],               // Bottle 24oz → All, Drinkware, Travel, Best Sellers
            [1046, [1,  5,  9]],                   // Food Jar → All, Drinkware, Home
            [1047, [1,  5, 20, 21]],               // Travel Mug → All, Drinkware, Travel, Best Sellers
            [1048, [1,  5, 20]],                   // Bottle 40oz → All, Drinkware, Travel

            // ── Titleist ──────────────────────────────────────────────────────────
            [1049, [1, 17, 15]],                   // Golf Balls → All, Sports, Outdoors
            [1050, [1, 17]],                       // Cap → All, Sports
            [1051, [1,  3, 17]],                   // Stand Bag → All, Bags, Sports
            [1052, [1,  4, 17]],                   // Golf Towel → All, Blankets/Towels, Sports

            // ── Under Armour ──────────────────────────────────────────────────────
            [1053, [1, 17, 21]],                   // T-Shirt → All, Sports, Best Sellers
            [1054, [1, 17]],                       // Polo → All, Sports
            [1055, [1, 17]],                       // Cap → All, Sports
            [1056, [1, 17,  8]],                   // Hoodie → All, Sports, Health

            // ── YETI ──────────────────────────────────────────────────────────────
            [1057, [1,  5, 21, 26]],               // Rambler 20oz → All, Drinkware, Best Sellers, Quiet Luxury
            [1058, [1,  5, 21, 26]],               // Rambler 30oz → All, Drinkware, Best Sellers, Quiet Luxury
            [1059, [1,  5, 15, 21]],               // Hopper Cooler → All, Drinkware, Outdoors, Best Sellers
            [1060, [1,  5, 26]],                   // Mug 14oz → All, Drinkware, Quiet Luxury

            // ── Zebra ─────────────────────────────────────────────────────────────
            [1061, [1, 14, 31]],                   // F-301 Pen → All, Office, Value Finds
            [1062, [1, 14, 31]],                   // Sarasa Gel Pen → All, Office, Value Finds
            [1063, [1, 14, 31]],                   // Mildliner Set → All, Office, Value Finds
            [1064, [1, 14, 13]],                   // Gift Set → All, Office, Novelties
        ];

        $rows = [];
        foreach ($assignments as [$serial, $catIds]) {
            foreach ($catIds as $catId) {
                $rows[] = ['item_serial' => $serial, 'category_id' => $catId];
            }
        }

        DB::table('product_category_assignments')->insert($rows);
    }
}
