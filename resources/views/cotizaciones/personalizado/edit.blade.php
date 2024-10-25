@extends('layouts.app')

@section('template_title')
    Cotizacion Cosmica
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
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('update.cotizaciones', $cotizacion->id) }}" enctype="multipart/form-data" role="form">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="modal-body">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="precio">Nuevo cliente</label><br>
                                                <button class="btn btn-success btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                    Agregar <img src="{{ asset('assets/icons/cliente.png') }}" alt="" width="25px">
                                                </button>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="name">Cliente *</label>
                                                    <select class="form-select cliente d-inline-block"  data-toggle="select" id="id_cliente" name="id_cliente" value="{{ old('id_cliente') }}">
                                                        <option value="{{$cotizacion->id}}">{{$cotizacion->Cliente->nombre}}</option>
                                                        @foreach ($clientes as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nombre }} / {{ $item->telefono }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="name">Subcliente *</label>
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


                                                    <div class="col-4">
                                                        <label for="name">Nombre completo *</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <img src="{{ asset('assets/icons/cliente.png') }}" alt="" width="29px">
                                                            </span>
                                                            <input  id="nombre_cliente" name="nombre_cliente" type="text" class="form-control" placeholder="Nombre(s) y Apellidos">
                                                        </div>
                                                    </div>

                                                    <div class="col-4">
                                                        <label for="name">Telefono *</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <img src="{{ asset('assets/icons/phone.png') }}" alt="" width="29px">
                                                            </span>
                                                            <input  id="telefono_cliente" name="telefono_cliente" class="form-control" type="tel" minlength="10" maxlength="10" placeholder="555555555">
                                                        </div>
                                                    </div>

                                                    <div class="col-4">
                                                        <label for="name">Correo</label>
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
                                        <h5 for="name">Fecha</h5>
                                        <div class="input-group ">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/calendario.png') }}" alt="" width="15px">
                                            </span>
                                            <input class="form-control" type="date" id="fecha" name="fecha" value="{{$cotizacion->fecha}}">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <label for="name">Nombre y Medidas *</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/placa.png') }}" alt="" width="29px">
                                            </span>
                                            <input  id="nombre_empresa" name="nombre_empresa" type="text" class="form-control" value="{{$cotizacion->nombre_empresa}}">
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <h5 class="label_text" for="name">Foto</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/galeria-de-imagenes.webp') }}" alt="" width="15px">
                                            </span>
                                            <input type="file" name="foto[]" class="form-control" multiple>
                                        </div>
                                    </div>

                                    @foreach($cotizacion_fotos as $foto)
                                    <div class="col-3">
                                        <div class="image-container" style="position: relative; display: inline-block;">
                                            <img src="{{ asset('materiales/' . $foto->foto) }}" alt="Foto" width="100px">

                                            <!-- Botón para eliminar la imagen -->
                                            <button type="button" class="btn btn-danger btn-sm remove-image" data-id="{{ $foto->id }}" style="position: absolute; top: 0; right: 0;">
                                                &times;
                                            </button>
                                        </div>
                                    </div>
                                    @endforeach

                                    <div class="col-12 mt-5">
                                        <h2 style="color:#783E5D"><strong>Seleciona los productos</strong> </h2>
                                    </div>

                                    @foreach ($servicios_cotizacion as $productos)
                                        <div class="row">
                                            <div class="col-lg-4 col-md-8 col-8">
                                                <h5 class="label_text" for="">Producto</h5>
                                                <div class="form-group">
                                                    <select name="producto[]" class="form-select d-inline-block producto">
                                                        <option value="{{$productos->id_servicios}}">{{$productos->Servicio->nombre}}</option>
                                                        @foreach ($servicios as $product)
                                                            <option value="{{ $product->id }}" data-precio_normal="{{ $product->precio_normal }}">{{ $product->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-2 col-md-4 col-4 ">
                                                <h5 class="label_text" for="name">Cantidad *</h5>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <img src="{{ asset('img/icon/clic2.png') }}" alt="" width="15px">
                                                    </span>
                                                    <input type="number" name="cantidad[]" class="form-control d-inline-block cantidad" value="{{$productos->cantidad}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-2 col-md-4 col-6 ">
                                                <h5 class="label_text" for="name">Dimencion *</h5>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <img src="{{ asset('img/icon/impresora-3d.png') }}" alt="" width="15px">
                                                    </span>
                                                    <input type="text" name="dimenciones[]" class="form-control d-inline-block dimenciones" value="{{$productos->dimenciones_cm}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-2 col-md-4 col-6 ">
                                                <h5 class="label_text" for="name">Subtotal *</h5>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                                    </span>
                                                    <input type="text" name="subtotal[]" class="form-control d-inline-block subtotal" readonly value="{{$productos->total}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12 col-md-12 col-6 ">
                                                <h5 class="label_text" for="name">-</h5>
                                                <div class="input-group mb-3">
                                                    <button class="btn btn-primary toggle-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExtraFields0" aria-expanded="false" aria-controls="collapseExtraFields0">
                                                        Más Opciones
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="collapse" id="collapseExtraFields0">
                                                <div class="card card-body mt-3">
                                                    <div class="row">
                                                        <div class="form-group col-lg-2 col-md-4 col-6">
                                                            <h5 class="label_text" for="name">Precio cm</h5>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    <img src="{{ asset('img/icon/efectivo.webp') }}" alt="" width="15px">
                                                                </span>
                                                                <input type="number" name="precio_cm[]" class="form-control precio_cm" value="{{$productos->precio_cm}}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-lg-2 col-md-4 col-6">
                                                            <h5 class="label_text" for="name">Total Precio cm</h5>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    <img src="{{ asset('img/icon/bolsa-de-dinero.png') }}" alt="" width="15px">
                                                                </span>
                                                                <input type="number" name="total_precio_cm[]" class="form-control total_precio_cm" value="0" readonly value="{{$productos->total_precio_cm}}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-lg-2 col-md-4 col-6">
                                                            <h5 class="label_text" for="name">Material y M.O.</h5>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                                                </span>
                                                                <input type="number" name="material[]" class="form-control material" value="0" readonly value="{{$productos->material}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <input class="form-control" type="hidden" id="largo " name="largo[]" value="0" >
                                            <input class="form-control" type="hidden" id="ancho " name="ancho[]" value="0" >
                                            <input class="form-control" type="hidden" id="m2 " name="m2[]" value="0" >
                                            <input class="form-control" type="hidden" id="total_instalacion " name="total_instalacion[]" value="0" >
                                        </div>
                                    @endforeach


                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <label for="envio_externo">¿Envió Externo?</label>
                                        <input type="checkbox" id="envio_externo" name="envio_externo" value="1" {{ $cotizacion->envio_externo == 1 ? 'checked' : '' }}>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <label for="instalacion_aparte">¿Separar instalacion?</label>
                                        <input type="checkbox" id="instalacion_aparte" name="instalacion_aparte" value="1" {{ $cotizacion->instalacion_aparte == 1 ? 'checked' : '' }}>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text" for="name"># Letreros *</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                            </span>
                                            <input class="form-control" type="number" id="cantidad_letreros" name="cantidad_letreros" value="{{$cotizacion->cantidad_letreros}}">
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text" for="name">Envio *</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                            </span>
                                            <input class="form-control envio" type="number" id="envio" name="envio" value="{{$cotizacion->envio}}">
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text" for="name">Instalacion</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                            </span>
                                            <input class="form-control instalacion" type="number" id="instalacion" name="instalacion" value="{{$cotizacion->instalacion}}">
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text" for="name">Utilidad %</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                            </span>
                                            <input type="number" name="utilidad" id="utilidad" class="form-control utilidad" value="{{$cotizacion->utilidad}}">
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text" for="name">Utilidad $</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                            </span>
                                            <input type="number" name="utilidad_fijo"  id="utilidad_fijo" class="form-control utilidad_fijo" value="{{$cotizacion->utilidad_fijo}}">
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text" for="name">Total</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                            </span>
                                            <input type="text" id="total" name="total" class="form-control d-inline-block" readonly value="{{$cotizacion->subtotal}}">
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text" for="name">IVA %</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                            </span>
                                            <input type="number" id="ivaPorcentaje" name="ivaPorcentaje" class="form-control" value="{{$cotizacion->iva_porcentaje}}">
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text" for="name">IVA</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                            </span>
                                            <input id="ivaTotal" name="ivaTotal" type="text" class="form-control" readonly value="{{$cotizacion->iva_total}}">
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6 ">
                                        <h5 class="label_text" for="name">Total IVA*</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                            </span>
                                            <input id="totalIva" name="totalIva" class="form-control" type="text" readonly value="{{$cotizacion->total}}">
                                        </div>
                                    </div>


                                    <div id="mensaje_envio" class="form-group  col-lg-6 col-md-6 col-12 " style="display:none;">
                                        <label for="mensaje">Mensaje de Envío</label>
                                        <textarea class="form-control" id="mensaje_envio" name="mensaje_envio" rows="4">{{$cotizacion->mensaje_envio}}</textarea>
                                    </div>

                                    <div id="mensaje_instalacion" class="form-group  col-lg-6 col-md-6 col-12 " style="display:none;">
                                        <label for="mensaje">Mensaje de Instalacion</label>
                                        <textarea class="form-control" id="2" name="mensaje_instalacion" rows="4">{{$cotizacion->mensaje_instalacion}}</textarea>
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
document.addEventListener('DOMContentLoaded', function() {
    // Definir la función calcularTotalPorServicio primero
    function calcularTotalPorServicio(precioCmInput, dimencionesInput, totalPrecioCmInput, cantidadInput, materialInput, subtotalInput, utilidadPorcentajeInput, utilidadFijoInput) {
        // Calcular totalPrecioCm
        var precioCm = parseFloat(precioCmInput.value) || 0;
        var dimenciones = parseFloat(dimencionesInput.value) || 0;
        var totalPrecioCm = precioCm * dimenciones;
        totalPrecioCmInput.value = totalPrecioCm.toFixed(2);

        // Calcular material (totalPrecioCm * cantidad)
        var cantidad = parseFloat(cantidadInput.value) || 0;
        var material = totalPrecioCm * cantidad;
        materialInput.value = material.toFixed(2);

        // Obtener utilidadPorcentaje y utilidadFijo
        var utilidadPorcentaje = parseFloat(utilidadPorcentajeInput.value) || 0;
        var utilidadFijo = parseFloat(utilidadFijoInput.value) || 0;

        // Calcular subtotal (material * (1 + utilidadPorcentaje / 100) + utilidadFijo)
        var subtotal = material * (1 + utilidadPorcentaje / 100) + utilidadFijo;
        subtotalInput.value = subtotal.toFixed(2);
    }

    // Definir la función para calcular totales generales
    function calcularTotalesGenerales() {
        // Obtener los elementos necesarios para recalcular totales generales
        var envioInput = document.getElementById('envio');
        var instalacionInput = document.getElementById('instalacion');
        var subtotalInputs = document.querySelectorAll('.subtotal');
        var ivaPorcentajeInput = document.getElementById('ivaPorcentaje');

        // Obtener el valor de envio e instalacion
        var envio = parseFloat(envioInput.value) || 0;
        var instalacion = parseFloat(instalacionInput.value) || 0;

        // Sumar todos los subtotales de los servicios
        var subtotalGeneral = 0;
        subtotalInputs.forEach(function(input) {
            subtotalGeneral += parseFloat(input.value) || 0;
        });

        // Obtener el porcentaje de IVA
        var ivaPorcentaje = parseFloat(ivaPorcentajeInput.value) || 0;

        // Calcular total sin IVA (subtotal general + instalación + envio)
        var totalSinIva = subtotalGeneral + instalacion + envio;

        // Calcular IVA total
        var ivaTotal = totalSinIva * (ivaPorcentaje / 100);
        document.getElementById('ivaTotal').value = ivaTotal.toFixed(2);

        // Calcular el total con IVA
        var totalConIva = totalSinIva + ivaTotal;
        document.getElementById('totalIva').value = totalConIva.toFixed(2);

        // Actualizar el campo de total general
        document.getElementById('total').value = totalSinIva.toFixed(2);
    }

    // Obtener todos los elementos que forman parte de cada servicio cotizado
    var servicios = document.querySelectorAll('.row');

    servicios.forEach(function(servicio) {
        // Encontrar los inputs dentro de cada servicio
        var precioCmInput = servicio.querySelector('.precio_cm');
        var dimencionesInput = servicio.querySelector('.dimenciones');
        var cantidadInput = servicio.querySelector('.cantidad');
        var materialInput = servicio.querySelector('.material');
        var totalPrecioCmInput = servicio.querySelector('.total_precio_cm');
        var subtotalInput = servicio.querySelector('.subtotal');
        var utilidadPorcentajeInput = document.querySelector('#utilidad');
        var utilidadFijoInput = document.querySelector('#utilidad_fijo');
        var envioInput = servicio.querySelector('.envio');
        var instalacionInput = servicio.querySelector('.instalacion');

        // Calcular valores al cargar la página
        calcularTotalPorServicio(precioCmInput, dimencionesInput, totalPrecioCmInput, cantidadInput, materialInput, subtotalInput, utilidadPorcentajeInput, utilidadFijoInput);
        calcularTotalesGenerales(); // Recalcular totales generales tras calcular cada servicio

        // Agregar eventos para recalcular cuando se modifiquen los valores
        precioCmInput.addEventListener('input', function() {
            calcularTotalPorServicio(precioCmInput, dimencionesInput, totalPrecioCmInput, cantidadInput, materialInput, subtotalInput, utilidadPorcentajeInput, utilidadFijoInput, envioInput, instalacionInput);
            calcularTotalesGenerales(); // Actualizar totales generales
        });

        dimencionesInput.addEventListener('input', function() {
            calcularTotalPorServicio(precioCmInput, dimencionesInput, totalPrecioCmInput, cantidadInput, materialInput, subtotalInput, utilidadPorcentajeInput, utilidadFijoInput, envioInput, instalacionInput);
            calcularTotalesGenerales();
        });

        cantidadInput.addEventListener('input', function() {
            calcularTotalPorServicio(precioCmInput, dimencionesInput, totalPrecioCmInput, cantidadInput, materialInput, subtotalInput, utilidadPorcentajeInput, utilidadFijoInput, envioInput, instalacionInput);
            calcularTotalesGenerales();
        });

        utilidadPorcentajeInput.addEventListener('input', function() {
            calcularTotalPorServicio(precioCmInput, dimencionesInput, totalPrecioCmInput, cantidadInput, materialInput, subtotalInput, utilidadPorcentajeInput, utilidadFijoInput, envioInput, instalacionInput);
            calcularTotalesGenerales();
        });

        utilidadFijoInput.addEventListener('input', function() {
            calcularTotalPorServicio(precioCmInput, dimencionesInput, totalPrecioCmInput, cantidadInput, materialInput, subtotalInput, utilidadPorcentajeInput, utilidadFijoInput, envioInput, instalacionInput);
            calcularTotalesGenerales();
        });
    });

    // Añadir eventos para recalcular cuando se modifiquen estos valores
    document.getElementById('envio').addEventListener('input', calcularTotalesGenerales);
    document.getElementById('instalacion').addEventListener('input', calcularTotalesGenerales);
    document.getElementById('utilidad').addEventListener('input', calcularTotalesGenerales);
    document.getElementById('utilidad_fijo').addEventListener('input', calcularTotalesGenerales);
    document.getElementById('ivaPorcentaje').addEventListener('input', calcularTotalesGenerales);

    // Actualizar totales generales cuando se modifiquen los subtotales
    var subtotalInputs = document.querySelectorAll('.subtotal');
    subtotalInputs.forEach(function(input) {
        input.addEventListener('input', calcularTotalesGenerales);
    });

    // Llamar a calcular totales generales al cargar la página
    calcularTotalesGenerales();
});


    $(document).ready(function(){
        $('.remove-image').on('click', function(){
            var imageId = $(this).data('id');

            if (confirm('¿Estás seguro de que deseas eliminar esta imagen?')) {
                $.ajax({
                    url: '{{ route("eliminar.imagen") }}',  // Ruta hacia tu controlador que maneja la eliminación
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: imageId
                    },
                    success: function(response) {
                        alert('Imagen eliminada');
                        location.reload();  // Recargar la página para actualizar la vista
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);  // Manejo de errores
                    }
                });
            }
        });
    });
</script>

@endsection
