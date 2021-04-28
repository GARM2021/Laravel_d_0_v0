<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [


        'title',
        'description',
        'price',
        'stock',
        'status',


    ];

    public function carts() // ! C58
    {
        return  $this->belongsToMany(Cart::class)->withPivot('quantity');

    }  
    
    public function orders() // ! C58
    {
        return  $this->belongsToMany(Order::class)->withPivot('quantity');

    }  
    
    public function images()  // ! C61
    {
        return $this->morphMany(Image::class, 'imageable');   
    }
}
