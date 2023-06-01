@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Orders completed page (history)
        </h1>
        <hr>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <a href="{{ url('orders') }}" class="btn btn-warning float-right">Pending order</a>
            <thead>
                <tr>
                    <th>Order date</th>
                    <th>Tracking number</th>
                    <th>total price</th>
                    <th>type de paiment</th>
                    <th>status</th>
                    <th>view</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <th>{{ date('d/m/y',strtotime($order->created_at)) }}</th>
                        <th>{{ $order->tracking_no }}</th>
                        <th>{{ $order->total_price }}$</th>
                        <th>{{ $order->status == 0 ? 'pending' : 'completed' }}</th>
                        <th>{{ $order->message }}</th>
                        <th>
                            <a href="{{ url('orders/'.$order->id) }}" class="btn btn-primary" >view</a>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection