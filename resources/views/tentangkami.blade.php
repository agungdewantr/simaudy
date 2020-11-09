@extends('layout.layout')

@section('title','Profil Laundry Maju Jaya')

@section('namamenu', 'Tentang Kami')
@section('content')
<p>Simply Fresh Laundry berdiri di Yogyakarta, konsep usaha laundry kiloan di Indonesia diyakini pertama kali lahir berasal dari kota pelajar ini.

Simply Fresh Laundry merupakan waralaba pertama yang bergerak dibidang Bisnis Laundry Kiloan atau binatu dengan konsep cuci dan seterika per kilogram. Dikelola oleh staff ahli yang handal dan berpengalaman dibidangnya membuat Simply Fresh Laundry layak menjadi yang terdepan dalam pilihan berwirausaha.

Sejak 2006 hingga kini Simply Fresh telah berkembang menjadi perusahaan dengan [highlight]258 outlet lebih tersebar di seluruh Indonesia[/highlight]. Didukung support system yang handal Simply Fresh Laundry selalu memberikan pelayanan yang terbaik dibidangnya.</p>
<div class="card">
  <div class="card-header">
    <h4 style="text-align: center;">Pilihan Paket</h4>
  </div>
  <center>
  <div class="card-body">


    @foreach($jenispaket as $jp)
      <div class="col-12 col-md-6 col-lg-3">
        <div class="shadow p-3 mb-5 bg-white rounded">
        <div class="card text-center bg-info">
          <div class="d-inline card-body">
            <h5 class="card-title">{{$jp->nama_paket}}</h5
              <hr>
            <p class="card-text"><b>Rp. {{$jp->harga}} / Kg</b></p>
            <p class="card-text">{{$jp->keterangan}}</p>
          </div>
        </div>
        </div>
      </div>
      @endforeach
    <!-- </div> -->
  </div>
</center>
</div>
@endsection
