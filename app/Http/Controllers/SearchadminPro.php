<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class SearchadminPro extends Controller
{
    public function index(Request $req){
       $searchproduct = $req->input('spro');
       $data = Product::where('name','like','%'.$searchproduct.'%')->paginate(5);
       return view('admin.product',['productdata'=>$data]);
    }
}
