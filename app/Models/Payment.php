<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Payment extends Model
{
    use HasFactory;
    public function insertPayment(Request $request)
    {
        return DB::table("payments")->insert(["payment" => $request->payment]);
    }
    public function updatePayment(Request $request, $id)
    {
        return DB::table("payments")->where("id", $id)->update(["payment" => $request->payment]);
    }
    public function destroyPayment($id)
    {
        return DB::table("payments")->where("id", $id)->delete();
    }
}
