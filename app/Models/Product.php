<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function review()
    {
        return $this->hasMany(Review::class);
    }
    public function orders()
    {
        return $this->hasMany(OrderProducts::class);
    }
    public function price()
    {
        return $this->hasMany(Price::class);
    }
    public function category()
    {
        return $this->hasMany(Product::class);
    }
    public function getProducts(Request $request)
    {
        #dd($request->search);
        $query =  DB::table("products")->join("gallery", "products.id", "=", "gallery.product_id")
            ->join("categories", "categories.id", "=", "products.category_id")
            ->join("brands", "brands.id", "=", "products.brand_id")
            ->join("prices", "prices.product_id", "=", "products.id")
            /* ->join("product_filter_values", "products.id", "=", "product_filter_values.product_id")
            ->join("filter_values", "filter_values.filter_id", "=", "product_filter_values.filter_value_id") */;

        /* if ($request->categories) {

            foreach ($request->input("categories") as $category) {
                #dd(+$category);
                $query = $query->orWhere("products.category_id", "=", $category);
            }
        } */
        #dd($request);
        if ($request->search) {
            $query->where("categories.category", "LIKE", "%$request->search%")
                ->orWhere("products.product", "LIKE", "%$request->search%")
                ->orWhere("products.description", "LIKE", "%$request->search%")
                ->orWhere("brands.brand", "LIKE", "%$request->search%")
                /* ->orWhere("filter_values.filter", "LIKE", "%$request->search%")
                ->orWhere("categories.category", "LIKE", "%$request->search%") */;
        }

        $query->where("gallery.active", "=", 1)->where("prices.active", "=", 1);
        #dd($request);
        #dd($request->categories);

        return $query->paginate(3);
    }
    public function productsPerCategory()
    {
        return DB::select("SELECT category_id, COUNT(*) as count FROM products GROUP BY category_id;");
    }
    public function productsPerBrand()
    {
        return DB::select("SELECT brand_id, COUNT(*) as count FROM products GROUP BY brand_id;");
    }
    public function getSingleProduct($id)
    {
        /* $product = DB::table("products")
            ->join("categories", "categories.id", "=", "products.category_id")
            ->join("brands", "brands.id", "=", "products.brand_id")
            ->join("prices", "prices.product_id", "=", "products.id")
            ->where("products.id", "=", $id)
            ->get(); */
        #dd($id);
        $product = Product::find($id);
        $product->images = $product->gallery()->get();
        $product->brand = $product->brand()->get();
        $product->reviews = $product->review()->get();
        $product->price = $product->price()->where("active", 1)->first();
        $catId = $product->category_id;
        $product->category = Category::where("id", $catId)->first();
        $product->marks = Review::where("product_id", $id)->avg("mark_id");
        #dd($product->marks);
        return $product;
    }
    public function productsInCategory($category_id)
    {
        $query = DB::table("products")->join("gallery", "products.id", "=", "gallery.product_id")
            ->join("categories", "categories.id", "=", "products.category_id")
            ->join("brands", "products.brand_id", "=", "brands.id")
            ->join("prices", "products.id", "=", "prices.product_id")
            ->where("category_id", "=", "$category_id");
        $query->where("gallery.active", "=", 1);
        $query->where("prices.active", "=", 1);
        return $query->paginate(12);
    }
    public function getProductReviews($id)
    {
        $reviews = Review::where("product_id", $id)->get();
        foreach ($reviews as $review) {
            $review->date = DateTime::createFromFormat('Y-m-d H:i:s', $review->created_at);
            $review->name = $review->user->name;
            $review->surname = $review->user->surname;
        }
        return $reviews;
    }
    public function averageMark($id)
    {
        return DB::table("reviews")->where("product_id", $id)->avg("mark_id");
    }
    public function getProductPrice($product_id)
    {
        return DB::table("prices")->select("price")->where("product_id", $product_id)->where("active", 1)->first();
    }
    public function getProductName($product_id)
    {
        return DB::table("products")->select("product")->where("id", $product_id)->first();
    }
    public function getCurrentQuantity($product_id)
    {
        return DB::table("products")->select("quantity")->where("id", $product_id)->first();
    }
    public function updateQuantity($product_id, $quantity)
    {
        return DB::table("products")->where("id", $product_id)->update(["quantity" => $quantity]);
    }
    public function insertProduct(Request $request)
    {
        return DB::table("products")->insertGetId(["product" => $request->product, "brand_id" => $request->brand, "category_id" => $request->category, "description" => $request->description, "quantity" => $request->quantity, "created_at" => now()]);
    }
    public function insertProductPrice(Request $request, $product_id)
    {
        return DB::table("prices")->insert(["price" => $request->price, "active" => 1, "created_at" => now(), "product_id" => $product_id]);
    }
    public function insertProductImage($product_id, $path, $active)
    {
        return DB::table("gallery")->insert(["path" => $path, "active" => $active, "product_id" => $product_id]);
    }
    public function inserProductFilterValues($product_id, $filter_value_id)
    {
        return DB::table("product_filter_values")->insert(["product_id" => $product_id, "filter_value_id" => $filter_value_id]);
    }
    public function deleteProduct($id)
    {
        return DB::table("products")->where("id", $id)->delete();
    }
    public function deleteProductFilterValues($product_id)
    {
        return DB::table("product_filter_values")->where("product_id", $product_id)->delete();
    }
    public function updateProduct(Request $request, $id)
    {
        return DB::table("products")->where("id", $id)->update(["brand_id" => $request->brand, "product" => $request->product, "quantity" => $request->quantity, "description" => $request->description]);
    }
}
