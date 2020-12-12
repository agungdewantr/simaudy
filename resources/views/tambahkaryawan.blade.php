@extends('layout.layout')

@section('title','Tambah Karyawan')

@section('namamenu', 'Manajemen Karyawan')
@section('content')
<div class="">
  <div class="justify-content-center card col-lg-12">
    <div class="row justify-content-center card-body ">
      <div class="tab-content tab-bordered" id="myTabContent6">
        <div class="tab-pane fade show active" id="home6" role="tabpanel" aria-labelledby="home-tab6">
            <form method="POST" action="/manajemenkaryawan/tambah" class="needs-validation" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="form-group col-6">
                  <label for="name">{{ __('Nama') }}</label>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <input id="id_role" type="hidden" class="form-control" name="id_role" value="3">
                <div class="form-group col-6">
                  <label for="no_telp">{{ __('No Telp') }}</label>
                  <input id="no_telp" type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{ old('no_telp') }}" autocomplete="no_telp" autofocus>
                  @error('no_telp')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <input type="hidden" name="id" value="{{auth()->user()->id}}">
              <div class="row">
                <div class="form-group col-6">
                  <label for="alamat">{{ __('Alamat') }}</label>
                  <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" autocomplete="alamat" autofocus>
                  @error('alamat')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group col-6">
                  <label for="email">{{ __('E-mail') }}</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="form-group col-6">
                  <label for="tempat_lahir">{{ __('Tempat Lahir') }}</label>
                  <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir') }}" autocomplete="tempat_lahir" autofocus>
                  @error('tempat_lahir')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group col-6">
                  <label for="tanggal_lahir">{{ __('Tanggal Lahir') }}</label>
                  <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" autocomplete="tanggal_lahir" autofocus>
                  @error('tanggal_lahir')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="form-group col-6">
                  <label for="jenis_kelamin">{{ __('Jenis Kelamin') }}</label>
                    <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                      <option value="Laki-laki" checked>Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  @error('jenis_kelamin')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group col-6">
                  <label for="scan_KTP">{{ __('Scan KTP') }}</label>
                  <input id="scan_KTP" type="file" class="form-control @error('scan_KTP') is-invalid @enderror" name="scan_KTP" value="{{ old('scan_KTP') }}" autocomplete="scan_KTP" autofocus>
                  @error('scan_KTP')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="form-group col-6">
                  <label for="password" class="d-block">{{ __('Password') }}</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group col-6">
                  <label for="password_confirmation" class="d-block">{{ __('Konfirmasi Password') }}</label>
                  <input id="password_confirmation" type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                  @error('password_confirmation')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
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
