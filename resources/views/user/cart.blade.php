@extends('user.templete')
@section('content')
@section('title','Cart')

<style>
@media only screen 
and (min-device-width : 768px) 
and (max-device-width : 1024px) {
.height{
    height:200px;
}
}
@media only screen 
and (min-width : 1224px) {
    .height{
    height:200px;
}
}
.online{
    text-decoration:line-through;
}
</style>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>producages</th>
                                    <th class="">Product Name</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Sale price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $list)
                                <tr>
                                    <td class="cart-pic first-row "><img src="/products/{{$list->photo}}" class="height" alt=""></td>
                                    <td class=" first-row">
                                        <h5>{{$list->name}}</h5>
                                    </td>
                                    <td class="total-price online first-row">{{$list->price}}</td>
                                    <td class="total-price  first-row">{{$list->price-$list->sale_price}}</td>
                                    
                                    <td class="p-price  first-row">{{$list->sale_price}}</td>
                                    <td  class="close-td first-row"><a href="/removecart/{{$list->cart_id}}"><i class="ti-close text-dark"></i></a></td>
                                </tr>
                              @endforeach 
                              
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                                <a href="#" class="primary-btn up-cart">Update cart</a>
                            </div>
                            <div class="discount-coupon">
                                <h6>Discount Codes</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your codes">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Subtotal <span>{{$amount}}</span></li>
                                    <li class="cart-total">Total <span>{{$amount}}</span></li>
                                </ul>
                                <a href="checkoutlist" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection()