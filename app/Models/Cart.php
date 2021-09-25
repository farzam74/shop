<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_price',

    ];

    public function cardItems()
    {
        return $this->hasMany(CardItem::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
