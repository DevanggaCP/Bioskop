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
        <form class="form-horizontal" enctype="multipart/form-data" action="{{$transaction['id']}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Tambah Transaksi</h4>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Pengguna</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="form-control" name="user" id="user" required="true">
                                    <option value="">- Pilih pengguna -</option>
                                    @foreach ($user as $item)
                                        <option value="{{ $item['id'] }}" <?php if($item['id'] == $transaction['user_id']){ ?> selected <?php } ?>>{{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Jadwal</label>
                        <div class="col-sm-7">
                            <div class="form-group">    
                                <select class="form-control" name="schedule" id="schedule" required="true">
                                    <option value="">- Pilih jadwal -</option>
                                    @foreach ($schedule as $item)
                                        <option value="{{ $item['id'] }}" <?php if($item['id'] == $transaction['schedule_id']){ ?> selected <?php } ?>>{{ $item['room']['namaRuang'] }} - {{ $item['movie']['namafilm'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Jumlah Tiket</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="form-control" name="jumlahTiket" id="jumlahTiket" required="true">
                                    <option value="">- Pilih jumlah tiket -</option>
                                    <?php
                                    for ($i=1; $i <= 10 ; $i++) { 
                                        ?>
                                        <option value="{{$i}}" <?php if($i == $transaction['jumlahTiket']){ ?> selected <?php } ?>>{{ $i }}</option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Total Harga</label>
                        <div class="col-sm-7">
                            <div class="form-group">    
                                <input class="form-control" type="number" name="totalHarga" id="totalHarga" required="true" min="0" value="{{ $transaction['totalHarga'] }}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Bayar</label>
                        <div class="col-sm-7">
                            <div class="form-group">    
                                <input class="form-control" type="number" name="bayar" id="totalHarga" required="true" min="0" value="{{ $transaction['bayar'] }}"/>
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

@section('jsCode')
    <script type="text/javascript">
        $("select[name='schedule']").change(function(){
            var id_jadwal = $(this).val();
            var token = $("input[name='_token']").val();
            var jmlTiket = $("select[name='jumlahTiket']").val();
            $.ajax({
                url: "<?php echo route('transaction.selectTotalPrice') ?>",
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
                url: "<?php echo route('transaction.selectTotalPrice') ?>",
                method: 'POST',
                data: {id_jadwal:id_jadwal, _token:token},
                success: function(data) {
                $("input[name='totalHarga'").val(data.options * jmlTiket );
                }
            });
        });
    </script>
@endsection