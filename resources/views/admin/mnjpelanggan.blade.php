@extends('layout.layout')
@section('namamenu', 'Manajemen Pelanggan')
@section('title','Data Pelanggan')

@section('content')
@if (session('status'))
<div class="form-group">
<div class="alert alert-warning alert-dismissible fade show" role="alert">
      {{ session('status') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>
@endif
<div class="table-responsive">
<table class="table table-striped">
<thead align="center">
  <tr class="table-primary">
    <th scope="col" align="center">No</th>
    <th scope="col" align="center">Nama</th>
    <th scope="col" align="center">No Telp</th>
    <th scope="col" align="center">Alamat</th>
    <th scope="col" align="center">Scan KTP</th>
    <th scope="col" align="center">Status</th>
    <th scope="col" align="center">Aksi</th>
  </tr>
</thead>
<tbody>
  <tr>
    @foreach($datapelanggan as $dp)
    <td scope="row" align="center">{{ $loop->iteration }}</td>
    <td align="center">{{ $dp->name }}</td>
    <td scope="col" align="center">{{ $dp->no_telp }}</td>
    <td align="center">{{ $dp->alamat }}</td>
    <td align="center" style="width: 10%;">
      <button id="tombolku" style="outline:none;background-color:white;" class="btn btn-primary"><center><img src="{{asset('storage/img/'.$dp->scan_KTP)}}" alt="" style="width:150%;height: 140%;margin-left:-10%"></center></button>
       <div id="myModal" class="penghalang">
           <div class="modal-content">
               <span id="tutup">&times;</span>
                <img src="{{asset('storage/img/'.$dp->scan_KTP)}}" alt="">
           </div>
       </div>
    </td>
    <td scope="row row-center" align="center">
      @if($dp->status == "Null")
    <div class="btn-group dropright mb-2">
      <button class="badge badge-primary btn-sm dropdown-toggle" style="border-style : none;outline : none;" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Status
      </button>
      <div class="dropdown-menu">
        <form class="d-inline" method="post" action="/manajemenpelanggan/{{$dp->id}}/verifikasi">
          @method('put')
          @csrf
        <button type="submit" class="dropdown-item has-icon text-primary" style="outline:none;">Verifikasi</button>
      </form>
      <form class="d-inline" method="post" action="/manajemenpelanggan/{{$dp->id}}/tolak">
        @method('put')
        @csrf
      <button type="submit" class="dropdown-item has-icon text-danger" style="outline:none;">Tidak verifikasi</button>
    </form>
      </div>
    </div>
    @else
    Terverifikasi
    @endif
  </td>
    <td scope="row row-center" align="center">
    <form class="d-inline" action="/manajemenpelanggan/{{$dp->id}}/detail">
    <button type=submit class="badge badge-warning btn-sm" style="border-style : none;outline : none;"><i class="fas fa-info-circle"></i> Detail</button>
    </form>
    <form class="d-inline" method="post" action="/manajemenpelanggan/{{$dp->id}}/delete">
      @method('delete')
      @csrf
      <button type=submit class="badge badge-danger btn-sm" style="border-style : none;outline : none;"><i class="fas fa-times"></i> Hapus</button>
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
  </div>
</div>

@endsection

@section('script')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
@endsection

@section('autocomplete')

@endsection
