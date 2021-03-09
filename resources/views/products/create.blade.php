@extends('layaout.master');
    @section('content');
    <h1>Create a Product</h1>
    <form method="POST" action="{{route('products.store')}}">
        @csrf
        <div class="form-row">
            <label>Title</label>
            <input class="form-control" type="text" name="title" value="{{ old('title')}}">
        </div>
        <div class="form-row">
            <label>Description</label>
            <input class="form-control" type="text" name="description" value="{{ old('description')}}">
        </div>
        <div class="form-row">
            <label>Price</label>
            <input class="form-control" type="number"  min="1.00" step="0.01" name="price" value="{{ old('price')}}">
        </div>
        <div class="form-row">
            <label>Stock</label>
            <input class="form-control" type="number"  min="0"  name="stock" value="{{ old('stock')}}">
        </div>
        <div class="form-row">
            <label>Status</label>
            <Select class="custom-select" name="status" ">
                <option {{ old('status') == 'available' ? 'selected' : '|' }} value="available" selected>Select...Available</option>
                <option {{ old('status') == 'Unavailable' ? 'selected' : '|' }} value="unavailable" selected>Select...Unavailable</option>
            </Select>
        </div>
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Create Product</button>
        </div>
    </form>
    @endsection

  