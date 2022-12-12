@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- @php
                dd(Cart::session(Auth::user()->id)->getContent());
            @endphp --}}
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <H4>
                Product List
            </H4>
        </div>
    </div>
    @foreach ($product as $item)
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('addtocart') }}" method="POST">
            @csrf
            <input type="hidden" name="product" value="{{ $item->id }}">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-auto d-none d-lg-block">
                        <img src="https://via.placeholder.com/125" alt="">
                    </div>
                    <div class="col p-4 d-flex flex-column position-static">
                        <a href="{{ url('/product') }}/{{ $item->product_code }}" class="text-decoration-none">
                        <h3 class="mb-0">{{ $item->product_name }}</h3>
                    </a>
                        <p class="card-text mb-auto">Rp. {{ number_format($item->price) }}</p>
                    </div>
                    <div class="col-md-2 p-4 d-flex flex-column position-static justify-content-center text-center">
                        <button type="submit" class="btn btn-danger">Buy</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endforeach
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <a href="{{ url('/shopping-cart') }}" class="btn btn-primary">Checkout</a>
        </div>
    </div>
</div>
@endsection
