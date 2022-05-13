<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    use HasFactory;
    protected $table = "reviews";
    /**
     * Get the user that owns the Review
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    /**
     * Get the user associated with the Review
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function storeReview($request)
    {
        return DB::table("reviews")->insertGetId(["review" => $request->review, "product_id" => $request->productId, "mark_id" => $request->rating, "user_id" => session("user")->id, "created_at" => now(), "updated_at" => now()]);
    }
    public function deleteReviewsForProduct($id)
    {
        return DB::table("reviews")->where("product_id", $id)->delete();
    }
}
