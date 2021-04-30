  <?php
     use App\Http\Controllers\ADshow;
     use App\http\Controllers\HomeFromBlog;
     use App\http\Controllers\navigationProductController;
     use App\http\Controllers\slidercatagory;
     use App\Http\Controllers\dealofweekController;
    $banner = ADshow::bannerShow();
    $rendom = HomeFromBlog::bannerlist();
    $catagory=navigationProductController::getcatagory();       
    $mydata=slidercatagory::getdata2();
   $deal= dealofweekController::checkhome();
  ?>
  @extends('user.templete')
  @section('title','Agos')
    @section('content')

    <style>
.bg-color{
    background-color:#fcf5ff;
}
    .img_ss{
       height:200px;
       
       border-color: hsla(14, 100%, 53%, 0.6);
    }
 
    </style>
    <!-- Hero Section Begin -->    
    <!-- Hero Section End -->
    <!-- <section class="hero-section">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
  @foreach($banner as $list)
    <div class="carousel-item  {{$loop->first?'active':''}}">
      <img class="tales" src="/banners/{{$list['banner']}}" alt="First slide">
    </div>
 @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</section> -->

<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner container ">
  @foreach($banner as $list)
  <div class="carousel-item  {{$loop->first?'active':''}}">
      <div class="light-color  my-1">
  <p class="text-center">{{$list['banner_disc']}}</p>
        <b>{{$list['title']}}</b></div>
  <div class="carousel-caption d-none d-md-block">
      </div>
  <img class="tales " src="/banners/{{$list['banner']}}" alt="First slide">
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<hr>

    <!-- Banner Section Begin -->
    <!-- <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="{{asset('images/banners/banner-1.jpg')}}" alt="">
                        <div class="inner-text">
                            <h4>Men’s</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="{{asset('images/banners/banner-2.jpg')}}" alt="">
                        <div class="inner-text">
                            <h4>Women’s</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="{{asset('images/banners/banner-3.jpg')}}" alt="">
                        <div class="inner-text">
                            <h4>Kid’s</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Banner Section End -->

    <!-- Women Banner Section Begin -->
    <section class="women-banner spad container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="{{asset('/images/men.jpg')}}">

                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                           @foreach($catagory as $list)
                            <a href="/home/{{$list->catagory}}"><li class="badge badge-pill badge-light">{{$list->catagory}}</li></a>
                            @endforeach
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                       @foreach($data as $list)
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="/products/{{$list->photo}}" height="200px" width="200px" alt="">
                                <div class="sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="/pro_detail/{{$list->id}}"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="/pro_detail/{{$list->id}}">+ Quick View</a></li>
                                   
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">{{$list->catagory}}</div>
                                <a href="#">
                                    <h5>{{$list->name}}</h5>
                                </a>
                                <div class="product-price">
                                 {{$list->price}}
                                    <span>{{$list->sale_price}}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->
<hr>
    <!-- Deal Of The Week Section Begin-->

  <div class="container">
  <B style="font-size:30px;">DEAL OF THE WEEK</B>
  <p>Agos- All gedgets One shop provides Special offers on products on every weeks.<span class="text-primary" style="font-weight:bold"> THE DEAL OF THE WEEK</span> provides 40% or more discounts on such products </p>
  @if($deal=='[]')
                          <h4 class ="text-center">Deal of Week Products Not Available now.</h4>
                          @endif
    <div class="product-slider owl-carousel container mt-2">
                    
                       @foreach($deal as $data)
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="/products/{{$data->photo}}" class=" img_ss img-thumbnail"   alt="">
                            </div>
                          <div class="card-body bg-color">
                          <div class="product name">
                           Product: {{$data->name}}
                          </div>
                          <div class="tags">
                        TAGS : {{$data->tags}}
                          </div>
                            <div class="pricing">
                              <b>Price: {{$data->price}}</b>                            
                            </div>
                            <div class="buy-btn">
                         <a href="/pro_detail/{{$data->id}}">   <button type="button"  class="btn btn-outline-primary">Buy</button></a>
                            </div>
                          </div>
                        </div>
                        @endforeach
                    </div>
                  
                    </div>


  
    
    
    <hr>


 
   
    <!-- Deal Of The Week Section End -->

    <!-- Man Banner Section Begin -->
    <section class="man-banner spad container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                         @foreach($mydata as $list)
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="/products/{{$list->photo}}" alt="">
                                <div class="sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="/pro_detail/{{$list->id}}"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="/pro_detail/{{$list->id}}">+ Quick View</a></li>
                                    <li class="w-icon"><a href="/pro_detail/{{$list->id}}"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">{{$list->catagory}}</div>
                                <a href="#">
                                    <h5>{{$list->name}}</h5>
                                </a>
                                <div class="product-price">
                                {{$list->price}}
                                    <span>{{$list->sale_price}}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="{{asset('images/title-product/man-large.jpg')}}">
                        <h2>Men’s</h2>
                        <a href="/shop">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <!-- Man Banner Section End -->

    <!-- Instagram Section Begin -->
    <div class="container">
    <div class="instagram-photo">
        <div class="insta-item set-bg" data-setbg="{{asset('images/releason/insta-1.jpg')}}">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{asset('images/releason/insta-2.jpg')}}">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{asset('images/releason/insta-3.jpg')}}">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{asset('images/releason/insta-4.jpg')}}">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{asset('images/releason/insta-5.jpg')}}">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{asset('images/releason/insta-6.jpg')}}">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
    </div>
    </div>
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
           
            <div class="row">
            @foreach($rendom as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">    
                    <a href="/blogsimage/{{$blog['image']}}"  target="_blank">       
                    <img src="/blogsimage/{{$blog['image']}}" height="220px" alt=""></a>
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    {{$blog['date']}}
                                </div>
                            </div>
                            <a href="/blog-detail/{{$blog['id']}}">
                                <h4>{{$blog['title']}}</h4>
                                <a href="/blog-detail/{{$blog['id']}}"> <p>Read more...</p></a>
                            </a>
                           
                        </div>
                      
                    </div>
                </div>
                @endforeach
            </div>
            
              <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="images/delevery-icon/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over 99$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="images/delevery-icon/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Delivery On Time</h6>
                                <p>If good have prolems</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="images/delevery-icon/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Secure Payment</h6>
                                <p>100% secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->

@endsection()

