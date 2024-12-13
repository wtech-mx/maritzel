<div class="row">
    <div class=" mt-5">
        <h4>Agregar productos donde nombre y foto sean distintos</h4>
    </div>

    <div class="col-12 mt-2">
        <h4 style="color:#783E5D"><strong>Seleciona los productos</strong> </h4>
    </div>

    <div class="col-12">
        <div class="form-group">
            <button class="btn mt-1" type="button" id="agregarCampo2" style="border-radius: 9px;width: 36px;height: 40px;background-color: #000000; color: aliceblue;">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <div id="camposContainer2">
                <div class="campo2 mt-3">
                    <div class="row">
                        <div class="col-lg-4 col-md-8 col-8">
                            <h5 class="label_text" for="">Producto</h5>
                            <div class="form-group">
                                <select name="producto2[]" class="form-select d-inline-block producto2">
                                    <option value="">Seleccione products</option>
                                    @foreach ($servicios as $product)
                                        <option value="{{ $product->id }}" data-precio_normal="{{ $product->precio_normal }}">{{ $product->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-lg-2 col-md-4 col-4 ">
                            <h5 class="label_text">Cantidad *</h5>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <img src="{{ asset('img/icon/clic2.png') }}" alt="" width="15px">
                                </span>
                                <input type="number" name="cantidad2[]" class="form-control d-inline-block cantidad2">
                            </div>
                        </div>

                        <div class="form-group col-lg-2 col-md-4 col-6 ">
                            <h5 class="label_text">Dimensión *</h5>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <img src="{{ asset('img/icon/impresora-3d.png') }}" alt="" width="15px">
                                </span>
                                <input type="text" name="dimenciones2[]" class="form-control d-inline-block dimenciones2">
                            </div>
                        </div>

                        <div class="form-group col-lg-2 col-md-4 col-6 ">
                            <h5 class="label_text">Subtotal *</h5>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                </span>
                                <input type="text" name="subtotal2[]" class="form-control d-inline-block subtotal2" readonly>
                            </div>
                        </div>

                        <div class="form-group col-lg-12 col-md-12 col-6">
                            <div class="input-group mb-3">
                                <button class="btn btn-primary toggle-collapse2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExtraFields2" aria-expanded="false" aria-controls="collapseExtraFields2">
                                    Más Opciones
                                </button>
                            </div>
                        </div>

                        <div class="collapse2" id="collapseExtraFields2">
                            <div class="card card-body mt-3">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="label_text" for="name">Nombre y Medidas *</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">
                                                <img src="{{ asset('img/icon/placa.png') }}" alt="" width="29px">
                                            </span>
                                            <input id="nombre_empresa2[]" name="nombre_empresa2[]" type="text" class="form-control" placeholder="Imaginarte 90 * 200">
                                        </div>
                                    </div>

                                    <div class="form-group col-6">
                                        <h5 class="label_text">Fotos</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">
                                                <img src="{{ asset('img/icon/galeria-de-imagenes.webp') }}" alt="" width="15px">
                                            </span>
                                            <input type="file" name="fotos2[0][]" class="form-control fotos2" multiple>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text">Precio cm</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">
                                                <img src="{{ asset('img/icon/efectivo.webp') }}" alt="" width="15px">
                                            </span>
                                            <input type="number" name="precio_cm2[]" class="form-control precio_cm2">
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text">Total Precio cm</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">
                                                <img src="{{ asset('img/icon/bolsa-de-dinero.png') }}" alt="" width="15px">
                                            </span>
                                            <input type="number" name="total_precio_cm2[]" class="form-control total_precio_cm2" value="0" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text">Material y M.O.</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">
                                                <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                            </span>
                                            <input type="number" name="material2[]" class="form-control material2" value="0" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
