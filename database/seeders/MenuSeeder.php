<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = ["Home", "Products", "Categories", "About us", "Contact", "Author"];
        $route = ["/", "/products", "/categories", "/about", "/contact", "/author"];

        for ($i = 0; $i < count($menu); $i++) {

            DB::table('menu')->insert(["title" => $menu[$i], "route" => $route[$i]]);
        }
    }
}
