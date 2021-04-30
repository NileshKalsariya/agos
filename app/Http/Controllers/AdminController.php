<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function index( request $request){
            //    $admin = new Admin();
            //    $admin->username=$req->name;
            //    $admin->password=Hash::make($req->password);
            //    $admin->save();

      $user = Admin::where('username',$request->name)->first();
      if($user){
        if(Hash::check($request->password,$user->password)){
            $request->session()->put('user',$user);
            return redirect('adminhome');
        }
        else{
          return back()->with('fail','Invalid Password');
        }
      }else{
        return back()->with('fail','No account Found please create.');
      }
    }
    }

