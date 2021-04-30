<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class dealofweekController extends Controller
{
    public function add(){
       
         return view('admin.adddealofweek');
      
      }
 public function check(){
   $data =DB::table('dealofweek')
    ->join('products','dealofweek.product_name','=','products.name')
    ->get();
    return view('admin.dealofweek',['productdata'=>$data]);
 
 }
 static public function checkhome(){
 return  $data =DB::table('dealofweek')
    ->join('products','dealofweek.product_name','=','products.name')
    ->get();
    
 
 }
}

