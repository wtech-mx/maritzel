@extends('layouts.app_pagina')

@section('template_title')
    Neon
@endsection

@section('content')

<section class="row container mx-auto">

    <div class="col-12 col-md-12 col-lg-12 my-auto">
        <h1 class="text-center">Letreros en Neón Flex</h1>

        <h3 class="h2_subtitle text-center mt-3">El estilo clásico y llamativ</h3>
        <p class="text-center subtitulos mb-4">
            El Neón Flex es una tecnología patentada que crea una mejor iluminación y más opciones de colores que el
            neón tradicional, es ideal para darle un toque clásico y brillante a tu espacio. <br><br>

            El neón Flex es una manguera de PVC flexible que permite crear letreros, formas y contornos, además de que
            pueden ofrecen animación con su gran variedad de colores y combinaciones.
        </p>

        <div class="row">
            <div class="col-12">
                <p class="text-center mt-4">
                    <a href="" class="btn_accion text-center mt-3 mx-auto">Contáctanos Por WhatsApp</a>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="row container mx-auto">
    <div class="col-12">
        <h2 class="h2_subtitle text-center mb-5">
            Son excepcionalmente brillantes aún a la luz del día y muy llamativos.
        </h2>

        <div class="row">
            @foreach ([
                ['src'=>'pagina/neon/Letreros-en-Neon-Flex-3-e1707551421452.jpg','label'=>'Neón 3 tonos'],
                ['src'=>'pagina/neon/Letreros-en-Neon-Flex-2.jpg','label'=>'Neón Rosa'],
                ['src'=>'pagina/neon/Letreros-en-Neon-Flex-1.jpg','label'=>'Neón Flex colores'],
                ['src'=>'pagina/neon/Letreros-en-Neon-Flex-7.jpg','label'=>'Neón Flex'],
                ['src'=>'pagina/neon/Letreros-en-Neon-Flex-5.jpg','label'=>'Señalamientos en PVC y vinil impreso'],
                ['src'=>'pagina/neon/Letreros-en-Neon-Flex-6.jpg','label'=>'Neón Flex amarillo'],

            ] as $img)
                <div class="col-3">
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
                        <img class="img_icon_card" src="{{ asset('pagina/icons/letrero.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Duración</h5>
                        <p class="text-start subtexto_prinicpal_card">Más de 3 años de vida</p>
                    </div>
                </div>
            </div>

            <div class="col-6 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/weather-forecast.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Lugar</h5>
                        <p class="text-start subtexto_prinicpal_card">Excelentes para interior y exterior</p>
                    </div>
                </div>
            </div>
           
            <div class="col-6 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/paleta-de-color.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Colores</h5>
                        <p class="text-start subtexto_prinicpal_card">Versatilidad en colores (más de 10 tonos)</p>
                    </div>
                </div>
            </div>

            <div class="col-6 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/icons/certificado-de-garantia.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Ahorrativos</h5>
                        <p class="text-start subtexto_prinicpal_card">Ahorrativos</p>
                    </div>
                </div>
            </div>

            <div class="col-6 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/icons/construccion.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Versátiles</h5>
                        <p class="text-start subtexto_prinicpal_card"> Son ligeros, resistentes y manipulables</p>
                    </div>
                </div>
            </div>

            <div class="col-6 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/icons/foco.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Iluminación</h5>
                        <p class="text-start subtexto_prinicpal_card"> Brillo intenso</p>
                    </div>
                </div>
            </div>

            <div class="col-12 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/degradado.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Personalización Total</h5>
                        <p class="text-start subtexto_prinicpal_card">Personalización Total</p>
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
