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
                                    <img src="{{ asset('img/icon/contenedores.png') }}" alt="" width="40px"> Uno mismo
                                </button>

                                <button class="nav-link custom-tab" id="nav-Individual-tab" data-bs-toggle="tab" data-bs-target="#nav-Individual" type="button" role="tab" aria-controls="nav-Individual" aria-selected="true">
                                    <img src="{{ asset('img/icon/contenedores.png') }}" alt="" width="40px"> Individual
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
                                    @include('cotizaciones.letreros.cliente_nav')
                                </div>

                                <div class="tab-pane fade" id="nav-Mismo" role="tabpanel" aria-labelledby="nav-Mismo-tab" tabindex="0">
                                    @include('cotizaciones.letreros.uno_nav')
                                </div>

                                <div class="tab-pane fade" id="nav-Individual" role="tabpanel" aria-labelledby="nav-Individual-tab" tabindex="0">
                                    @include('cotizaciones.letreros.individual_nav')
                                </div>

                                <div class="tab-pane fade" id="nav-Totales" role="tabpanel" aria-labelledby="nav-Totales-tab" tabindex="0">
                                    @include('cotizaciones.letreros.totales_nav')
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
            var agregarCampoBtn = document.getElementById('agregarCampo');
            var camposContainer = document.getElementById('camposContainer');
            var campoExistente = camposContainer.querySelector('.campo');

            var agregarCampo2Btn = document.getElementById('agregarCampo2');
            var camposContainer2 = document.getElementById('camposContainer2');
            var campoExistente2 = camposContainer2.querySelector('.campo2');

            var campoIndex = 1;
            var campoIndex2 = 1;

            agregarCampoBtn.addEventListener('click', function () {
                var nuevoCampo = campoExistente.cloneNode(true);
                var collapseId = 'collapseExtraFields' + campoIndex;
                var collapseButton = nuevoCampo.querySelector('.toggle-collapse');

                collapseButton.setAttribute('data-bs-target', '#' + collapseId);
                collapseButton.setAttribute('aria-controls', collapseId);
                nuevoCampo.querySelector('.collapse').id = collapseId;

                // Limpiar valores
                limpiarCampos(nuevoCampo);

                camposContainer.appendChild(nuevoCampo);
                campoIndex++;

                agregarEventosCalculo(nuevoCampo);
            });

            agregarCampo2Btn.addEventListener('click', function () {
                var nuevoCampo2 = campoExistente2.cloneNode(true);
                var collapseId2 = 'collapseExtraFields2-' + campoIndex2;
                var collapseButton2 = nuevoCampo2.querySelector('.toggle-collapse2');

                collapseButton2.setAttribute('data-bs-target', '#' + collapseId2);
                collapseButton2.setAttribute('aria-controls', collapseId2);
                nuevoCampo2.querySelector('.collapse2').id = collapseId2;

                // Limpiar valores
                limpiarCampos(nuevoCampo2);

                camposContainer2.appendChild(nuevoCampo2);
                campoIndex2++;

                agregarEventosCalculo(nuevoCampo2);
            });

            function limpiarCampos(campo) {
                var inputs = campo.querySelectorAll('input');
                inputs.forEach(function (input) {
                    input.value = '';
                });

                var select = campo.querySelector('select');
                if (select) {
                    select.value = '';
                    $(select).trigger('change'); // Si usa Select2
                }
            }

            function agregarEventosCalculo(campo) {
                var productoSelect = campo.querySelector('.producto, .producto2');
                var precioCmInput = campo.querySelector('.precio_cm, .precio_cm2');
                var dimencionesInput = campo.querySelector('.dimenciones, .dimenciones2');
                var totalPrecioCmInput = campo.querySelector('.total_precio_cm, .total_precio_cm2');
                var cantidadInput = campo.querySelector('.cantidad, .cantidad2');
                var materialInput = campo.querySelector('.material, .material2');
                var subtotalInput = campo.querySelector('.subtotal, .subtotal2');

                // Referencias globales
                var utilidadInput = document.getElementById('utilidad');
                var utilidadFijoInput = document.getElementById('utilidad_fijo');
                var instalacionInput = document.getElementById('instalacion');

                // Evento para producto
                productoSelect.addEventListener('change', function () {
                    var selectedOption = productoSelect.options[productoSelect.selectedIndex];
                    var precioNormal = selectedOption.getAttribute('data-precio_normal');
                    precioCmInput.value = parseFloat(precioNormal) || 0;
                    calcularTotales();
                });

                // Cálculos
                function calcularTotales() {
                    var precioCm = parseFloat(precioCmInput.value) || 0;
                    var dimenciones = parseFloat(dimencionesInput.value) || 0;
                    var cantidad = parseFloat(cantidadInput.value) || 0;
                    var utilidadPorcentaje = parseFloat(utilidadInput.value) || 0;
                    var utilidadFijo = parseFloat(utilidadFijoInput.value) || 0;
                    var instalacion = parseFloat(instalacionInput.value) || 0;

                    // Total por cm
                    var totalPrecioCm = precioCm * dimenciones;
                    totalPrecioCmInput.value = totalPrecioCm.toFixed(2);

                    // Material
                    var material = totalPrecioCm * cantidad;
                    materialInput.value = material.toFixed(2);

                    // Subtotal
                    var subtotal = material * (1 + utilidadPorcentaje / 100) + utilidadFijo;
                    subtotalInput.value = subtotal.toFixed(2);

                    actualizarTotalesGenerales();
                }

                precioCmInput.addEventListener('input', calcularTotales);
                dimencionesInput.addEventListener('input', calcularTotales);
                cantidadInput.addEventListener('input', calcularTotales);
                utilidadInput.addEventListener('input', calcularTotales);
                utilidadFijoInput.addEventListener('input', calcularTotales);
                instalacionInput.addEventListener('input', calcularTotales);
            }

            function actualizarTotalesGenerales() {
                var total = 0;
                var ivaTotal = 0;
                var envio = parseFloat(document.getElementById('envio').value) || 0;
                var instalacion = parseFloat(document.getElementById('instalacion').value) || 0;
                var ivaPorcentaje = parseFloat(document.getElementById('ivaPorcentaje').value) || 0;

                // Sumar los subtotales de todos los productos
                var subtotales = document.querySelectorAll('.subtotal, .subtotal2');
                subtotales.forEach(function (input) {
                    total += parseFloat(input.value) || 0;
                });

                // Añadir costos de envío e instalación al total
                total += envio + instalacion;

                // Calcular el IVA
                ivaTotal = total * (ivaPorcentaje / 100);

                // Actualizar los campos de totales generales
                document.getElementById('total').value = total.toFixed(2);
                document.getElementById('ivaTotal').value = ivaTotal.toFixed(2);
                document.getElementById('totalIva').value = (total + ivaTotal).toFixed(2);
            }

            // Añadir eventos para actualizar totales generales cuando cambien envío, instalación o IVA
            document.getElementById('envio').addEventListener('input', actualizarTotalesGenerales);
            document.getElementById('instalacion').addEventListener('input', actualizarTotalesGenerales);
            document.getElementById('ivaPorcentaje').addEventListener('input', actualizarTotalesGenerales);

            agregarEventosCalculo(campoExistente);
            agregarEventosCalculo(campoExistente2);
        });
    </script>
@endsection
