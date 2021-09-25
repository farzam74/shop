<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_price',

    ];

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function customer()
    {
        return $this->hasOne(User::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
