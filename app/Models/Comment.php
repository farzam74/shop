<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
    ];

    public function customer()
    {
       return $this->belongsTo(Customer::class);
    }

    public function product()
    {
       return $this->belongsTo(Product::class);
    }
}
