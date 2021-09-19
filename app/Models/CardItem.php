<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'count',
        'final_price',
    ];

    public function product()
    {
        return $this->hasOne(Product::class);

    }

    public function card()
    {
        return $this->hasOne(Card::class);

    }
}
