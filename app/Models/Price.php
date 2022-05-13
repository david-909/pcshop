<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Price extends Model
{
    use HasFactory;
    public function deleteProductPrices($product_id)
    {
        return DB::table("prices")->where("product_id", $product_id)->delete();
    }
    public function updateProductPrice(Request $request, $id)
    {
        DB::table("prices")->where("product_id", $id)->update(["active" => 0]);
        return DB::table("prices")->insert(["price" => $request->price, "active" => 1, "created_at" => now(), "product_id" => $id]);
    }
}
