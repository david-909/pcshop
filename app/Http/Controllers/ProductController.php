<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Gallery;
use App\Models\Price;
use App\Models\Product;
use App\Models\Review;
use App\Models\Wishlist;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Json;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* public function __construct()
    {
        $wishlistModel = new Wishlist();
        $this->data["wishlist"] = $wishlistModel->productsInWishlist(session("user")->id);
    } */
    public function index(Request $request)
    {

        $productModel = new Product();
        $this->data["products"] = $productModel->getProducts($request)->withQueryString();
        $this->data["productNo"] = $productModel->productsPerCategory();
        $this->data["brandNo"] = $productModel->productsPerBrand();

        #dd($this->data);
        #dd($request);
        return view("pages.products.index", $this->data);
    }
    public function filter(Request $request)
    {
        #dd($request);
        #dd($request->filters['brand'], $request->filters['filtervalue']);
        $productModel = new Product();
        $this->data["products"] = $productModel->getProducts($request->filters);
        #dd($request->filters["brand"]);
        #dd(request()->ajax());
        #return Json::encode($request->filters);
        //$this->data["products"] = $productModel->getProducts($request)->withQueryString();

        #dd($this->data);
        #dd($request);
        /* return view("pages.products.index", $this->data); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware(["isLogged", "isAdmin"]);
        $this->data["brands"] = Brand::all();
        # dd($this->data);
        return view("pages.admin.createproduct", $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware(["isLogged", "isAdmin"]);
        $productModel = new Product();
        #dd($request->filterValues);
        try {
            DB::beginTransaction();
            $product_id = $productModel->insertProduct($request);
            if ($product_id) {
                $productModel->insertProductPrice($request, $product_id);
                $counter = 0;
                foreach ($request->file("images") as $image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move(public_path('img'), $imageName);
                    if ($counter == 0) {
                        $productModel->insertProductImage($product_id, $imageName, 1);
                    } else {
                        $productModel->insertProductImage($product_id, $imageName, 0);
                    }
                    $counter++;
                }
                foreach ($request->filterValues as $value) {
                    $productModel->inserProductFilterValues($product_id, $value);
                }
            }
            DB::commit();
            return redirect()->back()->with("msg", "Successfully added a product");
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with("err", $th->getMessage());
        }

        #dd($product_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productModel = new Product();
        #dd($id);
        $this->data["product"] = $productModel->getSingleProduct($id);
        $this->data["reviews"] = $productModel->getProductReviews($id);
        $this->data["average"] = round($productModel->averageMark($id), 1);
        #dd($this->data);
        return view("pages.products.show", $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->middleware(["isLogged", "isAdmin"]);
        $productModel = new Product();
        $this->data["brands"] = Brand::all();
        $this->data["product"] = $productModel->getSingleProduct($id);
        return view("pages.products.edit", $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->middleware(["isLogged", "isAdmin"]);
        #dd($request, $id);
        $productModel = new Product();
        $priceModel = new Price();
        try {
            DB::beginTransaction();
            $productModel->updateProduct($request, $id);
            $priceModel->updateProductPrice($request, $id);
            DB::commit();
            return redirect()->back()->with("msg", "Successfully updated this product");
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with("err", $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->middleware(["isLogged", "isAdmin"]);
        $productModel = new Product();
        $reviewModel = new Review();
        $galleryModel = new Gallery();
        $priceModel = new Price();
        try {
            DB::beginTransaction();
            $reviewModel->deleteReviewsForProduct($id);
            $productModel->deleteProductFilterValues($id);
            $galleryModel->deleteProductImages($id);
            $priceModel->deleteProductPrices($id);
            $res = $productModel->deleteProduct($id);
            DB::commit();
            return $res ? redirect()->back()->with("msg", "Successfully deleted a product") : redirect()->back()->with("err", "An error occured");
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with("err", "An error occured");
        }
    }
}
