@extends('user.templete')
@section('content')
@section('title','blogDetails')
    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
    
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner">
                        <div class="blog-detail-title">
                            <h2>{{$data['title']}}</h2>
                            <p>{{$data['concept']}}<span>{{$data['date']}}</span></p>
                        </div>
                        <div class="row">
                        <div class="md-col-6 ml-5">
                            <img class="" src="/blogsimage/{{$data['image']}}" alt="">
                        </div>
                        <div class="blog-detail-desc ml-5 md-col-6">
                            <p>{{$data['description']}}</p>
                            <a href="/blogs"><button class="btn btn-primary" >Check More Blogs</button></a>
                        </div>
                        </div>
                        <div class="blog-more">
                            <div class="row">
                                <div class="col-sm-4">
                                    <img src="img/blog/blog-detail-1.jpg" alt="">
                                </div>
                                <div class="col-sm-4">
                                    <img src="img/blog/blog-detail-2.jpg" alt="">
                                </div>
                                <div class="col-sm-4">
                                    <img src="img/blog/blog-detail-3.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="tag-share">
                            <div class="details-tag">
                                <ul>
                                    <li><i class="fa fa-tags"></i></li>
                                    <li>{{$data['tags']}}</li>
                                </ul>
                               
                            </div>
                            <div class="blog-share">
                                <span>Share:</span>
                                <div class="social-links">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection()
