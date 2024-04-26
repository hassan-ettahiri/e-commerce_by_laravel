@extends('welcome')

@section('titre')
    {{ $order->tracking_no }}
@endsection

@section('content')
    <!-- Checkout-Page -->
    <div class="page-checkout u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                        <div class="row">
                            <!-- Billing-&-Shipping-Details -->
                            <div class="col-lg-6">
                                <h4 class="section-h4">Shipping Details</h4>
                                <!-- Form-Fields -->
                                <div class="group-inline u-s-m-b-13">
                                    <div class="group-1 u-s-p-r-16">
                                        <label for="first-name">First Name
                                        </label>
                                        <p>{{ $order->fname }}</p>
                                    </div>
                                    <div class="group-2">
                                        <label for="last-name">Last Name
                                        </label>
                                        <p>{{ $order->lname }}</p>
                                    </div>
                                </div>
                                <div class="u-s-m-b-13">
                                    <label for="select-country">Company
                                    </label>
                                    @if($order->company == NULL)
                                        <p>________</p>
                                    @else
                                        <p>{{ $order->company }}</p>
                                    @endif
                                </div>
                                <div class="street-address u-s-m-b-13">
                                    <label for="req-st-address">Address
                                    </label>
                                    <p>{{ $order->address }}</p>    
                                </div>
                                <div class="u-s-m-b-13">
                                    <label for="town-city">apartment, suite, etc. 
                                    </label>
                                    @if($order->apartment == NULL)
                                        <p>________</p>
                                    @else
                                        <p>{{ $order->apartment }}</p>
                                    @endif
                                </div>
                                <div class="group-inline u-s-m-b-13">
                                    <div class="group-1 u-s-p-r-16">
                                        <label for="email">Zip code: 
                                        </label>
                                        <p>{{ $order->zip }}</p>    
                                    </div>
                                    <div class="group-2">
                                        <label for="phone">City:
                                        </label>
                                        <p>{{ $order->city }}</p>
                                    </div>
                                </div>
                                <div class="group-inline u-s-m-b-13">
                                    <div class="group-1 u-s-p-r-16">
                                        <label for="phone">state:
                                        </label>
                                        <p>{{ $order->state }}</p>
                                    </div>
                                    <div class="group-2">
                                        <label for="postcode">Country:
                                        </label>
                                        <p>{{ $order->country }}</p>
                                    </div>
                                </div>
                                <div class="u-s-m-b-13">
                                    <label for="postcode">Phone number:
                                    </label>
                                    <p>{{ $order->phone }}</p>    
                                </div>
                            </div>
                            <!-- Billing-&-Shipping-Details /- -->
                            <!-- Checkout -->
                            <div class="col-lg-6">
                                <h4 class="section-h4">Order Detail</h4>
                                <div class="order-table">
                                    <table class="u-s-m-b-13">
                                        <thead>
                                            <tr>
                                                <th>image</th>
                                                <th>Product</th>
                                                <th>price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div style="display: none">{{ $total = 0 }}</div>
                                            @foreach ($order->orderitems as $item)
                                                <tr>
                                                    <td>
                                                        <div class="cart-anchor-image">
                                                            <a href="single-product.html">
                                                                <img src="{{ asset('storage/'.$item->produits->produit_image) }}" alt="{{ $item->produits->produit_nom }}">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h6 class="order-h6">{{ $item->produits->produit_nom }}</h6>
                                                        <span class="order-span-quantity">x {{ $item->qty }}</span>
                                                    </td>
                                                    <td>
                                                        <h6 class="order-h6">${{ $item->price }}</h6>
                                                    </td>
                                                </tr>
                                                 <div style="display: none">{{ $total += $item->qty * $item->price }}</div>
                                            @endforeach
                                                
                                        </tbody>
                                    </table>
                                    <br>
                                    <h4>Total price :  ${{ $total }}</h4>
                                </div>
                            </div>
                            <!-- Checkout /- -->
                        </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
    
    <!-- Checkout-Page /- -->
@endsection