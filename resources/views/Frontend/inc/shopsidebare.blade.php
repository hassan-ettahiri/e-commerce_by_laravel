<!-- Shop-Left-Side-Bar-Wrapper -->
<div class="col-lg-3 col-md-3 col-sm-12">
    <!-- Fetch-Categories-from-Root-Category  -->
    <div class="fetch-categories">
        <h5 style="color: #DE0000">Browse Categories</h5>
        <ul>
            <li>
                <strong><a href="{{ url('shop/'.$genre) }}">+ all</a></strong>
            </li>
            @foreach ($categories as $categorie)
                <li>
                    <strong><a href="{{ url('shop/'.$genre.'/'.$categorie->categorie_nom) }}">+ {{ $categorie->categorie_nom }}</a></strong>
                </li>
            @endforeach
        </ul>
    </div>
    <!-- Fetch-Categories-from-Root-Category  /- -->
    <!-- Filter-Price -->
    <div class="facet-filter-by-price">
        <h5 style="color: #DE0000">Price</h5>
        <div style="display: none">
            {{ $max = 0, $min = 5000 }}
            @foreach ($produits as $produit)
                @if($produit->produit_genre == $genre )
                    @if($produit->produit_prix-($produit->produit_prix * ($produit->promotion->promotion_nom/100))>$max)
                        {{ $max = $produit->produit_prix-($produit->produit_prix * ($produit->promotion->promotion_nom/100)) }}
                    @endif
                    @if($produit->produit_prix-($produit->produit_prix * ($produit->promotion->promotion_nom/100))<$min)
                        {{ $min = $produit->produit_prix-($produit->produit_prix * ($produit->promotion->promotion_nom/100)) }}
                    @endif
                @endif
            @endforeach
        </div>
        <form class="facet-form" action="" method="post">
            <!-- Final-Result -->
            <div class="amount-result clearfix">
                <div class="price-from">${{ $min }}</div>
                <div class="price-to">${{ $max }}</div>
            </div>
            <!-- Final-Result /- -->
            <!-- Range-Slider  -->
            <div class="price-filter"></div>
            <!-- Range-Slider /- -->
            <!-- Range-Manipulator -->
            <div class="price-slider-range" data-min="{{ $min }}" data-max="{{ $max }}" data-default-low="{{ $min }}" data-default-high="{{ $max }}" data-currency="$"></div>
            <!-- Range-Manipulator /- -->
            <button type="submit" class="button button-primary">Filter</button>
        </form>
    </div>
    <!-- Filter-Price /-->
    <div class="fetch-categories">
        <h5 style="color: #DE0000">Promotion</h5>
        <ul>
            @foreach ($promotions as $promotion)
                <li>
                    <strong><a href="#">+ {{ $promotion->promotion_nom }}%</a></strong>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- Shop-Left-Side-Bar-Wrapper /- -->
