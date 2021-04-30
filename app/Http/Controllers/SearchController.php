<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function Search(request $request){
     $str = $request->input('search');
    //  $data=  DB::table('products')
    //  ->orwhere('name','like',"%$str%")
    //  ->orwhere('price','like',"%$str%")
    //  ->orwhere('catagory','like',"%$str%")
    //  ->orwhere('tags','like',"%$str%")
    //  ->orwhere('discription','like',"%$str%")
    //  ->orwhere('features','like',"%$str%")
    //  ->get();
       $searchdata = Product::where('name','like',"%$str%")
       ->orwhere('tags','like',"%$str%")
       ->orwhere('catagory','like',"%$str%") 
       ->orwhere('price','like',"%$str%")
       ->orwhere('discription','like',"%$str%")
       ->orwhere('features','like',"%$str%")
       ->orwhere('sale_price','like',"%$str%")      
       ->paginate(40);
        return view('user.shop',['items'=>$searchdata]);
    }
   
}
