<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = "categories";
    /**
     * Get the user that owns the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    /**
     * Get all of the comments for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function filters()
    {
        return $this->hasMany(CategoryFilter::class);
    }
    public function getCatergories()
    {
        return DB::table('categories')->get();
    }
    public function insertCategory($category, $imageName)
    {
        return DB::table("categories")->insert(["category" => $category, "image" => 'img/' . $imageName]);
    }
    public function deleteCategory($id)
    {
        return DB::table("categories")->where("id", $id)->delete();
    }
    public function updateCategory(Request $request, $id)
    {
        return DB::table("categories")->where("id", $id)->update(["category" => $request->category]);
    }
    
}
