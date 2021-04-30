<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Register;
use Hash;
class ProfileUpdateController extends Controller
{
    public function Update (Request $req){
             
          $uid = $req->input('id');
          $req->validate([
            'name'=>'required|min:3|max:120|regex:/^[\pL\s\-]+$/u',
            'email'=>'required|regex:/(.+)@(.+)\.(.+)/i|unique:register,email,'.$uid,
            'mobile'=>'required|numeric|digits:10|unique:register,mobile,'.$uid,
            'password'=>'required|min:6',
          ]);
           DB::table('register')->where('id',$uid)->update([
                'name'=>$req->input('name'),
                'email'=>$req->input('email'),
                'mobile'=>$req->input('mobile'),
                'password'=>Hash::make($req->input('password'))
          ]);
         $req->session()->flash('profileupdate','Profile Updated Successfully');
         return redirect('logout');
        }
}
