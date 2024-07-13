@extends('layouts.app')

@section('template_title')
    Cotizacion Cosmica
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/admin/vendor/select2/dist/css/select2.min.css')}}">
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
                        <form method="POST" action="{{ route('store.cotizaciones') }}" enctype="multipart/form-data" role="form">
                            @csrf
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

                                    <div class="col-12 mt-5">
                                        <h2 style="color:#783E5D"><strong>Seleciona los productos</strong> </h2>
                                    </div>

                                    @foreach ($servicios_cotizacion as $servicio_cotizacion)
                                        <div class="col-11">
                                            <div class="form-group">
                                                <div id="camposContainer">
                                                    <div class="campo mt-3">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <h5 for="">Producto</h5>
                                                                <div class="form-group">
                                                                    <select name="campo[]" class="form-select d-inline-block producto">
                                                                        <option value="{{$servicio_cotizacion->id_servicios}}">{{$servicio_cotizacion->Servicio->nombre}}</option>
                                                                        @foreach ($servicios as $product)
                                                                        <option value="{{ $product->id }}" data-precio_normal="{{ $product->precio_normal }}">{{ $product->nombre }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-2">
                                                                <h5 for="name">Cantidad *</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/clic2.png') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="number" name="campo3[]" class="form-control d-inline-block cantidad" value="{{$servicio_cotizacion->cantidad}}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-2">
                                                                <h5 for="name">Dimencion *</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/impresora-3d.png') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="text" name="campo5[]" class="form-control d-inline-block dimenciones" value="{{$servicio_cotizacion->dimenciones}}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-2">
                                                                <h5 for="name">Desc. (%)</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/descuento.png') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="number" name="descuento_prod[]" class="form-control d-inline-block descuento_prod" value="{{$servicio_cotizacion->descuento}}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-2">
                                                                <h5 for="name">Subtotal *</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="text" name="campo4[]" class="form-control d-inline-block " value="{{$servicio_cotizacion->total}}">
                                                                </div>
                                                            </div>



                                                            <div class="form-group col-2">
                                                                <div class="input-group mb-3">
                                                                    <button type="button" class="btn btn-danger btn-sm eliminarCampo"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="col-2">
                                        <div class="form-group">
                                            <button class="mt-5" type="button" id="agregarCampo" style="border-radius: 9px;width: 36px;height: 40px;">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-11">
                                        <div class="form-group">
                                            <div id="camposContainer">
                                                <div class="campo mt-3">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h5 for="">Producto</h5>
                                                            <div class="form-group">
                                                                <select name="campo[]" class="form-select d-inline-block producto">
                                                                    <option value="">Seleccione products</option>
                                                                    @foreach ($servicios as $product)
                                                                    <option value="{{ $product->id }}" data-precio_normal="{{ $product->precio_normal }}">{{ $product->nombre }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-2">
                                                            <h5 for="name">Cantidad *</h5>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    <img src="{{ asset('img/icon/clic2.png') }}" alt="" width="15px">
                                                                </span>
                                                                <input type="number" name="campo3[]" class="form-control d-inline-block cantidad" >
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-2">
                                                            <h5 for="name">Dimencion *</h5>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    <img src="{{ asset('img/icon/impresora-3d.png') }}" alt="" width="15px">
                                                                </span>
                                                                <input type="text" name="campo5[]" class="form-control d-inline-block dimenciones" >
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-2">
                                                            <h5 for="name">Desc. (%)</h5>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    <img src="{{ asset('img/icon/descuento.png') }}" alt="" width="15px">
                                                                </span>
                                                                <input type="number" name="descuento_prod[]" class="form-control d-inline-block descuento_prod" value="0">
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-2">
                                                            <h5 for="name">Subtotal *</h5>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                                                </span>
                                                                <input type="text" name="campo4[]" class="form-control d-inline-block subtotal" >
                                                            </div>
                                                        </div>



                                                        <div class="form-group col-2">
                                                            <div class="input-group mb-3">
                                                                <button type="button" class="btn btn-danger btn-sm eliminarCampo"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-2 mb-3">
                                        <h2 style="color:#783E5D"><strong>Pago</strong> </h2>
                                    </div>

                                    <div class="form-group col-4">
                                        <h5 for="name">Envio *</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                            </span>
                                            <input class="form-control total" type="text" id="envio" name="envio" value="{{$cotizacion->envio}}" >
                                        </div>
                                    </div>


                                    <div class="col-4 ">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="toggleFactura" name="factura" value="1">
                                            <h5 class="form-check-h5" for="flexCheckDefault">
                                                <p class="" style="display: inline-block;font-size: 20px;padding: 5px;color: #3b8b00;">Si</p> <strong> (¿Factura?)</strong>
                                            </h5>
                                        </div>
                                    </div>

                                    <div class="form-group col-4">
                                        <h5 for="name">Subtotal *</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                            </span>
                                            <input class="form-control total" type="text"  value="{{$cotizacion->subtotal}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-4">
                                        <h5 for="name">Descuento</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/descuento.png') }}" alt="" width="15px">
                                            </span>
                                            <input class="form-control" type="number" id="descuento" name="descuento" value="{{$cotizacion->descuento}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-4">
                                        <h5 for="name">Total</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/bolsa-de-dinero.png') }}" alt="" width="15px">
                                            </span>
                                            <input class="form-control" type="text"  value="{{$cotizacion->total}}" readonly>
                                        </div>
                                    </div>


                                    <div class="form-group col-4">
                                        <h5 for="name">Fecha</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/calendario.png') }}" alt="" width="15px">
                                            </span>
                                            <input class="form-control" type="date" id="totalDescuento" name="fecha" value="{{$cotizacion->fecha}}">
                                        </div>
                                    </div>

                                    <div id="divFactura" style="display: none;">
                                        <div class="row">
                                            <h2 style="color: #783E5D">Factura</h2>

                                            <div class="form-group col-4">
                                                <h5 for="name">Situacion Fiscal</h5>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <img src="{{ asset('img/icon/picture.png') }}" alt="" width="15px">
                                                    </span>
                                                    <input class="form-control" type="file" id="situacion_fiscal" name="situacion_fiscal" value="{{$cotizacion->situacion_fiscal}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-4">
                                                <h5 for="name">Nombre / Razon Social</h5>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <img src="{{ asset('img/icon/firma-digital.png') }}" alt="" width="15px">
                                                    </span>
                                                    <input class="form-control" type="text" id="razon_social" name="razon_social" value="{{$cotizacion->razon_social}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-4">
                                                <h5 for="name">RFC</h5>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <img src="{{ asset('img/icon/carta.png') }}" alt="" width="15px">
                                                    </span>
                                                    <input class="form-control" type="text" id="rfc" name="rfc" value="{{$cotizacion->rfc}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-4">
                                                <h5 for="name">CFDI</h5>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <img src="{{ asset('img/icon/monetary-policy.png') }}" alt="" width="15px">
                                                    </span>
                                                    <select class="form-select" name="cfdi" id="cfdi">
                                                        <option value="{{$cotizacion->cfdi}}">{{$cotizacion->cfdi}}</option>
                                                        <option value="G01 Adquisicion de Mercancias">G01 Adquisicion de Mercancias</option>
                                                        <option value="G02 Devoluciones, Descuentos o Bonificaciones">G02 Devoluciones, Descuentos o Bonificaciones</option>
                                                        <option value="G03 Gastos en General">G03 Gastos en General</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-4">
                                                <h5 for="name">Correo</h5>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <img src="{{ asset('img/icon/email.png') }}" alt="" width="15px">
                                                    </span>
                                                    <input class="form-control" type="text" id="correo_fac" name="correo_fac" value="{{$cotizacion->correo_fac}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-4">
                                                <h5 for="name">Telefono</h5>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <img src="{{ asset('img/icon/complain.png') }}" alt="" width="15px">
                                                    </span>
                                                    <input class="form-control" type="number" id="telefono_fac" name="telefono_fac" value="{{$cotizacion->telefono_fac}}">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <h5 for="name">Direccion de Factura</h5>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <img src="{{ asset('img/icon/cp.png') }}" alt="" width="15px">
                                                    </span>
                                                    <input class="form-control" type="text" id="direccion_fac" name="direccion_fac" value="{{$cotizacion->direccion_fac}}">
                                                </div>
                                            </div>

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
        var agregarCampoBtn = document.getElementById('agregarCampo');
        var camposContainer = document.getElementById('camposContainer');
        var campoExistente = camposContainer.querySelector('.campo');

        campoExistente.querySelector('.cantidad').value = '';

        var totalInput = document.getElementById('total');
        var descuentoInput = document.getElementById('descuento');
        var totalDescuentoInput = document.getElementById('totalDescuento');
        var envioInput = document.getElementById('envio');

        $(document).ready(function() {
            $('.producto').select2();

            function asociarEventosCampos(cantidadInput, descuentoInput, productoInput) {
                cantidadInput.addEventListener('input', function() {
                    actualizarSubtotal();
                });

                cantidadInput.addEventListener('blur', function() {
                    actualizarSubtotal();
                });

                descuentoInput.addEventListener('input', function() {
                    actualizarSubtotal();
                });

                productoInput.addEventListener('change', function () {
                    actualizarSubtotal();
                });
            }

            function eliminarCampo(campo) {
                campo.remove();
                actualizarSubtotal();
            }

            var cantidadOriginal = document.querySelector('.campo .cantidad');
            var descuentoOriginal = document.querySelector('.campo .descuento_prod');
            var productoOriginal = document.querySelector('.campo .producto');
            asociarEventosCampos(cantidadOriginal, descuentoOriginal, productoOriginal);

            agregarCampoBtn.addEventListener('click', function() {
                var nuevoCampo = campoExistente.cloneNode(true);
                camposContainer.appendChild(nuevoCampo);

                nuevoCampo.querySelector('.producto').value = '';
                nuevoCampo.querySelector('.cantidad').value = '';
                nuevoCampo.querySelector('.descuento_prod').value = '0';
                nuevoCampo.querySelector('.subtotal').value = '0.00';

                nuevoCampo.querySelector('.producto').addEventListener('change', function () {
                    actualizarSubtotal();
                });

                var cantidadInput = nuevoCampo.querySelector('.cantidad');
                var descuentoInput = nuevoCampo.querySelector('.descuento_prod');
                var productoInput = nuevoCampo.querySelector('.producto');

                asociarEventosCampos(cantidadInput, descuentoInput, productoInput);

                $(nuevoCampo).find('.producto').removeClass('select2-hidden-accessible').next().remove();
                $(nuevoCampo).find('.producto').select2();

                var eliminarCampoBtn = nuevoCampo.querySelector('.eliminarCampo');
                eliminarCampoBtn.addEventListener('click', function() {
                    eliminarCampo(nuevoCampo);
                });

                actualizarSubtotal();
            });

            var eliminarCampoBtnOriginal = document.querySelector('.campo .eliminarCampo');
            eliminarCampoBtnOriginal.addEventListener('click', function() {
                eliminarCampo(document.querySelector('.campo'));
            });

        });

        camposContainer.addEventListener('change', function(event) {
            if (event.target.classList.contains('producto') || event.target.classList.contains('cantidad')) {
                actualizarSubtotal();
            }
        });

        function actualizarSubtotal() {
            var camposProductos = camposContainer.querySelectorAll('.campo .producto');
            var camposCantidades = camposContainer.querySelectorAll('.campo .cantidad');
            var camposDescuentos = camposContainer.querySelectorAll('.campo .descuento_prod');
            var subtotales = camposContainer.querySelectorAll('.campo .subtotal');

            var total = 0;

            for (var i = 0; i < camposProductos.length; i++) {
                var producto = camposProductos[i];
                var cantidad = camposCantidades[i];
                var descuento = camposDescuentos[i];
                var subtotal = subtotales[i];

                var precio = parseFloat(producto.options[producto.selectedIndex].getAttribute('data-precio_normal'));
                var cantidadValor = parseInt(cantidad.value);
                var descuentoValor = parseFloat(descuento.value);

                var subtotalValor = isNaN(precio) || isNaN(cantidadValor) ? 0 : precio * cantidadValor;

                var subtotalConDescuento = subtotalValor - (subtotalValor * (descuentoValor / 100));
                subtotal.value = subtotalConDescuento.toFixed(2);

                total += subtotalConDescuento;
            }

            totalInput.value = total.toFixed(2);

            var descuentoTotal = parseFloat(descuentoInput.value);
            var totalDescuento = total - (total * (descuentoTotal / 100));
            totalDescuentoInput.value = totalDescuento.toFixed(2);

            var costoEnvio = parseFloat(envioInput.value) || 0;
            var totalConEnvio = totalDescuento + costoEnvio;

            var toggleFactura = document.getElementById('toggleFactura');
            if (toggleFactura.checked) {
                totalConEnvio *= 1.16;
            }

            totalDescuentoInput.value = totalConEnvio.toFixed(2);
        }

        envioInput.addEventListener('input', actualizarSubtotal);
        document.getElementById('toggleFactura').addEventListener('change', actualizarSubtotal);
        actualizarSubtotal();

        descuentoInput.addEventListener('keyup', function() {
            var descuento = parseFloat(descuentoInput.value);
            var total = parseFloat(totalInput.value);
            var totalDescuento = total - (total * (descuento / 100));
            totalDescuentoInput.value = totalDescuento.toFixed(2);
        });
    });

    $(document).ready(function () {
        $('#toggleSwitch').change(function () {
            $('#divToToggle').toggle();
        });

        $('#toggleFactura').change(function () {
            $('#divFactura').toggle();
        });
    });
</script>

@endsection
