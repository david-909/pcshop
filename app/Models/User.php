<?php

namespace App\Models;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $table = "users";
    /**
     * Get all of the reviews for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function insertUser(RegisterUserRequest $request)
    {
        return DB::table("users")->insertGetId(["name" => $request->name, "surname" => $request->surname, "email" => $request->email, "username" => $request->username, "password" => md5($request->password), "phone" => $request->phone, "address" => $request->address, "city_id" => $request->city, "role_id" => 2, "created_at" => now(), "updated_at" => now()]);
    }

    public function getSessionData($id)
    {
        return DB::table("users")->join('cities', 'cities.id', '=', 'users.city_id')
            ->select('users.id', 'users.name', 'users.surname', 'users.email', 'users.username', 'users.phone', 'users.address', 'cities.city', 'users.role_id')
            ->where("users.id", $id)
            ->first();
    }

    public function getUserLogin(LoginUserRequest $request)
    {
        return DB::table("users")->where("email", $request->email)
            ->where("password", md5($request->password))
            ->first();
    }
    public function updateUser(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        #dd($request);
        $user->username = $request->newUsername;
        $user->password = md5($request->newPassword);
        $user->email = $request->newEmail;
        $user->name = $request->newName;
        $user->surname = $request->newSurname;
        $user->address = $request->newAddress;
        $user->phone = $request->newPhone;
        $user->city_id = $request->newCity;

        $user->save();
    }
}
