@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Orders page
        </h1>
        <hr>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <a href="{{ url('order_completed') }}" class="btn btn-warning float-right">Completed order</a>
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
                        <th>{{ $order->message }}</th>
                        <th>{{ $order->status == 0 ? 'pending' : 'completed' }}</th>
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