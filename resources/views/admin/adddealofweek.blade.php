@extends('admin.layout')
@section('content')
@section('title','deal of week')
<tt style="font-size:20px;font-weight:bold">Deal of Week Product</tt>
<style>
.red{
  color:red;
}
</style>
<b >Add Products</b>
<div class="col-md-12  row">
<form action="addproduct" method="POST" class="col-md-7 mt-5" enctype="multipart/form-data"> 
  <div class="form-group">
    <label>Product Name:</label>
    <div>
    @error('name')
    <small class="red">{{$message}}</small>
    @enderror
    </div>
    <input type="text" class="form-control" name="name" 
     placeholder="Enter Product name">
  </div>
@csrf
  <div class="row ">
  <div class="form-group col-md-3 col-sm-3 col-3">
    <label>price:</label>
    <div>
    @error('price')
    <small class="red">{{$message}}</small>
    @enderror
    </div>
    <input type="text" class="form-control" name="price" 
     placeholder=" price">
  </div>
 <input type="hidden" name="dealofweek" value="dealofweek"/>
  <div class="form-group col-md-3 col-sm-3 col-3">
    <label>sale price:</label>
    <div>
    @error('sale_price')
    <small class="red">{{$message}}</small>
    @enderror
    </div>
    <input type="text" class="form-control" name="sale_price" 
     placeholder="sale_price">
  </div>

  <div class="form-group col-md-3 col-sm-3 col-3">
    <label>Catagory:</label>
    <div>
    @error('catagory')
    <small class="red">{{$message}}</small>
    @enderror
    </div>
    <input type="text" class="form-control" name="catagory" 
     placeholder="Catagory">
  </div>
  </div>
  <div class="my-1">
  <label>Tags</label>
  <div class="form-group">
  <textarea class="form-control" rows="5" name="tags" id="comment"></textarea>
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
  <textarea class="form-control" name="discription" rows="5" id="comment"></textarea>
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
  <textarea class="form-control" name="features" rows="5" id="comment"></textarea>
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
    <img id="blah"  width="200" height="200" />
    </div>
<button class="my-3 btn-block btn-dark">Add product</button> 
</div>
@endsection