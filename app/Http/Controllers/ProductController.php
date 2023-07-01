<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        // $user_id = Session::get('user')['id'];
        // $cart_count = Cart::where('user_id','=',$user_id)->count();
        $product = Product::all();
       return view('product',['data'=>$product]);
    }

    // ----show products--------

    public function pro_details($id){
        $pro = Product::find($id);
        return view('product_detail',compact('pro'));
    }

    // --------add to cart --------

    public function add_cart(Request $req){
        if(Session::has('user')){
            $cart = new cart;
            $cart->user_id = Session::get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect()->back()->with('success',"Product added to cart successfully");
        }else{
            return redirect('/login');
        }
    }


     static function cartItem(){
        if(Session::has('user')){
        $user_id = Session::get('user')['id'];

        $cart_count = Cart::where('user_id','=',$user_id)->count();

        return $cart_count;
        }
    }
}
