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
       // return  $this->belongsToMany(Cart::class)->withPivot('quantity');// ! C58
       return  $this->morphedByMany(Cart::class, 'productable')->withPivot('quantity');// ! C62

    }  
    
    public function orders() // ! C58
    {
       // return  $this->belongsToMany(Order::class)->withPivot('quantity');// ! C58
       return  $this->morphedByMany(Order::class, 'productable')->withPivot('quantity');// ! C62

    }  
    
    public function images()  // ! C61
    {
        return $this->morphMany(Image::class, 'imageable');   
    }

    public function scopeAvailable($query){ //!C65

        $query-> where('status', 'avialable')->get();

    }

    public function getTotalAttribute() // ! C72
    {
        return  $this->pivot->quantity * $this->price; //! C72 aqui estaba equivocado desic quantitiy :()
    }
}
