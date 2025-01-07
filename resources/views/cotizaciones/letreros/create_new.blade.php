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
                        <nav class="mx-auto">
                            <div class="nav nav-tabs custom-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link custom-tab active" id="nav-cotizacion-tab" data-bs-toggle="tab" data-bs-target="#nav-cotizacion" type="button" role="tab" aria-controls="nav-planeadas" aria-selected="false">
                                    <img src="{{ asset('img/icon/user.png') }}" alt="" width="40px"> Cliente
                                </button>

                                <button class="nav-link custom-tab" id="nav-Mismo-tab" data-bs-toggle="tab" data-bs-target="#nav-Mismo" type="button" role="tab" aria-controls="nav-Mismo" aria-selected="true">
                                    <img src="{{ asset('img/icon/contenedores.png') }}" alt="" width="40px"> Productos
                                </button>

                                <button class="nav-link custom-tab" id="nav-Totales-tab" data-bs-toggle="tab" data-bs-target="#nav-Totales" type="button" role="tab" aria-controls="nav-Totales" aria-selected="false">
                                    <img src="{{ asset('img/icon/bolsa-de-dinero.png') }}" alt="" width="40px"> Totales
                                </button>
                            </div>
                        </nav>

                        <form method="POST" action="{{ route('store.cotizaciones') }}" enctype="multipart/form-data" role="form">
                            @csrf
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-cotizacion" role="tabpanel" aria-labelledby="nav-cotizacion-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row mt-5">
                                                <div class="col-2">
                                                    <h5 class="label_text" for="name">Nuevo cliente</h5>
                                                    <button class="btn btn-success btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                        Agregar <img src="{{ asset('assets/icons/cliente.png') }}" alt="" width="25px">
                                                    </button>
                                                </div>
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <h5 class="label_text" for="name">Cliente *</h5>
                                                        <select class="form-select cliente d-inline-block"  data-toggle="select" id="id_cliente" name="id_cliente" value="{{ old('id_cliente') }}">
                                                            <option value="">Seleccionar cliente</option>
                                                            @foreach ($clientes as $item)
                                                                <option value="{{ $item->id }}">{{ $item->nombre }} / {{ $item->telefono }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <h5 class="label_text" for="name">Subcliente *</h5>
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
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-Mismo" role="tabpanel" aria-labelledby="nav-Mismo-tab" tabindex="0">
                                    <div id="registrosContainer">
                                        <div class="registro mt-5 border p-3" style="border-radius: 10px; background-color: #f9f9f9;">
                                            <div class="row">
                                                <!-- Foto -->
                                                <div class="form-group col-6">
                                                    <h5 class="label_text" for="name">Foto</h5>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <img src="{{ asset('img/icon/galeria-de-imagenes.webp') }}" alt="" width="15px">
                                                        </span>
                                                        <input type="file" name="foto[0][]" class="form-control" multiple>
                                                    </div>
                                                </div>

                                                <!-- Nombre -->
                                                <div class="form-group col-6">
                                                    <h5 class="label_text" for="name">Nombre Empresa *</h5>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <img src="{{ asset('img/icon/placa.png') }}" alt="" width="29px">
                                                        </span>
                                                        <input id="nombre_empresa" name="nombre_empresa[0]" type="text" class="form-control" placeholder="Imaginarte 90 * 200">
                                                    </div>
                                                </div>

                                                <!-- calculos -->
                                                <div class="form-group col-4">
                                                    <h5 class="label_text" for="name">Envio</h5>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="29px">
                                                        </span>
                                                        <input type="number" class="form-control envio" name="envio[0]" id="envio_0" value="0">
                                                    </div>
                                                </div>

                                                <div class="form-group col-4">
                                                    <h5 class="label_text" for="name">instalacion</h5>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="29px">
                                                        </span>
                                                        <input type="number" class="form-control instalacion" name="instalacion[0]" id="instalacion_0" value="0">
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-2 col-md-4 col-6">
                                                    <h5 class="label_text" for="name">Utilidad (%)</h5>
                                                    <input type="number" name="utilidad[0][]" id="utilidad_0" class="form-control utilidad" step="0.01">
                                                </div>

                                                <div class="form-group col-lg-2 col-md-4 col-6">
                                                    <h5 class="label_text" for="name">Utilidad</h5>
                                                    <input type="number" name="utilidad_fijo[0][]" id="utilidad_fijo_0" class="form-control utilidad-fijo">
                                                </div>

                                                <div class="form-group col-4">
                                                    <h5 class="label_text" for="name">Total Registro</h5>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <img src="{{ asset('img/icon/placa.png') }}" alt="" width="29px">
                                                        </span>
                                                        <input type="number" class="form-control total-registro" name="total_registro[0]" id="total_registro_0" readonly>
                                                    </div>
                                                </div>

                                                <!-- Productos -->

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="productosContainer">
                                                            <div class="producto mt-3">
                                                                <div class="row">
                                                                    <div class="col-lg-4 col-md-8 col-8">
                                                                        <h5 class="label_text" for="">Producto</h5>
                                                                        <div class="form-group">
                                                                            <select name="producto[0][]" class="form-select d-inline-block producto-select">
                                                                                <option value="">Seleccione producto</option>
                                                                                @foreach ($servicios as $product)
                                                                                    <option value="{{ $product->id }}" data-precio_normal="{{ $product->precio_normal }}">{{ $product->nombre }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-lg-2 col-md-4 col-4">
                                                                        <h5 class="label_text" for="name">Cantidad *</h5>
                                                                        <input type="number" name="cantidad[0][]" class="form-control d-inline-block cantidad">
                                                                    </div>

                                                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                                                        <h5 class="label_text" for="name">Dimensiones *</h5>
                                                                        <input type="text" name="dimensiones[0][]" class="form-control d-inline-block dimensiones">
                                                                    </div>

                                                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                                                        <h5 class="label_text" for="name">Subtotal *</h5>
                                                                        <input type="text" name="subtotal[0][]" class="form-control d-inline-block subtotal" readonly>
                                                                    </div>

                                                                    <!-- Collapse -->
                                                                    <div class="form-group col-lg-12 col-md-12 col-6">
                                                                        <button class="btn btn-primary toggle-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExtraFields0_0" aria-expanded="false" aria-controls="collapseExtraFields0_0">
                                                                            Más Opciones
                                                                        </button>
                                                                    </div>

                                                                    <div class="collapse" id="collapseExtraFields0_0">
                                                                        <div class="card card-body mt-3">
                                                                            <div class="row">
                                                                                <div class="form-group col-lg-2 col-md-4 col-6">
                                                                                    <h5 class="label_text" for="name">Precio cm</h5>
                                                                                    <input type="number" name="precio_cm[0][]" class="form-control precio-cm">
                                                                                </div>

                                                                                <div class="form-group col-lg-2 col-md-4 col-6">
                                                                                    <h5 class="label_text" for="name">Total Precio cm</h5>
                                                                                    <input type="number" name="total_precio_cm[0][]" class="form-control total-precio-cm" readonly>
                                                                                </div>

                                                                                <div class="form-group col-lg-2 col-md-4 col-6">
                                                                                    <h5 class="label_text" for="name">Material y M.O.</h5>
                                                                                    <input type="number" name="material[0][]" class="form-control material" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> <!-- Fin Producto -->
                                                        </div> <!-- Fin productosContainer -->
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary agregarProducto mt-3">Agregar Producto</button>
                                            <button class="btn btn-danger mt-3 eliminarRegistro" type="button">Eliminar Registro</button>
                                        </div>
                                    </div>
                                    <button id="agregarRegistro" class="btn btn-primary mt-3" type="button">Agregar Registro</button>

                                </div>

                                <div class="tab-pane fade" id="nav-Totales" role="tabpanel" aria-labelledby="nav-Totales-tab" tabindex="0">
                                    <div class="row mt-5">
                                        <h4>Total cotizacion</h4>
                                        <div class="form-group col-lg-2 col-md-4 col-6">
                                            <label for="envio_externo">¿Envió Externo?</label>
                                            <input type="checkbox" id="envio_externo" name="envio_externo" value="1">
                                        </div>

                                        <div class="form-group col-lg-2 col-md-4 col-6">
                                            <label for="instalacion_aparte">¿Separar instalacion?</label>
                                            <input type="checkbox" id="instalacion_aparte" name="instalacion_aparte" value="1">
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
$(document).ready(function () {
    let registroIndex = 1;

    // Función para calcular el subtotal de cada producto
    function calcularSubtotal(productoContainer) {
        const precioCm = parseFloat(productoContainer.find(".precio-cm").val()) || 0;
        const dimensiones = parseFloat(productoContainer.find(".dimensiones").val()) || 0;
        const cantidad = parseFloat(productoContainer.find(".cantidad").val()) || 0;

        // Calcular el totalPrecioCm
        const totalPrecioCm = precioCm * dimensiones;
        productoContainer.find(".total-precio-cm").val(totalPrecioCm.toFixed(2));

        // Calcular el material
        const material = totalPrecioCm * cantidad;
        productoContainer.find(".material").val(material.toFixed(2));

        // Calcular el subtotal
        const subtotal = material;
        productoContainer.find(".subtotal").val(subtotal.toFixed(2));
    }

    function calcularTotalRegistro(registroContainer) {
        let totalProductos = 0;

        // Sumar subtotales de los productos
        registroContainer.find(".productosContainer .producto").each(function () {
            const subtotal = parseFloat($(this).find(".material").val()) || 0;
            totalProductos += subtotal;
        });

        // Agregar costos de envío e instalación
        const envio = parseFloat(registroContainer.find(".envio").val()) || 0;
        const instalacion = parseFloat(registroContainer.find(".instalacion").val()) || 0;

        // Agregar utilidad como porcentaje del total (productos + envio + instalación)
        const utilidad = parseFloat(registroContainer.find(".utilidad").val()) || 0;
        const utilidadFijo = parseFloat(registroContainer.find(".utilidad-fijo").val()) || 0;

        const totalConUtilidad = (totalProductos + envio + instalacion) * (1 + utilidad / 100) + utilidadFijo;

        registroContainer.find(".total-registro").val(totalConUtilidad.toFixed(2));

        // Depuración
        console.log("Total Productos:", totalProductos);
        console.log("Envío:", envio);
        console.log("Instalación:", instalacion);
        console.log("Utilidad %:", utilidad);
        console.log("Utilidad Fijo:", utilidadFijo);
        console.log("Total Registro:", totalConUtilidad);
    }

    // Evento para recalcular el subtotal al cambiar cantidad, dimensiones, precio por cm, material o utilidad
    $(document).on("input", ".cantidad, .dimensiones, .precio-cm", function () {
        const productoContainer = $(this).closest(".producto");
        calcularSubtotal(productoContainer);

        const registroContainer = productoContainer.closest(".registro");
        calcularTotalRegistro(registroContainer);
    });

    // Evento para seleccionar un producto y cargar su precio
    $(document).on("change", ".producto-select", function () {
        const selectedOption = $(this).find(":selected");
        const precioNormal = parseFloat(selectedOption.data("precio_normal")) || 0;

        const productoContainer = $(this).closest(".producto");
        productoContainer.find(".precio-cm").val(precioNormal.toFixed(2));

        calcularSubtotal(productoContainer);

        const registroContainer = productoContainer.closest(".registro");
        calcularTotalRegistro(registroContainer);
    });

    $(document).on("input", ".envio, .instalacion, .utilidad, .utilidad-fijo", function () {
        const registroContainer = $(this).closest(".registro");
        calcularTotalRegistro(registroContainer);
    });

    // Evento para agregar un nuevo producto dentro de un registro
    $(document).on("click", ".agregarProducto", function () {
        const productosContainer = $(this).closest(".registro").find(".productosContainer");
        const nuevoProducto = productosContainer.find(".producto:first").clone();
        const registroIndex = $(this).closest(".registro").index();
        const productoIndex = productosContainer.find(".producto").length;

        // Actualizar nombres e IDs de los inputs del nuevo producto
        nuevoProducto.find("input, select").each(function () {
            const name = $(this).attr("name");
            if (name) {
                const newName = name.replace(/\[\d+\]\[\d+\]/, `[${registroIndex}][${productoIndex}]`);
                $(this).attr("name", newName);
            }

            const id = $(this).attr("id");
            if (id) {
                const newId = id.replace(/_\d+_\d+/, `_${registroIndex}_${productoIndex}`);
                $(this).attr("id", newId);
            }

            // Limpiar valores
            if ($(this).is("input[type='text'], input[type='number']")) {
                $(this).val("");
            }

            if ($(this).is("select")) {
                $(this).val("");
            }
        });

        productosContainer.append(nuevoProducto);
    });

    // Evento para agregar un nuevo registro
    $("#agregarRegistro").on("click", function () {
        registroIndex++;

        // Clonar el registro y limpiar los valores
        let nuevoRegistro = $(".registro:first").clone();
        nuevoRegistro.find("input").val(""); // Limpia todos los valores de los inputs
        nuevoRegistro.find("select").val(""); // Limpia los selects
        nuevoRegistro.find(".collapse").removeClass("show"); // Cierra los collapses abiertos
        nuevoRegistro.find(".error").remove(); // Elimina errores (si tienes validaciones)

        // Actualizar índices en los atributos name e id
        nuevoRegistro.find("input, select").each(function () {
            let name = $(this).attr("name");
            if (name) {
                name = name.replace(/\[\d+\]/, `[${registroIndex}]`);
                $(this).attr("name", name);
            }

            let id = $(this).attr("id");
            if (id) {
                id = id.replace(/_\d+$/, `_${registroIndex}`);
                $(this).attr("id", id);
            }
        });

        // Actualizar IDs de los collapses y sus referencias
        nuevoRegistro.find(".collapse").each(function (collapseIndex) {
            let newCollapseId = `collapseExtraFields${registroIndex}_${collapseIndex}`;
            $(this).attr("id", newCollapseId);
            $(this).siblings(".toggle-collapse").attr("data-bs-target", `#${newCollapseId}`);
        });

        $("#registrosContainer").append(nuevoRegistro);
    });

    // Eliminar registro
    $(document).on("click", ".eliminarRegistro", function () {
        if ($(".registro").length > 1) {
            $(this).closest(".registro").remove();
        } else {
            alert("Debe haber al menos un registro.");
        }
    });
});
</script>
@endsection
