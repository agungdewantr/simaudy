@extends('layout.layoutpelanggan')

@section('title','Daftar Pilihan Laundry')

@section('namamenu', 'Dashboard')
@section('carilaundry')
<center>
<div class="justify-content-center" style="margin-top : 10%; padding-bottom:2%;">
<h2 class="text-primary" ><b>Temukan Laundry sesuai keinginanmu</b></h2>
<h5 class="" style="padding-top:8px; font-style:normal;">Cari Sekarang !!</h5>
<form class="" action="/cari" method="get">
  <div class="search-element">
<input class="d-inline form-control" id="cari" name="cari" type="search" placeholder="Cari nama laundry..." aria-label="Search" style="width: 50%; height:200%; border-radius:40px; margin-bottom: 10%; align:center;">
<button type="submit" class="btn" name="button" style="margin-left:-4%;"><i class="fas fa-search"></i></button>
</div>
</form>
</div>
@if (\Route::current()->getName() == 'carilaundry')
<h5 style="max-height: 5%; padding-bottom:1%;"><span class="badge badge-primary">Hasil Pencarian Anda :</span></h5>
</center>
<div class="row justify-content-center">
@if($cari_tempatlaundry == "Tempat laundry tidak ditemukan!")

  <h4 class="text-danger">{{$cari_tempatlaundry}}</h4>
@else
@foreach($cari_tempatlaundry as $cari)
<div class="card" style="max-width:20%;margin-right: 1%;">
  <center>
  <div class="card-body">
    <div class="chocolat-parent">
      <a href="../assets/img/example-image.jpg" class="chocolat-image" title="Just an example">
        <div data-crop-image="285">
          <div class=" ">
            <a href="/tentanglaundry/{{$cari->id_tempat_laundry}}"><i class="fas fa-info-circle"></i></a><h5 class="text-primary" style="text-decoration : none;">{{$cari->nama_tempat_laundry}}</h5>
          </div>
          <img alt="image" src="../assets/img/example-image.jpg" class="img-fluid">
        </div>
      </a>
    </div>
    <div class="mb-2 text-muted">{{$cari->alamat}}</div>
  </div>
  <div class="card-header" >
    <div class="card-header-action">
      <a href="/laundrysekarang/{{$cari->id_tempat_laundry}}" class="btn btn-primary">Pilih Laundry</a>
    </div>
  </div>
</center>
</div>
@endforeach
</div>
@endif
@endif
@endsection
@section('content')
<div class="row justify-content-center">
@foreach($tempat_laundry as $tl)
@if($tl->status_operasional == "Buka")
<div class="card" style="max-width:20%;margin-right: 1%;">
  <center>
  <div class="card-body">
    <div class="chocolat-parent">
      <a href="../assets/img/example-image.jpg" class="chocolat-image" title="Just an example">
        <div data-crop-image="285">
          <div class=" ">
            <a href="/tentanglaundry/{{$tl->id_tempat_laundry}}"><i class="fas fa-info-circle"></i></a><h5 class="text-primary" style="text-decoration : none;">{{$tl->nama_tempat_laundry}}</h5>
          </div>
          <img alt="image" src="../assets/img/example-image.jpg" class="img-fluid">
        </div>
      </a>
    </div>
    <div class="mb-2 text-muted">{{$tl->alamat_laundry}}</div>
  </div>
  <div class="card-header" >
    <div class="card-header-action">
      <a href="/laundrysekarang/{{$tl->id_tempat_laundry}}" class="btn btn-primary">Pilih Laundry</a>
    </div>
  </div>
</center>
</div>
@else
<div class="card" style="max-width:20%;margin-right: 1%;">
  <center>
  <div class="card-body" style="">
    <div class="chocolat-parent">
      <a href="../assets/img/example-image.jpg" class="chocolat-image" title="Just an example">
        <div data-crop-image="285">
          <div class=" ">
            <h5 class="text-primary" style="text-decoration : none;">{{$tl->nama_tempat_laundry}}</h5>
          </div>
          <img alt="image" src="../assets/img/example-image.jpg" class="img-fluid">
        </div>
      </a>
    </div>
    <div class="mb-2 text-muted">{{$tl->alamat_laundry}}</div>
  </div>
  <div class="card-header" >
    <div class="card-header-action">
      <a href="/laundrysekarang/{{$tl->id_tempat_laundry}}" class="btn btn-primary">Pilih Laundry</a>
    </div>
  </div>
</center>
</div>
@endif
@endforeach
<div>
@endsection
