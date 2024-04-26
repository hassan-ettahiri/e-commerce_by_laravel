<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotion = Promotion::all();
        return view('admin.promotions.index',compact('promotion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $promotion = new Promotion();
        
        $promotion->promotion_nom = strip_tags($request->input('promotion_nom'));
        $promotion->status = $request->input('status') == TRUE ? "1" : "0";

        $promotion->save();
        return redirect('promotions')->with('succes','promotion added succesfully');
    }

    /**
     * Display the specified resource.
     */
    /*public function show(Promotion $promotion)
    {
        return view('admin.promotions.show',[
            'promotion' => Promotion::findOrFail($promotion)
        ]);
    }*/

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $promotion = Promotion::find($id);
        return view('admin.promotions.edit', compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $promotion = Promotion::find($id);
        
        $promotion->promotion_nom = strip_tags($request->input('promotion_nom'));
        $promotion->status = $request->input('status') == TRUE ? "1" : "0";

        $promotion->update();
        return redirect('/promotions')->with('succes','promotion edited succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $promotion = Promotion::find($id);
        $promotion->delete();
        return redirect('/promotions')->with('succes','promotion deleted succesfully');
    }
}
