@extends('layout.layout')
@section('namamenu', 'Kelola No Lemari')
@section('title','No lemari')

@section('content')
@if (session('status'))
<button id="tombolku" style="display:none;" class="but">Open Modal</button>
 <div id="myModal" class="penghalang">
     <div class="modal-content">
         <span id="tutup">&times;</span>
         <h4 class="text-center">SIMAUDY</h4>
         <p class="text-warning text-center"><b>{{ session('status') }}</b></p>
         <div class="row justify-content-center">
           <a href="/kelolanolemari" class="d-inline badge badge-primary" style="width:20%;">Ya</a>
         </div>
     </div>
 </div>
 @endif
 <div class="row sortable-card" >
   <div class="col-8 col-md-1 col-lg-2" style="">
   <button id="tombolku" class="shadow p-2 mb-2 bg-white rounded card text-center bg-warning" style="width: 8rem; height: 8rem; margin-left:10%; outline:none;">
     <h1 class="text-middle" style="vertical-align: middle;">&nbsp;&nbsp;&nbsp;&nbsp;+</h1>
     <p class="text-center">Tambah No Lemari Baru</p>
   </button>
 </div>
    <div id="myModal" class="penghalang">
        <div class="modal-content">
            <span id="tutup">&times;</span>
            <h4 class="text-center">SIMAUDY</h4>
            <p class="text-warning text-center"><b>Apakah anda ingin menambah nomor lemari?</b></p>
            <center>
            <div class="row justify-content-center">
              <a href="/kelolanolemari/tambah" class="d-inline badge badge-primary" style="width:20%;">Ya</a>&nbsp;
              <a href="/transaksi" class="d-inline badge badge-danger" style="width:20%;">Tidak</a>
            </div>
          </center>

        </div>
    </div>
   @foreach($nolemari as $lmr)
   <div class="card col-8 col-md-1 col-lg-2">
     <!-- <div class="shadow p-3 mb-5 bg-white rounded"> -->
     @if($lmr->status == "Tersedia")
     <div class="shadow p-2 mb-2 bg-white rounded card text-center bg-info" style="width: 8rem; height: 8rem; margin-left:10%;">
       <div class="d-inline card-body">
         {{$lmr->status}}
         <h1>{{$lmr->idlemari}}</h1>
       </div>
     </div>
     @else
     <div class="shadow p-2 mb-2 bg-white rounded card text-center bg-danger" style="width: 8rem; height: 8rem; margin-left:10%;">
       <div class="d-inline card-body">
         {{$lmr->status}}
         <h1>{{$lmr->idlemari}}</h1>
       </div>
     </div>
     @endif
     <!-- </div> -->
   </div>
   @endforeach
 </div>

 <div class="container" style="margin-left: 40%" >
   <div class="box">
     {{$nolemari->links()}}
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
