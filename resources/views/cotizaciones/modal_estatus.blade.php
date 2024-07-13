<div class="modal fade" id="estatusModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Cambio de Estatus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

            <form method="POST" action="{{ route('update_estatus.cotizaciones', $item->id) }}" enctype="multipart/form-data" role="form">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="modal-body">
                    <div class="row">

                        <div class="form-group">
                            <label for="name">Estatus *</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <img src="{{ asset('img/icon/semaforos.webp') }}" alt="" width="35px">
                                </span>
                                <select class="form-select cliente d-inline-block"  data-toggle="select" id="estatus" name="estatus" value="{{ old('estatus') }}">
                                    <option>Seleccionar Estatus</option>
                                    <option value="proceso">En proceso</option>
                                    <option value="pendiente">Pendiente</option>
                                    <option value="finalizado">Finalizado</option>
                                    <option value="aprobada">Aprobada</option>
                                    <option value="cancelada">Cancelar</option>
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
