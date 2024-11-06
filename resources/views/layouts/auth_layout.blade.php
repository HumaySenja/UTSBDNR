<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('')}}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/auth.css') }}" rel="stylesheet">
  <style>
    body {
        background: url("{{asset('assets/img/hero-img.jpg')}}") no-repeat;
        background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    }
  </style>
</head>

<body>

  <main>
    @yield('content')
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" ></script>
<script src="https://cdn.jsdelivr.net/gh/your-username/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="https://yourwebsite.com/assets/js/main.js"></script>

  {{-- <script src="assets/vendor/sweet-alert/sweetalert2@11.js"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @if(Session::has('failedlogin'))
  <script>
    Swal.fire('{{ Session::get('failedlogin') }}');
  </script>
@elseif(Session::has('successregis'))
  <script>
    Swal.fire('{{ Session::get('successregis') }}');
  </script>
@elseif(Session::has('successlogout'))
<script>
  Swal.fire('{{ Session::get('successlogout') }}');
</script>
@endif
</body>

</html>
