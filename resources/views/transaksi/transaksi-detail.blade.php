@extends('layout.layout')
@section('namamenu', 'Transaksi')
@section('title','Detail Transaksi')

@section('content')
<div class="card card-primary">
<div class="card-body">
  @foreach($transaksi as $tr)
  <table border="0">
    <tbody>
    <tr><td><b>No Transaksi</b></td><td>:</td><td><b>{{$tr->id_transaksi}}</b><br></td></tr>
    <tr><td>Tgl Transaksi</td><td>:</td><td>{{ Carbon\Carbon::parse($tr->created_at)->format("d/m/Y")  }}</td></tr>
    <tr><td>Nama Pelanggan</td><td>:</td><td>{{$tr->name}}<br></td></tr>
    <tr><td>Jenis Paket</td><td>:</td><td>{{$tr->nama_paket}}</td></tr>
    <tr><td>Berat Pakaian</td><td>:</td><td>{{$tr->berat_pakaian}}</td></tr>
    <tr><td>Jumlah Pembayaran</td><td>:</td><td>@currency($tr->jumlah_pembayaran)</td></tr>
    <tr><td>No. Lemari</td><td>:</td><td>{{$tr->idlemari}}</td></tr>
    <tr><td>Jenis Transaksi</td><td>:</td><td>{{$tr->jenistransaksi}}</td></tr>
    @if($tr->jenistransaksi == "online")
    <tr><td>Status Transaksi</td><td>:</td><td>{{$tr->status}}</td></tr>
    <tr><td>Alamat Pesanan</td><td>:</td><td>{{$tr->alamat}}</td></tr>
    @endif
    <tr><td>Status Pengantaran</td><td>:</td><td>{{$tr->status_pengantaran}} &nbsp;&nbsp;&nbsp;
      @if($tr->status_pengantaran != "Pakaian telah diterima/diambil")
      <a href="#" id="tomboll" class="badge badge-info">Ubah Status Pengantaran</a>
      @endif
    </td></tr>
    </tbody>
  </table>

</div>
<div class="" id="box" style="padding-left : 3%; margin-right : 10%; width:150%;">
<form method="post" action="/transaksi/{{$tr->id_transaksi}}">
  @method('put')
  @csrf
<div class="form-group col-2">
  <div class="row">
  <label class="d-inline" style="margin-right:10px;">Ubah Status Pengantaran :</label>
  <select name="status_pengantaran" class="d-inline form-control bg-warning text-white">
    @if($tr->jenistransaksi == "online")
    <option value="Akan Diantar"><b>Akan Diantar</b></option>
    <option value="Dalam Perjalanan"><b>Dalam Perjalanan</b></option>
    @endif
    <option value="Pakaian telah diterima/diambil"><b>Pakaian telah diterima/diambil</b></option>
  </select>
    </div>
</div>
<input type="hidden" name="idlemari" value="{{$tr->idlemari}}">
<button type="submit" class="btn btn-sm btn-primary" name="button">Simpan</button>

</form>
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
