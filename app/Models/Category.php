<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends \TCG\Voyager\Models\Category
{
    use HasFactory;

    protected $fillable = [
        'name',
        'order',
        'slug'

    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class);
    }
}
