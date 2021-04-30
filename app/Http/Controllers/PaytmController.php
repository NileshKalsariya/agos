<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PaytmWallet;
use App\Models\Cart;
use App\Models\Order;
class PaytmController extends Controller
{
    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function paytmPayment(Request $request)
    {


      $firstname=Session()->get('firstname');
       $amount= Session()->get('amount');
      $lastname = Session()->get('lastname');
      $streetaddress = Session()->get('streetaddress');
      $zip = Session()->get('zip');
      $city= Session()->get('city');
      $email= Session()->get('email');
      $phone=Session()->get('phone');
      $payment=Session()->get('payment');
  
        $payment = PaytmWallet::with('receive');
       
        $payment->prepare([
          'order' => rand(),
          'user' => rand(10,1000),
          'mobile_number' => '123456789',
          'email' => 'paytmtest@gmail.com',
          'amount' =>$amount,
          'callback_url' => route('paytm.callback'),
        ]);
        return $payment->receive();
    }


    /**
     * Obtain the payment information.
     *
     * @return Object
     */
    public function paytmCallback(request $request)
    {
     
        $transaction = PaytmWallet::with('receive');
        
        $response = $transaction->response(); // To get raw response as array
        //Check out response parameters sent by paytm here -> http://paywithpaytm.com/developer/paytm_api_doc?target=interpreting-response-sent-by-paytm
   
        if($transaction->isSuccessful()){
          //Transaction Successful
          $userId=Session::get('userdata')['id'];
          $allCart =Cart::where('user_id',$userId)->get();
          foreach($allCart as $cart)
            { 
              $order = new Order;
              $order->product_id=$cart['product_id'];
              $order->user_id=$cart['user_id'];
              $order->first_name=Session::get('firstname');
              $order->last_name=Session::get('lastname');
              $order->address=Session::get('streetaddress');
              $order->zip=Session::get('zip');
              $order->city=Session::get('city');
              $order->email=Session::get('email');
              $order->phone=Session::get('phone');
              $order->status='Done';
              $order->payment_method=Session::get('payment');
              $order->payment_status='Done';
              $order->save();
              $allCart =Cart::where('user_id',$userId)->delete();
          }
          return view('paytm.paytm-success-page');
        }else if($transaction->isFailed()){
          //Transaction Failed
          return view('paytm.paytm-fail');
        }else if($transaction->isOpen()){
          //Transaction Open/Processing
          return view('paytm.paytm-fail');
        }
        $transaction->getResponseMessage(); //Get Response Message If Available
        //get important parameters via public methods
        $transaction->getOrderId(); // Get order id
        $transaction->getTransactionId(); // Get transaction id
    }

    /**
     * Paytm Payment Page
     *
     * @return Object
     */
    public function paytmPurchase()
    {
        return view('paytm.payment-page');
    } 
}