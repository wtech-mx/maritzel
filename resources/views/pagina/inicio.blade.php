@extends('layouts.app_pagina')

@section('template_title')
    Inicio
@endsection

@section('content')

<style>
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
        font-size: 13px;
        font-weight: 200;
        line-height: 1.4em;
        color: #000000;
    }

    .img_crousel_principal{
        border-radius: 10px 10px 10px 10px;
        width: 100%;
    }
</style>

<section class="row container-fluid">

    <div class="col-12 col-md-8 col-lg-6">
        <h1 class="text-center titulo_principal">
            ¡Encuentra todo lo que necesitas para que tu negocio brille!
        </h1>
        <p class="text-center subtitulos">
            Publicidad que destaca. Fabricamos, instalamos y potencializamos tu marca.
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

        </div>
    </div>

    <div class="col-12 col-md-8 col-lg-6">
        <div id="popularProductsCarousel" class="owl-carousel owl-theme">
            <img class="img_crousel_principal" src="{{ asset('pagina/b1.png')}}" alt="">
        </div>
    </div>

</section>

@endsection

