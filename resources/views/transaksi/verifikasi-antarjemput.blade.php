@extends('layout.layout')
@section('namamenu', 'Transaksi')
@section('title','Verifikasi Transaksi')

@section('content')
<!-- Button trigger modal -->

<!-- Modal -->
@if (session('status'))
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ session('status') }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endif
@foreach($transaksi as $tr)
<form method="post" action="/antarjemput/{{$tr->id_transaksi}}">
  @csrf
  @method('put')
  <div class="form-group">
    <label for="name">Nama :</label>
    <input type="text" class="form-control" id="name" value="{{$tr->name}}" name="name" readonly="">
  </div>
  <div class="form-group">
    <label for="alamat">Alamat :</label>
    <input type="text" class="form-control" id="alamat" value="{{$tr->alamat}}" name="alamat" readonly="">
  </div>
  <div class="form-group">
    <label for="nama_paket">Jenis Paket :</label>
    <input type="text" class="form-control" id="nama_paket" value="{{$tr->nama_paket}}" name="nama_paket" readonly="">
  </div>
  <div class="form-group">
    <label for="created_at">Tanggal Transaksi :</label>
    <input type="text" class="form-control" id="created_at" value="{{$tr->created_at}}" name="created_at" readonly="">
  </div>
  <div class="form-group">
    <label for="berat_pakaian">Berat Pakaian :</label>
    <input type="number" class="form-control @error('berat_pakaian') is-invalid @enderror" id="berat_pakaian" value="" name="berat_pakaian" placeholder="masukkan berat pakaian">
    @error('berat_pakaian')
      <div class="invalid-feedback">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="jumlah_pembayaran">Jumlah Pembayaran :</label>
    <input type="number" class="form-control" id="jumlah_pembayaran" value="" name="jumlah_pembayaran">
  </div>
    <div class="form-group">
      <input type="hidden" value="{{$tr->harga}}" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Satuan"  readonly="">
    </div>
    <div class="form-group">
      <input type="hidden" class="form-control" id="id_paket" name="id_paket" placeholder="Masukkan Jumlah (Kg)">
    </div>
    <br>
    @endforeach
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
  <!-- Button trigger modal -->

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
