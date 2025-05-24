@extends('layouts.app_pagina')

@section('template_title')
    Inicio
@endsection

@section('content')

<style>

*{
    margin: 0;
    padding: 0;
}

    body{
        margin: 0;
        padding: 0;
    }
    .container_card_inicio{
        --display: flex;
        --min-height: 70px;
        --flex-direction: row;
        --container-widget-width: calc((1 - var(--container-widget-flex-grow))* 100%);
        --container-widget-height: 100%;
        --container-widget-flex-grow: 1;
        --container-widget-align-self: stretch;
        --flex-wrap-mobile: wrap;
        --justify-content: center;
        --align-items: center;
        --gap: 0px 0px;
        --row-gap: 0px;
        --column-gap: 0px;
        border-radius: 12px 12px 12px 12px;
        box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.1);
    }

    .img_container_card_inicio{
        width: 60px;
        padding: 10px;
    }

    .sibtittle_card_inicio{
        font-family: "Roboto", Sans-serif;
        font-size: 16px;
        font-weight: 600;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        color: var(--e-global-color-46546eb);
        text-decoration: none;
        padding: 10px;
        text-align: start;
    }

    .titulo_principal{
        font-family: "Varela Round", Sans-serif;
        font-size: 30px;
        font-weight: 600;
        line-height: 1.2em;
        color: #7f5adc;
    }

    .subtitulos{
        column-gap: 1px;
        text-align: center;
        font-family: "Montserrat", Sans-serif;
        font-size: 18px;
        font-weight: 200;
        line-height: 1.4em;
        color: #000000;
    }

    .img_crousel_principal{
        border-radius: 10px 10px 10px 10px;
        width: 70%;
    }

    .btn_accion{
        background-color: #683cc0;
        font-family: "Montserrat", Sans-serif;
        font-size: 15px;
        font-weight: 500;
        text-transform: capitalize;
        fill: #00ffa0;
        color: #00ffa0;
        box-shadow: 5px 0px 30px 0px rgba(0, 255, 232.0000000000002, 0.5);
        border-style: solid;
        border-color: #00ffa0;
        border-radius: 30px 30px 30px 30px;
        padding: 15px 50px 15px 50px;
        text-decoration: none;
    }

    .coantiner_card_services{
        border-radius: 12px 12px 12px 12px;
        box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.1);
        padding-top: 65px;
        padding-bottom: 65px;
        padding-left: 30px;
        padding-right: 30px;
    }

    .coantiner_card_services2{
        border-radius: 12px 12px 12px 12px;
        box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.1);
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 30px;
        padding-right: 30px;
    }

    .h3_subtitle{
        font-family: "Roboto", Sans-serif;
        font-size: 17px;
        font-weight: 600;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        color: #683cc0;
    }

    .img_coantiner_card_services{
        width: 60% !important;
        display: inline!important;
    }

    .texto_services{
           font-family: "Roboto", Sans-serif;
        font-size: 13px;
        font-weight: 600;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        color: #000000;
    }

    .h2_subtitle{
        font-family: "Roboto", Sans-serif;
        font-weight: 600;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        color: #683cc0;
    }

    .text_parraf{
        font-family: "Roboto", Sans-serif;
        font-weight: 400;
        text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
        color: #000000;
    }

    .container_card_product{

    }

    .img_products{
        max-width: 100%;
        border-radius: 15px 15px 0px 0px;
    }

    .text_products{
        background-color: #7f5adc;
        border-radius: 0px 0px 15px 15px;
        font-family: "Roboto", Sans-serif;
        font-size: 18px;
        font-weight: 600;
        color: #fff;
        padding: 10px;
    }

    .cotizar{
        background-color: #FFFFFF;
        font-family: "Montserrat", Sans-serif;
        font-size: 15px;
        font-weight: 500;
        text-transform: capitalize;
        fill: #683cc0;
        color: #683cc0;
        box-shadow: 5px 0px 15px 0px rgba(186.9999999999998, 0, 255, 0.5);
        border-style: solid;
        border-color: #683cc0;
        border-radius: 30px 30px 30px 30px;
        padding: 10px 30px 10px 30px;
        text-decoration: none;
    }

    .whatascontacto{
        background-color: #FFFFFF;
        font-family: "Montserrat", Sans-serif;
        font-size: 15px;
        font-weight: 500;
        text-transform: capitalize;
        fill: #00ffa0;
        color: #00ffa0;
        box-shadow: 5px 0px 15px 0px rgba(0, 255, 145.23913043478262, 0.5);
        border-style: solid;
        border-color: #00ffa0;
        border-radius: 30px 30px 30px 30px;
        padding: 10px 30px 10px 30px;
        text-decoration: none;
    }

    .consejos{
        background-color: #FFFFFF;
        font-family: "Montserrat", Sans-serif;
        font-size: 15px;
        font-weight: 500;
        text-transform: capitalize;
        fill: #000000;
        color: #000000;
        box-shadow: 5px 0px 15px 0px rgba(0, 0, 0, 0.5);
        border-style: solid;
        border-color: #000000;
        border-radius: 30px 30px 30px 30px;
        padding: 10px 30px 10px 30px;
        text-decoration: none;
    }

    .separador_sections{
        background-color: transparent;
        background-image: linear-gradient(70deg, #4F3DB3 0%, #00FEA0 100%);
        opacity: 1;
    }

    .h4_separador{
        font-family: "Roboto", Sans-serif;
        font-weight: 600;
        color: #ffffff;
        font-size: 32px;
        margin-top: 80px;
        margin-bottom: 80px;
    }

    .text_logo{
        font-family: "Montserrat", Sans-serif;
        font-size: 20px;
        font-weight: bold;
        text-transform: capitalize;
        color: #fff;
    }

    .text_opriniones{
        font-family: "Roboto", Sans-serif;
        font-weight: 500;
        color: #00ffa0;
    }

    .h3_clientes{
        font-size: 45px;
        font-weight: 600;
        color: #00ffa0;
        text-align: end;
    }

    .text_clientes{
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        color: #683cc0;
        text-align: end;
    }

    .img_marca{
        width: 65% !important;
    }

    .img_logo_footer{
        width: 170px;
        height: 45px;
    }

    .tittle_footer{
        font-size: 25px;
        font-weight: 600;
        color: #00ffa0;
        text-align: start;
    }

    .ul_footer a{
        text-align: left;
        font-family: "Roboto", Sans-serif;
        font-size: 11px;
        font-weight: 500;
        text-transform: uppercase;
        line-height: 9px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        color: #fff;
        text-decoration: none;
    }

    .separdor{
        margin-top: 7rem !important;
    }

</style>

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

            <div class="col-3">
                <div class="container_card_product">
                    <p class="text-center mb-0">
                        <img class="img_products" src="{{ asset('pagina/1.jpg')}}" alt=""> <br>
                    </p>
                    <p class="text-center text_products">
                        Letreros 3D
                    </p>
                </div>
            </div>

            <div class="col-3">
                <div class="container_card_product">
                    <p class="text-center mb-0">
                        <img class="img_products" src="{{ asset('pagina/4-1.jpg')}}" alt=""> <br>
                    </p>
                    <p class="text-center text_products">
                        Impresión Digital
                    </p>
                </div>
            </div>

            <div class="col-3">
                <div class="container_card_product">
                    <p class="text-center mb-0">
                        <img class="img_products" src="{{ asset('pagina/6.jpg')}}" alt=""> <br>
                    </p>
                    <p class="text-center text_products">
                        Neón
                    </p>
                </div>
            </div>

            <div class="col-3">
                <div class="container_card_product">
                    <p class="text-center mb-0">
                        <img class="img_products" src="{{ asset('pagina/2.jpg')}}" alt=""> <br>
                    </p>
                    <p class="text-center text_products">
                       Anuncios Luminosos
                    </p>
                </div>
            </div>

            <div class="col-3">
                <div class="container_card_product">
                    <p class="text-center mb-0">
                        <img class="img_products" src="{{ asset('pagina/9-1024x649.jpeg')}}" alt=""> <br>
                    </p>
                    <p class="text-center text_products">
                        Promocionales
                    </p>
                </div>
            </div>

            <div class="col-3">
                <div class="container_card_product">
                    <p class="text-center mb-0">
                        <img class="img_products" src="{{ asset('pagina/3.jpg')}}" alt=""> <br>
                    </p>
                    <p class="text-center text_products">
                       Recorte de Vinil
                    </p>
                </div>
            </div>

            <div class="col-3">
                <div class="container_card_product">
                    <p class="text-center mb-0">
                        <img class="img_products" src="{{ asset('pagina/5.jpg')}}" alt=""> <br>
                    </p>
                    <p class="text-center text_products">
                        Señaletica
                    </p>
                </div>
            </div>

            <div class="col-3">
                <div class="container_card_product">
                    <p class="text-center mb-0">
                        <img class="img_products" src="{{ asset('pagina/9.jpg')}}" alt=""> <br>
                    </p>
                    <p class="text-center text_products">
                        Otros Productos
                    </p>
                </div>
            </div>

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

<footer class="row container-fluid m-0 p-0">

    <div class="container_head_footer row container-fluid p-4" style="background: #7f5adc">

        <div class="col-2">
        </div>

        <div class="col-8">

            <div class="row">
                <div class="col-4 my-auto mx-auto">
                    <img class="img_logo_footer " src="{{ asset(path: 'pagina/cropped-new-log.png')}}" alt="">
                </div>

                <div class="col-4">
                    <h3 class="tittle_footer" >Informacion</h3>
                    <p class="ul_footer">
                        <br>
                    <a href="" > INICIO</a><br> <br>
                    <a href="" > PRODUCTOS</a><br> <br>
                    <a href="" > PREGUNTAS </a><br> <br>
                    <a href="" > Cotizar</a><br> <br>
                    </p>
                </div>

                <div class="col-4">
                    <h3 class="tittle_footer" >Síguenos en</h3>
                    <p class="ul_footer">

                    </p>
                </div>
            </div>

        </div>

        <div class="col-2">
        </div>

    </div>

    <div class="container_foot_footer row container-fluid" style="background: #683CC0">

        <div class="col-2">
        </div>

        <div class="col-8">
            <div class="row">
                <div class="col-6 my-auto">
                    <p class="m-0 p-3 text-white">POWER BY |W - TECH WEB TECH</p>
                </div>
            </div>
        </div>

        <div class="col-2">
        </div>

    </div>

</footer>

@endsection

