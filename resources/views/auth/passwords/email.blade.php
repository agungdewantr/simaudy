@extends('layout.layout-auth')
@section('title','Lupa Password')
@section('content')
<div class="card-body">
  <form method="POST"  action="{{ route('password.email') }}" class="needs-validation">
    @csrf
    <div class="form-group">
      @if (session('status'))
        <div class="alert alert-info" role="alert">
            {{ session('status') }}
        </div>
      @endif
    </div>
    <div class="form-group">
      <label for="email">{{ __('E-Mail Address') }}</label>
      <input id="email" type="email" value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror" name="email" tabindex="1" required autocomplete="email" autofocus>
      @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>Periksa kembali email anda!</strong>
          </span>
      @enderror
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
        {{ __('Send Password Reset Link') }}
      </button>
    </div>
  </form>

</div>
@endsection
