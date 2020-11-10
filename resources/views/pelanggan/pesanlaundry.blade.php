@extends('layout.layout')
@section('namamenu', 'Transaksi')
@section('title','Pesan Laundry')

@section('content')
<!-- Button trigger modal -->

<!-- Modal -->
@if (session('status'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{ session('status') }}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<form method="post" action="/laundrysekarang">
  @csrf
  <div class="form-group">
    <label for="jenispaket">Jenis Paket</label>
    <select name="id_paket" class="form-control form-control-lg">
      @foreach($paket as $pkt)
        <option value="{{$pkt->id_paket}}">{{$pkt->nama_paket}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="alamat">Alamat</label>
    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" value="{{auth()->user()->alamat}}" name="alamat" placeholder="Masukkan alamat">
    @error('alamat')
      <div class="invalid-feedback">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <input type="hidden" class="form-control" id="id_users" value="{{auth()->user()->id}}" name="id_users" placeholder="">
  </div>
    <div class="form-group">
      <input type="hidden" class="form-control" id="berat_pakaian" value="0" name="berat_pakaian" placeholder="Masukkan Berat Pakaian">
    </div>
    <div class="form-group">
      <input type="hidden" class="form-control" id="harga" value="0" name="harga" placeholder="Masukkan Harga Satuan"  readonly="">
    </div>
    <div class="form-group">
      <input type="hidden" value="online" class="form-control" id="jenistransaksi" name="jenistransaksi" placeholder="">
    </div>
    <div class="form-group">
      <input type="hidden" class="form-control" id="status" value="Belum terverifikasi" name="status">
    </div>
    <div class="form-group">
      <input type="hidden" value="0" class="form-control" id="jumlah_pembayaran" name="jumlah_pembayaran">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
  <!-- Button trigger modal -->

  @endsection

  @section('notif')
    @foreach($notif as $nt)
    <a href="#" class="dropdown-item dropdown-item-unread">
      <div class="dropdown-item-icon bg-primary text-white">
        <i class="fas fa-code"></i>
      </div>
      <div class="dropdown-item-desc">
        <p>No Transaksi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$nt->id_transaksi}}</p>
        <p>Total Pembayaran : Rp. {{$nt->jumlah_pembayaran}}</p>
        <p>Tgl Transaksi  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ Carbon\Carbon::parse($nt->created_at)->format("d-m-Y")  }}</p>
        <?php $idp = $nt->id_paket?>
        <p>Tgl Pengambilan &nbsp;&nbsp; :
        @if($idp == 1 )
          {{ Carbon\Carbon::parse($nt->created_at)->addDays(1)->format("d-m-Y")  }}
        @else
          {{ Carbon\Carbon::parse($nt->created_at)->addDays(3)->format("d-m-Y")  }}
        @endif
        </p>
        <div class="time text-primary">2 Min Ago</div>
      </div>
    </a>
    @endforeach
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
