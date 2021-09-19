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
    ];

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }
}

