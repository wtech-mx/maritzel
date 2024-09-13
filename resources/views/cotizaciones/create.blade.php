@extends('layouts.app')

@section('template_title')
    Cotizacion Letras
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
                                                    <label class="label_text" class="label_text" for="name">Cliente *</label>
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
                                                    <label class="label_text" class="label_text" for="name">Subcliente *</label>
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
                                                        <label class="label_text" class="label_text" for="name">Nombre completo *</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <img src="{{ asset('assets/icons/cliente.png') }}" alt="" width="29px">
                                                            </span>
                                                            <input  id="nombre_cliente" name="nombre_cliente" type="text" class="form-control" placeholder="Nombre(s) y Apellidos">
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <label class="label_text" class="label_text" for="name">Telefono *</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <img src="{{ asset('assets/icons/phone.png') }}" alt="" width="29px">
                                                            </span>
                                                            <input  id="telefono_cliente" name="telefono_cliente" class="form-control" type="tel" minlength="10" maxlength="10" placeholder="555555555">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <label class="label_text" class="label_text" for="name">Correo</label>
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
                                        <h5 class="label_text" for="name">Fecha</h5>
                                        <div class="input-group ">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/calendario.png') }}" alt="" width="15px">
                                            </span>
                                            <input class="form-control" type="date" id="fecha" name="fecha" value="{{date('Y-m-d')}}">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <label class="label_text" class="label_text" for="name">Nombre y Medidas *</label>
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
                                            <button class="mt-5" type="button" id="agregarCampo" style="border-radius: 9px;width: 36px;height: 40px;">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
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

                                                        <div class="form-group col-lg-2 col-md-4 col-4 ">
                                                            <h5 class="label_text" for="name">Cantidad *</h5>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    <img src="{{ asset('img/icon/clic2.png') }}" alt="" width="15px">
                                                                </span>
                                                                <input type="number" name="cantidad[]" class="form-control d-inline-block cantidad" >
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-lg-2 col-md-4 col-6 ">
                                                            <h5 class="label_text" for="name">Dimencion *</h5>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    <img src="{{ asset('img/icon/impresora-3d.png') }}" alt="" width="15px">
                                                                </span>
                                                                <input type="text" name="dimenciones[]" class="form-control d-inline-block dimenciones" >
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-lg-2 col-md-4 col-6 ">
                                                            <h5 class="label_text" for="name">Subtotal *</h5>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                                                </span>
                                                                <input type="text" name="subtotal[]" class="form-control d-inline-block subtotal" readonly>
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
                                                                        <h5 class="label_text" for="name">Foto</h5>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text" id="basic-addon1">
                                                                                <img src="{{ asset('img/icon/galeria-de-imagenes.webp') }}" alt="" width="15px">
                                                                            </span>
                                                                            <input type="file" name="imagen[]" class="form-control imagen" value="0">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                                                        <h5 class="label_text" for="name">Precio cm</h5>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text" id="basic-addon1">
                                                                                <img src="{{ asset('img/icon/efectivo.webp') }}" alt="" width="15px">
                                                                            </span>
                                                                            <input type="number" name="precio_cm[]" class="form-control precio_cm">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                                                        <h5 class="label_text" for="name">Total Precio cm</h5>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text" id="basic-addon1">
                                                                                <img src="{{ asset('img/icon/bolsa-de-dinero.png') }}" alt="" width="15px">
                                                                            </span>
                                                                            <input type="number" name="total_precio_cm[]" class="form-control total_precio_cm" value="0" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                                                        <h5 class="label_text" for="name">Material y M.O.</h5>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text" id="basic-addon1">
                                                                                <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                                                            </span>
                                                                            <input type="number" name="material[]" class="form-control material" value="0" readonly>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text" for="name">Envio *</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                            </span>
                                            <input class="form-control envio" type="text" id="envio" name="envio" value="0" >
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text" for="name">Instalacion</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                            </span>
                                            <input class="form-control instalacion" type="number" id="instalacion" name="instalacion" value="0">
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text" for="name">Utilidad %</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                            </span>
                                            <input type="number" name="utilidad" id="utilidad" class="form-control utilidad" value="1.75">
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text" for="name">Utilidad $</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                            </span>
                                            <input type="number" name="utilidad_fijo"  id="utilidad_fijo" class="form-control utilidad_fijo" value="0">
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text" for="name">Total</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                            </span>
                                            <input type="text" id="total" name="total" class="form-control d-inline-block" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text" for="name">IVA %</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                            </span>
                                            <input type="number" id="ivaPorcentaje" name="ivaPorcentaje" class="form-control" value="16">
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text" for="name">IVA</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                            </span>
                                            <input id="ivaTotal" name="ivaTotal" type="text" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6 ">
                                        <h5 class="label_text" for="name">Total IVA*</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                            </span>
                                            <input id="totalIva" name="totalIva" class="form-control" type="text" readonly>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5 class="label_text" for="name">Comentario/nota</h5>
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
document.addEventListener('DOMContentLoaded', function() {
    var agregarCampoBtn = document.getElementById('agregarCampo');
    var camposContainer = document.getElementById('camposContainer');
    var campoExistente = camposContainer.querySelector('.campo');

    var campoIndex = 1;

    agregarCampoBtn.addEventListener('click', function() {
        var nuevoCampo = campoExistente.cloneNode(true);
        var collapseId = 'collapseExtraFields' + campoIndex;
        var collapseButton = nuevoCampo.querySelector('.toggle-collapse');

        collapseButton.setAttribute('data-bs-target', '#' + collapseId);
        collapseButton.setAttribute('aria-controls', collapseId);
        nuevoCampo.querySelector('.collapse').id = collapseId;

        // Limpiar los valores de los campos en el nuevo campo
        var inputs = nuevoCampo.querySelectorAll('input');
        inputs.forEach(function(input) {
            input.value = '';
        });

        // Limpiar el select
        var select = nuevoCampo.querySelector('.producto');
        select.value = '';
        $(select).trigger('change'); // Actualiza el select2

        camposContainer.appendChild(nuevoCampo);

        campoIndex++;

        agregarEventosCalculo(nuevoCampo);
    });

    function agregarEventosCalculo(campo) {
        var productoSelect = campo.querySelector('.producto');
        var precioCmInput = campo.querySelector('.precio_cm');
        var dimencionesInput = campo.querySelector('.dimenciones');
        var totalPrecioCmInput = campo.querySelector('.total_precio_cm');
        var cantidadInput = campo.querySelector('.cantidad');
        var materialInput = campo.querySelector('.material');
        var subtotalInput = campo.querySelector('.subtotal');

        // Referencias a los inputs globales
        var utilidadInput = document.getElementById('utilidad');
        var utilidadFijoInput = document.getElementById('utilidad_fijo');
        var instalacionInputGlobal = document.getElementById('instalacion');

        productoSelect.addEventListener('change', function() {
            var selectedOption = productoSelect.options[productoSelect.selectedIndex];
            var precioNormal = selectedOption.getAttribute('data-precio_normal');
            precioCmInput.value = parseFloat(precioNormal) || 0;
            calcularTotal();
        });

        function calcularTotal() {
            var precioCm = parseFloat(precioCmInput.value) || 0;
            var dimenciones = parseFloat(dimencionesInput.value) || 0;
            var cantidad = parseFloat(cantidadInput.value) || 0;
            var utilidadPorcentaje = parseFloat(utilidadInput.value) || 0;
            var utilidadFijo = parseFloat(utilidadFijoInput.value) || 0;
            var instalacionGlobal = parseFloat(instalacionInputGlobal.value) || 0;

            // Cálculos para cada producto
            var totalPrecioCm = precioCm * dimenciones;
            totalPrecioCmInput.value = totalPrecioCm.toFixed(2);

            var material = totalPrecioCm * cantidad;
            materialInput.value = material.toFixed(2);

            var subtotal = material * (1 + utilidadPorcentaje / 100) + utilidadFijo;
            subtotalInput.value = subtotal.toFixed(2);

            calcularTotalesGenerales();
        }

        function calcularTotalesGenerales() {
            var total = 0;
            var totalIva = 0;
            var ivaPorcentaje = parseFloat(document.getElementById('ivaPorcentaje').value) || 0;
            var instalacionGlobal = parseFloat(instalacionInputGlobal.value) || 0;
            var utilidadPorcentaje = parseFloat(utilidadInput.value) || 0;
            var utilidadFijo = parseFloat(utilidadFijoInput.value) || 0;

            var subtotales = document.querySelectorAll('.subtotal');
            subtotales.forEach(function(input) {
                total += parseFloat(input.value) || 0;
            });

            // Aplicar instalación y utilidad
            total += instalacionGlobal;
            total *= (1 + utilidadPorcentaje / 100); // Aplicar el porcentaje de utilidad
            total += utilidadFijo; // Sumar el valor fijo de utilidad

            totalIva = total * (1 + ivaPorcentaje / 100);

            document.getElementById('total').value = total.toFixed(2);
            document.getElementById('ivaTotal').value = (total * ivaPorcentaje / 100).toFixed(2);
            document.getElementById('totalIva').value = totalIva.toFixed(2);
        }

        // Eventos para recalcular en caso de cambios
        precioCmInput.addEventListener('input', calcularTotal);
        dimencionesInput.addEventListener('input', calcularTotal);
        cantidadInput.addEventListener('input', calcularTotal);
        utilidadInput.addEventListener('input', calcularTotalesGenerales);
        utilidadFijoInput.addEventListener('input', calcularTotalesGenerales);
        instalacionInputGlobal.addEventListener('input', calcularTotalesGenerales);
    }

    agregarEventosCalculo(campoExistente);
});

</script>

@endsection
