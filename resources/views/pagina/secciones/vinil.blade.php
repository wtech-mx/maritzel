@extends('layouts.app_pagina')

@section('template_title')
    Vinilo Decorativo
@endsection

@section('content')

<section class="row container-lg mx-auto">

    <div class="col-12 col-md-12 col-lg-12 my-auto">
        <h1 class="text-center">Vinilo Decorativo</h1>

        <h3 class="h2_subtitle text-center mt-3">¡Personaliza tus espacios!</h3>
        <p class="text-center subtitulos mb-4">
            El vinilo para decoración es un material adhesivo que se encuentra siendo utilizado en el mundo del interiorismo. Son duraderos, resistentes, accesibles y mucho más… <br>¡un elemento estrella en los diseños de interiorismo! Son una alternativa sencilla, versátil y original de decorar cualquier
            <br>espacio.
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

<section class="row container-lg mx-auto">
    <div class="col-12">
        <div class="row">
            @foreach ([
                ['src'=>'pagina/vinilo/1.jpg','label'=>'Vinilo decorativo colores'],
                ['src'=>'pagina/vinilo/2.webp','label'=>'Vinilo decorativo 2 colores'],
                ['src'=>'pagina/vinilo/3.jpg','label'=>'Vinilo esmerilado calado'],
                ['src'=>'pagina/vinilo/4.jpg','label'=>'Vinilo esmerilado y vinilo de recorte a color'],
                ['src'=>'pagina/vinilo/5.jpg','label'=>'Vinilo decorativo'],
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

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/icons/el-tiempo-pasa.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Duración más de 10 años al interior</h5>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/icons/cepillo.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Diseños personalizados</h5>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/icons/mantenimiento.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Fácil mantenimiento</h5>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/icons/megafono.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Adherencia en</h5>
                        <p class="text-start subtexto_prinicpal_card">Muros de Tablaroca, concreto, Durock, cristales, plásticos, madera, etc.</p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/icons/tijeras.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Vinilos recortados o calados</h5>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/icons/neon-1.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Vinilos esmerilados, neón ...</h5>
                        <p class="text-start subtexto_prinicpal_card">Vinilos esmerilados, neón y una amplia gama de tonalidades brillantes o mate</p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/icons/escala.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Diferentes Dimensiones</h5>
                        <p class="text-start subtexto_prinicpal_card">Pueden fabricarse en dimensiones grandes o muy pequeñas</p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/letras_3d/hoja.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Resistente a la humedad y al exterior</h5>
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
