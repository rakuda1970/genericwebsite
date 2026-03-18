<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductBrandAssignmentSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Brand IDs:
        // 1=All Brands  2=Adidas        3=BIC           4=Cutter & Buck
        // 5=Hanes       6=Koozie        7=Leatherman    8=Moleskine
        // 9=Nike        10=OGIO         11=Port Authority 12=Stormtech
        // 13=Thermos    14=Titleist     15=Under Armour 16=YETI  17=Zebra

        // [item_serial, brand_id]  — each product gets All Brands (1) + its own brand
        $assignments = [
            // Adidas (2)
            [1001, 2], [1002, 2], [1003, 2], [1004, 2],
            // BIC (3)
            [1005, 3], [1006, 3], [1007, 3], [1008, 3],
            // Cutter & Buck (4)
            [1009, 4], [1010, 4], [1011, 4], [1012, 4],
            // Hanes (5)
            [1013, 5], [1014, 5], [1015, 5], [1016, 5],
            // Koozie (6)
            [1017, 6], [1018, 6], [1019, 6], [1020, 6],
            // Leatherman (7)
            [1021, 7], [1022, 7], [1023, 7], [1024, 7],
            // Moleskine (8)
            [1025, 8], [1026, 8], [1027, 8], [1028, 8],
            // Nike (9)
            [1029, 9], [1030, 9], [1031, 9], [1032, 9],
            // OGIO (10)
            [1033, 10], [1034, 10], [1035, 10], [1036, 10],
            // Port Authority (11)
            [1037, 11], [1038, 11], [1039, 11], [1040, 11],
            // Stormtech (12)
            [1041, 12], [1042, 12], [1043, 12], [1044, 12],
            // Thermos (13)
            [1045, 13], [1046, 13], [1047, 13], [1048, 13],
            // Titleist (14)
            [1049, 14], [1050, 14], [1051, 14], [1052, 14],
            // Under Armour (15)
            [1053, 15], [1054, 15], [1055, 15], [1056, 15],
            // YETI (16)
            [1057, 16], [1058, 16], [1059, 16], [1060, 16],
            // Zebra (17)
            [1061, 17], [1062, 17], [1063, 17], [1064, 17],
        ];

        // Build rows: each product gets its own brand + All Brands
        $rows = [];
        foreach ($assignments as [$serial, $brandId]) {
            $rows[] = ['item_serial' => $serial, 'brand_id' => 1];        // All Brands
            $rows[] = ['item_serial' => $serial, 'brand_id' => $brandId]; // specific brand
        }

        DB::table('product_brand_assignments')->insert($rows);
    }
}
