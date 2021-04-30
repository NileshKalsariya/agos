<?php

namespace App\Http\Controllers;
use App\models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
class ProductEditController extends Controller
{
   public function productedit($id){
    $data = Product::find($id);
   return view('admin.updateproduct',['data'=>$data]);
   }
   public function Edit(request $request){
      
      $request->validate([
         'name'=>'required',
         'price'=>'required|numeric|regex:/^\d*(\.\d{2})?$/',
         'sale_price'=>'required|numeric|regex:/^\d*(\.\d{2})?$/',
         'catagory'=>'required|alpha',
         'discription'=>'required',
         'features'=>'required',
         'product'=>'required|mimes:jpeg,jpg,png',
   ]);

   if($request->has('product')){
      $file= $request->file('product');
  $extention = $file->getClientOriginalExtension();
  $filename =time().'.'.$extention;
  $file->Move(public_path('products'),$filename);
  
  $data = Product::find($request->id);
  $data->name =$request->input('name');
 $data->price =$request->input('price');
 $data->sale_price = $request->input('sale_price');
 $data->catagory = $request->input('catagory');
 $data->tags = $request->input('tags');
 $data->discription = $request->input('discription');
 $data->features = $request->input('features');
 $data->photo=$filename;
 $data->save();
$request->session()->flash('update','product updated SuccessFully');
return redirect('product'); 
  }
   }
}
