<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('admin/vendor/font-awesome/css/font-awesome.min.css')}}">
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
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner">
            <div class="logo text-uppercase"><span>Agos </span><strong class="text-primary"> Dashboard</strong></div>
            <p>Agos E-gadget Online Shoping site in India - Shop Online for Electronics Gadgets,  </p>
            <form method="post" action="adminlogin" class="text-left form-validate">
              <div class="form-group-material">
                @csrf
                <input id="login-username" type="text" name="name" required data-msg="Please enter your username" class="input-material">
                <label for="login-username" class="label-material">Username</label>
              </div>
              <div class="form-group-material">
                <input id="login-password" type="password" name="password" required data-msg="Please enter your password"  class="input-material">
                <label for="login-password" class="label-material">Password</label>
              </div>
              <div class="form-group text-center"><button type="submit" id="login" href="index.html" class="btn btn-primary">Login</button>
                <!-- This should be submit button but I replaced it with <a> for demo purposes-->
              </div>
                   @if(session('fail'))
                      <p class="text-center" style='color:red';>{{Session('fail')}}</p>
                   @endif
            </form><a href="#" class="forgot-pass">Forgot Password?</a><small>Do not have an account? </small><a href="register.html" class="signup">Signup</a>
          </div>
        
        </div>
      </div>
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