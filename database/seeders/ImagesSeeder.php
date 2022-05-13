<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            [
                "path" => "INTEL-Core-i7-11700-2.5GHz-(4.90-GHz)-.png",
                "product_id" => 1,
                "active" => 1
            ],
            [
                "path" => "INTEL-I5-10600.png",
                "product_id" => 2,
                "active" => 1
            ],
            [
                "path" => "RYZEN-7-3800x.png",
                "product_id" => 3,
                "active" => 1
            ],
            [
                "path" => "AMD-Ryzen-5-5600X-3.7GHz-(4.6GHz)-71.png",
                "product_id" => 4,
                "active" => 1
            ],
            [
                "path" => "asustufb550mplus.png",
                "product_id" => 5,
                "active" => 1
            ],
            [
                "path" => "msib450gamingplus.png",
                "product_id" => 6,
                "active" => 1
            ],
            [
                "path" => "msib460m.png",
                "product_id" => 7,
                "active" => 1
            ],
            [
                "path" => "gigabytez690.png",
                "product_id" => 8,
                "active" => 1
            ],
            [
                "path" => "kingston8gbddr4.png",
                "product_id" => 9,
                "active" => 1
            ],
            [
                "path" => "corsairvengancelpx16gb.png",
                "product_id" => 10,
                "active" => 1
            ],
            [
                "path" => "adataddr5.png",
                "product_id" => 11,
                "active" => 1
            ],
            [
                "path" => "transcendddr4.png",
                "product_id" => 12,
                "active" => 1
            ],
            [
                "path" => "rtx3080.png",
                "product_id" => 13,
                "active" => 1
            ],
            [
                "path" => "garx6900.png",
                "product_id" => 14,
                "active" => 1
            ],
            [
                "path" => "gtx1660ti.png",
                "product_id" => 15,
                "active" => 1
            ],
            [
                "path" => "rtx2060.png",
                "product_id" => 16,
                "active" => 1
            ],
            [
                "path" => "wd3tb.png",
                "product_id" => 17,
                "active" => 1
            ],
            [
                "path" => "seagate1tb.png",
                "product_id" => 18,
                "active" => 1
            ],
            [
                "path" => "toshiba.png",
                "product_id" => 19,
                "active" => 1
            ],
            [
                "path" => "crucialbx500.png",
                "product_id" => 20,
                "active" => 1
            ],
            [
                "path" => "corsairmp510.png",
                "product_id" => 21,
                "active" => 1
            ],
            [
                "path" => "wdssdgreen.png",
                "product_id" => 22,
                "active" => 1
            ],
            [
                "path" => "970ssd.png",
                "product_id" => 23,
                "active" => 1
            ],

            [
                "path" => "coolermaster750.png",
                "product_id" => 24,
                "active" => 1
            ],
            [
                "path" => "GIGABYTE-Napajanje-550W-GP-P550B-.png",
                "product_id" => 25,
                "active" => 1
            ],
            [
                "path" => "mwe650w.png",
                "product_id" => 26,
                "active" => 1
            ],
            [
                "path" => "asus750w.png",
                "product_id" => 27,
                "active" => 1
            ],
            [
                "path" => "coolermastermastercase.png",
                "product_id" => 28,
                "active" => 1
            ],
            [
                "path" => "asustower.png",
                "product_id" => 29,
                "active" => 1
            ],
            [
                "path" => "asushelios.png",
                "product_id" => 30,
                "active" => 1
            ],
            [
                "path" => "acernitro.png",
                "product_id" => 31,
                "active" => 1
            ],
            [
                "path" => "optix1.png",
                "product_id" => 32,
                "active" => 1
            ],
            [
                "path" => "optix2.jpg",
                "product_id" => 32,
                "active" => null
            ],
            [
                "path" => "optix3.jpg",
                "product_id" => 32,
                "active" => null
            ],
            [
                "path" => "usharp1.png",
                "product_id" => 33,
                "active" => 1
            ],
            [
                "path" => "usharp2.jpg",
                "product_id" => 33,
                "active" => null
            ],
            [
                "path" => "usharp3.jpg",
                "product_id" => 33,
                "active" => null
            ],
            [
                "path" => "coolermastermk110.png",
                "product_id" => 34,
                "active" => 1
            ],
            [
                "path" => "coolermasterck530.png",
                "product_id" => 35,
                "active" => 1
            ],
            [
                "path" => "logitechk740.png",
                "product_id" => 36,
                "active" => 1
            ],
            [
                "path" => "logitechg915.png",
                "product_id" => 37,
                "active" => 1
            ],
            [
                "path" => "coolermastermm110.png",
                "product_id" => 38,
                "active" => 1
            ],
            [
                "path" => "logitechmxmaster3.png",
                "product_id" => 39,
                "active" => 1
            ],
            [
                "path" => "logitechg502hero.png",
                "product_id" => 40,
                "active" => 1
            ],
            [
                "path" => "logitechg305.png",
                "product_id" => 41,
                "active" => 1
            ]

        ];
        foreach ($images as $image) {
            DB::table("gallery")->insert([
                "path" => $image["path"],
                "product_id" => $image["product_id"],
                "active" => $image["active"]
            ]);
        }
    }
}
