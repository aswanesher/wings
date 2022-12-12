@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <H4>
                Checkout
            </H4>
        </div>
    </div>
    @foreach ($cart as $cItem)
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col-auto d-none d-lg-block">
                    <img src="https://via.placeholder.com/125" alt="">
                </div>
                <div class="col p-4 d-flex flex-column position-static">
                    <a href="{{ url('/product') }}/{{ $cItem->associatedModel->product_code }}" class="text-decoration-none">
                        <h3 class="mb-0">{{ $cItem->name }}</h3>
                    </a>
                    <p class="card-text mb-auto">{{ $cItem->quantity }} {{ $cItem->associatedModel->unit }}</p>
                    <p class="card-text">Subtotal : Rp. {{ number_format(Cart::get($cItem->id)->getPriceSum()) }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h3 class="border border-dark p-2">
                Total : Rp {{ number_format($total) }}
            </h3>
            <form action="{{ route('checkout.process') }}" method="post">
            @csrf
                <button type="submit" class="btn btn-primary mt-4">Confirm</button>
            </form>
        </div>
    </div>
</div>
@endsection
