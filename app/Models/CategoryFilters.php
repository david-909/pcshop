<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryFilters extends Model
{
    protected $table = "category_filters";
    use HasFactory;
    /**
     * Get all of the filters for the CategoryFilters
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function filters()
    {
        return $this->hasMany(Filter::class);
    }
    public function getCategoryFilters($categoryId)
    {
        #dd($categoryId);
        return DB::table("category_filters")->join("filters", "category_filters.filter_id", "=", "filters.id")
            ->where("category_filters.category_id", "=", $categoryId)
            /* ->select(["filters.filter"]) */
            ->get();
    }
    public function deleteCategoryFilter($request)
    {
        return DB::table("category_filters")->where("category_id", $request->category_id)
            ->where("filter_id", $request->filter_id)
            ->delete();
    }
    public function addCategoryFilter(Request $request, $id)
    {
        #dd($request, $id);
        return DB::table("category_filters")->insert(["filter_id" => $request->filter_id, "category_id" => $id]);
    }
}
