<div class="modal fade" id="editModalServices-{{ $item->id }}" tabindex="-1" aria-labelledby="editModalServices-{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Crear Servicio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ route('update.servicios',$item->id ) }}" id="" enctype="multipart/form-data" role="form">
            <input type="hidden" name="_method" value="PATCH">
            @csrf

            <div class="modal-body">
                <div class="row">

                    <div class="col-12 form-group">
                        <label for="name">Nombre *</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <img src="{{ asset('img/icon/user_predeterminado.webp') }}" alt="" width="25px">
                            </span>
                            <input name="nombre" id="nombre" type="text" class="form-control" value="{{ $item->nombre }}">
                        </div>
                    </div>

                    <div class="col-12 form-group">
                        <label for="name">descripcion *</label>
                        <textarea name="descripcion" id="" cols="10" rows="10" class="form-control">{{ $item->descripcion }}</textarea>
                    </div>


                    <div class="col-6 form-group">
                        <label for="name">Precio Normal *</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <img src="{{ asset('img/icon/user_predeterminado.webp') }}" alt="" width="25px">
                            </span>
                            <input name="precio_normal" id="precio_normal" type="doble" class="form-control" value="{{ $item->precio_normal }}">
                        </div>
                    </div>

                    <div class="col-6 form-group">
                        <label for="name">Precio Rebajado *</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <img src="{{ asset('img/icon/user_predeterminado.webp') }}" alt="" width="25px">
                            </span>
                            <input name="precio_rebajado" id="precio_rebajado" type="doble" class="form-control" value="{{ $item->precio_rebajado }}">
                        </div>
                    </div>

                    <div class="col-12 form-group">
                        <label for="name">Imagen</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <img src="{{ asset('img/icon/user_predeterminado.webp') }}" alt="" width="25px" >
                            </span>
                            <input name="imagen" id="imagen" type="file" class="form-control" >
                        </div>
                    </div>

                    <div class="col-12">
                        <img src="{{asset('imagen_serv/'.$item->imagen) }}" class="navbar-brand-img" alt="main_logo" style="height: 30% !important;">
                    </div>

                    <div class="col-12 form-group">
                        <label for="name">Categoria *</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <img src="{{ asset('img/icon/user_predeterminado.webp') }}" alt="" width="25px">
                            </span>
                            <select name="id_categoria" id="" class="form-select">
                                <option value="">{{ $item->Categoria->nombre }}</option>
                                @foreach ($Categorias as $Categoria)
                                    <option value="{{ $Categoria->id }}">{{ $Categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
        </form>
      </div>
    </div>
  </div>
