<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'expire_date',
        'code',
        'product_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}

