<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Cities;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit()
    {
        $citiesModel = new Cities();
        $this->data["cities"] = $citiesModel->getCities();
        return view('pages.dashboard', $this->data);
    }
    //! UPDATE USER
    public function update(UpdateUserRequest $request, $id)
    {
        $userModel = new User();
        $success = $userModel->updateUser($request, $id);
        session()->put("user", $userModel->getSessionData($id));
        return redirect()->route("dashboard")->with("message", "Updated successfully");
    }
}
