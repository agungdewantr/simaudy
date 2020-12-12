@extends('layout.layout')

@section('title',"Profil $namalaundry->nama_tempat_laundry")

@section('namamenu', 'Tentang Kami')
@section('content')
<div class="card">
  <div class="card-header">
    <h4 style="text-align: center;">Pilihan Paket</h4>
  </div>
  <center>
  <div class="card-body">

<div class="row justify-content-center">

    @foreach($jenispaket as $jp)
      <div class="col-12 col-md-6 col-lg-3" style="">
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

    </div>

    </div>
    </center>
  </div>
@endsection
