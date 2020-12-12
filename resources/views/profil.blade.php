@extends('layout.layout')

@section('title','Profil Anda')

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
  <h2 class="section-title">Hi, {{auth()->user()->name}}!</h2>
  <p class="section-lead">
    Ini adalah profile anda
  </p>

  <div class="row justify-content-center row mt-sm-lg-12">
    <div class="col-12 col-md-12 col-lg-6">
      <div class="shadow p-3 mb-5 bg-white rounded card profile-widget">
        <div class="row justify-content-center">
          <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
        </div>
        <div class="profile-widget-description">
            <div class="profile-widget-name">
            <table border="0" class="row justify-content-center">
              <div class="font-weight-bold mb-2" style="text-decoration:none;text-align:center;"><a href="/editprofile"><b>Edit Profil Anda</b></a></div>
              <tbody>
              <tr><td><b>ID User</b></td><td>:</td><td><b> {{ auth()->user()->id}}</b><br></td></tr>
              <tr><td>Nama</td><td>:</td><td>{{auth()->user()->name}}</td></tr>
              <tr><td>Email</td><td>:</td><td>{{auth()->user()->email}}<br></td></tr>
              <tr><td>No Telp</td><td>:</td><td>{{auth()->user()->no_telp}}</td></tr>
              <tr><td>Alamat</td><td>:</td><td>{{auth()->user()->alamat}}</td></tr>
              <tr><td>Tempat, tanggal Lahir</td><td>:</td><td>{{auth()->user()->tempat_lahir}}, {{ Carbon\Carbon::parse(auth()->user()->tanggal_lahir)->format("d-m-Y")  }}</td></tr>
              <tr><td>Jenis Kelamin</td><td>:</td><td>{{auth()->user()->jenis_kelamin}}</td></tr>
              @if(auth()->user()->id_role != 1)
              <tr><td>Status</td><td>:</td><td>
                @if(auth()->user()->email_verified_at == NULL)
                  Tidak terverifikasi
                @else
                  Terverifikasi
                @endif
              </td>
              </tr>
              @endif
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer text-center">
          @if(auth()->user()->id_role == 2)
          <div class="font-weight-bold mb-2" style="text-decoration:none;"><a href="/profillaundry"><b>Detail Laundry</b></a></div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
