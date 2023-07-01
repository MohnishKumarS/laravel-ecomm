<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Route as RoutingRoute;
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
Route::get('/',[UserController::class,'index']);

Route::get('/login',[UserController::class,'loginuser']);

Route::post('/login',[UserController::class,'login']);

// --------------- products ------------------

Route::get('/product',[ProductController::class,'index']);

Route::get('/product/{id}',[ProductController::class,'pro_details']);

Route::post('/add-cart',[ProductController::class,'add_cart']);












// --------------- logout ------------------

Route::get('/logout',[UserController::class,'logout']);
