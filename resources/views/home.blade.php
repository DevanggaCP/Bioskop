@extends('layouts.app')

@section('content')
    <div class="slider movie-items">
        <div class="container">
            <div class="row">
                <div class="social-link">
                    <p>Follow us: </p>
                    <a href="#"><i class="ion-social-facebook"></i></a>
                    <a href="#"><i class="ion-social-twitter"></i></a>
                    <a href="#"><i class="ion-social-googleplus"></i></a>
                    <a href="#"><i class="ion-social-youtube"></i></a>
                </div>
                <div class="slick-multiItemSlider">
                    @foreach ($movie as $item)
                        <div class="movie-item">
                            <div class="mv-img">
                                <a href="#"><img src="{{ Storage::disk('mediaPoster')->url($item['poster']) }}" alt="" width="285" height="437"></a>
                            </div>
                            <div class="title-in">
                                <div class="cate">
                                    <span class="blue"><a href="#">{{$item['category']['nama']}}</a></span>
                                </div>
                                <h6><a href="movie/{{$item['id']}}">{{ $item['namafilm'] }}</a></h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="movie-items">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-12">
                    <div class="title-hd">
                        <h2>film bioskop</h2>
                        <a href="/movie" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
                    </div>
                    <div class="tabs">
                        <ul class="tab-links">
                            <li class="active"><a href="#tab1">#Popular</a></li>                        
                        </ul>
                        <div class="tab-content">
                            <div id="tab1" class="tab active">
                                <div class="row"> 
                                    <div class="slick-multiItem">
                                        @foreach ($movieAll as $item)
                                            <div class="slide-it">
                                                <div class="movie-item">
                                                    <div class="mv-img">
                                                        <img src="{{ Storage::disk('mediaPoster')->url($item['poster']) }}" alt="" width="185" height="284">
                                                    </div> 
                                                    <div class="hvr-inner">
                                                        <a href="movie/{{$item['id']}}"><p>Read more</p><i class="ion-android-arrow-dropright"></i> </a>
                                                    </div>
                                                    <div class="title-in">
                                                        <h6><a href="movie/{{$item['id']}}">{{$item['namafilm']}}</a></h6>
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
            </div>
        </div>
    </div>
@endsection
