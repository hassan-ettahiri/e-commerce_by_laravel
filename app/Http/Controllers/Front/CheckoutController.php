<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Carte;
use App\Models\User;
use App\Models\Produit;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        $cartes = Carte::where('user_id',Auth::id())->get();
        return view('Frontend.checkout',compact('cartes'));
    }

    public function addorder(Request $request){
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = strip_tags($request->input('fname'));
        $order->lname = strip_tags($request->input('lname'));
        $order->company = strip_tags($request->input('company'));
        $order->address = strip_tags($request->input('address'));
        $order->apartment = strip_tags($request->input('apartment'));
        $order->zip = strip_tags($request->input('zip'));
        $order->city = strip_tags($request->input('city'));
        $order->state = strip_tags($request->input('state'));
        $order->country = strip_tags($request->input('country'));
        $order->phone = strip_tags($request->input('phone'));
        $order->total_price = $request->input('total_price');
        $order->tracking_no = 'SHOPINO'.rand(1111,9999);
        $order->message = 'Cash on Delivery';

        $order->save();

        $order->id;

        $cartes = Carte::where('user_id',Auth::id())->get();
        foreach($cartes as $carte){
            $orderitem = new OrderItem();
            $orderitem->order_id = $order->id;
            $orderitem->prod_id = $carte->prod_id;
            $orderitem->qty = $carte->prod_qty;
            $orderitem->price = ($carte->produits->produit_prix - ($carte->produits->produit_prix * ($carte->produits->promotion->promotion_nom/100)));

            $orderitem->save();

            $prod = Produit::where('id',$carte->prod_id)->first();
            $prod->produit_quantite -= $carte->prod_qty;
            $prod->update();
        }

        if(Auth::user()->address == NULL)
        {
            $user = User::where('id',Auth::id())->first();
            $user->name = strip_tags($request->input('fname'));
            $user->lname = strip_tags($request->input('lname'));
            $user->company = strip_tags($request->input('company'));
            $user->address = strip_tags($request->input('address'));
            $user->apartment = strip_tags($request->input('apartment'));
            $user->zip = strip_tags($request->input('zip'));
            $user->city = strip_tags($request->input('city'));
            $user->state = strip_tags($request->input('state'));
            $user->country = strip_tags($request->input('country'));
            $user->phone = strip_tags($request->input('phone'));

            $user->update();
        }

        $cartes = Carte::where('user_id',Auth::id())->get();
        Carte::destroy($cartes);

        return redirect('/');
    }

    public function adddata(Request $request){
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = strip_tags($request->input('fname'));
        $order->lname = strip_tags($request->input('lname'));
        $order->company = strip_tags($request->input('company'));
        $order->address = strip_tags($request->input('address'));
        $order->apartment = strip_tags($request->input('apartment'));
        $order->zip = strip_tags($request->input('zip'));
        $order->city = strip_tags($request->input('city'));
        $order->state = strip_tags($request->input('state'));
        $order->country = strip_tags($request->input('country'));
        $order->phone = strip_tags($request->input('phone'));
        $order->total_price = $request->input('total_price');
        $order->tracking_no = 'SHOPINO'.rand(1111,9999);
        $order->message = 'Credit Card';

        $order->save();

        $order->id;

        $cartes = Carte::where('user_id',Auth::id())->get();
        foreach($cartes as $carte){
            $orderitem = new OrderItem();
            $orderitem->order_id = $order->id;
            $orderitem->prod_id = $carte->prod_id;
            $orderitem->qty = $carte->prod_qty;
            $orderitem->price = ($carte->produits->produit_prix - ($carte->produits->produit_prix * ($carte->produits->promotion->promotion_nom/100)));

            $orderitem->save();

            $prod = Produit::where('id',$carte->prod_id)->first();
            $prod->produit_quantite -= $carte->prod_qty;
            $prod->update();
        }

        if(Auth::user()->address == NULL)
        {
            $user = User::where('id',Auth::id())->first();
            $user->name = strip_tags($request->input('fname'));
            $user->lname = strip_tags($request->input('lname'));
            $user->company = strip_tags($request->input('company'));
            $user->address = strip_tags($request->input('address'));
            $user->apartment = strip_tags($request->input('apartment'));
            $user->zip = strip_tags($request->input('zip'));
            $user->city = strip_tags($request->input('city'));
            $user->state = strip_tags($request->input('state'));
            $user->country = strip_tags($request->input('country'));
            $user->phone = strip_tags($request->input('phone'));

            $user->update();
        }
        return redirect()->route('credit-carte',['id'=> $order->id]);
    }

    public function creditcartedata($id){
        $order = Order::find($id);
        return view('Frontend.creditcard',compact('order'));
    }

    public function updateorder(Request $request,$id){
        $order = Order::find($id);

        $order->cardholder = strip_tags($request->input('cardholder'));
        $order->card_number = strip_tags($request->input('card_number'));
        $order->card_type = strip_tags($request->input('card_type'));
        $order->date_exp = strip_tags($request->input('date_exp'));
        $order->cvv = strip_tags($request->input('cvv'));

        $order->update();

        $cartes = Carte::where('user_id',Auth::id())->get();
        Carte::destroy($cartes);

        return redirect('/');
    }

    public function addreview(Request $request){
        $review = new Review();

        $review->rating = strip_tags($request->input('rating'));
        $review->comment = strip_tags($request->input('comment'));
        $review->prod_id = $request->input('prod_id');
        
        $review->save();

        $id = $request->input('prod_id');
        $produit = Produit::where('id',$id)->first();

        return redirect()->route('shop', ['genre' => $produit->produit_genre ,'categorie' =>$produit->category->categorie_nom , 'id' => $id])->with('succes','produit added succesfully');
    }
}
