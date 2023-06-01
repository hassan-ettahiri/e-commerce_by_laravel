@extends('welcome')

@section('titre')
    CARTE
@endsection

@section('content')
<div style="display: none">
    {{ $count = 0 }}
    @foreach ($orders as $item)
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
                  <h5>Your order page is currently empty.</h5>
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
                    <h2>My Orders:</h2>
                    <br>
                    <div class="table-wrapper u-s-m-b-60">
                        <table>
                            <thead>
                                <tr>
                                    <th>Order date</th>
                                    <th>Tracking number</th>
                                    <th>total price</th>
                                    <th>status</th>
                                    <th>type de paiement</th>
                                    <th>view</th>
                                </tr>
                            </thead>
                            <tbody>
                            <div style="display: none">{{ $total = 0 }}</div>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        <div class="cart-price">
                                            {{ date('d/m/y',strtotime($order->created_at)) }}
                                        </div>
                                    </td>
                                    <td>
                                            <div class="cart-price">
                                                {{ $order->tracking_no }}
                                            </div>
                                    </td>
                                    <td>
                                        <div class="cart-quantity">
                                            <div class="quantity">
                                                {{ $order->total_price }}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cart-quantity">
                                            <div class="quantity">
                                                {{ $order->status == 0 ?'pending' : 'completed' }}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cart-quantity">
                                            <div class="quantity">
                                                {{ $order->message }}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="action-wrapper">
                                            <a class="button button-outline-secondary fas fa-view" href="{{ url('view_order/'.$order->id) }}"><i class="fa-sharp fa-solid fa-eye" style="margin-left: -3px"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    
@endsection