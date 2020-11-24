@extends('layout.layout')
@section('namamenu', 'Transaksi Anda')
@section('title','Berikan Penilaian')

@section('content')
@if($statusrating->rating == 0)
<p>Berikan penilaian untuk laundry dari transaksi yang anda lakukan! </p>
<form method="post" action="/riwayattransaksi/penilaian">
  @csrf
<div class="">
  <div class="rating">
    <input type="radio" class="form-control @error('rating') is-invalid @enderror" name="rating" value="5" id="star1"><label for="star1"></label>
    <input type="radio" name="rating" value="4" id="star2"><label for="star2"></label>
    <input type="radio" name="rating" value="3" id="star3"><label for="star3"></label>
    <input type="radio" name="rating" value="2" id="star4"><label for="star4"></label>
    <input type="radio" name="rating" value="1" id="star5"><label for="star5"></label>
    @error('rating')
      <div class="invalid-feedback" style="transform: translate(-67%, 90%) rotateY(-180deg);">{{$message}}</div>
    @enderror
  </div>

</div>

<input type="hidden" name="id_transaksi" id="id_transaksi" value="{{$idtransaksi}}">
<div class="row justify-content-center">
  <div class="col-sm-12 col-md-7 col-lg-9">
    <textarea class="form-control @error('deskripsi_penilaian') is-invalid @enderror" style="min-height: 200px; min-width: : 600px;" name="deskripsi_penilaian" id="deskripsi_penilaian" placeholder="dekskripsi penilaian"></textarea>
    @error('deskripsi_penilaian')
      <div class="invalid-feedback">{{$message}}</div>
    @enderror
  </div>
</div><br><br>
<div class="row justify-content-center">
  <button type="submit" class="btn btn-primary">Simpan Penilaian</button>
</div>
</form>
@else
<div class="form-group">
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
        Anda sudah memberi penilaian laundry pada transaksi ini!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
@endif
@endsection
