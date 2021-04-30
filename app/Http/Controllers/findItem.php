<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class findItem extends Controller
{
   function findItemSendToSHop(request $req,$catagory){
        $catagoryWiseFilter = Product::where('catagory',$catagory)->paginate(40);
       return view('user.shop',['items'=>$catagoryWiseFilter]);
   }
}
