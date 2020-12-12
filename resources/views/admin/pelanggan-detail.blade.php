@extends('layout.layout')
@section('namamenu', 'Manajemen Pelanggan')
@section('title','Detail Pelanggan')
@section('content')
<div class="card card-primary">
<div class="card-body">
  @foreach($datapelanggan as $dp)
  <table border="0">
    <tbody>
    <tr><td><b>ID Pelanggan</b></td><td>:</td><td><b>{{$dp->id}}</b><br></td></tr>
    <tr><td>Nama</td><td>:</td><td>{{$dp->name}}</td></tr>
    <tr><td>Email</td><td>:</td><td>{{$dp->email}}<br></td></tr>
    <tr><td>No Telp</td><td>:</td><td>{{$dp->no_telp}}</td></tr>
    <tr><td>Alamat</td><td>:</td><td>{{$dp->alamat}}</td></tr>
    <tr><td>Tempat, tanggal Lahir</td><td>:</td><td>{{$dp->tempat_lahir}}, {{ Carbon\Carbon::parse($dp->tanggal_lahir)->format("d-m-Y")  }}</td></tr>
    <tr><td>Jenis Kelamin</td><td>:</td><td>{{$dp->jenis_kelamin}}</td></tr>
    <tr><td>Status</td><td>:</td><td>
      @if($dp->status == NULL)
        Belum Terverifikasi
      @else
        Terverifikasi
      @endif
    </td></tr>
    </tbody>
  </table>
</div>
  @endforeach
  <div class="container my-4">
    <a class="btn btn-indigo" data-toggle="popover-click" data-img="{{ asset('storage/img/bglaundry2.jpg')}}"><img src="{{ asset('storage/img/bglaundry2.jpg')}}" alt="" style="width:10%;"></a>
  </div>
@endsection

@section('autocomplete')
<script>
   $('[data-toggle="popover-hover"]').popover({
  html: true,
  trigger: 'hover',
  placement: 'bottom',
  content: function () { return '<img src="' + $(this).data('img') + '" />'; }
});

// popovers initialization - on click
$('[data-toggle="popover-click"]').popover({
  html: true,
  trigger: 'click',
  placement: 'bottom',
  content: function () { return '<img src="' + $(this).data('img') + '" />'; }
});
   </script>
@endsection

@section('onload','onload()')
