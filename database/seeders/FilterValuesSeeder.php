<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilterValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            [
                "filter_id" => 1,
                "filter_value" => "Intel 1151"
            ],
            [
                "filter_id" => 1,
                "filter_value" => "Intel 1200"
            ],
            [
                "filter_id" => 1,
                "filter_value" => "Intel 1700"
            ],
            [
                "filter_id" => 1,
                "filter_value" => "Intel 2066"
            ],
            [
                "filter_id" => 1,
                "filter_value" => "AMD AM4"
            ],
            [
                "filter_id" => 2,
                "filter_value" => "Intel Core i3"
            ],
            [
                "filter_id" => 2,
                "filter_value" => "Intel Core i5"
            ],
            [
                "filter_id" => 2,
                "filter_value" => "Intel Core i7"
            ],
            [
                "filter_id" => 2,
                "filter_value" => "Intel Core i9"
            ],
            [
                "filter_id" => 2,
                "filter_value" => "AMD Ryzen 3"
            ],
            [
                "filter_id" => 2,
                "filter_value" => "AMD Ryzen 5"
            ],
            [
                "filter_id" => 2,
                "filter_value" => "AMD Ryzen 7"
            ],
            [
                "filter_id" => 3,
                "filter_value" => 4
            ],
            [
                "filter_id" => 3,
                "filter_value" => 6
            ],
            [
                "filter_id" => 3,
                "filter_value" => 8
            ],
            [
                "filter_id" => 3,
                "filter_value" => 10
            ],
            [
                "filter_id" => 3,
                "filter_value" => 12
            ],
            [
                "filter_id" => 3,
                "filter_value" => 16
            ],
            [
                "filter_id" => 4,
                "filter_value" => "Mini ITX"
            ],
            [
                "filter_id" => 4,
                "filter_value" => "Micro ATX"
            ],
            [
                "filter_id" => 4,
                "filter_value" => "ATX"
            ],
            [
                "filter_id" => 5,
                "filter_value" => "DDR3"
            ],
            [
                "filter_id" => 5,
                "filter_value" => "DDR4"
            ],
            [
                "filter_id" => 5,
                "filter_value" => "DDR5"
            ],
            [
                "filter_id" => 6,
                "filter_value" => "4GB"
            ],
            [
                "filter_id" => 6,
                "filter_value" => "8GB"
            ],
            [
                "filter_id" => 6,
                "filter_value" => "16GB"
            ],
            [
                "filter_id" => 6,
                "filter_value" => "32GB"
            ],
            [
                "filter_id" => 6,
                "filter_value" => "500GB"
            ],
            [
                "filter_id" => 6,
                "filter_value" => "1TB"
            ],
            [
                "filter_id" => 6,
                "filter_value" => "2TB"
            ],
            [
                "filter_id" => 7,
                "filter_value" => "2400Mhz"
            ],
            [
                "filter_id" => 7,
                "filter_value" => "2666Mhz"
            ],
            [
                "filter_id" => 7,
                "filter_value" => "3000Mhz"
            ],
            [
                "filter_id" => 7,
                "filter_value" => "3200Mhz"
            ],
            [
                "filter_id" => 7,
                "filter_value" => "3600Mhz"
            ],
            [
                "filter_id" => 7,
                "filter_value" => "3733Mhz"
            ],
            [
                "filter_id" => 7,
                "filter_value" => "4000Mhz"
            ],
            [
                "filter_id" => 7,
                "filter_value" => "4600Mhz"
            ],
            [
                "filter_id" => 7,
                "filter_value" => "4800Mhz"
            ],
            [
                "filter_id" => 7,
                "filter_value" => "5200Mhz"
            ],
            [
                "filter_id" => 8,
                "filter_value" => "PCI Express 2.0"
            ],
            [
                "filter_id" => 8,
                "filter_value" => "PCI Express 3.0"
            ],
            [
                "filter_id" => 8,
                "filter_value" => "PCI Express 4.0"
            ],
            [
                "filter_id" => 8,
                "filter_value" => "SATA"
            ],
            [
                "filter_id" => 8,
                "filter_value" => "NVMe"
            ],
            [
                "filter_id" => 9,
                "filter_value" => "GDDR3"
            ],
            [
                "filter_id" => 9,
                "filter_value" => "GDDR4"
            ],
            [
                "filter_id" => 9,
                "filter_value" => "GDDR5"
            ],
            [
                "filter_id" => 9,
                "filter_value" => "GDDR5X"
            ],
            [
                "filter_id" => 9,
                "filter_value" => "GDDR6"
            ],
            [
                "filter_id" => 9,
                "filter_value" => "GDDR6X"
            ],
            [
                "filter_id" => 10,
                "filter_value" => "1GB"
            ],
            [
                "filter_id" => 10,
                "filter_value" => "2GB"
            ],
            [
                "filter_id" => 10,
                "filter_value" => "4GB"
            ],
            [
                "filter_id" => 10,
                "filter_value" => "6GB"
            ],
            [
                "filter_id" => 10,
                "filter_value" => "8GB"
            ],
            [
                "filter_id" => 10,
                "filter_value" => "10GB"
            ],
            [
                "filter_id" => 10,
                "filter_value" => "12GB"
            ],
            [
                "filter_id" => 10,
                "filter_value" => "16GB"
            ],
            [
                "filter_id" => 11,
                "filter_value" => "64bit"
            ],
            [
                "filter_id" => 11,
                "filter_value" => "128bit"
            ],
            [
                "filter_id" => 11,
                "filter_value" => "192bit"
            ],
            [
                "filter_id" => 11,
                "filter_value" => "256bit"
            ],
            [
                "filter_id" => 11,
                "filter_value" => "320bit"
            ],
            [
                "filter_id" => 11,
                "filter_value" => "384bit"
            ],
            [
                "filter_id" => 12,
                "filter_value" => "2.5"
            ],
            [
                "filter_id" => 12,
                "filter_value" => "3.5"
            ],

            [
                "filter_id" => 13,
                "filter_value" => "5400rpm"
            ],
            [
                "filter_id" => 13,
                "filter_value" => "7200rpm"
            ],
            [
                "filter_id" => 14,
                "filter_value" => "Modular"
            ],
            [
                "filter_id" => 14,
                "filter_value" => "Semi modular"
            ],
            [
                "filter_id" => 14,
                "filter_value" => "Non modular"
            ],
            [
                "filter_id" => 15,
                "filter_value" => "500W"
            ],
            [
                "filter_id" => 15,
                "filter_value" => "600W"
            ],
            [
                "filter_id" => 15,
                "filter_value" => "650W"
            ],
            [
                "filter_id" => 15,
                "filter_value" => "750W"
            ],
            [
                "filter_id" => 15,
                "filter_value" => "1000W"
            ],
            [
                "filter_id" => 16,
                "filter_value" => "Micro Tower"
            ],
            [
                "filter_id" => 16,
                "filter_value" => "Mini ITX"
            ],
            [
                "filter_id" => 16,
                "filter_value" => "Mini Tower"
            ],
            [
                "filter_id" => 16,
                "filter_value" => "Midi Tower"
            ],
            [
                "filter_id" => 16,
                "filter_value" => "Full Tower"
            ],
            [
                "filter_id" => 17,
                "filter_value" => "2560 x 1440px"
            ],
            [
                "filter_id" => 17,
                "filter_value" => "1920 x 1080px"
            ],
            [
                "filter_id" => 18,
                "filter_value" => "60Hz"
            ],
            [
                "filter_id" => 18,
                "filter_value" => "75Hz"
            ],
            [
                "filter_id" => 18,
                "filter_value" => "120Hz"
            ],
            [
                "filter_id" => 18,
                "filter_value" => "144Hz"
            ],
            [
                "filter_id" => 19,
                "filter_value" => "Wired"
            ],
            [
                "filter_id" => 19,
                "filter_value" => "Wireless"
            ],
            [
                "filter_id" => 13,
                "filter_value" => "5900rpm"
            ],
            [
                "filter_id" => 6,
                "filter_value" => "3TB"
            ],
            [
                "filter_id" => 6,
                "filter_value" => "6TB"
            ],
            [
                "filter_id" => 6,
                "filter_value" => "480GB"
            ],
            [
                "filter_id" => 12,
                "filter_value" => "M.2"
            ],
            [
                "filter_id" => 15,
                "filter_value" => "550W"
            ],
            [
                "filter_id" => 18,
                "filter_value" => "165Hz"
            ],
        ];
        foreach ($values as $value) {
            DB::table('filter_values')->insert(["filter_id" => $value["filter_id"], "filter_value" => $value["filter_value"]]);
        }
    }
}
