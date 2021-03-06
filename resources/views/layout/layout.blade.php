<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@yield('buatpoto')
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{!! asset('node_modules/prismjs/themes/prism.css') !!}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{!! asset('assets/css/style.css') !!}">
  <link rel="stylesheet" href="{!! asset('assets/css/components.css') !!}">
</head>

<body onload="@yield('onload')">
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          @yield('notif')
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{!! asset('assets/img/avatar/avatar-1.png') !!}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">{{auth()->user()->name}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="/profile" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profil Saya
              </a>
              <div class="dropdown-divider"></div>
              <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit" class="dropdown-item has-icon text-danger" style="outline:none;"><i class="fas fa-sign-out-alt"></i><h6 class="small">Logout</h6></button>
              </form>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="/">SIMAUDY</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">SM</a>
          </div>

          <ul class="sidebar-menu">
            <li><a class="nav-link" href="/dashboard"><i class="fas fa-th-large"></i>Dashboard</a></li>
            @if(auth()->user()->id_role == '3')
            <li><a class="nav-link" href="/transaksi"><i class="fas fa-th-large"></i>Transaksi</a></li>
            <li><a class="nav-link" href="/antarjemput"><i class="fas fa-th-large"></i>Antar Jemput</a></li>
            <li><a class="nav-link" href="/kelolanolemari"><i class="fas fa-th-large"></i>Kelola Nomor Lemari</a></li>
            <li><a class="nav-link" href="/tentangkami"><i class="fas fa-th-large"></i>Tentang Kami</a></li>
            @endif

            @if(auth()->user()->id_role == '4')
            <li><a class="nav-link" href="/laundrysekarang"><i class="fas fa-th-large"></i>Laundry Sekarang</a></li>
            <li><a class="nav-link" href="/riwayattransaksi"><i class="fas fa-th-large"></i>Riwayat Transaksi</a></li>
            <li><a class="nav-link" href="/cekpesanan"><i class="fas fa-th-large"></i>Cek Pesanan</a></li>
            @endif

            @if(auth()->user()->id_role == '2')
            <li><a class="nav-link" href="/rekaptransaksi"><i class="fas fa-th-large"></i>Rekap Transaksi</a></li>
            <li><a class="nav-link" href="/statusoperasional"><i class="fas fa-th-large"></i>Status Operasional</a></li>
            <li><a class="nav-link" href="/manajemenkaryawan"><i class="fas fa-th-large"></i>Manajemen Karyawan</a></li>
            <li><a class="nav-link" href="/tentangkami"><i class="fas fa-th-large"></i>Tentang Kami</a></li>
            @endif

            @if(auth()->user()->id_role == '1')
            <li><a class="nav-link" href="/manajemenpelanggan"><i class="fas fa-th-large"></i>Manajemen Pelanggan</a></li>
            <li><a class="nav-link" href="/manajemenlaundry"><i class="fas fa-th-large"></i>Manajemen Tempat Laundry</a></li>
            @endif



          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('namamenu')</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
              <div class="breadcrumb-item">Modal</div>
            </div>
          </div>

          <div class="section-body">
            <div class="card">
              <div class="card-header">
                <h4>@yield('title')</h4>
              </div>
              <div class="card-body">
                <div class="">
                  @yield('content')
                </div>
              </div>
            </div>
          </div>
        </section>

      </div>
      <footer class="main-footer">
        <div class="footer-left">
              Copyright &copy; 2020 <div class="bullet"> TRPL A - Kelompok F
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{!! asset('assets/js/stisla.js') !!}"></script>

  <!-- JS Libraies -->
  <script src="{!! asset('node_modules/prismjs/prism.js') !!}"></script>

  <!-- Template JS File -->
  <script src="{!! asset('assets/js/scripts.js') !!}"></script>
  <script src="{!! asset('assets/js/custom.js') !!}"></script>

  <!-- Page Specific JS File -->
  <script src="{!! asset('assets/js/page/bootstrap-modal.js') !!}"></script>
  @yield('script')
  @yield('autocomplete')
  <script>
  $('#myModal').modal('show');
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('.but').trigger('click');
    })
</script>
</body>
</html>
