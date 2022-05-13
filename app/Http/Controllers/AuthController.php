<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\Cities;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        $citiesModel = new Cities();
        $this->data['cities'] = $citiesModel->getCities();
        return view("pages.auth.register", $this->data);
    }
    public function register(RegisterUserRequest $request)
    {

        $userModel = new User();
        $logModel = new Log();
        $res = $userModel->insertUser($request);
        if ($res) {
            $userData = $userModel->getSessionData($res);
            session()->put("user", $userData);
            $logModel->registerLog($userData->id, $request->ip());
            return redirect()->route("index")->with("success", "Registration successful");
        } else {
            return redirect()->route("index")->with("error", "Registration unsuccessful");
        }
    }

    public function login()
    {
        return view("pages.auth.login", $this->data);
    }
    public function loginpost(LoginUserRequest $request)
    {
        $userModel = new User();
        $logModel = new Log();
        $res = $userModel->getUserLogin($request);
        if ($res) {
            $userData = $userModel->getSessionData($res->id);
            session()->put("user", $userData);
            $logModel->loginLog($userData->id, $request->ip());
            return redirect()->route("index");
        } else {
            return redirect()->route("login")->with("msg", "Email or password incorrect");
        }
    }

    public function logout()
    {
        session()->forget("user");
        return redirect()->route("index");
    }
}
