<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'fa_title',
        'en_title',
        'description',
        'price',
        'discount',
        'rate',
        'view_counter',
        'status',
        'category_id',
        'other_atts',
        'primary_img',
        'other_img',
        'slug'
    ];


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

    public function rates()
    {
        return $this->hasMany(ProductRate::class);
    }

    public function amazingOffer()
    {
        return $this->hasOne(AmazingOffer::class);
    }

}
