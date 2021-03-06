<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ //!C53
        'status',
        'user_id', // ! C57
       
    ];

    public function payment()
    {
            return $this->hasOne(Payment::class); // ! C56

    }

    public function user() // ! C57
    {
        return $this->belongsTo(User::class, 'user_id');

    }

    public function products() // ! C58
    {
        //return  $this->belongsToMany(Product::class)->withPivot('quantity'); // ! C58
         return  $this->morphToMany(Product::class, 'productable')->withPivot('quantity'); // ! C62

    }  
    
    public function getTotalAttribute() // ! C72
    {
        return  $this->products->pluck('total')->sum(); //! C72 
    }
}
