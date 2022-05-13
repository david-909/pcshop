<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Log extends Model
{
    use HasFactory;
    protected $table = "logs";
    public function loginLog($id, $ip)
    {
        return DB::table("logs")->insert(["activity" => "LOGIN | User ID: $id ($ip)", "created_at" => now()]);
    }
    public function registerLog($id, $ip)
    {
        return DB::table("logs")->insert(["activity" => "REGISTER | User ID: $id ($ip)", "created_at" => now()]);
    }
    public function reviewLog($userId, $productId, $ip)
    {
        return DB::table("logs")->insert(["activity" => "REVIEW | User ID: $userId FROM $ip posted a review on product: $productId", "created_at" => now()]);
    }
    public function orderLog($userId, $orderId)
    {
        return DB::table("logs")->insert(["activity" => "ORDER | User ID: $userId made an order: $orderId", "created_at" => now()]);
    }
}
