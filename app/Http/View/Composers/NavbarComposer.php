<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Categorie;
use App\Models\Carte;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;

class NavbarComposer
{
    public function compose(View $view)
    {
        $produits = Produit::all();
        $cartes = Carte::where('user_id',Auth::id())->get();
        $categories = Categorie::all();
        $view->with('categories', $categories)->with('cartes',$cartes)->with('produits',$produits);
    }

}