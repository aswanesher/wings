@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @auth
                        {{ __('Dashboard') }}
                    @endauth
                    @guest
                        {{ __('Home') }}
                    @endguest
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth
                        {{ __('You are logged in!') }}
                    @endauth
                    @guest
                        {{ __('Please logged in!') }}
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
