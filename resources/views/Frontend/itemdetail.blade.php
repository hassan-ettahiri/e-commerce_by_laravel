@extends('welcome')

@section('titre',$item->produit_nom)

@section('content')
    <!-- Single-Product-Full-Width-Page -->
    <div class="page-detail u-s-p-t-80">
        <div class="container">
            <!-- Product-Detail -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <!-- Product-zoom-area -->
                    <div class="zoom-area">
                        <img id="zoom-pro" class="img-fluid" src="{{ asset('storage/'.$item->produit_image) }}" data-zoom-image="{{ asset('storage/'.$item->produit_image) }}g" alt="{{ $item->produit_nom }}">
                    </div>
                    <!-- Product-zoom-area /- -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <!-- Product-details -->
                    <div class="all-information-wrapper">
                        <div class="section-1-title-breadcrumb-rating">
                            <div class="product-title">
                                <h1>
                                    {{ $item->produit_nom }}
                                </h1>
                            </div>
                            <ul class="bread-crumb">
                                <li class="has-separator">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="has-separator">
                                    <a href="shop-v1-root-category.html">{{ $item->produit_genre }}</a>
                                </li>
                                <li class="is-marked">
                                    <a href="shop-v3-sub-sub-category.html">{{ $item->category->categorie_nom }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="section-2-short-description u-s-p-y-14">
                            <h6 class="information-heading u-s-m-b-8">Description:</h6>
                            <p>{{ $item->produit_mini_description }}
                            </p>
                        </div>
                        <div class="section-3-price-original-discount u-s-p-y-14">
                            <div class="price">
                                <h4>${{ $item->produit_prix - ($item->produit_prix * ($item->promotion->promotion_nom/100)) }}</h4>
                            </div>
                            <div class="original-price">
                                <span>Original Price:</span>
                                <span>${{ $item->produit_prix }}</span>
                            </div>
                            <div class="discount-price">
                                <span>Discount:</span>
                                <span>{{ $item->promotion->promotion_nom }}%</span>
                            </div>
                            <div class="total-save">
                                <span>Save:</span>
                                <span>${{ ($item->produit_prix * ($item->promotion->promotion_nom/100)) }}</span>
                            </div>
                        </div>
                        <div class="section-4-sku-information u-s-p-y-14">
                            <h6 class="information-heading u-s-m-b-8">Sku Information:</h6>
                            <div class="availability">
                                <span>Availability:</span>
                                @if ($item->produit_quantite == 0)
                                    <span class="btn btn-danger">out of stock</span>
                                @else
                                    <span>In Stock</span>
                                @endif
                                
                            </div>
                            <div class="left">
                                <span>Only:</span>
                                <span>{{ $item->produit_quantite }} left</span>
                            </div>
                        </div>
                        <div class="section-6-social-media-quantity-actions u-s-p-y-14">
                            <form action="{{ url('add-to-carte') }}" class="post-form" method="POST">
                            @csrf
                                <input type="hidden" name="prod_id" value="{{ $item->id }}">
                                <div class="quantity-wrapper u-s-m-b-22">
                                    <span>Quantity:</span>
                                    <div class="quantity">
                                        <input type="text" name='quantite' class="quantity-text-field" value="1">
                                        <a class="plus-a" data-max="{{ $item->produit_quantite }}">&#43;</a>
                                        <a class="minus-a" data-min="1">&#45;</a>
                                    </div>
                                </div>
                                <div>
                                    <button class="button button-outline-secondary" type="submit">Add to cart</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Product-details /- -->
                </div>
            </div>
            <!-- Product-Detail /- -->
            <!-- Detail-Tabs -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="detail-tabs-wrapper u-s-p-t-80">
                        <div class="detail-nav-wrapper u-s-m-b-30">
                            <ul class="nav single-product-nav justify-content-center">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#description">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#review">Reviews</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <!-- Description-Tab -->
                            <div class="tab-pane fade active show" id="description">
                                <div class="description-whole-container">
                                    <p class="desc-p u-s-m-b-26">{{ $item->produit_description }}
                                    </p>
                                </div>
                            </div>
                            <!-- Description-Tab /- -->
                            <!-- Reviews-Tab -->
                            <div class="tab-pane fade" id="review">
                                <div class="review-whole-container">
                                    <div class="row r-1 u-s-m-b-26 u-s-p-b-22">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="total-score-wrapper">
                                                <div style="display:none">
                                                    {{ $s5 = 0,$s4 = 0, $s3 = 0, $s2 = 0,$s1 = 0,$m_rating = 0, $total_review = 0 }}
                                                    @foreach ($reviews as $review)
                                                        @if($review->rating == 5)
                                                            {{ $s5++ }}
                                                        @endif
                                                        @if($review->rating == 4)
                                                            {{ $s4++ }}
                                                        @endif
                                                        @if($review->rating == 3)
                                                            {{ $s3++ }}
                                                        @endif
                                                        @if($review->rating == 2)
                                                            {{ $s2++ }}
                                                        @endif
                                                        @if($review->rating == 1)
                                                            {{ $s1++ }}
                                                        @endif
                                                        {{ $m_rating = ((5 * $s5)+(4 * $s4)+(3 * $s3)+(2 * $s2)+($s1))/($s1+$s2+$s3+$s4+$s5) }}
                                                        {{ $total_review = $s1+$s2+$s3+$s4+$s5 }}
                                                    @endforeach
                                                </div>
                                                <h6 class="review-h6">Average Rating</h6>
                                                <div class="circle-wrapper">
                                                    <h1>{{ $m_rating }}</h1>
                                                </div>
                                                <h6 class="review-h6">Based on {{ $total_review }} Reviews</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="total-star-meter">
                                                <div class="star-wrapper">
                                                    <span>5 Stars</span>
                                                    <div class="star">
                                                        <span style='inline'>
                                                            <svg fill="#000000" height="11px" width="11px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                                    viewBox="0 0 473.486 473.486" xml:space="preserve">
                                                            <polygon points="473.486,182.079 310.615,157.952 235.904,11.23 162.628,158.675 0,184.389 117.584,299.641 91.786,462.257 
                                                                237.732,386.042 384.416,460.829 357.032,298.473 "/>
                                                            </svg>
                                                            <svg fill="#000000" height="11px" width="11px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                                    viewBox="0 0 473.486 473.486" xml:space="preserve">
                                                            <polygon points="473.486,182.079 310.615,157.952 235.904,11.23 162.628,158.675 0,184.389 117.584,299.641 91.786,462.257 
                                                                237.732,386.042 384.416,460.829 357.032,298.473 "/>
                                                            </svg>
                                                            <svg fill="#000000" height="11px" width="11px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                                    viewBox="0 0 473.486 473.486" xml:space="preserve">
                                                            <polygon points="473.486,182.079 310.615,157.952 235.904,11.23 162.628,158.675 0,184.389 117.584,299.641 91.786,462.257 
                                                                237.732,386.042 384.416,460.829 357.032,298.473 "/>
                                                            </svg>
                                                            <svg fill="#000000" height="11px" width="11px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                                    viewBox="0 0 473.486 473.486" xml:space="preserve">
                                                            <polygon points="473.486,182.079 310.615,157.952 235.904,11.23 162.628,158.675 0,184.389 117.584,299.641 91.786,462.257 
                                                                237.732,386.042 384.416,460.829 357.032,298.473 "/>
                                                            </svg>
                                                            <svg fill="#000000" height="11px" width="11px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                                    viewBox="0 0 473.486 473.486" xml:space="preserve">
                                                            <polygon points="473.486,182.079 310.615,157.952 235.904,11.23 162.628,158.675 0,184.389 117.584,299.641 91.786,462.257 
                                                                237.732,386.042 384.416,460.829 357.032,298.473 "/>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <span>({{ $s5 }})</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>4 Stars</span>
                                                    <div class="star">
                                                        <span style='inline'>
                                                            <svg fill="#000000" height="11px" width="11px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                                    viewBox="0 0 473.486 473.486" xml:space="preserve">
                                                            <polygon points="473.486,182.079 310.615,157.952 235.904,11.23 162.628,158.675 0,184.389 117.584,299.641 91.786,462.257 
                                                                237.732,386.042 384.416,460.829 357.032,298.473 "/>
                                                            </svg>
                                                            <svg fill="#000000" height="11px" width="11px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                                    viewBox="0 0 473.486 473.486" xml:space="preserve">
                                                            <polygon points="473.486,182.079 310.615,157.952 235.904,11.23 162.628,158.675 0,184.389 117.584,299.641 91.786,462.257 
                                                                237.732,386.042 384.416,460.829 357.032,298.473 "/>
                                                            </svg>
                                                            <svg fill="#000000" height="11px" width="11px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                                    viewBox="0 0 473.486 473.486" xml:space="preserve">
                                                            <polygon points="473.486,182.079 310.615,157.952 235.904,11.23 162.628,158.675 0,184.389 117.584,299.641 91.786,462.257 
                                                                237.732,386.042 384.416,460.829 357.032,298.473 "/>
                                                            </svg>
                                                            <svg fill="#000000" height="11px" width="11px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                                    viewBox="0 0 473.486 473.486" xml:space="preserve">
                                                            <polygon points="473.486,182.079 310.615,157.952 235.904,11.23 162.628,158.675 0,184.389 117.584,299.641 91.786,462.257 
                                                                237.732,386.042 384.416,460.829 357.032,298.473 "/>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <span>({{ $s4 }})</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>3 Stars</span>
                                                    <div class="star">
                                                        <span style='inline'>
                                                            <svg fill="#000000" height="11px" width="11px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                                    viewBox="0 0 473.486 473.486" xml:space="preserve">
                                                            <polygon points="473.486,182.079 310.615,157.952 235.904,11.23 162.628,158.675 0,184.389 117.584,299.641 91.786,462.257 
                                                                237.732,386.042 384.416,460.829 357.032,298.473 "/>
                                                            </svg>
                                                            <svg fill="#000000" height="11px" width="11px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                                    viewBox="0 0 473.486 473.486" xml:space="preserve">
                                                            <polygon points="473.486,182.079 310.615,157.952 235.904,11.23 162.628,158.675 0,184.389 117.584,299.641 91.786,462.257 
                                                                237.732,386.042 384.416,460.829 357.032,298.473 "/>
                                                            </svg>
                                                            <svg fill="#000000" height="11px" width="11px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                                    viewBox="0 0 473.486 473.486" xml:space="preserve">
                                                            <polygon points="473.486,182.079 310.615,157.952 235.904,11.23 162.628,158.675 0,184.389 117.584,299.641 91.786,462.257 
                                                                237.732,386.042 384.416,460.829 357.032,298.473 "/>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <span>({{ $s3 }})</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>2 Stars</span>
                                                    <div class="star">
                                                        <span style='inline'>
                                                            <svg fill="#000000" height="11px" width="11px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                                    viewBox="0 0 473.486 473.486" xml:space="preserve">
                                                            <polygon points="473.486,182.079 310.615,157.952 235.904,11.23 162.628,158.675 0,184.389 117.584,299.641 91.786,462.257 
                                                                237.732,386.042 384.416,460.829 357.032,298.473 "/>
                                                            </svg>
                                                            <svg fill="#000000" height="11px" width="11px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                                    viewBox="0 0 473.486 473.486" xml:space="preserve">
                                                            <polygon points="473.486,182.079 310.615,157.952 235.904,11.23 162.628,158.675 0,184.389 117.584,299.641 91.786,462.257 
                                                                237.732,386.042 384.416,460.829 357.032,298.473 "/>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <span>({{ $s2 }})</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>1 Star</span>
                                                    <div class="star">
                                                        <span style='inline'>
                                                            <svg fill="#000000" height="11px" width="11px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                                    viewBox="0 0 473.486 473.486" xml:space="preserve">
                                                            <polygon points="473.486,182.079 310.615,157.952 235.904,11.23 162.628,158.675 0,184.389 117.584,299.641 91.786,462.257 
                                                                237.732,386.042 384.416,460.829 357.032,298.473 "/>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <span>({{ $s1 }})</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row r-2 u-s-m-b-26 u-s-p-b-22">
                                        <form action="{{ url('review') }}" method="POST">
                                            @csrf
                                            <div class="col-lg-12">
                                                <div class="your-rating-wrapper">
                                                    <h4 class="review-h4">Your Review is matter.</h4>
                                                    <label for="review-text-area">Rating
                                                        <span class="astk"> *</span>
                                                    </label>
                                                    <br>
                                                    <div class="rate" style="font-size: 250px">
                                                        <input type="radio" id="star5" name="rating" value="5" />
                                                        <label for="star5" title="text">5 stars</label>
                                                        <input type="radio" id="star4" name="rating" value="4" />
                                                        <label for="star4" title="text">4 stars</label>
                                                        <input type="radio" id="star3" name="rating" value="3" />
                                                        <label for="star3" title="text">3 stars</label>
                                                        <input type="radio" id="star2" name="rating" value="2" />
                                                        <label for="star2" title="text">2 stars</label>
                                                        <input type="radio" id="star1" name="rating" value="1" />
                                                        <label for="star1" title="text">1 star</label>
                                                    </div>
                                                    <br>
                                                    <label for="review-text-area">comment
                                                        <span class="astk"> *</span>
                                                    </label>
                                                    <textarea class="text-area u-s-m-b-8" name="comment"  id="review-text-area" placeholder="Review"></textarea>
                                                    <input type="hidden" name="prod_id" value="{{ $item->id }}">
                                                    <button class="button button-outline-secondary" type="submit">Submit Review</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- Get-Reviews -->
                                    <div class="get-reviews u-s-p-b-22">
                                        <!-- Review-Options -->
                                        <div class="review-options u-s-m-b-16">
                                            <div class="review-option-heading">
                                                <h6>Reviews
                                                    <span> (15) </span>
                                                </h6>
                                            </div>
                                        </div>
                                        <!-- Review-Options /- -->
                                        <!-- All-Reviews -->
                                        
                                        <div class="reviewers">
                                            @foreach ($reviews as $review)
                                                <div class="review-data">
                                                    <div class="row">
                                                        <div class="reviewer-name-and-date col-lg-4 mt-2">
                                                            <h6 class="reviewer-name">{{ Auth::user()->name.' '.Auth::user()->lname }}</h6>
                                                            <h6 class="review-posted-date"> review date :  {{ date('d/m/y',strtotime($review->created_at)) }}</h6>
                                                        </div>
                                                        <div class="reviewer-stars-title-body col-lg-4">
                                                            <div class="reviewer-stars">
                                                                <div>
                                                                    @if($review->rating == 5)
                                                                        <img src="{{ asset("frontend/images/5.jpg") }}" width="155px" alt="5">
                                                                    @endif
                                                                    @if($review->rating == 4)
                                                                        <img src="{{ asset("frontend/images/4.jpg") }}" width="155px" alt="4">
                                                                    @endif
                                                                    @if($review->rating == 3)
                                                                        <img src="{{ asset("frontend/images/3.jpg") }}" width="155px" alt="3">
                                                                    @endif
                                                                    @if($review->rating == 2)
                                                                        <img src="{{ asset("frontend/images/2.jpg") }}" width="155px" alt="2">
                                                                    @endif
                                                                    @if($review->rating == 1)
                                                                        <img src="{{ asset("frontend/images/1.jpg") }}" width="155px" alt="1">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <strong>comment:</strong>
                                                            <p class="review-body">
                                                                {{ $review->comment }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- All-Reviews /- -->
                                        {{-- <!-- Pagination-Review -->
                                        <div class="pagination-review-area">
                                            <div class="pagination-review-number">
                                                <ul>
                                                    <li style="display: none">
                                                        <a href="single-product.html" title="Previous">
                                                            <i class="fas fa-angle-left"></i>
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="single-product.html">1</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product.html">2</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product.html">3</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product.html">...</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product.html">10</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product.html" title="Next">
                                                            <i class="fas fa-angle-right"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Pagination-Review /- --> --}}
                                    </div>
                                    <!-- Get-Reviews /- -->
                                </div>
                            </div>
                            <!-- Reviews-Tab /- -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Detail-Tabs /- -->
            <!-- Different-Product-Section -->
            <div class="detail-different-product-section u-s-p-t-80">
                <!-- Similar-Products -->
                <section class="section-maker">
                    <div class="container">
                        <div class="sec-maker-header text-center">
                            <h3 class="sec-maker-h3">Similar Products</h3>
                        </div>
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach ($produits as $produit)
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
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Similar-Products /- -->
            </div>
            <!-- Different-Product-Section /- -->
        </div>
    </div>
    <!-- Single-Product-Full-Width-Page /- -->
@endsection