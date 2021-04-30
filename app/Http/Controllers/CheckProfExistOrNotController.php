<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\ShopProfile;
class CheckProfExistOrNotController extends Controller
{
    public static function chekingprof(){
      $uid = Session::get('userdata')['id'];
      $data =  ShopProfile::where('user_id',$uid)->get();
      if(count($data) == 0){
        return 'false';
      }else{
          return 'true';
      }
    }
    public static function getshopingdata(){
      $id = Session::get('userdata')['id'];
     $data = ShopProfile::where('user_id',$id)->get();
     if(count($data) == 0){
      return 'nodata';
    }else{
        return $data;
    }
}
}
