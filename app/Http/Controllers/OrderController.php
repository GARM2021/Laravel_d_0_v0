<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Services\CartService; // ! C71 faltaba este

use Illuminate\Http\Request;

class OrderController extends Controller
{
    // ! C71
    public $cartService; 
    
    public function __construct(CartService $cartService)
    {

            $this->cartService = $cartService;

            $this->middleware('auth');


    }
    public function create()
    {
       $cart = $this->cartService->getFromCookie();

       if (!isset($cart) || $cart->products->isEmpty()){
            return redirect()
            ->back()
            ->withErrors("Your cart is empty");
       }
      
       return view('orders.create')->with([ 
           'cart' => $cart,
       ]);
    }

   
    public function store(Request $request)//! C73
    {
        $user    =  $request->user();//! C73

        $order = $user->orders()->create([ //! C73
            'status' => 'pending',
        ]);

        $cart = $this->cartService->getFromCookie();//! C73

        $cartProductsWithQuantity = $cart //! C73
        ->products
        ->mapWithKeys(function ($product) {
            $element[$product->id] = ['quantity' => $product->pivot->quantity];

            return $element;
        });

        //dd($cartProductsWithQuantity);

        $order->products()->attach($cartProductsWithQuantity->toArray());//! C73

        return redirect()->route('orders.payments.create', ['order' => $order]);//! C74
    }

   
}
