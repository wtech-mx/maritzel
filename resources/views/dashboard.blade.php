@extends('layouts.app')

@section('breadcrumb')
<div class="row">
    @can('clientes-list')
    <div class="col-lg-4 col-md-6 col-12">
            <div class="card p-3 mb-4">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-2 my-auto">
                        <a href="{{ route('index.clients') }}">
                            <img src="{{ asset('img/icon/empleados.webp') }}" alt="" width="35px">
                        </a>
                    </div>

                    <div class="col-lg-8 col-md-8 col-8 ">
                        <a href="{{ route('index.clients') }}">
                            <p style="margin: 0">Consulta</p>
                            <h5>I - Clients</h5>
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-2 col-2 my-auto">
                        <a href="{{ route('index.clients') }}">
                            <img src="{{ asset('img/icon/anadir.webp') }}" alt="" width="35px">
                        </a>
                    </div>
                </div>
            </div>
    </div>
    @endcan
    @can('proovedores-list')
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card p-3 mb-4">
            <div class="row">
                <div class="col-2  my-auto">
                    <a href="{{ route('index.proveedores') }}">
                        <img src="{{ asset('img/icon/edificios_ciudad.webp') }}" alt="" width="35px">
                    </a>
                </div>

                <div class="col-lg-8 col-md-8 col-8 ">
                    <a href="{{ route('index.proveedores') }}">
                        <p style="margin: 0">Consulta</p>
                        <h5>II - Proveedores</h5>
                    </a>
                </div>

                <div class="col-lg-2 col-md-2 col-2 my-auto">
                    <a href="{{ route('index.proveedores') }}">
                        <img src="{{ asset('img/icon/anadir.webp') }}" alt="" width="35px">
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endcan

    @can('operadores-list')
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card p-3 mb-4">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-2 my-auto">
                    <a href="{{ route('index.operadores') }}">
                        <img src="{{ asset('img/icon/camion.png') }}" alt="" width="35px">
                    </a>
                </div>

                <div class="col-lg-8 col-md-8 col-8 ">
                    <a href="{{ route('index.operadores') }}">
                        <p style="margin: 0">Consulta</p>
                        <h5>III - Empleados</h5>
                    </a>
                </div>

                <div class="col-lg-2 col-md-2 col-2 my-auto">
                    <a href="{{ route('index.operadores') }}">
                        <img src="{{ asset('img/icon/anadir.webp') }}" alt="" width="35px">
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endcan

    @can('cotizaciones-list')
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card p-3 mb-4">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-2 my-auto">
                    <a href="{{ route('index.cotizaciones') }}">
                        <img src="{{ asset('img/icon/factura.png.webp') }}" alt="" width="35px">
                    </a>
                </div>

                <div class="col-lg-8 col-md-8 col-8 ">
                    <a href="{{ route('index.cotizaciones') }}">
                        <p style="margin: 0">Consulta</p>
                        <h5>IV - Cotizaciones</h5>
                    </a>
                </div>

                <div class="col-lg-2 col-md-2 col-2 my-auto">
                    <a href="{{ route('index.cotizaciones') }}">
                        <img src="{{ asset('img/icon/anadir.webp') }}" alt="" width="35px">
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endcan


</div>

@endsection

@section('content')


@endsection
