@extends('user.templete')
 
@section('title','Agos-FAQ')
 @section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>FAQs</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Faq Section Begin -->
    <div class="faq-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-accordin">
                        <div class="accordion" id="accordionExample">
                          @foreach($data as $que)
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapse{{$que->id}}">
                                      {{$que->question}}
                                    </a>
                                </div>
                                <div id="collapse{{$que->id}}" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>{{$que->answer}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection()
    <!-- Faq Section End -->
