@extends('layouts.app');
{{-- C71 --}}
@section('content');
<<<<<<< HEAD
<<<<<<< HEAD
    <h1>Order Details</h1>

    <h4 class="text-center"><strong>Grand Total: </strong>{{ $cart->total }}</h4> {{-- C72 --}}
=======
    <h1>Orders Details</h1>
    <h4  class="text center"><strong>Grand Total: </strong> {{$cart->total}} </h4>
>>>>>>> 586a1927975cf701332ae1532d976964f40402b5
=======
    <h1>List of Products</h1>
>>>>>>> parent of 9c83edb... C72 OFICINA

    <a class="btn btn-success mb-3" href="{{ route('products.create') }}">Create</a>

    {{-- C71 --}}
    {{--@if (empty($products))--}}
    {{--<div class="alert alert-warning">La lista de productos esta vacia</div>  --}}
    {{-- @else--}}
        

   
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
<<<<<<< HEAD

                        <td> <img src="{{ asset($product->images->first()->path) }}" width="100">{{-- C71 --}}
                            {{ $product->title }}
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>
                            <strong>
                           
<<<<<<< HEAD
                             $ {{ $product->Total }}{{-- C72 --}}
=======
                            {{-- {{ $product->pivot->quantity->Total }} C72 --}}
                            $ {{ $product->Total }}  
>>>>>>> 586a1927975cf701332ae1532d976964f40402b5
                            </strong>
                        </td>
=======
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
>>>>>>> parent of 9c83edb... C72 OFICINA
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart->products as $product)
                        <tr>

                            <td> <img src="{{ asset( $product->images->first()->path) }}" width= "100">{{-- C71  --}}
                                {{ $product->title }}
                            </td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->pivot->quantity }}</td>
                            <td>
                                <strong>
                                    {{ $product->pivot->quantity * $product->price }}
                                </strong>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        {{--  @endif --}}
   
@endsection
