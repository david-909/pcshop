<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Wishlist extends Model
{
    protected $table = "wishlist";
    use HasFactory;
    public function insertWishlist(Request $request)
    {
        return DB::table("wishlist")->insert(["user_id" => $request->userId, "product_id" => $request->productId]);
    }
    public function productsInWishlist($userId)
    {
        return DB::table("wishlist")->where("user_id", $userId)->count("user_id");
    }
}
