@extends('layouts.app_pagina')

@section('template_title')
    Prompoc
@endsection

@section('content')

<section class="row container-lg mx-auto">

    <div class="col-12 col-md-12 col-lg-12 my-auto">
        <h1 class="text-center">Promocionales</h1>

        <h3 class="h2_subtitle text-center mt-3">Posiciona tu marca en cualquier sitio  </h3>
        <p class="text-center subtitulos mb-4">
        El Neón Flex es una tecnología patentada que crea una mejor iluminación y más opciones de colores que el neón tradicional, es ideal para darle un toque clásico y brillante a tu espacio.
        El neón Flex es una manguera de PVC flexible que permite crear letreros, formas y contornos, además de que pueden ofrecen animación con su gran variedad de colores y combinaciones.
        </p>

        <div class="row">
            <div class="col-12">
                <p class="text-center mt-4">
                    <a href="https://wa.link/cprewb" class="btn_accion text-center mt-3 mx-auto">Contáctanos Por WhatsApp <i class="bi bi-whatsapp"></i></a>
                </p>
            </div>
        </div>

        <h3 class="h2_subtitle text-center mt-3">Encuentra en un solo sitio todo lo que requieras para tus promocionales</h3>

    </div>
</section>

<section class="row container-lg mx-auto">
    <div class="col-12">
        <h2 class="h2_subtitle text-center mb-5">
            Son excepcionalmente brillantes aún a la luz del día y muy llamativos.
        </h2>

        <div class="row">
            @foreach ([
                ['src'=>'pagina/promocionales/promocionales-3.jpg','label'=>'Taza grabada'],
                ['src'=>'pagina/promocionales/3serigrafia.jpg','label'=>'Playeras DTF serigráfico'],
                ['src'=>'pagina/promocionales/promocionales-5.jpg','label'=>'Playeras DTF serigráfico'],
                ['src'=>'pagina/promocionales/10serigrafia.jpg','label'=>'Playeras DTF serigráfico'],
                ['src'=>'pagina/promocionales/promocionales-2.jpg','label'=>'Bolsas con sublimación'],
                ['src'=>'pagina/promocionales/promocioanles-1.jpg','label'=>'Libretas en serigrafía'],

            ] as $img)
                <div class="col-6 col-md-3 col-lg-3 my-auto">
                <div class="container_card_product">
                    <p class="text-center mb-0">
                    <a href="{{ asset($img['src']) }}" class="glightbox" data-gallery="productos" data-title="{{ $img['label'] }}">
                        <img class="img_products" src="{{ asset($img['src']) }}" alt="{{ $img['label'] }}">
                    </a>
                    </p>
                    <p class="text-center text_products2">{{ $img['label'] }}</p>
                </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<section class="row container-lg mx-auto">

    <div class="col-12">

        <h3 class="subtite_negro text-center mt-5">Sus características</h3>

        <div class="row">

            <div class="col-12 col-md-6 col-lg-6 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/icons/megafono.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Dar A Conocer Tu Marca</h5>
                        <p class="text-start subtexto_prinicpal_card">
                            Los artículos promocionales, son una estrategia para dar a conocer tu marca, negocio o empresa, son productos de bajo costo y alto impacto, ideales para incluir la dirección, logo o teléfono.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/icons/pin-de-ubicacion.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Promocionarse en diversos lugares</h5>
                        <p class="text-start subtexto_prinicpal_card">
                            Con Ellos Podrás Promocionarte En Diversos Eventos Como Ferias, Bazares, Convenciones, Foros, Etcétera.
                        </p>
                    </div>
                </div>
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
