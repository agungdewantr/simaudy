@extends('layout.layout')
@section('namamenu', 'Transaksi')
@section('title','Data Transaksi')

@section('content')
<a href="/transaksi/tambah" button type="btn btn-outline-primary" class="btn btn-primary my-2">+ Transaksi Sayur Masuk</a>
<div class="form-group">
  @if (session('status'))
    <div class="alert alert-light" role="alert">
        {{ session('status') }}
    </div>
  @endif
</div>

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
