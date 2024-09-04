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

                                    <div class="col-12 mt-5">
                                        <h2 style="color:#783E5D"><strong>Servicio</strong> </h2>
                                    </div>

                                    @foreach ($servicios_cotizacion as $productos)
                                    <div class="row campo">
                                        <div class="col-3">
                                            <label for="">Nombre</label>
                                            <select name="producto[]" class="form-select d-inline-block producto">
                                                <option value="{{ $productos->id_servicios }}">{{ $productos->producto }}</option>
                                                @foreach ($servicios as $product)
                                                    <option value="{{ $product->id }}" data-precio_normal="{{ $product->precio_normal }}">{{ $product->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-2">
                                            <h5 for="name">Cantidad *</h5>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <img src="{{ asset('img/icon/clic2.png') }}" alt="" width="15px">
                                                </span>
                                                <input type="number" id="cantidad_{{ $productos->id }}" name="cantidad[]" class="form-control d-inline-block cantidad" value="{{$productos->cantidad}}">
                                            </div>
                                        </div>

                                        <div class="form-group col-2">
                                            <h5 for="name">Dimencion *</h5>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <img src="{{ asset('img/icon/impresora-3d.png') }}" alt="" width="15px">
                                                </span>
                                                <input type="text" name="dimenciones[]" class="form-control d-inline-block dimenciones" value="{{$productos->dimenciones_cm}}">
                                            </div>
                                        </div>

                                        <div class="form-group col-2">
                                            <h5 for="name">Subtotal *</h5>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                                </span>
                                                <input type="text" name="subtotal[]" class="form-control d-inline-block subtotal" value="{{$productos->total}}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary mt-2 btn-sm toggle-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExtraFields0_{{ $productos->id }}" aria-expanded="false" aria-controls="collapseExtraFields0_{{ $productos->id }}">
                                                Más Opciones
                                            </button>
                                        </div>

                                        <div class="collapse" id="collapseExtraFields0_{{ $productos->id }}">
                                            @if ($productos->cantidad == 0)
                                                <div class="card card-body mt-3">
                                                    <div class="row"  style="background-color: #ccc">
                                                        <!-- Extra fields when quantity is 0 -->
                                                    </div>
                                                </div>
                                            @else
                                                <div class="card card-body mt-3" style="background-color: #ccc">
                                                    <div class="row">
                                                        <!-- Extra fields when quantity is not 0 -->
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach


                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text" for="name">Envio *</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                            </span>
                                            <input class="form-control envio" type="text" id="envio" name="envio" value="{{$cotizacion->envio}}" >
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text" for="name">Total</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                            </span>
                                            <input type="text" id="total" name="total" class="form-control d-inline-block" value="{{$cotizacion->subtotal }}" >
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
                                            <input id="ivaTotal" name="ivaTotal" type="text" class="form-control" value="{{$cotizacion->iva_total}}">
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6 ">
                                        <h5 class="label_text" for="name">Total IVA*</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                            </span>
                                            <input id="totalIva" name="totalIva" class="form-control" type="text" value="{{$cotizacion->total }}">
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5 for="name">Comentario/nota</h5>
                                            <textarea class="form-control" name="nota" id="nota" cols="30" rows="3">{{$cotizacion->nota}}</textarea>
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
    function agregarEventosCalculo(contenedor) {
        var cantidadInput = contenedor.querySelector('.cantidad');
        var precioUnitarioInput = contenedor.querySelector('.precio-unitario');
        var subtotalInput = contenedor.querySelector('.subtotal');

        function calcularSubtotal() {
            var cantidad = parseFloat(cantidadInput.value) || 0;
            var precioUnitario = parseFloat(precioUnitarioInput.value) || 0;
            var subtotal = cantidad * precioUnitario;
            subtotalInput.value = subtotal.toFixed(2);
            actualizarTotal();
        }

        cantidadInput.addEventListener('input', calcularSubtotal);
        precioUnitarioInput.addEventListener('input', calcularSubtotal);
    }

    function actualizarTotal() {
        var total = 0;
        var subtotales = document.querySelectorAll('.subtotal');
        subtotales.forEach(function(subtotal) {
            total += parseFloat(subtotal.value) || 0;
        });

        document.getElementById('totalCotizacion').value = total.toFixed(2);
    }

    // Añadir eventos de cálculo a los contenedores existentes
    var contenedoresExistentes = document.querySelectorAll('.contenedor-campo');
    contenedoresExistentes.forEach(function(contenedor) {
        agregarEventosCalculo(contenedor);
    });
});

</script>

@endsection
