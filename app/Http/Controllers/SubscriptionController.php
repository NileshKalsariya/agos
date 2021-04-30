<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SUbscription;
class SubscriptionController extends Controller
{
  public function add(request $req){
      $sub = new SUbscription();
      $sub->email_id = $req->input('email'); 
      if($sub->save()){
          return redirect('home')->with('msg','your email sent successfully');
      }else{
          return back()->with('msg', 'something went wrong');
      }
  }
  public function list(){
  $data=  SUbscription::all();
    return view('admin.subslist',['datas'=>$data]);
  }

 
}
