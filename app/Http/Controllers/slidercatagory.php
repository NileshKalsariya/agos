<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use Session;

class slidercatagory extends Controller
{
 
         public function getdata($catagory='mobile'){

          if(Session::get('firstname') || Session::get('lastname')||Session::get('streetaddress')||Session::get('zip')||Session::get('city')||Session::get('email')||Session::get('phone')||Session::get('payment')|| Session::get('amount')){
            Session::forget('firstname');
            Session::forget('lastname');
            Session::forget('streetaddress');
            Session::forget('city');
            Session::forget('email');
            Session::forget('phone');
            Session::forget('payment');
            Session::forget('amount');
            Session::forget('zip');
          }

         $data=product::where('catagory',$catagory)->get();
      return view('user.home',['data'=>$data]);
         }



      static public function getdata2($catagory='earphone'){
      return  $data=product::where('catagory',$catagory)->get();
    
    }
}
