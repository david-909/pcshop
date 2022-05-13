<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryImageRequest;
use App\Models\Category;
use App\Models\CategoryFilter;
use App\Models\CategoryFilters;
use App\Models\Filter;
use App\Models\FilterValue;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CategoriesController extends Controller
{
    public function index()
    {
        #dd($this->data);
        return view('pages.categories', $this->data);
    }
    public function productsInCategory($category_id)
    {
        $productModel = new Product();

        $this->data["productsInCategory"] = $productModel->productsInCategory($category_id);
        $this->data["brandNo"] = $productModel->productsPerBrand();
        $cats = CategoryFilters::where("category_id", $category_id)->get();
        foreach ($cats as $c) {
            #dd($c->filter_id);
            $c->filter = Filter::where("id", $c->filter_id)->first()->filter;
            $c->values = FilterValue::where("filter_id", $c->filter_id)->get();
        }
        $this->data["filters"] = $cats;
        return view("pages.products.categorized", $this->data);
    }
    public function create()
    {
        return view("pages.admin.createcategory", $this->data);
    }
    public function store(Request $request)
    {

        if ($request->file("image") and $request->category) {
            $category = $request->category;
            $imageName = time() . '.' . $request->file("image")->extension();
            $path = $request->file("image")->move(public_path('img'), $imageName);
            $categoriesModel = new Category();
            $res = $categoriesModel->insertCategory($category, $imageName);
            if ($res) {
                return redirect()->back()->with("msg", "You successfully added a category");
            } else {
                return redirect()->back()->with("err", "An error occured");
            }
        } else {
            return redirect()->back()->with("err", "You need to provide a category and an image");
        }
    }
    public function edit($id)
    {
        $this->data["category"] = Category::where("id", $id)->first();
        #dd($this->data);
        return view("pages.admin.editcategory", $this->data);
    }
    public function update(Request $request, $id)
    {
        $categoriesModel = new Category();
        $res = $categoriesModel->updateCategory($request, $id);
        return $res ? redirect()->back()->with("msg", "Successfully updated") : redirect()->back()->with("err", "An error occured");
    }
    public function destroy($id)
    {
        $categoriesModel = new Category();
        $res = $categoriesModel->deleteCategory($id);
        return $res ? redirect()->back()->with("msg", "Successfully deleted") : redirect()->back()->with("err", "An error occured");
    }
}
