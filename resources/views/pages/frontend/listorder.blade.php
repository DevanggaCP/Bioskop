@extends('layouts.app')

@section('content')
<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>{{ Auth::user()->name }} Order</h1>
					<ul class="breadcumb">
						<li class="active"><a href="/">Home</a></li>
						<li> <span class="ion-ios-arrow-right"></span>List Order</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single userfav_list">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-12 col-sm-12 col-xs-12">
				@if ($errors->any())
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<div class="topbar-filter user">
					<p>Found <span>{{ $tiketCount }} Transaction</span> in total</p>
					<a href="#" class="list"><i class="ion-ios-list-outline active"></i></a>
				</div>
				<div class="flex-wrap-movielist user-fav-list">
                    @foreach ($tiketById as $item)
                        <div class="movie-item-style-2">
                            <img src="{{ Storage::disk('mediaPoster')->url($item->poster) }}" alt="" style="height: 200px">
                            <div class="mv-item-infor">
                                <h6><a href="#">{{ $item->namafilm }} - {{ $item->namaRuang }}</a></h6>
                                <p class="describe">{{ substr( $item->sinopsis, 0, 50)}} ...</p>
                                <p class="run-time"> Jumlah Tiket: {{ $item->jumlahTiket }}</p>
                                <p class="run-time"> Jam tayang: {{ date("d-M-Y", strtotime($item->tanggal)) }} / {{$item->waktu}}</p>
                                <p class="run-time"> Durasi:  {{ $item->durasi }}   .    <span>Release: {{ date("d-M-Y", strtotime($item->created_at)) }}</span></p>
                                <p class="run-time"> Status pembayaran: {{ $item->status }}</p>
                                @if ($item->status== 'checkout')
                                    <a href="/transaction/lunasi/{{$item->id}}">Lunasi</a>
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