@extends('layouts.app')

@section('template_title')
    Cotizaciones
@endsection

@section('content')
<style>

    .custom-tabs .custom-tab {
        background-color: #f8f9fa; /* Color por defecto */
        border-color: #dee2e6; /* Color del borde por defecto */
        color: #495057; /* Color del texto por defecto */
    }

    .custom-tabs .custom-tab.active {
        background-color: #47a0cd; /* Color de fondo del tab activo */
        border-color: #47a0cd; /* Color del borde del tab activo */
        color: #ffffff; /* Color del texto del tab activo */
    }

</style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <a href="{{ route('dashboard') }}" class="btn btn-xs" style="background: {{$configuracion->color_boton_close}}; color: #ffff; margin-right: 3rem;">
                                Regresar
                            </a>
                            <span id="card_title">
                                Cotizaciones
                            </span>

                             <div class="float-right">
                                @can('cotizaciones-create')
                                <a type="button" class="btn btn-primary" href="{{ route('create.cotizaciones') }}" style="background: {{$configuracion->color_boton_add}}; color: #ffff">
                                    Crear
                                  </a>
                                  @endcan
                              </div>
                        </div>
                    </div>

                    <nav class="mx-auto">
                        <div class="nav nav-tabs custom-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link custom-tab active" id="nav-planeadas-tab" data-bs-toggle="tab" data-bs-target="#nav-planeadas" type="button" role="tab" aria-controls="nav-planeadas" aria-selected="false">
                            <img src="{{ asset('img/icon/resultado.webp') }}" alt="" width="40px">  En Proceso
                        </button>

                        <button class="nav-link custom-tab " id="nav-finalizadas-tab" data-bs-toggle="tab" data-bs-target="#nav-finalizadas" type="button" role="tab" aria-controls="nav-finalizadas" aria-selected="false">
                            <img src="{{ asset('img/icon/pdf.webp') }}" alt="" width="40px">  Finalizadas
                        </button>

                          <button class="nav-link custom-tab" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                            <img src="{{ asset('img/icon/pausa.png') }}" alt="" width="40px">  En espera
                          </button>

                          <button class="nav-link custom-tab" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                            <img src="{{ asset('img/icon/cheque.png') }}" alt="" width="40px">  Aprobada
                          </button>

                          <button class="nav-link custom-tab" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                            <img src="{{ asset('img/icon/cerrar.png') }}" alt="" width="40px">  Canceladas
                          </button>
                        </div>
                    </nav>


                      <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-planeadas" role="tabpanel" aria-labelledby="nav-planeadas-tab" tabindex="0">
                            <div class="table-responsive">
                                <table class="table table-flush" id="datatable-planeadas">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>
                                            <th><img src="{{ asset('img/icon/user_predeterminado.webp') }}" alt="" width="25px">Cliente</th>
                                            <th><img src="{{ asset('img/icon/gps.webp') }}" alt="" width="25px">Fecha</th>
                                            <th><img src="{{ asset('img/icon/semaforos.webp') }}" alt="" width="25px">Estatus</th>
                                            <th><img src="{{ asset('img/icon/coordenadas.png') }}" alt="" width="25px">Total</th>
                                            <th><img src="{{ asset('img/icon/edit.png') }}" alt="" width="25px">Acciones</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            @foreach ($cotizaciones_proceso as $item)
                                                <tr>
                                                    <td>{{ $item->folio }}</td>
                                                    <td>{{ $item->Cliente->nombre }}</td>
                                                    <td>{{ $item->fecha }}</td>
                                                    <td>
                                                        @if ($item->estatus_cotizacion== 'pendiente')
                                                        <button type="button" class="btn btn-xs btn-outline-warning" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                            {{$item->estatus_cotizacion}}
                                                        </button>

                                                        @elseif ($item->estatus_cotizacion == 'cancelada')
                                                            <button type="button" class="btn btn-xs btn-outline-danger" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                                {{$item->estatus_cotizacion}}
                                                            </button>

                                                        @elseif ($item->estatus_cotizacion == 'aprobada')
                                                            <button type="button" class="btn btn-xs btn-outline-success btn-xs" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                                {{$item->estatus_cotizacion}}
                                                            </button>
                                                        @elseif ($item->estatus_cotizacion == 'proceso')
                                                            <button type="button" class="btn btn-xs btn-outline-success btn-xs" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                                {{$item->estatus_cotizacion}}
                                                            </button>
                                                        @elseif ($item->estatus_cotizacion == 'finalizado')
                                                            <button type="button" class="btn btn-xs btn-outline-success btn-xs" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                                {{$item->estatus_cotizacion}}
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->total }}</td>
                                                    <td>

                                                        <a type="button" class="btn btn-primary" href="{{ route('edit.cotizaciones', $item->id) }}" style="background: {{$configuracion->color_boton_add}}; color: #ffff">
                                                            Edit
                                                        </a>

                                                    </td>
                                                </tr>

                                                @include('cotizaciones.modal_estatus')

                                            @endforeach
                                        </tbody>

                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade " id="nav-finalizadas" role="tabpanel" aria-labelledby="nav-finalizadas-tab" tabindex="0">
                            <div class="table-responsive">
                                <table class="table table-flush" id="datatable-finalizadas">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>
                                            <th><img src="{{ asset('img/icon/user_predeterminado.webp') }}" alt="" width="25px">Cliente</th>
                                            <th><img src="{{ asset('img/icon/gps.webp') }}" alt="" width="25px">Fecha</th>
                                            <th><img src="{{ asset('img/icon/semaforos.webp') }}" alt="" width="25px">Estatus</th>
                                            <th><img src="{{ asset('img/icon/coordenadas.png') }}" alt="" width="25px">Total</th>
                                            <th><img src="{{ asset('img/icon/edit.png') }}" alt="" width="25px">Acciones</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            @foreach ($cotizaciones_finalizado as $item)
                                                <tr>
                                                    <td>{{ $item->folio }}</td>
                                                    <td>{{ $item->Cliente->nombre }}</td>
                                                    <td>{{ $item->fecha }}</td>
                                                    <td>
                                                        @if ($item->estatus_cotizacion== 'pendiente')
                                                        <button type="button" class="btn btn-xs btn-outline-warning" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                            {{$item->estatus_cotizacion}}
                                                        </button>

                                                        @elseif ($item->estatus_cotizacion == 'cancelada')
                                                            <button type="button" class="btn btn-xs btn-outline-danger" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                                {{$item->estatus_cotizacion}}
                                                            </button>

                                                        @elseif ($item->estatus_cotizacion == 'aprobada')
                                                            <button type="button" class="btn btn-xs btn-outline-success btn-xs" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                                {{$item->estatus_cotizacion}}
                                                            </button>
                                                        @elseif ($item->estatus_cotizacion == 'proceso')
                                                            <button type="button" class="btn btn-xs btn-outline-success btn-xs" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                                {{$item->estatus_cotizacion}}
                                                            </button>
                                                        @elseif ($item->estatus_cotizacion == 'finalizado')
                                                            <button type="button" class="btn btn-xs btn-outline-success btn-xs" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                                {{$item->estatus_cotizacion}}
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->total }}</td>
                                                    <td>
                                                        <a type="button" class="btn btn-primary" href="{{ route('edit.cotizaciones', $item->id) }}" style="background: {{$configuracion->color_boton_add}}; color: #ffff">
                                                            Edit
                                                        </a>


                                                    </td>
                                                </tr>

                                                @include('cotizaciones.modal_estatus')

                                            @endforeach
                                        </tbody>

                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                            <div class="table-responsive">
                                <table class="table table-flush" id="datatable-search">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>
                                            <th><img src="{{ asset('img/icon/user_predeterminado.webp') }}" alt="" width="25px">Cliente</th>
                                            <th><img src="{{ asset('img/icon/gps.webp') }}" alt="" width="25px">Fecha</th>
                                            <th><img src="{{ asset('img/icon/semaforos.webp') }}" alt="" width="25px">Estatus</th>
                                            <th><img src="{{ asset('img/icon/coordenadas.png') }}" alt="" width="25px">Total</th>
                                            <th><img src="{{ asset('img/icon/edit.png') }}" alt="" width="25px">Acciones</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            @foreach ($cotizaciones_pendiente as $item)
                                                <tr>
                                                    <td>{{ $item->folio }}</td>
                                                    <td>{{ $item->Cliente->nombre }}</td>
                                                    <td>{{ $item->fecha }}</td>
                                                    <td>
                                                        @if ($item->estatus_cotizacion== 'pendiente')
                                                        <button type="button" class="btn btn-xs btn-outline-warning" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                            {{$item->estatus_cotizacion}}
                                                        </button>

                                                        @elseif ($item->estatus_cotizacion == 'cancelada')
                                                            <button type="button" class="btn btn-xs btn-outline-danger" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                                {{$item->estatus_cotizacion}}
                                                            </button>

                                                        @elseif ($item->estatus_cotizacion == 'aprobada')
                                                            <button type="button" class="btn btn-xs btn-outline-success btn-xs" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                                {{$item->estatus_cotizacion}}
                                                            </button>
                                                        @elseif ($item->estatus_cotizacion == 'proceso')
                                                            <button type="button" class="btn btn-xs btn-outline-success btn-xs" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                                {{$item->estatus_cotizacion}}
                                                            </button>
                                                        @elseif ($item->estatus_cotizacion == 'finalizado')
                                                            <button type="button" class="btn btn-xs btn-outline-success btn-xs" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                                {{$item->estatus_cotizacion}}
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->total }}</td>
                                                    <td>
                                                        <a type="button" class="btn btn-primary" href="{{ route('edit.cotizaciones', $item->id) }}" style="background: {{$configuracion->color_boton_add}}; color: #ffff">
                                                            Edit
                                                        </a>


                                                    </td>
                                                </tr>

                                                @include('cotizaciones.modal_estatus')

                                            @endforeach
                                        </tbody>

                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                            <div class="table-responsive">
                                <table class="table table-flush" id="datatable_aprovadas">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>
                                            <th><img src="{{ asset('img/icon/user_predeterminado.webp') }}" alt="" width="25px">Cliente</th>
                                            <th><img src="{{ asset('img/icon/gps.webp') }}" alt="" width="25px">Fecha</th>
                                            <th><img src="{{ asset('img/icon/semaforos.webp') }}" alt="" width="25px">Estatus</th>
                                            <th><img src="{{ asset('img/icon/coordenadas.png') }}" alt="" width="25px">Total</th>
                                            <th><img src="{{ asset('img/icon/edit.png') }}" alt="" width="25px">Acciones</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            @foreach ($cotizaciones_aprovado as $item)
                                                <tr>
                                                    <td>{{ $item->folio }}</td>
                                                    <td>{{ $item->Cliente->nombre }}</td>
                                                    <td>{{ $item->fecha }}</td>
                                                    <td>
                                                        @if ($item->estatus_cotizacion== 'pendiente')
                                                        <button type="button" class="btn btn-xs btn-outline-warning" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                            {{$item->estatus_cotizacion}}
                                                        </button>

                                                        @elseif ($item->estatus_cotizacion == 'cancelada')
                                                            <button type="button" class="btn btn-xs btn-outline-danger" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                                {{$item->estatus_cotizacion}}
                                                            </button>

                                                        @elseif ($item->estatus_cotizacion == 'aprobada')
                                                            <button type="button" class="btn btn-xs btn-outline-success btn-xs" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                                {{$item->estatus_cotizacion}}
                                                            </button>
                                                        @elseif ($item->estatus_cotizacion == 'proceso')
                                                            <button type="button" class="btn btn-xs btn-outline-success btn-xs" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                                {{$item->estatus_cotizacion}}
                                                            </button>
                                                        @elseif ($item->estatus_cotizacion == 'finalizado')
                                                            <button type="button" class="btn btn-xs btn-outline-success btn-xs" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                                {{$item->estatus_cotizacion}}
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->total }}</td>
                                                    <td>
                                                        <a type="button" class="btn btn-primary" href="{{ route('edit.cotizaciones', $item->id) }}" style="background: {{$configuracion->color_boton_add}}; color: #ffff">
                                                            Edit
                                                        </a>


                                                    </td>
                                                </tr>

                                                @include('cotizaciones.modal_estatus')

                                            @endforeach
                                        </tbody>

                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                            <div class="table-responsive">
                                <table class="table table-flush" id="datatable_canceladas">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>
                                            <th><img src="{{ asset('img/icon/user_predeterminado.webp') }}" alt="" width="25px">Cliente</th>
                                            <th><img src="{{ asset('img/icon/gps.webp') }}" alt="" width="25px">Fecha</th>
                                            <th><img src="{{ asset('img/icon/semaforos.webp') }}" alt="" width="25px">Estatus</th>
                                            <th><img src="{{ asset('img/icon/coordenadas.png') }}" alt="" width="25px">Total</th>
                                            <th><img src="{{ asset('img/icon/edit.png') }}" alt="" width="25px">Acciones</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            @foreach ($cotizaciones_cancelado as $item)
                                                <tr>
                                                    <td>{{ $item->folio }}</td>
                                                    <td>{{ $item->Cliente->nombre }}</td>
                                                    <td>{{ $item->fecha }}</td>
                                                    <td>
                                                        @if ($item->estatus_cotizacion== 'pendiente')
                                                        <button type="button" class="btn btn-xs btn-outline-warning" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                            {{$item->estatus_cotizacion}}
                                                        </button>

                                                        @elseif ($item->estatus_cotizacion == 'cancelada')
                                                            <button type="button" class="btn btn-xs btn-outline-danger" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                                {{$item->estatus_cotizacion}}
                                                            </button>

                                                        @elseif ($item->estatus_cotizacion == 'aprobada')
                                                            <button type="button" class="btn btn-xs btn-outline-success btn-xs" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                                {{$item->estatus_cotizacion}}
                                                            </button>
                                                        @elseif ($item->estatus_cotizacion == 'proceso')
                                                            <button type="button" class="btn btn-xs btn-outline-success btn-xs" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                                {{$item->estatus_cotizacion}}
                                                            </button>
                                                        @elseif ($item->estatus_cotizacion == 'finalizado')
                                                            <button type="button" class="btn btn-xs btn-outline-success btn-xs" data-bs-toggle="modal" data-bs-target="#estatusModal{{$item->id}}">
                                                                {{$item->estatus_cotizacion}}
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->total }}</td>
                                                    <td>

                                                        <a type="button" class="btn btn-primary" href="{{ route('edit.cotizaciones', $item->id) }}" style="background: {{$configuracion->color_boton_add}}; color: #ffff">
                                                            Edit
                                                        </a>

                                                    </td>
                                                </tr>

                                                @include('cotizaciones.modal_estatus')

                                            @endforeach
                                        </tbody>

                                </table>
                            </div>
                        </div>
                      </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('datatable')
    <script type="text/javascript">
        const dataTableSearch4 = new simpleDatatables.DataTable("#datatable-planeadas", {
        searchable: true,
        fixedHeight: false
        });

        const dataTableSearch5 = new simpleDatatables.DataTable("#datatable-finalizadas", {
        searchable: true,
        fixedHeight: false
        });


        const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
        fixedHeight: false
        });

        const dataTableSearch2 = new simpleDatatables.DataTable("#datatable_aprovadas", {
        searchable: true,
        fixedHeight: false
        });

        const dataTableSearch3 = new simpleDatatables.DataTable("#datatable_canceladas", {
        searchable: true,
        fixedHeight: false
        });

    </script>
@endsection
