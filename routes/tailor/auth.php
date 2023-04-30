<?php

use App\Http\Controllers\TailorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix("tailor")->name("tailor.")->group(function(){
    Route::middleware('guest_tailor:tailor')->group(function(){
        Route::get('/',[TailorController::class,'index'])->name('login');
        Route::post('/',[TailorController::class,'store']);
        Route::get('/register',[TailorController::class,'register'])->name('register');
        Route::post('/register',[TailorController::class,'create_tailor']);
    });


    Route::get('/testlogin',function(){
        var_dump(Auth::guard('tailor')->attempt(['email'=>'tailor@admin.com','password'=>'password']));
    });
    

    // Access If Authenticated
    Route::middleware('is_tailor')->group(function(){
        Route::get('/dashboard',[TailorController::class,'orders'])->name('orders');
        Route::get('/my_orders',[TailorController::class,'my_orders'])->name('my_orders');
        Route::get('/accept',[TailorController::class,'accept'])->name('accept');
        Route::get('/reject',[TailorController::class,'reject'])->name('reject');
        Route::get('/complete',[TailorController::class,'complete'])->name('complete');
        Route::get('/detail',[TailorController::class,'detail'])->name('detail');
        Route::get('/order_detail',[TailorController::class,'order_detail'])->name('orders_detail');
        Route::get('/logout',function(){
            Auth::guard('tailor')->logout();
            return redirect()->route('tailor.login');
        })->name('logout');
    });
});
