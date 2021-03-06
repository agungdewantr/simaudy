@extends('layout.layout-auth')

@section('title','Login')

@section('content')
<div class="card-body">
  <div class="form-group">
    @if (session('status'))
    <button id="tombolku" style="display:none;" class="but">Open Modal</button>
     <div id="myModal" class="penghalang">
         <div class="modal-content">
             <span id="tutup">&times;</span>
             <center><img src="{!! asset('assets/img/regisberhasil.svg')!!}" alt="regisberhasil" width="30%"></center>
             <b><p><center>{{ session('status') }}</center></p></b>
             <a href="/login" class="badge badge-primary">Kembali</a>
         </div>
     </div>
      <!-- <div class="alert alert-light" role="alert">
          {{ session('status') }}
      </div> -->
    @endif
  </div>
  <form method="POST"  action="{{ route('login') }}" class="needs-validation">
    @csrf
    <div class="form-group">
      <label for="email">{{ __('E-Mail Address') }}</label>
      <input id="email" type="email" value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror" name="email" tabindex="1" required autocomplete="email" autofocus>
      @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>Periksa kembali email anda!</strong>
          </span>
      @enderror

    <div class="form-group">
      <div class="d-block">
        <label for="password" class="control-label">{{ __('Password') }}</label>
        <div class="float-right">
          <a href="{{ route('password.request') }}" class="text-small">
            Forgot Password?
          </a>
        </div>
      </div>
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required autocomplete="current-password">
      @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>Periksa kembali password anda!</strong>
          </span>
      @enderror
    </div>

    <div class="form-group">
      <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="custom-control-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
      </div>

      <!-- <div class="form-group">
        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </div> -->

    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
        {{ __('Login') }}
      </button>
    </div>
  </form>
</div>
@endsection
@section('buatakun')
  Belum memiliki akun? <a href="/register">Buat Akun</a>
@endsection
