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
<div class="page-single movie-single">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="movie-img sticky-sb">
					<img src="{{ Storage::disk('mediaPoster')->url($schedule['movie']['poster']) }}" alt="">

				</div>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="movie-single-ct main-content">
					<h1 class="bd-hd">{{ $schedule['movie']['namafilm'] }}</h1>
	
					<div class="movie-tabs">
						<div class="tabs">
							<ul class="tab-links tabs-mv">
								<li class="active"><a href="#overview">Sinopsis</a></li>                  
							</ul>
						    <div class="tab-content">
						        <div id="overview" class="tab active">
						            <div class="row">
						            	<div class="col-md-12 col-sm-12 col-xs-12">
						            		<p>{{ $schedule['movie']['sinopsis'] }}</p>
                                            <div class="title-hd-sm">
												<h4>Pesan Tiket</h4>
                                                <p>Lengkapi data dibawah ini</p>
											</div>
                                            <div class="row">
                                                <div class="col-md-12">
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
                                                    <form class="form-style-1" enctype="multipart/form-data" action="{{ route('transaction.lunasi.public') }}" method="POST">
                                                        @csrf
                                                        <div class="card">
                                                            <div class="card-body mt-4">
                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">Pengguna</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="form-group">
                                                                            <select class="form-control" name="user" id="user" required="true" aria-readonly="true">
                                                                                <option value="{{auth()->user()->id}}">{{auth()->user()->name}}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">Jadwal</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="form-group">    
                                                                            <select class="form-control" name="schedule" id="schedule" required="true">
                                                                                <option value="{{$schedule['id']}}">{{$schedule['room']['namaRuang']}} - {{ $schedule['movie']['namafilm'] }}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">Jumlah Tiket</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="form-group">
                                                                            <select class="form-control" name="jumlahTiket" id="jumlahTiket" required="true">
                                                                                <option value="{{$transaction['jumlahTiket']}}">{{$transaction['jumlahTiket']}}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">Total Harga</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="form-group">    
                                                                            <input class="form-control" type="number" name="totalHarga" value="{{ $transaction['totalHarga'] }}" id="totalHarga" required="true" min="0" value="0" readonly />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">Bayar</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="form-group">    
                                                                            <p>Bayar maksimum: {{ $transaction['totalHarga'] - $transaction['bayar'] }}</p>
                                                                            <input class="form-control" type="number" name="bayar" id="totalHarga" required="true" min="0" max="{{ $transaction['totalHarga'] - $transaction['bayar'] }}" value="0"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <input type="submit" class="submit" value="Beli tiket"></input>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
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
</div>
@endsection

@section('jsCode')
    <script type="text/javascript">
        $("select[name='schedule']").change(function(){
            var id_jadwal = $(this).val();
            var token = $("input[name='_token']").val();
            var jmlTiket = $("select[name='jumlahTiket']").val();
            $.ajax({
                url: "<?php echo route('transaction.selectTotalPrice.public') ?>",
                method: 'POST',
                data: {id_jadwal:id_jadwal, _token:token},
                success: function(data) {
                $("input[name='totalHarga'").val(data.options * jmlTiket );
                }
            });
        });

        $("select[name='jumlahTiket']").change(function(){
            var id_jadwal = $("select[name='schedule']").val();
            var token = $("input[name='_token']").val();
            var jmlTiket = $(this).val();
            $.ajax({
                url: "<?php echo route('transaction.selectTotalPrice.public') ?>",
                method: 'POST',
                data: {id_jadwal:id_jadwal, _token:token},
                success: function(data) {
                $("input[name='totalHarga'").val(data.options * jmlTiket );
                }
            });
        });
    </script>
@endsection