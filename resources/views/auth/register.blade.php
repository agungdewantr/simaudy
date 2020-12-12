@extends('layout.layout-auth')

@section('title','Register')

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
  <div class="card">
    <div class="card-body">
      <ul class="nav nav-tabs justify-content-center" id="myTab6" role="tablist">
        <li class="nav-item">
          <a class="nav-link active text-center" id="home-tab6" data-toggle="tab" href="#home6" role="tab" aria-controls="home" aria-selected="true">
            <span><i class="fas fa-home"></i></span>Daftar Sebagai Pelanggan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-center" id="profile-tab6" data-toggle="tab" href="#profile6" role="tab" aria-controls="profile" aria-selected="false">
            <span><i class="fas fa-id-card"></i></span>Daftarkan Laundry</a>
        </li>
      </ul>
      <div class="tab-content tab-bordered" id="myTabContent6">
        <div class="tab-pane fade show active" id="home6" role="tabpanel" aria-labelledby="home-tab6">
            <form method="POST" action="/register" class="needs-validation" enctype="multipart/form-data">
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
                <input id="id_role" type="hidden" class="form-control" name="id_role" value="4">
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
                      <option value="Laki-laki">Laki-laki</option>
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
                  {{ __('Register') }}
                </button>
              </div>
            </form>
        </div>
        <div class="tab-pane fade" id="profile6" role="tabpanel" aria-labelledby="profile-tab6">
          <form method="POST" action="/registerlaundry" class="needs-validation" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="form-group col-6">
                <label for="name">{{ __('Nama Pemilik Laundry') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <input id="id_role" type="hidden" class="form-control" name="id_role" value="4">
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
                    <option value="Laki-laki">Laki-laki</option>
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
                <label for="nama_tempat_laundry">{{ __('Nama tempat Laundry') }}</label>
                <input id="nama_tempat_laundry" type="text" class="form-control @error('nama_tempat_laundry') is-invalid @enderror" name="nama_tempat_laundry" value="{{ old('nama_tempat_laundry') }}" autocomplete="nama_tempat_laundry" autofocus>
                @error('nama_tempat_laundry')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group col-6">
                <label for="tanggal_terbentuk">{{ __('tanggal Terbentuk') }}</label>
                <input id="tanggal_terbentuk" type="date" class="form-control @error('tanggal_terbentuk') is-invalid @enderror" name="tanggal_terbentuk" value="{{ old('tanggal_terbentuk') }}" autocomplete="tanggal_terbentuk" autofocus>
                @error('tanggal_terbentuk')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <div class="row">
            <div class="form-group col-12">
              <label for="alamat_laundry">{{ __('Alamat Laundry') }}</label>
              <input id="alamat_laundry" type="text" class="form-control @error('alamat_laundry') is-invalid @enderror" name="alamat_laundry" value="{{ old('alamat_laundry') }}" autocomplete="alamat_laundry" autofocus>
              @error('alamat_laundry')
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
                {{ __('Register') }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('buatakun')
  Sudah memiliki akun? <a href="/login">Silahkan Login</a>
@endsection
