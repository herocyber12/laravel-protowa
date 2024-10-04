<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DevicesController;

Route::post('/login',[AuthController::class,'systemAuth'])->name('login');
Route::post('/logout',[AuthController::class,'systemLogout']);
Route::get('/cek-data',function(Request $request){
    return [
        'stats' => 'Berhasil Login',
        'data' => $request->user()
    ];
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){
    Route::controller(DevicesController::class)->group(function(){
        Route::get('/device','index');
        Route::post('/device','store');
    });
});
    

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
