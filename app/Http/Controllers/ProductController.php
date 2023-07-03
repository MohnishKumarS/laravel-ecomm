<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

use function Symfony\Component\HttpFoundation\Session\Storage\Handler\commit;

class ProductController extends Controller
{

    // ------------ search product_list -----------------
     public function product_list(){
         $data = Product::select('desc')->get();
         $name = [];
         foreach($data as $val){
            $name[] = $val['desc'];
           
         }
         return $name;
     }

     public function product_search(Request $req){
         $res = $req->search;
        if($res == ''){
            return \redirect()->back();
        }else{
                $product = Product::where('desc','=',$req->search)->get();
            $product_id = $product[0]->id;
   
            return \redirect('product/'.$product_id);
        }

  
     }





    public function index()
    {
        // $user_id = Session::get('user')['id'];
        // $cart_count = Cart::where('user_id','=',$user_id)->count();
        $product = Product::all();
        return view('product', ['data' => $product]);
    }

    // ----show products--------

    public function pro_details($id)
    {
        $pro = Product::find($id);
        return view('product_detail', compact('pro'));
    }

    // --------add to cart --------

    public function add_cart(Request $req)
    {
        if (Session::has('user')) {
            $cart = new cart;
            $cart->user_id = Session::get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect()->back()->with('success', "Product added to cart successfully");
        } else {
            return redirect('/login');
        }
    }


    static function cartItem()
    {
        if (Session::has('user')) {
            $user_id = Session::get('user')['id'];

            $cart_count = Cart::where('user_id', '=', $user_id)->count();

            return $cart_count;
        }
    }

    public function view_cart()
    {
        if (Session::has('user')) {
        $user_id = session('user')->id;

        $cart = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $user_id)
            ->get(['carts.id as cart_id', 'products.*']);

        $total = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $user_id)
            ->sum('products.price');
        // return $total;
        return view('cartview', \compact('cart', 'total'));
        }else{
            $cart = [];
            return view('cartview',\compact('cart'));
        }
    }

    public function remove_cart($id)
    {
        cart::destroy($id);
        return redirect()->back();
    }

    public function place_order(Request $req)
    {
        $user_id = Session::get('user')->id;
        $allCart = Cart::where('user_id', $user_id)->get();

        foreach ($allCart as $cart) {
            $order = new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = "Order Placed";
            $order->payment_method = $req->payment;
            $order->payment_status = "Paid";
            $order->location = $req->location;
            $order->save();

            Cart::where('user_id',$user_id)->delete();
        }

        return redirect('/');
    }


    // - ---------------- my_orders -------------------

    public function my_orders(){
       if(Session::has('user')){
        $user_id = Session::get('user')->id;
        $order = DB::table('orders')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->where('orders.user_id', $user_id)
        ->get();
        return view('myorder',\compact('order'));
       }else{
           return \redirect('login');
       }
    }
}
