@extends('layouts.app')

@section('content')
    @include('layouts/components/frontend/hero')
    <div class="page-single movie_list">
        <div class="container">
            <div class="row ipad-width2">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="topbar-filter">
                        <p>Found <span>{{$movieCount}} movies</span> in total</p>
                        <a href="{{ route('movie.public') }}" class="list"><i class="ion-ios-list-outline active"></i></a>
                    </div>
                    <div class="flex-wrap-movielist">
                        @foreach ($movie as $item)
                            <div class="movie-item-style-2 movie-item-style-1">
                                <img src="{{ Storage::disk('mediaPoster')->url($item['poster']) }}" alt="">
                                <div class="hvr-inner">
                                    <a  href="moviesingle.html"> Detail <i class="ion-android-arrow-dropright"></i> </a>
                                </div>
                                <div class="mv-item-infor">
                                    <h6><a href="#">{{ $item['namafilm'] }}</a></h6>
                                </div>
                            </div>
                        @endforeach
                    </div>	
                </div>
            </div>
        </div>
    </div>
    @endsection
