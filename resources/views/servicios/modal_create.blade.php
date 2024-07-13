<div class="modal fade" id="servicios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Crear Servicio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ route('store.servicios') }}" id="" enctype="multipart/form-data" role="form">
            @csrf

            <div class="modal-body">
                <div class="row">

                    <div class="col-12 form-group">
                        <label for="name">Nombre *</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <img src="{{ asset('img/icon/user_predeterminado.webp') }}" alt="" width="25px">
                            </span>
                            <input name="nombre" id="nombre" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="col-12 form-group">
                        <label for="name">descripcion *</label>
                        <textarea name="descripcion" id="" cols="10" rows="10" class="form-control"></textarea>
                    </div>


                    <div class="col-6 form-group">
                        <label for="name">Precio Normal *</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <img src="{{ asset('img/icon/user_predeterminado.webp') }}" alt="" width="25px">
                            </span>
                            <input name="precio_normal" id="precio_normal" type="doble" class="form-control">
                        </div>
                    </div>

                    <div class="col-6 form-group">
                        <label for="name">Precio Rebajado *</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <img src="{{ asset('img/icon/user_predeterminado.webp') }}" alt="" width="25px">
                            </span>
                            <input name="precio_rebajado" id="precio_rebajado" type="doble" class="form-control">
                        </div>
                    </div>

                    <div class="col-12 form-group">
                        <label for="name">Imagen</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <img src="{{ asset('img/icon/user_predeterminado.webp') }}" alt="" width="25px">
                            </span>
                            <input name="imagen" id="imagen" type="file" class="form-control">
                        </div>
                    </div>


                    <div class="col-12 form-group">
                        <label for="name">Categoria *</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <img src="{{ asset('img/icon/user_predeterminado.webp') }}" alt="" width="25px">
                            </span>
                            <select name="id_categoria" id="" class="form-select">
                                <option value="">Selecionar Opcion</option>
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
