<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
class FatchProductController extends Controller
{
    public function fetchproduct(){
         $alldata = DB::table('products')->paginate(5);
        return view('admin.product',['productdata'=>$alldata]);
    }
}
