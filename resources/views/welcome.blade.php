@extends('layouts.app')

@section('content')
    @empty($products)
        <div class="alert alert-danger">
            A simple Alert check it out!
        </div>
    @else

        <div class="row">
            @foreach ($products as $product)
            <div class="col 3">
               @include('components.product-card')
            </div>
            @endforeach
        </div>

    @endempty

@endsection
