<?php

namespace Database\Seeders;

use App\Models\Product;
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

       // $products = Product::factory(50)->create();

        $products = \App\Models\Product::factory(50)->create(); //! C63
        $users = \App\Models\User::factory(20)->create(); //! C63

        $orders = \App\Models\Order::factory(10) //! C63
        ->make()                               //! C63
        ->each(function($order) use ($users)     //! C63
        {
         $order->user_id =  $users->random()->id; //! C63 se habia puesto como id() y marcaba error que no existia el metodo
         $order->save(); //! C63

         $payment = \App\Models\Payment::factory()->make(); //! C63

         $order->payment()->save($payment);

        });//! C63 me habia faltado el ; y marco error


    }
}
