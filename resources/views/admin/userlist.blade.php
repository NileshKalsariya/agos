@extends('admin.layout')
@section('title','Agos')
@section('content')
<table class="table my-5">
  <thead class="thead-dark">
    <tr>
      <th scope="col">user id</th>
      <th scope="col">user name</th>
      <th scope="col">user mobile</th>
      <th scope="col">user email</th>
    </tr>
  </thead>
  <tbody>

  @foreach($users as $list)
    <tr>
      <th scope="row">{{$list->id}}</th>
      <td>{{$list->name}}</td>
      <td>{{$list->mobile}}</td>
      <td>{{$list->email}}</td>
    </tr>
   @endforeach
  </tbody>
</table>
@endsection()