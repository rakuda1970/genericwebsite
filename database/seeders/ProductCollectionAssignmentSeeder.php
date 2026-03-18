<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCollectionAssignmentSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Collection IDs:
        // 1=Luxury   2=Eco   3=Sport   4=Tech   5=Value   6=Corporate Picks

        // [item_serial, [collection_ids...]]
        $assignments = [

            // ── Adidas ──────────────────────────────────────────────────────────
            [1001, [3, 6]],          // T-Shirt    → Sport, Corporate
            [1002, [3, 6]],          // Cap        → Sport, Corporate
            [1003, [3]],             // Duffel     → Sport
            [1004, [3, 5]],          // Bottle     → Sport, Value

            // ── BIC ──────────────────────────────────────────────────────────────
            [1005, [5, 6]],          // Pen        → Value, Corporate
            [1006, [5, 6]],          // Marker     → Value, Corporate
            [1007, [4, 6]],          // Stylus Pen → Tech, Corporate
            [1008, [5, 6]],          // Highlighter→ Value, Corporate

            // ── Cutter & Buck ───────────────────────────────────────────────────
            [1009, [1, 6]],          // Polo       → Luxury, Corporate
            [1010, [1, 6]],          // Vest       → Luxury, Corporate
            [1011, [1, 6]],          // Jacket     → Luxury, Corporate
            [1012, [1, 6]],          // Tote       → Luxury, Corporate

            // ── Hanes ────────────────────────────────────────────────────────────
            [1013, [5, 6]],          // T-Shirt    → Value, Corporate
            [1014, [5]],             // Long Sleeve→ Value
            [1015, [5]],             // Hoodie     → Value
            [1016, [5, 6]],          // Polo       → Value, Corporate

            // ── Koozie ───────────────────────────────────────────────────────────
            [1017, [5]],             // Can Cooler → Value
            [1018, [5]],             // Bottle Sleeve→ Value
            [1019, [5, 6]],          // Vacuum Cup → Value, Corporate
            [1020, [5]],             // Lunch Bag  → Value

            // ── Leatherman ───────────────────────────────────────────────────────
            [1021, [1, 6]],          // Squirt     → Luxury, Corporate
            [1022, [1, 6]],          // Wingman    → Luxury, Corporate
            [1023, [1, 6]],          // Skeletool  → Luxury, Corporate
            [1024, [5]],             // Sheath     → Value

            // ── Moleskine ────────────────────────────────────────────────────────
            [1025, [1, 6]],          // Notebook Lg→ Luxury, Corporate
            [1026, [1, 6]],          // Notebook Pk→ Luxury, Corporate
            [1027, [5, 6]],          // Pen        → Value, Corporate
            [1028, [1, 6]],          // Planner    → Luxury, Corporate

            // ── Nike ─────────────────────────────────────────────────────────────
            [1029, [3, 6]],          // T-Shirt    → Sport, Corporate
            [1030, [3, 6]],          // Cap        → Sport, Corporate
            [1031, [3, 6]],          // Backpack   → Sport, Corporate
            [1032, [3, 6]],          // Bottle     → Sport, Corporate

            // ── OGIO ──────────────────────────────────────────────────────────────
            [1033, [6]],             // Metro Backpack→ Corporate
            [1034, [3, 6]],          // Duffle     → Sport, Corporate
            [1035, [4, 6]],          // Laptop Sleeve→ Tech, Corporate
            [1036, [6]],             // Polo       → Corporate

            // ── Port Authority ───────────────────────────────────────────────────
            [1037, [6]],             // Soft Shell Jacket→ Corporate
            [1038, [6]],             // Polo       → Corporate
            [1039, [6]],             // Cap        → Corporate
            [1040, [6]],             // Vest       → Corporate

            // ── Stormtech ────────────────────────────────────────────────────────
            [1041, [2, 3, 6]],       // Softshell  → Eco, Sport, Corporate
            [1042, [2, 3, 6]],       // Vest       → Eco, Sport, Corporate
            [1043, [3]],             // Hoodie     → Sport
            [1044, [2, 3]],          // Poncho     → Eco, Sport

            // ── Thermos ──────────────────────────────────────────────────────────
            [1045, [1, 6]],          // Bottle 24oz→ Luxury, Corporate
            [1046, [6]],             // Food Jar   → Corporate
            [1047, [1, 6]],          // Travel Mug → Luxury, Corporate
            [1048, [1]],             // Bottle 40oz→ Luxury

            // ── Titleist ──────────────────────────────────────────────────────────
            [1049, [1, 3, 6]],       // Golf Balls → Luxury, Sport, Corporate
            [1050, [3, 6]],          // Cap        → Sport, Corporate
            [1051, [1, 3, 6]],       // Stand Bag  → Luxury, Sport, Corporate
            [1052, [3, 6]],          // Golf Towel → Sport, Corporate

            // ── Under Armour ──────────────────────────────────────────────────────
            [1053, [3, 6]],          // T-Shirt    → Sport, Corporate
            [1054, [3, 6]],          // Polo       → Sport, Corporate
            [1055, [3, 6]],          // Cap        → Sport, Corporate
            [1056, [3]],             // Hoodie     → Sport

            // ── YETI ──────────────────────────────────────────────────────────────
            [1057, [1, 6]],          // Rambler 20oz→ Luxury, Corporate
            [1058, [1, 6]],          // Rambler 30oz→ Luxury, Corporate
            [1059, [1, 3]],          // Hopper     → Luxury, Sport
            [1060, [1, 6]],          // Mug 14oz   → Luxury, Corporate

            // ── Zebra ─────────────────────────────────────────────────────────────
            [1061, [5, 6]],          // F-301      → Value, Corporate
            [1062, [5, 6]],          // Sarasa     → Value, Corporate
            [1063, [5]],             // Mildliner  → Value
            [1064, [1, 6]],          // Gift Set   → Luxury, Corporate
        ];

        $rows = [];
        foreach ($assignments as [$serial, $collectionIds]) {
            foreach ($collectionIds as $colId) {
                $rows[] = ['item_serial' => $serial, 'collection_id' => $colId];
            }
        }

        DB::table('product_collection_assignments')->insert($rows);
    }
}
