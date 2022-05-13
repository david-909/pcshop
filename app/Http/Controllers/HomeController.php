<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cities;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /* public function __construct()
    {
        $wishlistModel = new Wishlist();
        $this->data["wishlist"] = $wishlistModel->productsInWishlist(session("user")->id);
    } */

    public function index()
    {
        #dd($this->data);
        return view('pages.index', $this->data);
    }
    public function about()
    {
        return view('pages.about', $this->data);
    }
    public function author()
    {
        return view("pages.author", $this->data);
    }
}
