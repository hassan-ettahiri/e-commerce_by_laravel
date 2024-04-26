<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($genre)
    {
        $produits = Produit::where('produit_genre', $genre)->take(15)->get();
        return view('Frontend.index',compact('produits'));
    }
    public function itemdetail($genre,$id){
        $item = Produit::all()->where('id', $id)->first();
        $produits = Produit::where('cate_id',$item->cate_id)->where('produit_genre',$genre)->where('id','!=',$id)->take(4)->get();
        return view('Frontend.itemdetail',compact('item','produits'));
    }
    public function carte(){
        return view('Frontend.carte');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
