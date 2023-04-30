<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix("admin")->name("admin.")->group(function(){
    Route::middleware('guest_admin:admin')->group(function(){
        Route::get('/',[AdminController::class,'index'])->name('login');
        Route::post('/',[AdminController::class,'store']);
    });


    Route::get('/testlogin',function(){
        var_dump(Auth::guard('admin')->attempt(['email'=>'admin@admin.com','password'=>'password']));
    });
    

    // Access If Authenticated
    // is_admin: authenticated admin
    Route::middleware('is_admin')->group(function(){
        Route::view('/dashboard','admin.dashboard')->name('dashboard');
        Route::get('/orders',[AdminController::class,'orders'])->name('orders');
        Route::get('/order_detail',[AdminController::class,'order_detail'])->name('orderdetail');
        Route::post('/assignOrder',[AdminController::class,'assign_order']);
        Route::get('/assignOrder',[AdminController::class,'assign_order']);

        Route::get('/logout',function(){
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login');
        })->name('logout');
    });
});
