<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $reviews = ["Really satisfied", "Amazing product", "It is lower quaility than I expected, but for this price I can't ask for more", "Good, good", "First time I bought something like this and I am really happy I did"];
        $totalProducts = 41;
        foreach (DB::table("users")->where("role_id", 2)->get() as $user) {
            $id = $user->id;
            for ($i = 1; $i <= $totalProducts; $i++) {
                DB::table("reviews")->insert([

                    "product_id" => $i,
                    "user_id" => $id,
                    "mark_id" => rand(1, 5),
                    "review" => $reviews[rand(0, count($reviews) - 1)],
                    "created_at" => now(),
                    "updated_at" => now()
                ]);
            }
        }
    }
}
