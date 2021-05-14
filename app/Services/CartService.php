<?php   

// ! C68 se crea el Service

namespace App\Services;

use App\Models\Cart;

use Illuminate\Support\Facades\Cookie; 

class CartService
{
    protected $cookieName = 'cart'; // ! C69

   
   public function getFromCookie()
   {
    $cartId = Cookie::get($this->cookieName);// ! C70

    $cart = Cart::find($cartId);// ! C70

    return $cart ?? Cart::create();// ! C70
   }

    public function getFromCookieOrCreate() // ! C67
    {
         // $cartId = cookie()->get('cart');// ! C67  asi es un modo
        // $cartId = Cookie::get($this->cookieName);// ! C67  asi es oro modo C69 Se modifico 'cart' por $this->cookieName C70 SE ANULO


        // $cart = Cart::find($cartId);// ! C67  asi es oro modo C70 se anulo
        $cart = $this->getFromCookie(); // ! C70

        return $cart ?? Cart::create();// ! C67  asi es oro modo 

    }

    public function makeCookie(Cart $cart)
    {
        return Cookie::make($this->cookieName, $cart->id, 7 * 24 * 60); // ! C69 Se modifico 'cart' por $this->cookieName
    }

    public function countProducts() // ! C70
    {   
        $cart = $this->getFromCookie();

        if ($cart != null) {
           return $cart->products->pluck('pivot.quantity')->sum();
        }

        return 0;

    }

}