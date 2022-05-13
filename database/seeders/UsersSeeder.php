<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Mime\toString;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \stdClass();
        $user->username = "mmarko";
        $user->password = md5("pass123");
        $user->email = "admin@pcshop.com";
        $user->name = "Marko";
        $user->surname = "Markovic";
        $user->address = "Ulica 1";
        $user->phone = "+381691234566";
        $user->id_role = 1;
        $user->id_city = 1;
        #$user->created_at = time();
        $timestamp = new \DateTime(); //OVO JE JAKO BITNO JER TIMESTAMP ZAPRAVO OCEKUJE DATETIME


        DB::table("users")->insert(["username" => $user->username, "password" => $user->password, "email" => $user->email, "name" => $user->name, "surname" => $user->surname, "role_id" => $user->id_role, "city_id" => $user->id_city, "address" => $user->address, "phone" => $user->phone, "created_at" => $timestamp, "updated_at" => $timestamp]);

        $user = new \stdClass();
        $user->username = "user";
        $user->password = md5("pass123");
        $user->email = "user@gmail.com";
        $user->name = "Nikola";
        $user->surname = "Nikolic";
        $user->address = "Ulica 21";
        $user->phone = "+381635622254";
        $user->id_role = 2;
        $user->id_city = 1;
        #$user->created_at = time();
        $timestamp = new \DateTime();


        DB::table("users")->insert(["username" => $user->username, "password" => $user->password, "email" => $user->email, "name" => $user->name, "surname" => $user->surname, "role_id" => $user->id_role, "city_id" => $user->id_city, "address" => $user->address, "phone" => $user->phone, "created_at" => $timestamp, "updated_at" => $timestamp]);

        $user = new \stdClass();
        $user->username = "anchyy";
        $user->password = md5("pass123");
        $user->email = "user1@gmail.com";
        $user->name = "Ana";
        $user->surname = "Antic";
        $user->address = "Ulica 21";
        $user->phone = "+381635652254";
        $user->id_role = 2;
        $user->id_city = 6;
        #$user->created_at = time();
        $timestamp = new \DateTime();


        DB::table("users")->insert(["username" => $user->username, "password" => $user->password, "email" => $user->email, "name" => $user->name, "surname" => $user->surname, "role_id" => $user->id_role, "city_id" => $user->id_city, "address" => $user->address, "phone" => $user->phone, "created_at" => $timestamp, "updated_at" => $timestamp]);

        $user = new \stdClass();
        $user->username = "blabla";
        $user->password = md5("pass123");
        $user->email = "blabic@gmail.com";
        $user->name = "Matija";
        $user->surname = "Petrovic";
        $user->address = "Brdo 22";
        $user->phone = "+381635652289";
        $user->id_role = 2;
        $user->id_city = 5;
        #$user->created_at = time();
        $timestamp = new \DateTime();


        DB::table("users")->insert(["username" => $user->username, "password" => $user->password, "email" => $user->email, "name" => $user->name, "surname" => $user->surname, "role_id" => $user->id_role, "city_id" => $user->id_city, "address" => $user->address, "phone" => $user->phone, "created_at" => $timestamp, "updated_at" => $timestamp]);

        $user = new \stdClass();
        $user->username = "eoeo";
        $user->password = md5("pass123");
        $user->email = "eoeo@gmail.com";
        $user->name = "Filip";
        $user->surname = "Lalic";
        $user->address = "Radnicka 22";
        $user->phone = "+381621452289";
        $user->id_role = 2;
        $user->id_city = 1;
        #$user->created_at = time();
        $timestamp = new \DateTime();


        DB::table("users")->insert(["username" => $user->username, "password" => $user->password, "email" => $user->email, "name" => $user->name, "surname" => $user->surname, "role_id" => $user->id_role, "city_id" => $user->id_city, "address" => $user->address, "phone" => $user->phone, "created_at" => $timestamp, "updated_at" => $timestamp]);

        $user = new \stdClass();
        $user->username = "dzon";
        $user->password = md5("pass123");
        $user->email = "nidza@gmail.com";
        $user->name = "Nikola";
        $user->surname = "Maric";
        $user->address = "Bulevar Kralja Aleksandra 22";
        $user->phone = "+38162563299";
        $user->id_role = 2;
        $user->id_city = 1;
        #$user->created_at = time();
        $timestamp = new \DateTime();


        DB::table("users")->insert(["username" => $user->username, "password" => $user->password, "email" => $user->email, "name" => $user->name, "surname" => $user->surname, "role_id" => $user->id_role, "city_id" => $user->id_city, "address" => $user->address, "phone" => $user->phone, "created_at" => $timestamp, "updated_at" => $timestamp]);
    }
}
