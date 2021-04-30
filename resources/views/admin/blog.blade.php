
@extends('admin.layout')

@section('title','Blog')
@section('content')
<style>
.opacity{
  opacity:0.4;
}
.bg{

    background-color:#f5f5f5;
  box-shadow: 10px 10px 10px grey;
}
.m-l{
    margin-left:10px;
}
</style>
@if(Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>  {{Session::get('success')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if(session('updated'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>  {{Session::get('updated')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
     @endif

@if(Session::get('update'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>  {{Session::get('update')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="table-responsive">
<form>
<button class="btn btn-primary" formaction="/add">create Blog</button>
</form>

  
  @foreach($data as $datas)
<div class="card my-5 bg">
  <div class="card-header">
   <div class="row">
      <div class="id col-md-3">
        <b>Title</b><hr>
        <p>{{$datas->title}}</p>
      </div>
      <div class="product-image col-md-3">
      <b>Post Image</b><hr>
      <img src="/blogsimage/{{$datas->image}}" height="200px">      
  </div>
   </div>
  </div>
  <div class="card-body">
     <div class="row">
    <div class="Discription col-md-12">
    <b> Post Description</b>
    <p>{{$datas->description}}</p>
    </div>
    </div>
    <a class="btn btn-primary" href="/posttedit/{{$datas->id}}">Edit</a>
    <a class="btn btn-danger" href="/deleteblog/{{$datas->id}}">Delete</a>
  </div>
</div>
@endforeach




</div>
{{$data->links("pagination::bootstrap-4") }}

@endsection()



