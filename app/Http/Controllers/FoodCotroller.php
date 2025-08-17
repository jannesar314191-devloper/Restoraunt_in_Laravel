<?php

namespace App\Http\Controllers;

use App\Models\foods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FoodCotroller extends Controller
{
    public function allfood(){
        return view('admin.food.allfood')
        ->with('foods',foods::all());
    }
    public function createfood(){
        return view('admin.food.createfood');
    }
    public function storefood(Request $request){
      
     $food=new foods();

      $food->tital=$request->tital;
      $food->description=$request->description;
      $food->Price=$request->price;
      $newimagename=' ';
      if($request->has('image')){
     $image=$request->image;
     $newimagename=time().$image->getClientOriginalExtension();
     $image->move('upload',$newimagename);
     $food->image=$newimagename;
      }
      $food->save();
      Session::flash('status','food saved');
      return redirect('allfood');
    }
    public function editefood($id){
 $food=foods::find($id);
return view('admin.food.editefood')
->with('food',$food);
    }


    public function deletefood($id){
       $user = foods::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('allfood')->with('status', 'user deleted successfully');
        } else {
            return redirect()->route('allfood')->with('error', 'Category not found');
        }
    } 

    public function updatefood(Request $request ,$id){
$food=foods::find($id);
$food->tital=$request->tital;
$food->description=$request->description;
$food->price=$request->price;
$newimagename='';
if($request->has('image')){
$image=$request->image;
$newimagename=time().$image->getClientOriginalExtension();
$image->move('upload',$newimagename);
$food->image=$newimagename;
}
$food->save();
Session::flash('status','food update');
return redirect('allfood');    
}

}
