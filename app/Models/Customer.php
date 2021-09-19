<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [

        'fullname',
        'email',
        'password',
        'phone',
        'postal_code',
        'address'
    ];


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class);
    }

    public function card()
    {
        return $this->hasOne(Card::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
