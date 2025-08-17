<?php

use App\Http\Controllers\cartcontroller;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\FoodCotroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Models\foods;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[HomeController::class,'index'])->name('index');

Route::get('/redirect',[HomeController::class,'redirect']);


//user

Route::get('/showuser',[UserController::class,'showuser'])->name('showuser');
Route::get('/createuser',[UserController::class,'createuser'])->name('createuser');
Route::post('/storeuser',[UserController::class,'storeuser'])->name('storeuser');
Route::delete('/deleteuser/{id}',[UserController::class,'deleteuser'])->name('deleteuser');
Route::get('editeuser/{id}',[UserController::class,'editeuser'])->name('editeuser');

//

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// foods
Route::get('allfood',[FoodCotroller::class,'allfood'])->name('allfood');
Route::get('createfood',[FoodCotroller::class,'createfood'])->name('createfood');
Route::post('storefood',[FoodCotroller::class,'storefood'])->name('storefood');
Route::get('/editefood/{id}',[FoodCotroller::class,'editefood'])->name('editefood');
Route::put('/updatefood/{id}',[FoodCotroller::class,'updatefood'])->name('updatefood');
Route::delete('deletefood/{id}',[FoodCotroller::class,'deletefood'])->name('deletefood');


//Reservation
Route::post('reservations',[ReservationController::class,'reservations'])->name('reservations');
Route::get('allreservation',[ReservationController::class,'allreservation'])->name('allreservation');
Route::delete('deletereservation/{id}',[ReservationController::class,'deletereservation'])->name('deletereservation');

///allchef
Route::get('allchef',[ChefController::class,'allchef'])->name('allchef');
Route::get('createchef',[ChefController::class,'createchef'])->name('createchef');
Route::post('storechef',[ChefController::class,'storechef'])->name('storechef');
Route::delete('deletechef/{id}',[ChefController::class,'deletechef'])->name('deletechef');
Route::get('editechef/{id}',[ChefController::class,'editechef'])->name('editechef');
Route::put('chefupdate/{id}',[ChefController::class,'chefupdate'])->name('chefupdate');
//card 
Route::post('storecard/{id}',[cartcontroller::class,'storecard'])->name('storecard');
Route::get('showcart',[cartcontroller::class,'showcart'])->name('showcart');
Route::delete('deletecart/{id}',[cartcontroller::class,'deletecart'])->name('deletecart');
Route::post('confirmorder',[cartcontroller::class,'confirmorder'])->name('confirmorder');
Route::get('allorder',[cartcontroller::class,'allorder'])->name('allorder');

require __DIR__.'/auth.php';
