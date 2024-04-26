<!-- Header -->
<header>
    <!-- Mid-Header -->
    <div class="full-layer-mid-header">
        <div class="container">
            <div class="row clearfix align-items-center">
                <div class="col-lg-3 col-md-9 col-sm-6">
                    <div class="brand-logo text-lg-center">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('frontend/images/shopino_logo.png') }}" width="175px" alt="SHOPINO Brand Logo" class="app-brand-logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 u-d-none-lg">
                    <form class="form-searchbox">
                        <label class="sr-only" for="search-landscape">Search</label>
                        <input id="search-landscape" type="text" class="text-field" placeholder="Search everything">
                        <button id="btn-search" type="submit" class="button button-primary fas fa-search"></button>
                    </form>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6">
                    <nav>
                        <ul class="mid-nav g-nav">
                            <li class="u-d-none-lg">
                                <a href="{{ url('/') }}">
                                    <i class="ion ion-md-home u-c-brand"></i>
                                </a>
                            </li>
                            <div style="display: none">
                                {{ $total = 0 }}{{ $count = 0 }}
                                @foreach ($cartes as $carte)
                                    {{ $count++ }}
                                    {{ $total += ($carte->produits->produit_prix - ($carte->produits->produit_prix * ($carte->produits->promotion->promotion_nom/100))) * $carte->prod_qty }}
                                @endforeach
                            </div>
                            <li>
                                <a id="mini-cart-trigger">
                                    <i class="ion ion-md-basket"></i>
                                    <span class="item-counter">{{ $count }}</span>
                                    <span class="item-price">${{ $total }}</span>
                                </a>
                            </li>
                            @if (Route::has('login'))
                                @auth
                                    @guest
                                        @if (Route::has('login'))
                                            <li>
                                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                        @endif
                                            
                                        @if (Route::has('register'))
                                            <li>
                                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        @if (Auth::user()->role_as == 1)
                                            <ul class="secondary-nav g-nav">
                                                <li>
                                                    <a><i class="fas fa-user" style="font-size: 19px"></i>
                                                        <i class="fas fa-chevron-down u-s-m-l-9"></i>
                                                    </a>
                                                    <ul class="g-dropdown" style="width:200px">
                                                        <li>
                                                            <a href="{{ url('dashboard') }}">
                                                                <i class="fas fa-cog u-s-m-r-9"></i>
                                                                Dashboard</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('carte') }}">
                                                                <i class="fas fa-cog u-s-m-r-9"></i>
                                                                My Cart</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('my_orders') }}">
                                                                <i class="far fa-check-circle u-s-m-r-9"></i>
                                                                My orders</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                            <i class="fas fa-sign-in-alt u-s-m-r-9"></i>  
                                                            {{ __('Logout') }}      
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        @else
                                            <ul class="secondary-nav g-nav">
                                                <li style="margin-left: -30">
                                                    <a><i class="fas fa-user" style="font-size: 19px"></i>
                                                        <i class="fas fa-chevron-down u-s-m-l-9"></i>
                                                    </a>
                                                    <ul class="g-dropdown" style="width:200px">
                                                        <li>
                                                            <a href="{{ url('carte') }}">
                                                                <i class="fas fa-cog u-s-m-r-9"></i>
                                                                My Cart</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('my_orders') }}">
                                                                <i class="far fa-check-circle u-s-m-r-9"></i>
                                                                my orders</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                                <i class="fas fa-sign-in-alt u-s-m-r-9"></i>    
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        @endif
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                    @endguest
                                @else
                                    <a href="{{ route('login') }}" class="ml-2">Log in</a>
                                        /
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">Register</a>
                                    @endif
                                @endauth
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Mid-Header /- -->
    <!-- Responsive-Buttons -->
    <!-- Responsive-Buttons /- -->
    <!-- Mini Cart -->
    <div class="mini-cart-wrapper">
        <div class="mini-cart">
            <div class="mini-cart-header">
                YOUR CART
                <button type="button" class="button ion ion-md-close" id="mini-cart-close"></button>
            </div>
            <ul class="mini-cart-list">
                @foreach ($cartes as $carte)
                    <li class="clearfix">
                        <a href="single-product.html">
                            <img src="{{ asset('storage/'.$carte->produits->produit_image) }}" alt="{{ $carte->produits->produit_nom }}">
                            <span class="mini-item-name">{{ $carte->produits->produit_nom }}</span>
                            <span class="mini-item-price">${{ ($carte->produits->produit_prix - ($carte->produits->produit_prix * ($carte->produits->promotion->promotion_nom/100))) }}</span>
                            <span class="mini-item-quantity"> x {{ $carte->prod_qty }} </span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="mini-shop-total clearfix">
                <span class="mini-total-heading float-left">Total:</span>
                <span class="mini-total-price float-right">${{ $total }}</span>
            </div>
            <div class="mini-action-anchors">
                <a href="{{ url('carte') }}" class="cart-anchor">View Cart</a>
                @if($total != 0)
                    <a href="{{ url('checkout') }}" class="checkout-anchor">Checkout</a>
                @endif
            </div>
        </div>
    </div>
    <!-- Mini Cart /- -->
    <!-- Bottom-Header -->
    <div class="full-layer-bottom-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="v-menu v-close">
                        <span class="v-title">
                            <i class="ion ion-md-menu"></i>
                            All Categories
                            <i class="fas fa-angle-down"></i>
                        </span>
                        <nav>
                            <div class="v-wrapper">
                                <ul class="v-list animated fadeIn">
                                    <li class="js-backdrop">
                                        <a href="{{ url('shop/homme') }}">
                                            <i class="ion ion-md-shirt"></i>
                                            homme
                                            <i class="ion ion-ios-arrow-forward"></i>
                                        </a>
                                        <button class="v-button ion ion-md-add"></button>
                                        <div class="v-drop-right" style="width: 150px;">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <ul class="v-level-2">
                                                        @foreach ($categories as $categorie)
                                                           <li>
                                                                <a href="{{ url('shop/homme/'.$categorie->categorie_nom) }}">{{ $categorie->categorie_nom }}</a>
                                                            </li> 
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="js-backdrop">
                                        <a href="{{ url('shop/femme') }}">
                                            <i class="ion ion-ios-shirt"></i>
                                            femme
                                            <i class="ion ion-ios-arrow-forward"></i>
                                        </a>
                                        <button class="v-button ion ion-md-add"></button>
                                        <div class="v-drop-right" style="width: 150px;">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <ul class="v-level-2">
                                                        @foreach ($categories as $categorie)
                                                           <li>
                                                                <a href="{{ url('shop/femme/'.$categorie->categorie_nom) }}">{{ $categorie->categorie_nom }}</a>
                                                            </li> 
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="js-backdrop">
                                        <a href="{{ url('shop/enfant') }}">
                                            <i class="ion ion-md-rocket"></i>
                                            enfant
                                            <i class="ion ion-ios-arrow-forward"></i>
                                        </a>
                                        <button class="v-button ion ion-md-add"></button>
                                        <div class="v-drop-right" style="width: 150px;">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <ul class="v-level-2">
                                                        @foreach ($categories as $categorie)
                                                           <li>
                                                                <a href="{{ url('shop/enfant/'.$categorie->categorie_nom) }}">{{ $categorie->categorie_nom }}</a>
                                                            </li> 
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div style="display: none">
                    {{ $c_homme = 0, $c_femme = 0, $c_enfant = 0 }}
                    @foreach ($produits as $produit)
                        @if($produit->produit_genre == 'homme')
                            {{ $c_homme++ }}
                        @endif
                        @if($produit->produit_genre == 'femme')
                            {{ $c_femme++ }}
                        @endif
                        @if($produit->produit_genre == 'enfant')
                            {{ $c_enfant++ }}
                        @endif
                    @endforeach
                </div>
                <div class="col-lg-8 ml-5">
                    <ul class="bottom-nav g-nav u-d-none-lg">
                        <li>
                            <a href="{{ url('shop/homme') }}">Homme store
                                <span class="superscript-label-new">{{ $c_homme }} items</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('shop/femme') }}">Femme store
                                <span class="superscript-label-hot">{{ $c_femme }} items</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('shop/enfant') }}">Enfant store
                                <span class="superscript-label-discount">{{ $c_enfant }} items</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom-Header /- -->
</header>
<!-- Header /- -->
