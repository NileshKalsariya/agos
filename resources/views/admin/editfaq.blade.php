@extends('admin.layout')
@section('title','Faq add')


@section('content')
<form action='/editnstore' method="post">
<div class="form-group">
    <label for="inputAddress">Question</label>
  @error('question')
  <p class="text-danger">*{{$message}}</p>
  @enderror
    <input type="text" value='{{$data->question}}' name="question" class="form-control" id="inputAddress" >
  </div>
@csrf
<input type="hidden" value="{{$data->id}}" name='id'>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Answer</label>
    @error('answer')
  <p class="text-danger">*{{$message}}</p>
  @enderror
    <textarea class="form-control"  name="answer" id="exampleFormControlTextarea1" rows="3">{{$data->answer}}</textarea>
  </div>
  <div class='float-right'>
  <button type="submit" class="btn btn-success ">save</button>
  </div>
</form>
@endsection()