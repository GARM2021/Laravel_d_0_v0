@extends('layouts.app');
{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body> --}}
    @section('content');

    <div class="row">
        @foreach ($products as $product)
        <div class="col 3">
           @include('components.product-card')
        </div>
        @endforeach
    </div>
          
    @endsection
{{-- </body>
</html> --}}