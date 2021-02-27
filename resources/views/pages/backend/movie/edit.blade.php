@extends('layouts.admin')

@section('content')
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
    <form class="form-horizontal" enctype="multipart/form-data" action="{{$movie['id']}}" method="POST">
      @csrf
      @method('PUT')
      <div class="card ">
        <div class="card-header ">
          <h4 class="card-title">Edit Film</h4>
        </div>
        <div class="card-body ">
          <div class="row">
            <label class="col-sm-2 col-form-label">Nama Film</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="text" name="namafilm" minLength="5" required="true" value="{{ $movie['namafilm'] }}" />
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-2 col-form-label">Kategori Film</label>
            <div class="col-sm-7">
              <div class="form-group">
                <select class="form-control" name="category" id="category" required="true">
                  <option value="">- Pilih kategori -</option>
                  @foreach ($category as $item)
                      <option value="{{ $item['id'] }}" <?php if($item['id'] == $movie['category_id']){ ?> selected <?php } ?>>{{ $item['nama'] }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-2 col-form-label">Poster</label>
            <div class="col-sm-7">
              <div class="form-group">
                <span>* Jangan diisi jika tidak mau merubah gambar</span>
                <input class="form-control" type="file" name="poster" placeholder="Choose image" id="image">
                @error('image')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-2 col-form-label">Sinopsis</label>
            <div class="col-sm-7">
              <div class="form-group">
                <textarea class="form-control" name="sinopsis" required="true">{{ $movie['sinopsis'] }}</textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="text" name="harga" min="6" required="true" value="{{ $movie['harga'] }}" />
              </div>
            </div>
          </div>
          
          <div class="row">
            <label class="col-sm-2 col-form-label">Durasi Film</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control" type="text" name="durasi" required="true" />
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-primary">Perbarui</button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection