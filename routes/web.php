<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::view('/','index')->name('home');
Route::post('/test',function(Request $req){
    $details = $req->except('_token');
    dd(implode("\n",array_map(fn($k,$v)=>"$k:$v",array_keys($details),$details)));
});
Route::view('/checkout','checkout');
Route::view('/about','about');
Route::view('/services','services');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::view('/order','order');
    Route::post('/order',[UserController::class,'place_order'])->name('placeorder');
    Route::get('/myorders',[UserController::class,'my_orders'])->name('myorders');
    Route::get('/order_detail',[UserController::class,'order_detail'])->name('orderdetail');
    Route::post('/checkout',[UserController::class,'checkout'])->name('checkout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin/auth.php';
require __DIR__.'/tailor/auth.php';
