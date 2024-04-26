@extends('Frontend.shop')

@section('section')
<div class="col-lg-9 col-md-9 col-sm-12">
    <!-- Row-of-Product-Container -->
    <div class="row product-container grid-style">
        @foreach ($produits as $produit)
            <div class="product-item col-lg-4 col-md-6 col-sm-6">
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
                                    <a href="{{ url('shop/'.$produit->produit_genre) }}">{{ $produit->produit_genre }}</a>
                                </li>
                                <li>
                                    <a href="{{ url('shop/'.$produit->produit_genre.'/'.$produit->category->categorie_nom) }}">{{ $produit->category->categorie_nom }}</a>
                                </li>
                            </ul>
                            <h6 class="item-title">
                                <a href="{{ url('shop/'.$produit->produit_genre.'/'.$produit->category->categorie_nom.'/'.$produit->id) }}">{{ $produit->produit_nom }}</a>
                            </h6>
                            <div class="item-description">
                                <p>{{ $produit->produit_mini_description }}</p>
                            </div>
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
                </div>
            </div>
        @endforeach
    </div>
    <!-- Row-of-Product-Container /- -->
</div>
<!-- Shop-Right-Wrapper /- -->
<!-- Shop-Pagination -->
{{-- <div class="pagination-area">
    <div class="pagination-number">
        <ul>
            <li style="display: none">
                <a href="shop-v1-root-category.html" title="Previous">
                    <i class="fa fa-angle-left"></i>
                </a>
            </li>
            <li class="active">
                <a href="shop-v1-root-category.html">1</a>
            </li>
            <li>
                <a href="shop-v1-root-category.html">2</a>
            </li>
            <li>
                <a href="shop-v1-root-category.html">3</a>
            </li>
            <li>
                <a href="shop-v1-root-category.html">...</a>
            </li>
            <li>
                <a href="shop-v1-root-category.html">10</a>
            </li>
            <li>
                <a href="shop-v1-root-category.html" title="Next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        </ul>
    </div>
</div> --}}
<!-- Shop-Pagination /- -->
@endsection