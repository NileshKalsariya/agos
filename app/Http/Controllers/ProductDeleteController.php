<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductDeleteController extends Controller
{
    public function ProductDelete($id){
        $id = Product::find($id);
        if($id==null){
            return redirect()->back()->with('success','product deleted successfully');
        }else{
            $id->delete();
            return redirect()->back()->with('success','product deleted successfully');
        }
        
    }
}
