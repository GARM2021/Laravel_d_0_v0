@extends('layouts.app');
{{-- C71 --}}
@section('content');
    <h1>Orders Details</h1>
    <h4  class="text center"><strong>Grand Total: </strong> {{$cart->total}} </h4>

    <a class="btn btn-success mb-3" href="{{ route('products.create') }}">Create</a>

    {{-- C71 --}}
    {{-- @if (empty($products)) --}}
    {{-- <div class="alert alert-warning">La lista de productos esta vacia</div> --}}
    {{-- @else --}}



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
                @foreach ($cart->products as $product)
                    <tr>

                        <td> <img src="{{ asset($product->images->first()->path) }}" width="100">{{-- C71 --}}
                            {{ $product->title }}
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>
                            <strong>
                           
                            {{-- {{ $product->pivot->quantity->Total }} C72 --}}
                            $ {{ $product->Total }}  
                            </strong>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    {{-- @endif --}}

@endsection
