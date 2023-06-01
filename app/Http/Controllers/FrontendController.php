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
        $produits = Produit::OrderBy('id','desc')->get();
        $orders = Order::OrderBy('id','desc')->get();
        $users = User::OrderBy('id','desc')->get();
        $categories = Categorie::OrderBy('id','desc')->get();
        $promotions = Promotion::OrderBy('id','desc')->get();
        return view('admin.dashboard.index',compact('produits','orders','users','categories','promotions'));
    } 

    public function orders(){
        $orders = Order::where('status','0')->OrderBy('id','desc')->get();
        return view('admin.orders.index',compact('orders'));
    }

    public function orderdetail($id){
        $order = Order::where('id',$id)->first();
        return view('admin.orders.orderdetail',compact('order'));
    }

    public function updatestatus(Request $request,$id){
        $order = Order::find($id);
        $order->status = $request->input('order_status');
        $order->update();
        return redirect('orders')->with('status','order Updated successfully');
    }

    public function ordercompleted(){
        $orders = Order::where('status','1')->OrderBy('id','desc')->get();
        return view('admin.orders.ordercompleted',compact('orders'));
    }

    public function users(){
        $users = User::OrderBy('id','desc')->get();
        return view('admin.users.index',compact('users'));
    }

    public function usersdetail($id){
        $user = User::find($id);
        return view('admin.users.userdetail',compact('user'));
    }
}
