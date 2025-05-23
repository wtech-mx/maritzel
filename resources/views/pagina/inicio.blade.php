@extends('layouts.app_pagina')

@section('template_title')
    Inicio
@endsection

@section('content')

<section class="row container mx-auto">

    <div class="col-12 col-md-8 col-lg-6">
        <h1 class="text-center titulo_principal mt-3">
            ¡Encuentra todo lo que necesitas para que tu negocio brille!
        </h1>
        <p class="text-center subtitulos mb-4">
            Publicidad que destaca. Fabricamos, instalamos y <br> potencializamos tu marca.
            <br>
            En Imaginarte 3D nos especializamos en:
        </p>
    </div>

    <div class="col-12 col-md-4 col-lg-6">
    </div>

    <div class="col-12 col-md-8 col-lg-6">
        <div class="row">

            <div class="col-6">
                <div class="container_card_inicio mb-3">
                    <div class="row">
                        <div class="col-2 my-auto">
                            <img class="img_container_card_inicio" src="{{ asset('pagina/3d.png')}}" alt="">
                        </div>
                        <div class="col-10 my-auto">
                            <a href="" class="sibtittle_card_inicio">Letras 3D corpóreas</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="container_card_inicio mb-3">
                    <div class="row">
                        <div class="col-2 my-auto">
                            <img class="img_container_card_inicio" src="{{ asset('pagina/senal-de-neon.png')}}" alt="">
                        </div>
                        <div class="col-10 my-auto">
                            <a href="" class="sibtittle_card_inicio">Anuncios luminosos</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="container_card_inicio mb-3">
                    <div class="row">
                        <div class="col-2 my-auto">
                            <img class="img_container_card_inicio" src="{{ asset('pagina/luz-1.png')}}" alt="">
                        </div>
                        <div class="col-10 my-auto">
                            <a href="" class="sibtittle_card_inicio">Letreros de neón</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="container_card_inicio mb-3">
                    <div class="row">
                        <div class="col-2 my-auto">
                            <img class="img_container_card_inicio" src="{{ asset('pagina/continentes.png')}}" alt="">
                        </div>
                        <div class="col-10 my-auto">
                            <a href="" class="sibtittle_card_inicio">Vinil decorativo</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="container_card_inicio mb-3">
                    <div class="row">
                        <div class="col-2 my-auto">
                            <img class="img_container_card_inicio" src="{{ asset('pagina/impresora.png')}}" alt="">
                        </div>
                        <div class="col-10 my-auto">
                            <a href="" class="sibtittle_card_inicio">Impresión a gran formato</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="container_card_inicio mb-3">
                    <div class="row">
                        <div class="col-2 my-auto">
                            <img class="img_container_card_inicio" src="{{ asset('pagina/senalizacion.png')}}" alt="">
                        </div>
                        <div class="col-10 my-auto">
                            <a href="" class="sibtittle_card_inicio">Señalética creativa</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="container_card_inicio mb-3">
                    <div class="row">
                        <div class="col-2 my-auto">
                            <img class="img_container_card_inicio" src="{{ asset('pagina/pintar.png')}}" alt="">
                        </div>
                        <div class="col-10 my-auto">
                            <a href="" class="sibtittle_card_inicio">Arte grafica</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="container_card_inicio mb-3">
                    <div class="row">
                        <div class="col-2 my-auto">
                            <img class="img_container_card_inicio" src="{{ asset('pagina/salida-2.png')}}" alt="">
                        </div>
                        <div class="col-10 my-auto">
                            <a href="" class="sibtittle_card_inicio">Señalética de protección civil</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 mx-auto">
                <p class="text-center mt-4">
                    <a href="" class="btn_accion text-center mt-3 mx-auto">Ver Servicios</a>
                </p>
            </div>

            <div class="col-6">
                <p class="text-center mt-4">
                    <a href="" class="btn_accion text-center mt-3 mx-auto">Cotizar</a>
                </p>
            </div>

        </div>
    </div>

    <div class="col-12 col-md-8 col-lg-6">

        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <p class="text-center">
                        <img src="{{ asset('pagina/b1.png')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                    </p>
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/b1.png')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


    </div>

</section>

<section class="row container mx-auto mt-5 mb-3">
    <div class="col-3">
        <div class="coantiner_card_services">
            <h3 class="h3_subtitle">Selecciona alguno de nuestros servicios</h3>
        </div>
    </div>

    <div class="col-9 my-auto">
        <div id="popularProductsCarousel" class="owl-carousel">
            <div class="coantiner_card_services2">
                <p class="text-center texto_services">
                    <img class="img_coantiner_card_services" src="{{ asset('pagina/letreros3d.webp')}}" alt=""> <br>
                    Letreros 3D
                </p>
            </div>
            <div class="coantiner_card_services2">
                <p class="text-center texto_services">
                    <img class="img_coantiner_card_services" src="{{ asset('pagina/impresion_digital.webp')}}" alt=""> <br>
                   Impresión digital
                </p>
            </div>
            <div class="coantiner_card_services2">
                <p class="text-center texto_services">
                    <img class="img_coantiner_card_services" src="{{ asset('pagina/anuncios-luminosos.webp')}}" alt=""> <br>
                    Anuncios Lumi
                </p>
            </div>
                        <div class="coantiner_card_services2">
                <p class="text-center texto_services">
                    <img class="img_coantiner_card_services" src="{{ asset('pagina/senalizacion.webp')}}" alt=""> <br>
                    Señalización
                </p>
            </div>
        </div>
    </div>
</section>

<section class="row container mx-auto mt-5 mb-3">

    <div class="col-12">
        <h2 class="h2_subtitle">PRODUCTOS</h2>
        <p class="text_parraf mb-5">
            Tener un anuncio publicitario te ayudara a que las personas puedan obtener conocimiento sobre un producto, una marca, una empresa, etc. Estos son y deben ser parte de las compañías, debido a que los anuncios están vinculados con un propósito convincente sobre lo que estas ofrecen al público y están encauzados a la promoción de sus artículos, sus productos y sus servicios. <br>
            <br> Conoce nuestros productos nosotros te ayudamos a que tu publico te recuerde.
        </p>

        <div class="row">
            @foreach ([
                ['src'=>'pagina/1.jpg','label'=>'Letreros 3D'],
                ['src'=>'pagina/4-1.jpg','label'=>'Impresión Digital'],
                ['src'=>'pagina/6.jpg','label'=>'Neón'],
                ['src'=>'pagina/2.jpg','label'=>'Anuncios Luminosos'],
                ['src'=>'pagina/9-1024x649.jpeg','label'=>'Promocionales'],
                ['src'=>'pagina/3.jpg','label'=>'Recorte de Vinil'],
                ['src'=>'pagina/5.jpg','label'=>'Señaletica'],
                ['src'=>'pagina/9.jpg','label'=>'Otros Productos'],
            ] as $img)
                <div class="col-3">
                <div class="container_card_product">
                    <p class="text-center mb-0">
                    <a href="{{ asset($img['src']) }}" class="glightbox" data-gallery="productos" data-title="{{ $img['label'] }}">
                        <img class="img_products" src="{{ asset($img['src']) }}" alt="{{ $img['label'] }}">
                    </a>
                    </p>
                    <p class="text-center text_products">{{ $img['label'] }}</p>
                </div>
                </div>
            @endforeach
        </div>

    </div>

</section>

<section class="row container mx-auto mt-5 mb-3">

    <div class="col-6">
        <div class="d-flex justify-content-center">
            <div class="container_btns">
                <p class="text-star mb-5">
                    <a href="" class="cotizar">Cotizar</a> <br>
                </p>
                <p class="text-star mb-5">
                    <a href="" class="consejos">Consejos</a> <br>
                </p>
                <p class="text-star mb-5">
                    <a href="" class="whatascontacto ">Contáctanos Por WhatsApp</a> <br>
                </p>
            </div>
        </div>
    </div>

    <div class="col-6 my-auto">
        <div class="d-flex justify-content-center">
            <div class="container_btns">
                <h2 class="h2_subtitle text-center">Mándanos un WhatsApp</h2>
                <p class="text_parraf text-center mb-5">
                    Nuestro Objetivo es facilitar el proceso brindándote diferentes opciones que pueden acomodarse a tu presupuesto , entregas e instalaciones
                </p>
            </div>
        </div>
    </div>

</section>

<section class="row container-fluid separador_sections">
    <div class="d-flex justify-content-center">
        <h4 class="h4_separador text-center">IMAGINA - COTIZA - CREA <br>TE ACOMPAÑAMOS DE PRINCIPIO A FIN </h4>
    </div>
</section>

<section class="row container mx-auto mt-5 mb-3">

    <div class="col-6">
        <div class="d-flex justify-content-center">
            <div id="carouselExampleMision" class="carousel slide">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <p class="text-center">
                            <img src="{{ asset('pagina/b1.png')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                        </p>
                    </div>

                    <div class="carousel-item">
                        <img src="{{ asset('pagina/b1.png')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                    </div>

                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleMision" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleMision" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <div class="col-6 my-auto">
        <div class="d-flex justify-content-center">
            <div class="container_btns">

                <h2 class="h2_subtitle">IMAGINARTE 3D</h2>
                <p class="text_parraf mb-5">
                    Somos un equipo de especialistas que promueve soluciones en diseño publicitario, mediante la elaboración de productos de alta calidad y de acuerdo a tus necesidades.
                </p>

                <h2 class="h2_subtitle" style="color: #00BDB4;">Misión</h2>
                <p class="text_parraf mb-5" >
                   Ofrecer servicios y productos de calidad, para la satisfacción total de nuestros clientes.
                </p>

            </div>
        </div>
    </div>

</section>

<section class="row container-fluid  mt-5 mb-3" style="background: #7f5adc">

    <div class="row container mx-auto mt-5 mb-3">
        <div class="col-6">
            <div class="d-flex justify-content-center">
                <div class="container mb-5 mt-5">
                    <h4 class="text_logo">Imaginarte 3D</h4>
                    <h5 class="text_opriniones">
                        Lo que nuestros clientes tienen que decir
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-6">

        </div>
    </div>

</section>

<section class="row container mx-auto mt-5 mb-5">

    <div class="col-8">
        <div id="ClientesCarousel" class="owl-carousel">
             <img class="img_marca" src="{{ asset('pagina/logo_orange_theory_fitness.webp')}}" alt="">
             <img class="img_marca" src="{{ asset('pagina/logo_petroleos_mexicanos.webp')}}" alt="">
             <img class="img_marca" src="{{ asset('pagina/logo_puma.webp')}}" alt="">
             <img class="img_marca" src="{{ asset('pagina/logo_ralph_lauren.webp')}}" alt="">
             <img class="img_marca" src="{{ asset('pagina/logo_uniliver.webp')}}" alt="">
        </div>
    </div>

    <div class="col-4 my-auto">
        <div class="container">
            <h3 class="h3_clientes">Clientes</h3>
            <p class="text_clientes">
                Una mirada a las industrias de alto prestigio y sus estrategias para que su negocio brille.
            </p>
        </div>
    </div>

</section>

<section class="row container separdor mx-auto mt-5 mb-5">

    <div class="col-8">
        <div class="container">
            <p class="text_clientes" style="text-align: start!important">
               TE ACOMPAÑAMOS DE PRINCIPIO A FIN
            </p>
            <h3 class="h3_clientes" style="text-align: start!important">Mándanos un WhatsApp</h3>
        </div>
    </div>

    <div class="col-4">
        <div class="d-flex justify-content-center">
            <div class="container_btns">
                <p class="text-end mb-5">
                    <a href="" class="cotizar">Cotizar</a> <br>
                </p>
                <p class="text-end mb-5">
                    <a href="" class="cotizar ">Contáctanos Por WhatsApp</a> <br>
                </p>
            </div>
        </div>
    </div>

</section>

<section class="row container mx-auto mt-3 mb-3">

    <div class="col-6">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7526.344046683556!2d-99.126111!3d19.404972!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff7fb3cd9809%3A0xf15b66d1828439a9!2sLetras%203D%2C%20Anuncios%20luminosos%20e%20impresi%C3%B3n%20en%20vinil%2C%20lona%2C%20papel%20tapiz%20y%20r%C3%ADgidos.!5e0!3m2!1sen!2smx!4v1747267358411!5m2!1sen!2smx" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    </div>
    <div class="col-6">
        <h3 class="h3_clientes" style="text-align: start!important">Ponte en contacto y recibe asesoría</h3>
    </div>

</section>

@include('pagina.componentes.footer')

@endsection

@section('js_custom')

<script>
  document.addEventListener("DOMContentLoaded", function(){
    const lightbox = GLightbox({
      selector: '.glightbox',
      touchNavigation: true,
      loop: true,
      zoomable: true,
      slideEffect: 'fade'  // efecto suave
    });
  });
</script>

@endsection
