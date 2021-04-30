<?php
use  App\Http\Controllers\CartController;
use App\Http\Controllers\navigationProductController;
use App\Http\Controllers\CheckProfExistOrNotController;
$total=0;
if(Session::get("userdata")){
$total = CartController::cartitem();
}

if(Session::get("userdata")){
$products=CartController::cartviewforheader();
}else{
    $products=$oVal = new stdclass();
}
$saleprice=0;
if(Session::get("userdata")){
$saleprice=CartController::CartPriceHeader();
}
// $catagory=$oVal = new stdclass();
if(Session::get("userdata")){
    $catagory=navigationProductController::getcatagory();
    }else{
        $catagory=$oVal = new stdclass();   
    }
    if(Session::get('userdata')){
    $profile=CheckProfExistOrNotController::chekingprof();
    }
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/jpg" href="images/agoslogo.jpg">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"type="text/css">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
</head>
<style>
  .quickChat{
      position:fixed;
      z-index:500;
      bottom: 40px;
      right:50px;
      border-radius:10px;
  }

</style>
<body>
@if(Session::get('prof'))
<script>
 swal("Good job!", "Shoping profile saved!", "success");
 </script>
@endif
<a href="https://wa.me/7433091574" target="_blank"><img class="quickChat" src="{{asset('images/WhatsApp.png')}} " width="50px"></a>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                       <a class='mail' href=''>agosegadgets@gmail.com
</a>            </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +65 11.188.888
                    </div>
                    
                </div>
                <div class="ht-right">
                @if(Session::get('userdata'))
                    <a href="userprofile" class="login-panel"><i class="fa fa-user"></i>{{Session::get('userdata')['name']}} ,Have a nice day.</a>
                @else
                <a href="/userprofile" class="login-panel"><i class="fa fa-user"></i>Hi ,Have a nice day.</a>
                @endif
                    <div class="lan-selector">
                        <select class="language_drop" name="countries"  id="countries" style="width:300px;">
                            <option value='yt' data-image="{{asset('images/flags/flag-1.jpg')}}" data-imagecss="flag yt"
                                data-title="English">English</option>
                            <option value='yu' data-image="{{asset('images/flags/flag-2.jpg')}}" data-imagecss="flg yu"
                                data-title="Bangladesh">German </option>
                        </select>
                    </div>


<div class="container"> 
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="">
                                <img src="{{asset('/images/agoslogo.jpg')}}" width=50px alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                    <form action="/search" method="post">
                        <div class="advanced-search">
                       @csrf
                            <button type="button" class="category-btn">search</button>
                            <div class="input-group ">
                                <input type="text" name="search" placeholder="What do you need?">
                                <button type="submit"><i class="ti-search"></i></button>
                            </div>
                            
                        </div>
                        </form>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon">
                                <a href="/cartlist">
                                    <i class="icon_bag_alt"></i>
                                    <span>{{$total}}</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                            @if($products==null){

                                            }@else
                                            @foreach($products as $list)
                                                <tr>
                                                    <td class=""><img src="/products/{{$list->photo}}" width="100px" height="70px"  alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <h6>{{$list->name}}</h6>
                                                            <p>{{$list->sale_price}}</p>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                    <a href="/removecartfrom/{{$list->cart_id}}"><i class="ti-close text-dark"></i></a>
                                                    </td>
                                                    
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>Items:</span>
                                        <h5>{{$total}}</h5>
                                       
                                    </div>
                                    <div class="select-total">
                                        <span>Total price:</span>
                                        <h5>{{$saleprice}}</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="/cartlist" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="/checkoutlist" class="primary-btn checkout-btn">CHECK OUT</a>
                                        <a href="/clearcart" class="primary-btn {{$total==0?'d-none':''}} mt-2 view-card    bg-secondary">Clear Cart</a>
                                    </div>
                                </div>
                            </li>
                        @if($saleprice==0)
                        
                        @else
                            <li class="cart-price">{{$saleprice}}</li>
                        @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

                </div>
            </div>
        </div>
    
    <!-- Header Section Begin -->
    <div class="nav-item my-5" >
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All departments</span>
                        <ul class="depart-hover">
                        @foreach($catagory as $catagorylist)
                            <li><a href="/finditem/{{$catagorylist['catagory']}}">{{$catagorylist['catagory']}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="/home">Home</a></li>
                        <li><a href="/shop">Shop</a></li>
                        <li><a href="/blogs">Blog</a></li>
                        <li><a href="/contact">Contact</a></li>
                        <li><a href="#">Account</a>
                            <ul class="dropdown">
                             
                                <li><a href="/cartlist">Shopping Cart</a></li>
                                <li><a href="/faq">Faq</a></li>
                                @if(Session::get('userdata'))
                                <li><a href="/logout">Logout</a></li>
                               
                                @else
                                <li><a href="/register">Register</a></li>
                                <li><a href="/login">Login</a></li>
                                @endif
                            </ul>
                        </li>
                        @if(Session::get('userdata'))
                        <li><a href="#">Me</a>
                            <ul class="dropdown">
                             
                            <li><a href="/userprofile">Profile</a></li>
                                <li><a href="/myorders">Myorders</a></li>
                                <li class='{{$profile=="true"?"d-none":""}}'><a data-target="#shopprofile" style="cursor:pointer;" data-toggle="modal">Shop Profile</a></li>
                            </ul>
                        </li>
                        <!-- <li><a href="/userprofile">Me</a></li> -->
                        @endif
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
     <div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#shopprofile">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="shopprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter Shoping Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action='/shopprof' method='post'>
  <div class="form-group">
    <input type="text" class="form-control" name='fname' placeholder="First name">
    @error('fname')
    <p class ="text-danger">{{$message}}</p>
    @enderror
  </div>
  @csrf
  <div class="form-group">
    <input type="text" class="form-control" name='lname'  placeholder="Last name">
    @error('lname')
    <p class ="text-danger">{{$message}}</p>
    @enderror
  </div>
  <div class="form-group">  
    <input type="text" class="form-control" name='saddress'  placeholder="Street address">
    @error('saddress')
    <p class ="text-danger">{{$message}}</p>
    @enderror
  </div>

  <div class="form-group">   
    <input type="text" class="form-control"  name='zip' placeholder="Postcode(ZIP)">
    @error('zip')
    <p class ="text-danger">{{$message}}</p>
    @enderror
  </div>
  <div class="form-group">  
    <input type="text" class="form-control"  name='city' placeholder="Town City">
    @error('city')
    <p class ="text-danger">{{$message}}</p>
    @enderror
  </div>
  <div class="form-group">
    <input type="text" class="form-control"  name='email' placeholder="Email Address">
    @error('email')
    <p class ="text-danger">{{$message}}</p>
    @enderror
  </div>

  <div class="form-group">
    <input type="text" class="form-control"   name='phone' placeholder="Phone">
    @error('phone')
    <p class ="text-danger">{{$message}}</p>
    @enderror
  </div>
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary">Save changes</button>
      </div>
</form>
      </div>
     
    </div>
  </div>
</div>











      @yield('content')
      </div>
    <!-- Partner Logo Section Begin -->
    <div class="partner-logo mt-5">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{asset('images/sponsers/logo-1.png')}}" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{asset('images/sponsers/logo-2.png')}}" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{asset('images/sponsers/logo-3.png')}}" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{asset('images/sponsers/logo-4.png')}}" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{asset('images/sponsers/logo-5.png')}}" alt="not found">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: agosegadget@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook my-2"></i></a>
                            <a href="#"><i class="fa fa-instagram my-2"></i></a>
                            <a href="#"><i class="fa fa-twitter my-2"></i></a>
                            <a href="#"><i class="fa fa-pinterest my-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Serivius</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                       
                        @if(Session::get('msg'))
                         <div class="alert alert-success">
                            {{Session::get('msg')}}
                        </div>
                        @endif
                        <form action="/subscription" method="post" class="subscribe-form">
                            <input type="email" name="email" placeholder="Enter Your Mail" required>
                            @csrf
                            <button type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All right reserved<a href="/adminpanel">&nbsp &nbspLogin as Admin</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('js/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('js/jquery.dd.min.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>