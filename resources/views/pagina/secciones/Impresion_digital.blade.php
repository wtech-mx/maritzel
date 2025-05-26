@extends('layouts.app_pagina')

@section('template_title')
    Impresion digital
@endsection

@section('content')

<section class="row container mx-auto">

    <div class="col-12 col-md-12 col-lg-12 my-auto">
        <h1 class="text-center">IMPRESIÓN DIGITAL A GRAN FORMATO</h1>

        <h2 class="h2_subtitle text-center mt-3">Lona - Vinil - Papel</h2>
        <h2 class="h2_subtitle text-center mt-3">Diferentes posibilidades para diferentes proyectos</h2>
        <div class="row">
            <p class="text-center subtitulos mb-4">
                La impresión digital a gran formato es aquella impresión de alta resolución utilizada para transmitir y expresar imágenes
                <br>y mensajes en grandes superficies, la impresión digital puede realizarse en diferentes sustratos, tales, como; Lona, Vinil,
                <br>Papel, Papel tápiz, entre otros..

                <br><br>En Imaginarte 3D contamos con impresión en alta resolución o calidad fotografica y puedes elegir el tipo de tinta que
                <br>requieres de acuerdo a las especificaciones de tu proyecto, los cuales son;

                <br><br><strong class="bold_clase" style="font-weight: bold;">Tintas Latex </strong>- Protección UV, Más de 3 años de durabilidad al exterior y más de 5 años de durabilidad al interior,
                <br>anticrash, mayor saturación de color, es ideal para proyectos que requieran más durabilidad al exterior.

                <br><br><strong class="bold_clase" style="font-weight: bold;">Tintas Genéricas </strong>- Sin protección UV, Más de 2 años de durabilidad al exterior y más de 5 años de durabilidad al interior,
                <br>ideal para interior o proyectos al exterior de menor duración.
            </p>
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
        <h2 class="h2_subtitle text-center mt-5 mb-5"> Elige el material de tu preferencia</h2>
    </div>

    <div class="col-12">
        <div class="d-flex justify-content-around">
            <a href="#ALUMINIO" class="btn_servicices_sect">Vinil</a>
            <a href="#ACRILICO" class="btn_servicices_sect">Lona</a>
            <a href="#ACRILICOALU" class="btn_servicices_sect">Papel</a>
            <a href="#MDF" class="btn_servicices_sect">Más aplicaciones</a>
        </div>
    </div>

</section>

 {{-- ============================== Lona Section ============================== --}}
<section class="row container mx-auto">

    <div class="col-12">

        <h3 class="subtite_negro text-center mt-5">Lona</h3>

        <p class="text-center subtitulos mb-4">
            La lona es un material muy resistente al exterior y una de sus grandes ventajas su costo y puede ser impresa en
            <br>grandes dimensiones y con diferentes aplicaciones.
        </p>

        <div class="row">
            @foreach ([
                ['src'=>'pagina/impresion_digital/lona/1.jpg','label'=>'Lona back light'],
                ['src'=>'pagina/impresion_digital/lona/2.jpg','label'=>'Lona front 18 onzas'],
                ['src'=>'pagina/impresion_digital/lona/3.jpg','label'=>'Lona mesh'],
                ['src'=>'pagina/impresion_digital/lona/4.jpg','label'=>'Lona para  banner 13 onzas'],
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

        <h3 class="subtite_negro text-center mt-5">Tipos de Lona y sus características</h3>

        <div class="row">

            <div class="col-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/letras_3d/paleta-de-color.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Lona Front 13 y 18 onzas</h5>
                        <p class="text-start subtexto_prinicpal_card">Las lonas front son blancas y con un acabado brillante. Es uno de los tipos de lonas publicitarias más habituales porque es económica, resistente y de gran calidad</p>
                    </div>
                </div>
            </div>

            <div class="col-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/letras_3d/weather-forecast.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">La Lona Mesh</h5>
                        <p class="text-start subtexto_prinicpal_card">Es altamente resistente, permite el paso del viento ideal para escenografías o espectaculares en zonas de mucho viento o al exterior.</p>
                    </div>
                </div>
            </div>

            <div class="col-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/letras_3d/hoja.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Lona Black light 18 onzas</h5>
                        <p class="text-start subtexto_prinicpal_card">Es un material que permite el paso de la iluminación artificial, ideal para cajas de luz de gran tamaño.</p>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>

{{-- ============================== Vinil Section ============================== --}}
<section class="row container mx-auto">
    <div class="col-12">
        <h3 class="subtite_negro text-center mt-5">Vinil</h3>

        <p class="text-center subtitulos mb-4">
            El vinil es un material flexible y adherible, el vinil es muy versátil ya que puede aplicarse en diferentes
            <br>superficies; Muros de concreto o Tablaroca, cristales, pisos, promocionales, textiles, autos, metales, etc.

            <br><br>Su mantenimiento es sencillo, es ideal para interiores y exteriores, puede ocuparse en grandes dimensiones.
        </p>

        <div class="row">
            @foreach ([
                ['src'=>'pagina/impresion_digital/vinil/1.jpg','label'=>'Vinil aplicado en Tablaroca'],
                ['src'=>'pagina/impresion_digital/vinil/2.jpg','label'=>'Vinil aplicado auto'],
                ['src'=>'pagina/impresion_digital/vinil/3.jpg','label'=>'Vinil aplicado sobre cristal'],
                ['src'=>'pagina/impresion_digital/vinil/4.jpg','label'=>'Vinil textil'],
                ['src'=>'pagina/impresion_digital/vinil/5.jpg','label'=>'Vinil esmerilado impreso '],
                ['src'=>'pagina/impresion_digital/vinil/6.jpg','label'=>'Vinil microperforado'],
                ['src'=>'pagina/impresion_digital/vinil/7.jpg','label'=>'Vinil transparente con  impresión'],
                ['src'=>'pagina/impresion_digital/vinil/8.png','label'=>'Vinil electroestático'],
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

        <h3 class="subtite_negro text-center mt-5">Tipos de Vinil y sus características</h3>

        <div class="row">

            <div class="col-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/letras_3d/paleta-de-color.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Vinil Adherible</h5>
                        <p class="text-start subtexto_prinicpal_card">Es el más común por que puede aplicarse en diferentes superficies, existen diferentes tipos de
                        durabilidad, adhesión y puede ser mate o brillante</p>
                    </div>
                </div>
            </div>

            <div class="col-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/letras_3d/weather-forecast.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Vinil microperforado</h5>
                        <p class="text-start subtexto_prinicpal_card">Cuenta con agujeros de tamaño uniforme, los cuales permiten pasar la luz al otro lado,
                            por lo que se utilizan para la rotulación y decoración de ventanas y cristales.</p>
                    </div>
                </div>
            </div>

            <div class="col-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/letras_3d/hoja.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Vinil transparente</h5>
                        <p class="text-start subtexto_prinicpal_card">Permite el paso de luz y no tapa completamente la visión, ideal para cristales o acrílicos cristales.</p>
                    </div>
                </div>
            </div>

            <div class="col-4 contenedor_facs">
                <div class="row">

                </div>
            </div>

            <div class="col-4 contenedor_facs">
                <div class="row">
                    <div class="col-3 my-auto">
                        <img class="img_icon_card" src="{{ asset('pagina/letras_3d/circulo-de-color.png') }}" alt="">
                    </div>

                    <div class="col-9">
                        <h5 class="text-start texto_prinicpal_card">Vinil electroestático</h5>
                        <p class="text-start subtexto_prinicpal_card">
                            No contiene adhesivos, ya que se sostiene gracias a la carga electroestática, comúnmente se utiliza en cristales y por poco tiempo.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-4 contenedor_facs">
                <div class="row">

                </div>
            </div>
        </div>

    </div>
</section>

{{-- ============================== Papel Section ============================== --}}
<section class="row container mx-auto">
    <div class="col-12">
        <h3 class="subtite_negro text-center mt-5">Papel</h3>

        <p class="text-center subtitulos mb-4">
            La impresión en Papel cuenta con diferentes aplicaciones dependiendo el proyecto, su gran ventaja son las dimensiones
            <br>que pueden imprimirse.

            <br><br>Contamos con papel bond y papel tapiz

            <br><br>Adicional a esto en Imaginarte 3D también podemos apoyarte en la papelería corporativa: Trípticos, folletos, tarjetas de
                <br>presentación, menús, etc.
        </p>

        <div class="row">
            @foreach ([
                ['src'=>'pagina/impresion_digital/papel/1.jpg','label'=>'Papel tapiz'],
                ['src'=>'pagina/impresion_digital/papel/2.jpg','label'=>'Papel bond'],
                ['src'=>'pagina/impresion_digital/papel/3.jpg','label'=>'Trípticos'],
                ['src'=>'pagina/impresion_digital/papel/4.jpg','label'=>'Tarjetas de presentación'],
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

{{-- ============================== Más aplicaciones Section ============================== --}}
<section class="row container mx-auto">
    <div class="col-12">
        <h3 class="subtite_negro text-center mt-5">Más aplicaciones</h3>

        <p class="text-center subtitulos mb-4">
            Checa más posibilidades…
        </p>

        <div class="row">
            @foreach ([
                ['src'=>'pagina/impresion_digital/mas/1.jpg','label'=>'Impresión en rígidos'],
                ['src'=>'pagina/impresion_digital/mas/2.jpeg','label'=>'Cuadro en tela Canvas'],
                ['src'=>'pagina/impresion_digital/mas/3.jpg','label'=>'Estireno impreso'],
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

        <p class="text-center subtitulos mb-4">
            <br><br>
            La impresión digital a gran formato su grande ventaje es la diversidad de materiales que pueden imprimirse a
           <br> gran escala y que dependerá del tipo de proyecto que visual que desean elaborar, además de que es una
            <br>opción económicamente atractiva.
        </p>
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
