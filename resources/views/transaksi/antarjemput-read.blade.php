@extends('layout.layout')
@section('namamenu', 'Transaksi')
@section('title','Data Transaksi Antar Jemput')

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
<table class="table table-striped">
<thead align="center">
  <tr class="table-primary">
    <th scope="col" align="center">No</th>
    <th scope="col" align="center">Tgl</th>
    <th scope="col" align="center">Nama</th>
    <th scope="col" align="center">Jenis Paket</th>
    <th scope="col" align="center">Alamat</th>
    <th scope="col" align="center">Tgl Selesai</th>
    <th scope="col" align="center">Status</th>
    <th scope="col" align="center">Aksi</th>
  </tr>
</thead>
<tbody>
  <tr>
    @foreach($transaksi as $tr)
    <td scope="row" align="center">{{ $loop->iteration }}</td>
    <td align="center">{{ Carbon\Carbon::parse($tr->created_at)->format("d-m-Y")  }}</td>
    <td align="center">{{ $tr->name }}</td>
    <td scope="col" align="center">{{ $tr->nama_paket }}</td>
    <td align="center">{{ $tr-> alamat }}</td>
    <?php $t = $tr->id_paket?>
    @if($t == 1 )
      <td align="center">{{ Carbon\Carbon::parse($tr->created_at)->addDays(1)->format("d-m-Y")  }}</td>
    @else
      <td align="center">{{ Carbon\Carbon::parse($tr->created_at)->addDays(3)->format("d-m-Y")  }}</td>
    @endif
    <td align="center">{{ $tr->status }}</td>
    <td align="center"><a href="/antarjemput/{{$tr->id_transaksi}}" class="badge badge-info">Detail</a></td>
  </tr>
  @endforeach
</tbody>
</table>
@endsection
