@extends('layouts.app_pagina')

@section('template_title')
    Inicio
@endsection

@section('content')

<section class="row container-lg mx-auto">

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
                    <a href="{{ route('pagina.letras3d') }}" style="display: contents;">
                        <div class="row">
                            <div class="col-4 col-md-2 col-lg-2 my-auto">
                                <p class="text-center my-auto">
                                    <img class="img_container_card_inicio" src="{{ asset('pagina/3d.png')}}" alt="">
                                </p>
                            </div>
                            <div class="col-8 col-md-10 col-lg-10 my-auto">
                                <a href="{{ route('pagina.letras3d') }}" class="sibtittle_card_inicio">Letras 3D corpóreas</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6">
                <div class="container_card_inicio mb-3">
                    <a href="{{ route('pagina.anuncios_luminosos') }}" style="display: contents;">
                        <div class="row">
                            <div class="col-4 col-md-2 col-lg-2 my-auto">
                                <p class="text-center my-auto">
                                <img class="img_container_card_inicio" src="{{ asset('pagina/senal-de-neon.png')}}" alt="">
                                </p>
                            </div>
                            <div class="col-8 col-md-10 col-lg-10 my-auto">
                                <a href="{{ route('pagina.anuncios_luminosos') }}" class="sibtittle_card_inicio">Anuncios luminosos</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6">
                <div class="container_card_inicio mb-3">
                    <a href="{{ route('pagina.letreros_neon') }}" style="display: contents;">
                        <div class="row">
                            <div class="col-4 col-md-2 col-lg-2 my-auto">
                                <p class="text-center my-auto">
                                <img class="img_container_card_inicio" src="{{ asset('pagina/luz-1.png')}}" alt="">
                                </p>
                            </div>
                            <div class="col-8 col-md-10 col-lg-10 my-auto">
                                <a href="{{ route('pagina.letreros_neon') }}" class="sibtittle_card_inicio">Letreros de neón</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6">
                <div class="container_card_inicio mb-3">
                    <a href="{{ route('pagina.vinil') }}" style="display: contents;">
                        <div class="row">
                            <div class="col-4 col-md-2 col-lg-2 my-auto">
                                <p class="text-center my-auto">
                                <img class="img_container_card_inicio" src="{{ asset('pagina/continentes.png')}}" alt="">
                                </p>
                            </div>
                            <div class="col-8 col-md-10 col-lg-10 my-auto">
                                <a href="{{ route('pagina.vinil') }}" class="sibtittle_card_inicio">Vinil decorativo</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6">
                <div class="container_card_inicio mb-3">
                    <a href="{{ route('pagina.impresion_digital') }}" style="display: contents;">
                        <div class="row">
                            <div class="col-4 col-md-2 col-lg-2 my-auto">
                                <p class="text-center my-auto">
                                <img class="img_container_card_inicio" src="{{ asset('pagina/impresora.png')}}" alt="">
                                </p>
                            </div>
                            <div class="col-8 col-md-10 col-lg-10 my-auto">
                                <a href="{{ route('pagina.impresion_digital') }}" class="sibtittle_card_inicio">Impresión a gran formato</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6">
                <div class="container_card_inicio mb-3">
                    <a href="{{ route('pagina.señaletica') }}" style="display: contents;">
                        <div class="row">
                            <div class="col-4 col-md-2 col-lg-2 my-auto">
                                <p class="text-center my-auto">
                                <img class="img_container_card_inicio" src="{{ asset('pagina/senalizacion.png')}}" alt="">
                                </p>
                            </div>
                            <div class="col-8 col-md-10 col-lg-10 my-auto">
                                <a href="{{ route('pagina.señaletica') }}" class="sibtittle_card_inicio">Señalética creativa</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6">
                <div class="container_card_inicio mb-3">
                    <a href="{{ route('pagina.vinil') }}" style="display: contents;">
                        <div class="row">
                            <div class="col-4 col-md-2 col-lg-2 my-auto">
                                <p class="text-center my-auto">
                                <img class="img_container_card_inicio" src="{{ asset('pagina/pintar.png')}}" alt="">
                                </p>
                            </div>
                            <div class="col-8 col-md-10 col-lg-10 my-auto">
                                <a href="{{ route('pagina.vinil') }}" class="sibtittle_card_inicio">Arte grafica</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6">
                <div class="container_card_inicio mb-3">
                    <a href="{{ route('pagina.señaletica') }}" style="display: contents;">
                        <div class="row">
                            <div class="col-4 col-md-2 col-lg-2 my-auto">
                                <p class="text-center my-auto">
                                <img class="img_container_card_inicio" src="{{ asset('pagina/salida-2.png')}}" alt="">
                                </p>
                            </div>
                            <div class="col-8 col-md-10 col-lg-10 my-auto">
                                <a href="{{ route('pagina.señaletica') }}" class="sibtittle_card_inicio">Señalética de protección civil</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6 mx-auto">
                <p class="text-center mt-4">
                    <a href="#productos" class="btn_accion text-center mt-3 mx-auto">Ver Servicios</a>
                </p>
            </div>

            <div class="col-6">
                <p class="text-center mt-4">
                    <a href="" class="btn_accion text-center mt-3 mx-auto">Cotizar <i class="bi bi-whatsapp"></i></a>
                </p>
            </div>

        </div>
    </div>

    <div class="col-12 col-md-4 col-lg-6 mt-5 mt-sm-5 mt-md-0 mt-lg-0">

        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <p class="text-center">
                        <img src="{{ asset('pagina/banner/1.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                    </p>
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/2.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/3.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/4.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/5.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/6.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/7.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/8.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/9.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/10.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/11.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/12.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/13.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/14.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/15.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/16.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/17.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/18.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/19.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/20.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/21.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/22.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/23.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/24.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/25.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/26.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/27.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/28.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
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

<section class="row container-lg mx-auto mt-5 mb-3" >
    <div class="col-12 col-md-3 col-lg-3 mb-2 mb-md-0 mb-lg-0" id="productos">
        <div class="coantiner_card_services">
            <h3 class="h3_subtitle">Selecciona alguno de nuestros servicios</h3>
        </div>
    </div>

    <div class="col-12 col-md-9 col-lg-9 my-auto">
        <div id="popularProductsCarousel" class="owl-carousel">
            <a class="texto_services" href="{{ route('pagina.letras3d') }}">
                <div class="coantiner_card_services2">
                    <p class="text-center texto_services">
                            <img class="img_coantiner_card_services" src="{{ asset('pagina/letreros3d.webp')}}" alt=""> <br>
                            Letreros 3D
                    </p>
                </div>
            </a>

            <a class="texto_services" href="{{ route('pagina.impresion_digital') }}">
                <div class="coantiner_card_services2">
                    <p class="text-center texto_services">
                            <img class="img_coantiner_card_services" src="{{ asset('pagina/impresion_digital.webp')}}" alt=""> <br>
                        Impresión digital
                    </p>
                </div>
            </a>

            <a class="texto_services" href="{{ route('pagina.anuncios_luminosos') }}">
                <div class="coantiner_card_services2">
                    <p class="text-center texto_services">
                        <img class="img_coantiner_card_services" src="{{ asset('pagina/anuncios-luminosos.webp')}}" alt=""> <br>
                        Anuncios Lumi
                    </p>
                </div>
            </a>

            <a class="texto_services" href="{{ route('pagina.señaletica') }}">
            <div class="coantiner_card_services2">
                <p class="text-center texto_services">
                    <img class="img_coantiner_card_services" src="{{ asset('pagina/senalizacion.webp')}}" alt=""> <br>
                    Señalización

                </p>
            </div>
            </a>
        </div>
    </div>
</section>

<section class="container-lg mx-auto mt-5 mb-3">
  <div class="row">
    <div class="col-12">
      <h2 class="h2_subtitle">PRODUCTOS</h2>
      <p class="text_parraf mb-5">
        Tener un anuncio publicitario te ayudara a que las personas puedan obtener conocimiento sobre un producto, una marca, una empresa, etc. Estos son y deben ser parte de las compañías, debido a que los anuncios están vinculados con un propósito convincente sobre lo que estas ofrecen al público y están encauzados a la promoción de sus artículos, sus productos y sus servicios. <br><br>
        Conoce nuestros productos nosotros te ayudamos a que tu publico te recuerde.
      </p>
    </div>
  </div>

    <!-- Sección: Nuestros Productos Destacados (Bootstrap 5) -->
    <section id="productos-destacados" class="bg-white p-4 p-md-5 rounded-4 shadow mb-5">
        <h3 class="h1 fw-bold text-center text-dark mb-4">
        Nuestros Productos Destacados
        </h3>

        <div class="row g-4">
        <!-- Letras 3D -->
        <div class="col-12 col-md-6 col-lg-4">
            <a href="#letras-3d" class="image-card h-100 d-block text-decoration-none">
            <img
                src="{{ asset('img/1.png') }}"
                alt="Letras 3D Corpóreas"
                class="w-100"
                style="height: 12rem; object-fit: cover;"
            >
            <div class="p-3">
                <h4 class="h5 fw-semibold mb-2 text-dark">Letras 3D Corpóreas</h4>
                <p class="text-secondary small mb-0">
                Dale volumen y presencia a tu marca con letras fabricadas en diversos materiales.
                </p>
            </div>
            </a>
        </div>

        <!-- Anuncios Luminosos -->
        <div class="col-12 col-md-6 col-lg-4">
            <a href="#anuncios-luminosos" class="image-card h-100 d-block text-decoration-none">
            <img
                src="{{ asset('img/2.png') }}"
                alt="Anuncios Luminosos"
                class="w-100"
                style="height: 12rem; object-fit: cover;"
            >
            <div class="p-3">
                <h4 class="h5 fw-semibold mb-2 text-dark">Anuncios Luminosos</h4>
                <p class="text-secondary small mb-0">
                Ilumina tu negocio y capta la atención con soluciones de iluminación LED.
                </p>
            </div>
            </a>
        </div>

        <!-- Neón Flex -->
        <div class="col-12 col-md-6 col-lg-4">
            <a href="#neon-flex" class="image-card h-100 d-block text-decoration-none">
            <img
                src="{{ asset('img/4.png') }}"
                alt="Letreros en Neón Flex"
                class="w-100"
                style="height: 12rem; object-fit: cover;"
            >
            <div class="p-3">
                <h4 class="h5 fw-semibold mb-2 text-dark">Letreros en Neón Flex</h4>
                <p class="text-secondary small mb-0">
                El estilo clásico y llamativo del neón con la versatilidad del LED.
                </p>
            </div>
            </a>
        </div>

        <!-- Impresión Digital -->
        <div class="col-12 col-md-6 col-lg-4">
            <a href="#impresion-digital" class="image-card h-100 d-block text-decoration-none">
            <img
                src="{{ asset('img/6.png') }}"
                alt="Impresión Digital a Gran Formato"
                class="w-100"
                style="height: 12rem; object-fit: cover;"
            >
            <div class="p-3">
                <h4 class="h5 fw-semibold mb-2 text-dark">Impresión Digital a Gran Formato</h4>
                <p class="text-secondary small mb-0">
                Soluciones de impresión en lona, vinil, papel y más para tus proyectos.
                </p>
            </div>
            </a>
        </div>

        <!-- Señalética -->
        <div class="col-12 col-md-6 col-lg-4">
            <a href="#senaletica" class="image-card h-100 d-block text-decoration-none">
            <img
                src="{{ asset('img/9.png') }}"
                alt="Señalética Creativa"
                class="w-100"
                style="height: 12rem; object-fit: cover;"
            >
            <div class="p-3">
                <h4 class="h5 fw-semibold mb-2 text-dark">Señalética Creativa</h4>
                <p class="text-secondary small mb-0">
                Guía y comunica de forma efectiva con diseños innovadores.
                </p>
            </div>
            </a>
        </div>

        <!-- Promocionales -->
        <div class="col-12 col-md-6 col-lg-4">
            <a href="#promocionales" class="image-card h-100 d-block text-decoration-none">
            <img
                src="{{ asset('img/10.png') }}"
                alt="Promocionales"
                class="w-100"
                style="height: 12rem; object-fit: cover;"
            >
            <div class="p-3">
                <h4 class="h5 fw-semibold mb-2 text-dark">Promocionales</h4>
                <p class="text-secondary small mb-0">
                Posiciona tu marca con artículos personalizados de alto impacto.
                </p>
            </div>
            </a>
        </div>

        <!-- Vinilo Decorativo -->
        <div class="col-12 col-md-6 col-lg-4">
            <a href="#vinilo-decorativo" class="image-card h-100 d-block text-decoration-none">
            <img
                src="{{ asset('img/12.png') }}"
                alt="Vinilo Decorativo"
                class="w-100"
                style="height: 12rem; object-fit: cover;"
            >
            <div class="p-3">
                <h4 class="h5 fw-semibold mb-2 text-dark">Vinilo Decorativo</h4>
                <p class="text-secondary small mb-0">
                Personaliza tus espacios con vinilos adhesivos duraderos y versátiles.
                </p>
            </div>
            </a>
        </div>
        </div>
    </section>

    <!-- Sección: Letras 3D Corpóreas (Bootstrap 5) -->
    <section id="letras-3d" class="bg-white p-4 p-md-5 rounded-4 shadow mb-5">
    <h3 class="h2 fw-bold text-dark text-center mb-3">Letras 3D Corpóreas</h3>

    <p class="text-secondary text-center mx-auto mb-4" style="max-width: 42rem;">
        Dale volumen y presencia a tu marca. Fabricamos letras 3D en diversos materiales con acabados e iluminación que resaltarán su belleza y elegancia. Haz clic en cada material para ver más detalles.
    </p>

    <div class="accordion" id="accordionLetras3D">

        <!-- Aluminio -->
        <div class="accordion-item mb-3 border-0 shadow-sm rounded-3 overflow-hidden">
        <h2 class="accordion-header" id="headingAluminio">
            <button class="accordion-button fw-bold" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseAluminio"
                    aria-expanded="true" aria-controls="collapseAluminio">
            Letras 3D en Aluminio
            </button>
        </h2>
        <div id="collapseAluminio" class="accordion-collapse collapse show"
            aria-labelledby="headingAluminio" data-bs-parent="#accordionLetras3D">
            <div class="accordion-body">
            <p class="text-secondary mb-4">
                La opción en aluminio otorga sobriedad y formalidad a tu marca. Con sus diferentes tonalidades, acabados e iluminación, el aluminio es ideal para un impacto duradero tanto en interiores como exteriores. Es la elección perfecta para quienes buscan una imagen sofisticada y de alta calidad.
            </p>

            <div class="row g-3 mb-4">
                <div class="col-12 col-md-6">
                <div class="image-card h-100">
                    <img src="https://placehold.co/400x300/A78BFA/FFFFFF?text=Aluminio+Plata+Cepillado"
                        alt="Letra 3D Aluminio plata cepillado"
                        class="w-100" style="height: 12rem; object-fit: cover;">
                    <div class="p-2"><p class="fw-medium small mb-0">Aluminio Plata Cepillado</p></div>
                </div>
                </div>
                <div class="col-12 col-md-6">
                <div class="image-card h-100">
                    <img src="https://placehold.co/400x300/D8B4FE/FFFFFF?text=Aluminio+Acero+Natural"
                        alt="Letrero 3D Aluminio acero natural"
                        class="w-100" style="height: 12rem; object-fit: cover;">
                    <div class="p-2"><p class="fw-medium small mb-0">Aluminio Acero Natural</p></div>
                </div>
                </div>
                <div class="col-12 col-md-6">
                <div class="image-card h-100">
                    <img src="https://placehold.co/400x300/C4B5FD/FFFFFF?text=Aluminio+Dorado"
                        alt="Letras 3D en aluminio dorado"
                        class="w-100" style="height: 12rem; object-fit: cover;">
                    <div class="p-2"><p class="fw-medium small mb-0">Aluminio Dorado</p></div>
                </div>
                </div>
                <div class="col-12 col-md-6">
                <div class="image-card h-100">
                    <img src="https://placehold.co/400x300/A78BFA/FFFFFF?text=Aluminio+Luz+C%C3%A1lida"
                        alt="Aluminio con Luz Indirecta Cálida"
                        class="w-100" style="height: 12rem; object-fit: cover;">
                    <div class="p-2"><p class="fw-medium small mb-0">Aluminio con Luz Indirecta Cálida</p></div>
                </div>
                </div>
                <div class="col-12 col-md-6">
                <div class="image-card h-100">
                    <img src="https://placehold.co/400x300/D8B4FE/FFFFFF?text=Aluminio+Negro+Mate"
                        alt="Aluminio Negro Mate"
                        class="w-100" style="height: 12rem; object-fit: cover;">
                    <div class="p-2"><p class="fw-medium small mb-0">Aluminio Negro Mate</p></div>
                </div>
                </div>
                <div class="col-12 col-md-6">
                <div class="image-card h-100">
                    <img src="https://placehold.co/400x300/C4B5FD/FFFFFF?text=Aluminio+Espejo"
                        alt="Aluminio Espejo"
                        class="w-100" style="height: 12rem; object-fit: cover;">
                    <div class="p-2"><p class="fw-medium small mb-0">Aluminio Espejo</p></div>
                </div>
                </div>
            </div>

            <h4 class="h5 fw-semibold text-dark mb-2">Características Detalladas:</h4>
            <ul class="text-secondary mb-4">
                <li class="mb-2"><strong>Tonalidades:</strong> Plata, Oro, Cobre, Negro, Acero, Chocolate, Blanco, y más.</li>
                <li class="mb-2"><strong>Acabados:</strong> Cepillado, espejo y natural.</li>
                <li class="mb-2"><strong>Iluminación:</strong> Indirecta fría/cálida o RGB.</li>
                <li class="mb-2"><strong>Realzado o Canto:</strong> Grosor de 2 a 10 cm.</li>
                <li class="mb-2"><strong>Versatilidad:</strong> Interior y exterior.</li>
                <li class="mb-2"><strong>Garantía:</strong> +10 años, no se oxida ni mancha por UV.</li>
                <li class="mb-2"><strong>Mantenimiento:</strong> Fácil y práctico.</li>
                <li class="mb-2"><strong>Calidad:</strong> Aluminio de primera línea (Spec o Lac).</li>
                <li class="mb-2"><strong>Personalización de color:</strong> Pintura electroestática.</li>
            </ul>

            <div class="text-center">
                <a href="#contacto" class="main-cta-button d-inline-block">
                QUIERO COTIZAR MI LETRERO DE ALUMINIO
                </a>
            </div>
            </div>
        </div>
        </div>

        <!-- Acrílico -->
        <div class="accordion-item mb-3 border-0 shadow-sm rounded-3 overflow-hidden">
        <h2 class="accordion-header" id="headingAcrilico">
            <button class="accordion-button collapsed fw-bold" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseAcrilico"
                    aria-expanded="false" aria-controls="collapseAcrilico">
            Letras 3D en Acrílico
            </button>
        </h2>
        <div id="collapseAcrilico" class="accordion-collapse collapse"
            aria-labelledby="headingAcrilico" data-bs-parent="#accordionLetras3D">
            <div class="accordion-body">
            <p class="text-secondary mb-4">
                Ideal si buscas innovación y frescura. El acrílico, con su belleza similar al cristal, flexibilidad y ligereza, es una excelente opción para realzar letras, figuras e isotipos en 3D. Su naturaleza translúcida permite un brillo único al iluminarse y ofrece una amplia gama de colores, adaptándose a cualquier diseño moderno.
            </p>

            <div class="row g-3 mb-4">
                <div class="col-12 col-md-6">
                <div class="image-card h-100">
                    <img src="https://placehold.co/400x300/6EE7B7/FFFFFF?text=Acr%C3%ADlico+Rosa+Luz+Directa"
                        alt="Acrílico Rosa con Luz Directa"
                        class="w-100" style="height: 12rem; object-fit: cover;">
                    <div class="p-2"><p class="fw-medium small mb-0">Acrílico Rosa con Luz Directa</p></div>
                </div>
                </div>
                <div class="col-12 col-md-6">
                <div class="image-card h-100">
                    <img src="https://placehold.co/400x300/34D399/FFFFFF?text=Acr%C3%ADlico+Blanco+Luz+Fr%C3%ADa"
                        alt="Acrílico Blanco con Luz Fría"
                        class="w-100" style="height: 12rem; object-fit: cover;">
                    <div class="p-2"><p class="fw-medium small mb-0">Acrílico Blanco con Luz Fría</p></div>
                </div>
                </div>
                <div class="col-12 col-md-6">
                <div class="image-card h-100">
                    <img src="https://placehold.co/400x300/10B981/FFFFFF?text=Acr%C3%ADlico+Rojo+Sin+Luz"
                        alt="Acrílico Rojo sin Luz"
                        class="w-100" style="height: 12rem; object-fit: cover;">
                    <div class="p-2"><p class="fw-medium small mb-0">Acrílico Rojo sin Luz</p></div>
                </div>
                </div>
                <div class="col-12 col-md-6">
                <div class="image-card h-100">
                    <img src="https://placehold.co/400x300/6EE7B7/FFFFFF?text=Medall%C3%B3n+Acr%C3%ADlico+Vinil"
                        alt="Medallón de Acrílico con Vinil"
                        class="w-100" style="height: 12rem; object-fit: cover;">
                    <div class="p-2"><p class="fw-medium small mb-0">Medallón de Acrílico con Vinil</p></div>
                </div>
                </div>
                <div class="col-12 col-md-6">
                <div class="image-card h-100">
                    <img src="https://placehold.co/400x300/34D399/FFFFFF?text=Acr%C3%ADlico+Transparente"
                        alt="Acrílico Transparente"
                        class="w-100" style="height: 12rem; object-fit: cover;">
                    <div class="p-2"><p class="fw-medium small mb-0">Acrílico Transparente</p></div>
                </div>
                </div>
                <div class="col-12 col-md-6">
                <div class="image-card h-100">
                    <img src="https://placehold.co/400x300/10B981/FFFFFF?text=Acr%C3%ADlico+RGB"
                        alt="Acrílico con Luz RGB"
                        class="w-100" style="height: 12rem; object-fit: cover;">
                    <div class="p-2"><p class="fw-medium small mb-0">Acrílico con Luz RGB</p></div>
                </div>
                </div>
            </div>

            <h4 class="h5 fw-semibold text-dark mb-2">Características Detalladas:</h4>
            <ul class="text-secondary mb-4">
                <li class="mb-2"><strong>Colores:</strong> Blanco, rojo, amarillo, azul, rosa, verde, vino, naranja, etc.</li>
                <li class="mb-2"><strong>Acabado:</strong> Translúcido con brillo al iluminar.</li>
                <li class="mb-2"><strong>Iluminación:</strong> Directa/indirecta fría o cálida, RGB.</li>
                <li class="mb-2"><strong>Realzado:</strong> 5 a 10 cm.</li>
                <li class="mb-2"><strong>Versatilidad:</strong> Interior y exterior.</li>
                <li class="mb-2"><strong>Garantía:</strong> +10 años, resistente UV.</li>
                <li class="mb-2"><strong>Mantenimiento:</strong> Mínimo.</li>
                <li class="mb-2"><strong>Calidad:</strong> Acrílicos de primera mano.</li>
                <li class="mb-2"><strong>Extra:</strong> Rotulación con vinil.</li>
            </ul>

            <div class="text-center">
                <a href="#contacto" class="main-cta-button d-inline-block">
                QUIERO COTIZAR MI LETRERO DE ACRÍLICO
                </a>
            </div>
            </div>
        </div>
        </div>

        <!-- Acrílico con Aluminio -->
        <div class="accordion-item mb-3 border-0 shadow-sm rounded-3 overflow-hidden">
        <h2 class="accordion-header" id="headingAcrilicoAluminio">
            <button class="accordion-button collapsed fw-bold" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseAcrilicoAluminio"
                    aria-expanded="false" aria-controls="collapseAcrilicoAluminio">
            Letras 3D Acrílico con Aluminio
            </button>
        </h2>
        <div id="collapseAcrilicoAluminio" class="accordion-collapse collapse"
            aria-labelledby="headingAcrilicoAluminio" data-bs-parent="#accordionLetras3D">
            <div class="accordion-body">
            <p class="text-secondary mb-4">
                La combinación perfecta de la naturalidad del acrílico y la elegancia del aluminio. Ofrece diversas posibilidades de fabricación, como frente de acrílico y cantos de aluminio o viceversa. Ideales para colocarse en alturas y lograr un impacto visual impresionante, fusionando durabilidad y estética.
            </p>

            <div class="row g-3 mb-4">
                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/93C5FD/FFFFFF?text=Acr%C3%ADlico+Frente+Aluminio+Cantos"
                    alt="Frente Acrílico, Cantos Aluminio" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">Frente Acrílico, Cantos Aluminio</p></div>
                </div></div>

                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/60A5FA/FFFFFF?text=Aluminio+Frente+Acr%C3%ADlico+Cantos"
                    alt="Frente Aluminio, Cantos Acrílico" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">Frente Aluminio, Cantos Acrílico</p></div>
                </div></div>

                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/3B82F6/FFFFFF?text=Letras+Combinadas+1"
                    alt="Combinación 1" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">Combinación de Materiales 1</p></div>
                </div></div>

                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/93C5FD/FFFFFF?text=Letras+Combinadas+2"
                    alt="Combinación 2" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">Combinación de Materiales 2</p></div>
                </div></div>

                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/60A5FA/FFFFFF?text=Acr%C3%ADlico+Iluminado+Aluminio"
                    alt="Acrílico iluminado con base de aluminio" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">Acrílico Iluminado con Base de Aluminio</p></div>
                </div></div>

                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/3B82F6/FFFFFF?text=Aluminio+Iluminado+Acr%C3%ADlico"
                    alt="Aluminio iluminado con frente de acrílico" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">Aluminio Iluminado con Frente de Acrílico</p></div>
                </div></div>
            </div>

            <h4 class="h5 fw-semibold text-dark mb-2">Características Detalladas:</h4>
            <ul class="text-secondary mb-4">
                <li class="mb-2"><strong>Tonalidades Aluminio:</strong> Plata, Oro, Cobre, Negro, Acero, Chocolate, Blanco, etc.</li>
                <li class="mb-2"><strong>Colores Acrílico:</strong> Blanco, rojo, amarillo, azul, rosa, verde, vino, naranja, etc.</li>
                <li class="mb-2"><strong>Acabado Acrílico:</strong> Translúcido.</li>
                <li class="mb-2"><strong>Acabados Aluminio:</strong> Cepillado, espejo, natural.</li>
                <li class="mb-2"><strong>Iluminación:</strong> Directa/indirecta fría o cálida, RGB.</li>
                <li class="mb-2"><strong>Realzado:</strong> 5 a 10 cm.</li>
                <li class="mb-2"><strong>Versatilidad:</strong> Interior y exterior.</li>
                <li class="mb-2"><strong>Garantía:</strong> +10 años.</li>
            </ul>

            <div class="text-center">
                <a href="#contacto" class="main-cta-button d-inline-block">
                QUIERO COTIZAR MI LETRERO COMBINADO
                </a>
            </div>
            </div>
        </div>
        </div>

        <!-- Acero Inoxidable -->
        <div class="accordion-item mb-3 border-0 shadow-sm rounded-3 overflow-hidden">
        <h2 class="accordion-header" id="headingAcero">
            <button class="accordion-button collapsed fw-bold" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseAcero"
                    aria-expanded="false" aria-controls="collapseAcero">
            Letras 3D en Acero Inoxidable
            </button>
        </h2>
        <div id="collapseAcero" class="accordion-collapse collapse"
            aria-labelledby="headingAcero" data-bs-parent="#accordionLetras3D">
            <div class="accordion-body">
            <p class="text-secondary mb-4">
                Para un acabado de lujo y máxima durabilidad, las letras 3D en acero inoxidable son la elección perfecta. Resistentes a la corrosión, a las condiciones climáticas extremas y con un brillo distintivo, son ideales para fachadas, señalización de alto impacto y ambientes que requieren una estética superior y una larga vida útil.
            </p>

            <div class="row g-3 mb-4">
                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/A78BFA/FFFFFF?text=Acero+Inoxidable+Pulido"
                    alt="Acero Inoxidable Pulido" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">Acero Inoxidable Pulido</p></div>
                </div></div>

                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/D8B4FE/FFFFFF?text=Acero+Inoxidable+Cepillado"
                    alt="Acero Inoxidable Cepillado" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">Acero Inoxidable Cepillado</p></div>
                </div></div>

                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/C4B5FD/FFFFFF?text=Acero+Inoxidable+Retroiluminado"
                    alt="Acero Inoxidable Retroiluminado" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">Acero Inoxidable Retroiluminado</p></div>
                </div></div>

                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/A78BFA/FFFFFF?text=Acero+Inoxidable+Pintado"
                    alt="Acero Inoxidable Pintado" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">Acero Inoxidable Pintado</p></div>
                </div></div>

                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/D8B4FE/FFFFFF?text=Acero+Inoxidable+Oro"
                    alt="Acero Inoxidable Oro" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">Acero Inoxidable Color Oro</p></div>
                </div></div>

                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/C4B5FD/FFFFFF?text=Acero+Inoxidable+Negro"
                    alt="Acero Inoxidable Negro" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">Acero Inoxidable Color Negro</p></div>
                </div></div>
            </div>

            <h4 class="h5 fw-semibold text-dark mb-2">Características Detalladas:</h4>
            <ul class="text-secondary mb-4">
                <li class="mb-2"><strong>Acabados:</strong> Pulido espejo, satinado/cepillado, colores electroestáticos.</li>
                <li class="mb-2"><strong>Durabilidad:</strong> Ultra resistente a corrosión e intemperie.</li>
                <li class="mb-2"><strong>Iluminación:</strong> Retroiluminación LED tipo halo.</li>
                <li class="mb-2"><strong>Realzado:</strong> Diferentes espesores.</li>
                <li class="mb-2"><strong>Uso:</strong> Fachadas, recepciones, exteriores de alta gama.</li>
                <li class="mb-2"><strong>Mantenimiento:</strong> Mínimo.</li>
            </ul>

            <div class="text-center">
                <a href="#contacto" class="main-cta-button d-inline-block">
                QUIERO COTIZAR MI LETRERO DE ACERO
                </a>
            </div>
            </div>
        </div>
        </div>

        <!-- MDF -->
        <div class="accordion-item mb-3 border-0 shadow-sm rounded-3 overflow-hidden">
        <h2 class="accordion-header" id="headingMDF">
            <button class="accordion-button collapsed fw-bold" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseMDF"
                    aria-expanded="false" aria-controls="collapseMDF">
            Letras 3D en MDF
            </button>
        </h2>
        <div id="collapseMDF" class="accordion-collapse collapse"
            aria-labelledby="headingMDF" data-bs-parent="#accordionLetras3D">
            <div class="accordion-body">
            <p class="text-secondary mb-4">
                Las letras 3D en MDF son una opción económica y versátil, ideal para interiores. Permiten una gran variedad de acabados, desde pintura personalizada hasta rotulación con vinil.
            </p>

            <div class="row g-3 mb-4">
                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/6EE7B7/FFFFFF?text=MDF+Pintado"
                    alt="MDF Pintado" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">MDF Pintado</p></div>
                </div></div>

                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/34D399/FFFFFF?text=MDF+Con+Vinil"
                    alt="MDF con Vinil" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">MDF con Vinil</p></div>
                </div></div>

                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/10B981/FFFFFF?text=MDF+Con+Frente+Aluminio"
                    alt="MDF con Frente de Aluminio" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">MDF con Frente de Aluminio</p></div>
                </div></div>

                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/6EE7B7/FFFFFF?text=MDF+Personalizado"
                    alt="MDF Personalizado" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">MDF Personalizado</p></div>
                </div></div>

                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/34D399/FFFFFF?text=MDF+Natural"
                    alt="MDF Natural" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">MDF en Acabado Natural</p></div>
                </div></div>

                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/10B981/FFFFFF?text=MDF+Con+Acr%C3%ADlico"
                    alt="MDF con Frente de Acrílico" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">MDF con Frente de Acrílico</p></div>
                </div></div>
            </div>

            <h4 class="h5 fw-semibold text-dark mb-2">Características Detalladas:</h4>
            <ul class="text-secondary mb-4">
                <li class="mb-2"><strong>Uso:</strong> Solo interior (no humedad/intemperie).</li>
                <li class="mb-2"><strong>Espesores:</strong> 3, 4, 6, 9 y hasta 12 mm.</li>
                <li class="mb-2"><strong>Acabados:</strong> Pintura, vinil, frente aluminio/acrílico.</li>
                <li class="mb-2"><strong>Iluminación:</strong> No interna (se puede complementar externa).</li>
                <li class="mb-2"><strong>Costo:</strong> Económico y versátil.</li>
            </ul>

            <div class="text-center">
                <a href="#contacto" class="main-cta-button d-inline-block">
                QUIERO COTIZAR MI LETRERO DE MDF
                </a>
            </div>
            </div>
        </div>
        </div>

        <!-- PVC -->
        <div class="accordion-item border-0 shadow-sm rounded-3 overflow-hidden">
        <h2 class="accordion-header" id="headingPVC">
            <button class="accordion-button collapsed fw-bold" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapsePVC"
                    aria-expanded="false" aria-controls="collapsePVC">
            Letras 3D en PVC
            </button>
        </h2>
        <div id="collapsePVC" class="accordion-collapse collapse"
            aria-labelledby="headingPVC" data-bs-parent="#accordionLetras3D">
            <div class="accordion-body">
            <p class="text-secondary mb-4">
                El PVC es ligero y resistente, ideal para letras 3D tanto en interiores como exteriores. Perfecto para acabados en pintura o vinil.
            </p>

            <div class="row g-3 mb-4">
                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/A78BFA/FFFFFF?text=PVC+Pintado+Exterior"
                    alt="PVC Pintado Exterior" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">PVC Pintado Exterior</p></div>
                </div></div>

                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/D8B4FE/FFFFFF?text=PVC+Con+Vinil"
                    alt="PVC con Vinil" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">PVC con Vinil</p></div>
                </div></div>

                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/C4B5FD/FFFFFF?text=PVC+Con+Frente+Aluminio"
                    alt="PVC con Frente de Aluminio" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">PVC con Frente de Aluminio</p></div>
                </div></div>

                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/A78BFA/FFFFFF?text=PVC+Personalizado"
                    alt="PVC Personalizado" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">PVC Personalizado</p></div>
                </div></div>

                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/D8B4FE/FFFFFF?text=PVC+Blanco"
                    alt="PVC Blanco Natural" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">PVC en Blanco Natural</p></div>
                </div></div>

                <div class="col-12 col-md-6"><div class="image-card h-100">
                <img src="https://placehold.co/400x300/C4B5FD/FFFFFF?text=PVC+Negro"
                    alt="PVC Negro" class="w-100" style="height:12rem;object-fit:cover;">
                <div class="p-2"><p class="fw-medium small mb-0">PVC en Negro</p></div>
                </div></div>
            </div>

            <h4 class="h5 fw-semibold text-dark mb-2">Características Detalladas:</h4>
            <ul class="text-secondary mb-4">
                <li class="mb-2"><strong>Uso:</strong> Interior y exterior; resistente a humedad.</li>
                <li class="mb-2"><strong>Espesores:</strong> 3, 4, 6, 9 y hasta 12 mm.</li>
                <li class="mb-2"><strong>Acabados:</strong> Pintura, vinil, frente aluminio.</li>
                <li class="mb-2"><strong>Iluminación:</strong> No interna (ideal con luz externa).</li>
                <li class="mb-2"><strong>Propiedades:</strong> Ligero, fácil de instalar, durable.</li>
            </ul>

            <div class="text-center">
                <a href="#contacto" class="main-cta-button d-inline-block">
                QUIERO COTIZAR MI LETRERO DE PVC
                </a>
            </div>
            </div>
        </div>
        </div>

    </div>
    </section>

    <!-- Sección: Anuncios Luminosos (Bootstrap 5) -->
    <section id="anuncios-luminosos" class="bg-white p-4 p-md-5 rounded-4 shadow mb-5">
    <h3 class="h2 fw-bold text-dark text-center mb-3">Anuncios Luminosos</h3>

    <p class="text-secondary text-center mx-auto mb-4" style="max-width: 42rem;">
        ¡Que tu negocio brille! Los anuncios o letreros luminosos cuentan con tecnología de iluminación LED y se personalizan de acuerdo a las necesidades de tu marca.
    </p>

    <!-- Galería -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Anuncio+Luminoso+Bandera"
                alt="Anuncio luminoso tipo bandera"
                class="w-100 rounded-top"
                style="height: 12rem; object-fit: cover;">
            <div class="p-3">
            <p class="fw-medium small mb-0">Anuncio luminoso tipo bandera</p>
            </div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Caja+de+Luz+1+Vista"
                alt="Caja de luz 1 vista"
                class="w-100 rounded-top"
                style="height: 12rem; object-fit: cover;">
            <div class="p-3">
            <p class="fw-medium small mb-0">Caja de luz 1 vista</p>
            </div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Anuncio+Contorno+Logo"
                alt="Anuncio a contorno del logo"
                class="w-100 rounded-top"
                style="height: 12rem; object-fit: cover;">
            <div class="p-3">
            <p class="fw-medium small mb-0">Anuncio a contorno del logo</p>
            </div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Anuncio+Bandera+Contorno"
                alt="Anuncio luminoso tipo bandera a contorno"
                class="w-100 rounded-top"
                style="height: 12rem; object-fit: cover;">
            <div class="p-3">
            <p class="fw-medium small mb-0">Anuncio luminoso tipo bandera a contorno</p>
            </div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Anuncio+Bandera+Rectangular"
                alt="Anuncio luminoso tipo bandera rectangular"
                class="w-100 rounded-top"
                style="height: 12rem; object-fit: cover;">
            <div class="p-3">
            <p class="fw-medium small mb-0">Anuncio luminoso tipo bandera rectangular</p>
            </div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Caja+Lona+Tensada"
                alt="Caja rectangular de lona tensada"
                class="w-100 rounded-top"
                style="height: 12rem; object-fit: cover;">
            <div class="p-3">
            <p class="fw-medium small mb-0">Caja rectangular de lona tensada</p>
            </div>
        </div>
        </div>
    </div>

    <h5 class="h5 fw-semibold text-dark mb-2">Características de los anuncios luminosos:</h5>
    <ul class="text-secondary ps-3 mb-0">
        <li class="mb-1">Duración: Más de 10 años de garantía.</li>
        <li class="mb-1">Iluminación: A base de módulos LED, más de 30 mil horas de vida.</li>
        <li class="mb-1">Fabricados con materiales de primera calidad: Acrílico, aluminio, lámina galvanizada, etc.</li>
        <li class="mb-1">1 y 2 vistas.</li>
        <li class="mb-1">Fácil mantenimiento.</li>
        <li class="mb-1">Fabricación en grandes dimensiones.</li>
    </ul>
    </section>

    <!-- Sección: Letreros en Neón Flex (Bootstrap 5) -->
    <section id="neon-flex" class="bg-white p-4 p-md-5 rounded-4 shadow mb-5">
    <h3 class="h2 fw-bold text-dark text-center mb-3">Letreros en Neón Flex</h3>

    <p class="text-secondary text-center mx-auto mb-4" style="max-width: 42rem;">
        "El estilo clásico y llamativo". El Neón Flex es una tecnología patentada que crea una mejor iluminación y más opciones de colores que el neón tradicional, ideal para darle un toque clásico y brillante a tu espacio.
    </p>

    <!-- Galería -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Ne%C3%B3n+Flex+3+Tonos"
                alt="Neón 3 tonos"
                class="w-100 rounded-top"
                style="height:12rem; object-fit:cover;">
            <div class="p-3">
            <p class="fw-medium small mb-0">Neón 3 tonos</p>
            </div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Ne%C3%B3n+Flex+Rosa"
                alt="Neón Rosa"
                class="w-100 rounded-top"
                style="height:12rem; object-fit:cover;">
            <div class="p-3">
            <p class="fw-medium small mb-0">Neón Rosa</p>
            </div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Ne%C3%B3n+Flex+Colores"
                alt="Neón Flex colores"
                class="w-100 rounded-top"
                style="height:12rem; object-fit:cover;">
            <div class="p-3">
            <p class="fw-medium small mb-0">Neón Flex colores</p>
            </div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Ne%C3%B3n+Flex+Blanco"
                alt="Neón blanco"
                class="w-100 rounded-top"
                style="height:12rem; object-fit:cover;">
            <div class="p-3">
            <p class="fw-medium small mb-0">Neón blanco</p>
            </div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Ne%C3%B3n+Flex+Amarillo"
                alt="Neón Flex amarillo"
                class="w-100 rounded-top"
                style="height:12rem; object-fit:cover;">
            <div class="p-3">
            <p class="fw-medium small mb-0">Neón Flex amarillo</p>
            </div>
        </div>
        </div>
    </div>

    <h5 class="h5 fw-semibold text-dark mb-2">Características del Neón Flex:</h5>
    <ul class="text-secondary ps-3 mb-0">
        <li class="mb-1">Duración: Más de 3 años de vida.</li>
        <li class="mb-1">Excelentes para interior y exterior.</li>
        <li class="mb-1">Versatilidad en colores (más de 10 tonos).</li>
        <li class="mb-1">Ocupa muy poca energía y son fáciles de conectar.</li>
        <li class="mb-1">Son ligeros, resistentes y manipulables.</li>
        <li class="mb-1">Opciones de animación (destellos, desvanecimientos o cambios de color).</li>
        <li class="mb-1">Brillo intenso.</li>
    </ul>
    </section>

    <!-- Sección: Impresión Digital a Gran Formato (Bootstrap 5) -->
    <section id="impresion-digital" class="bg-white p-4 p-md-5 rounded-4 shadow mb-5">
    <h3 class="h2 fw-bold text-dark text-center mb-3">Impresión Digital a Gran Formato</h3>

    <p class="text-secondary text-center mx-auto mb-5" style="max-width: 42rem;">
        Diferentes posibilidades para diferentes proyectos. Impresión de alta resolución para transmitir imágenes y mensajes en grandes superficies.
    </p>

    <!-- Sub-sección: Lona -->
    <div class="mb-5">
        <h4 class="h3 fw-semibold text-dark mb-3 border-bottom border-2 border-purple-300 pb-2">
        Lona
        </h4>

        <p class="text-secondary mb-3">
        Material muy resistente al exterior, con la ventaja de su costo y la capacidad de imprimirse en grandes dimensiones con diferentes aplicaciones.
        </p>

        <div class="row g-3 mb-3">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="image-card h-100">
            <img src="https://placehold.co/400x300/A78BFA/FFFFFF?text=Lona+Backlight"
                alt="Lona back light"
                class="w-100"
                style="height:8rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Lona back light</p></div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="image-card h-100">
            <img src="https://placehold.co/400x300/D8B4FE/FFFFFF?text=Lona+Front+18+Onzas"
                alt="Lona front 18 onzas"
                class="w-100"
                style="height:8rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Lona front 18 onzas</p></div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="image-card h-100">
            <img src="https://placehold.co/400x300/C4B5FD/FFFFFF?text=Lona+Mesh"
                alt="Lona mesh"
                class="w-100"
                style="height:8rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Lona mesh</p></div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="image-card h-100">
            <img src="https://placehold.co/400x300/A78BFA/FFFFFF?text=Lona+Para+Banner"
                alt="Lona para banner 13 onzas"
                class="w-100"
                style="height:8rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Lona para banner 13 onzas</p></div>
            </div>
        </div>
        </div>

        <h5 class="h5 fw-semibold text-dark mb-2">Tipos de Lona y sus características:</h5>
        <ul class="text-secondary ps-3">
        <li class="mb-1"><strong>Lona Front 13 y 18 onzas:</strong> Blancas y con acabado brillante, económicas, resistentes y de gran calidad.</li>
        <li class="mb-1"><strong>Lona Mesh:</strong> Altamente resistente, permite el paso del viento, ideal para escenografías o espectaculares en zonas de mucho viento o al exterior.</li>
        <li class="mb-1"><strong>Lona Black light 18 onzas:</strong> Permite el paso de la iluminación artificial, ideal para cajas de luz de gran tamaño.</li>
        </ul>
    </div>

    <!-- Sub-sección: Vinil -->
    <div class="mb-5">
        <h4 class="h3 fw-semibold text-dark mb-3 border-bottom border-2 border-purple-300 pb-2">
        Vinil
        </h4>

        <p class="text-secondary mb-3">
        Material flexible y adherible, muy versátil para aplicar en diferentes superficies como muros, cristales, pisos, promocionales, textiles, autos, metales, etc. Fácil mantenimiento, ideal para interiores y exteriores.
        </p>

        <div class="row g-3 mb-3">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="image-card h-100">
            <img src="https://placehold.co/400x300/6EE7B7/FFFFFF?text=Vinil+Tablaroca"
                alt="Vinil aplicado en Tablaroca"
                class="w-100"
                style="height:8rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Vinil aplicado en Tablaroca</p></div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="image-card h-100">
            <img src="https://placehold.co/400x300/34D399/FFFFFF?text=Vinil+Auto"
                alt="Vinil aplicado auto"
                class="w-100"
                style="height:8rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Vinil aplicado auto</p></div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="image-card h-100">
            <img src="https://placehold.co/400x300/10B981/FFFFFF?text=Vinil+Cristal"
                alt="Vinil aplicado sobre cristal"
                class="w-100"
                style="height:8rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Vinil aplicado sobre cristal</p></div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="image-card h-100">
            <img src="https://placehold.co/400x300/6EE7B7/FFFFFF?text=Vinil+Textil"
                alt="Vinil textil"
                class="w-100"
                style="height:8rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Vinil textil</p></div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="image-card h-100">
            <img src="https://placehold.co/400x300/34D399/FFFFFF?text=Vinil+Microperforado"
                alt="Vinil microperforado"
                class="w-100"
                style="height:8rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Vinil microperforado</p></div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="image-card h-100">
            <img src="https://placehold.co/400x300/10B981/FFFFFF?text=Vinil+Transparente"
                alt="Vinil transparente con impresión"
                class="w-100"
                style="height:8rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Vinil transparente con impresión</p></div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="image-card h-100">
            <img src="https://placehold.co/400x300/6EE7B7/FFFFFF?text=Vinil+Esmerilado+Impreso"
                alt="Vinil esmerilado impreso"
                class="w-100"
                style="height:8rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Vinil esmerilado impreso</p></div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="image-card h-100">
            <img src="https://placehold.co/400x300/34D399/FFFFFF?text=Vinil+Electroest%C3%A1tico"
                alt="Vinil electroestático"
                class="w-100"
                style="height:8rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Vinil electroestático</p></div>
            </div>
        </div>
        </div>

        <h5 class="h5 fw-semibold text-dark mb-2">Tipos de Vinil y sus características:</h5>
        <ul class="text-secondary ps-3">
        <li class="mb-1"><strong>Vinil Adherible:</strong> El más común, aplicable en diversas superficies, con diferentes tipos de durabilidad, adhesión y acabados mate o brillante.</li>
        <li class="mb-1"><strong>Vinil Microperforado:</strong> Con agujeros uniformes que permiten el paso de la luz, ideal para rotulación y decoración de ventanas y cristales.</li>
        <li class="mb-1"><strong>Vinil Transparente:</strong> Permite el paso de luz y no tapa completamente la visión, ideal para cristales o acrílicos.</li>
        <li class="mb-1"><strong>Vinil Electroestático:</strong> No contiene adhesivos, se sostiene por carga electroestática, comúnmente usado en cristales por poco tiempo.</li>
        </ul>
    </div>

    <!-- Sub-sección: Papel -->
    <div class="mb-5">
        <h4 class="h3 fw-semibold text-dark mb-3 border-bottom border-2 border-purple-300 pb-2">
        Papel
        </h4>

        <p class="text-secondary mb-3">
        La impresión en Papel cuenta con diferentes aplicaciones dependiendo el proyecto, su gran ventaja son las dimensiones que pueden imprimirse. Contamos con papel bond y papel tapiz.
        </p>

        <div class="row g-3 mb-3">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="image-card h-100">
            <img src="https://placehold.co/400x300/A78BFA/FFFFFF?text=Papel+Tapiz"
                alt="Papel tapiz"
                class="w-100"
                style="height:8rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Papel tapiz</p></div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="image-card h-100">
            <img src="https://placehold.co/400x300/D8B4FE/FFFFFF?text=Papel+Bond"
                alt="Papel bond"
                class="w-100"
                style="height:8rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Papel bond</p></div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="image-card h-100">
            <img src="https://placehold.co/400x300/C4B5FD/FFFFFF?text=Tr%C3%ADpticos"
                alt="Trípticos"
                class="w-100"
                style="height:8rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Trípticos / Papelería Corporativa</p></div>
            </div>
        </div>
        </div>

        <p class="text-secondary mb-0">
        Adicional a esto, en Imaginarte 3D también podemos apoyarte en la papelería corporativa: Trípticos, folletos, tarjetas de presentación, menús, etc.
        </p>
    </div>

    <!-- Sub-sección: Más Aplicaciones -->
    <div>
        <h4 class="h3 fw-semibold text-dark mb-3 border-bottom border-2 border-purple-300 pb-2">
        Más Aplicaciones
        </h4>

        <p class="text-secondary mb-3">
        Checa más posibilidades de impresión digital a gran formato, incluyendo rígidos, canvas y estireno.
        </p>

        <div class="row g-3">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="image-card h-100">
            <img src="https://placehold.co/400x300/6EE7B7/FFFFFF?text=Impresi%C3%B3n+en+R%C3%ADgidos"
                alt="Impresión en rígidos"
                class="w-100"
                style="height:8rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Impresión en rígidos</p></div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="image-card h-100">
            <img src="https://placehold.co/400x300/34D399/FFFFFF?text=Cuadro+en+Tela+Canvas"
                alt="Cuadro en tela Canvas"
                class="w-100"
                style="height:8rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Cuadro en tela Canvas</p></div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="image-card h-100">
            <img src="https://placehold.co/400x300/10B981/FFFFFF?text=Estireno+Impreso"
                alt="Estireno impreso"
                class="w-100"
                style="height:8rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Estireno impreso</p></div>
            </div>
        </div>
        </div>
    </div>
    </section>

    <!-- Sección: Señalética Creativa (Bootstrap 5) -->
    <section id="senaletica" class="bg-white p-4 p-md-5 rounded-4 shadow mb-5">
    <h3 class="h2 fw-bold text-dark text-center mb-3">Señalética Creativa</h3>

    <p class="text-secondary text-center mx-auto mb-4" style="max-width: 42rem;">
        La mejor estrategia de comunicación visual. Fundamental para actuar como guía dentro de cualquier lugar, brindando información clara y sencilla con un diseño bien pensado.
    </p>

    <!-- Galería -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Se%C3%B1alamientos+Vinil"
                alt="Señalamientos en Recorte de Vinil"
                class="w-100 rounded-top"
                style="height:12rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Señalamientos en Recorte de Vinil</p></div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Se%C3%B1alamientos+Madera"
                alt="Señalamientos en madera"
                class="w-100 rounded-top"
                style="height:12rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Señalamientos en madera</p></div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Se%C3%B1alamientos+Acr%C3%ADlico"
                alt="Señalamientos en acrílico"
                class="w-100 rounded-top"
                style="height:12rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Señalamientos en acrílico</p></div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Se%C3%B1alamientos+PVC+Vinil"
                alt="Señalamientos en PVC y vinil impreso"
                class="w-100 rounded-top"
                style="height:12rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Señalamientos en PVC y vinil impreso</p></div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Se%C3%B1alamientos+Protecci%C3%B3n+Civil"
                alt="Señalamientos creativos de protección civil"
                class="w-100 rounded-top"
                style="height:12rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Señalamientos creativos de protección civil</p></div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Se%C3%B1alamientos+Aluminio"
                alt="Señalamientos en aluminio y recorte de vinil"
                class="w-100 rounded-top"
                style="height:12rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Señalamientos en aluminio y recorte de vinil</p></div>
        </div>
        </div>
    </div>

    <h5 class="h5 fw-semibold text-dark mb-2">La señalización creativa incluye:</h5>
    <ul class="text-secondary ps-3 mb-0">
        <li class="mb-1">Protección Civil, ubicación de zonas, informativas, directorios y todo lo que requiera ser señalado.</li>
        <li class="mb-1"><strong>Materiales:</strong> Aluminio, acrílico, PVC, madera, estireno, vinilos, grabado o calado, serigrafía, impresión directa, etc.</li>
        <li class="mb-1">Transmite una imagen mucho más cuidada e innovadora.</li>
        <li class="mb-1">Infinidad de opciones, para infinidad de ideas.</li>
    </ul>
    </section>

    <!-- Sección: Promocionales (Bootstrap 5) -->
    <section id="promocionales" class="bg-white p-4 p-md-5 rounded-4 shadow mb-5">
    <h3 class="h2 fw-bold text-dark text-center mb-3">Promocionales</h3>

    <p class="text-secondary text-center mx-auto mb-4" style="max-width: 42rem;">
        Posiciona tu marca en cualquier sitio. Más de 2,500 artículos promocionales para elegir, ideales para campañas publicitarias, regalos corporativos o de gran valor.
    </p>

    <!-- Galería -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Playeras+DTF"
                alt="Playeras DTF serigráfico"
                class="w-100 rounded-top"
                style="height:12rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Playeras DTF serigráfico</p></div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Plumas+Serigraf%C3%ADa"
                alt="Plumas en serigrafía"
                class="w-100 rounded-top"
                style="height:12rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Plumas en serigrafía</p></div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Taza+Grabada"
                alt="Taza grabada"
                class="w-100 rounded-top"
                style="height:12rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Taza grabada</p></div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Bolsas+Sublimaci%C3%B3n"
                alt="Bolsas con sublimación"
                class="w-100 rounded-top"
                style="height:12rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Bolsas con sublimación</p></div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Libretas+Serigraf%C3%ADa"
                alt="Libretas en serigrafía"
                class="w-100 rounded-top"
                style="height:12rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Libretas en serigrafía</p></div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Gorras+DTF"
                alt="Gorras DTF serigráfico"
                class="w-100 rounded-top"
                style="height:12rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Gorras DTF serigráfico</p></div>
        </div>
        </div>
    </div>

    <h5 class="h5 fw-semibold text-dark mb-2">Técnicas de impresión para promocionales:</h5>
    <ul class="text-secondary ps-3 mb-0">
        <li class="mb-1">Serigrafía, sublimación, DTF serigráfico, tampografía, vinil textil, grabado láser, etc.</li>
        <li class="mb-1">Son productos de bajo costo y alto impacto, ideales para incluir la dirección, logo o teléfono.</li>
        <li class="mb-1">Perfectos para promocionarte en eventos como ferias, bazares, convenciones, foros, etcétera.</li>
    </ul>
    </section>

    <!-- Sección: Vinilo Decorativo (Bootstrap 5) -->
    <section id="vinilo-decorativo" class="bg-white p-4 p-md-5 rounded-4 shadow mb-5">
    <h3 class="h2 fw-bold text-dark text-center mb-3">Vinilo Decorativo</h3>

    <p class="text-secondary text-center mx-auto mb-4" style="max-width: 42rem;">
        ¡Personaliza tus espacios! El vinilo para decoración es un material adhesivo duradero, resistente, accesible y versátil, un elemento estrella en los diseños de interiorismo.
    </p>

    <!-- Galería -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Vinilo+Colores"
                alt="Vinilo decorativo colores"
                class="w-100 rounded-top"
                style="height:12rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Vinilo decorativo colores</p></div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Vinilo+1+Color"
                alt="Vinilo decorativo 1 color"
                class="w-100 rounded-top"
                style="height:12rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Vinilo decorativo 1 color</p></div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Vinilo+2+Colores"
                alt="Vinilo decorativo 2 colores"
                class="w-100 rounded-top"
                style="height:12rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Vinilo decorativo 2 colores</p></div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/10B981/FFFFFF?text=Vinilo+Esmerilado+Calado"
                alt="Vinilo esmerilado calado"
                class="w-100 rounded-top"
                style="height:12rem; object-fit:cover;">
            <div class="p-3"><p class="fw-medium small mb-0">Vinilo esmerilado calado</p></div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
        <div class="image-card h-100">
            <img src="https://placehold.co/600x400/8B5CF6/FFFFFF?text=Vinilo+Esmerilado+Recorte"
                alt="Vinilo esmerilado y vinilo de recorte a color"
                class="w-100 rounded-top"
                style="height:12rem; object-fit:cover;">
            <div class="p-3">
            <p class="fw-medium small mb-0">Vinilo esmerilado y vinilo de recorte a color</p>
            </div>
        </div>
        </div>
    </div>

    <h5 class="h5 fw-semibold text-dark mb-2">Características de los vinilos decorativos:</h5>
    <ul class="text-secondary ps-3 mb-0">
        <li class="mb-1">Duración: Más de 10 años al interior.</li>
        <li class="mb-1">Diseños personalizados.</li>
        <li class="mb-1">Fácil mantenimiento.</li>
        <li class="mb-1">Adherencia en muros de Tablaroca, concreto, Durock, cristales, plásticos, madera, etc.</li>
        <li class="mb-1">Vinilos recortados o calados.</li>
        <li class="mb-1">Vinilos esmerilados, neón y una amplia gama de tonalidades brillantes o mate.</li>
        <li class="mb-1">Pueden fabricarse en dimensiones grandes o muy pequeñas.</li>
        <li class="mb-1">Resistente a la humedad y al exterior.</li>
    </ul>
    </section>


</section>


<section class="row container-lg mx-auto mt-5 mb-3">

    <div class="col-12 col-md-6 col-lg-6">
        <div class="d-flex justify-content-center">
            <div class="container_btns">
                <p class="text-star mb-5">
                    <a href="https://wa.link/cprewb" class="cotizar">Cotizar</a> <br>
                </p>
                <p class="text-star mb-5">
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="consejos">Consejos</a> <br>
                </p>
                <p class="text-star mb-5">
                    <a target="_blank" href="https://wa.link/cprewb" class="whatascontacto ">Contáctanos Por WhatsApp </a> <br>
                </p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-6 my-auto">
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

<section class="row container-lg-fluid separador_sections" id="nosotros">
    <div class="d-flex justify-content-center">
        <h4 class="h4_separador text-center">IMAGINA - COTIZA - CREA <br>TE ACOMPAÑAMOS DE PRINCIPIO A FIN </h4>
    </div>
</section>

<section class="row container-lg mx-auto mt-5 mb-3" >

    <div class="col-12 col-md-6 col-lg-6 my-auto">
        <div class="d-flex justify-content-center">
            <div id="carouselExampleMision" class="carousel slide">
                <div class="carousel-inner">

                <div class="carousel-item active">
                    <p class="text-center">
                        <img src="{{ asset('pagina/banner/1.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                    </p>
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/2.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/3.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/4.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/5.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/6.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/7.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/8.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/9.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/10.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/11.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/12.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/13.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/14.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/15.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/16.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/17.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/18.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/19.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/20.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/21.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/22.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/23.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/24.PNG')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/25.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/26.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/27.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('pagina/banner/28.jpg')}}" class="d-block img_crousel_principal mx-auto"  alt="...">
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

    <div class="col-12 col-md-6 col-lg-6 my-auto">
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

<section class="row container-lg-fluid  mt-5 mb-3" style="background: #7f5adc">

    <div class="row container mx-auto  mt-5 mb-3">
        <div class="col-12 col-md-6 col-lg-6 my-auto">
            <div class="d-flex justify-content-center">
                <div class="container mb-0 mb-md-5 mb-lg-5 mt-0 mt-md-5 mt-lg-5">
                    <h4 class="text_logo text-center">Imaginarte 3D</h4>
                    <h5 class="text_opriniones text-center">
                        Lo que nuestros clientes tienen que decir
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-6 mx-auto">
            <div id="carouselResenas" class="carousel slide" >
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('pagina/r1.png')}}" class="d-block img_resenas" alt="...">
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('pagina/r2.png')}}" class="d-block img_resenas" alt="...">
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('pagina/r3.png')}}" class="d-block img_resenas" alt="...">
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('pagina/r4.png')}}" class="d-block img_resenas" alt="...">
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselResenas" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselResenas" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

            </div>
        </div>
    </div>

</section>

@include('pagina.componentes.clientes')

@include('pagina.componentes.call_to_action')

@include('pagina.componentes.contacto')

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
