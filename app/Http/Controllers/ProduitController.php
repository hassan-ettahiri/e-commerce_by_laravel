<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Promotion;
use Illuminate\Support\Facades\Storage;


class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produit = Produit::all();
        return view('admin.produits.index',compact('produit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorie = Categorie::all();
        $promotion = Promotion::all();
        return view('admin.produits.create',compact(['categorie','promotion']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produit = new Produit();

        $produit->produit_nom = strip_tags($request->input('produit_nom'));
        $produit->cate_id = strip_tags($request->input('cate_id'));
        $produit->produit_prix = strip_tags($request->input('produit_prix'));
        $produit->prom_id = strip_tags($request->input('prom_id'));
        $produit->produit_quantite = strip_tags($request->input('produit_quantite'));
        $produit->status = $request->input('status') == TRUE ? "1" : "0";
        $produit->feature = $request->input('feature') == TRUE ? "1" : "0";
        $produit->produit_mini_description = strip_tags($request->input('produit_mini_description'));
        $produit->produit_description = strip_tags($request->input('produit_description'));
        
        if ($request->file('produit_image') == null) {
            $produit->produit_image = "";
        }else{
            $produit->produit_image = $request->file('produit_image')->store('images','public');
            $image = Image::make('storage/'.$produit->produit_image);
            $image->resize(400, 450);
            $image->save('storage/'.$produit->produit_image);
        }
        $produit->produit_genre = strip_tags($request->input('produit_genre'));
         

        $produit->save();

        return redirect('produits')->with('succes','produit added succesfully');
    }

    /**
     * Display the specified resource.
     */
    /*public function show(string $id)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categorie = Categorie::all();
        $promotion = Promotion::all();
        $produit = Produit::find($id);
        return view('admin.produits.edit',compact(['categorie','promotion','produit']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produit = Produit::find($id);

        $produit->produit_nom = strip_tags($request->input('produit_nom'));
        $produit->cate_id = strip_tags($request->input('cate_id'));
        $produit->produit_prix = strip_tags($request->input('produit_prix'));
        $produit->prom_id = strip_tags($request->input('prom_id'));
        $produit->produit_quantite = strip_tags($request->input('produit_quantite'));
        $produit->status = $request->input('status') == TRUE ? "1" : "0";
        $produit->feature = $request->input('feature') == TRUE ? "1" : "0";
        $produit->produit_mini_description = strip_tags($request->input('produit_mini_description'));
        $produit->produit_description = strip_tags($request->input('produit_description'));
        
        if($request->hasFile('produit_image')){
            $produit->produit_image = $request->file('produit_image')->store('images','public');
            $image = Image::make('storage/'.$produit->produit_image);
            $image->resize(400, 450);
            $image->save('storage/'.$produit->produit_image);
        }
        $produit->produit_genre = strip_tags($request->input('produit_genre'));
         

        $produit->update();

        return redirect('/produits')->with('succes','produit edited succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produit = Produit::find($id);
        if($produit->produit_image){
            Storage::delete($produit->produit_image);
        }
        $produit->delete();
        return redirect('/produits')->with('succes','produit deleted succesfully');
    }
}
