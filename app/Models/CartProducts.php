<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProducts extends Model
{
    protected $table = "cart_products";
    use HasFactory;
    /**
     * Get the user that owns the CartProducts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the product that owns the CartProducts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /* public function product()
    {
        return $this->belongsTo(Product::class);
    } */
}
