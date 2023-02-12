<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'DiscountPrice',
        'user_id'
    ];



    public function buyers()
    {
        return $this->belongsToMany(User::class, 'product_buyer', 'product_id', 'user_id');
    }
}
