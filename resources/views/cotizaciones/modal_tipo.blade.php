<div class="modal fade" id="tipoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title text-center">Tipo de cotizacion</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

                <div class="modal-body">
                    <div class="row">

                        <div class="form-group">
                            <h5 class="text-center">Selecciona el tipo de cotizacion </h5>
                                <div class="col-12 text-center">
                                    <a type="button" class="btn btn-primary" href="{{ route('create.cotizaciones') }}" style="background: #83ec2d; color: #000000">
                                        Letras
                                    </a>
                                </div>
                                <div class="col-12 text-center">
                                    <a type="button" class="btn btn-primary" href="{{ route('create_personalizado.cotizaciones') }}" style="background: #ec892d; color: #f0f0f0">
                                        Personalizado
                                    </a>
                                </div>
                                <div class="col-12 text-center">
                                    <a type="button" class="btn btn-primary" href="{{ route('create_vinil.cotizaciones') }}" style="background: #dfec2d; color: #000000">
                                        Vinil
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>

      </div>
    </div>
  </div>
