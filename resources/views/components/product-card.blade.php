{{-- // C65 OFICINA >> --}}
{{-- action="{{route('products.carts.store', ['product' => $product->id])}} )}}" // C67 ME MARCABA ERROR HAY DIFERENCIA EN LOS ULTIMOS CORCHETES --}}
<div class="card">
    <img class="card-img-top" src="{{ asset($product->images->first()->path) }}" height="200">
    <div class="card-body">
        <h4 class="text-right"><strong> $ {{ $product->price }}</strong></h4>
        <h5 class="card-title">{{ $product->title }}</h5>
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text"><strong>{{ $product->stock }} left</strong></p>
        {{-- // C69 OFICINA se incluyo el if y el boton de remove >> --}}

        @if (@isset($cart))
        {{-- C72 --}}
            <p class="card-text">{{ $product->pivot->quantity }} in your cart <strong>{{ $product->stock  }}  </strong> </p>
     
            <form class="d-inline" method="POST"
                action="{{ route('products.carts.destroy', ['cart' => $cart->id, 'product' => $product->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning">Remove From Cart </button>
            </form>
            {{-- C69 --}}
        @else
            <form class="d-inline" method="POST"
                action="{{ route('products.carts.store', ['product' => $product->id]) }}">
                @csrf
                <button type="submit" class="btn btn-success">Add to Cart</button>
            </form>
        @endif
    </div>
</div>
{{-- << // C65 OFICINA --}}
{{-- <p>{{ $product->description }} ({{ $product->id }})</p> // C65 se elimino
<p>{{ $product->price }} </p>
<p>{{ $product->stock }} </p>
<p>{{ $product->status }} </p> --}}
