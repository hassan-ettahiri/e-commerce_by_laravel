@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>dashboard:</h1>
    </div>
    <div class="card-body">
            <div class="row">
                <div style="display: none">
                    {{ $all_orders = 0,$all_users = 0,$all_produits = 0, $total_price = 0 }}
                    @foreach ($orders as $item)
                        {{ $all_orders++ }}
                        {{ $total_price += $item->total_price }}
                    @endforeach
                    @foreach ($users as $item)
                        {{ $all_users++ }}
                    @endforeach
                    @foreach ($produits as $item)
                        {{ $all_produits++ }}
                    @endforeach
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="rounded d-flex align-items-center justify-content-between p-4 border">
                        <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                            width="50px" height="50px" viewBox="0 0 512 512"  xml:space="preserve" style="margin-left: 25px">
                        <style type="text/css">
                        <![CDATA[
                            .st0{fill:#000000;}
                        ]]>
                        </style>
                        <g>
                            <path class="st0" d="M77.609,448h52.781c7.516,0,13.609-6.094,13.609-13.609V315.094c0-7.516-6.094-13.609-13.609-13.609H77.609
                                c-7.516,0-13.609,6.094-13.609,13.609v119.297C64,441.906,70.094,448,77.609,448z"/>
                            <path class="st0" d="M197.609,448h52.781c7.516,0,13.609-6.094,13.609-13.609V235.094c0-7.516-6.094-13.609-13.609-13.609h-52.781
                                c-7.516,0-13.609,6.094-13.609,13.609v199.297C184,441.906,190.094,448,197.609,448z"/>
                            <path class="st0" d="M317.609,448h52.781c7.516,0,13.609-6.094,13.609-13.609V139.094c0-7.516-6.094-13.609-13.609-13.609h-52.781
                                c-7.516,0-13.609,6.094-13.609,13.609v295.297C304,441.906,310.094,448,317.609,448z"/>
                            <path class="st0" d="M437.609,448h52.781c7.516,0,13.609-6.094,13.609-13.609V43.094c0-7.516-6.094-13.609-13.609-13.609h-52.781
                                c-7.516,0-13.609,6.094-13.609,13.609v391.297C424,441.906,430.094,448,437.609,448z"/>
                            <path class="st0" d="M498.391,482H45.609C38.094,482,32,475.906,32,468.391V13.609C32,6.094,25.906,0,18.391,0h-4.781
                                C6.094,0,0,6.094,0,13.609v484.781C0,505.906,6.094,512,13.609,512h484.781c7.516,0,13.609-6.094,13.609-13.609v-2.781
                                C512,488.094,505.906,482,498.391,482z"/>
                        </g>
                        </svg>
                        <div class="ms-3">
                            <p class="mb-2">Total sale</p>
                            <h4 class="mb-0"><strong>{{ $total_price }}$</strong></h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="border rounded d-flex align-items-center justify-content-between p-4">
                        <svg fill="#000000" xmlns="http://www.w3.org/2000/svg"  width="50" height="50"
                            viewBox="0 0 100 100" xml:space="preserve" style="margin-left: 25px">

                        <g>
                            <g>
                                <path d="M78.8,62.1l-3.6-1.7c-0.5-0.3-1.2-0.3-1.7,0L52,70.6c-1.2,0.6-2.7,0.6-3.9,0L26.5,60.4
                                    c-0.5-0.3-1.2-0.3-1.7,0l-3.6,1.7c-1.6,0.8-1.6,2.9,0,3.7L48,78.5c1.2,0.6,2.7,0.6,3.9,0l26.8-12.7C80.4,65,80.4,62.8,78.8,62.1z"
                                    />
                            </g>
                            <g>
                                <path d="M78.8,48.1l-3.7-1.7c-0.5-0.3-1.2-0.3-1.7,0L52,56.6c-1.2,0.6-2.7,0.6-3.9,0L26.6,46.4
                                    c-0.5-0.3-1.2-0.3-1.7,0l-3.7,1.7c-1.6,0.8-1.6,2.9,0,3.7L48,64.6c1.2,0.6,2.7,0.6,3.9,0l26.8-12.7C80.4,51.1,80.4,48.9,78.8,48.1
                                    z"/>
                            </g>
                            <g>
                                <path d="M21.2,37.8l26.8,12.7c1.2,0.6,2.7,0.6,3.9,0l26.8-12.7c1.6-0.8,1.6-2.9,0-3.7L51.9,21.4
                                    c-1.2-0.6-2.7-0.6-3.9,0L21.2,34.2C19.6,34.9,19.6,37.1,21.2,37.8z"/>
                            </g>
                        </g>
                        </svg>
                        <div class="ms-3">
                            <p class="mb-2">Total orders</p>
                            <h4 class="mb-0"><strong>{{ $all_orders }}</strong></h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="border rounded d-flex align-items-center justify-content-between p-4">
                        <svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-left: 25px">
                            <rect width="24" height="24" fill="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5 9.5C5 7.01472 7.01472 5 9.5 5C11.9853 5 14 7.01472 14 9.5C14 11.9853 11.9853 14 9.5 14C7.01472 14 5 11.9853 5 9.5Z" fill="#323232"/>
                            <path d="M14.3675 12.0632C14.322 12.1494 14.3413 12.2569 14.4196 12.3149C15.0012 12.7454 15.7209 13 16.5 13C18.433 13 20 11.433 20 9.5C20 7.567 18.433 6 16.5 6C15.7209 6 15.0012 6.2546 14.4196 6.68513C14.3413 6.74313 14.322 6.85058 14.3675 6.93679C14.7714 7.70219 15 8.5744 15 9.5C15 10.4256 14.7714 11.2978 14.3675 12.0632Z" fill="#323232"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.64115 15.6993C5.87351 15.1644 7.49045 15 9.49995 15C11.5112 15 13.1293 15.1647 14.3621 15.7008C15.705 16.2847 16.5212 17.2793 16.949 18.6836C17.1495 19.3418 16.6551 20 15.9738 20H3.02801C2.34589 20 1.85045 19.3408 2.05157 18.6814C2.47994 17.2769 3.29738 16.2826 4.64115 15.6993Z" fill="#323232"/>
                            <path d="M14.8185 14.0364C14.4045 14.0621 14.3802 14.6183 14.7606 14.7837V14.7837C15.803 15.237 16.5879 15.9043 17.1508 16.756C17.6127 17.4549 18.33 18 19.1677 18H20.9483C21.6555 18 22.1715 17.2973 21.9227 16.6108C21.9084 16.5713 21.8935 16.5321 21.8781 16.4932C21.5357 15.6286 20.9488 14.9921 20.0798 14.5864C19.2639 14.2055 18.2425 14.0483 17.0392 14.0008L17.0194 14H16.9997C16.2909 14 15.5506 13.9909 14.8185 14.0364Z" fill="#323232"/>
                        </svg>
                        <div class="ms-3">
                            <p class="mb-2">Total users</p>
                            <h4 class="mb-0"><strong>{{ $all_users }}</strong></h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="border rounded d-flex align-items-center justify-content-between p-4">
                        <svg width="50px" height="50px" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin-left: 25px">
                            <title>product-management</title>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="icon" fill="#000000" transform="translate(42.666667, 34.346667)">
                                    <path d="M426.247658,366.986259 C426.477599,368.072636 426.613335,369.17172 426.653805,370.281095 L426.666667,370.986667 L426.666667,392.32 C426.666667,415.884149 383.686003,434.986667 330.666667,434.986667 C278.177524,434.986667 235.527284,416.264289 234.679528,393.025571 L234.666667,392.32 L234.666667,370.986667 L234.679528,370.281095 C234.719905,369.174279 234.855108,368.077708 235.081684,366.992917 C240.961696,371.41162 248.119437,375.487081 256.413327,378.976167 C275.772109,387.120048 301.875889,392.32 330.666667,392.32 C360.599038,392.32 387.623237,386.691188 407.213205,377.984536 C414.535528,374.73017 420.909655,371.002541 426.247658,366.986259 Z M192,7.10542736e-15 L384,106.666667 L384.001134,185.388691 C368.274441,181.351277 350.081492,178.986667 330.666667,178.986667 C301.427978,178.986667 274.9627,184.361969 255.43909,193.039129 C228.705759,204.92061 215.096345,223.091357 213.375754,241.480019 L213.327253,242.037312 L213.449,414.75 L192,426.666667 L-2.13162821e-14,320 L-2.13162821e-14,106.666667 L192,7.10542736e-15 Z M426.247658,302.986259 C426.477599,304.072636 426.613335,305.17172 426.653805,306.281095 L426.666667,306.986667 L426.666667,328.32 C426.666667,351.884149 383.686003,370.986667 330.666667,370.986667 C278.177524,370.986667 235.527284,352.264289 234.679528,329.025571 L234.666667,328.32 L234.666667,306.986667 L234.679528,306.281095 C234.719905,305.174279 234.855108,304.077708 235.081684,302.992917 C240.961696,307.41162 248.119437,311.487081 256.413327,314.976167 C275.772109,323.120048 301.875889,328.32 330.666667,328.32 C360.599038,328.32 387.623237,322.691188 407.213205,313.984536 C414.535528,310.73017 420.909655,307.002541 426.247658,302.986259 Z M127.999,199.108 L128,343.706 L170.666667,367.410315 L170.666667,222.811016 L127.999,199.108 Z M42.6666667,151.701991 L42.6666667,296.296296 L85.333,320.001 L85.333,175.405 L42.6666667,151.701991 Z M330.666667,200.32 C383.155809,200.32 425.80605,219.042377 426.653805,242.281095 L426.666667,242.986667 L426.666667,264.32 C426.666667,287.884149 383.686003,306.986667 330.666667,306.986667 C278.177524,306.986667 235.527284,288.264289 234.679528,265.025571 L234.666667,264.32 L234.666667,242.986667 L234.808715,240.645666 C237.543198,218.170241 279.414642,200.32 330.666667,200.32 Z M275.991,94.069 L150.412,164.155 L192,187.259259 L317.866667,117.333333 L275.991,94.069 Z M192,47.4074074 L66.1333333,117.333333 L107.795,140.479 L233.373,70.393 L192,47.4074074 Z" id="Combined-Shape">
                        
                        </path>
                                </g>
                            </g>
                        </svg>
                        <div class="">
                            <p class="mb-2">Total product</p>
                            <h4 class="mb-0"><strong>{{ $all_produits }}</strong></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sale & Revenue End -->


        <!-- Sales Chart Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-6">
                    <div class="border text-center rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">orders</h6>
                            <a href="{{ url('orders') }}">Show All</a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Order date</th>
                                    <th>Tracking number</th>
                                    <th>total price</th>
                                    <th>type de paiment</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div style="display: none">
                                    {{ $count = 0 }}
                                </div>
                                @foreach ($orders as $order)
                                    @if($count < 4)
                                        <tr>
                                            <th>{{ date('d/m/y',strtotime($order->created_at)) }}</th>
                                            <th>{{ $order->tracking_no }}</th>
                                            <th>{{ $order->total_price }}$</th>
                                            <th>{{ $order->message }}</th>
                                            <th>{{ $order->status == 0 ? 'pending' : 'completed' }}</th>
                                        </tr>
                                    @endif
                                    <div style="display: none">
                                        {{ $count++ }}
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-6">
                    <div class="border text-center rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">products</h6>
                            <a href="{{ url('produits') }}">Show All</a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>image</th>
                                    <th>nom produit</th>
                                    <th>prix</th>
                                    <th>Quantité</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div style="display: none">
                                    {{ $count = 0 }}
                                </div>
                                @foreach ($produits as $item)
                                    @if($count < 4)
                                        <tr>
                                            <th>{{ $item->id }}</th>
                                            <th>
                                                <img src="{{ asset('storage/'.$item->produit_image) }}" width="27px" alt="{{ $item->produit_nom }}">
                                            </th>
                                            <th>{{ $item->produit_nom }}</th>
                                            <th>{{ $item->produit_prix }}</th>
                                            <th>{{ $item->produit_quantite }}</th>
                                        </tr>
                                    @endif
                                    <div style="display: none">
                                        {{ $count++ }}
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sales Chart End -->


        <!-- Widgets Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-md-6 col-xl-4">
                    <div class="h-100 border rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h6 class="mb-0">Users</h6>
                            <a href="{{ url('users') }}">Show All</a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>full name</th>
                                    <th>phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div style="display: none">
                                    {{ $count = 0 }}
                                </div>
                                @foreach ($users as $user)
                                    @if($count < 4)
                                        <tr>
                                            <th>{{ $user->id }}</th>
                                            <th>{{ $user->name.' '.$user->lname }}</th>
                                            <th>{{ $user->phone }}</th>
                                        </tr>
                                    @endif
                                    <div style="display: none">
                                        {{ $count++ }}
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-xl-4">
                    <div class="h-100 border rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">categories</h6>
                            <a href="{{ url('categories') }}">Show All</a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>nom categorie</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div style="display: none">
                                    {{ $count = 0 }}
                                </div>
                                @foreach ($categories as $item)
                                    @if($count < 4)
                                        <tr>
                                            <th>{{ $item->id }}</th>
                                            <th>{{ $item->categorie_nom }}</th>
                                        </tr>
                                    @endif
                                    <div style="display: none">
                                        {{ $count++ }}
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-xl-4">
                    <div class="h-100 border rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">promotions</h6>
                            <a href="{{ url('promotions') }}">Show All</a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>% promotion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div style="display: none">
                                    {{ $count = 0 }}
                                </div>
                                @foreach ($promotions as $item)
                                    @if($count < 4)
                                        <tr>
                                            <th>{{ $item->id }}</th>
                                            <th>{{ $item->promotion_nom }}%</th>
                                        </tr>
                                    @endif
                                    <div style="display: none">
                                        {{ $count++ }}
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <!-- Widgets End -->
    </div>
</div>

@endsection