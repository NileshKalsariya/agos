@extends('user.templete')
@section('content')
@section('title','blog')
    <!-- Header End -->
<style>

</style>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
         <div class="container">
       
           <div class="row">
           @foreach($data as $list)
             <div class="col-lg-3 col-12 col-md-6 col-sm-12">
                 <img  src="/blogsimage/{{$list->image}}" height="200px" width="300px">
                <a href="/blog-detail/{{$list->id}}"><p>{{$list->title}}&nbsp &nbsp<small>Read more...</small></p></a>
             </div>
             @endforeach
           </div>
           
           {{$data->links("pagination::bootstrap-4") }}  
    
         </div>
        
    @endsection()