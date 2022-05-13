<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterValue extends Model
{
    protected $table = "filter_values";
    use HasFactory;
    public function addValues(Request $request, $id)
    {
        $values = explode("|", $request->filtervalues);
        $pom = count($values);
        $res = [];
        #dd($values);
        foreach ($values as $value) {
            $a = DB::table("filter_values")->insert(["filter_id" => $id, "filter_value" => $value]);
            if ($a) {
                array_push($res, $a);
            }
        }
        #dd($pom, $res);
        if ($pom == count($res)) {
            return 1;
        } else {
            return 0;
        }
    }
    public function updateFilterValues(Request $request)
    {
        return DB::table("filter_values")->where("id", $request->id)->update(["filter_value" => $request->value]);
    }
    public function deleteFilterValue(Request $request)
    {
        return DB::table("filter_values")->where("id", $request->id)->delete();
    }
}
