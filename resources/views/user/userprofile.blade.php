<?php
use App\Http\Controllers\CheckProfExistOrNotController;
if(Session::get('userdata')){
 $data=CheckProfExistOrNotController::getshopingdata();
 if($data=='nodata'){
   $data=null;
 }
}
?>
@extends('user.templete')
@section('content');
@section('title',Session::get('userdata')['name'])
    <div class="status-msg container">
       @if(Session::get('profileupdate'))
       <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong></strong> {{Session::get('profileupdate')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> 
      </div>
       @endif
    </div>
   <div class="container">
   <h4>user profile</h4>
   </div>
    <div class="container pt-5">
    
    <div class="row mb-3">
     <div class="col-md-6">
         <div class="card shadow-lg p-3 mb-5 bg-white rounded">
            <div class="card-header bg-dark">
                 <h6 class="text-white">Profile</h6>
            </div>
            <div class="card-body  disabled">
                 <div class="col p-3">
                    <div class="col-md-6 pt-3">
                      <h6>Username:</h6>
                      <input type="text" class="disabled" disabled value="{{Session::get('userdata')['name']}}">
                    </div>

                    <div class="col-md-6 pt-3">
                    <h6>Email:</h6>
                    <input type="text" class="disabled" disabled value="{{Session::get('userdata')['email']}}">
                    </div>

                    <div class="col-md-6 pt-3">
                    <h6>Mobile:</h6>
                    <input type="text"  class="disabled" disabled value="{{Session::get('userdata')['mobile']}}">
                    </div>

                   

                 </div>
            </div>
         </div>
     </div>
     <div class="col-md-6">
     <form method="post" action="updateprofile">
         <div class="card shadow-lg p-3 mb-5 bg-white rounded">
         
            <div class="card-header bg-primary">
                 <h6 class="text-white">Make Changes</h6>
            </div>
            <div class="car-body ">
                 <div class="col p-3">
                    <div class="col-md-6 pt-3">
                      <h6>Change Username:</h6>
                      <input type="text" name="name">
                      @error('name')
                      <h6 class="red">{{$message}}</h6>
                      @enderror
                    </div>
                    <input type="text" hidden name="id" value="{{Session::get('userdata')['id']}}">
                     @csrf
                    <div class="col-md-6 pt-3">
                    <h6>Change Email:</h6>
                    <input type="text" name="email">
                    @error('email')
                      <h6 class="red">{{$message}}</h6>
                      @enderror
                    </div>

                    <div class="col-md-6 pt-3">
                    <h6>Change Mobile:</h6>
                    <input type="text" name="mobile">
                    @error('mobile')
                    <h6 class="red">{{$message}}</h6>
                      @enderror
                    </div>
                 
                

                    <div class="col-md-6 pt-3">
                    <h6>Change Password:</h6>
                    <input type="text" name="password">
                    @error('password')
                    <h6 class="red">{{$message}}</h6>
                      @enderror
                    </div>
                 </div>
                 
            </div>
            <button type="submit" class="btn btn-success">Save Changes</button>
            </form>
         </div>
     </div>
     </div>

    </div> 
      @if($data!=null)
    <div class="container">
   <h4>Shoping profile</h4>
   </div>
    <div class="container">
        <div class='row mt-5'>
          <div class="col-md-6">
            <div class="form-group">
                  <label>first name:</label>
                  <input type="text" class="form-control" disabled value="{{$data[0]['firstname']}}">
                </div>  
                
                <div class="form-group">
                  <label>Last name:</label>
                  <input type="text" class="form-control" disabled value="{{$data[0]['lastname']}}">
                </div>
                
                <div class="form-group">
                  <label>Street address</label>
                  <input type="text" class="form-control" disabled value="{{$data[0]['streetaddress']}}">
                </div>

                
                      
            </div>
            <div class='col-md-6'>
            
            <div class="form-group">
                  <label>zip</label>
                  <input type="text" class="form-control" disabled value="{{$data[0]['zip']}}">
                </div>
                
                <div class="form-group">
                  <label>city</label>
                  <input type="text" class="form-control" disabled value="{{$data[0]['city']}}">
                </div>
                <div class="form-group">
                  <label>email</label>
                  <input type="text" class="form-control" disabled value="{{$data[0]['email']}}">
                </div>
                
                <div class="form-group">
                  <label>phone</label>
                  <input type="text" class="form-control" disabled value="{{$data[0]['phone']}}">
                </div>    
            </div>
        </div>
          
    </div>   
    @else
    <div class='container'>
       <h4>Please fill shoping profile</h4>
      <span>Click here</span> <a style="color:blue; cursor:pointer;" data-target="#shopprofile" style="cursor:pointer;" data-toggle="modal">Shop Profile</a>
    </div>
    @endif
@endsection()


