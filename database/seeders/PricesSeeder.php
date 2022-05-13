<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rowCount = DB::table("products")->get()->count();
        for ($i=1; $i<=$rowCount; $i++){
            DB::table("prices")->insert([
                "price"=>rand(20,2000),
                "active"=>1,
                "product_id"=>$i,
                "created_at"=>now()
            ]);
        }
    }
}
