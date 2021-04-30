@extends('user.templete')
@section('content')
@section('title','CheckOut')
<style>
.red{
    color:red;
}
</style>


    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="/home"><i class="fa fa-home"></i> Home</a>
                        <a href="/shop">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
    
        <div class="container">
        <div class="errors">
        
        </div>
            <form action="/orderplace" method="post" class="checkout-form">
                <div class="row">
                    <div class="col-lg-6">
                        @csrf
                        <h4>Biiling Details</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="fir">First Name<span>*</span></label><br>
                                @error('firstname')
                                   <small class="red"> *{{$message}}</small>
                                @enderror
                                <input type="text" value="{{ old('firstname')}}" name="firstname" id="fir">
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Last Name<span>*</span></label><br>
                                @error('lastname')
                                   <small class="red"> *{{$message}}</small>
                                @enderror
                                <input type="text" value="{{ old('lastname')}}" name="lastname" id="last">
                            </div>
                           
                            <div class="col-lg-12">
                                <label for="street">Street Address<span>*</span></label><br>
                                @error('streetaddress')
                                   <small class="red"> *{{$message}}</small>
                                @enderror
                                <input type="text" value="{{ old('streetaddress')}}" name="streetaddress" id="street" class="street-first">
                        
                            </div>
                            <div class="col-lg-12">
                                <label for="zip">Postcode / ZIP (optional)</label><br>
                                @error('zip')
                                   <small class="red"> *{{$message}}</small>
                                @enderror
                              
                                <input type="text" value="{{ old('zip') }}" name="zip" id="zip">
                            </div>
                            <div class="col-lg-12">
                                <label for="town">Town / City<span>*</span></label><br>
                                @error('city')
                                   <small class="red"> *{{$message}}</small>
                                @enderror
                                <input type="text" value="{{ old('city')}}" name="city" id="town">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email Address<span>*</span></label><br>
                                @error('email')
                                   <small class="red"> *{{$message}}</small>
                                @enderror
                                <input type="text" value="{{ old('email')}}"  name="email" id="email">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone<span>*</span></label><br>
                                @error('phone')
                                   <small class="red"> *{{$message}}</small>
                                @enderror
                                <input type="text" value="{{ old('phone')}}" name="phone" id="phone">
                            </div>
                            
                        </div>    
                    </div>
                    
                    <div class="col-lg-6">
                   
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                    @foreach($products as $list)
                                    <li class="fw-normal">{{$list->name}}<span>{{$list->sale_price}}Rs/-</span></li>
                                    @endforeach
                                   
                                  <div>&nbsp&nbsp</div>&nbsp
                                  <li class="fw-normal">Subtotal <span>{{$amount}}Rs/-</span></li>
                                  <li class="fw-normal">Delivery Charges<span>200.00Rs/-</span></li>
                                  
                                    <li class="total-price">Grand Total <span>{{$amount+200}}Rs/-</span></li>
                                </ul>
                                <div class="payment-check">
                                  <h4>Payment Option</h4>
                                  <label>Select Payment Method</label><br>
                                @error('payment')
                                   <small class="red"> *{{$message}}</small>
                                @enderror
                                  <select name="payment" class="form-control form-control-sm">
                                  <option value="">Select Payment Method</option>
                                     <option value="Online payment">Online Payment</option>
                                     <option value="Cash On delevery">Cash-on-delivery</option>
                                  </select>
                                </div>
                                <div class="order-btn">
                                
                                    <button type="submit" class="site-btn place-btn">Place Order Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
   
    <!-- Shopping Cart Section End -->
@endsection()