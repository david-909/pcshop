<?php

namespace App\Http\Controllers;

use App\Models\Filter;
use App\Models\FilterValue;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data["filters"] = Filter::all();
        return view("pages.admin.filters", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.createfilter", $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filterModel = new Filter();
        $res = $filterModel->insertFilter($request);
        if ($res) {
            return redirect()->route("filters")->with("msg", "Successfully added");
        } else {
            return redirect()->route("filters")->with("msg", "Unsuccessful");
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data["filter"] = Filter::where("id", $id)->first();
        return view("pages.admin.editfilter", $this->data);
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
        $filterModel = new Filter();
        $res = $filterModel->updateFilter($request, $id);
        return $res ? redirect()->route("filters")->with("msg", "Update successful") : redirect()->route("filters")->with("msg", "Update unsuccessful");
    }
    public function addValues(Request $request, $id)
    {
        #dd($request, $id);
        $filterValueModel = new FilterValue();
        $res = $filterValueModel->addValues($request, $id);
        return $res ? redirect()->route("filters")->with("msg", "Successfully added") : redirect()->route("filters")->with("msg", "Error occured");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filterModel = new Filter();
        $res = $filterModel->destroyFilter($id);
        return $res ? redirect()->route("filters")->with("msg", "Delete successful") : redirect()->route("filters")->with("msg", "Delete unsuccessful");
    }
}
