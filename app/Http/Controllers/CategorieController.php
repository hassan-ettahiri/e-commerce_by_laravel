<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Http\Requests\StorecategorieRequest;
use App\Http\Requests\UpdatecategorieRequest;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorie = Categorie::all();
        return view('admin.categories.index',compact('categorie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecategorieRequest $request)
    {
        $categorie = new Categorie();
        
        $categorie->categorie_nom = strip_tags($request->input('categorie_nom'));
        $categorie->status = $request->input('status') == TRUE ? "1" : "0";

        $categorie->save();
        return redirect('categories')->with('succes','category added succesfully');
    }

    /**
     * Display the specified resource.
     */
    /*public function show(Categorie $categorie)
    {
        return view('admin.categories.show',[
            'categorie' => Categorie::findOrFail($categorie)
        ]);
    }*/

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categorie = Categorie::find($id);
        return view('admin.categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecategorieRequest $request, $id)
    {
        $categorie = Categorie::find($id);

        $categorie->categorie_nom = strip_tags($request->input('categorie_nom'));
        $categorie->status = $request->input('status') == TRUE ? "1" : "0";

        $categorie->update();
        return redirect('/categories')->with('succes','Category edited succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();
        return redirect('/categories')->with('succes','category deleted succesfully');
    }
}
