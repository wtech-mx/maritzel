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
                                    <div class="row">
                                        <div class=" mt-5">
                                            <h4>Agregar productos donde nombre y foto sean los mismos</h4>
                                        </div>

                                        <div class="col-6">
                                            <h5 class="label_text" for="name">Nombre y Medidas *</h5>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <img src="{{ asset('img/icon/placa.png') }}" alt="" width="29px">
                                                </span>
                                                <input  id="nombre_empresa" name="nombre_empresa" type="text" class="form-control" placeholder="Imaginarte 90 * 200">
                                            </div>
                                        </div>

                                        <div class="form-group col-6">
                                            <h5 class="label_text" for="name">Foto</h5>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <img src="{{ asset('img/icon/galeria-de-imagenes.webp') }}" alt="" width="15px">
                                                </span>
                                                <input type="file" name="foto[]" class="form-control" multiple>
                                            </div>
                                        </div>
                                        {{--
                                        <div class="form-group col-lg-2 col-md-6 col-6">
                                            <h5 class="label_text" for="name"># Letreros *</h5>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                                </span>
                                                <input class="form-control" type="text" id="cantidad_letreros" name="cantidad_letreros" value="1" >
                                            </div>
                                        </div> --}}

                                        <div class="col-12 mt-2">
                                            <h4 style="color:#783E5D"><strong>Seleciona los productos</strong> </h4>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <button class="btn mt-1" type="button" id="agregarCampo" style="border-radius: 9px;width: 36px;height: 40px;background-color: #000000; color: aliceblue;">
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-Individual" role="tabpanel" aria-labelledby="nav-Individual-tab" tabindex="0">
                                    <div class="row">
                                        <div class=" mt-5">
                                            <h4>Agregar productos donde nombre y foto sean distintos</h4>
                                        </div>

                                        <div class="col-12 mt-2">
                                            <h4 style="color:#783E5D"><strong>Seleciona los productos</strong> </h4>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <button class="btn mt-1" type="button" id="agregarCampo2" style="border-radius: 9px;width: 36px;height: 40px;background-color: #000000; color: aliceblue;">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <div id="camposContainer2">
                                                    <div class="campo2 mt-3">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-8 col-8">
                                                                <h5 class="label_text" for="">Producto</h5>
                                                                <div class="form-group">
                                                                    <select name="producto2[]" class="form-select d-inline-block producto2">
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
                                                                    <input type="number" name="cantidad2[]" class="form-control d-inline-block cantidad2" >
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-lg-2 col-md-4 col-6 ">
                                                                <h5 class="label_text" for="name">Dimencion *</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/impresora-3d.png') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="text" name="dimenciones2[]" class="form-control d-inline-block dimenciones2" >
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-lg-2 col-md-4 col-6 ">
                                                                <h5 class="label_text" for="name">Subtotal *</h5>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                                                    </span>
                                                                    <input type="text" name="subtotal2[]" class="form-control d-inline-block subtotal2" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-lg-12 col-md-12 col-6 ">
                                                                <div class="input-group mb-3">
                                                                    <button class="btn btn-primary toggle-collapse2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExtraFields2" aria-expanded="false" aria-controls="collapseExtraFields2">
                                                                        Más Opciones
                                                                    </button>
                                                                </div>
                                                            </div>

                                                            <div class="collapse2" id="collapseExtraFields2">
                                                                <div class="card card-body mt-3">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <label class="label_text" class="label_text" for="name">Nombre y Medidas *</label>
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text" id="basic-addon1">
                                                                                    <img src="{{ asset('img/icon/placa.png') }}" alt="" width="29px">
                                                                                </span>
                                                                                <input  id="nombre_empresa2[]" name="nombre_empresa2[]" type="text" class="form-control" placeholder="Imaginarte 90 * 200">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group col-6">
                                                                            <h5 class="label_text" for="name">Fotos</h5>
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text" id="basic-addon1">
                                                                                    <img src="{{ asset('img/icon/galeria-de-imagenes.webp') }}" alt="" width="15px">
                                                                                </span>
                                                                                <input type="file" name="foto2[]" class="form-control" multiple>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group col-lg-2 col-md-4 col-6">
                                                                            <h5 class="label_text" for="name">Precio cm</h5>
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text" id="basic-addon1">
                                                                                    <img src="{{ asset('img/icon/efectivo.webp') }}" alt="" width="15px">
                                                                                </span>
                                                                                <input type="number" name="precio_cm2[]" class="form-control precio_cm">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group col-lg-2 col-md-4 col-6">
                                                                            <h5 class="label_text" for="name">Total Precio cm</h5>
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text" id="basic-addon1">
                                                                                    <img src="{{ asset('img/icon/bolsa-de-dinero.png') }}" alt="" width="15px">
                                                                                </span>
                                                                                <input type="number" name="total_precio_cm2[]" class="form-control total_precio_cm" value="0" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group col-lg-2 col-md-4 col-6">
                                                                            <h5 class="label_text" for="name">Material y M.O.</h5>
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text" id="basic-addon1">
                                                                                    <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                                                                </span>
                                                                                <input type="number" name="material2[]" class="form-control material" value="0" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
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
