<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
class BloglistPageController extends Controller
{
    public function moreBlogs(){
       $blogs=DB::table('blogs')->paginate(12);
       return view('user.blogs',['data'=>$blogs]);
    }
}
