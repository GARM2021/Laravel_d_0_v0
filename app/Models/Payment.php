<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ //!C53
        'amount',
        'payed_at',
        'order_id' //! C56
    ];

     public function  order()
    {
        return $this->belongsTo(Order::class);  //! C56
    }
}
