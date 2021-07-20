@extends('layouts.app')

@section('content')
<h1>Your Cart</h1>
    {{-- // C68  --}}
    {{-- // C70  --}}
    @if (!isset($cart) || $cart->products->isEmpty())
    <div class="alert alert-warning">
        Your cart is empty.
    </div>
@else

{{-- C72 --}}
<h4 class="text-center">Your cart total: <strong>{{ $cart->total  }}</strong> </h4>

 {{-- C72 --}}
<h4  class="text center"><strong>Grand Total: </strong> {{$cart->total}} </h4>


{{-- C71 --}}
<a class= "btn btn-succes mb-3" href="{{ route('orders.create') }}">
    Start Order    
</a>
       

        <div class="row">
            @foreach ($cart->products as $product)
            <div class="col 3">
               @include('components.product-card')
            </div>
            @endforeach
        </div>

    @endempty

@endsection