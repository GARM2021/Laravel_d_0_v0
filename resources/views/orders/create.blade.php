@extends('layouts.app');
{{-- C71 --}}
@section('content');
    <h1>List of Products</h1>

    <a class="btn btn-success mb-3" href="{{ route('products.create') }}">Create</a>

    @if (empty($products))
        <div class="alert alert-warning">La lista de productos esta vacia</div>

    @else
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
                    @foreach ($products as $product)
                        <tr>

                            <td> <img src="{{ asset() }}">{{ $product->images->first()->path }}">
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
    @endif
@endsection
