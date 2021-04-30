<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Session;
use Illuminate\Support\Facades\DB;
class ProceedTocheckOut extends Controller
{
    public function checkout(){
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
            return redirect('/home');
        }
        return view('user.checkout',['products'=>$products,'amount'=>$amount]);
    }
}
