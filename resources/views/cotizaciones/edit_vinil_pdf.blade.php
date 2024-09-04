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
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="">Nombre</label>
                                                <select name="producto[]" class="form-select d-inline-block producto">
                                                    <option value="{{ $productos->id_servicios }}">{{ $productos->producto }}</option>
                                                    @foreach ($servicios as $product)
                                                        <option value="{{ $product->id }}" data-precio_normal="{{ $product->precio_normal }}">{{ $product->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            @if ($productos->cantidad == 0)
                                                <div class="form-group col-2">
                                                    <h5 for="name">Largo *</h5>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <img src="{{ asset('img/icon/impresora-3d.png') }}" alt="" width="15px">
                                                        </span>
                                                        <input type="number" name="largo[]" class="form-control d-inline-block largo" value="{{$productos->largo}}">
                                                    </div>
                                                </div>

                                                <div class="form-group col-2">
                                                    <h5 for="name">Ancho *</h5>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <img src="{{ asset('img/icon/cinta-metrica.wepb') }}" alt="" width="15px">
                                                        </span>
                                                        <input type="text" name="ancho[]" class="form-control d-inline-block ancho" value="{{$productos->ancho}}">
                                                    </div>
                                                </div>
                                            @else
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
                                            @endif

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

                                                            <div class="form-group col-4">
                                                                <h5 for="name">Foto 1</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/galeria-de-imagenes.webp') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="file" name="imagen[]" class="form-control imagen" value="0">
                                                                </div>
                                                                <img src="{{ asset('img/icon/pdf.webp') }}" alt="" width="40px">
                                                            </div>

                                                            <div class="form-group col-2">
                                                                <h5 for="name">M2</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/escala.png') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="number" name="m2[]" class="form-control m2" value="{{$productos->m2}}" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-2">
                                                                <h5 for="name">IVA</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/comisiones.webp') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="number" name="iva[]" class="form-control iva" value="{{$productos->iva}}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-2">
                                                                <h5 for="name">Total IVA</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/ingresos.webp') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="text" name="totalIva[]" class="form-control totalIva" value="{{$productos->total_iva}}" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="col-2"></div>

                                                            <div class="form-group col-2">
                                                                <h5 for="name">Precio m2</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/efectivo.webp') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="number" name="precio_cm[]" value="{{$productos->precio_cm}}" class="form-control precio_cm">
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-2">
                                                                <h5 for="name">Total Precio m2</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/bolsa-de-dinero.png') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="number" name="total_precio_cm[]" class="form-control total_precio_cm" value="{{$productos->total_precio_cm}}" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-2">
                                                                <h5 for="name">Instalacion</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="number" name="instalacion[]" class="form-control instalacion" value="{{$productos->instalacion}}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-2">
                                                                <h5 for="name">Total Instalacion</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="number" name="total_instalacion[]" class="form-control total_instalacion" value="{{$productos->total_instalacion}}" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-2">
                                                                <h5 for="name">Envio *</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input class="form-control envio" type="text" id="envio" name="envio" value="{{$cotizacion->envio}}">
                                                                </div>
                                                            </div>

                                                            <input class="form-control" type="hidden" id="cantidad" name="cantidad[]" value="0" >
                                                            <input class="form-control" type="hidden" id="dimenciones_cm" name="dimenciones_cm[]" value="0" >
                                                            <input class="form-control" type="hidden" id="material" name="material[]" value="0" >
                                                            <input class="form-control" type="hidden" id="utilidad" name="utilidad[]" value="0" >
                                                        </div>
                                                    </div>

                                                @else
                                                    <div class="card card-body mt-3" style="background-color: #ccc">

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
                                                                    <input type="number" name="precio_cm[]" class="form-control precio_cm" value="{{$productos->precio_cm}}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-lg-2 col-md-4 col-6">
                                                                <h5 class="label_text" for="name">Total Precio cm</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/bolsa-de-dinero.png') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="number" name="total_precio_cm[]" class="form-control total_precio_cm" value="{{$productos->total_precio_cm}}" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-lg-2 col-md-4 col-6">
                                                                <h5 class="label_text" for="name">Material y M.O.</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="number" name="material[]" class="form-control material" value="{{$productos->material}}" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-lg-2 col-md-4 col-6">
                                                                <h5 class="label_text" for="name">Utilidad</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="number" name="utilidad[]" class="form-control utilidad" value="{{$productos->utilidad}}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-lg-2 col-md-4 col-6">
                                                                <h5 class="label_text" for="name">Instalacion</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input class="form-control instalacion" type="number" id="instalacion" name="instalacion[]" value="{{$productos->instalacion}}">
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    @endforeach

                                    @if ($productos->cantidad != 0)


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

                                    @endif

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
    document.addEventListener('DOMContentLoaded', function () {
        const productos = @json($servicios_cotizacion);

        productos.forEach(producto => {
            const cantidadInput = document.getElementById(`cantidad_${producto.id}`);
            const descuentoInput = document.getElementById(`descuento_${producto.id}`);

            if (cantidadInput) {
                cantidadInput.addEventListener('input', () => updateSubtotalExistente(producto.id));
            }

            if (descuentoInput) {
                descuentoInput.addEventListener('input', () => updateSubtotalExistente(producto.id));
            }
        });

        function updateSubtotalExistente(id) {
            const cantidad = parseFloat(document.getElementById(`cantidad_${id}`).value) || 0;
            const descuento = parseFloat(document.getElementById(`descuento_${id}`).value) || 0;
            const precio_unitario = parseFloat(document.getElementById(`precio_unitario_${id}`).value) || 0;

            // Calcular el subtotal antes del descuento
            const subtotalSinDescuento = cantidad * precio_unitario;
            // Calcular el descuento en monto
            const descuentoMonto = (subtotalSinDescuento * descuento) / 100;
            // Calcular el subtotal final después del descuento
            const subtotalConDescuento = subtotalSinDescuento - descuentoMonto;

            document.getElementById(`subtotal_${id}`).value = `$${subtotalConDescuento.toFixed(2)}`;

            updateTotal();
        }

        function updateTotal() {
            let total = 0;

            // Sumar subtotales de productos existentes
            const subtotalesExistentes = document.querySelectorAll('.subtotal');
            subtotalesExistentes.forEach(subtotalElement => {
                const subtotalValue = parseFloat(subtotalElement.value.replace('$', '').replace(',', '')) || 0;
                total += subtotalValue;
            });

            // Sumar subtotales de nuevos productos
            const subtotalesNuevos = document.querySelectorAll('.subtotal2');
            subtotalesNuevos.forEach(subtotalElement => {
                const subtotalValue = parseFloat(subtotalElement.value.replace('$', '').replace(',', '')) || 0;
                total += subtotalValue;
            });

            document.getElementById('subtotal_final').value = `$${total.toFixed(2)}`;
            document.getElementById('total_final').value = `$${total.toFixed(2)}`;
        }
    });
</script>

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
            var utilidadInput = campo.querySelector('.utilidad');
            var subtotalInput = campo.querySelector('.subtotal');
            var instalacionInput = campo.querySelector('.instalacion');

            productoSelect.addEventListener('change', function() {
                var selectedOption = productoSelect.options[productoSelect.selectedIndex];
                var precioNormal = selectedOption.getAttribute('data-precio_normal');
                console.log('Producto seleccionado:', selectedOption.text);
                console.log('Precio normal:', precioNormal);
                precioCmInput.value = parseFloat(precioNormal) || 0;
                calcularTotal();
            });

            function calcularTotal() {
                var precioCm = parseFloat(precioCmInput.value) || 0;
                var dimenciones = parseFloat(dimencionesInput.value) || 0;
                var totalPrecioCm = precioCm * dimenciones;
                totalPrecioCmInput.value = totalPrecioCm.toFixed(2);

                var cantidad = parseFloat(cantidadInput.value) || 0;
                var materialTotal = totalPrecioCm * cantidad;
                materialInput.value = materialTotal.toFixed(2);

                var utilidad = parseFloat(utilidadInput.value) || 1;
                var subtotalTotal = materialTotal * utilidad;

                // Sumar instalación al subtotal
                var instalacion = parseFloat(instalacionInput.value) || 0;
                subtotalTotal += instalacion;

                subtotalInput.value = subtotalTotal.toFixed(2);

                // Actualizar total después de calcular subtotal
                actualizarTotal();
            }

            precioCmInput.addEventListener('input', calcularTotal);
            dimencionesInput.addEventListener('input', calcularTotal);
            cantidadInput.addEventListener('input', calcularTotal);
            utilidadInput.addEventListener('input', calcularTotal);
            instalacionInput.addEventListener('input', calcularTotal);
        }

        function actualizarTotal() {
            var subtotales = camposContainer.querySelectorAll('.campo .subtotal');
            var total = 0;

            subtotales.forEach(function(subtotalInput) {
                var subtotal = parseFloat(subtotalInput.value) || 0;
                total += subtotal;
            });

            // Agregar el valor de envío al total
            var envioInput = document.getElementById('envio');
            var envio = parseFloat(envioInput.value) || 0;
            total += envio;

            var totalInput = document.getElementById('total');
            totalInput.value = total.toFixed(2);

            // Calcular IVA general
            var ivaPorcentajeInput = document.getElementById('ivaPorcentaje');
            var ivaPorcentaje = parseFloat(ivaPorcentajeInput.value) || 0;
            var ivaTotal = (total * ivaPorcentaje) / 100;

            var ivaTotalInput = document.getElementById('ivaTotal');
            ivaTotalInput.value = ivaTotal.toFixed(2);

            var totalIvaInput = document.getElementById('totalIva');
            totalIvaInput.value = (total + ivaTotal).toFixed(2);
        }

        // Agregar eventos a los campos existentes al cargar la página
        agregarEventosCalculo(campoExistente);

        // Asegurarse de actualizar el total cuando se cambien los valores
        camposContainer.addEventListener('input', function(event) {
            if (event.target.classList.contains('subtotal')) {
                actualizarTotal();
            }
        });

        // Asegurarse de actualizar el total y el IVA cuando cambie el campo de envío o el porcentaje de IVA
        document.getElementById('envio').addEventListener('input', actualizarTotal);
        document.getElementById('ivaPorcentaje').addEventListener('input', actualizarTotal);

        // Calcular el total inicial con el IVA predeterminado
        actualizarTotal();
    });


    </script>

@endsection
