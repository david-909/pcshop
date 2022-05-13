<?php

namespace App\Http\Controllers;

use App\Models\CategoryFilters;
use Illuminate\Http\Request;

class CategoryfilterController extends Controller
{
    public function addValues(Request $request, $id)
    {
        #dd($request, $id);
        $categoriesFilterModel = new CategoryFilters();
        $res = $categoriesFilterModel->addCategoryFilter($request, $id);
        return $res ? redirect()->back()->with("msg", "Successfully added a filter to this category") : redirect()->back()->with("err", "An error occured");
    }
}
