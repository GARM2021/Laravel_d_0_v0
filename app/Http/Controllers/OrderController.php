<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    public function create()
    {
       $cart = $this->cartService->getFromCookie();

       if (!isset($cart) || $cart->products->isEmpty()) {
            return redirect()
            ->back()
            ->withErrors("Your cart is empty")
       }
       return view(orders.create)->with([ 
           'cart' => $cart,
       ])
    }

   
    public function store(Request $request)
    {
        //
    }

   
}
