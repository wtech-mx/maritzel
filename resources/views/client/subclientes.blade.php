@extends('layouts.app')

@section('template_title')
Subcliuente
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <a id="backButton" class="btn" style="background: {{$configuracion->color_boton_close}}; color: #ffff; margin-right: 3rem;">
                                Regresar
                            </a>

                            <h2 id="card_title">
                               Subcliente <br>{{ $subcliente->nombre }}
                            </h2>

                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update_subclientes.clients',$subcliente->id ) }}" id="" enctype="multipart/form-data" role="form">
                            <input type="hidden" name="_method" value="PATCH">
                            @csrf
                        <div class="row">
                            <div class="col-12 form-group">
                                <label for="name">Nombre Completo*</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <img src="{{ asset('img/icon/user_predeterminado.webp') }}" alt="" width="25px">
                                    </span>
                                    <input name="nombre" id="nombre" type="text" class="form-control" value="{{ $subcliente->nombre }}">
                                </div>
                            </div>

                            <div class="col-6 form-group">
                                <label for="name">correo *</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <img src="{{ asset('img/icon/sobre.png.webp') }}" alt="" width="25px">
                                    </span>
                                    <input name="correo" id="correo" type="email" class="form-control" value="{{ $subcliente->correo }}">
                                </div>
                            </div>

                            <div class="col-6 form-group">
                                <label for="name">Telefono *</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <img src="{{ asset('img/icon/telefono.png.webp') }}" alt="" width="25px">
                                    </span>
                                    <input name="telefono" id="telefono" type="number" class="form-control" value="{{ $subcliente->telefono }}">
                                </div>
                            </div>

                            <div class="col-6 form-group">
                                <label for="name">Direccion *</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <img src="{{ asset('img/icon/mapa-de-la-ciudad.webp') }}" alt="" width="25px">
                                    </span>
                                    <input name="direccion" id="direccion" type="text" class="form-control" value="{{ $subcliente->direccion }}">
                                </div>
                            </div>

                            <div class="col-12 form-group">
                                <label for="name">Regimen Fiscal*</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <img src="{{ asset('img/icon/gear.webp') }}" alt="" width="25px">
                                    </span>

                                    <select name="regimen_fiscal" id="" class="form-select">
                                        <option value="{{ $subcliente->regimen_fiscal }}">{{ $subcliente->regimen_fiscal }}</option>
                                        <option value="Sin Definir">Sin Definir</option>
                                        <option value="General de Ley Personas Morales">General de Ley Personas Morales</option>
                                        <option value="Personas Morales con Fines no Lucrativos">Personas Morales con Fines no Lucrativos</option>
                                        <option value="Sueldos y Salarios e Ingresos Asimilados a Salarios">Sueldos y Salarios e Ingresos Asimilados a Salarios</option>
                                        <option value="Arrendamiento">Arrendamiento</option>
                                        <option value="Demás ingresos">Demás ingresos</option>
                                        <option value="Residentes en el Extranjero sin Establecimiento Permanente en México">Residentes en el Extranjero sin Establecimiento Permanente en México</option>
                                        <option value="Ingresos por Dividendos (Socios y Accionistas)">Ingresos por Dividendos (Socios y Accionistas)</option>
                                        <option value="Personas Físicas con Actividades Empresariales y Profesionales">Personas Físicas con Actividades Empresariales y Profesionales</option>
                                        <option value="Regímenes Fiscales Preferentes y de las Empresas Multinacionales">Regímenes Fiscales Preferentes y de las Empresas Multinacionales</option>
                                        <option value="Enajenación de Acciones en Bolsa de Valores">Enajenación de Acciones en Bolsa de Valores</option>
                                        <option value="Régimen Simplificado de Confianza">Régimen Simplificado de Confianza</option>
                                        <option value="Incorporación Fiscal">Incorporación Fiscal</option>
                                        <option value="Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras">Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras</option>
                                        <option value="Dividendos">Dividendos</option>
                                        <option value="Intereses">Intereses</option>
                                        <option value="Servicios Profesionales">Servicios Profesionales</option>
                                        <option value="Plataformas Tecnológicas">Plataformas Tecnológicas</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6 form-group">
                                <label for="name">RFC*</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <img src="{{ asset('img/icon/gear.webp') }}" alt="" width="25px">
                                    </span>
                                    <input name="rfc" id="rfc" type="text" class="form-control" value="{{ $subcliente->rfc }}">
                                </div>
                            </div>

                            <div class="col-6 form-group">
                                <label for="name">Nombre de Empresa</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <img src="{{ asset('img/icon/edificios_ciudad.webp') }}" alt="" width="25px">
                                    </span>
                                    <input name="nombre_empresa" id="nombre_empresa" type="text" class="form-control" value="{{ $subcliente->nombre_empresa }}">
                                </div>
                            </div>

                            <div class="col-6">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('datatable')


</script>

@endsection
