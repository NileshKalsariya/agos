<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->    <link rel="stylesheet" href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('admin/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://cdn.tiny.cloud/1/sal2fenunu6ncg21xgbih04w97jjcb03dcwnyolxaegzevdt/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#mytextarea',
        branding : false
      });
    </script>

    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{asset('admin/css/fontastic.css')}}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="{{asset('admin/css/grasp_mobile_progress_circle-1.0.0.min.css')}}">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="{{asset('admin/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('admin/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
  </head>

  
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="{{asset('admin/img/avatar-7.jpg')}}" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5">{{Session('user')? Session('user')->username:''}}</h2><span>Admin</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>AG</strong><strong class="text-primary">OS</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading"></h5>
          <ul id="side-main-menu" class="side-menu list-unstyled"> 
          <li class=""><a  href="adminhome"> <i class="icon-home"></i>Home</a></li>
          <li class=""><a href="/getallorder"><i class="fal fa-shopping-cart"></i>Order Details</a></li>             
            <ul id="side-main-menu" class="side-menu list-unstyled">                  
           <li><a href="#exampledropdownDropdown" aria-expanded="" data-toggle="collapse" class=""> <i class="fas fa-edit"></i>Change-Edit</a>
              <ul id="exampledropdownDropdown" class="list-unstyled collapse " style="">
                <li class=""><a href="banner">Banner</a></li>
               
              </ul>
            </li>          
          </ul>
          <li class=""><a  href="/product"> <i class="fas fa-align-justify"></i>Product</a></li>
          <li class=""><a  href="/blog"> <i class="fas fa-blog"></i>Blog</a></li>
          <li class=""><a href="/faqshow"> <i class="fas fa-question-circle"></i>Faq</a></li>
         
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
           <li><a href="#exampledropdownDropdownn" aria-expanded="" data-toggle="collapse" class=""><i class="fas fa-badge-dollar"></i>Deal Of week Section</a>
              <ul id="exampledropdownDropdownn" class="list-unstyled collapse " style="">
              <li class=""><a href="/dealofweek"> <i class="fad fa-bolt"></i>Add deal of week</a></li>
              <li class=""><a href="/check"><i class="fas fa-list-alt"></i>check deal of week</a></li>
              </ul>
            </li>          
          </ul>
          <li class=""><a href="/subs"><i class="fas fa-angle-double-up"></i>Customer Subscription</a></li>
        </div>     
        

      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span>AGOS </span><strong class="text-primary">&nbsp &nbsp Dashboard</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                
                <!-- Log out-->
                <li class="nav-item"><a href="adminlogout" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!-- Counts Section -->
      <section class="dashboard-counts section-padding">
        <div class="container-fluid">
            <!-- Count item widget-->
           @section('content')        
           @show
           <!-- if any error then wrapped only one row div class -->
            <!-- Count item widget-->
        
        </div>
      </section>
      
      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Agos&copy;</p>
            </div>
            <div class="col-sm-6 text-right">
          <p class="text-success">Year&nbsp<script>document.write(new Date().getFullYear());</script></p>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/js/grasp_mobile_progress_circle-1.0.0.min.js')}}"></script>
    <script src="{{asset('admin/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admin/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admin/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <!-- Main File-->
    <script src="{{asset('admin/js/front.js')}}"></script>
  </body>
</html>