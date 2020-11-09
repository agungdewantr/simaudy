@extends('layout.layout')
@section('namamenu', 'Transaksi')
@section('title','Tambah Transaksi')

@section('content')
<form method="post" action="/transaksi">
  @csrf
  <div class="form-group">
    <label for="idusers">ID Pelanggan</label>
    <select name="id_users" class="form-control form-control-lg">
      @foreach($user as $usr)
        <option value="{{$usr->id}}">{{$usr->id}}</option>
      @endforeach
    </select>
</div>
    <div class="form-group">
    <div class="row">
      <div class="col s12">
        <div class="row">
          <div class="input-field col s12">
            <label for="jenispaket">Jenis Paket</label>
            <input type="text" id="jenispaket" name="jenispaket" class="form-control" placeholder="Masukkan Jenis Paket">
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="form-group">
      <label for="berat_pakaian">Berat Pakaian</label>
      <input type="number" class="form-control" id="berat_pakaian" name="berat_pakaian" placeholder="Masukkan Berat Pakaian">
    </div>

    <div class="form-group">
      <input type="number" value="" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Satuan"  readonly="">
    </div>
    <div class="form-group">
      <input type="hidden" class="form-control" id="id_paket" name="id_paket" placeholder="Masukkan Jumlah (Kg)">
    </div>
    <div class="form-group">
      <label for="jumlah_pembayaran">Jumlah Pembayaran</label>
      <input type="text" value="" class="form-control" id="jumlah_pembayaran" name="jumlah_pembayaran" placeholder="Masukkan harga dalam" readonly="">
    </div>
    <button type="submit" class="btn btn-primary" data-target="#exampleModal">Simpan</button>
  </form>
  <!-- Button trigger modal -->
  <a href="#modal" data-toggle="modal" onclick="" class="btn btn-primary">Klik</a>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>

<section>
  <div class="modal fade" id="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4>hahah</h4>
        </div>
        <div class="modal-body">

        </div>
      </div>
    </div>
  </div>
</section>
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
