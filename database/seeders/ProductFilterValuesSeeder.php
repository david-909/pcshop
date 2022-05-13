<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductFilterValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inserts = [
            [
                "product_id" => 1,
                "filter_value_id" => 2
            ],
            [
                "product_id" => 1,
                "filter_value_id" => 8
            ],
            [
                "product_id" => 1,
                "filter_value_id" => 15
            ],
            [
                "product_id" => 2,
                "filter_value_id" => 2
            ],
            [
                "product_id" => 2,
                "filter_value_id" => 7
            ],
            [
                "product_id" => 2,
                "filter_value_id" => 14
            ],
            [
                "product_id" => 3,
                "filter_value_id" => 5
            ],
            [
                "product_id" => 3,
                "filter_value_id" => 12
            ],
            [
                "product_id" => 3,
                "filter_value_id" => 15
            ],
            [
                "product_id" => 4,
                "filter_value_id" => 5
            ],
            [
                "product_id" => 4,
                "filter_value_id" => 11
            ],
            [
                "product_id" => 4,
                "filter_value_id" => 14
            ],
            [
                "product_id" => 5,
                "filter_value_id" => 5
            ],
            [
                "product_id" => 5,
                "filter_value_id" => 20
            ],
            [
                "product_id" => 6,
                "filter_value_id" => 5
            ],
            [
                "product_id" => 6,
                "filter_value_id" => 21
            ],
            [
                "product_id" => 7,
                "filter_value_id" => 2
            ],
            [
                "product_id" => 7,
                "filter_value_id" => 20
            ],
            [
                "product_id" => 8,
                "filter_value_id" => 3
            ],
            [
                "product_id" => 8,
                "filter_value_id" => 21
            ],
            [
                "product_id" => 9,
                "filter_value_id" => 23
            ],
            [
                "product_id" => 9,
                "filter_value_id" => 27
            ],
            [
                "product_id" => 9,
                "filter_value_id" => 35
            ],
            [
                "product_id" => 10,
                "filter_value_id" => 24
            ],
            [
                "product_id" => 10,
                "filter_value_id" => 27
            ],
            [
                "product_id" => 10,
                "filter_value_id" => 40
            ],
            [
                "product_id" => 11,
                "filter_value_id" => 23
            ],
            [
                "product_id" => 11,
                "filter_value_id" => 27
            ],
            [
                "product_id" => 11,
                "filter_value_id" => 35
            ],
            [
                "product_id" => 12,
                "filter_value_id" => 23
            ],
            [
                "product_id" => 12,
                "filter_value_id" => 26
            ],
            [
                "product_id" => 12,
                "filter_value_id" => 37
            ],
            [
                "product_id" => 13,
                "filter_value_id" => 44
            ],
            [
                "product_id" => 13,
                "filter_value_id" => 52
            ],
            [
                "product_id" => 13,
                "filter_value_id" => 58
            ],
            [
                "product_id" => 13,
                "filter_value_id" => 65
            ],
            [
                "product_id" => 14,
                "filter_value_id" => 44
            ],
            [
                "product_id" => 14,
                "filter_value_id" => 51
            ],
            [
                "product_id" => 14,
                "filter_value_id" => 60
            ],
            [
                "product_id" => 14,
                "filter_value_id" => 64
            ],
            [
                "product_id" => 15,
                "filter_value_id" => 43
            ],
            [
                "product_id" => 15,
                "filter_value_id" => 51
            ],
            [
                "product_id" => 15,
                "filter_value_id" => 56
            ],
            [
                "product_id" => 15,
                "filter_value_id" => 63
            ],
            [
                "product_id" => 16,
                "filter_value_id" => 43
            ],
            [
                "product_id" => 16,
                "filter_value_id" => 51
            ],
            [
                "product_id" => 16,
                "filter_value_id" => 56
            ],
            [
                "product_id" => 16,
                "filter_value_id" => 63
            ],
            [
                "product_id" => 17,
                "filter_value_id" => 68
            ],
            [
                "product_id" => 17,
                "filter_value_id" => 93
            ],
            [
                "product_id" => 17,
                "filter_value_id" => 69
            ],
            [
                "product_id" => 18,
                "filter_value_id" => 68
            ],
            [
                "product_id" => 18,
                "filter_value_id" => 30
            ],
            [
                "product_id" => 18,
                "filter_value_id" => 92
            ],
            [
                "product_id" => 19,
                "filter_value_id" => 68
            ],
            [
                "product_id" => 19,
                "filter_value_id" => 70
            ],
            [
                "product_id" => 19,
                "filter_value_id" => 94
            ],
            [
                "product_id" => 20,
                "filter_value_id" => 67
            ],
            [
                "product_id" => 20,
                "filter_value_id" => 45
            ],
            [
                "product_id" => 20,
                "filter_value_id" => 95
            ],
            [
                "product_id" => 21,
                "filter_value_id" => 96
            ],
            [
                "product_id" => 21,
                "filter_value_id" => 43
            ],
            [
                "product_id" => 21,
                "filter_value_id" => 95
            ],
            [
                "product_id" => 22,
                "filter_value_id" => 67
            ],
            [
                "product_id" => 22,
                "filter_value_id" => 45
            ],
            [
                "product_id" => 22,
                "filter_value_id" => 95
            ],
            [
                "product_id" => 23,
                "filter_value_id" => 96
            ],
            [
                "product_id" => 23,
                "filter_value_id" => 43
            ],
            [
                "product_id" => 23,
                "filter_value_id" => 29
            ],
            [
                "product_id" => 24,
                "filter_value_id" => 73
            ],
            [
                "product_id" => 24,
                "filter_value_id" => 77
            ],
            [
                "product_id" => 25,
                "filter_value_id" => 73
            ],
            [
                "product_id" => 25,
                "filter_value_id" => 97
            ],
            [
                "product_id" => 26,
                "filter_value_id" => 73
            ],
            [
                "product_id" => 26,
                "filter_value_id" => 76
            ],
            [
                "product_id" => 27,
                "filter_value_id" => 71
            ],
            [
                "product_id" => 27,
                "filter_value_id" => 77
            ],
            [
                "product_id" => 28,
                "filter_value_id" => 82
            ],
            [
                "product_id" => 29,
                "filter_value_id" => 81
            ],
            [
                "product_id" => 30,
                "filter_value_id" => 82
            ],
            [
                "product_id" => 31,
                "filter_value_id" => 84
            ],
            [
                "product_id" => 31,
                "filter_value_id" => 87
            ],
            [
                "product_id" => 32,
                "filter_value_id" => 84
            ],
            [
                "product_id" => 32,
                "filter_value_id" => 98
            ],
            [
                "product_id" => 33,
                "filter_value_id" => 84
            ],
            [
                "product_id" => 33,
                "filter_value_id" => 86
            ],
            [
                "product_id" => 34,
                "filter_value_id" => 90
            ],
            [
                "product_id" => 35,
                "filter_value_id" => 90
            ],
            [
                "product_id" => 36,
                "filter_value_id" => 90
            ],
            [
                "product_id" => 37,
                "filter_value_id" => 91
            ],
            [
                "product_id" => 38,
                "filter_value_id" => 90
            ],
            [
                "product_id" => 39,
                "filter_value_id" => 91
            ],
            [
                "product_id" => 40,
                "filter_value_id" => 90
            ],
            [
                "product_id" => 41,
                "filter_value_id" => 91
            ],



        ];
        foreach ($inserts as $i) {
            DB::table("product_filter_values")->insert(["product_id" => $i["product_id"], "filter_value_id" => $i["filter_value_id"]]);
        }
    }
}
