@extends('layout.layout')
@section('namamenu', 'Transaksi')
@section('title','Data Transaksi')

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
<a href="/transaksi/tambah" button type="btn btn-outline-primary" class="btn btn-primary my-2">+ Transaksi Offline</a>
<table class="table table-striped">
<thead align="center">
  <tr class="table-primary">
    <th scope="col" align="center">No</th>
    <th scope="col" align="center">Nama Pelanggan</th>
    <th scope="col" align="center">Jenis Paket</th>
    <th scope="col" align="center">Berat Pakaian</th>
    <th scope="col" align="center">Jumlah Pembayaran</th>
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
  </tr>
  @endforeach
</tbody>
</table>
@endsection
