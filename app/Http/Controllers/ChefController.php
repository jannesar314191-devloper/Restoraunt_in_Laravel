<?php

namespace App\Http\Controllers;

use App\Models\chef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChefController extends Controller
{
    public function allchef(){
        $chef=chef::all();
        return view('admin.chefs.allchefs')
        ->with('chefs',$chef);
    }
    public function createchef(){
        return view('admin.chefs.createchef');
    }
    public function storechef(Request $request){
   
        $chef=new chef();
        $chef->name=$request->name;
        $chef->speciality=$request->speciality;
        $newimagename='';
        if($request->has('image')){
      $image=$request->image;
      $newimagename=time().$image->getClientOriginalExtension();
      $image->move('chefimage',$newimagename);
      $chef->image=$newimagename;

        }

        $chef->save();
        Session::flash('status','chef saved');
        return redirect('allchef');
    }
    public function deletechef($id){
        $user = chef::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('allchef')->with('success', 'user deleted successfully');
        } else {
            return redirect()->route('allchef')->with('error', 'Category not found');
        }
    
}
public function editechef($id){
$chef=chef::find($id);
return view('admin.chefs.editechef')
->with('chef',$chef);
}
public function chefupdate(Request $request,$id){
    
    $chef =chef::find($id);
    $chef->name=$request->name;
    $chef->speciality=$request->speciality;
    $newimagename='';
    if($request->has('image')){

        $image=$request->image;
        $newimagename=time().$image->getClientOriginalExtension();
        $image->move('chefimage',$newimagename);
        $chef->image=$newimagename;
    }
    $chef->save();
    Session::flash('status','chef update');
    return redirect('allchef');
}
}
