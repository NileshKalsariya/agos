@extends('admin.layout')
@section('content')
@section('title','Update Product')

<style>
.red{
  color:red;
}
</style>
<b >Add Products</b>
<div class="col-md-12 row">
<form action="/editproduct" method="POST" class="col-md-7 mt-5" enctype="multipart/form-data"> 
  <div class="form-group">
    <label>Product Name:</label>
    <div>
    @error('name')
    <small class="red">{{$message}}</small>
    @enderror
    </div>
    <input type="text" class="form-control" value="{{$data['name']}}" name="name" 
     placeholder="Enter Product name">
  </div>
@csrf
<input type="hidden" value="{{$data['id']}}" name="id">
  <div class="row ">
  <div class="form-group col-md-3 col-sm-3 col-3">
    <label>price:</label>
    <div>
    @error('price')
    <small class="red">{{$message}}</small>
    @enderror
    </div>
    <input type="text" value="{{$data['price']}}" class="form-control" name="price" 
     placeholder=" price">
  </div>

  <div class="form-group col-md-3 col-sm-3 col-3">
    <label>Discount:</label>
    <div>
    @error('sale_price')
    <small class="red">{{$message}}</small>
    @enderror
    </div>
    <input type="text" class="form-control" value="{{$data['sale_price']}}" name="sale_price" 
     placeholder="sale_price">
  </div>

  <div class="form-group col-md-3 col-sm-3 col-3">
    <label>Catagory:</label>
    <div>
    @error('catagory')
    <small class="red">{{$message}}</small>
    @enderror
    </div>
    <input type="text" class="form-control" value="{{$data['catagory']}}" name="catagory" 
     placeholder="Catagory">
  </div>
  </div>
  <div class="my-1">
  <label>Tags</label>
  <div class="form-group">
  <textarea class="form-control" rows="5" name="tags" id="comment">{{$data['tags']}}</textarea>
</div>
 </div>
  <div class="my-1">
  <label>product discription</label>
  <div>
    @error('discription')
    <small class="red">{{$message}}</small>
    @enderror
    </div>
    <div class="form-group">
  <textarea class="form-control" name="discription" rows="5" id="comment">{{$data['discription']}}</textarea>
</div>
  </div>
  <div class="my-1">
  <label>Product features</label>
  <div>
    @error('features')
    <small class="red">{{$message}}</small>
    @enderror
    </div>
    <div class="form-group">
  <textarea class="form-control" name="features" rows="5" id="comment">{{$data['features']}}</textarea>
</div>
</div>
</div>
<div class="col-md-3 my-5">
<div class="my-1">
  <label for="password" class="form-group"></label>
  <div>
    @error('product')
    <small class="red">{{$message}}</small>
    @enderror
    </div>
    <input id="image"  type="file" name='product' onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
    <img id="blah" src="/products/{{$data['photo']}}" width="200" height="200" />
    </div>
<button type='submit'class="my-3 btn-block btn-dark">Add product</button> 
</div>



@endsection()