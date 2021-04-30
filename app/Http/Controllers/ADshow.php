<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
class ADshow extends Controller
{
    public static function bannerShow(){
      $banner = Banner::all();
    return $banner;
    }
}
