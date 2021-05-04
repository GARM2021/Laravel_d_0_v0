<?php

namespace App\Http\Controllers;

use App\Models\Product;

class MainController extends Controller
{
    public function index()
    {
        //$products = Product::where('status', 'avialable')->get();//! C65 formato uno
        $products = Product::available()->get();//! C65 formato corto 

       // return view('welcome')->with(['products' => Product::all(), ]);
        return view('welcome')->with(['products' =>$products,]); //!C65 se modifico
    }
}
