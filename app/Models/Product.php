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
        'other_img'
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
        return $this->hasMany(ProductAttribute::class);
    }

    public function rates()
    {
        return $this->hasMany(ProductRate::class);
    }

    public function amazingOffer()
    {
        return $this->hasOne(AmazingOffer::class);
    }

    public function getFinalPrice(){
        if($this->amazingOffer()->exists()){
            return $this->price-(($this->amazingOffer->discount+$this->discount)/100)*$this->price;
        }
        else{
            return $this->price-($this->discount/100)*$this->price;
        }
    }

    public function getColor(){

        $colors='';

        foreach ($this->attributes()->get() as $productAttribute){
            if ($productAttribute->attribute->key == 'رنگ'){
                $hasColor=true;
                $colors=$colors.",".$productAttribute->attribute->value;
            }
        }

        $colors=substr($colors,1);

        return $colors;
    }


}
