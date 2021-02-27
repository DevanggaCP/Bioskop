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
        <form class="form-horizontal" enctype="multipart/form-data" action="{{$schedule['id']}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Tambah Jadwal</h4>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Ruang</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                              <select class="form-control" name="room" id="room" required="true">
                                <option value="">- Pilih Ruangan -</option>
                                @foreach ($room as $item)
                                    <option value="{{ $item['id'] }}" <?php if($item['id'] == $schedule['room_id']){ ?> selected <?php } ?> >{{ $item['namaRuang'] }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Film</label>
                        <div class="col-sm-7">
                            <div class="form-group">    
                              <select class="form-control" name="movie" id="movie" required="true">
                                <option value="">- Pilih Film -</option>
                                @foreach ($movie as $item)
                                    <option value="{{ $item['id'] }}" <?php if($item['id'] == $schedule['movie_id']){ ?> selected <?php } ?> >{{ $item['namafilm'] }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-7">
                            <div class="form-group">    
                                <input class="form-control" type="date" name="tanggal" required="true" value="{{ $schedule['tanggal'] }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Waktu</label>
                      <div class="col-sm-7">
                          <div class="form-group">    
                              <input class="form-control" type="time" name="waktu" required="true" value="{{ $schedule['waktu'] }}" />
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