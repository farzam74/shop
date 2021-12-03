<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'content',
        'status',
        'product_id',
        'user_id'
    ];



    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function product()
    {
       return $this->belongsTo(Product::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function dislikes()
    {
        return $this->hasMany(Dislike::class);
    }

    public function routeNotificationForMail($notification)
    {
        return User::find(1)->email;
    }


}
