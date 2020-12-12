@extends('layout.layoutpelanggan')
@section('namamenu', 'Transaksi Anda')
@section('title','Cek Pesanan')

@section('content')
<div class="table-responsive">
<div class="table-responsive">
<table class="table table-striped">
<thead align="center">
  <tr class="table-primary">
    <th width="5px" scope="col" align="center">No</th>
    <th width="40px" scope="col" align="center" style="max-width: 10rem;">Tgl Transaksi</th>
    <th width="150px" scope="col" align="center">Nama Laundry</th>
    <th scope="col" align="center">Jenis Paket</th>
    <th scope="col" align="center">Berat Pakaian</th>
    <th scope="col" align="center">Jumlah Pembayaran</th>
    <th scope="col" align="center">Status Pengantaran</th>
  </tr>
</thead>
<tbody>
  <tr>
    @foreach($transaksi as $tr)
    <td scope="row" align="center">{{ $loop->iteration }}</td>
    <td align="center">{{ Carbon\Carbon::parse($tr->created_at)->format("d/m/Y")  }}</td>
    <td align="center">{{ $tr->nama_tempat_laundry }}</td>
    <td scope="col" align="center">{{ $tr->nama_paket }}</td>
    <td align="center">{{ $tr->berat_pakaian }} Kg</td>
    <td align="center">@currency($tr->jumlah_pembayaran)</td>
    @if($tr->status_pengantaran == "Akan Diantar")
    <td align="center"><span class="badge badge-warning">{{ $tr->status_pengantaran }}</span></td>
    @else
    <td align="center"><span class="badge badge-success">{{ $tr->status_pengantaran }}</span></td>
    @endif
  </tr>
  @endforeach
</tbody>
</table>
</div>
</div>
<br>
@endsection
