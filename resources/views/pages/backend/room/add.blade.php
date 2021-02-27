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
        <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('room.store') }}" method="POST">
            @csrf
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Tambah Ruangan</h4>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nama ruang</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" type="text" name="namaRuang" required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Jumlah Kursi</label>
                        <div class="col-sm-7">
                            <div class="form-group">    
                                <input class="form-control" type="number" min="1" name="jumlahKursi" required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-7">
                            <div class="form-group">    
                                <input class="form-control" type="text" name="harga" required="true" />
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