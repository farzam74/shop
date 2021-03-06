<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'count',
        'product_id',
        'cart_id',
        'color'
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);

    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);

    }

    public function getPriceAttribute()
    {
        return $this->product->getFinalPriceAttribute()*$this->count;
    }
}
