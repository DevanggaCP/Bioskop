@extends('layouts.app')

@section('content')
    @include('layouts/components/frontend/slider')
    <div class="movie-items">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-12">
                    <div class="title-hd">
                        <h2>film bioskop</h2>
                        <a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
                    </div>
                    <div class="tabs">
                        <ul class="tab-links">
                            <li class="active"><a href="#tab1">#Popular</a></li>                        
                        </ul>
                        <div class="tab-content">
                            <div id="tab1" class="tab active">
                                <div class="row"> 
                                    <div class="slick-multiItem">
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{asset('frontend/images/uploads/mv-item1.jpg')}}" alt="" width="185" height="284">
                                                </div> 
                                                <div class="hvr-inner">
                                                    <a  href="moviesingle.html"><p>Read more</p><i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{asset('frontend/images/uploads/mv-item2.jpg')}}" alt="" width="185" height="284">
                                                </div> 
                                                <div class="hvr-inner">
                                                    <a  href="moviesingle.html"><p>Read more</p><i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{asset('frontend/images/uploads/mv-item3.jpg')}}" alt="" width="185" height="284">
                                                </div> 
                                                <div class="hvr-inner">
                                                    <a  href="moviesingle.html"><p>Read more</p><i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{asset('frontend/images/uploads/mv-item4.jpg')}}" alt="" width="185" height="284">
                                                </div> 
                                                <div class="hvr-inner">
                                                    <a  href="moviesingle.html"><p>Read more</p><i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{asset('frontend/images/uploads/mv-item5.jpg')}}" alt="" width="185" height="284">
                                                </div> 
                                                <div class="hvr-inner">
                                                    <a  href="moviesingle.html"><p>Read more</p><i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{asset('frontend/images/uploads/mv-item6.jpg')}}" alt="" width="185" height="284">
                                                </div> 
                                                <div class="hvr-inner">
                                                    <a  href="moviesingle.html"><p>Read more</p><i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{asset('frontend/images/uploads/mv-item7.jpg')}}" alt="" width="185" height="284">
                                                </div> 
                                                <div class="hvr-inner">
                                                    <a  href="moviesingle.html"><p>Read more</p><i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{asset('frontend/images/uploads/mv-item8.jpg')}}" alt="" width="185" height="284">
                                                </div> 
                                                <div class="hvr-inner">
                                                    <a  href="moviesingle.html"><p>Read more</p><i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{asset('frontend/images/uploads/mv-item9.jpg')}}" alt="" width="185" height="284">
                                                </div> 
                                                <div class="hvr-inner">
                                                    <a  href="moviesingle.html"><p>Read more</p><i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
