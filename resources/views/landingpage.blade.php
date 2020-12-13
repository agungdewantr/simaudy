<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Landing Page</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{!! asset('node_modules/prismjs/themes/prism.css') !!}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{!! asset('assets/css/style.css') !!}">
  <link rel="stylesheet" href="{!! asset('assets/css/components.css') !!}">
</head>
<body class="layout-2" style="background-image: url('http://www.gala-germany.com/img/background.jpg');">
  </div>
  <div id="app"  >
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <a href="/" class="navbar-brand sidebar-gone-hide">Stisla</a>
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        <div class="nav-collapse">
          <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
          </a>
          <ul class="navbar-nav">
            <li class="nav-item active"><a href="/login" class="nav-link">Login</a></li>
            <li class="nav-item active"><a href="/register" class="nav-link">Register</a></li>
          </ul>
        </div>
        <form class="form-inline ml-auto">
          <ul class="navbar-nav">
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
        </ul>
      </nav>
      <div class="main-content">
        <section class="section">
          <center>
          <div class="justify-content-center" style="margin-top : 10%; padding-bottom:2%;">
          <h2 class="text-primary" ><b>Selamat Datang di SIMAUDY</b></h2>
          <h5 class="" style="padding-top:8px; font-style:normal;">Ciptakan pengalaman baru bersama kami !!</h5>
          <form class="" action="/login" method="get">
            <div class="search-element">
          <input class="d-inline form-control" id="cari" name="cari" type="search" placeholder="Cari nama laundry..." aria-label="Search" style="width: 50%; height:200%; border-radius:40px; margin-bottom: 10%; align:center;">
          <button type="submit" class="btn" name="button" style="margin-left:-4%;"><i class="fas fa-search"></i></button>
          </div>
          </form>
          </div>
          <div class="card" style="max-width:20%;margin-right: 1%;">
            <center>
            <div class="card-body">
              <div class="chocolat-parent">
                <a href="../assets/img/example-image.jpg" class="chocolat-image" title="Just an example">
                  <div data-crop-image="285">
                    <div class=" ">
                      <a href="/login"><i class="fas fa-info-circle"></i></a><h5 class="text-primary" style="text-decoration : none;">Maju Jaya Laundry</h5>
                    </div>
                    <img alt="image" src="../assets/img/example-image.jpg" class="img-fluid">
                  </div>
                </a>
              </div>
              <div class="mb-2 text-muted">JL Jawa</div>
            </div>
            <div class="card-header" >
              <div class="card-header-action">
                <a href="/login" class="btn btn-primary">Pilih Laundry</a>
              </div>
            </div>
          </center>
          </div>
          </div>
          <br>
          <div class="section-body" id="#konten">
            <div class="card">
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
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
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
