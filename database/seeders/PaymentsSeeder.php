<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payments = ["Cash", "Credit Card", "Paypal"];
        foreach ($payments as $payment) {
            DB::table("payments")->insert(["payment" => $payment]);
        }
    }
}
