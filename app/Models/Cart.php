<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

class Cart extends Model
{
    protected $table = "cart_products";
    use HasFactory;

    public function insertIntoCart($product_id, $user_id)
    {
        $q = DB::table("cart_products")->where("product_id", $product_id)->where("user_id", $user_id)->get();
        if (count($q) == 0) {
            return DB::table("cart_products")->insert(["quantity" => 1, "created_at" => now(), "product_id" => $product_id, "user_id" => $user_id]);
        } else {
            $quantity = DB::table("cart_products")
                ->select("quantity")
                ->where("product_id", $product_id)->where("user_id", $user_id)
                ->first();
            /* foreach ($quantity as $quan) {
                $quantity->quantity = $quan;
            } */
            $quantity = $quantity->quantity;
            return DB::table("cart_products")->where("product_id", $product_id)->where("user_id", $user_id)->update(["quantity" => $quantity + 1]);
        }
    }
    public function getCart($user_id)
    {
        return DB::table("cart_products")->where("user_id", $user_id)->get();
    }
    public function updateCart(Request $request)
    {
        return DB::table("cart_products")->where("id", $request->cart_id)->update(["quantity" => $request->quantity]);
    }
    public function deleteCart(Request $request)
    {
        return DB::table("cart_products")->where("id", $request->cart_id)->delete();
    }
    public function getProductsInCart($user_id)
    {
        return DB::table("cart_products")
            ->where("user_id", $user_id)
            ->get();
    }
    public function makeOrder($user_id, $total)
    {
        return DB::table("orders")->insertGetId(["user_id" => $user_id, "payment_id" => 1, "total" => $total, "created_at" => now()]);
    }
    public function insertOrderProducts($quantity, $order_id, $product_id, $price, $product)
    {
        return DB::table("order_products")->insert(["quantity" => $quantity, "order_id" => $order_id, "product_id" => $product_id, "created_at" => now(), "price" => $price, "product" => $product]);
    }
    public function clearCart($user_id)
    {
        return DB::table("cart_products")->where("user_id", $user_id)->delete();
    }
}
