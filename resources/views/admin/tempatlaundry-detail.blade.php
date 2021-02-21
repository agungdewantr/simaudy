@extends('layout.layout')
@section('namamenu', 'Manajemen Tempat Laundry')
@section('title','Detail Tempat Laundry')
@section('content')
<div class="card card-primary">
<div class="card-body">
  @foreach($datalaundry as $dl)
  <table border="0">
    <tbody>
    <tr><td><b>ID Tempat Laundry</b></td><td>:</td><td><b>{{$dl->id_tempat_laundry}}</b><br></td></tr>
    <tr><td>Nama Tempat Laundry</td><td>:</td><td>{{$dl->nama_tempat_laundry}}</td></tr>
    <tr><td>Status Operasional</td><td>:</td><td>{{$dl->status_operasional}}</td></tr>
    <tr><td>Alamat</td><td>:</td><td>{{$dl->alamat_laundry}}</td></tr>
    <tr><td>Tanggal Terbentuk</td><td>:</td><td>{{ Carbon\Carbon::parse($dl->tanggal_terbentuk)->format("d-m-Y")  }}</td></tr>
    <tr><td>Nama Pemilik</td><td>:</td><td>{{$dl->name}}</td></tr>
    <tr><td>No Telp</td><td>:</td><td>{{$dl->no_telp}}</td></tr>
    <tr><td>Status</td><td>:</td><td>
      @if($dl->status == NULL)
        Belum Terverifikasi
      @else
        Terverifikasi
      @endif
    </td></tr>
    </tbody>
  </table>
</div>
  @endforeach

@endsection

@section('autocomplete')
<script>
function onload() {
  $("#box").hide();
}
   $(document).ready(function() {

     $("#tomboll").click(function() {
       $("#box").show();
     })

   });
   </script>
@endsection

@section('onload','onload()')
