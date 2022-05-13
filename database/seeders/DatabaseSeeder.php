<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoriesSeeder::class,
            CitiesSeeder::class,
            RolesSeeder::class,
            UsersSeeder::class,
            MenuSeeder::class,
            BrandsSeeder::class,
            PaymentsSeeder::class,
            ProductsSeeder::class,
            ImagesSeeder::class,
            PricesSeeder::class,
            FiltersSeeder::class,
            FilterValuesSeeder::class,
            FilterCategoriesSeeder::class,
            MarksSeeder::class,
            ReviewsSeeder::class,
            ProductFilterValuesSeeder::class
        ]);
    }
}
