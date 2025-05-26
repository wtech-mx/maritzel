@extends('layouts.app_pagina')

@section('template_title')
    Letras 3D
@endsection

@section('content')

<section class="row container mx-auto">

    <div class="col-12 col-md-8 col-lg-6 my-auto">
        <h2 class="h2_subtitle">Letras 3D Corpóreas</h2>

        <p class="text-start subtitulos mb-4">
            Contamos con un amplio abanico de posibilidades, en materiales, acabados e iluminación, listos para tu resaltar aún más tu marca.
        </p>

        <div class="row">

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

<section class="row container mx-auto">

    <div class="col-12">
        <h2 class="h2_subtitle text-center mt-5 mb-5"> Elige el material de tu preferencia</h2>
    </div>

    <div class="col-12">
        <div class="d-flex justify-content-around">
            <a href="#ALUMINIO" class="btn_servicices_sect">ALUMINIO</a>
            <a href="#ACRILICO" class="btn_servicices_sect">ACRILICO</a>
            <a href="#ACRILICOALU" class="btn_servicices_sect">ACRILICO CON ALUMINIO</a>
            <a href="#MDF" class="btn_servicices_sect">MDF</a>
            <a href="#PVC" class="btn_servicices_sect">PVC</a>
        </div>
    </div>

</section>

<section class="row container mx-auto">

    <div class="col-12">

        <h3 class="subtite_negro text-center mt-5">LETRAS DE ALUMINIO</h3>

        <h2 class="h2_subtitle text-center mb-5">
            ¿Te gustaría una opción que le dé a tu marca sobriedad y formalidad?
        </h2>
        <p class="text-center subtitulos mb-4">
            La opción en aluminio lo hará, ya que con sus diferentes tonalidades, acabados e iluminación, resaltará su belleza y elegancia.
            <br><strong class="bold_clase" style="font-weight: bold;">¿Qué combinación te gustaría más?</strong><br>
            Estos son varios ejemplos de nuestros proyectos, mira aquí algunas las posibilidades:
        </p>

        <div class="row">
            @foreach ([
                ['src'=>'pagina/1.jpg','label'=>'Aluminio plata cepillado'],
                ['src'=>'pagina/4-1.jpg','label'=>'Letreros en aluminio'],
                ['src'=>'pagina/6.jpg','label'=>'Aluminio dorado'],
                ['src'=>'pagina/2.jpg','label'=>'Aluminio oro cepillado con luz indirecta cálida'],
                ['src'=>'pagina/9-1024x649.jpeg','label'=>'Aluminio plata y aluminio negro con iluminación indirecta cálida'],
                ['src'=>'pagina/3.jpg','label'=>'Aluminio con pintura electroestática e iluminación indirecta fría'],
                ['src'=>'pagina/5.jpg','label'=>'Aluminio con iluminación indirecta RGB'],
                ['src'=>'pagina/9.jpg','label'=>'Aluminio negro con iluminación indirecta RGB'],
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

        <h3 class="subtite_negro text-center mt-5">Características</h3>

        <div class="row">

            <div class="col-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/letras_3d/paleta-de-color.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Tonalidades Exclusivas</h5>
                        <p class="text-start subtexto_prinicpal_card">Plata, Oro, Cobre, Negro, Acero, Chocolate, Blanco, entre otros…</p>
                    </div>
                </div>
            </div>

            <div class="col-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/letras_3d/weather-forecast.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Diseño Adaptable</h5>
                        <p class="text-start subtexto_prinicpal_card">Apto para exterior e interior</p>
                    </div>
                </div>
            </div>

            <div class="col-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/letras_3d/hoja.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Acabados Sofisticados</h5>
                        <p class="text-start subtexto_prinicpal_card">Cepillado, espejo y natural</p>
                    </div>
                </div>
            </div>

            <div class="col-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/letras_3d/certificado-de-garantia.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Garantía y Resistencia</h5>
                        <p class="text-start subtexto_prinicpal_card">
                            Más de 10 años de garantía, no se oxida y no se mancha con los rayos UV.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/letras_3d/circulo-de-color.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Personalización Total</h5>
                        <p class="text-start subtexto_prinicpal_card">
                            Si los tonos antes mencionados no te convencen , tenemos opciones de pintura.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/letras_3d/foco.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Iluminación Versátil</h5>
                        <p class="text-start subtexto_prinicpal_card">Iluminación indirecta fría, cálida y opciones de RGB</p>
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
