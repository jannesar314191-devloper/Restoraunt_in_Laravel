<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\chef;
use App\Models\foods;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\FuncCall;



class cartcontroller extends Controller
{
    public function storecard(Request $request,$id){

        if(Auth::id()){
    $user_id=Auth::id();
    $food_id=$id;
    $quantity=$request->quantity;

    $cart=new cart();
    $cart->user_id=$user_id;
    $cart->food_id=$food_id;
    $cart->quantity=$quantity;
    $cart->save();
    Session::flash('status','the reservation add to card');
    return redirect()->back();

        }
        else{
 return redirect('/login');
        }
    }


    public function showcart(){
        $count=cart::where('user_id',Auth::id())->count();
        $cart=cart::where('user_id',Auth::id())->join('foods','carts.food_id','=','foods.id')->get();

        return view('home.showcart')
        ->with('foods',foods::all())
   ->with('chefs',chef::all())
   ->with('count',$count)
   ->with('carts',$cart);
    }


    public function deletecart($id){
        $user = cart::find($id);
         dd($user);
    
     } 
    

     public function confirmorder(Request $request){
        $user_id=Auth::id();
        $carts=cart::where('user_id',$user_id)->get();
        foreach($carts as $cart){
            $order=new order();
            $order->name=$request->name;
            $order->phone=$request->phone;
            $order->address=$request->address;
            $order->food_id=$cart->food_id;
            $order->user_id=$user_id;
            $order->quantity=$cart->quantity;
            $order->save();
            $delete_cart=cart::where('user_id',$user_id);
            $delete_cart->delete();

        }
        return redirect()->back();

     }

     public function allorder(){
        $order=order::join('foods','orders.food_id','=','foods.id')->get();
        return view('admin.order.allorder')
        ->with('orders',$order);
     }


    }

