@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Data Transaksi</h4>
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
              <th>User</th>
              <th>Jadwal</th>
              <th>Jumlah Tiket</th>
              <th>Total harga</th>
              <th>Bayar</th>
              <th>Status</th>
              <th class="disabled-sorting text-right">Actions</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>User</th>
              <th>Jadwal</th>
              <th>Jumlah Tiket</th>
              <th>Total harga</th>
              <th>Bayar</th>
              <th>Status</th>
              <th class="disabled-sorting text-right">Actions</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $no = 1; ?> 
            @if(count($data) > 0)
            @foreach($data as $dt)
            <?php 
              $user = App\Models\User::findOrFail($dt['user_id']);
              $schedule = App\Models\Schedule::findOrFail($dt['schedule_id']); 
            ?>
            <tr>
              <td>{{ $no }}</td>
              <td>{{ $user['name'] }}</td>
              <td>{{ $schedule['room']['namaRuang'] }} - {{ $schedule['movie']['namafilm'] }}</td>
              <td>{{ $dt['jumlahTiket'] }}</td>
              <td>{{ $dt['totalHarga'] }}</td>
              <td>{{ $dt['bayar'] }}</td>
              <td>{{ $dt['status'] }}</td>
              <td class="text-right">
                <a href="transaction/{{ $dt['id'] }}" class="btn btn-warning btn-link btn-icon btn-sm edit"><i class="fa fa-edit"></i></a>
              </td>
            </tr>
            <?php $no++ ?>
            @endforeach
            @else
            <tr>
              <td colspan="7">Tidak ada data</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div><!-- end content-->
    </div><!--  end card  -->
  </div> <!-- end col-md-12 -->
</div> <!-- end row -->
@endsection