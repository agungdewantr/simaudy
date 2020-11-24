@extends('layout.layout')
@section('namamenu', 'Transaksi')
@section('title','Data Transaksi')

@section('content')
<a href="/transaksi/tambah" button type="btn btn-outline-primary" class="btn btn-primary my-2">+ Transaksi Offline</a>
<div class="table-responsive">
<table class="table table-striped">
<thead align="center">
  <tr class="table-primary">
    <th scope="col" align="center">No</th>
    <th scope="col" align="center">Nama Pelanggan</th>
    <th scope="col" align="center">Jenis Paket</th>
    <th scope="col" align="center">Jenis Transaksi</th>
    <th scope="col" align="center">Berat Pakaian</th>
    <th scope="col" align="center">Jumlah Pembayaran</th>
    <th scope="col" align="center">Status Pengantaran</th>
    <th scope="col" align="center">Aksi</th>
  </tr>
</thead>
<tbody>
  <tr>
    @foreach($transaksi as $tr)
    <td scope="row" align="center">{{ $loop->iteration }}</td>
    <td align="center">{{ $tr->name }}</td>
    <td scope="col" align="center">{{ $tr->nama_paket }}</td>
    <td scope="col" align="center">{{ $tr->jenistransaksi }}</td>
    <td align="center">{{ $tr-> berat_pakaian }}</td>
    <td align="center">{{ $tr->jumlah_pembayaran }}</td>
    <td align="center">{{ $tr->status_pengantaran }}</td>
    <td scope="row row-center" align="center">
    <form class="d-inline" action="/transaksi/{{$tr->id_transaksi}}/detail">
    <button type=submit class="badge badge-warning" style="border-style : none;outline : none;"><i class="fas fa-info-circle"></i> Detail</a>
    </form>
    </td>
  </tr>
  @endforeach
</tbody>
</table>
</div>
<br>
<div class="container" style="margin-left: 40%" >
  <div class="box">
    {{$transaksi->links()}}
  </div>
</div>
<!-- <div class="row">
  <div class="col-12 col-sm-6 col-lg-12">
      <div class="card-header">
        <h4>Default Tab</h4>
      </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Transaksi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Trasaksi Pengantaram</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="table-responsive">
            <table class="table table-striped">
            <thead align="center">
              <tr class="table-primary">
                <th scope="col" align="center">No</th>
                <th scope="col" align="center">Nama Pelanggan</th>
                <th scope="col" align="center">Jenis Paket</th>
                <th scope="col" align="center">Berat Pakaian</th>
                <th scope="col" align="center">Jumlah Pembayaran</th>
                <th scope="col" align="center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach($transaksi as $tr)
                <td scope="row" align="center">{{ $loop->iteration }}</td>
                <td align="center">{{ $tr->name }}</td>
                <td scope="col" align="center">{{ $tr->nama_paket }}</td>
                <td align="center">{{ $tr-> berat_pakaian }}</td>
                <td align="center">{{ $tr->jumlah_pembayaran }}</td>
                <td scope="row row-center" align="center">
                <form class="d-inline" action="/transaksi/{{$tr->id_transaksi}}/detail">
                <button type=submit class="badge badge-warning" style="border-style : none;outline : none;"><i class="fas fa-info-circle"></i> Detail</a>
                </form>
                </td>
              </tr>
              @endforeach
            </tbody>
            </table>
          </div>
            <br>
            <div class="container" style="margin-left: 40%" >
              <div class="box">
                {{$transaksi->links()}}
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor, ac efficitur est lobortis quis. Nullam lacinia metus erat, sed fermentum justo rutrum ultrices. Proin quis iaculis tellus. Etiam ac vehicula eros, pharetra consectetur dui. Aliquam convallis neque eget tellus efficitur, eget maximus massa imperdiet. Morbi a mattis velit. Donec hendrerit venenatis justo, eget scelerisque tellus pharetra a.
          </div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi maximus. Proin ligula massa, gravida in lacinia efficitur, hendrerit eget mauris. Pellentesque fermentum, sem interdum molestie finibus, nulla diam varius leo, nec varius lectus elit id dolor. Nam malesuada orci non ornare vulputate. Ut ut sollicitudin magna. Vestibulum eget ligula ut ipsum venenatis ultrices. Proin bibendum bibendum augue ut luctus.
          </div>
        </div>
  </div>
  </div> -->

@endsection
