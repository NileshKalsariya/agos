@extends('admin.layout')
@section('title','Edit blog')
@section('content')

<style>
.red{
color:red;
}
</style>

<form action="/editblog" class="col-md-12" method="POST" enctype="multipart/form-data">
    
   <div class="card ">
      <div class="card-header">
         <p>Blog</p>
      </div>
      <div class="card-body">
      <form>
  <div class="form-group">
    <label>Date:</label>
    @error('date')
      <small class="red">{{$message}}</small>
    @enderror
    <input type="date" class="form-control" name="date" value="{{$edit['date']}}"  placeholder="Enter date">
   </div>
   @csrf
   <input type="hidden" name="id" value="{{$edit['id']}}">
   <div class="form-group">
    <label>Concept: </label>
    @error('concept')
      <small class="red">{{$message}}</small>
    @enderror
    <input type="text" class="form-control"  value="{{$edit['concept']}}" name="concept"  placeholder="Enter Concept">
   </div>
   <div class="form-group">
    <label>Title:</label>
    @error('title')
      <small class="red">{{$message}}</small>
    @enderror
    <input type="text" class="form-control" name="title"  value="{{$edit['title']}}"  placeholder="Enter Title">
   </div>
   <div class="form-group">
    <label>Tags</label>
    @error('tags')
      <small class="red">{{$message}}</small>
    @enderror
    <input type="text" class="form-control"  value="{{$edit['tags']}}"  name="tags" placeholder="Enter Tags">
   </div>
   <div class="form-group">
    <label>Post Description</label>
    <textarea rows="10" class="form-control"   name="description">{{$edit['description']}}</textarea>
  </div>
   <div class="my-2">
<b class="my-1">Blog-image</b><br>
  <label for="password" class="form-group">Upload Image</label>
  @error('image')
      <small class="red">{{$message}}</small>
    @enderror
    <input id="image"  type="file" name='image' onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
    <img id="blah" src="/blogsimage/{{$edit['image']}}"  width="100" height="100" />
    </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
  </div>       
</form>
@endsection()