<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Price;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Json;
use PDOException;

class WishlistController extends Controller
{
    public function index()
    {
        #dd(session("user")->id);

        $products = Wishlist::where("user_id", session("user")->id)->get();
        foreach ($products as $product) {
            $product->image = Gallery::where("product_id", $product->product_id)->first()->path;
            $product->name = Product::where("id", $product->product_id)->first()->product;
            $product->quantity = Product::where("id", $product->product_id)->first()->quantity;
            $product->price = Price::where("product_id", $product->product_id)->where("active", 1)->first()->price;
        }
        $this->data["products"] = $products;
        return view("pages.wishlist", $this->data);
    }
    public function store(Request $request)
    {
        $wishlistModel = new Wishlist();
        #dd($request->productId, $request->userId);
        try {
            DB::beginTransaction();
            $wishlistModel->insertWishlist($request);
            DB::commit();
            return Json::encode(1);
        } catch (PDOException $e) {
            DB::rollBack();
            return Json::encode(0);
        }
    }
}
