<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Categorie;
use App\Models\Carte;
use App\Models\Produit;
use App\Models\Promotion;
use Illuminate\Support\Facades\Auth;

class ShopsidebareComposer
{
    public function compose(View $view)
    {
        $categories = Categorie::all();
        $produits = Produit::all();
        $promotions = Promotion::all();
        $view->with('categories', $categories)->with('produits',$produits)->with('promotions',$promotions);
    }

}