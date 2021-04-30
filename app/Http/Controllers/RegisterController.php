<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Register;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\Banner;


class RegisterController extends Controller
{
    public function addUser(request $request){
         $request->validate([
                'name'=>'required|min:3|max:120|regex:/^[\pL\s\-]+$/u',
                'email'=>'required|regex:/(.+)@(.+)\.(.+)/i|unique:register,email',
                'mobile'=>'required|numeric|digits:10|unique:register,mobile',
                'password'=>'required|min:6',
                'cpassword'=>'required|same:password',
        ]);
    

       $register = new Register;
       $register->name = $request->input('name');
       $register->email = $request->input('email');
       $register->mobile = $request->input('mobile');
       $register->password = Hash::make($request->input('password'));
       $register->cpassword = Hash::make($request->input('cpassword'));
       $done=$register->save();
       if($done){
           $request->session()->flash('status','Sucsessfully registered please Login');
           return redirect('login');
       }
    }

    public function Login(request $request){
        
         $user = Register::where(['email'=>$request->email])->first();
            
         if(!$user || !Hash::check($request->password,$user->password)){
            $request->session()->flash('logfailed','Email or password Incorrect please Try again');

            return redirect('login');
         }
         else{
             $banner = Banner::all();
            
             $request->session()->put('userdata',$user);
            //    return redirect('home',['bannerphoto'=>$bannerphotos]);
            //   return redirect()->to('home')->with('banner', $banner);
              return redirect('home');

         }

    }
}
