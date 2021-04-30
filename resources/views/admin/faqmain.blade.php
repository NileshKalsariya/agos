@extends('admin.layout')
@section('title','Faq add')


@section('content')
<form action='storefaq' method="post">
<div class="form-group">
    <label for="inputAddress">Question</label>
  @error('question')
  <p class="text-danger">*{{$message}}</p>
  @enderror
    <input type="text" name="question" class="form-control" id="inputAddress" >
  </div>
@csrf
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Answer</label>
    @error('answer')
  <p class="text-danger">*{{$message}}</p>
  @enderror
    <textarea class="form-control" name="answer" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class='float-right'>
  <button type="submit" class="btn btn-success ">save</button>
  </div>
</form>
@endsection()