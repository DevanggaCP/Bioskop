@extends('layouts.admin')

@section('content')
@include('layouts/components/backend/navbar')
@include('layouts/components/backend/sidebar')
<div class="row">
  <div class="col-md-12">
    <form id="RangeValidation" class="form-horizontal" action="#" method="">
      <div class="card ">
        <div class="card-header ">
          <h4 class="card-title">Tambah Film</h4>
        </div>
        <div class="card-body ">
          <div class="row">
            <label class="col-sm-2 col-form-label">Nama Film</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="text" name="min_length" minLength="5" required="true" />
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-2 col-form-label">Poster</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="text" name="max_length" maxLength="5" required="true" />
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-2 col-form-label">Sinopsis</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="text" name="range" range="[6,10]" required="true" />
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="text" name="min" min="6" required="true" />
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-primary">Tambahkan</button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection