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
                    <select class="form-select cliente d-inline-block"  data-toggle="select" id="id_cliente" name="id_cliente" value="{{ old('id_cliente') }}" required>
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
