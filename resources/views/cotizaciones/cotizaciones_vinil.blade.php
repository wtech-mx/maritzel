@extends('layouts.app')

@section('template_title')
    Cotizacion Viniles
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/admin/vendor/select2/dist/css/select2.min.css')}}">

    <style>

        @media only screen and (max-width: 550px) {
                .label_text{
                    font-size: 12px;
                }
            }

    </style>

 @endsection

@php
    $fecha = date('Y-m-d');
@endphp
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('store.cotizaciones') }}" enctype="multipart/form-data" role="form">
                            @csrf
                            <div class="modal-body">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="label_text" for="precio">Nuevo cliente</label><br>
                                                <button class="btn btn-success btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                    Agregar <img src="{{ asset('assets/icons/cliente.png') }}" alt="" width="25px">
                                                </button>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="label_text" for="name">Cliente *</label>
                                                    <select class="form-select cliente d-inline-block"  data-toggle="select" id="id_cliente" name="id_cliente" value="{{ old('id_cliente') }}">
                                                        <option value="">Seleccionar cliente</option>
                                                        @foreach ($clientes as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nombre }} / {{ $item->telefono }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="label_text" for="name">Subcliente *</label>
                                                    <select class="form-select subcliente d-inline-block" id="id_subcliente" name="id_subcliente">
                                                        <option value="">Seleccionar subcliente</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <div class="collapse" id="collapseExample">
                                            <div class="card card-body">
                                                <div class="row">


                                                    <div class="col-6">
                                                        <label class="label_text" for="name">Nombre completo *</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <img src="{{ asset('assets/icons/cliente.png') }}" alt="" width="29px">
                                                            </span>
                                                            <input  id="nombre_cliente" name="nombre_cliente" type="text" class="form-control" placeholder="Nombre(s) y Apellidos">
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <label class="label_text" for="name">Telefono *</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <img src="{{ asset('assets/icons/phone.png') }}" alt="" width="29px">
                                                            </span>
                                                            <input  id="telefono_cliente" name="telefono_cliente" class="form-control" type="tel" minlength="10" maxlength="10" placeholder="555555555">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <label class="label_text" for="name">Correo</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <img src="{{ asset('assets/icons/correo-electronico.png') }}" alt="" width="29px">
                                                            </span>
                                                            <input  id="correo_cliente" name="correo_cliente" type="email" class="form-control" placeholder="correo@correo.com">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-6">
                                        <h5  class="label_text" for="name">Fecha</h5>
                                        <div class="input-group ">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/calendario.png') }}" alt="" width="15px">
                                            </span>
                                            <input class="form-control" type="date" id="fecha" name="fecha" value="{{date('Y-m-d')}}">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <label class="label_text" for="name">Nombre y Medidas *</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/placa.png') }}" alt="" width="29px">
                                            </span>
                                            <input  id="nombre_empresa" name="nombre_empresa" type="text" class="form-control" placeholder="Imaginarte 90 * 200">
                                        </div>
                                    </div>

                                    <div class="col-12 mt-5">
                                        <h2 style="color:#783E5D"><strong>Seleciona los productos</strong> </h2>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <div id="camposContainer">
                                                <div class="campo mt-3">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-8 col-8">
                                                            <h5 class="label_text" for="">Producto</h5>
                                                            <div class="form-group">
                                                                <select name="producto[]" class="form-select d-inline-block producto">
                                                                    <option value="">Seleccione products</option>
                                                                    @foreach ($servicios as $product)
                                                                        <option value="{{ $product->id }}" data-precio_normal="{{ $product->precio_normal }}">{{ $product->nombre }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-lg-2 col-md-4 col-4">
                                                            <h5  class="label_text" for="name">Largo *</h5>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    <img src="{{ asset('img/icon/impresora-3d.png') }}" alt="" width="15px">
                                                                </span>
                                                                <input type="number" name="largo[]" class="form-control d-inline-block largo" >
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-lg-2 col-md-4 col-4">
                                                            <h5  class="label_text" for="name">Ancho *</h5>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    <img src="{{ asset('img/icon/cinta-metrica.wepb') }}" alt="" width="15px">
                                                                </span>
                                                                <input type="text" name="ancho[]" class="form-control d-inline-block ancho" >
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-lg-2 col-md-4 col-4">
                                                            <h5  class="label_text" for="name">Subtotal *</h5>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                                                </span>
                                                                <input type="text" name="subtotal[]" class="form-control d-inline-block subtotal" >
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-lg-2 col-md-4 col-4">
                                                            <h5  class="label_text" for="name">Total IVA*</h5>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    <img src="{{ asset('img/icon/efectivo.webp') }}" alt="" width="15px">
                                                                </span>
                                                                <input class="form-control subtotalIva" type="text" id="subtotalIva" name="subtotalIva[]" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-lg-12 col-md-12 col-6 ">
                                                            <button class="btn btn-primary mt-2 toggle-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExtraFields0" aria-expanded="false" aria-controls="collapseExtraFields0">
                                                                Más Opciones
                                                            </button>
                                                        </div>

                                                        <div class="collapse" id="collapseExtraFields0">
                                                            <div class="card card-body mt-3">
                                                                <div class="row">

                                                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                                                        <h5  class="label_text" for="name">Foto</h5>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text" id="basic-addon1">
                                                                                <img src="{{ asset('img/icon/galeria-de-imagenes.webp') }}" alt="" width="15px">
                                                                            </span>
                                                                            <input type="file" name="imagen[]" class="form-control imagen" value="0">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                                                        <h5  class="label_text" for="name">M2</h5>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text" id="basic-addon1">
                                                                                <img src="{{ asset('img/icon/escala.png') }}" alt="" width="15px">
                                                                            </span>
                                                                            <input type="number" name="m2[]" class="form-control m2" value="0" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                                                        <h5  class="label_text" for="name">IVA %</h5>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text" id="basic-addon1">
                                                                                <img src="{{ asset('img/icon/comisiones.webp') }}" alt="" width="15px">
                                                                            </span>
                                                                            <input type="number" name="iva[]" class="form-control iva" value="16">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                                                        <h5  class="label_text" for="name">IVA</h5>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text" id="basic-addon1">
                                                                                <img src="{{ asset('img/icon/ingresos.webp') }}" alt="" width="15px">
                                                                            </span>
                                                                            <input type="text" name="totalIva[]" class="form-control totalIva" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                                                        <h5  class="label_text" for="name">Precio m2</h5>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text" id="basic-addon1">
                                                                                <img src="{{ asset('img/icon/efectivo.webp') }}" alt="" width="15px">
                                                                            </span>
                                                                            <input type="number" name="precio_cm[]" class="form-control precio_cm">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                                                        <h5  class="label_text" for="name">Total Precio m2</h5>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text" id="basic-addon1">
                                                                                <img src="{{ asset('img/icon/bolsa-de-dinero.png') }}" alt="" width="15px">
                                                                            </span>
                                                                            <input type="number" name="total_precio_cm[]" class="form-control total_precio_cm" value="0" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                                                        <h5  class="label_text" for="name">Instalacion por m2</h5>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text" id="basic-addon1">
                                                                                <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                                                            </span>
                                                                            <input type="number" name="instalacion[]" class="form-control instalacion" value="80" >
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                                                        <h5  class="label_text" for="name">Total Instalacion</h5>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text" id="basic-addon1">
                                                                                <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                                                            </span>
                                                                            <input type="number" name="total_instalacion[]" class="form-control total_instalacion" value="0">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                                                        <h5  class="label_text" for="name">Envio *</h5>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text" id="basic-addon1">
                                                                                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                                                            </span>
                                                                            <input class="form-control envio" type="text" id="envio" name="envio" value="0" >
                                                                        </div>
                                                                    </div>

                                                                    <input class="form-control" type="hidden" id="cantidad" name="cantidad[]" value="0" >
                                                                    <input class="form-control" type="hidden" id="dimenciones_cm" name="dimenciones_cm[]" value="0" >
                                                                    <input class="form-control" type="hidden" id="material" name="material[]" value="0" >
                                                                    <input class="form-control" type="hidden" id="utilidad" name="utilidad[]" value="0" >
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5  class="label_text" for="name">Comentario/nota</h5>
                                            <textarea class="form-control" name="nota" id="nota" cols="30" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn close-modal" style="background: #322338; color: #ffff; font-size: 17px;">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('datatable')
<script src="{{ asset('assets/admin/vendor/select2/dist/js/select2.min.js')}}"></script>
<script>
$(document).ready(function() {
    function calcularM2() {
        $('.largo').each(function(index) {
            var largo = parseFloat($(this).val()) || 0;
            var ancho = parseFloat($('.ancho').eq(index).val()) || 0;
            var m2 = largo * ancho;
            $('.m2').eq(index).val(m2.toFixed(2));

            calcularTotalPrecio(index); // Calcular total_precio_cm después de actualizar m2
            calcularTotalInstalacion(index); // Calcular total_instalacion después de actualizar m2
            calcularSubtotal(index); // Calcular subtotal después de actualizar total_precio_cm y total_instalacion
        });
    }

    function calcularTotalPrecio(index) {
        var m2 = parseFloat($('.m2').eq(index).val()) || 0;
        var precioCm = parseFloat($('.precio_cm').eq(index).val()) || 0;
        var totalPrecio = m2 * precioCm;
        $('.total_precio_cm').eq(index).val(totalPrecio.toFixed(2));

        calcularSubtotal(index); // Calcular subtotal después de actualizar total_precio_cm
    }

    function calcularTotalInstalacion(index) {
        var m2 = parseFloat($('.m2').eq(index).val()) || 0;
        var instalacion = parseFloat($('.instalacion').eq(index).val()) || 80; // Valor predeterminado 80
        var totalInstalacion = m2 * instalacion;
        $('.total_instalacion').eq(index).val(totalInstalacion.toFixed(2));

        calcularSubtotal(index); // Calcular subtotal después de actualizar total_instalacion
    }

    function calcularSubtotal(index) {
        var totalPrecioCm = parseFloat($('.total_precio_cm').eq(index).val()) || 0;
        var totalInstalacion = parseFloat($('.total_instalacion').eq(index).val()) || 0;
        var subtotal = totalPrecioCm + totalInstalacion;
        $('.subtotal').eq(index).val(subtotal.toFixed(2));

        calcularTotalIva(index); // Calcular totalIva después de actualizar subtotal
    }

    function calcularTotalIva(index) {
        var subtotal = parseFloat($('.subtotal').eq(index).val()) || 0;
        var iva = parseFloat($('.iva').eq(index).val()) || 16; // Valor predeterminado 16
        var totalIva = (subtotal * iva) / 100;
        $('.totalIva').eq(index).val(totalIva.toFixed(2));

        calcularSubtotalIva(index); // Calcular subtotalIva después de actualizar totalIva
    }

    function calcularSubtotalIva(index) {
        var subtotal = parseFloat($('.subtotal').eq(index).val()) || 0;
        var totalIva = parseFloat($('.totalIva').eq(index).val()) || 0;
        var subtotalIva = subtotal + totalIva;
        $('.subtotalIva').eq(index).val(subtotalIva.toFixed(2));
    }

    function actualizarEnvio(index) {
        var subtotal = parseFloat($('.subtotal').eq(index).val()) || 0;
        var envio = parseFloat($('.envio').eq(index).val()) || 0; // Valor predeterminado 0
        var nuevoSubtotal = subtotal + envio;
        $('.subtotal').eq(index).val(nuevoSubtotal.toFixed(2));

        calcularTotalIva(index);
    }

    $(document).on('input', '.largo, .ancho', calcularM2);
    $(document).on('change', '.producto', function() {
        // Encuentra el índice del select actual
        var index = $('.producto').index(this);

        // Encuentra el precio correspondiente en función del índice
        var precioNormal = $(this).find('option:selected').data('precio_normal');

        // Encuentra el input de precio_cm correspondiente al select actual
        var precioCmInput = $('.precio_cm').eq(index);

        // Actualiza el valor del input de precio_cm
        precioCmInput.val(precioNormal);

        // Calcula total_precio_cm después de actualizar precio_cm
        calcularTotalPrecio(index);
    });

    $(document).on('input', '.precio_cm', function() {
        // Encuentra el índice del input de precio_cm actual
        var index = $('.precio_cm').index(this);

        // Calcula total_precio_cm después de actualizar precio_cm
        calcularTotalPrecio(index);
    });

    $(document).on('input', '.instalacion', function() {
        // Encuentra el índice del input de instalacion actual
        var index = $('.instalacion').index(this);

        // Calcula total_instalacion después de actualizar instalacion
        calcularTotalInstalacion(index);
    });

    $(document).on('input', '.total_instalacion', function() {
        // Encuentra el índice del input de total_instalacion actual
        var index = $('.total_instalacion').index(this);

        // Actualiza el subtotal después de cambiar el total_instalacion manualmente
        calcularSubtotal(index);
    });

    $(document).on('input', '.iva', function() {
        // Encuentra el índice del input de iva actual
        var index = $('.iva').index(this);

        // Calcula totalIva después de actualizar iva
        calcularTotalIva(index);
    });

    $(document).on('input', '.envio', function() {
        // Encuentra el índice del input de envio actual
        var index = $('.envio').index(this);

        // Actualiza el subtotal después de cambiar el envío
        actualizarEnvio(index);
    });

    // Establece el valor predeterminado de instalación, iva y envío al cargar la página
    $('.instalacion').each(function() {
        if ($(this).val() === "") {
            $(this).val(80);
        }
    });

    $('.iva').each(function() {
        if ($(this).val() === "") {
            $(this).val(16);
        }
    });

    $('.envio').each(function() {
        if ($(this).val() === "") {
            $(this).val(0);
        }
    });

    // Llama a calcularM2 para inicializar los valores al cargar la página
    calcularM2();
});

</script>

@endsection
