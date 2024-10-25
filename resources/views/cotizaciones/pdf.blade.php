<?php
    // Supongamos que $nota->fecha contiene la fecha en el formato 'Y-m-d'
    $fechaOriginal = $nota->fecha;

    // Crear un objeto DateTime a partir de la fecha original
    $date = new DateTime($fechaOriginal);

    // Formatear la fecha al formato deseado (d/m/Y)
    $fechaFormateada = $date->format('d/m/Y');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cotización  @if ($nota->folio == null) {{ $nota->id }} @else {{ $nota->folio }} @endif</title>
    <style>
        body {
            font-family: Helvetica, Arial, sans-serif;
            font-size: 15px;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 0;
            border-collapse: collapse;
        }
        .body_content{
            width: 100%;

        }
        .section {
            padding: 15px 35px;
            background-color: #ffffff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .text-center {
            text-align: center;
        }
        .text-left {
            text-align: left;
        }
        .text-right {
            text-align: right;
        }
        .heading {
            color: #7030A0;
        }
        .client-details {
            background-color: #7030A0;
            color: #ffffff;
            font-size: 20px;
            /* width: 650px; */
            width: 100%;
        }
        .details {
            text-align: center;
            padding: 15px 0;
        }
        .image img {
            max-width: 100%;
            vertical-align: middle;
        }
        .no-border {
            border: 0 hidden;
        }
        .center-table {
            margin: 0 auto;
            display: table;
        }

        .terminos{
            font-size: 12px;
            line-height: 1.3;
        }

        .folios{
            font-size: 12px;
            line-height: 1.3;
        }


    </style>
</head>
<body>
    <table class="container" align="center">
        <tbody>
            <tr>
                <td class="section" id="body_content">
                    <div class="image text-left">
                            <img alt="" width="230" src='https://imnasmexico.com/new/wp-content/uploads/2024/08/logo_imaginarte.png' / style="margin: auto">
                    </div>
                </td>

                <td>
                    <div class="text-item text-right heading" style="padding: 0;margin:0;">
                        <p style="padding: 0;margin:0;"><strong>COTIZACIÓN</strong></p>
                    </div>
                    <div class="text-item text-right" style="padding: 0;margin:0;">
                        <p class="folios" style="padding: 0;margin:0;">Folio :  # @if ($nota->folio == null) {{ $nota->id }} @else {{ $nota->folio }} @endif</p>
                        <p class="folios" style="padding: 0;margin:0;">Fecha : {{ $fechaFormateada; }}</p>
                        <p class="folios" style="padding: 0;margin:0;">Vendedor : Maritzel</p>
                        <p class="folios" style="padding: 0;margin:0;">{{ $nota->nombre_empresa }}</p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="container" align="center" style="margin-top: 1rem">
        <tbody>
            <tr>
                <td class="section" id="body_content"style="margin: 0;padding:0;">
                    <div class="text-item client-details text-center" style="margin: 0;padding:0;">
                        <p style="margin: 0;padding:0;">Datos del Cliente</p>
                    </div>
                    <div class="details"  style="padding: 0;margin:0;margin-top: 0.5rem;margin-bottom: 0.5rem;">
                        <p class="folios" style="padding: 10px;margin:0;"><strong>Nombre :</strong>{{ $nota->Cliente->nombre }} / <strong>Correo :</strong>{{ $nota->Cliente->correo  }}/ <strong>Telefono :</strong>{{ $nota->Cliente->telefono   }} / <strong>Direccion : </strong>{{ $nota->Cliente->direccion }} </p>
                    </div>
                </td>

            </tr>
        </tbody>
    </table>

    @php
        $mostrarInstalacion = false;
        $mostrarEnvio = false;

        foreach ($nota_productos as $item) {
            if (!empty($item->instalacion)) {
                $mostrarInstalacion = true;
            }
            if (!empty($nota->envio)) {
                $mostrarEnvio = true;
            }
        }
    @endphp

<table class="container" align="center" style="">
    <thead class="text-center" style="background-color: #00EEA8; color: #000000">
        <tr>
            <th style="border: 1px solid black;border-collapse: collapse;padding:20px;">Producto</th>
            <th style="border: 1px solid black;border-collapse: collapse;padding:20px;">Descripción</th>
            <th style="border: 1px solid black;border-collapse: collapse;padding:20px;">Costo unitario</th>
            <th style="border: 1px solid black;border-collapse: collapse;padding:20px;">Cantidad</th>
            <th style="border: 1px solid black;border-collapse: collapse;padding:20px;">Costo total</th>
            </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($nota_productos as $item)
            @php
                $unitario = $nota->subtotal / $nota->cantidad_letreros;
            @endphp

            <tr>
                <td style="border: 1px solid black;border-collapse: collapse;">
                    @foreach ($fotos as $foto)
                        <p>
                            <img src="{{ asset('materiales/'.$foto->foto) }}" alt="" width="130px"> <br>
                        </p>
                    @endforeach
                </td>

                <td style="" style="border: 1px solid black;border-collapse: collapse;padding:20px;font-size:13px;line-height: 1;">
                   <b> {{ $nota->nombre_empresa }}</b> <br><br>
                    {{ $item['Servicio']->descripcion }}
                    @if($nota->instalacion_aparte != 1)
                    <br><br> Instalación en área metropolitana no mayor
                        a 3 mts de altura.
                    @endif
                    @if($nota->envio_externo != 1)
                    <br><br>  Incluye entrega en area metropolitana
                    @endif
                </td>

                <td style="border: 1px solid black;border-collapse: collapse;">
                    @php
                        if($nota->instalacion_aparte == 1 && $nota->envio_externo == 1){
                            $resta = $unitario - $nota->envio - $nota->instalacion;
                            $resta_subtotal = $nota->subtotal - $nota->envio - $nota->instalacion;
                        }
                        if($nota->instalacion_aparte == 1 && $nota->envio_externo != 1){
                            $resta = $unitario - $nota->instalacion;
                            $resta_subtotal = $nota->subtotal - $nota->instalacion;
                        }
                        if($nota->instalacion_aparte != 1 && $nota->envio_externo == 1){
                            $resta = $unitario - $nota->envio;
                            $resta_subtotal = $nota->subtotal - $nota->envio;
                        }
                        if($nota->instalacion_aparte != 1 && $nota->envio_externo != 1){
                            $resta = $unitario;
                            $resta_subtotal = $nota->subtotal;
                        }
                    @endphp
                        ${{ number_format($resta, 1) }}
                </td>

                <td style="border: 1px solid black;border-collapse: collapse;">{{$nota->cantidad_letreros}}</td>

                <td style="border: 1px solid black;border-collapse: collapse;">${{ number_format($resta_subtotal, 1) }}</td>
            </tr>

            @if ($nota->instalacion_aparte == 1)
                <tr>
                    <td style="border: 1px solid black;border-collapse: collapse;">
                        <b>Instalacion</b>
                    </td>

                    <td style="" style="border: 1px solid black;border-collapse: collapse;padding:20px;font-size:13px;line-height: 1;">
                        {{ $nota->mensaje_instalacion }}
                    </td>

                    <td style="border: 1px solid black;border-collapse: collapse;">${{ number_format($nota->instalacion, 1) }}</td>

                    <td style="border: 1px solid black;border-collapse: collapse;">1</td>

                    <td style="border: 1px solid black;border-collapse: collapse;">${{ number_format($nota->instalacion, 1) }}</td>
                </tr>
            @endif

            @if ($nota->envio_externo == 1)
                <tr>
                    <td style="border: 1px solid black;border-collapse: collapse;">
                        <b>Envio</b>
                    </td>

                    <td style="" style="border: 1px solid black;border-collapse: collapse;padding:20px;font-size:13px;line-height: 1;">
                        {{ $nota->mensaje_envio }}
                    </td>

                    <td style="border: 1px solid black;border-collapse: collapse;">${{ number_format($nota->envio, 1) }}</td>

                    <td style="border: 1px solid black;border-collapse: collapse;">1</td>

                    <td style="border: 1px solid black;border-collapse: collapse;">${{ number_format($nota->envio, 1) }}</td>
                </tr>
            @endif
        @endforeach


        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right">
                Subtotal: <br>
                IVA: <br>
                Total: <br>
            </td>
            <td>
                <label style="border: 1px solid black;border-collapse: collapse;padding-top: 4px;padding-left: 40px;padding-right: 40px;">${{ number_format($nota->subtotal, 2) }}</label><br>
                <label style="border: 1px solid black;border-collapse: collapse;padding-top: 3px;padding-left: 46px;padding-right: 46px;">${{ number_format($nota->iva_total, 2) }}</label><br>
                <label style="border: 1px solid black;border-collapse: collapse;padding-top: 3px;padding-left: 40px;padding-right: 40px;">${{ number_format($nota->total, 2) }}</label>
            </td>
        </tr>
</table>

<table class="container" align="center" style="border: 1px solid black;border-collapse: collapse;" style="margin-top: 5rem">
    <tr>
                    <td valign='top' dir="ltr"style='font-size: 15px;width:540px;line-height:22px;padding:0px;border-top:2px solid #3c434a;border-right:2px solid #3c434a;border-bottom:2px solid #3c434a;border-left:2px solid #3c434a;'>
                        <div
                            class='text-item '>
                            <p class="terminos">
                               <strong> Términos y condiciones:</strong><br><br>
                                1. Todo proyecto requiere como mínimo el <strong>70% de anticipo y a contra entrega el 30% restante.</strong><br>
                                2. Por ningún motivo se realizan instalaciones sin liquidación.<br>
                                3. Todas nuestras obras e instalaciones tienen 6 meses de garantía a excepción de <strong>productos eléctricos (fuentes de poder, iluminación RGB,
                                    conexiones electrónicas, etc.)</strong> o tonos de impresión y pintura sin previo aviso.<br>
                                4. En el caso de las impresiones a base de <strong>Pantone Matching System (PMS)</strong> o colores específicos, es necesario indicar si requieren una muestra
                                (con costo adicional) antes de imprimir el proyecto, ya que no nos hacemos responsable del o los tonos que lea la máquina de acuerdo con el archivo
                                enviado, por lo tanto, no estará dentro de la garantía.<br>
                                5. Una vez autorizado el proyecto no hay devoluciones.<br>
                                6. La entrega o instalación del proyecto a realizar, tiempo estimada de 5 a 10 días hábiles.<br>
                                7. Esta cotización tiene vigencia de 45 días para respetar el costo.<br>
                            </p>
                        </div>
                    </td>
                </tr>
    </table>

</body>
</html>
