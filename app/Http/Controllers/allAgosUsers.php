<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class allAgosUsers extends Controller
{
    public function allusers(){
      $alluser = DB::table('register')->get();
      $allbanners = DB::table('banner')->get();
      $product=DB::table('products')->get();
      $blog=DB::table('blogs')->get();
      $orders=DB::table('orders')->count();
      return view('admin.agoslisthome',['users'=>$alluser,'banner'=>$allbanners,'product'=>$product,'blog'=>$blog,'orders'=>$orders]);
    }
    public function fetchusers(){
        $alluser = DB::table('register')->get();
        return view('admin.userlist',['users'=>$alluser]);
    }
}
