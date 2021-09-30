<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [

        'count',
        'final_price'

    ];


    public function product()
    {
        return $this->belongsTo(Product::class);

    }

    public function cart()
    {
        return $this->hasOne(Cart::class);

    }
}
