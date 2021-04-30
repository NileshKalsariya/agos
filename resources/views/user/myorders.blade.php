@extends('user.templete')
@section('content')
@section('title','Cart')
<style>
.img{
    width:auto;
    height: 200px
}
.opacity{
    opacity: .5;;
}
</style>
<div class="container">
@if($data=='[]')

                   <div class="my-5 col-md-3 offset-4">
                 <img src="{{asset('images/nodatafound.jpg')}}" draggable="false" class="opacity" width="200px" height="200px" >
                <h5  class="my-1  opacity">Not any product ordered Yet</h5>
                 </div>
                      
@endif
@foreach($data as $list)

<div class="row">

    <div class="left-image col-md-4 d-flex justify-content-center align-items-start ">
         <img class="img" src="products/{{$list->photo}}" alt="Card image cap">
    </div>
   <div class="right-data col-md-8">
    
        <div class="payment-status mb-3">
         @if($list->status=='Done')
        <B class="alert alert-success mt-5">Payment Status:&nbsp{{$list->status}}</B><br>
         @else
         <B class="alert alert-dark mt-5">Payment Status:&nbsp{{$list->status}}</B><br>
         @endif   
         </div>
         <div class="p-method mt-2">
         <b>Payment Method:</b>&nbsp&nbsp{{$list->payment_method}}
         </div>
         <div class="o-name mt-2">
         <B>Ordered By:</B>&nbsp&nbsp{{$list->first_name}} {{$list->last_name}}
         </div>
         <div class="product mt-2">
         <b>Product Name:</b>&nbsp&nbsp{{$list->name}}
         </div>

         <div class="price mt-2">
         <b>Price:</b>&nbsp<del>{{$list->price}}</del>&nbsp{{$list->sale_price}} Rs/-
         </div>

         <div class="delevery mt-2">
         <b>Delivery Charge:</b> 200 rs/-
         </div>
         <div class="price-total mt-2">
         <b>Total Price:</b>&nbsp {{$list->sale_price+200}} Rs/-
         </div>
         
         <div class="address mt-2">
         <b>Addrress:</b>{{$list->address}} <b>ZIP :</b> {{$list->zip}} <b>City:</b>{{$list->city}}
         </div>

         <div class='mt-2'>
         <b>Product Detail:</b>
         <p class="mt-3 pro-detail">
          {{$list->discription}}
         </p>
         </div>
   </div>
</div>
<hr>
@endforeach
</div>
@endsection