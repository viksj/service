<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Front\VendorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('/admin')->namespace('Admincontroller')->group(function(){
    //Admin Login Route
    Route::match(['get','post'],'login',[AdminController::class,'login']);
    Route::get('logout',[AdminController::class,'logout']);
    Route::group(['middleware'=>['admins']],function(){
        //Admin Dashboard Route
        Route::get('dashboard',[AdminController::class,'dashboard']);
    });
});

Route::prefix('/vendor')->namespace('VendorController')->group(function(){
    //vendor Login/Register
    Route::get('signup', [VendorController::class, 'Signup']);
    Route::post('register', [VendorController::class, 'Register']);
    Route::get('login', [VendorController::class, 'loginpage']);
    // Route::get('dashboard', [VendorController::class, 'dashboard']);
    Route::group(['middleware'=>['vendors']],function(){
        //Admin Dashboard Route
        Route::get('dashboard', [VendorController::class, 'dashboard']);
        Route::post('login', [VendorController::class, 'login']);
    });
});
