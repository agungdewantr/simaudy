@extends('layout.layout-auth')

@section('title','Register')

@section('content')
<div class="card-body">
  <form method="POST" action="{{ route('register') }}" class="needs-validation">
    @csrf
    <div class="row">
      <div class="form-group col-6">
        <label for="name">{{ __('Nama') }}</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <input id="id_role" type="hidden" class="form-control" name="id_role" value="4">
      <div class="form-group col-6">
        <label for="no_telp">{{ __('No Telp') }}</label>
        <input id="no_telp" type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{ old('no_telp') }}" required autocomplete="no_telp" autofocus>
        @error('no_telp')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>

    <div class="row">
      <div class="form-group col-6">
        <label for="alamat">{{ __('Alamat') }}</label>
        <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>
        @error('alamat')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group col-6">
        <label for="email">{{ __('E-mail') }}</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>
    <div class="row">
      <div class="form-group col-6">
        <label for="password" class="d-block">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group col-6">
        <label for="password-confirm" class="d-block">{{ __('Konfirmasi Password') }}</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
      </div>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-lg btn-block">
        {{ __('Register') }}
      </button>
    </div>
  </form>
</div>
@endsection

@section('buatakun')
  Sudah memiliki akun? <a href="/login">Silahkan Login</a>
@endsection
