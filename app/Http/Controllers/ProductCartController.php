<?php
// ! C66 Oficina
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie; //! C67 
use Illuminate\Validation\ValidationException;
use PhpParser\Node\Stmt\Return_;

class ProductCartController extends Controller
{
    

    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
  
    public function store(Request $request, Product $product)
    {
        // $cart = $this->getFromCookieOrCreate(); // ! C67  C68 se elimino 

      

       //  $cart = Cart::create(); // ! C66 C68 ESTE ESTABA ACTIVO Y ME MARCABA ERROR EN LA CLASE 68

       $cart = $this->cartService->getFromCookieOrCreate(); //! C68 este faltaba este tenia $cartService 

        $quantity = $cart->products()  // ! C66 
            ->find($product->id)
            ->pivot
            ->quantity ?? 0;


        $cart->products()->syncWithoutDetaching([ // ! C67  habia puesto productos
            $product->id => ['quantity' => $quantity + 1],  // ! C66 
        ]);

        //return redirect()->back(); // ! C66  se elimino en la C67
        $cookie =  $this->cartService->makeCookie($cart); // ! C69

       // $cookie =Cookie::make('cart', $cart->id, 7 * 24 * 60); // ! C67

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
    public function destroy(Product $product, Cart $cart) //! C69
    {
        $cart->products()->detach($product->id);//! C69 

       $cookie =  $this->cartService->makeCookie($cart);

        return redirect()->back()->cookie($cookie); // ! C69 revision ? 

    }

    // public function getFromCookieOrCreate() // ! C67 C68 SE ELIMINO PORQUE ESTA EN SERVICES
    // {
    //    // $cartId = cookie()->get('cart');// ! C67  asi es un modo
    //     $cartId = Cookie::get('cart');// ! C67  asi es oro modo 


    //     $cart = Cart::find($cartId);

    //     return $cart ?? Cart::create();



    // }
    

   
}
