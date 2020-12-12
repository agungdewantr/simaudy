@extends('layout.layout')
@section('namamenu', 'Manajemen Karyawan')
@section('title','Detail Karyawan')
@section('content')
<div class="card card-primary">
<div class="card-body">
  @foreach($datakaryawan as $dk)
  <table border="0">
    <tbody>
    <tr><td><b>ID Pelanggan</b></td><td>:</td><td><b>{{$dk->id}}</b><br></td></tr>
    <tr><td>Nama</td><td>:</td><td>{{$dk->name}}</td></tr>
    <tr><td>Email</td><td>:</td><td>{{$dk->email}}<br></td></tr>
    <tr><td>No Telp</td><td>:</td><td>{{$dk->no_telp}}</td></tr>
    <tr><td>Alamat</td><td>:</td><td>{{$dk->alamat}}</td></tr>
    <tr><td>Tempat, tanggal Lahir</td><td>:</td><td>{{$dk->tempat_lahir}}, {{ Carbon\Carbon::parse($dk->tanggal_lahir)->format("d-m-Y")  }}</td></tr>
    <tr><td>Jenis Kelamin</td><td>:</td><td>{{$dk->jenis_kelamin}}</td></tr>
    <tr><td>Status</td><td>:</td><td>
      @if($dk->email_verified_at == NULL)
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
@endsection

@section('onload','onload()')
