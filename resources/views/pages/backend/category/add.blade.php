@extends('layouts.admin')

@section('content')
@include('layouts/components/backend/navbar')
@include('layouts/components/backend/sidebar')
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
		<form class="form-horizontal" action="{{ route('category.store') }}" method="POST">
			@csrf
			<div class="card ">
				<div class="card-header ">
					<h4 class="card-title">Tambah Kategori</h4>
				</div>
				<div class="card-body ">
					<div class="row">
						<label class="col-sm-2 col-form-label">Nama Kategori</label>
						<div class="col-sm-7">
							<div class="form-group">
								<input class="form-control" type="text" name="nama" minLength="5" required="true" />
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer text-center">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection