@extends('layouts.app_pagina')

@section('template_title')
    Letras 3D
@endsection

@section('content')

<section class="row container-lg  mx-auto">

    <div class="col-12 col-md-8 col-lg-6 my-auto mx-auto">
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

    <div class="col-12 col-md-8 col-lg-6 mx-auto">

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

<section class="row container-lg  mx-auto">

    <div class="col-12">
        <h2 class="h2_subtitle text-center mt-5 mb-5"> Elige el material de tu preferencia</h2>
    </div>

    <div class="col-12">
        <div class="d-flex justify-content-around">
            <a href="#ALUMINIO" class="btn_servicices_sect">ALUMINIO</a>
            <a href="#ACRILICO" class="btn_servicices_sect">ACRILICO</a>
            <a href="#ACRILICOALU" class="btn_servicices_sect">ACRILICO CON ALUMINIO</a>
            <a href="#MDF" class="btn_servicices_sect">MDF</a>
            <a href="#MDF" class="btn_servicices_sect">PVC</a>
        </div>
    </div>

</section>

<section class="row container-lg  mx-auto" id="ALUMINIO">

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
                ['src'=>'pagina/letras_3d/aluminio5.jpg','label'=>'Aluminio plata cepillado'],
                ['src'=>'pagina/letras_3d/pemex.png','label'=>'Letreros en aluminio'],
                ['src'=>'pagina/letras_3d/aluminio7.jpg','label'=>'Aluminio dorado'],
                ['src'=>'pagina/letras_3d/Imagen1.jpg','label'=>'Aluminio oro cepillado con luz indirecta cálida'],
                ['src'=>'pagina/letras_3d/aluminio3.jpg','label'=>'Aluminio plata y aluminio negro con iluminación indirecta cálida'],
                ['src'=>'pagina/letras_3d/Aluminio1.jpg','label'=>'Aluminio con pintura electroestática e iluminación indirecta fría'],
                ['src'=>'pagina/letras_3d/inife.png','label'=>'Aluminio con iluminación indirecta RGB'],
                ['src'=>'pagina/letras_3d/aluminio8.jpg','label'=>'Aluminio negro con iluminación indirecta RGB'],
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

<section class="row container-lg  mx-auto">

    <div class="col-12">

        <h3 class="subtite_negro text-center mt-5">Características</h3>

        <div class="row">

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
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

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
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

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
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

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
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

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
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

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
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

<section class="row container-lg  mx-auto" id="ACRILICO">

    <div class="col-12">

        <h3 class="subtite_negro text-center mt-5">LETRAS DE ACRILICO</h3>

        <h2 class=" subtitulos text-center mb-5">
           El acrílico es un material que ha ganado gran aceptación por tener la belleza y naturalidad parecida a la del cristal, gracias a su flexibilidad y ligereza es excelente opción para realzar en 3D letras, figuras e isotipos. La naturaleza translúcida del acrílico hará que al iluminarse consiga un brillo único y definitivamente destacará del resto, dentro de sus ventajas se encuentra una amplia gama de colores, además de tener la facilidad de poder ser rotuladas en viniles translucidos con colores sólidos o impresos.
        </h2>
        <p class="text-center h2_subtitle mb-4">
            Checa la diversidad de este material y elige cual se adapta más con tu logotipo
        </p>

        <div class="row">
            @foreach ([
                ['src'=>'pagina/letras_3d/1.jpg','label'=>'Checa la diversidad de este material y elige cual se adapta más con tu logotipo'],
                ['src'=>'pagina/letras_3d/Imagen1-1.jpg','label'=>'Frente y cantos de acrílico color blanco con luz fría'],
                ['src'=>'pagina/letras_3d/frente-y-cantos-de-acrilico-color-rojo-sin-luz.png','label'=>'Aluminio dorado'],
                ['src'=>'pagina/letras_3d/rectangular-con-vinil-negro-solido-calado-sobre-acrilico-blanco-e-iluminacion-indirecta.png','label'=>'Frente y cantos de acrílico color rojo sin luz'],
                ['src'=>'pagina/letras_3d/Letrero-3D-con-iluminacion-directa-e-indirecta.png','label'=>'Rectangular con vinil negro sólido calado sobre acrílico blanco e iluminación indirecta'],
                ['src'=>'pagina/letras_3d/Letras-de-acrilico-con-vinil.png','label'=>'Iluminación directa e indirecta'],
                ['src'=>'pagina/letras_3d/acrilico6.jpg','label'=>'Acrílico con vinil'],
                ['src'=>'pagina/letras_3d/medallon-de-acrilico-3d-con-arte-en-vinil.jpg','label'=>'Acrílico con vinil'],
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

<section class="row container-lg  mx-auto">

    <div class="col-12">

        <h3 class="subtite_negro text-center mt-5">Características</h3>

        <div class="row">

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
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

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
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

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
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

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
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

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
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

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
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

<section class="row container-lg  mx-auto" id="ACRILICOALU">

    <div class="col-12">

        <h3 class="subtite_negro text-center mt-5">LETRAS DE ACRILICO CON ALUMINIO</h3>

        <h2 class="subtitulos text-center mb-5">
            Los Letreros 3D de aluminio y acrílico hacen la perfecta conjunción de la naturalidad del acrílico y la elegancia del aluminio, al tener los dos materiales tienes diferentes posibilidades para crear tu letrero, dentro de su fabricación podemos ocupar frente de acrilico y cantos de aluminio o viceversa.
           <br> Las Letras corporeas 3d en aluminio y acrílico son ideales para colocarse en alturas por que tienen mayor cuerpo y suelen ser vistosas
        </h2>

        <div class="row">
            @foreach ([
                ['src'=>'pagina/letras_3d/Letras-3d-frente-de-acrilico-y-cantos-de-aluminio.png','label'=>'Frente de acrílico y cantos de aluminio'],
                ['src'=>'pagina/letras_3d/Letras-3d-frente-de-acrilico-y-cantos-de-aluminio3.png','label'=>'Acrílico y cantos de aluminio'],
                ['src'=>'pagina/letras_3d/acrilyaluminio2.jpg','label'=>'Frente de aluminio mate y cantos de acrílico blanco'],
                ['src'=>'pagina/letras_3d/acrilyaluminio4.jpg','label'=>'Frente de aluminio mate y cantos de acrílico blanco'],
                ['src'=>'pagina/letras_3d/Letras-3d-frente-de-aluminio-y-cantos-acrilico.png','label'=>'Frente aluminio espejo y cantos de acrílico esme'],
                ['src'=>'pagina/letras_3d/Letras-3d-frente-de-acrilico-y-cantos-de-aluminio2.png','label'=>'Aluminio y cantos acrílico'],
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

<section class="row container-lg  mx-auto" id="MDF">

    <div class="col-12">

        <h3 class="subtite_negro text-center mt-5">Letreros sin realce <br>MDF, PVC, acrílico y panel compuesto </h3>

        <h2 class="text-center h2_subtitle mb-4">
            ¿En busca de letreros sencillos, económicos y que cubran las necesidades de tu marca?
        </h2>

        <p class="subtitulos text-center mb-5">
            Los Letreros sin realce 3d, son ideales sí buscas un letrero sencillo y estético, estos se fabrican con el espesor del material de su elección, dentro de sus acabados pueden ser pintados, rotulados en vinil, con frente en aluminio o acrílico, etc.
        </p>

        <div class="row">
            @foreach ([
                ['src'=>'pagina/letras_3d/mdf6.jpg','label'=>'MDF, PVC, acrílico y panel compuesto'],
                ['src'=>'pagina/letras_3d/pvc4.jpg','label'=>'PVC 10 mm con pintura'],
                ['src'=>'pagina/letras_3d/acrilico4.jpg','label'=>'PVC 10 mm con pintura'],
                ['src'=>'pagina/letras_3d/panel-compuesto-3-mm.jpg','label'=>'Panel compuesto 3 mm'],
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

<section class="row container-lg  mx-auto">

    <div class="col-12">

        <h3 class="subtite_negro text-center mt-5">Características</h3>

        <div class="row">

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
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

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
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

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
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

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
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

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
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

            <div class="col-6 col-md-4 col-lg-4 contenedor_facs">
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
