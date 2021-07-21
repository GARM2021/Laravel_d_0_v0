@extends('layouts.app');
{{-- C71 --}}
@section('content');

    <h1>Order Details</h1>

    <h4 class="text-center"><strong>Grand Total: </strong> $ {{ $cart->total }}</h4> {{-- C72 --}}


    <h1>List of Products</h1>


    <a class="btn btn-success mb-3" href="{{ route('products.create') }}">Create</a>

   

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
                {{-- ERR @foreach ($cart->$products as $product) --}}
                @foreach ($cart->products as $product)  {{-- C71.2 recupere del merge error--}}
                    <tr>

                        <td> <img src="{{ asset($product->images->first()->path) }}" width="100">{{-- C71 --}}
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
    {{-- @endif --}}

@endsection
