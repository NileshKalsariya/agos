<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
class MainShopPageController extends Controller
{
    function fetchShop(){
        // $items = Product::all();
         $items = DB::table('products')->paginate(40);
        return view('user.shop',['items'=>$items]);
    }
}
