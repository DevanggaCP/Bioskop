@extends('layouts.app')

@section('content')
<div class="hero mv-single-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- <h1> movie listing - list</h1>
				<ul class="breadcumb">
					<li class="active"><a href="#">Home</a></li>
					<li> <span class="ion-ios-arrow-right"></span> movie listing</li>
				</ul> -->
			</div>
		</div>
	</div>
</div>
<div class="page-single movie_list">
    <div class="container">
        <div class="row ipad-width2">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="topbar-filter">
                    <p>Found <span>{{$scheduleCount}} jadwal</span> in total</p>
                    <a href="{{ route('nonton.public') }}" class="list"><i class="ion-ios-list-outline active"></i></a>
                </div>
                <div class="flex-wrap-movielist">
                    @foreach ($schedule as $item)
                        <div class="movie-item-style-2 movie-item-style-1">
                            <img src="{{ Storage::disk('mediaPoster')->url($item['movie']['poster']) }}" alt="">
                            <div class="hvr-inner">
                                @if (Auth::user() != null)
                                    <a href="transaction/add/{{$item['id']}}"> Detail<i class="ion-android-arrow-dropright"></i> </a>
                                @else
                                    <a href="/login"> login dulu <i class="ion-android-arrow-dropright"></i> </a>
                                @endif
                            </div>
                            <div class="mv-item-infor">
                                @if (Auth::user() != null)
                                    <h6><a href="transaction/add/{{$item['id']}}">{{ $item['movie']['namafilm'] }}</a></h6>
                                @else
                                    <h6><a href="">{{ $item['movie']['namafilm'] }}</a></h6>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>	
            </div>
        </div>
    </div>
</div>
@endsection