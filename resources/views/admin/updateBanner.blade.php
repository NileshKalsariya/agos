@extends('admin.layout')
@section('content')
@section('title','banner')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<div class="col-md-6 offset-2">
<h2>Change Banner</h2>
<hr>
<form action="/update" method="POST" enctype="multipart/form-data">
<div class="form-group">
  <label for="example-date-input"  class="col-form-label">Offer date</label>
  <div class="col-10">
    <input class="form-control" value="{{$bannerDetail['offer_date']}}" type="date" name="offerdate">
  </div>
</div>
@csrf
<input type="hidden" name="id" value="{{$bannerDetail['id']}}">
  <div class="form-group">
    <label for="offertitle">advertisement title</label>
    <input type="text" class="form-control" value="{{$bannerDetail['title']}}" name="advertisementtitle" 
    id="offertitle" 
     placeholder="Enter Offer Title ">
     @error('advertisementtitle')
  <small class='text-danger'> *{{$message}}</small>
  @enderror
  </div>

  <div class="form-group purple-border">
  <label for="exampleFormControlTextarea4">Add discription</label>
  <textarea class="form-control" name="disc" id="exampleFormControlTextarea4" rows="3">{{$bannerDetail['banner_disc']}}</textarea>
  @error('disc')
  <small class='text-danger'> *{{$message}}</small>
  @enderror
</div>
<div class="form-group">
<b>Change with new Banner</b>   
    <label for="password" class="form-group">upload Image</label>
    <input id="image"  type="file" name='banner' onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" required="required">
    <img id="blah"  src="/banners/{{$bannerDetail['banner']}}" width="100" height="100" />
    
    @error('banner')
  <small class='text-danger'> *{{$message}}</small>
  @enderror
</div>

  

  <button class="my-2 btn-block btn-primary" type="submit">Submit</button>

</form>
</div>


@endsection()