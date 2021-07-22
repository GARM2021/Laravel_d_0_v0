<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\CartService; //!C74

use Illuminate\Http\Request;

class OrderPaymentController extends Controller
{
    public $cartService; //!C74

    
    public function __construct(CartService $cartService) //!C74

    {

            $this->cartService = $cartService;

            $this->middleware('auth');


    }
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
  
    public function create(Order $order)
    {
        return view('payments.create')->with([
            'order' => $order,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Order $order)
    {
        $this->cartService->getFromCookie()->products()->detach();//!C74 vacia carrito no lo borra

        $order->payment()->create([
            'amount' => $order->total,
            'payed_at' => now(), 


        ]);

        $order->status = 'payed';
        $order->save();

        return redirect()
        ->route('main')
        ->withSuccess("Thanks! Your payment for  \${$order->total} was successful. ");

    }

   
}
