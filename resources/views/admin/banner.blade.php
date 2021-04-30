@extends('admin.layout')
@section('content')
@section('title','Add banners')

<div class="col-md-6 offset-2">
<h2>Add advertisement Banners</h2>
@if(Session::get('success'))
       <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong></strong> {{Session::get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> 
      </div>
       @endif
<hr>
<form action="discription" method="post" enctype="multipart/form-data">
<div class="form-group">
  <label for="example-date-input" class="col-form-label">Offer date</label>
  <div class="col-10">
    <input class="form-control " type="date" name="offerdate">
  </div>
</div>
@csrf
  <div class="form-group">
    <label for="offertitle">advertisement title</label>
    <input type="text" class="form-control" name="advertisementtitle" 
    id="offertitle" 
     placeholder="Enter Offer Title ">
     @error('advertisementtitle')
  <small class='text-danger'> *{{$message}}</small>
  @enderror
  </div>
  <div class="form-group purple-border">
  <label for="exampleFormControlTextarea4">Add discription</label>
  <textarea class="form-control" name="disc" id="exampleFormControlTextarea4" rows="3"></textarea>
  @error('disc')
  <small class='text-danger'> *{{$message}}</small>
  @enderror
</div>

<div class="form-group">
<b>Add banner</b>   <br>
    <label for="password" class="form-group">upload Image</label>
    <input id="image"  type="file" name='banner' onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" required="required">
    <img id="blah"  width="100" height="100" />
    
    @error('banner')
  <small class='text-danger'> *{{$message}}</small>
  @enderror
</div>


  <button class="my-2 btn btn-primary" type="submit">Submit</button>

</form>
</div>

@endsection()