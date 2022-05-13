<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryFilters;
use App\Models\Cities;
use App\Models\Filter;
use App\Models\FilterValue;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Json;
use stdClass;

class AdminController extends Controller
{
    public function index()
    {
        
        return view("pages.admin.admin", $this->data);
    }
    public function misc()
    {
        $this->data["cities"] = Cities::all();
        $this->data["payments"] = Payment::all();
        return view("pages.admin.misc", $this->data);
    }
    public function getFilterValues(Request $request)
    {
        /* dd($request->id); */
        return Json::encode(FilterValue::where("filter_id", $request->id)->get());
    }
    public function updateFilterValue(Request $request)
    {
        #dd($request->id, $request->value);
        $filterValueModel = new FilterValue();
        $res = $filterValueModel->updateFilterValues($request);
        return $res ? Json::encode(1) : Json::encode(0);
    }
    public function deleteFilterValue(Request $request)
    {
        $filterValueModel = new FilterValue();
        $res = $filterValueModel->deleteFilterValue($request);
        if ($res) {
            return Json::encode(FilterValue::where("filter_id", $request->filter_id)->get());
        } else {
            return Json::encode(0);
        }
    }
    public function getCategories()
    {
        $categoriesModel = new Category();
        /* $this->data["categories"] = $categoriesModel->getCatergories(); */
        $categories = $categoriesModel->getCatergories();
        foreach ($categories as $category) {
            $filterIds = [];
            $category->filters = CategoryFilters::select("filter_id")->where("category_id", $category->id)->get();
            foreach ($category->filters as $c) {
                array_push($filterIds, $c->filter_id);
            }
            #dd($filterIds);
            $category->unusedFilters = Filter::whereNotIn("id", $filterIds)->get();
            #dd($category->unusedFilters);
        }
        $this->data["categories"] = $categories;
        #dd($categories);
        #dd($categories);
        return view("pages.admin.categories", $this->data);
    }
    public function getCategoryFilters(Request $request)
    {

        $categoriesFilterModel = new CategoryFilters();
        /* $currentFilters = CategoryFilters::where("category_id", $request->categoryId)->filters()->filter->get(); */
        return Json::encode($categoriesFilterModel->getCategoryFilters($request->categoryId));
    }
    public function deleteCategoryFilter(Request $request)
    {
        $categoriesFilterModel = new CategoryFilters();
        $res = $categoriesFilterModel->deleteCategoryFilter($request);
        if ($res) {
            return Json::encode($categoriesFilterModel->getCategoryFilters($request->category_id));
        } else {
            return Json::encode(0);
        }
    }
    public function getFilterForCategory(Request $request)
    {
        #dd($request);
        $filters = CategoryFilters::where("category_id", $request->category_id)->get();
        foreach ($filters as $filter) {
            #dd($filter->filter_id); //fitler_id = 6
            $filter->values = FilterValue::where("filter_id", $filter->filter_id)->get();
        }
        return Json::encode($filters);
    }
}
