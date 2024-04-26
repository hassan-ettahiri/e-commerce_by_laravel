<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carte;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;

class CarteController extends Controller
{
    public function addproduit(Request $request){
        $prod_id = $request->input('prod_id');
        $prod_qty = $request->input('quantite');
        $produit = Produit::where('id', $prod_id)->first();

        $carte = new Carte();
        $carte->user_id = Auth::id();
        $carte->prod_id = $prod_id;
        $carte->prod_qty = $prod_qty;
        $carte->save();
        return redirect()->route('shop', ['genre' => $produit->produit_genre ,'categorie' =>$produit->category->categorie_nom , 'id' => $prod_id])->with('succes','produit added succesfully');
    }
}
