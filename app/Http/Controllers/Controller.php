<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected  $data;
    public function __construct()
    {

        $categoriesModel = new Category();
        $wishlistModel = new Wishlist();
        $cartModel = new Cart();
        #dd($userId);
        $this->data["brands"] = Brand::all();
        $this->data["categories"] = $categoriesModel->getCatergories();
        #$this->data["cartItems"] = $cartModel->getCartItems($this->data["userId"]);
        #$this->data["wishlist"] = $wishlistModel->productsInWishlist();
    }
}
