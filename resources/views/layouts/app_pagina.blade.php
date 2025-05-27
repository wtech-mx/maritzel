<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/'. $configuracion->favicon) }}">

    <link rel="icon" type="image/png" href="{{ asset('pagina/cropped-cropped-new-log-180x180.png') }}">
    <link rel="icon" href="{{ asset('pagina/cropped-cropped-new-log-192x192.png') }}" sizes="192x192" />
    <link rel="apple-touch-icon" href="{{ asset('pagina/cropped-cropped-new-log-180x180.png') }}" />

  <title>
    @yield('template_title') - Imaginarte 3D
  </title>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />  <link href="{{ asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />

  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

  <link href="{{ asset('assets/bootstrap_icons/font/bootstrap-icons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/landing.css') }}" rel="stylesheet">

  <!-- GLightbox CSS -->
  <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">

  @yield('css')

  <!-- CSS Files -->

  <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.css') }}">

</head>

<body class="container-fluid m-0 p-0" >

    @include('pagina.componentes.header')


    @yield('content')

    @include('pagina.componentes.modal_faqs')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript" src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

  <!-- Owl Carousel JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script>
      var token = $('meta[name="csrf-token"]').attr('content');
  </script>

  @yield('js_custom')

  <script>
    $("#popularProductsCarousel").owlCarousel({
         loop: true,
         margin: 15,
         autoplay: true,
         autoplayTimeout: 9000,
         autoplayHoverPause: true,
         dots:true,
         responsive: {
             0: {
                 items: 2
             },
             576: {
                 items: 2
             },
             676: {
                 items: 3
             },
             768: {
                 items: 4 // 📌 Ajuste en pantallas de 768px
             },
             950: {  // 📌 Nuevo breakpoint para pantallas de 900px
                 items: 4
             },
             1200: {
                 items: 4
             }
         }
     });

    $("#ClientesCarousel").owlCarousel({
         loop: true,
         margin: 15,
         autoplay: true,
         autoplayTimeout: 9000,
         autoplayHoverPause: true,
         dots:true,
         responsive: {
             0: {
                 items: 2
             },
             576: {
                 items: 2
             },
             676: {
                 items: 3
             },
             768: {
                 items: 4 // 📌 Ajuste en pantallas de 768px
             },
             950: {  // 📌 Nuevo breakpoint para pantallas de 900px
                 items: 4
             },
             1200: {
                 items: 4
             }
         }
     });

  </script>

</body>

</html>
