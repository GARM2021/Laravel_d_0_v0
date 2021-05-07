<?php   

// ! C68 se crea el Service

namespace App\Services;

use App\Models\Cart;

use Illuminate\Support\Facades\Cookie; 

class CartService
{
   
    public function getFromCookieOrCreate() // ! C67
    {
       // $cartId = cookie()->get('cart');// ! C67  asi es un modo
        $cartId = Cookie::get('cart');// ! C67  asi es oro modo 


        $cart = Cart::find($cartId);// ! C67  asi es oro modo 

        return $cart ?? Cart::create();// ! C67  asi es oro modo 



    }
}