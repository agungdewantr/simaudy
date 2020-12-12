@extends('layout.layout')

@section('title','Profil Laundry Anda')

@section('namamenu', 'Profil')
@section('content')
@if (session('status'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>{{ session('status') }}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="section-body">

  <div class="row justify-content-center row mt-sm-lg-12">
    <div class="col-12 col-md-12 col-lg-6">
      <div class="shadow p-3 mb-5 bg-white rounded card profile-widget">
        <div class="row justify-content-center">
          <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
        </div>
        <div class="profile-widget-description">
            <div class="profile-widget-name">
            <table border="0" class="row justify-content-center">
              <div class="font-weight-bold mb-2" style="text-decoration:none;text-align:center;"><a href="/editprofillaundry"><b>Edit Profil Laundry Anda</b></a></div>
              <tbody>
              <tr><td><b>ID Tempat Laundry</b></td><td>:</td><td><b> {{ $detaillaundry->id_tempat_laundry}}</b><br></td></tr>
              <tr><td>Nama Tempat Laundry</td><td>:</td><td>{{$detaillaundry->nama_tempat_laundry}}</td></tr>
              <tr><td>Status Operasional</td><td>:</td><td>{{$detaillaundry->status_operasional}}<br></td></tr>
              <tr><td>Tanggal Terbentuk</td><td>:</td><td>{{$detaillaundry->tanggal_terbentuk}}</td></tr>
              <tr><td>Alamat</td><td>:</td><td>{{$detaillaundry->alamat_laundry}}</td></tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
