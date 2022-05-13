<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cities extends Model
{
    use HasFactory;

    public function getCities()
    {
        return DB::table('cities')->get();
    }
    public function insertCity(Request $request)
    {
        return DB::table("cities")->insert(["city" => $request->city]);
    }
    public function updateCity(Request $request, $id)
    {
        return DB::table("cities")->where("id", $id)->update(["city" => $request->city]);
    }
    public function destroyCity($id)
    {
        return DB::table("cities")->where("id", $id)->delete();
    }
}
