<?php
// ! C66 Oficina
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie; 
use Illuminate\Validation\ValidationException;


class ProductCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     
     */
    public function store(Request $request, Product $product)
    {
        $cart = $this->getFromCookieOrCreate(); // ! C67

        // $cart = Cart::create(); // ! C66 se elimino en la C67 

        $quantity = $cart->products()  // ! C66 
            ->find($product->id)
            ->pivot
            ->quantity ?? 0;


        $cart->products()->syncWithoutDetaching([ // ! C67  habia puesto productos
            $product->id => ['quantity' => $quantity + 1],  // ! C66 
        ]);

        //return redirect()->back(); // ! C66  se elimino en la C67

        $cookie =Cookie::make('cart', $cart->id, 7 * 24 * 60); // ! C67

        return redirect()->back()->cookie($cookie); // ! C67
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Cart $cart)
    {
        //
    }

    public function getFromCookieOrCreate() // ! C67
    {
       // $cartId = cookie()->get('cart');// ! C67  asi es un modo
        $cartId = Cookie::get('cart');// ! C67  asi es oro modo 


        $cart = Cart::find($cartId);

        return $cart ?? Cart::create();



    }
}
