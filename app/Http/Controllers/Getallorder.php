<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Getallorder extends Controller
{
   public function getdata(){
      $buydata= DB::table('orders')
     ->join('products','orders.product_id','=','products.id')
     ->join('register','orders.user_id','=','register.id')
     ->select('orders.id','orders.first_name','orders.last_name','register.name as acholder','products.name as pname','orders.address','orders.zip','orders.city','orders.phone','orders.email','orders.payment_status','orders.payment_method','products.price','products.sale_price')
     ->get();
     return view('admin.buydetail',['data'=>$buydata]);
   }
}
