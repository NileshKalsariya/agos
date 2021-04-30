<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Blog;
class BlogController extends Controller
{
   public function add(request $request){
      return view('admin.addblog');
   }
public function show(){
      // $data = Blog::all();
      $data = DB::table('blogs')->paginate(4);
     return view('admin.blog',['data'=>$data]);
}
   public function addpost(request $req){
      $req->validate([
         'title'=>'required',
         'date'=>'required',
         'description'=>'required',
         'concept'=>'required',
         'image'=>'required',
         'tags'=>'required',
      ]);

      $blog = new Blog;
      $blog->title=$req->input('title');
      $blog->date=$req->date;
      $blog->description=$req->description;
      $blog->concept=$req->concept;
      $blog->tags=$req->tags;
      if($req->has('image')){
         $file= $req->file('image');
        $extention = $file->getClientOriginalExtension();
        $filename =time().'.'.$extention;
        $file->Move(public_path('blogsimage'),$filename);
      }
      $blog->image=$filename;
      $blog->save();
      $req->session()->flash('success','Blogpost Added');
      return redirect("/blog");
   }

    public function deleteblog(request $req ,$id){
        $data =Blog::find($id);
        $data->delete();
        $req->session()->flash('success','Blogpost deleted');
           return redirect('blog');
        
    }

     public function showblog($id){
      $editdata = Blog::find($id);
      return view('admin.editpost',['edit'=>$editdata]);
     }



     public function editblog(request $req){
      $req->validate([
         'title'=>'required',
         'date'=>'required',
         'description'=>'required',
         'concept'=>'required',
         'image'=>'required',
         'tags'=>'required',
      ]);
       
      if($req->has('image')){
         $file= $req->file('image');
        $extention = $file->getClientOriginalExtension();
        $filename =time().'.'.$extention;
        $file->Move(public_path('blogsimage'),$filename);
      }
         
         $id= Blog::find($req->input('id'));
         $id->date = $req->input('date');
         $id->concept = $req->input('concept');
         $id->title = $req->input('title');
         $id->description = $req->input('description');
         $id->tags = $req->input('tags');
         $id->	image =$filename;
         $id->save();
        $req->session()->flash('updated','blog Updated');
        return redirect('blog');
     }
}
