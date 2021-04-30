@extends('admin.layout')
@section('content')
@section('title','Admin')
<div class="my-2">
<a href="/AdminControl"><button class="btn btn-dark" style="border-radius:5px;">Explore</button></a>
</div>
<div class="mt-3">
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/images/team.png" width='100%vw'>
    </div>
     <div class="carousel-item">
     <img src="/images/team2.png" width='100%vw'>
    </div>
     <div class="carousel-item">
     <img src="/images/team3.png" width='100%vw'>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>






@endsection()