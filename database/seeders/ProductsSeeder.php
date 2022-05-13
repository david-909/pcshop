<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                "product" => "i7-11700",
                "quantity" => rand(5, 200),
                "brand_id" => 1,
                "category_id" => 3,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "i5-10600",
                "quantity" => rand(5, 200),
                "brand_id" => 1,
                "category_id" => 3,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "Ryzen 7 3800x",
                "quantity" => rand(5, 200),
                "brand_id" => 2,
                "category_id" => 3,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "Ryzen 5 5600x",
                "quantity" => rand(5, 200),
                "brand_id" => 2,
                "category_id" => 3,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "TUF GAMING B550M-PLUS",
                "quantity" => rand(5, 200),
                "brand_id" => 20,
                "category_id" => 5,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "B450 GAMING PLUS MAX",
                "quantity" => rand(5, 200),
                "brand_id" => 22,
                "category_id" => 5,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "B460M PRO-VDH WIFI",
                "quantity" => rand(5, 200),
                "brand_id" => 22,
                "category_id" => 5,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "Z690 GAMING X DDR4",
                "quantity" => rand(5, 200),
                "brand_id" => 5,
                "category_id" => 5,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "JM3200HLE-16G",
                "quantity" => rand(5, 200),
                "brand_id" => 25,
                "category_id" => 6,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "AD5U480016G-S",
                "quantity" => rand(5, 200),
                "brand_id" => 11,
                "category_id" => 6,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "CMK16GX4M2B3200C16R",
                "quantity" => rand(5, 200),
                "brand_id" => 17,
                "category_id" => 6,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "KF437C19BB/8",
                "quantity" => rand(5, 200),
                "brand_id" => 13,
                "category_id" => 6,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "nVidia GeForce RTX 3080 VENTUS 3X PLUS",
                "quantity" => rand(5, 200),
                "brand_id" => 22,
                "category_id" => 4,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "AORUS Radeon RX 6900 XT XTREME WATERFORCE WB",
                "quantity" => rand(5, 200),
                "brand_id" => 5,
                "category_id" => 4,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "TUF Gaming GeForce GTX 1660 Ti EVO OC",
                "quantity" => rand(5, 200),
                "brand_id" => 20,
                "category_id" => 4,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "Dual GeForce RTX 2060 OC",
                "quantity" => rand(5, 200),
                "brand_id" => 20,
                "category_id" => 4,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "Purple - WD30PURZ",
                "quantity" => rand(5, 200),
                "brand_id" => 15,
                "category_id" => 2,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "Iron Wolf NAS - ST1000VN002",
                "quantity" => rand(5, 200),
                "brand_id" => 9,
                "category_id" => 2,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "HDWN160UZSVA",
                "quantity" => rand(5, 200),
                "brand_id" => 10,
                "category_id" => 2,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "BX500 serija",
                "quantity" => rand(5, 200),
                "brand_id" => 12,
                "category_id" => 1,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "MP510 Force Series",
                "quantity" => rand(5, 200),
                "brand_id" => 15,
                "category_id" => 1,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "Green Series",
                "quantity" => rand(5, 200),
                "brand_id" => 17,
                "category_id" => 1,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "970 EVO PLUS",
                "quantity" => rand(5, 200),
                "brand_id" => 14,
                "category_id" => 1,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "MWE 750 BRONZE V2",
                "quantity" => rand(5, 200),
                "brand_id" => 21,
                "category_id" => 7,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "GP-P550B",
                "quantity" => rand(5, 200),
                "brand_id" => 19,
                "category_id" => 7,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "MWE 650 BRONZE V2",
                "quantity" => rand(5, 200),
                "brand_id" => 21,
                "category_id" => 7,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "ROG Strix 750W Gold",
                "quantity" => rand(5, 200),
                "brand_id" => 20,
                "category_id" => 7,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "MASTERCASE H500M",
                "quantity" => rand(5, 200),
                "brand_id" => 21,
                "category_id" => 8,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "ROG Z11",
                "quantity" => rand(5, 200),
                "brand_id" => 20,
                "category_id" => 8,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "ROG STRIX HELIOS RGB GX601",
                "quantity" => rand(5, 200),
                "brand_id" => 20,
                "category_id" => 8,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "Nitro KG2",
                "quantity" => rand(5, 200),
                "brand_id" => 27,
                "category_id" => 9,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "VA Optix G27CQ4",
                "quantity" => rand(5, 200),
                "brand_id" => 22,
                "category_id" => 9,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "UltraSharp U2722D",
                "quantity" => rand(5, 200),
                "brand_id" => 28,
                "category_id" => 9,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "MK110 US",
                "quantity" => rand(5, 200),
                "brand_id" => 21,
                "category_id" => 10,
                "description" => "Description Description Description Description Description Description Description Description"

            ],
            [
                "product" => "CK530 V2 Brown CK",
                "quantity" => rand(5, 200),
                "brand_id" => 21,
                "category_id" => 10,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "ILLUMINATED K740 US",
                "quantity" => rand(5, 200),
                "brand_id" => 29,
                "category_id" => 10,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "G915 TKL Lightspeed Wireless US",
                "quantity" => rand(5, 200),
                "brand_id" => 29,
                "category_id" => 10,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "DEVASTATOR MM110",
                "quantity" => rand(5, 200),
                "brand_id" => 21,
                "category_id" => 11,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "MX MASTER 3",
                "quantity" => rand(5, 200),
                "brand_id" => 29,
                "category_id" => 11,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "G502 HERO SILVER EDITION",
                "quantity" => rand(5, 200),
                "brand_id" => 29,
                "category_id" => 11,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
            [
                "product" => "LIGHTSPEED G305",
                "quantity" => rand(5, 200),
                "brand_id" => 29,
                "category_id" => 11,
                "description" => "Description Description Description Description Description Description Description Description"
            ],
        ];
        foreach ($products as $product) {
            DB::table("products")->insert([
                "product" => $product["product"],
                "quantity" => $product["quantity"],
                "brand_id" => $product["brand_id"],
                "category_id" => $product["category_id"],
                "description" => $product["description"],
                "created_at" => now()
            ]);
        }
    }
}
