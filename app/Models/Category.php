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

        // the foeign key and local key of category and subcategory should be defined to avoid automatically fill category_id
        return $this->belongsTo(Category::class,'parent_id','id');
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class,'parent_id','id');
    }
}
