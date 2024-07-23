<div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1" aria-labelledby="#editModal-{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Crear Categoris</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ route('update.categorias',$item->id ) }}" id="" enctype="multipart/form-data" role="form">
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
                            <input name="nombre" id="nombre" type="text" class="form-control" value="{{ $item->nombre  }}">
                        </div>
                    </div>

                    <div class="col-12 form-group">
                        <label for="name">Precio cm / m2 *</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <img src="{{ asset('img/icon/cinta-metrica.webp') }}" alt="" width="25px">
                            </span>
                            <input name="precio_cm" id="precio_cm" type="text" class="form-control" value="{{ $item->precio_cm  }}">
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
