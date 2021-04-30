@extends('admin.layout')
@section('content')
@section('title','banner')
<style>
.opacity{
  opacity:0.4;
}
.border-r{
  border-radius:4px;
}
</style>
<div class="button ">
<a  href="addbanners"><button class="btn btn-primary mb-3 border-r"> Add banners</button></a>
</div>
<div class="mx-5">
   @if(Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>  {{Session::get('success')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
   @endif
   @if(Session::get('delete'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>  {{Session::get('delete')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
   @endif
</div>

<table class=" table table-striped table-dark">
<div style="overflow-x:auto;">
  <thead>
    <tr>
      <th class="text-white" scope="col">No</th>
      <th class="text-white" scope="col">Offer Date</th>
      <th class="text-white" scope="col">Title</th>
      <th class="text-white" scope="col">Discription</th>
      <th class="text-white" scope="col">Banner</th>
      <th class="text-white" scope="col">Change</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $list)
    <tr>
      <th scope="row" class="text-white">{{$list->id}}</th>
       <td class="text-white">{{$list->offer_date}}</td>
      <td class="text-white">{{$list->title}}</td>
      <td class="text-white">{{$list->banner_disc}}</td>
      <td class="text-white"><img src="/banners/{{$list->banner}}" width="110px" height="100px"></td>
      <td><a href="RemoveAdd/{{$list->id}}"><button class="btn btn-danger border-r">Remove</button></a>
      <a href="editAdd/{{$list->id}}"><button class="btn btn-primary border-r">Edit</button></a></td>
    </tr>
  @endforeach
  </tbody>
  </div>
</table>

<div class="my-4">
{{ $data->links("pagination::bootstrap-4") }}
</div>

@if($data->isEmpty())
<div class="my-5 col-md-3 offset-4">
<img src="{{asset('images/nodatafound.jpg')}}" class="opacity" width="200px" height="200px" >
<h3  class="my-1 ml-4 opacity">No result Found</h3>
</div>
@endif

@endsection()