<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Filter extends Model
{
    use HasFactory;
    protected $table = "filters";
    /**
     * Get all of the filters for the Filter
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function filters()
    {
        return $this->hasMany(CategoryFilter::class);
    }
    public function insertFilter(Request $request)
    {
        return DB::table("filters")->insert(["filter" => $request->filter]);
    }
    public function updateFilter(Request $request, $id)
    {
        return DB::table("filters")->where("id", $id)->update(["filter" => $request->filter]);
    }
    public function destroyFilter($id)
    {
        return DB::table("filters")->where("id", $id)->delete();
    }
}
