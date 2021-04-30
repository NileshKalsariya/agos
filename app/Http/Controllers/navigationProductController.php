<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
class navigationProductController extends Controller
{    
    static  function getcatagory(){
                
            //    product::pluck('catagory');
             return    $catagory = product::groupBy('catagory')->select('catagory', DB::raw('count(*) as total'))->get();

                //  return view('user.templete',['catagory'=>$catagory]);
     }
     
}
