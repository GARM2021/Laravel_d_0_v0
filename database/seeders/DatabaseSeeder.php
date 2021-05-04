<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use App\Models\Payment;
use App\Models\Order;
use App\Models\User;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

      

      
        $users = \App\Models\User::factory(20)
        ->create() //! C63
        ->each(function ($user){  //! C64
            $image = Image::factory() //! C64
            ->user() //! C64
            ->make(); //! C64

            $user->image()->save($image); //! C64
        });

        $orders = \App\Models\Order::factory(10) //! C63
        ->make()                               //! C63
        ->each(function($order) use ($users)     //! C63
        {
         $order->user_id =  $users->random()->id; //! C63 se habia puesto como id() y marcaba error que no existia el metodo
         $order->save(); //! C63

         $payment = \App\Models\Payment::factory()->make(); //! C63

         $order->payment()->save($payment);

        });//! C63 me habia faltado el ; y marco error

        $carts   = \App\Models\Cart::factory(20)->create(); //! C64

        $products = \App\Models\Product::factory(50)
        ->create() //! C63
        ->each(function ($product) use ($orders, $carts) {  //! C64
            $order = $orders->random(); //! C64

            $order->products()->attach([ //! C64
                $product->id => ['quantity' => mt_rand(1, 3)]//! C64
            ]);
            
            $cart = $carts->random();//! C64

            $cart->products()->attach([             //! C64
                $product->id => ['quantity' => mt_rand(1, 3)] //! C64
            ]);

            $images = \App\Models\Image::factory(mt_rand(2, 4))->make(); //! C64
            $product->images()->saveMany($images); //! C64



        });
    }

}







