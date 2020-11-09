@extends('layout.layout')
@section('namamenu', 'Transaksi')
@section('title','Data Transaksi')

@section('content')
<form class="form-inline mr-auto" method="get" action="/rekaptransaksi">
  <div class="search-element">
    <input name="cari" class="shadow-sm p-3 mb-0 bg-white rounded form-control" type="search" placeholder="transaksi berdasarkan bulan atau tahun" aria-label="Search" data-width="260" data-height="35">
    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
  </div>
</form>
<br>
<table class="table table-striped">
<thead align="center">
  <tr class="table-primary">
    <th scope="col" align="center">No</th>
    <th scope="col" align="center">Tgl</th>
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
    <td align="center">{{ $tr->created_at }}</td>
    <td align="center">{{ $tr->name }}</td>
    <td scope="col" align="center">{{ $tr->nama_paket }}</td>
    <td align="center">{{ $tr-> berat_pakaian }}</td>
    <td align="center">{{ $tr->jumlah_pembayaran }}</td>
  </tr>
  @endforeach
</tbody>
</table>
@endsection
