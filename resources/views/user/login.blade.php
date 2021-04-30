@extends('user.templete')
 
@section('title','Login')
 @section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Login</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Section Begin -->
    <div class="register-login-section ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                <div class="status-msg container">
       @if(Session::get('profileupdate'))
       <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong></strong> {{Session::get('profileupdate')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> 
      </div>
       @endif

    <!-- message for login -->
    @if(Session::get('status'))
           <div class="status container my-1">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong></strong> {{Session::get('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> 
      </div>
           </div>
           @endif


           @if(Session::get('logfailed'))
           <div class="status container my-1">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong></strong> {{Session::get('logfailed')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> 
      </div>
           </div>
           @endif
                    <div class="login-form">
                        <h2>Login</h2>
                        <form action="login" method="post">
                            <div class="group-input">
                                <label for="username"> email address *</label>
                                <input type="text" name="email" id="username">
                            </div>
                            @csrf
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password" name="password" id="pass">
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Save Password
                                        <input type="checkbox" id="save-pass">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="#" class="forget-pass">Forget your Password</a>
                                </div>
                            </div>
                            <button type="submit" class="site-btn login-btn">Sign In</button>
                        </form>
                        <div class="switch-login">
                            <a href="register" class="or-login">Or Create An Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->

    @endsection()
    <!-- Partner Logo Section End -->
