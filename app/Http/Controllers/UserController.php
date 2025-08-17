<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function showuser(){
        $user=User::all();
        return view('admin.user.showuser')
        ->with('users',$user);
    }
    public function createuser(){
        return view('admin.user.createuser');
    }
    public function storeuser(Request $request){
   $user=new User();
  $user->name=$request->name;
  $user->email=$request->email;
  $user->picture=$request->image;
  $user->address=$request->address;
  $user->phone=$request->phone;
  $user->password=Hash::make($request->password);
  $user->save();
 
  Session::flash('status','user saved');

  return redirect('showuser');
    }


    public function deleteuser($id){
        $user = user::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('showuser')->with('success', 'user deleted successfully');
        } else {
            return redirect()->route('showuser')->with('error', 'Category not found');
        }
    }



  
   
}
