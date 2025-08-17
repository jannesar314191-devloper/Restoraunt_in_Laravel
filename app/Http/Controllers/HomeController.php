<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\chef;
use App\Models\foods;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    public function index(){
        $count=cart::where('user_id',Auth::id())->count();
        return view('home.home')
        ->with('chefs',chef::all())
        ->with('foods',foods::all())

        ->with('count',$count);
    }
    public function redirect(){
       $user_type=Auth::user()->user_type;
       if($user_type=='1'){
          return view('admin.moster');
       }
       else{


   $count=cart::where('user_id',Auth::id())->count();
   return view('home.home')
 
   ->with('foods',foods::all())
   ->with('chefs',chef::all())
   ->with('count',$count);
       }
    }
}
