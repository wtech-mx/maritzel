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

                                            <div class="form-group col-2">
                                                <h5 for="name">Subtotal IVA*</h5>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <img src="{{ asset('img/icon/efectivo.webp') }}" alt="" width="15px">
                                                    </span>
                                                    <input class="form-control subtotalIva" type="text" id="subtotalIva" name="subtotalIva[]" value="{{$productos->subtotal_iva}}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button class="btn btn-primary mt-2 toggle-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExtraFields0" aria-expanded="false" aria-controls="collapseExtraFields0">
                                                    Más Opciones
                                                </button>
                                            </div>

                                            <div class="collapse" id="collapseExtraFields0">
                                                @if ($productos->cantidad == 0)
                                                    <div class="card card-body mt-3">
                                                        <div class="row">
                                                            <div class="form-group col-4">
                                                                <h5 for="name">Foto</h5>
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
                                                    <div class="card card-body mt-3">
                                                        <div class="row">

                                                            <div class="form-group col-4">
                                                                <h5 for="name">Foto</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/galeria-de-imagenes.webp') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="file" name="imagen[]" class="form-control imagen" value="0">
                                                                </div>
                                                                <img src="{{ asset('cotizaciones/'.$cotizacion->foto) }}" alt="" width="25px">
                                                            </div>

                                                            <div class="form-group col-2">
                                                                <h5 for="name">IVA</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="number" name="iva[]" class="form-control iva" value="{{$productos->iva}}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-2">
                                                                <h5 for="name">Total IVA</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="text" name="totalIva[]" class="form-control totalIva" value="{{$productos->total_iva}}" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="col-4"></div>

                                                            <div class="form-group col-2">
                                                                <h5 for="name">Precio cm</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/efectivo.webp') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="number" name="precio_cm[]" class="form-control precio_cm" value="{{$productos->precio_cm}}" >
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-2">
                                                                <h5 for="name">Total Precio cm</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/bolsa-de-dinero.png') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="number" name="total_precio_cm[]" class="form-control total_precio_cm" value="{{$productos->total_precio_cm}}" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-2">
                                                                <h5 for="name">Material y M.O.</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="number" name="material[]" class="form-control material" value="{{$productos->material}}" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-2">
                                                                <h5 for="name">Utilidad</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="number" name="utilidad[]" class="form-control utilidad" value="{{$productos->utilidad}}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-2">
                                                                <h5 for="name">Instalacion</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input class="form-control instalacion" type="number" id="instalacion" name="instalacion"  value="{{$productos->instalacion}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    @endforeach

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
    document.addEventListener('DOMContentLoaded', function () {
        const camposContainer2 = document.getElementById('camposContainer2');

        // Añadir campo de producto
        document.getElementById('agregarCampo2').addEventListener('click', function() {
            const nuevoCampo = crearNuevoCampo();
            camposContainer2.appendChild(nuevoCampo);
            asignarEventos(nuevoCampo);
        });

        function crearNuevoCampo() {
            const campoTemplate = document.querySelector('.campo2');
            const nuevoCampo = campoTemplate.cloneNode(true);
            nuevoCampo.querySelector('.producto2').value = '';
            nuevoCampo.querySelector('.cantidad2').value = '';
            nuevoCampo.querySelector('.descuento_prod').value = '0';
            nuevoCampo.querySelector('.subtotal2').value = '';
            return nuevoCampo;
        }

        function asignarEventos(campo) {
            const productSelect = campo.querySelector('.producto2');
            const cantidadInput = campo.querySelector('.cantidad2');
            const descuentoInput = campo.querySelector('.descuento_prod');

            productSelect.addEventListener('change', function () {
                const selectedOption = productSelect.options[productSelect.selectedIndex];
                const precio = parseFloat(selectedOption.dataset.precio_normal2) || 0;
                cantidadInput.value = 1;
                const descuento = parseFloat(descuentoInput.value) || 0;
                const subtotal = precio - (precio * (descuento / 100));
                campo.querySelector('.subtotal2').value = `$${subtotal.toFixed(2)}`;
                updateTotal();
            });

            cantidadInput.addEventListener('input', function () {
                actualizarSubtotalNuevo(campo);
            });

            descuentoInput.addEventListener('input', function () {
                actualizarSubtotalNuevo(campo);
            });
        }

        function actualizarSubtotalNuevo(campo) {
            const productSelect = campo.querySelector('.producto2');
            const selectedOption = productSelect.options[productSelect.selectedIndex];
            const precio = parseFloat(selectedOption.dataset.precio_normal2) || 0;
            const cantidad = parseFloat(campo.querySelector('.cantidad2').value) || 0;
            const descuento = parseFloat(campo.querySelector('.descuento_prod').value) || 0;
            const subtotal = (precio * cantidad) - ((precio * cantidad) * (descuento / 100));
            campo.querySelector('.subtotal2').value = `$${subtotal.toFixed(2)}`;
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

        // Asignar eventos a los campos existentes
        document.querySelectorAll('.campo2').forEach(campo => {
            asignarEventos(campo);
        });
    });
</script>

@endsection
