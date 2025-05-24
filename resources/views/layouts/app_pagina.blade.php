<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/'. $configuracion->favicon) }}">
  <link rel="icon" type="image/png" href="{{ asset('favicon/'. $configuracion->favicon) }}">
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

  @yield('css')

  <!-- CSS Files -->

  <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.css') }}">

  <style>
    .header{
        background-color: #683CC0;
    }

    .nav-pills .nav-link {
        color: #fff;
        fill: #fff;
        padding-top: 20px;
        padding-bottom: 20px;
        font-size: 15px;
        font-weight: 500;
    }

    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        background: #00FFA0;
        color: #683CC0;
    }

  </style>

</head>

<body class="container-fluid m-0 p-0" >
    <header class="header container-fluid  py-3 mb-4 border-bottom sticky-top">
        <div class="row container mx-auto">
            <div class="col-12">
                <div class="container d-flex flex-wrap justify-content-center">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <img class="img_logo_footer " src="{{ asset(path: 'pagina/cropped-new-log.png')}}" alt="">
                </a>

                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Inicio</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Productos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Letras 3d</a></li>
                            <li><a class="dropdown-item" href="#">Impresión digital a gran formato</a></li>
                            <li><a class="dropdown-item" href="#">Letreros en Neón</a></li>
                            <li><a class="dropdown-item" href="#">Anuncios luminosos</a></li>
                            <li><a class="dropdown-item" href="#">Promocionales</a></li>
                            <li><a class="dropdown-item" href="#">Señalética Creativa</a></li>
                            <li><a class="dropdown-item" href="#">Vinilo Decorativo</a></li>

                        </ul>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link">Nosotros</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>

                    <li class="nav-item my-auto">
                         <a href="" class="btn_accion text-center mt-3 mx-auto">Contacto</a>
                    </li>
                </ul>
                </div>

            </div>
        </div>

    </header>

     @yield('content')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript" src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
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
