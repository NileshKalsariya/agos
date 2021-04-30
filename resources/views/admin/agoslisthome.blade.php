@extends('admin.layout')
@section('title','Agos')
@section('content')

<style>
.nohover{
  color:black;
}
.nohover:hover{
     background-color:	#F5F3EF;
     text-decoration:none;
     
     color:black;
}
</style>

<div class="row">
            <!-- Count item widget-->
            <!-- <a class="nohover" href="userlist"><div class="col-xl-2 col-md-3 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-user"></i></div>
                <div class="name"><strong class="text-uppercase">Total Users</strong>
                  <div class="count-number">{{$users->count()}}</div>
                </div>
              </div>
            </div></a>
            <a class="nohover" href=""> <div class="col-xl-2 col-md-3 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-user"></i></div>
                <div class="name"><strong class="text-uppercase">Total Banners</strong>
                  <div class="count-number">{{$banner->count()}}</div>
                </div>
              </div>
            </div></a>
            <a class="nohover" href=""><div class="col-xl-2 col-md-3 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-user"></i></div>
                <div class="name"><strong class="text-uppercase">Total Products</strong>
                  <div class="count-number">{{$product->count()}}</div>
                </div>
              </div>
            </div></a>
            <a class="nohover" href=""><div class="col-xl-2 col-md-3 col-6">
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-user"></i></div>
                <div class="name"><strong class="text-uppercase">Total Blogs</strong>
                  <div class="count-number">{{$blog->count()}}</div>
                </div>
              </div>
            </div></a>
            <a class="nohover" href=""><div class="col-xl-2 col-md-3 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-user"></i></div>
                <div class="name"><strong class="text-uppercase">Total orders</strong>
                  <div class="count-number">{{$orders}}</div>
                </div>
              </div>
            </div></a> -->

             <div class="card-body col-md-2">
             <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-user"></i></div>
                <div class="name"><strong class="text-uppercase">Total Users</strong>
                  <div class="count-number">{{$users->count()}}</div>
                </div>
              </div>  
              <a href="/userlist" type="button" class="btn btn-secondary ml-3 btn-sm">Users</a>
             </div>

             <div class="card-body col-md-2">
             <div class="wrapper count-title d-flex">
                <div class="icon"><i class="far fa-ballot"></i></div>
                <div class="name"><strong class="text-uppercase">Total Banners</strong>
                  <div class="count-number">{{$banner->count()}}</div>
                </div>
              </div>  
              <a href="/banner" type="button" class="btn ml-3 btn-secondary btn-sm">Banners</a>
             </div>

             <div class="card-body col-md-2">
             <div class="wrapper count-title d-flex">
                <div class="icon"><i class="fal fa-align-justify"></i></div>
                <div class="name"><strong class="text-uppercase">Total Products</strong>
                  <div class="count-number">{{$product->count()}}</div>
                </div>
              </div>  
              <a href="/product" type="button" class="btn ml-3 btn-secondary btn-sm">Products</a>
             </div>

             <div class="card-body col-md-2">
             <div class="wrapper count-title d-flex">
                <div class="icon"><i class="fad fa-blog"></i></div>
                <div class="name"><strong class="text-uppercase">Total Blogs</strong>
                  <div class="count-number">{{$blog->count()}}</div>
                </div>
              </div>  
              <a href="/blog" type="button" class="btn ml-3 btn-secondary btn-sm">Blogs</a>
             </div>

             <div class="card-body col-md-2">
             <div class="wrapper count-title d-flex">
                <div class="icon"><i class="fad fa-shopping-cart"></i></div>
                <div class="name"><strong class="text-uppercase">Total Orders</strong>
                  <div class="count-number">{{$orders}}</div>
                </div>
              </div>  
              <a href="/getallorder" type="button" class="btn ml-3 btn-secondary btn-sm">Orders</a>
             </div>

            
 </div>          
 


@endsection();