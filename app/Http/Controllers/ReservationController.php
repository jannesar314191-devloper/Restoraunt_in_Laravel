<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{
    public function reservations(Request $request){
     $reservation=new reservation();
     $reservation->name=$request->name;
     $reservation->email=$request->email;
     $reservation->message=$request->message;
     $reservation->phone=$request->phone;
     $reservation->guest=$request->guest;
     $reservation->date=$request->date;
     $reservation->time=$request->time;
     $reservation->save();
     Session::flash('status','reservation saved');
     return redirect()->route('index');   
    }


    public function allreservation(){
        $reservation=reservation::all();
        return view('admin.reservation.allreservation')
        ->with('reservations',$reservation);
    }

    public function deletereservation($id){
        $user = reservation::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('allreservation')->with('success', 'user deleted successfully');
        } else {
            return redirect()->route('allreservation')->with('error', 'Category not found');
        }
    }
}
