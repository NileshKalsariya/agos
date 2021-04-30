@extends('admin.layout')
@section('title','Faq')
@section('content')
<style>
.bg{
    background-color:#C0C0C0;
}

</style>
@if(Session::get('success'))
<div class="alert alert-success">
   {{Session::get('success')}}
</div>
@endif
<form>
<div class="my-3">
<button formaction="/addfaq" class="btn btn-success">Add more</button>
</div>
</form>
@foreach($data as $list)
<div class="card shadow">
  <div class="card-header bg">
   <h5 class="card-title">  {{$list->question}}</h5>
  </div>
  <div class="card-body">
    <p class="card-text">{{$list->answer}}</p>
    <a href="/faqedit/{{$list->id}}" class="btn px-4 btn-primary">Edit</a>
    <a href="/faqdelete/{{$list->id}}" class="btn pr-4 pl-4 btn-danger">Remove</a>
  </div>
</div>
@endforeach

{{$data->links('pagination::bootstrap-4')}}

@endsection