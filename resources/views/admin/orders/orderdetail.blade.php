@extends('layouts.admin')

@section('content')
<!-- Checkout-Page -->
<div class="card">
    <div class="card-header">
        <h1>{{ $order->tracking_no }}</h1>
        <hr>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h3>Shipping Details</h3>
                <!-- Form-Fields -->
                <div class="row">
                    <div class="col-md-6">
                        <label for="first-name">First Name
                        </label>
                        <p>{{ $order->fname }}</p>
                    </div>
                    <div class="col-md-6">
                        <label for="last-name">Last Name
                        </label>
                        <p>{{ $order->lname }}</p>
                    </div>
                </div>
                <div>
                    <label for="select-country">Company
                    </label>
                    @if($order->company == NULL)
                        <p>________</p>
                    @else
                        <p>{{ $order->company }}</p>
                    @endif
                </div>
                <div>
                    <label for="req-st-address">Address
                    </label>
                    <p>{{ $order->address }}</p>    
                </div>
                <div>
                    <label for="town-city">apartment, suite, etc. 
                    </label>
                    @if($order->apartment == NULL)
                        <p>________</p>
                    @else
                        <p>{{ $order->apartment }}</p>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="email">Zip code: 
                        </label>
                        <p>{{ $order->zip }}</p>    
                    </div>
                    <div class="col-md-4">
                        <label for="phone">City:
                        </label>
                        <p>{{ $order->city }}</p>
                    </div>
                    <div class="col-md-4">
                        <label for="phone">state:
                        </label>
                        <p>{{ $order->state }}</p>
                    </div>
                </div>
                <div>
                    <label for="postcode">Country:
                    </label>
                    <p>{{ $order->country }}</p>
                </div>
                <div>
                    <label for="postcode">Phone number:
                    </label>
                    <p>{{ $order->phone }}</p>    
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <h3>Order Detail</h3>
                <div class="order-table">
                    <table  class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>image</th>
                                <th>Product</th>
                                <th>price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderitems as $item)
                                <tr>
                                    <td>
                                        <div>
                                            <img src="{{ asset('storage/'.$item->produits->produit_image) }}" width="50px" alt="{{ $item->produits->produit_nom }}">
                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="order-h6">{{ $item->produits->produit_nom }}<span class="order-span-quantity">x {{ $item->qty }}</span></h6>
                                        
                                    </td>
                                    <td>
                                        <h6 class="order-h6">${{ $item->price }}</h6>
                                    </td>
                                </tr>
                            @endforeach  
                        </tbody>
                    </table>
                    <br>
                    <h4>Total price :  ${{ $order->total_price }}</h4>
                    <h4><span style="color:brown">type de paiment: </span>{{ $order->message }}</h4>

                    <h3 for="" class="mt-5">Order status:</h3>
                    <form action="{{ url('update-order/'.$order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select class="form-select" name="order_status">
                            <option {{ $order->status == '0'? 'selected': '' }} value="0">pending</option>
                            <option {{ $order->status == '1'? 'selected': '' }} value="1">completed</option>
                        </select>
                        <button class="btn btn-primary float-right" type="submit">update</button>
                    </form>
                </div>
            </div>
            <!-- Checkout /- -->
        </div>
    </div>
</div>
@endsection