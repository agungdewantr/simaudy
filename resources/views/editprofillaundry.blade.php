@extends('layout.layout')

@section('title','Edit Profil Laundry')

@section('namamenu', 'Profil')
@section('content')
<div class="form-group">
  @if (session('status'))
  <button id="tombolku" style="display:none;" class="but">Open Modal</button>
   <div id="myModal" class="penghalang">
       <div class="modal-content">
           <span id="tutup">&times;</span>
           <center><img src="{!! asset('assets/img/regisberhasil.svg')!!}" alt="regisberhasil" width="30%"></center>
           <b><p><center>{{ session('status') }}</center></p></b>
           <form action="{{route('logout')}}" method="post">
             @csrf
             <button type="submit" class="badge badge-primary" style="outline:none;">Logout</button>
           </form>
           <a href="/login" class="badge badge-primary">Kembali</a>
       </div>
   </div>
    <!-- <div class="alert alert-light" role="alert">
        {{ session('status') }}
    </div> -->
  @endif
</div>
<div class="">
  <div class="justify-content-center card col-lg-12">
    <div class="row justify-content-center card-body ">
      <div class="tab-content tab-bordered" id="myTabContent6">
        <div class="tab-pane fade show active" id="home6" role="tabpanel" aria-labelledby="home-tab6">
            <form method="POST" action="/editprofillaundry" class="needs-validation">
              @method('put')
              @csrf
                <div class="form-group col-12">
                  <label for="nama_tempat_laundry">{{ __('Nama Tempat Laundry') }}</label>
                  <input id="nama_tempat_laundry" type="text" class="form-control @error('nama_tempat_laundry') is-invalid @enderror" name="nama_tempat_laundry" value="{{$detaillaundry->nama_tempat_laundry}}" autocomplete="nama_tempat_laundry" autofocus>
                  @error('nama_tempat_laundry')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group col-12">
                  <label for="alamat_laundry">{{ __('Alamat Tempat Laundry') }}</label>
                  <input id="alamat_laundry" type="text" class="form-control @error('alamat_laundry') is-invalid @enderror" name="alamat_laundry" value="{{$detaillaundry->alamat_laundry}}" autocomplete="alamat_laundry" autofocus>
                  @error('alamat_laundry')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group col-12">
                  <label for="tanggal_terbentuk">{{ __('Tanggal Terbentuk') }}</label>
                  <input id="tanggal_terbentuk" type="date" class="form-control @error('tanggal_terbentuk') is-invalid @enderror" name="tanggal_terbentuk" value="{{$detaillaundry->tanggal_terbentuk}}" autocomplete="tanggal_terbentuk" autofocus>
                  @error('tanggal_terbentuk')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                  {{ __('Simpan') }}
                </button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
