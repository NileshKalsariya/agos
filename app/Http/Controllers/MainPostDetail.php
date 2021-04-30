<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
class MainPostDetail extends Controller
{
    public function showpost(request $request,$id){
       $data =  Blog::find($id);
       return view('user.blog-details',['data'=>$data]);
    }
}
