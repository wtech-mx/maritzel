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
                                                        <option value="">Seleccionar cliente</option>
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

                                    <div class="col-1">
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
                                                                <select name="producto[]" class="form-select d-inline-block producto">
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
                                                                <input type="number" name="cantidad[]" class="form-control d-inline-block cantidad" >
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-2">
                                                            <h5 for="name">Dimencion *</h5>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    <img src="{{ asset('img/icon/impresora-3d.png') }}" alt="" width="15px">
                                                                </span>
                                                                <input type="text" name="dimenciones[]" class="form-control d-inline-block dimenciones" >
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-2">
                                                            <h5 for="name">Subtotal *</h5>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                                                </span>
                                                                <input type="text" name="subtotal[]" class="form-control d-inline-block subtotal" >
                                                            </div>
                                                        </div>

                                                        {{-- <div class="form-group col-2">
                                                            <div class="input-group mb-3">
                                                                <button type="button" class="btn btn-danger btn-sm eliminarCampo"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                            </div>
                                                        </div> --}}

                                                        <div class="col-12">
                                                            <button class="btn btn-primary mt-2 toggle-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExtraFields0" aria-expanded="false" aria-controls="collapseExtraFields0">
                                                                Más Opciones
                                                            </button>
                                                        </div>

                                                        <div class="collapse" id="collapseExtraFields0">
                                                            <div class="card card-body mt-3">
                                                                <div class="row">

                                                                    <div class="form-group col-2">
                                                                        <h5 for="name">Precio cm/m2</h5>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text" id="basic-addon1">
                                                                                <img src="{{ asset('img/icon/efectivo.webp') }}" alt="" width="15px">
                                                                            </span>
                                                                            <input type="number" name="precio_cm[]" class="form-control precio_cm">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-2">
                                                                        <h5 for="name">Total Precio cm/m2</h5>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text" id="basic-addon1">
                                                                                <img src="{{ asset('img/icon/bolsa-de-dinero.png') }}" alt="" width="15px">
                                                                            </span>
                                                                            <input type="number" name="total_precio_cm[]" class="form-control total_precio_cm" value="0" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-2">
                                                                        <h5 for="name">Material y M.O.</h5>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text" id="basic-addon1">
                                                                                <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                                                            </span>
                                                                            <input type="number" name="material[]" class="form-control material" value="0" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-2">
                                                                        <h5 for="name">Utilidad</h5>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text" id="basic-addon1">
                                                                                <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                                                            </span>
                                                                            <input type="number" name="utilidad[]" class="form-control utilidad" value="1.75">
                                                                        </div>
                                                                    </div>

                                                                    {{-- <div class="form-group col-2">
                                                                        <h5 for="name">Desc. (%)</h5>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text" id="basic-addon1">
                                                                                <img src="{{ asset('img/icon/descuento.png') }}" alt="" width="15px">
                                                                            </span>
                                                                            <input type="number" name="descuento_prod[]" class="form-control d-inline-block descuento_prod" value="0">
                                                                        </div>
                                                                    </div> --}}
                                                                </div>
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
                                            <input class="form-control envio" type="text" id="envio" name="envio" value="0" >
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
                                        <h5 for="name">Descuento</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/descuento.png') }}" alt="" width="15px">
                                            </span>
                                            <input class="form-control" type="number" id="descuento" name="descuento" value="0">
                                        </div>
                                    </div>

                                    <div class="form-group col-4">
                                        <h5 for="name">Subtotal *</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                            </span>
                                            <input class="form-control total" type="text" id="total" name="total" value="0" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-4">
                                        <h5 for="name">Total</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/bolsa-de-dinero.png') }}" alt="" width="15px">
                                            </span>
                                            <input class="form-control" type="text" id="totalDescuento" name="totalDescuento" readonly>
                                        </div>
                                    </div>


                                    <div class="form-group col-4">
                                        <h5 for="name">Fecha</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/calendario.png') }}" alt="" width="15px">
                                            </span>
                                            <input class="form-control" type="date" id="totalDescuento" name="fecha" value="{{date('Y-m-d')}}">
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
                                                    <input class="form-control" type="file" id="situacion_fiscal" name="situacion_fiscal">
                                                </div>
                                            </div>

                                            <div class="form-group col-4">
                                                <h5 for="name">Nombre / Razon Social</h5>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <img src="{{ asset('img/icon/firma-digital.png') }}" alt="" width="15px">
                                                    </span>
                                                    <input class="form-control" type="text" id="razon_social" name="razon_social">
                                                </div>
                                            </div>

                                            <div class="form-group col-4">
                                                <h5 for="name">RFC</h5>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <img src="{{ asset('img/icon/carta.png') }}" alt="" width="15px">
                                                    </span>
                                                    <input class="form-control" type="text" id="rfc" name="rfc">
                                                </div>
                                            </div>

                                            <div class="form-group col-4">
                                                <h5 for="name">CFDI</h5>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <img src="{{ asset('img/icon/monetary-policy.png') }}" alt="" width="15px">
                                                    </span>
                                                    <select class="form-select" name="cfdi" id="cfdi">
                                                        <option value="">Seleccione CFDI</option>
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
                                                    <input class="form-control" type="email" id="correo_fac" name="correo_fac">
                                                </div>
                                            </div>

                                            <div class="form-group col-4">
                                                <h5 for="name">Telefono</h5>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <img src="{{ asset('img/icon/complain.png') }}" alt="" width="15px">
                                                    </span>
                                                    <input class="form-control" type="number" id="telefono_fac" name="telefono_fac">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <h5 for="name">Direccion de Factura</h5>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <img src="{{ asset('img/icon/cp.png') }}" alt="" width="15px">
                                                    </span>
                                                    <input class="form-control" type="text" id="direccion_fac" name="direccion_fac">
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5 for="name">Comentario/nota</h5>
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

        $(document).ready(function() {
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
                    subtotalInput.value = subtotalTotal.toFixed(2);

                    // Actualizar total después de calcular subtotal
                    actualizarTotal();
                }

                precioCmInput.addEventListener('input', calcularTotal);
                dimencionesInput.addEventListener('input', calcularTotal);
                cantidadInput.addEventListener('input', calcularTotal);
                utilidadInput.addEventListener('input', calcularTotal);
            }

            function actualizarTotal() {
                var subtotales = camposContainer.querySelectorAll('.campo .subtotal');
                var total = 0;

                subtotales.forEach(function(subtotalInput) {
                    var subtotal = parseFloat(subtotalInput.value) || 0;
                    total += subtotal;
                });

                var totalInput = document.getElementById('total');
                totalInput.value = total.toFixed(2);

                var envioInput = document.getElementById('envio');
                var envio = parseFloat(envioInput.value) || 0;

                var descuentoInput = document.getElementById('descuento');
                var descuento = parseFloat(descuentoInput.value) || 0;

                var toggleFactura = document.getElementById('toggleFactura');
                var totalDescuentoInput = document.getElementById('totalDescuento');

                // Calcular total con envío
                var totalConEnvio = total + envio;

                // Aplicar descuento en porcentaje
                var totalConDescuento = totalConEnvio - (totalConEnvio * (descuento / 100));

                // Aplicar IVA si el checkbox está seleccionado
                if (toggleFactura.checked) {
                    totalConDescuento *= 1.16;
                }

                // Actualizar el input totalDescuento
                totalDescuentoInput.value = totalConDescuento.toFixed(2);
            }

            // Agregar eventos a los campos existentes al cargar la página
            agregarEventosCalculo(campoExistente);

            // Asegurarse de actualizar el total cuando se cambien los valores
            camposContainer.addEventListener('input', function(event) {
                if (event.target.classList.contains('subtotal')) {
                    actualizarTotal();
                }
            });

            // Asegurarse de actualizar el totalDescuento cuando cambie el campo de envío
            document.getElementById('envio').addEventListener('input', actualizarTotal);

            // Asegurarse de actualizar el totalDescuento cuando cambie el campo de descuento
            document.getElementById('descuento').addEventListener('input', actualizarTotal);

            // Asegurarse de actualizar el totalDescuento cuando cambie el checkbox de IVA
            document.getElementById('toggleFactura').addEventListener('change', actualizarTotal);
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
