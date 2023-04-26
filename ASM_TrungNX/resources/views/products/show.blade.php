@extends('products.layout')
@include('layout.header')


<div><a class="btn btn-primary" href={{ url('/products') }}>Back</a></div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            @if ($product && $product->image)
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->prodname }}" class="img-fluid">
            @endif
        </div>
        <div class="col-md-6">
            <h2>{{ $product->prodname }}</h2>
            <p>Category: {{ $product->category->catname }}</p>
            <p>Price: ${{ $product->price }}</p>
            <h4 style="padding-top: 120px">Detail:</h4>
            <p>{{ $product->content }}</p>
            <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                <button type="submit" class="btn btn-primary d-inline-block">Add to Cart</button>
            </form> 
        </div>
    </div>
</div>

@include('layout.footer')
