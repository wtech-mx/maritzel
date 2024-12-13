<div class="row">
    <div class=" mt-5">
        <h4>Agregar productos donde nombre y foto sean los mismos</h4>
    </div>

    <div class="col-6">
        <h5 class="label_text" for="name">Nombre y Medidas *</h5>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
                <img src="{{ asset('img/icon/placa.png') }}" alt="" width="29px">
            </span>
            <input  id="nombre_empresa" name="nombre_empresa" type="text" class="form-control" placeholder="Imaginarte 90 * 200">
        </div>
    </div>

    <div class="form-group col-6">
        <h5 class="label_text" for="name">Foto</h5>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
                <img src="{{ asset('img/icon/galeria-de-imagenes.webp') }}" alt="" width="15px">
            </span>
            <input type="file" name="foto[]" class="form-control" multiple>
        </div>
    </div>
    {{--
    <div class="form-group col-lg-2 col-md-6 col-6">
        <h5 class="label_text" for="name"># Letreros *</h5>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
            </span>
            <input class="form-control" type="text" id="cantidad_letreros" name="cantidad_letreros" value="1" >
        </div>
    </div> --}}

    <div class="col-12 mt-2">
        <h4 style="color:#783E5D"><strong>Seleciona los productos</strong> </h4>
    </div>

    <div class="col-12">
        <div class="form-group">
            <button class="btn mt-1" type="button" id="agregarCampo" style="border-radius: 9px;width: 36px;height: 40px;background-color: #000000; color: aliceblue;">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <div id="camposContainer">
                <div class="campo mt-3">
                    <div class="row">
                        <div class="col-lg-4 col-md-8 col-8">
                            <h5 class="label_text" for="">Producto</h5>
                            <div class="form-group">
                                <select name="producto[]" class="form-select d-inline-block producto">
                                    <option value="">Seleccione products</option>
                                    @foreach ($servicios as $product)
                                        <option value="{{ $product->id }}" data-precio_normal="{{ $product->precio_normal }}">{{ $product->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-lg-2 col-md-4 col-4 ">
                            <h5 class="label_text" for="name">Cantidad *</h5>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <img src="{{ asset('img/icon/clic2.png') }}" alt="" width="15px">
                                </span>
                                <input type="number" name="cantidad[]" class="form-control d-inline-block cantidad" >
                            </div>
                        </div>

                        <div class="form-group col-lg-2 col-md-4 col-6 ">
                            <h5 class="label_text" for="name">Dimencion *</h5>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <img src="{{ asset('img/icon/impresora-3d.png') }}" alt="" width="15px">
                                </span>
                                <input type="text" name="dimenciones[]" class="form-control d-inline-block dimenciones" >
                            </div>
                        </div>

                        <div class="form-group col-lg-2 col-md-4 col-6 ">
                            <h5 class="label_text" for="name">Subtotal *</h5>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
                                </span>
                                <input type="text" name="subtotal[]" class="form-control d-inline-block subtotal" readonly>
                            </div>
                        </div>

                        <div class="form-group col-lg-12 col-md-12 col-6 ">
                            <div class="input-group mb-3">
                                <button class="btn btn-primary toggle-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExtraFields0" aria-expanded="false" aria-controls="collapseExtraFields0">
                                    Más Opciones
                                </button>
                            </div>
                        </div>

                        <div class="collapse" id="collapseExtraFields0">
                            <div class="card card-body mt-3">
                                <div class="row">
                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text" for="name">Precio cm</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/efectivo.webp') }}" alt="" width="15px">
                                            </span>
                                            <input type="number" name="precio_cm[]" class="form-control precio_cm">
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text" for="name">Total Precio cm</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/bolsa-de-dinero.png') }}" alt="" width="15px">
                                            </span>
                                            <input type="number" name="total_precio_cm[]" class="form-control total_precio_cm" value="0" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-2 col-md-4 col-6">
                                        <h5 class="label_text" for="name">Material y M.O.</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
                                            </span>
                                            <input type="number" name="material[]" class="form-control material" value="0" readonly>
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
