<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
class clearcart extends Controller
{
   public function clear(){
       $userId = Session::get('userdata')->id;
        $removeldata= Cart::where('user_id',$userId)->delete();
        if($removeldata){
            return redirect()->back();
        }
   }
}
