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

Route::get('/register',[UserController::class,'register']);

Route::post('/register',[UserController::class,'register_user']);

// --------------- products ------------------
Route::get('/product_list',[ProductController::class,'product_list']);

Route::post('/product-search',[ProductController::class,'product_search']);

Route::get('/product',[ProductController::class,'index']);

Route::get('/product/{id}',[ProductController::class,'pro_details']);

// ------------- add product to cart ------------

Route::post('/add-cart',[ProductController::class,'add_cart']);

Route::get('/cartlist',[ProductController::class,'view_cart']);

Route::get('/removecart/{id}',[ProductController::class,'remove_cart']);

Route::post('/placeorder',[ProductController::class,'place_order']);


// --------------- order -------------------

Route::get('/myorders',[ProductController::class,'my_orders']);










// --------------- logout ------------------

Route::get('/logout',[UserController::class,'logout']);
