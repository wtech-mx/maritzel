<div class="row mt-5">
    <h4>Total cotizacion</h4>
    <div class="form-group col-lg-2 col-md-4 col-6">
        <label for="envio_externo">¿Envió Externo?</label>
        <input type="checkbox" id="envio_externo" name="envio_externo" value="1">
    </div>

    <div class="form-group col-lg-2 col-md-4 col-6">
        <label for="instalacion_aparte">¿Separar instalacion?</label>
        <input type="checkbox" id="instalacion_aparte" name="instalacion_aparte" value="1">
    </div>

    <div class="form-group col-lg-2 col-md-4 col-6">
        <h5 class="label_text" for="name">Envio *</h5>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
            </span>
            <input class="form-control envio" type="text" id="envio" name="envio" value="0" >
        </div>
    </div>

    <div class="form-group col-lg-2 col-md-4 col-6">
        <h5 class="label_text" for="name">Instalacion</h5>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
                <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
            </span>
            <input class="form-control instalacion" type="number" id="instalacion" name="instalacion" value="0">
        </div>
    </div>

    <div class="form-group col-lg-2 col-md-4 col-6">
        <h5 class="label_text" for="name">Utilidad %</h5>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
                <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
            </span>
            <input type="number" name="utilidad" id="utilidad" class="form-control utilidad" value="1.75">
        </div>
    </div>

    <div class="form-group col-lg-2 col-md-4 col-6">
        <h5 class="label_text" for="name">Utilidad $</h5>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
                <img src="{{ asset('img/icon/signo-de-dolar.webp') }}" alt="" width="15px">
            </span>
            <input type="number" name="utilidad_fijo"  id="utilidad_fijo" class="form-control utilidad_fijo" value="0">
        </div>
    </div>

    <div class="form-group col-lg-2 col-md-4 col-6">
        <h5 class="label_text" for="name">Total</h5>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
            </span>
            <input type="text" id="total" name="total" class="form-control d-inline-block" readonly>
        </div>
    </div>

    <div class="form-group col-lg-2 col-md-4 col-6">
        <h5 class="label_text" for="name">IVA %</h5>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
            </span>
            <input type="number" id="ivaPorcentaje" name="ivaPorcentaje" class="form-control" value="16">
        </div>
    </div>

    <div class="form-group col-lg-2 col-md-4 col-6">
        <h5 class="label_text" for="name">IVA</h5>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
            </span>
            <input id="ivaTotal" name="ivaTotal" type="text" class="form-control" readonly>
        </div>
    </div>

    <div class="form-group col-lg-2 col-md-4 col-6 ">
        <h5 class="label_text" for="name">Total IVA*</h5>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
                <img src="{{ asset('img/icon/dinero.png') }}" alt="" width="15px">
            </span>
            <input id="totalIva" name="totalIva" class="form-control" type="text" readonly>
        </div>
    </div>


    <div id="mensaje_envio" class="form-group  col-lg-6 col-md-6 col-12 " style="display:none;">
        <label for="mensaje">Mensaje de Envío</label>
        <textarea class="form-control" id="mensaje_envio" name="mensaje_envio" rows="4" placeholder="Escribe tu mensaje...">Incluye entrega en area metropolitana</textarea>
    </div>

    <div id="mensaje_instalacion" class="form-group  col-lg-6 col-md-6 col-12 " style="display:none;">
        <label for="mensaje">Mensaje de Instalacion</label>
        <textarea class="form-control" id="2" name="mensaje_instalacion" rows="4" placeholder="Escribe tu mensaje...">Instalación en área metropolitana no mayor
            a 3 mts de altura.</textarea>
    </div>
</div>
