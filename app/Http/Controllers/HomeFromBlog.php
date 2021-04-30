<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
class HomeFromBlog extends Controller
{
      public static function bannerlist(){
        
    //    $blogs = Blog::all()->random(3);
    //  return $blogs;
    $blog=Blog::all()->random(3);
    return $blog;
// if (!contacts->isEmpty())
// if (count($contacts) > 0)
// if ($contacts->count() > 0)
    }
}
