<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\ShopProfile;
class ShopProfileController extends Controller
{
     public function add(Request $request){

          $request->validate([
             'fname'=>'required|alpha',
             'lname'=>'required|alpha',
             'saddress'=>'required',
             'zip'=>'required|numeric',
             'city'=>'required|alpha',
             'email'=>'required|email',
             'phone'=>'required|numeric|digits:10',
          ]);

       $uid= Session::get('userdata')['id'];
        $shopprof  = new ShopProfile();
        $shopprof->firstname= $request->input('fname');
        $shopprof->lastname= $request->input('lname');
        $shopprof->streetaddress= $request->input('saddress');
        $shopprof->zip= $request->input('zip');
        $shopprof->city= $request->input('city');
        $shopprof->email= $request->input('email');
        $shopprof->phone= $request->input('phone');
        $shopprof->user_id= $uid;
      if($shopprof->save()){
          return back()->with("prof","your shop-profile is added successfully");
      }
     }
}
