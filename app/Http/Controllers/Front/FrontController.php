<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\Carte;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index(){
        $produits = Produit::all();
        return view('Frontend.index',compact('produits'));
    }

    public function itemdetail($genre = null,$categorie = null,$id = null){
        if(isset($genre)){
            if(isset($categorie)){
                if(isset($id)){
                    $reviews = Review::where('prod_id',$id)->get();
                    $item = Produit::all()->where('id', $id)->first();
                    $produits = Produit::where('cate_id',$item->cate_id)->where('produit_genre',$genre)->where('id','!=',$id)->take(4)->get();
                    return view('Frontend.itemdetail',compact('item','produits','reviews'));
                }
                $category = Categorie::where('categorie_nom',$categorie)->first();
                $produits = Produit::where('cate_id',$category->id)->where('produit_genre',$genre)->get();
                return view('Frontend.shop.shopbycategorie',compact('produits','genre'));
            }
            $produits = Produit::where('produit_genre',$genre)->get();
            return view('Frontend.shop.index',compact('produits','genre'));
        }
    }

    public function carte(){
        $carteitem = Carte::where('user_id',Auth::id())->get();
        return view('Frontend.carte',compact('carteitem'));
    }

    public function destroy($id){
        $carte = Carte::where('prod_id',$id)->where('user_id',Auth::id());
        $carte->delete();
        return redirect('/carte');
    }
}
