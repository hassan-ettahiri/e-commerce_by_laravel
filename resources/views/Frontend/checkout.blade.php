@extends('welcome')

@section('titre')
    CHECKOUT
@endsection

@section('content')
    <!-- Checkout-Page -->
    <div class="page-checkout u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <form method="POST" id="myform">
                    @csrf
                        <div class="row">
                            <!-- Billing-&-Shipping-Details -->
                            <div class="col-lg-6">
                                <h4 class="section-h4">Billing Details</h4>
                                <!-- Form-Fields -->
                                <div class="group-inline u-s-m-b-13">
                                    <div class="group-1 u-s-p-r-16">
                                        <label for="first-name">First Name
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="fname" name="fname" value="{{ Auth::user()->name }}" class="text-field">
                                    </div>
                                    <div class="group-2">
                                        <label for="last-name">Last Name
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="lname" value="{{ Auth::user()->lname }}" name="lname" class="text-field">
                                    </div>
                                </div>
                                <div class="u-s-m-b-13">
                                    <label for="select-country">Company 
                                        <span class="astk">(optional)</span>
                                    </label>
                                    <div class="select-box-wrapper">
                                        <input type="text" id="company" placeholder="company" name="company" value="{{ Auth::user()->company }}" class="text-field">
                                    </div>
                                </div>
                                <div class="street-address u-s-m-b-13">
                                    <label for="req-st-address">Address
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" id="address" class="text-field" name="address" value="{{ Auth::user()->address }}" placeholder="House name and street name">
                                </div>
                                <div class="u-s-m-b-13">
                                    <label for="town-city">apartment, suite, etc. 
                                        <span class="astk">(optional)</span>
                                    </label>
                                    <input type="text" id="apartment" name="apartment" value="{{ Auth::user()->apartment }}" class="text-field">
                                </div>
                                <div class="group-inline u-s-m-b-13">
                                    <div class="group-1 u-s-p-r-16">
                                        <label for="email">Zip code: 
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="zip" name="zip" value="{{ Auth::user()->zip }}" class="text-field">
                                    </div>
                                    <div class="group-2">
                                        <label for="phone">City:
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="city" name="city" value="{{ Auth::user()->city }}" class="text-field">
                                    </div>
                                </div>
                                <div class="group-inline u-s-m-b-13">
                                    <div class="group-1 u-s-p-r-16">
                                        <label for="phone">state:
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="state" value="{{ Auth::user()->state }}" name="state" class="text-field">
                                    </div>
                                    <div class="group-2">
                                        <label for="postcode">Country:
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="country" name="country" value="{{ Auth::user()->country }}" class="text-field">
                                    </div>
                                </div>
                                <div class="u-s-m-b-13">
                                    <label for="postcode">Phone number:
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" id="phone" name="phone" value="{{ Auth::user()->phone }}" class="text-field">
                                </div>
                            </div>
                            <!-- Billing-&-Shipping-Details /- -->
                            <!-- Checkout -->
                            <div class="col-lg-6">
                                <h4 class="section-h4">Your Order</h4>
                                <div class="order-table">
                                    <table class="u-s-m-b-13">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div style="display: none">{{ $total = 0 }}</div>
                                            @foreach ($cartes as $carte)
                                                <tr>
                                                    <td>
                                                        <h6 class="order-h6">{{ $carte->produits->produit_nom }}</h6>
                                                        <span class="order-span-quantity">x {{ $carte->prod_qty }}</span>
                                                    </td>
                                                    <td>
                                                        <h6 class="order-h6">${{ ($carte->produits->produit_prix - ($carte->produits->produit_prix * ($carte->produits->promotion->promotion_nom/100))) * $carte->prod_qty }}</h6>
                                                    </td>
                                                </tr>
                                                <div style="display: none">{{ $total += ($carte->produits->produit_prix - ($carte->produits->produit_prix * ($carte->produits->promotion->promotion_nom/100))) * $carte->prod_qty }}</div>
                                            @endforeach
                                            <tr>
                                                <td>
                                                    <h3 class="order-h3">Subtotal</h3>
                                                </td>
                                                <td>
                                                    <h3 class="order-h3">${{ $total }}</h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h3 class="order-h3">Shipping</h3>
                                                </td>
                                                <td>
                                                    <h3 class="order-h3">$0.00</h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h3 class="order-h3">Total</h3>
                                                </td>
                                                <td>
                                                    <h3 class="order-h3">${{ $total }}</h3>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="total_price" value="{{ $total }}">
                                    <div class="u-s-m-b-13">
                                        <button type="submit" name="cod" class="button button-outline-secondary">Cash on Delivery (Place order)</button>
                                    </div>
                                    <div class="u-s-m-b-13">
                                        <button type="submit" name="cc" class="button button-outline-secondary">Credit Card</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Checkout /- -->
                        </div>
                        <script>
                            document.querySelector('button[name="cod"]').addEventListener('click', function() {
                                document.querySelector('#myform').action = '/place_order';
                            });

                            document.querySelector('button[name="cc"]').addEventListener('click', function() {
                                document.querySelector('#myform').action = '/continue';
                            });
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout-Page /- -->
@endsection