<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = ["Beograd", "Novi Sad", "Nis", "Pozarevac", "Smederevo", "Gornji Milanovac", "Bor", "Kraljevo", "Kragujevac", "Pirot", "Subotica"];

        for ($i=0;$i<count($cities); $i++){
            DB::table('cities')->insert(["city" =>$cities[$i]]);
        }
    }
}
