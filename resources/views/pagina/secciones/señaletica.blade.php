@extends('layouts.app_pagina')

@section('template_title')
    Señalética creativa
@endsection

@section('content')

<section class="row container mx-auto">

    <div class="col-12 col-md-12 col-lg-12 my-auto">
        <h1 class="text-center">Señalética creativa</h1>

        <h3 class="h2_subtitle text-center mt-3">La mejor estrategia de comunicación visual</h3>
        <p class="text-center subtitulos mb-4">
            La señalética creativa o corporativa es fundamental para actuar como guía dentro de cualquier
            <br>lugar, necesita brindar información de forma clara y sencilla.
            <br>Los señalamientos creativos se refieren a un diseño bien pensado de acuerdo con el sitio,
            <br>contexto y negocio, en base a esto, existen diversos materiales y formas en los que se pueden
            <br>fabricar.
        </p>

        <div class="row">
            <div class="col-12">
                <p class="text-center mt-4">
                    <a href="https://wa.link/cprewb" class="btn_accion text-center mt-3 mx-auto">Contáctanos Por WhatsApp <i class="bi bi-whatsapp"></i></a>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="row container mx-auto">
    <div class="col-12">
        <h1 class="text-center">Transmite una imagen mucho más cuidada e innovadora</h1>
        <h2 class="h2_subtitle text-center mb-5">
            Infinidad de opciones, para infinidad de ideas
        </h2>

        <div class="row">
            @foreach ([
                ['src'=>'pagina/senaletica/1.jpg','label'=>'Señalamientos en Recorte de Vinil'],
                ['src'=>'pagina/senaletica/2.jpg','label'=>'Señalamientos en madera'],
                ['src'=>'pagina/senaletica/3.jpg','label'=>'Señalamientos en acrílico'],
                ['src'=>'pagina/senaletica/4.jpg','label'=>'Señalamientos creativos de protección civil'],
                ['src'=>'pagina/senaletica/5.jpg','label'=>'Señalamientos en PVC y vinil impreso'],
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

<section class="row container mx-auto">

    <div class="col-12">

        <h3 class="subtite_negro text-center mt-5">Sus características</h3>

        <div class="row">

            <div class="col-6 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/icons/salida-2.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Señalización creativa</h5>
                        <p class="text-start subtexto_prinicpal_card">Incluye; Protección Civil, ubicación de zonas, informativas, directorios y todo lo que requiera ser
señalado</p>
                    </div>
                </div>
            </div>

            <div class="col-6 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/icons/construccion.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Materiales de fabricacion</h5>
                        <p class="text-start subtexto_prinicpal_card">Dependerán del diseño y sí son para interior o exterior, entre ellos se encuentran, Aluminio, acrílico, PVC, madera, estireno, vinilos, grabado o calado, serigrafía, impresión directa, etc.</p>
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
