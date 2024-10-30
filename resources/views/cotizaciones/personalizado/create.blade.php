@extends('layouts.app')

@section('template_title')
    Cotizacion Personalizado
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
                        <form method="POST" action="{{ route('store_personalizado.cotizaciones') }}" enctype="multipart/form-data" role="form">
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

                                    <div class="form-group col-lg-4 col-md-4 col-4 ">
                                        <h5 class="label_text" for="name">Descripción *</h5>
                                        <div class="input-group mb-3">
                                            <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="3"></textarea>
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

                                    <div class="col-12 mt-5">
                                        <h2 style="color:#783E5D"><strong>Productos</strong> </h2>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="button" id="duplicateRow" class="btn btn-primary mb-3" style="border-radius: 9px;width: 36px;height: 40px;">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div id="rowContainer">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-8 col-8">
                                                <h5 class="label_text" for="">Nombre y Medidas *</h5>
                                                <div class="form-group">
                                                    <input id="producto[]" name="producto[]" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-2 col-md-4 col-6 ">
                                                <h5 class="label_text" for="name">Subtotal *</h5>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                                    </span>
                                                    <input type="text" name="subtotal[]" class="form-control d-inline-block subtotal">
                                                </div>
                                            </div>

                                            {{-- <div class="form-group col-lg-2 col-md-4 col-4 ">
                                                <h5 class="label_text" for="name">Cantidad *</h5>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <img src="{{ asset('img/icon/clic2.png') }}" alt="" width="15px">
                                                    </span>
                                                    <input type="number" name="cantidad[]" class="form-control d-inline-block cantidad" >
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <label for="envio_externo">¿Envió Externo?</label>
                                        <input type="checkbox" id="envio_externo" name="envio_externo" value="1">
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <label for="instalacion_aparte">¿Separar instalacion?</label>
                                        <input type="checkbox" id="instalacion_aparte" name="instalacion_aparte" value="1">
                                    </div>

                                    {{-- <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text" for="name"># Producto *</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                            </span>
                                            <input class="form-control" type="text" id="cantidad_letreros" name="cantidad_letreros" value="1" >
                                        </div>
                                    </div> --}}

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


                                    <div id="mensaje_envio" class="form-group  col-lg-6 col-md-6 col-12 " style="display:none;">
                                        <label for="mensaje">Mensaje de Envío</label>
                                        <textarea class="form-control" id="mensaje_envio" name="mensaje_envio" rows="4" placeholder="Escribe tu mensaje...">Incluye entrega en area metropolitana</textarea>
                                    </div>

                                    <div id="mensaje_instalacion" class="form-group  col-lg-6 col-md-6 col-12 " style="display:none;">
                                        <label for="mensaje">Mensaje de Instalacion</label>
                                        <textarea class="form-control" id="2" name="mensaje_instalacion" rows="4" placeholder="Escribe tu mensaje...">Instalación en área metropolitana no mayor
                                            a 3 mts de altura.</textarea>
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
        // Función para actualizar el total y calcular el IVA
        function updateTotal() {
            let utilidad = parseFloat($('#utilidad').val()) || 1;
            let utilidadFijo = parseFloat($('#utilidad_fijo').val()) || 0;
            let envio = parseFloat($('#envio').val()) || 0;
            let instalacion = parseFloat($('#instalacion').val()) || 0;
            let ivaPorcentaje = parseFloat($('#ivaPorcentaje').val()) || 0;
            let total = 0;

            // Calcular el total con utilidad y utilidad fija
            $('.subtotal').each(function() {
                let subtotalValue = parseFloat($(this).val()) || 0;
                total += (subtotalValue * utilidad) + utilidadFijo;
            });

            // Agregar los valores de envío e instalación
            total += envio + instalacion;

            // Mostrar el total en el campo de total
            $('#total').val(total.toFixed(2));

            // Calcular el IVA total
            let ivaTotal = total * (ivaPorcentaje / 100);
            $('#ivaTotal').val(ivaTotal.toFixed(2));

            // Calcular el total con IVA
            let totalConIva = total + ivaTotal;
            $('#totalIva').val(totalConIva.toFixed(2));
        }

        // Evento cuando cambia el valor de subtotal, utilidad, utilidad_fijo, envío, instalación o IVA
        $(document).on('input', '.subtotal, #utilidad, #utilidad_fijo, #envio, #instalacion, #ivaPorcentaje', function() {
            updateTotal();
        });

        // Botón para duplicar la fila
        $('#duplicateRow').click(function() {
            let newRow = $('#rowContainer .row:first').clone();
            newRow.find('input').val('');
            newRow.find('textarea').val('');
            $('#rowContainer').append(newRow);
        });
    });
</script>

@endsection
