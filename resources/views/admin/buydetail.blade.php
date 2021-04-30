@extends('admin.layout')

@section('title','Order Details')
@section('content')

<div class="table-responsive">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Sr. No</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">User Account</th>
      <th scope="col">Address</th>
      <th scope="col">Zip</th>
      <th scope="col">City</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Product</th>
      <th scope="col">Paid Amount</th>
      <th scope="col">Payment Status</th>
      <th scope="col">Payment Method</th> 
    </tr>
  </thead>
  <tbody>
  <?php
   $no=1;
  ?>
  @foreach($data as $list)
    <tr>
      <th scope="row">{{$no}}</th>
      <td>{{$list->first_name}}</td>
      <td>{{$list->last_name}}</td>
      <td>{{$list->acholder}}</td>
      <td>{{$list->address}}</td>
      <td>{{$list->zip}}</td>
      <td>{{$list->city}}</td>
      <td>{{$list->phone}}</td>
      <td>{{$list->email}}</td>
      <td>{{$list->pname}}</td>
      <td>{{$list->sale_price+200}}</td>
      <td>{{$list->payment_status}}</td>
      <td>{{$list->payment_method}}</td>
    </tr>
    <?php
   $no++
    ?>
    @endforeach
  </tbody>
  </table>
</div>

@endsection