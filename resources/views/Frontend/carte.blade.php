@extends('welcome')

@section('titre')
    CARTE
@endsection

@section('content')
<div style="display: none">
  {{ $count = 0 }}
  @foreach ($carteitem as $item)
    {{ $count++ }}
  @endforeach
</div>
@if ($count == 0)
<!-- app -->
<div class="page-cart u-s-p-t-80">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
            <div class="text-center" style="font-size: 100px">
                <h1>Em
                    <i class="fas fa-child"></i>ty!</h1>
                <h5>Your cart is currently empty.</h5>
                <div class="redirect-link-wrapper u-s-p-t-25">
                    <a class="redirect-link" href="{{ url('/') }}">
                        <span>Return to Shop</span>
                    </a>
                </div>
            </div>
          </div>
      </div>
  </div>
  <!-- Cart-Page /- -->
</div>
@else
<div class="page-cart u-s-p-t-80">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <form>
                  <!-- Products-List-Wrapper -->
                  <div class="table-wrapper u-s-m-b-60">
                      <table>
                          <thead>
                              <tr>
                                  <th>Product</th>
                                  <th>Price</th>
                                  <th>Quantity</th>
                                  <th>Subtotal</th>
                              </tr>
                          </thead>
                          <tbody>
                            <div style="display: none">{{ $total = 0 }}</div>
                            @foreach ($carteitem as $item)
                                <tr>
                                    <td>
                                        <div class="cart-anchor-image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('storage/'.$item->produits->produit_image) }}" alt="{{ $item->produits->produit_nom }}">
                                                <h6>{{ $item->produits->produit_nom }}</h6>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cart-price">
                                            ${{ $item->produits->produit_prix - ($item->produits->produit_prix * ($item->produits->promotion->promotion_nom/100)) }}
                                            </div>
                                    </td>
                                    <td>
                                        <div class="cart-quantity">
                                            <div class="quantity">
                                                {{ $item->prod_qty }}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                      <div class="action-wrapper">
                                          <a class="button button-outline-secondary fas fa-trash" href="{{ url('destroy/'.$item->prod_id) }}"></a>
                                      </div>
                                    </td>
                                </tr>
                                <div style="display: none">{{ $total += ($item->produits->produit_prix - ($item->produits->produit_prix * ($item->produits->promotion->promotion_nom/100))) * $item->prod_qty }}</div>
                            @endforeach
                          </tbody>
                      </table>
                  </div>
                  <!-- Products-List-Wrapper /- -->
              </form>
              
              <div class="coupon-continue-checkout u-s-m-b-60">
                <div class="button-area">
                    <a href="{{ url('/') }}" class="continue">return to shop</a>
                    <a href="{{ url('checkout') }}" class="checkout">Proceed to Checkout</a>
                </div>
              </div>
              <!-- Billing -->
              <div class="calculation u-s-m-b-60">
                  <div class="table-wrapper-2">
                      <table>
                          <thead>
                              <tr>
                                  <th colspan="2">Cart Totals</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>
                                      <h3 class="calc-h3 u-s-m-b-0">Subtotal</h3>
                                  </td>
                                  <td>
                                      <span class="calc-text">${{ $total }}</span>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      <h3 class="calc-h3 u-s-m-b-0" id="tax-heading">shipping</h3>
                                      <span> (estimated for your country)</span>
                                  </td>
                                  <td>
                                      <span class="calc-text">$0.00</span>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      <h3 class="calc-h3 u-s-m-b-0">Total</h3>
                                  </td>
                                  <td>
                                      <span class="calc-text">${{ $total }}</span>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
              <!-- Billing /- -->
          </div>
      </div>
  </div>
</div>
<!-- Cart-Page /- -->
@endif

@endsection