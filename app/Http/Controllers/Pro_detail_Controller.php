<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Facades\DB;
use Illuminate\Http\Request;

class Pro_detail_Controller extends Controller
{
    public function productDetail($id){
 
            
      if($id){
        $remdom = product::all()->random(4); 
        $check_product = Product::findorFail($id);
        return view('user.detail',['detail'=>$check_product,'allpro'=>$remdom]);
        }
        }
        
    }
