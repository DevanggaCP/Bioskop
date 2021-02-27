@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Data Film</h4>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif
      </div>
      <div class="card-body">
        <div class="toolbar">
        </div>
        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Ruang</th>
              <th>Jumlah Kursi</th>
              <th>Harga</th>
              <th class="disabled-sorting text-right">Actions</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Nama Ruang</th>
              <th>Jumlah Kursi</th>
              <th>Harga</th>
              <th class="disabled-sorting text-right">Actions</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $no = 1; ?> 
            @if(count($data) > 0)
            @foreach($data as $dt)
            <tr>
              <td>{{ $no }}</td>
              <td>{{ $dt['namaRuang'] }}</td>
              <td>{{ $dt['jumlahKursi'] }}</td>
              <td>{{ $dt['harga']}}</td>
              <td class="text-right">
                <a href="room/{{ $dt['id'] }}" class="btn btn-warning btn-link btn-icon btn-sm edit"><i class="fa fa-edit"></i></a>
                <form action="room/{{ $dt['id'] }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" title="delete" class="btn btn-danger btn-link btn-icon btn-sm remove">
                    <i class="fa fa-times"></i>
                  </button>
                </form>
              </td>
            </tr>
            <?php $no++ ?>
            @endforeach
            @else
            <tr>
              <td colspan="5">Tidak ada data</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div><!-- end content-->
    </div><!--  end card  -->
  </div> <!-- end col-md-12 -->
</div> <!-- end row -->
@endsection