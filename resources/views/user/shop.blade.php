@extends('user.templete')
@section('content')
<style>
.opacity{
   opacity:0.5;
}
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black; /* If you want dots under the hoverable text */
}
</style>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
<div class="my-2">
<form action="/search" method="POST">
@csrf
<input class="offset-1" type="text" placeholder="Search here.." name="search"> <button class="btn-sm btn-primary" type="submit">Search</button>
</div>
</form>
    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Default Sorting</option>
                                    </select>
                                    <select class="p-show">
                                        <option value="">Show:</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                <p>Show 01- 09 Of 36 Product</p>
                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">
                        @if($items->isEmpty())
                   <div class="my-5 col-md-3 offset-4">
                 <img src="{{asset('images/nodatafound.jpg')}}" draggable="false" class="opacity" width="200px" height="200px" >
                <h5  class="my-1 ml-4 opacity">No products Found</h5>
                 </div>
                       @endif

                        @foreach($items as $list)
                             <div class="col-lg-3 col-sm-3">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <a href="/pro_detail/{{$list->id}}"><img src="/products/{{$list->photo}}" height="200px" alt="product-image" class="" ></a>
                                        <div class="icon">
                                            <i  class="icon_heart_alt "></i>
                                        </div>
                                        <ul>
                                           
                                            <li class="quick-view"><a href="/pro_detail/{{$list->id}}">Quick View</a></li>
                                            
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">{{$list->catagory}}</div>
                                        <a href="#">
                                            <h5>{{$list->name}}</h5>
                                        </a>
                                        <div class="product-price">
                                            {{$list->sale_price}} Rs/-
                                            <span>{{$list->price}} RS/-</span>
                                        </div>     
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                     <div class="my-4 bg-light">
            {{$items->links("pagination::bootstrap-4") }}
                     </div>
                   
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->
@endsection('content')