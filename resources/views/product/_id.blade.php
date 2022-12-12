@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <H4>
                {{ $product->product_name }}
            </H4>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('addtocart') }}" method="POST">
            @csrf
            <input type="hidden" name="product" value="{{ $product->id }}">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col-auto d-none d-lg-block">
                    <img src="https://via.placeholder.com/150" alt="">
                </div>
                <div class="col p-4 d-flex flex-column position-static">
                    <a href="{{ url('/product') }}/{{ $product->product_code }}" class="text-decoration-none">
                    <h3 class="mb-0">{{ $product->product_name }}</h3>
                </a>
                    <p class="card-text mb-auto">Rp. {{ number_format($product->price) }}</p>
                    <p class="card-text mb-auto text-muted">Dimension : {{ $product->dimension }}</p>
                    <p class="card-text mb-auto text-muted">Price unit : {{ $product->unit }}</p>
                </div>
                <div class="col-md-2 p-4 d-flex flex-column position-static justify-content-center text-center">
                    <button type="submit" class="btn btn-danger">Buy</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
