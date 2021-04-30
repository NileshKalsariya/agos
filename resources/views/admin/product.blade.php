@extends('admin.layout')

@section('title','Product')
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
<button class="btn btn-primary" formaction="/addproduct">Add product</button>
</form>
<form action='/spro' method='post'>
@csrf
<div class="input-group container mt-4 rounded">
  <input type="search" name='spro' class="form-control rounded" placeholder="Search products by name" aria-label="Search"
    aria-describedby="search-addon" />
  
</div>
</form>

  <!-- <table class="table">
  <thead>
        <tr>
          <th>id</th>
          <th>name</th>
          <th>price</th>
          <th>catagory</th>
          <th>tags</th>
          <th>sale price</th>
          <th>discription</th>
          <th>features</th>
          <th>photo</th>
          <th colspan-2>Change/Edit</th>
        </tr>
      </thead>
      <tbody>
      @foreach($productdata as $data)
          <tr>
            <td>{{$data->id}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->price}}</td>
            <td>{{$data->catagory}}</td>
            <td>{{$data->tags}}</td>
            <td>{{$data->sale_price}}</td>
            <td>{{$data->discription}}</td>
            <td>{{$data->features}}</td>
            <td><img src="/products/{{$data->photo}}" width="100px"height="100px"></td>
            <td><a class="btn btn-primary" href="/productedit/{{$data->id}}">Edit</a>
            <a class="btn btn-danger" href="/productdelete/{{$data->id}}">Delete</a>
            </td>
          </tr>
          @endforeach
      </tbody>
  </table> -->
  @foreach($productdata as $data)
<div class="card my-5 bg">
  <div class="card-header">
   <div class="row">
      <div class="id col-md-3">
        <b>ID</b><hr>
        <p>{{$data->id}}</p>
      </div>
      <div class="productname col-md-3">
      <b>Product Name</b><hr>
      <p>{{$data->name}}</p>
      </div>
      <div class="product-price col-md-3">
      <b>Product Price</b><hr>
      <p>{{$data->price}}</p>
      </div>
      <div class="product-saleprize col-md-3">
      <b>Product sale price</b><hr>
      <p>{{$data->sale_price}}</p>
      </div>
   </div>
   <div class="row">
  <div class="catagory col-md-3">
    <b>Product Catagory</b><hr>
    <p>{{$data->catagory}}</p>
  </div>
  <div class="tags col-md-3">
     <b>Product tags</b><hr>
     <p>{{$data->tags}}</p>
  </div>

  <div class="product-image col-md-3">
      <b>Product image</b><hr>
      <img src="/products/{{$data->photo}}" height="200px">      
  </div>
  </div>
  </div>
  <div class="card-body">
     <div class="row">
    <div class="Discription col-md-12">
    <b>Product-Description</b>
    <p>{{$data->discription}}</p>
    </div>
    <div class="Fetures col-md-12">
    <b>Product-Features</b>
    <p>{{$data->features}}</p>
    </div>
    </div>
    <a class="btn btn-primary" href="/productedit/{{$data->id}}">Edit</a>
    <a class="btn btn-danger" href="/productdelete/{{$data->id}}">Delete</a>
  </div>
</div>
@endforeach


</div>

<div class="my-4">
{{$productdata->links("pagination::bootstrap-4") }}
</div>

@if($productdata->isEmpty())
<div class="my-5 col-md-3 offset-4">
<img src="{{asset('images/nodatafound.jpg')}}" draggable="false" class="opacity" width="200px" height="200px" >
<h3  class="my-1 ml-4 opacity">No products Found</h3>
</div>
@endif
@endsection()



