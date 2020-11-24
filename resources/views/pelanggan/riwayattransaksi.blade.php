@extends('layout.layout')
@section('namamenu', 'Transaksi Anda')
@section('title','Riwayat Transaksi')

@section('content')
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
    <th scope="col" align="center">Penilaian</th>
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
    <td align="center">{{ $tr->status_pengantaran}}</td>
    @if($tr->rating == 0)
    <td align="center"><a href="/riwayattransaksi/penilaian/{{$tr->id_transaksi}}" class="badge badge-icon icon-left btn-primary" style="padding-right:none;"><i class="far fa-edit"></i>Beri Penilaian</a></td>
    @else
    <td align="center">
      <h5 style="color:#e3df2b;">
      @for($i = 0; $i < $tr->rating; $i++)
      ★
      @endfor
    </h5>
    </td>
    @endif
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
@endsection
