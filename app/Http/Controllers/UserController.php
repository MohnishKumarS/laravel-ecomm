<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function index(){
        if(Session::has('user')){
            return redirect('product');
        }else{
            return view('login');
        }
    }

    
    public function loginuser(){
        if(Session::has('user')){
            return redirect('product');
        }else{
            return view('login');
        }
    }

    public function login(Request $req)
    {
         $user = User::where('name',$req->name)->first();

         if($user && Hash::check($req->password,$user->password)){
             $req->session()->put('user',$user);
             return redirect('/');
         }else{
             return redirect()->back()->with('error','Incorrect Username or password');
         }
       
    }

    public function register(){
        if(Session::has('user')){
            return \redirect('product');
        }else{
            return view('register');
        }
        
    }
    public function register_user(Request $req){
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        return \redirect('/login');
    }


    public function logout(){
        session()->flush();

        return redirect('/product');
    }
}
