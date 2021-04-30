@extends('user.templete')
 
@section('title','Login')
 @section('content')
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        
                        <h2>Register</h2>
                        <form action="register" method="post">
                            @csrf
                            <div class="group-input">
                                <label for="username">Username *</label>
                                <input type="text" name="name" id="username">
                                @error('name')
                                <div>
                               <h6 class='red'>* {{$message}} </h6>
                               </div>
                               @enderror
                            </div>
                            <div class="group-input">
                                <label for="username">Email address *</label>
                                <input type="text" name="email" id="username">
                                @error('email')
                                <div>
                               <h6 class='red'>* {{$message}} </h6>
                               </div>
                               @enderror
                            </div>
                            <div class="group-input">
                                <label for="username">Enter Mobile *</label>
                                <input type="text" name="mobile" id="username">
                                @error('mobile')
                                <div>
                               <h6 class='red'>* {{$message}} </h6>
                               </div>
                               @enderror
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="text" name="password" id="pass">
                                @error('password')
                                <div>
                               <h6 class='red'>* {{$message}} </h6>
                               </div>
                               @enderror
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Confirm Password *</label>
                                <input type="text" name="cpassword" id="con-pass">
                                @error('cpassword')
                                <div>
                               <h6 class='red'>* {{$message}} </h6>
                               </div>
                               @enderror
                            </div>
                            <button type="submit" class="site-btn register-btn">REGISTER</button>
                        </form>
                        <div class="switch-login">
                            <a href="login" class="or-login">have account Please Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
   @endsection()