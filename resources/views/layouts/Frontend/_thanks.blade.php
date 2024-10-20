<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <title> {{ __('dashboard.qaysegp') }} </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/logo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('Front') }}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('Front') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('Front') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('Front') }}/css/bootstrap.min.rtl.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('Front') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('Front') }}/css/style.rtl.css" rel="stylesheet">
    <link href="{{ asset('Front') }}/css/book.css" rel="stylesheet">
    <link href="{{ asset('Front') }}/css/thanks.css" rel="stylesheet">
</head>



<body>
<div class=content>
    <div class="wrapper-1">
      <div class="wrapper-2">
        <h1>شكرا لك ! </h1>
        <img src="{{ asset('Front') }}/img/logo1.png" width="120px" height="60px" alt="logo">
        <p>شكرا لك وسوف نتواصل معاك علي رقم الهاتف الخاص بك </p>
        <div class="go-home">
        <a href="{{ route('home') }}">{{ __('dashboard.home_page') }}</a>
        </div>
      </div>
    </div>
  </div>
</body>


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('Front') }}/lib/wow/wow.min.js"></script>
<script src="{{ asset('Front') }}/lib/easing/easing.min.js"></script>
<script src="{{ asset('Front') }}/lib/waypoints/waypoints.min.js"></script>
<script src="{{ asset('Front') }}/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="{{ asset('Front') }}/js/main.js"></script>
</body>

</html>
