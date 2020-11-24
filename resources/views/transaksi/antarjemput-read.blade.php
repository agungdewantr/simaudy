@extends('layout.layout')
@section('namamenu', 'Transaksi Online')
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
<div class="table-responsive">
<table class="table table-striped">
  @if(count($transaksi) != 0 )
<thead align="center">
  <tr class="table-primary">
    <th scope="col" align="center">No</th>
    <th scope="col" align="center">Tgl Transaksi</th>
    <th scope="col" align="center">Nama</th>
    <th scope="col" align="center">Jenis Paket</th>
    <th scope="col" align="center">Alamat</th>
    <th scope="col" align="center">Tgl Selesai</th>
    <th scope="col" align="center">Status</th>
    <th scope="col" align="center">Aksi</th>
  </tr>
</thead>
@endif
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
    <!-- <a href="/antarjemput/{{$tr->id_transaksi}}" class="badge badge-info">Setujui</a> -->

    <td align="center">
      @if($tr->status == 'Belum terverifikasi')
          <form class="d-inline p-2" action="/antarjemput/verifikasi/{{$tr->id_transaksi}}" method="post">
            @csrf
            @method('put')
            <button type="submit" class="badge badge-warning" style="border-style : none;">Setujui</button>
          </form>
          <form class="" action="/antarjemput/tolak/{{$tr->id_transaksi}}" method="post">
            @csrf
            @method('put')
            <button type="submit" class="badge badge-danger" style="border-style : none;">Tolak</button>
          </form>
      @elseif($tr->status == 'Terverifikasi')
        <a href="/antarjemput/{{$tr->id_transaksi}}" class="badge badge-info">Detail</a>
      @endif
    </td>
  </tr>
  @endforeach
</tbody>
</table>
</diV>
@endsection
