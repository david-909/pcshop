<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = ["Intel", "AMD", "ASRock", "Silion power", "Gigabyte", "Powercolor", "Sapphire", "XFX", "Seagate", "Toshiba", "A-Data", "Crucial", "Kingston", "Samsung", "Western digital", "Verbatim", "Corsair", "Raidmax", "Antec", "Asus", "Cooler Master", "MSI", "Seasonic", "NZXT", "Transcend", "LG", "Acer", "Dell", "Logitech"];
        for ($i = 0; $i < count($brands); $i++) {
            DB::table('brands')->insert(["brand" => $brands[$i]]);
        }
    }
}
