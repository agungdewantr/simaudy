@extends('layout.layout')
@section('namamenu', 'Manajemen Tempat Laundry')
@section('title','Data Laundry')

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
<div class="table-responsive">
<table class="table table-striped">
<thead align="center">
  <tr class="table-primary">
    <th scope="col" align="center">No</th>
    <th scope="col" align="center">Nama Laundry</th>
    <th scope="col" align="center">Status Operasional</th>
    <th scope="col" align="center">Alamat Laundry</th>
    <th scope="col" align="center">Nama Pemilik</th>
    <th scope="col" align="center">Status</th>
    <th scope="col" align="center">Aksi</th>
  </tr>
</thead>
<tbody>
  <tr>
    @foreach($datalaundry as $dl)
    <td scope="row" align="center">{{ $loop->iteration }}</td>
    <td align="center">{{ $dl->nama_tempat_laundry }}</td>
    <td scope="col" align="center">{{ $dl->status_operasional }}</td>
    <td scope="col" align="center">{{ $dl->alamat_laundry }}</td>
    <td align="center">{{ $dl->name }}</td>
    <td scope="row row-center" align="center">
      @if($dl->status == NULL)
    <div class="btn-group dropright mb-2">
      <button class="badge badge-primary btn-sm dropdown-toggle" style="border-style : none;outline : none;" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Status
      </button>
      <div class="dropdown-menu">
        <form class="d-inline" method="post" action="/manajemenlaundry/{{$dl->id}}/verifikasi">
          @method('put')
          @csrf
        <button type="submit" class="dropdown-item has-icon text-primary" style="outline:none;">Verifikasi</button>
      </form>
      <form class="d-inline" method="post" action="/manajemenlaundry/{{$dl->id_tempat_laundry}}/tolak">
        @method('put')
        @csrf
      <button type="submit" class="dropdown-item has-icon text-danger" style="outline:none;">Tidak verifikasi</button>
    </form>
      </div>
    </div>
    @else
    Terverifikasi
    @endif
  </td>
  <td scope="row row-center" align="center">
  <form class="d-inline" action="/manajemenlaundry/{{$dl->id_tempat_laundry}}/detail">
    <button type=submit class="badge badge-warning btn-sm" style="border-style : none;outline : none;"><i class="fas fa-info-circle"></i> Detail</button>
  </form>
  <form class="d-inline" method="post" action="/manajemenlaundry/{{$dl->id_tempat_laundry}}/delete">
    @method('delete')
    @csrf
    <a href="" id="tombolku" class="badge badge-danger btn-sm" data-toggle="modal" onclick="" style="border-style : none;outline : none;"><i class="fas fa-times"></i> Hapus</a>
    <div id="myModal" class="penghalang">
        <div class="modal-content">
            <span id="tutup">&times;</span>
            <h4 class="text-center">SIMAUDY</h4>
            <p class="text-warning text-center"><b>Apakah anda yakin ingin menghapus data TempatLaundry?</b></p>
            <center>
            <div class="row justify-content-center">
                <button class="d-inline badge badge-primary" style="width:20%; border-style : none; outline:none;" type="submit" name="button">Ok</button>
                <a href="/manajemenlaundry" class="d-inline badge badge-danger" style="width:20%; border-style : none;">Tidak</a>
            </div>
          </center>
        </div>
    </div>
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
