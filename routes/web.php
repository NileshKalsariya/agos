<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileUpdateController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\quickadminAdd;
use App\Http\Controllers\QuickAdd;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FatchProductController;
use App\Http\Controllers\ProductEditController;
use App\Http\Controllers\ProductDeleteController;
use App\Http\Controllers\MainShopPageController;
use App\Http\Controllers\Pro_detail_Controller;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeFromBlog;
use App\Http\Controllers\MainPostDetail;
use App\Http\Controllers\BloglistPageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProceedTocheckOut;
use App\Http\Controllers\allAgosUsers;
use App\Http\Controllers\OrderPlace;
use App\Http\Controllers\navigationProductController;
use App\Http\Controllers\findItem;
use App\Http\Controllers\slidercatagory;
use App\Http\Controllers\HomePageSidePic;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\dealofweekController;
use App\Http\Controllers\SubscriptionController;
use App\http\Controllers\Getallorder;
use App\Http\Controllers\PaytmController;
use App\Http\Controllers\Myorders;
use App\http\Controllers\clearcart;
use App\http\Controllers\SearchadminPro;
use App\http\Controllers\ShopProfileController;
use App\http\Controllers\CheckProfExistOrNotController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
route::get('adnewAdmin',[QuickAdd::class,'add']);

Route::get('agos',function(){
  if(Session::get('userdata')){
    return redirect('home');
  }else{
    return redirect('login');
  }
});


Route::get('login', function () {
    if(Session::get('userdata')){
        return redirect('home');
    }
    return view('user.login');
});
Route::get('register', function () {
    if(Session::get('userdata')){
        return redirect('home');
    }
    return view('user.register');
});
Route::post('register',[RegisterController::class,'addUser']);
route::post('login',[RegisterController::class,'Login']);
route::post('/spro',[SearchadminPro::class,'index']);
route::group(['middleware'=>'login'],function(){
  //   Route::get('home/{catagory?}',function(){
  //       return view('user.home');
        
  //  });  
  route::get('home/{catagory?}',[slidercatagory::class,'getdata']);
  route::get('home/second/{catagory?}',[slidercatagory::class,'getdata2']);

   Route::get('userprofile',function(){
    return view('user.userprofile');
  });
  Route::get('checkoutlist',[ProceedTocheckOut::class,'checkout']);
route::get('cartlist',[CartController::class,'cartview']);
route::get('removecart/{id}',[CartController::class,'removecart']);
route::get('removecartfrom/{id}',[CartController::class,'removecarfmrom']);
Route::get('shop',[MainShopPageController::class,'fetchShop']);
// route::get('detail',function(){
//   return view('user.detail');
// })->name('detail');
route::post('cart',[CartController::class,'add']);
route::get('/myorders',[Myorders::class,'data']);
route::post('/search',[SearchController::class,'Search']);
route::get('/faq',[FaqController::class,'showmain']);
route::get('blogs',[BloglistPageController::class,'moreBlogs']);
route::get('blog-detail/{id}',[MainPostDetail::class,'showpost']);
route::get('/setcatagory/{catagory}',[slidercatagory::class,'slideproductwice']);
// route::get('contact',function(){
//     return view('user.contact');
// });
route::get('/clearcart',[clearcart::class,'clear']);
route::get('contact',[ContactController::class,'contact']);
});
route::post('updateprofile',[ProfileUpdateController::class,'Update']);
route::post('contact',[ContactController::class,'sendEmail']);
route::get('finditem/{catagory}',[findItem::class,'findItemSendToSHop']);
route::post('/subscription',[SubscriptionController::class,'add']);
route::post('/shopprof',[ShopProfileController::class,'add']);
route::get('temp',function(){
  return view('user.templete');
});
route::get('op',[navigationProductController::class,'getcatagory']);

route::get('pro_detail/{id}',[Pro_detail_Controller::class,'productDetail']);
route::post('orderplace',[OrderPlace::class,'order']);
route::get('logout',function(){
    if(Session::get('userdata')){
        Session::pull('userdata');
      
            return redirect('login')->with(Session::get('profileupdate'));
        
    }

});


// -------------mail---------------

// route::get('sendmail',function(){
//    $to_name='nilesh kalsariya';
//    $to_email='nileshkalsariya6@gmail.com';
//    $data=array('name'=>'Dhaval','body'=>'test mail');
//    Mail::send('mail',$data,function($message)use ($to_name,$to_email){
//     $message->to($to_email)  
//     ->subject('Thanks for signing up with AGOS-all gedgets in one shop');
//    });
//    echo 'email sent';
// });
route::get('/dop',[CheckProfExistOrNotController::class,'chekingprof']);
           
            //  for admin
route::group(['middleware'=>'adminlogin'],function(){
  route::post('adminlogin',[AdminController::class,'index']);
  route::get('adminpanel',function(){
    return view('admin.login');
  });
  route::get('adminhome',function(){
    return view('admin.adminhome');
  });
  route::get('adminlogout',function(){
    Session::forget('user');
    return redirect('adminpanel');
  });
  route::get('banner',[BannerController::class,'bannerDetais']);
  route::get('addbanners',function(){
    return view('admin.banner');
  });
  
  route::post('discription',[BannerController::class,'bannerAdd']);
  route::get('/AdminControl',[allAgosUsers::class,'allusers']);
  route::get('RemoveAdd/{id}',[BannerController::class,'RemoveBanner']);
  route::get('editAdd/{id}',[BannerController::class,'EditBanner']);
  route::post('update',[BannerController::class,'UpdateBanner']);
  route::get('product',[FatchProductController::class,'fetchproduct']);
  route::post('addproduct',[ProductController::class,'Addproduct']);
  route::get('addproduct',function(){
            return view('admin.addproduct');
  });
  route::get('/productedit/{id}',[ProductEditController::class,'productedit']);
  route::get('/productdelete/{id}',[ProductDeleteController::class,'ProductDelete']);
 route::post('/editproduct',[ProductEditController::class,'Edit']);
route::get('/userlist',[allAgosUsers::class,'fetchusers']);
 route::get('/blog',[BlogController::class,'show']);
 route::get('/add',[BlogController::class,'add']);
 route::post('/addpost',[BlogController::class,'addpost']);
 route::get('/deleteblog/{id}',[BlogController::class,'deleteblog']);
 route::get('/posttedit/{id}',[BlogController::class,'showblog']);
 route::post('/editblog',[BlogController::class,'editblog']);
 route::get('/mm',[HomeFromBlog::class,'bannerlist']);
 route::get('addfaq',[FaqController::class,'index']);
 route::post('storefaq',[FaqController::class,'store']);
 route::get('/faqshow',[FaqController::class,'show']);
 route::get('/faqedit/{id?}',[FaqController::class,'showedit']);
 route::get('/editfaq',function(){
        return view('admin.editfaq');
 });
 
 route::post('/editnstore',[FaqController::class,'editnstore']);
 route::get('/faqdelete/{id}',[FaqController::class,'delete']);
route::get('/dealofweek',[dealofweekController::class,'add']);
route::get("/check",[dealofweekController::class,'check']);
route::get('/subs',[SubscriptionController::class,'list']);
route::get('/getallorder',[Getallorder::class,'getdata']);
});

//----------------------Paytm routes---------------------------//
Route::get('paytm-payment',[PaytmController::Class, 'paytmPayment'])->name('paytm.payment');
Route::post('paytm-callback',[PaytmController::Class, 'paytmCallback'])->name('paytm.callback');
Route::get('paytm-purchase',[PaytmController::Class, 'paytmPurchase'])->name('paytm.purchase');