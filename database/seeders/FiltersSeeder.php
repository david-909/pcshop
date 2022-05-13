<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FiltersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filters = [
            "Socket", "CPU type", "Core count", "Motherboard format", "Memory type (DDR)", "Capacity", "Frequency", "Interface(PCIe)", "Memory type(GDDR)", "RAM ammount", "Memory bus", "Disc format",  "RPM count", "PSU type", "Power", "Tower type", "Resolution", "Refresh rate", "Connection"
        ];
        foreach ($filters as $filter) {
            DB::table("filters")->insert(["filter" => $filter]);
        }
    }
}
