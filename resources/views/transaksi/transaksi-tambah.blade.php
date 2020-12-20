@extends('layout.layout')
@section('namamenu', 'Transaksi')
@section('title','Tambah Transaksi')

@section('content')
@if (session('status'))
<button id="tombolku" style="display:none;" class="but">Open Modal</button>
 <div id="myModal" class="penghalang">
     <div class="modal-content">
         <span id="tutup">&times;</span>
         <h4><center>SIMAUDY</center></h4>
         <table border="0">
           <tbody>
           <tr><td><b>Total Pembayaran</b></td><td>:</td><td><b><span class="badge badge-primary">Rp .{{ session('status') }}</span><br></b></td></tr><br><br>
           <tr><td>Tgl Transaksi</td><td>:</td><td><span class="badge badge-primary">{{ session('tglawal') }}</span><br></td></tr><br>
           <tr><td>Tgl Selesai </td><td>:</td><td><span class="badge badge-primary">{{ session('tglselesai') }}</span></td></tr><br>
           <tr><td>No Lemari</td><td>:</td><td><span class="badge badge-primary">{{ session('no_lemari') }}</span></td></tr><br>
           </tbody>
         </table>
         <br><br>
         <a href="/transaksi" class="badge badge-warning">Kembali</a>
     </div>
 </div>
 @endif
<form method="post" action="/transaksi">
  @csrf
  <div class="form-group">
    <label for="idusers">ID Pelanggan</label>
    <select name="id_users" class="form-control form-control-lg">
      <option value="61">--Bukan pelanggan Terdaftar--</option>
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
            <input type="text" id="jenispaket" name="jenispaket" autocomplete="off" value="{{ old('jenispaket') }}" class="form-control @error('jenispaket') is-invalid @enderror" placeholder="Masukkan Jenis Paket">
            @error('jenispaket')
              <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
        </div>
      </div>
    </div>
  </div>
  @foreach($lemari as $lm)
  <input type="hidden" name="idlemari" id="idlemari" value="{{$lm->idlemari}}">
  @endforeach
  <input type="text" name="id_tempat_laundry" id="id_tempat_laundry" value="{{$idtempatlaundry}}" class="form-control @error('id_tempat_laundry') is-invalid @enderror">
  @error('id_tempat_laundry')
    <div class="invalid-feedback">{{$message}}</div>
  @enderror
  <input type="hidden" name="status_pengantaran" id="status_pengantaran" value="">
    <div class="form-group">
      <label for="berat_pakaian">Berat Pakaian</label>
      <input type="number" class="form-control @error('berat_pakaian') is-invalid @enderror" value="{{ old('berat_pakaian') }}" id="berat_pakaian" name="berat_pakaian" placeholder="Masukkan Berat Pakaian">
      @error('berat_pakaian')
        <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>
    <div class="form-group">
      <input type="hidden" value="" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Satuan"  readonly="">
    </div>
    <div class="form-group">
      <input type="hidden" class="form-control" id="id_paket" name="id_paket" placeholder="Masukkan Jumlah (Kg)">
    </div>
    <div class="form-group">
      <label for="jumlah_pembayaran">Jumlah Pembayaran</label>
      <input type="text" value="" class="form-control" id="jumlah_pembayaran" name="jumlah_pembayaran" placeholder="Masukkan harga dalam" readonly="">
    </div>
    <button id="tombolku" class="btn btn-primary">Simpan</button>
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
