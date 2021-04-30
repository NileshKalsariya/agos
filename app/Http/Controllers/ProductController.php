<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\DealOfWeek;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function Addproduct(request $request)
     {
         $request->validate([
             'name'=>'required',
             'price'=>'required|numeric|regex:/^\d*(\.\d{2})?$/',
             'sale_price'=>'required|numeric|regex:/^\d*(\.\d{2})?$/',
             'catagory'=>'required|alpha',
             'discription'=>'required',
             'features'=>'required',
             'product'=>'required|mimes:jpeg,jpg,png',
       ]);
           $newproduct = new Product();
           if($request->input('dealofweek')){
              $DealOfWeek = new DealOfWeek();
               $DealOfWeek->product_name= $request->input('name');
               $DealOfWeek->save();
           }
           $newproduct->name = $request->input('name');
           $newproduct->price = $request->input('price');
           $newproduct->catagory = $request->input('catagory');
           $newproduct->tags = $request->input('tags');
           $newproduct->sale_price = $request->input('sale_price');
           $newproduct->discription	 = $request->input('discription');
           $newproduct->features = $request->input('features');
        if($request->has('product')){
            $file= $request->file('product');
        $extention = $file->getClientOriginalExtension();
        $filename =time().'.'.$extention;
        
        $file->Move(public_path('products'),$filename);
        $newproduct->photo =$filename;
        }
         $newproduct->save();
         if($newproduct->save()){
            return redirect('/product')->with('success','product added successfullly');
         }else{
          return redirect()->back();
         }
}
}
