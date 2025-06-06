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

<section class="row container-lg mx-auto mt-5 mb-3">

    <div class="col-12">
        <h2 class="h2_subtitle">PRODUCTOS</h2>
        <p class="text_parraf mb-5">
            Tener un anuncio publicitario te ayudara a que las personas puedan obtener conocimiento sobre un producto, una marca, una empresa, etc. Estos son y deben ser parte de las compañías, debido a que los anuncios están vinculados con un propósito convincente sobre lo que estas ofrecen al público y están encauzados a la promoción de sus artículos, sus productos y sus servicios. <br>
            <br> Conoce nuestros productos nosotros te ayudamos a que tu publico te recuerde.
        </p>

        <div class="row">
            @foreach ([
                ['src'=>'pagina/1.jpg','label'=>'Letreros 3D','href'=>'letras-3d-corporeas'],
                ['src'=>'pagina/4-1.jpg','label'=>'Impresión Digital','href'=>'impresion-digital'],
                ['src'=>'pagina/6.jpg','label'=>'Neón','href'=>'neon'],
                ['src'=>'pagina/2.jpg','label'=>'Anuncios Luminosos','href'=>'anuncios-luminosos'],
                ['src'=>'pagina/9-1024x649.jpeg','label'=>'Promocionales','href'=>'promocionales'],
                ['src'=>'pagina/3.jpg','label'=>'Recorte de Vinil','href'=>'Letreros_3D'],
                ['src'=>'pagina/5.jpg','label'=>'Señaletica','href'=>'senaletica'],
                ['src'=>'pagina/9.jpg','label'=>'Otros Productos','href'=>'#'],
            ] as $img)
                <div class="col-6 col-md-3 col-lg-3 my-auto">
                <div class="container_card_product">
                    <p class="text-center mb-0">
                        <a href="{{ $img['href'] }}" data-title="{{ $img['label'] }}">
                            {{-- <a href="{{ asset($img['src']) }}" class="glightbox" data-gallery="productos" data-title="{{ $img['label'] }}"> --}}
                            <img class="img_products" src="{{ asset($img['src']) }}" alt="{{ $img['label'] }}">
                        </a>
                    </p>
                    <a href="{{ $img['href'] }}" data-title="{{ $img['label'] }}">
                        <p class="text-center text_products">{{ $img['label'] }}</p>
                    </a>
                </div>
                </div>
            @endforeach
        </div>

    </div>

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
