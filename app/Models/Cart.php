<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function getPriceAttribute()
    {
        $totalPrice=0;

        foreach ($this->cartItems()->get() as $item)
        {
            $totalPrice +=$item->getPriceAttribute();
        }

        return $totalPrice;
    }
}
