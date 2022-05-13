<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function create()
    {
        return view("pages.admin.createcity", $this->data);
    }
    public function insert(Request $request)
    {
        $cityModel = new Cities();
        $res = $cityModel->insertCity($request);
        if ($res) {
            return redirect()->route("misc")->with("msg", "Successfully added");
        } else {
            return redirect()->route("misc")->with("msg", "Unsuccessful");
        }
    }
    public function edit($id)
    {
        $this->data["city"] = Cities::where("id", $id)->first();
        return view("pages.admin.editcity", $this->data);
    }
    public function update(Request $request, $id)
    {
        #dd($id);
        $cityModel = new Cities();
        $res = $cityModel->updateCity($request, $id);
        return $res ? redirect()->route("misc")->with("msg", "Update successful") : redirect()->route("misc")->with("msg", "Update unsuccessful");
    }
    public function destroy($id)
    {
        
        $cityModel = new Cities();
        $res = $cityModel->destroyCity($id);
        return $res ? redirect()->route("misc")->with("msg", "Delete successful") : redirect()->route("misc")->with("msg", "Delete unsuccessful");
    }
}
