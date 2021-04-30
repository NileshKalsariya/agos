<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Session;
use Illuminate\Support\Facades\DB;
class CartController extends Controller
{
    public function add(request $request){
        if($request->session()->has('userdata')){
            
          $cart = new Cart();
         $cart->user_id=$request->session()->get('userdata')['id'];
         $cart->product_id=$request->product_id;
         $cart->save();
         return redirect('shop');

        }else{
            return redirect('login');
        }

    }
    public static function cartitem(){
        $userId=Session::get('userdata')['id'];
        return Cart::where('user_id',$userId)->count();
    }
    public static function cartview(){
        $userId=Session::get('userdata')['id'];
        $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();

        $userId=Session::get('userdata')['id'];
        $amount = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->sum('products.sale_price');
       if($amount==0){
           return redirect('shop');
       }else{
        return view('user.cart',['products'=>$products,'amount'=>$amount]);
       }
    }
    public static function cartviewforheader(){
        $userId=Session::get('userdata')['id'];
        $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();
      return $products ;
    }
     public static function CartPriceHeader(){
    $userId=Session::get('userdata')['id'];
    $total = DB::table('cart')
    ->join('products','cart.product_id','=','products.id')
    ->where('cart.user_id',$userId)
    ->select('products.*','cart.id as cart_id')
    ->sum('products.sale_price');
    
    return $total;
     }
    public static function removecart($id){
 
        Cart::destroy($id);
        return redirect("cartlist");
    }
    
    public static function removecarfmrom($id){
 
        Cart::destroy($id);
        return redirect()->back();
    }
    
}
