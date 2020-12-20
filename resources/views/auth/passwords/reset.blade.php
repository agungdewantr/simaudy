@extends('layout.layout-auth')
@section('title','Reset Password')
@section('content')
<div class="card-body">
  <form method="POST"  action="{{ route('password.update') }}" class="needs-validation">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="form-group">
      <label for="email">{{ __('E-Mail Address') }}</label>
      <input id="email" type="email" value="{{ $email ?? old('email') }}" class="form-control  @error('email') is-invalid @enderror" name="email" tabindex="1" required autocomplete="email" autofocus>
      @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{$message}}</strong>
          </span>
      @enderror
      </div>

    <div class="form-group">
      <div class="d-block">
        <label for="password" class="control-label">{{ __('Password') }}</label>
      </div>
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required autocomplete="new-password">
      @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{$message}}</strong>
          </span>
      @enderror
    </div>
    <div class="form-group">
      <div class="d-block">
        <label for="password-confirm" class="control-label">{{ __('Confirm Password') }}</label>
      </div>
      <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" tabindex="3" required autocomplete="current-password">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
        {{ __('Reset Password') }}
      </button>
    </div>
  </form>
</div>
@endsection
