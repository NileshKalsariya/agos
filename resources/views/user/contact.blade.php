@extends('user.templete')
@section('content')
@section('title','Contact-us')
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Map Section Begin -->
    <div class="map spad">
        <div class="container">
            <div class="map-inner">
 
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3230.1812435963807!2d72.82379586618424!3d21.219586578988014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e95021f0cdd%3A0x4a36c35aea97f81f!2sHari%20Krishna%20Society%2C%20Katargam%2C%20Surat%2C%20Gujarat%20395004!5e1!3m2!1sen!2sin!4v1618056100858!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                
                <div class="icon">
                    <i class="fa fa-map-marker"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Map Section Begin -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-title">
                        <h4>Contacts Us</h4>
                        <p>Contrary to popular belief, Lorem Ipsum is simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC, maki years old.</p>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="ci-text">
                                <span>Address:</span>
                                <p>60-49 Road 23876 India</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <span>Phone:</span>
                                <p>9876543210</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="ci-text">
                                <span>Email:</span>
                                <p>agosegadgets@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="contact-form">
                        <div class="leave-comment">
                            <h4>Message</h4>
                            <p>Our staff will Email back later and answer your questions.</p>
                            <form action="contact" class="comment-form" method="post">
                            
                                <div class="row">
                                <div class="col-lg-12">
                                 @if(Session::get('message_sent'))
                                 <div class='alert alert-success' role="slert">
                                     {{Session::get('message_sent')}}
                                 </div>
                                 </div>
                                 @endif
                                    <div class="col-lg-6 ">
                                    @error('name')
                                        <h6 class='red'>*{{$message}}</h6>
                                    @enderror
                                     Name:   <input type="text" class="shadow-lg p-3 mb-5 bg-white rounded" name="name" placeholder="Your name">
                                    </div>
                                    @error('email')
                                        <h6 class='red'>*{{$message}}</h6>
                                    @enderror
                                    @csrf
                                    <div class="col-lg-6">
                                       Email: <input type="text" class="shadow-lg p-3 mb-5 bg-white rounded" name="email" placeholder="Your email">
                                    </div>
                                    
                                    <div class="col-lg-12">
                            
                                       
                                    @error('msg')
                                        <h6 class='red'>*{{$message}}</h6>
                                    @enderror
                                        <div class="form-group purple-border"> 
                                            <label for="exampleFormControlTextarea4">Enter your message</label>
                                            <textarea class="form-control shadow-lg p-3 mb-5 bg-white rounded" id="exampleFormControlTextarea4" name='msg' rows="3"></textarea>
                                    </div>
                                        <button type="submit" class="site-btn">Send message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

   @endsection()