<?php

namespace App\Http\Controllers;
use PaytmWallet;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Order;
use Redirect;
class OrderPlace extends Controller
{
    public function order(request $request){
   
         $request->validate([
          'firstname'=>'required|alpha',
          'lastname'=>'required|alpha',
          'streetaddress'=>'required',
          'zip'=>'required|numeric',
          'city'=>'required|alpha',
          'email'=>'required|regex:/(.+)@(.+)\.(.+)/i|unique:register,email',
          'phone'=>'required|max:10|min:10|numeric',
          'payment'=>'required',
         ]);
         
    if($request->input('payment')=='Cash On delevery'){
          $userId=Session::get('userdata')['id'];
          $allCart =Cart::where('user_id',$userId)->get();
          foreach($allCart as $cart)
            { 
              $order = new Order;
              $order->product_id=$cart['product_id'];
              $order->user_id=$cart['user_id'];
              $order->first_name=$request->input('firstname');
              $order->last_name=$request->input('lastname');
     
              $order->address=$request->input('streetaddress');
              $order->zip=$request->input('zip');
              $order->city=$request->input('city');
              $order->email=$request->input('email');
              $order->phone=$request->input('phone');
              $order->status='pending';
              $order->payment_method=$request->input('payment');
              if($request->input('payment')=='Online payment'){
              $order->payment_status='Done';
              }else{
              $order->payment_status='pending';
              }
              $order->save();
              $allCart =Cart::where('user_id',$userId)->delete();
          }
          
          return redirect('/home');
    
         } else{
          $userId=Session::get('userdata')['id'];
          $amount = DB::table('cart')
          ->join('products','cart.product_id','=','products.id')
          ->where('cart.user_id',$userId)
          ->select('products.*','cart.id as cart_id')
          ->sum('products.sale_price'); 
        $firstname= $request->input('firstname');   
        $lastname= $request->input('lastname');  
        $streetaddress= $request->input('streetaddress');  
        $zip= $request->input('zip');  
        $city= $request->input('city');  
        $email= $request->input('email');  
        $phone= $request->input('phone');  
        $payment= $request->input('payment');  
            
          $request->session()->put('firstname',$firstname);
          $request->session()->put('lastname',$lastname);
          $request->session()->put('streetaddress',$streetaddress);
          $request->session()->put('zip',$zip);
          $request->session()->put('city',$city);
          $request->session()->put('email',$email);
          $request->session()->put('phone',$phone);
          $request->session()->put('payment',$payment);
          $request->session()->put('amount',$amount+200);
          $mydata= $request->all();
          return redirect('paytm-payment');
         }
        }
    
}
