@extends('layouts.app_pagina')

@section('template_title')
    Anuncios Luminosos
@endsection

@section('content')

<section class="row container-lg mx-auto">

    <div class="col-12 col-md-12 col-lg-12 my-auto">
        <h1 class="text-center">Anuncios Luminosos</h1>

        <h3 class="h2_subtitle text-center mt-3">¡Que tu negocio brille!</h3>
        <p class="text-center subtitulos mb-4">
           <br> Los anuncios o letreros luminosos cuentan con tecnología de iluminación Led y se personalizan de acuerdo a las necesidades de tu marca, pueden utilizarse de forma <br>geométrica (cuadradas, rectangulares o circulares), figuras o el contorno de tu logo.

            <br><br>Su gran ventaja son las vistas que pueden tener y sus dimensiones en la fabricación.
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

<section class="row container-lg mx-auto">
    <div class="col-12">

        <h2 class="h2_subtitle text-center mb-5">
            ¡Imágenes para inspirarte!
        </h2>

        <div class="row">
            @foreach ([
                ['src'=>'pagina/anuncios_luminosos/1.jpg','label'=>'Anuncio luminoso tipo bandera'],
                ['src'=>'pagina/anuncios_luminosos/2.jpg','label'=>'Caja de luz 1 vista'],
                ['src'=>'pagina/anuncios_luminosos/3.jpg','label'=>'Anuncio a contorno del logo'],
                ['src'=>'pagina/anuncios_luminosos/4.jpg','label'=>'Anuncio luminoso tipo bandera a  contorno'],
                ['src'=>'pagina/anuncios_luminosos/5.jpeg','label'=>'Anuncio luminoso tipo bandera  rectangular'],
                ['src'=>'pagina/anuncios_luminosos/6.jpg','label'=>'Caja rectangular de lona tensada'],
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

        <h3 class="subtite_negro text-center mt-5">Características</h3>

        <div class="row">

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/icons/letrero.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Duración</h5>
                        <p class="text-start subtexto_prinicpal_card">Más 10 años de garantía</p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/icons/foco.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Iluminación Versátil</h5>
                        <p class="text-start subtexto_prinicpal_card">Iluminación a base de módulos led, más de 30 mil horas de vida</p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/icons/aluminio.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Acabado</h5>
                        <p class="text-start subtexto_prinicpal_card">Fabricados con materiales de primera calidad; acrílico, aluminio, lámina galvanizada, etc.</p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/icons/certificado-de-garantia.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Resistencia</h5>
                        <p class="text-start subtexto_prinicpal_card">
                           Fácil mantenimiento
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/icons/luz-1.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Vista</h5>
                        <p class="text-start subtexto_prinicpal_card">
                            1 y 2 vistas
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/icons/letrero.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Personalización Total</h5>
                        <p class="text-start subtexto_prinicpal_card">Fabricación en grandes dimensiones.</p>
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
