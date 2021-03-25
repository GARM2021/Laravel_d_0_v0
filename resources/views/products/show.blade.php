@extends('layouts.app');
{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body> --}}
    @section('content');
<body>
    <h1>{{$element->title}}</h1>
    <p>{{$element->description}}</p>
    <p>{{$element->price}}</p>
    <p>{{$element->stock}}</p>

    {!! $html !!}
          
    @endsection
{{-- </body>
</html> --}}