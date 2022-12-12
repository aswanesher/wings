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
                Transaction
            </H4>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="table-success">
                        <th scope="col">Transaction</th>
                        <th scope="col">User</th>
                        <th scope="col">Total</th>
                        <th scope="col">Date</th>
                        <th scope="col">Item</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{ $item->document_code }} - {{ $item->document_number }}</td>
                        <td>{{ $item->users->name }}</td>
                        <td>{{ $item->total }}</td>
                        <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($item->date))->toFormattedDateString() }}</td>
                        <td>@foreach ($item->detail as $d)
                            - {{ $d->products->product_name }} x{{ $d->quantity }}<br>
                        @endforeach</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-4">
                {!! $data->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection
