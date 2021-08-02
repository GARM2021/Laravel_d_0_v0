<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
       // 'admin_since',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $dates = [ 
        'admin_since',
    ]; //!C53 tipo de Carbon C77 ERROR 403 lo tenia definido como  'user'->admin_since 

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id'); // ! C57 correccion ultima 
    }

    public function payments() // ! C59
    {
        return $this->hasManyThrough(Payment::class, Order::class, 'user_id');
    }

    public  function image() // ! C60
    {
         return $this->morphOne(Image::class, 'imageable' );
    }

    public function isAdmin() //! C76
    {
        //dd($this->admin_since);
        return $this->admin_since != null  && $this->admin_since->lessThanOrEqualTo(now());
      // return $this->admin_since != null;

    }
}
