<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["SSD", "HDD", "CPU", "GPU", "Motherboards", "RAM", "Power supply", "Towers", "Monitors", "Keyboards", "Mice"];
        $images = [
            "img/ssd.png", "img/hdd.png","img/cpu.png","img/gpu.png","img/mb.png","img/ram.png","img/psu.png","img/tower.png","img/monitor.png","img/keyboard.png","img/mouse.png"
        ];
        for ($i=0;$i<count($categories); $i++){
            DB::table('categories')->insert(["category" =>$categories[$i], "image"=>$images[$i]]);
        }


    }
}
