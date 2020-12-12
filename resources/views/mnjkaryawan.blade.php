@extends('layout.layout')
@section('namamenu', 'Manajemen Karyawan')
@section('title','Data Karyawan')

@section('content')
@if (session('status'))
<div class="form-group">
<div class="alert alert-warning alert-dismissible fade show" role="alert">
      {{ session('status') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>
@endif
<a href="/manajemenkaryawan/tambah" button type="btn btn-outline-primary" class="btn btn-primary my-2">+ Tambah Karyawan</a>
<div class="table-responsive">
<table class="table table-striped">
<thead align="center">
  <tr class="table-primary">
    <th scope="col" align="center">No</th>
    <th scope="col" align="center">Nama</th>
    <th scope="col" align="center">No Telp</th>
    <th scope="col" align="center">Alamat</th>
    <th scope="col" align="center">Scan KTP</th>
    <th scope="col" align="center">Aksi</th>
  </tr>
</thead>
<tbody>
  <tr>
    @foreach($datakaryawan as $dk)
    <td scope="row" align="center">{{ $loop->iteration }}</td>
    <td align="center">{{ $dk->name }}</td>
    <td scope="col" align="center">{{ $dk->no_telp }}</td>
    <td align="center">{{ $dk->alamat }}</td>
    <td align="center" style="width: 10%;">
      <button id="tombolku" style="outline:none;background-color:white;" class="btn btn-primary"><center><img src="{{asset('storage/img/'.$dk->scan_KTP)}}" alt="" style="width:150%;height: 140%;margin-left:-10%"></center></button>
       <div id="myModal" class="penghalang">
           <div class="modal-content">
               <span id="tutup">&times;</span>
                <img src="{{asset('storage/img/'.$dk->scan_KTP)}}" alt="">
           </div>
       </div>
    </td>
    <td scope="row row-center" align="center">
    <form class="d-inline" action="/manajemenkaryawan/{{$dk->id}}/detail">
    <button type=submit class="badge badge-warning btn-sm" style="border-style : none;outline : none;"><i class="fas fa-info-circle"></i> Detail</a>
    </form>
    <form class="d-inline" method="post" action="/manajemenkaryawan/{{$dk->id}}/delete">
      @method('delete')
      @csrf
      <button type=submit class="badge badge-danger btn-sm" style="border-style : none;outline : none;"><i class="fas fa-times"></i> Hapus</a>
    </form>
    </td>
  </tr>
  @endforeach
</tbody>
</table>
</div>
<br>
<div class="container" style="margin-left: 40%" >
  <div class="box">
  </div>
</div>

@endsection

@section('script')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
@endsection

@section('autocomplete')
<script type="text/javascript">
  $(document).ready(function(){
    $.ajax({
      type:'get',
      url:'{!!URL::to('pilihpaket')!!}',
      success:function(response){
        console.log(response);
        //material css
        //convert array to object
        var hargaArray = response;
        var dataharga = {};
        var dataharga2 = {};
        for (var i = 0; i < hargaArray.length; i++) {
          dataharga[hargaArray[i].nama_paket] =null;
          dataharga2[hargaArray[i].nama_paket] =hargaArray[i];
        }

        console.log("dataharga2");
        console.log(dataharga2);

        $('input#jenispaket').autocomplete({
          data: dataharga,
          onAutocomplete:function(reqdata){
            console.log(reqdata);
            $('#harga').val(dataharga2[reqdata]['harga']);
            $('#id_paket').val(dataharga2[reqdata]['id_paket']);
          }
        });
        //end
      }
    })
  });
  $(document).ready(function() {
    $("#berat_pakaian, #harga").keyup(function() {
        var harga  = $("#harga").val();
        var berat_pakaian = $("#berat_pakaian").val();

        var jumlah_pembayaran = parseInt(harga) * parseInt(berat_pakaian);
        $("#jumlah_pembayaran").val(jumlah_pembayaran);
    });
  });
  </script>
@endsection
