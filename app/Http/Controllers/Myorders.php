<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
class Myorders extends Controller
{
   public function data(request $request){
    $userId=  Session::get('userdata')['id'];
      $myorders = DB::table('orders')
    ->join('register','orders.user_id','=','register.id')
    ->join('products','orders.product_id','=','products.id')
    ->where('orders.user_id',$userId)
    ->get();

    return view('user.myorders',['data'=>$myorders]);
   }
}
