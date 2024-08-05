@extends('layouts.app')

@section('template_title')
Servicios
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <a href="{{ route('dashboard') }}" class="btn" style="background: {{$configuracion->color_boton_close}}; color: #ffff; margin-right: 3rem;">
                                Regresar
                            </a>

                            <h2 id="card_title">
                                Servicios
                            </h2>

                              @can('clientes-create')
                             <div class="float-right">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#servicios" style="background: {{$configuracion->color_boton_add}}; color: #ffff">
                                    <i class="fa fa-fw fa-plus"></i>  Crear Servicio
                                </button>

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background: {{$configuracion->color_boton_add}}; color: #ffff">
                                    <i class="fa fa-fw fa-plus"></i>  Crear Categoria
                                </button>
                              </div>
                              @endcan

                        </div>
                    </div>

                    <div class="card-body"style="    padding: 0rem 1.5rem 1.5rem 1.5rem;">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table_id" id="datatable-search">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Nombre</th>
										<th>descripcion</th>
										<th>precio_rebajado</th>
										<th>precio_normal</th>
										<th>imagen</th>
										<th>Categoria</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    function insertarSaltosDeLinea($texto, $palabrasPorLinea = 5) {
                                        $palabras = explode(' ', $texto);
                                        $resultado = '';
                                        $contador = 0;

                                        foreach ($palabras as $palabra) {
                                            $resultado .= $palabra . ' ';
                                            $contador++;

                                            if ($contador % $palabrasPorLinea == 0) {
                                                $resultado .= '<br>';
                                            }
                                        }

                                        return $resultado;
                                    }
                                    @endphp

                                    @foreach ($servicios as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>

											<td>{{ $item->nombre }}</td>
                                            <td>{!! insertarSaltosDeLinea($item->descripcion) !!}</td>
											<td>{{ $item->precio_rebajado }}</td>
											<td>{{ $item->precio_normal }}</td>
											<td>
                                                <img src="{{asset('imagen_serv/'.$item->imagen) }}" class="navbar-brand-img" alt="{{ $item->imagen }}" style="height: 50px;">
                                            </td>
                                            <td>{{ $item->Categoria->nombre }}</td>

                                            <td>
                                                @can('clientes-edit')
                                                <a class="btn btn-xs btn-success" data-bs-toggle="modal" data-bs-target="#editModalServices-{{ $item->id }}" >
                                                    <i class="fa fa-fw fa-edit"></i> Editar
                                                </a>
                                                @endcan

                                            </td>
                                        </tr>
                                        @include('servicios.moda_update')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('servicios.modal_create')
@include('categorias.modal_create')

@endsection

@section('datatable')

<script>
    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
      searchable: true,
      fixedHeight: false
    });

</script>

@endsection
