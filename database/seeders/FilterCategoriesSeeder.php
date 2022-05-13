<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilterCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = [
            [
                "filter_id" => 12,
                "category_id" => 1
            ],
            [
                "filter_id" => 8,
                "category_id" => 1
            ],
            [
                "filter_id" => 6,
                "category_id" => 1
            ],
            [
                "filter_id" => 12,
                "category_id" => 2
            ],
            [
                "filter_id" => 6,
                "category_id" => 2
            ],
            [
                "filter_id" => 13,
                "category_id" => 2
            ],
            [
                "filter_id" => 1,
                "category_id" => 3
            ],
            [
                "filter_id" => 2,
                "category_id" => 3
            ],
            [
                "filter_id" => 3,
                "category_id" => 3
            ],
            [
                "filter_id" => 8,
                "category_id" => 4
            ],
            [
                "filter_id" => 9,
                "category_id" => 4
            ],
            [
                "filter_id" => 10,
                "category_id" => 4
            ],
            [
                "filter_id" => 11,
                "category_id" => 4
            ],

            [
                "filter_id" => 1,
                "category_id" => 5
            ],
            [
                "filter_id" => 4,
                "category_id" => 5
            ],
            [
                "filter_id" => 5,
                "category_id" => 6
            ],
            [
                "filter_id" => 6,
                "category_id" => 6
            ],
            [
                "filter_id" => 7,
                "category_id" => 6
            ],
            [
                "filter_id" => 14,
                "category_id" => 7
            ],
            [
                "filter_id" => 15,
                "category_id" => 7
            ],
            [
                "filter_id" => 16,
                "category_id" => 8
            ],
            [
                "filter_id" => 17,
                "category_id" => 9
            ],
            [
                "filter_id" => 18,
                "category_id" => 9
            ],
            [
                "filter_id" => 19,
                "category_id" => 10
            ],
            [
                "filter_id" => 19,
                "category_id" => 11
            ],
        ];
        foreach ($insert as $i) {
            DB::table("category_filters")->insert(["filter_id" => $i["filter_id"], "category_id" => $i["category_id"]]);
        }
    }
}
