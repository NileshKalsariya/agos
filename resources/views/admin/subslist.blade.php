@extends('admin.layout')
@section('content')
@section('title','Customer Subscription')
<div class="container">

<b>Customer Subscription Emails:</b>
  
  <table class="table mt-3">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th>Email</th>
        <th>Added at</th>
      </tr>
    </thead>
    <tbody>
    <?php
   $no=1
    ?>
    @foreach($datas as $data)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$data->email_id}}</td>
        <td>{{$data->created_at}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection