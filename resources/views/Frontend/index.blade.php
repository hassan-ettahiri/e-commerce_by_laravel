@extends('welcome')

@section('titre')
    SHOPINO
@endsection

@section('content')
<!-- Main-Slider -->
<div class="default-height ph-item">
    <div class="slider-main owl-carousel">
        <div class="bg-image one">
            <div class="slide-content slide-animation">
                <h1>homme fashion</h1>
                <h2>Style, élégance, confort, confiance, tendance, qualité</h2>
            </div>
        </div>
        <div class="bg-image two">
            <div class="slide-content-2 slide-animation">
                <h2 class="slide-2-h2-a">femme</h2>
                <h2 class="slide-2-h2-b">fashion</h2>
                <h1>2023</h1>
            </div>
        </div>
        <div class="bg-image three">
            <div class="slide-content slide-animation">
                <h1>ENFANT 
                    <span style="color:#333"> STYLE</span>
                </h1>
                <h2 style="color:#fff"># 2023</h2>
            </div>
        </div>
    </div>
</div>
<!-- Main-Slider /- -->
<section class="section-maker">
    <div class="container">
        <div class="sec-maker-header text-center">
            <h3 class="sec-maker-h3">homme Produit</h3>
            <ul class="nav tab-nav-style-1-a justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#men-latest-products">Latest Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#men-featured-products">Featured Products</a>
                </li>
            </ul>
        </div>
        <div class="wrapper-content">
            <div class="outer-area-tab">
                <div class="tab-content">
                    <div class="tab-pane active show fade" id="men-latest-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach ($produits as $produit)
                                    @if ($produit->produit_genre == 'homme')
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{ url('shop/'.$produit->produit_genre.'/'.$produit->category->categorie_nom.'/'.$produit->id) }}">
                                                <img class="img-fluid" src="{{ asset('storage/'.$produit->produit_image) }}" alt="{{ $produit->produit_nom }}">
                                            </a>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li class="has-separator">
                                                        <a href="shop-v1-root-category.html">{{ $produit->produit_genre }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-v3-sub-sub-category.html">{{ $produit->category->categorie_nom }}</a>
                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="{{ url('shop/'.$produit->produit_genre.'/'.$produit->category->categorie_nom.'/'.$produit->id) }}">{{ $produit->produit_nom }}</a>
                                                </h6>
                                            </div>
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    ${{ $produit->produit_prix - ($produit->produit_prix * ($produit->promotion->promotion_nom/100)) }}
                                                </div>
                                                <div class="item-old-price">
                                                    ${{ $produit->produit_prix }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tag new">
                                            <span>{{ $produit->promotion->promotion_nom }}%</span>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="men-featured-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach ($produits as $produit)
                                    @if ($produit->produit_genre == 'homme' && $produit->feature == 1)
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{ url('shop/'.$produit->produit_genre.'/'.$produit->category->categorie_nom.'/'.$produit->id) }}">
                                                <img class="img-fluid" src="{{ asset('storage/'.$produit->produit_image) }}" alt="{{ $produit->produit_nom }}">
                                            </a>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li class="has-separator">
                                                        <a href="shop-v1-root-category.html">{{ $produit->produit_genre }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-v3-sub-sub-category.html">{{ $produit->category->categorie_nom }}</a>
                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="{{ url('shop/'.$produit->produit_genre.'/'.$produit->category->categorie_nom.'/'.$produit->id) }}">{{ $produit->produit_nom }}</a>
                                                </h6>
                                            </div>
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    ${{ $produit->produit_prix - ($produit->produit_prix * ($produit->promotion->promotion_nom/100)) }}
                                                </div>
                                                <div class="item-old-price">
                                                    ${{ $produit->produit_prix }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tag new">
                                            <span>{{ $produit->promotion->promotion_nom }}%</span>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-maker">
    <div class="container">
        <div class="sec-maker-header text-center">
            <h3 class="sec-maker-h3">WOMEN'S CLOTHING</h3>
            <ul class="nav tab-nav-style-1-a justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#women-latest-products">Latest Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#women-featured-products">Featured Products</a>
                </li>
            </ul>
        </div>
        <div class="wrapper-content">
            <div class="outer-area-tab">
                <div class="tab-content">
                    <div class="tab-pane active show fade" id="women-latest-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach ($produits as $produit)
                                    @if ($produit->produit_genre == 'femme')
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{ url('shop/'.$produit->produit_genre.'/'.$produit->category->categorie_nom.'/'.$produit->id) }}">
                                                <img class="img-fluid" src="{{ asset('storage/'.$produit->produit_image) }}" alt="{{ $produit->produit_nom }}">
                                            </a>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li class="has-separator">
                                                        <a href="shop-v1-root-category.html">{{ $produit->produit_genre }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-v3-sub-sub-category.html">{{ $produit->category->categorie_nom }}</a>
                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="{{ url('shop/'.$produit->produit_genre.'/'.$produit->category->categorie_nom.'/'.$produit->id) }}">{{ $produit->produit_nom }}</a>
                                                </h6>
                                            </div>
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    ${{ $produit->produit_prix - ($produit->produit_prix * ($produit->promotion->promotion_nom/100)) }}
                                                </div>
                                                <div class="item-old-price">
                                                    ${{ $produit->produit_prix }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tag new">
                                            <span>{{ $produit->promotion->promotion_nom }}%</span>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                <div class="tab-pane fade" id="women-featured-products">
                    <div class="slider-fouc">
                        <div class="products-slider owl-carousel" data-item="4">
                            @foreach ($produits as $produit)
                                @if ($produit->produit_genre == 'femme' && $produit->feature == 1)
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{ url('shop/'.$produit->produit_genre.'/'.$produit->category->categorie_nom.'/'.$produit->id) }}">
                                                <img class="img-fluid" src="{{ asset('storage/'.$produit->produit_image) }}" alt="{{ $produit->produit_nom }}">
                                            </a>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li class="has-separator">
                                                        <a href="shop-v1-root-category.html">{{ $produit->produit_genre }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-v3-sub-sub-category.html">{{ $produit->category->categorie_nom }}</a>
                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="{{ url('shop/'.$produit->produit_genre.'/'.$produit->category->categorie_nom.'/'.$produit->id) }}">{{ $produit->produit_nom }}</a>
                                                </h6>
                                            </div>
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    ${{ $produit->produit_prix - ($produit->produit_prix * ($produit->promotion->promotion_nom/100)) }}
                                                </div>
                                                <div class="item-old-price">
                                                    ${{ $produit->produit_prix }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tag new">
                                            <span>{{ $produit->promotion->promotion_nom }}%</span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-maker">
    <div class="container">
        <div class="sec-maker-header text-center">
            <h3 class="sec-maker-h3">KID'S CLOTHING</h3>
            <ul class="nav tab-nav-style-1-a justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#kids-latest-products">Latest Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kids-featured-products">Featured Products</a>
                </li>
            </ul>
        </div>
        <div class="wrapper-content">
            <div class="outer-area-tab">
                <div class="tab-content">
                    <div class="tab-pane active show fade" id="kids-latest-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach ($produits as $produit)
                                    @if ($produit->produit_genre == 'enfant')
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{ url('shop/'.$produit->produit_genre.'/'.$produit->category->categorie_nom.'/'.$produit->id) }}">
                                                <img class="img-fluid" src="{{ asset('storage/'.$produit->produit_image) }}" alt="{{ $produit->produit_nom }}">
                                            </a>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li class="has-separator">
                                                        <a href="shop-v1-root-category.html">{{ $produit->produit_genre }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-v3-sub-sub-category.html">{{ $produit->category->categorie_nom }}</a>
                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="{{ url('shop/'.$produit->produit_genre.'/'.$produit->category->categorie_nom.'/'.$produit->id) }}">{{ $produit->produit_nom }}</a>
                                                </h6>
                                            </div>
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    ${{ $produit->produit_prix - ($produit->produit_prix * ($produit->promotion->promotion_nom/100)) }}
                                                </div>
                                                <div class="item-old-price">
                                                    ${{ $produit->produit_prix }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tag new">
                                            <span>{{ $produit->promotion->promotion_nom }}%</span>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                <div class="tab-pane fade" id="kids-featured-products">
                    <div class="slider-fouc">
                        <div class="products-slider owl-carousel" data-item="4">
                            @foreach ($produits as $produit)
                                    @if ($produit->produit_genre == 'enfant' && $produit->feature == 1)
                                        <div class="item">
                                            <div class="image-container">
                                                <a class="item-img-wrapper-link" href="{{ url('shop/'.$produit->produit_genre.'/'.$produit->category->categorie_nom.'/'.$produit->id) }}">
                                                    <img class="img-fluid" src="{{ asset('storage/'.$produit->produit_image) }}" alt="{{ $produit->produit_nom }}">
                                                </a>
                                            </div>
                                            <div class="item-content">
                                                <div class="what-product-is">
                                                    <ul class="bread-crumb">
                                                        <li class="has-separator">
                                                            <a href="shop-v1-root-category.html">{{ $produit->produit_genre }}</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-v3-sub-sub-category.html">{{ $produit->category->categorie_nom }}</a>
                                                        </li>
                                                    </ul>
                                                    <h6 class="item-title">
                                                        <a href="{{ url('shop/'.$produit->produit_genre.'/'.$produit->category->categorie_nom.'/'.$produit->id) }}">{{ $produit->produit_nom }}</a>
                                                    </h6>
                                                </div>
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        ${{ $produit->produit_prix - ($produit->produit_prix * ($produit->promotion->promotion_nom/100)) }}
                                                    </div>
                                                    <div class="item-old-price">
                                                        ${{ $produit->produit_prix }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tag new">
                                                <span>{{ $produit->promotion->promotion_nom }}%</span>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Site-Priorities -->
<section class="app-priority">
    <div class="container">
        <div class="priority-wrapper u-s-p-b-80">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-md-star"></i>
                        </div>
                        <h2>
                            Great Value
                        </h2>
                        <p>We offer competitive prices on our 100 million plus product range</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-md-cash"></i>
                        </div>
                        <h2>
                            Shop with Confidence
                        </h2>
                        <p>Our Protection covers your purchase from click to delivery</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-ios-card"></i>
                        </div>
                        <h2>
                            Safe Payment
                        </h2>
                        <p>Pay with the world’s most popular and secure payment methods</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-md-contacts"></i>
                        </div>
                        <h2>
                            24/7 Help Center
                        </h2>
                        <p>Round-the-clock assistance for a smooth shopping experience</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Site-Priorities /- -->

@endsection