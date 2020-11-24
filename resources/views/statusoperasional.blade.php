@extends('layout.layout')
@section('namamenu', 'Status Operasional')
@section('title','Ubah Status Operasional')

@section('content')
@if (session('status'))
<button id="tombolku" style="display:none;" class="but">Open Modal</button>
 <div id="myModal" class="penghalang">
     <div class="modal-content">
         <span id="tutup">&times;</span>
         <h4 class="text-center">SIMAUDY</h4>
         <p class="text-warning text-center"><b>{{ session('status') }}</b></p>
         <div class="row justify-content-center">
           <a href="/" class="d-inline badge badge-primary" style="width:20%;">Ya</a>
         </div>
     </div>
 </div>
 @endif
 @foreach($operasional as $op)
   <center><p class="d-inline"><b>Status Operasional Saat ini :</b> </p>
     @if($op->status_operasional == "Buka")
     <span class="badge badge-success"><b>{{$op->status_operasional}}</b></span></center>
     @else
     <span class="badge badge-danger"><b>{{$op->status_operasional}}</b></span></center>
     @endif
 <form method="post" action="/statusoperasional/{{$op->id_tempat_laundry}}">
 @endforeach
   @method('put')
   @csrf
 <div class="form-group col-2">
   <div class="row">
   <label class="d-inline">Pilih Status Operasional :</label>
   <select name="status_operasional" class="d-inline form-control bg-warning text-white">
     <option value="Buka"><b>Buka</b></option>
     <option value="Tutup"><b>Tutup</b></option>
   </select>
     </div>
 </div>
 <a href="" id="tombolku" class="btn btn-sm btn-primary" data-toggle="modal" onclick="">Ubah Status</a>
 <div id="myModal" class="penghalang">
     <div class="modal-content">
         <span id="tutup">&times;</span>
         <h4 class="text-center">SIMAUDY</h4>
         <p class="text-warning text-center"><b>Apakah anda yakin mengubah status operasional?</b></p>
         <center>
         <div class="row justify-content-center">
             <button class="d-inline badge badge-primary" style="width:20%; border-style : none; outline:none;" type="submit" name="button">Ya</button>
             <a href="/" class="d-inline badge badge-danger" style="width:20%; border-style : none;">Tidak</a>
         </div>
       </center>
     </div>
 </div>
 </form>
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
