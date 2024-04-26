<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Produit;
use App\Models\Promotion;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        $produits = Produit::all();
        $orders = Order::all();
        $users = User::all();
        $categories = Categorie::all();
        $promotions = Promotion::all();
        return view('admin.dashboard.index',compact('produits','orders','users','categories','promotions'));
    } 

    public function orders(){
        $orders = Order::where('status','0')->get();
        return view('admin.orders.index',compact('orders'));
    }

    public function orderdetail($id){
        $order = Order::where('id',$id)->where('user_id',Auth::id())->first();
        return view('admin.orders.orderdetail',compact('order'));
    }

    public function updatestatus(Request $request,$id){
        $order = Order::find($id);
        $order->status = $request->input('order_status');
        $order->update();
        return redirect('orders')->with('status','order Updated successfully');
    }

    public function ordercompleted(){
        $orders = Order::where('status','1')->get();
        return view('admin.orders.ordercompleted',compact('orders'));
    }

    public function users(){
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    public function usersdetail($id){
        $user = User::find($id);
        return view('admin.users.userdetail',compact('user'));
    }
}
