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
    <form class="form-horizontal" action="{{ route('movie.store') }}" method="POST">
      @csrf
      <div class="card ">
        <div class="card-header ">
          <h4 class="card-title">Tambah Film</h4>
        </div>
        <div class="card-body ">
          <div class="row">
            <label class="col-sm-2 col-form-label">Nama Film</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="text" name="namafilm" minLength="5" required="true" />
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-2 col-form-label">Poster</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="text" name="poster" maxLength="5" required="true" />
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-2 col-form-label">Sinopsis</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="text" name="sinopsis" range="[6,10]" required="true" />
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="text" name="harga" min="6" required="true" />
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