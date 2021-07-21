<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function products() // ! C58
    {
        //return  $this->belongsToMany(Product::class)->withPivot('quantity');// ! C58
        return  $this->morphToMany(Product::class, 'productable')->withPivot('quantity'); // ! C62

    }
        public function getTotalAttribute() // ! C72
    {
        return  $this->products->pluck('total')->sum(); //! C72 accesor attribute
    }


}        


