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
        .text-right {
            text-align: right;
        }
        .heading {
            color: #683cc0;
        }
        .client-details {
            background-color: #683cc0;
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
    </style>
</head>
<body>
    <table class="container" align="center">
        <tbody>
            <tr>
                <td class="section" id="body_content">
                    <div class="image text-center">
                        <a href="https://imaginarte3d.com.mx/wp-content/uploads/2022/01/cropped-new-log.png" target="_blank">
                            <img alt="" width="265" src='https://imnasmexico.com/new/wp-content/uploads/2024/08/logo_imaginarte.png' / style="margin: auto">
                        </a>
                    </div>
                </td>

                <td>
                    <div class="text-item text-right heading">
                        <p><strong>COTIZACIÓN</strong></p>
                    </div>
                    <div class="text-item text-right">
                        <p>Folio :  # @if ($nota->folio == null) {{ $nota->id }} @else {{ $nota->folio }} @endif</p>
                        <p>Fecha : {{ $fechaFormateada; }}</p>
                        <p>Vendedor : Maritzel</p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="container" align="center">
        <tbody>
            <tr>
                <td class="section" id="body_content"style="margin: 0;padding:0;">
                    <div class="text-item client-details text-center" style="margin: 0;padding:0;">
                        <p style="margin: 0;padding:0;">Datos del Cliente</p>
                    </div>
                    <div class="details">
                        <p><strong>Nombre :</strong>{{ $nota->Cliente->nombre }} / <strong>Correo :</strong>{{ $nota->Cliente->correo  }}/ <strong>Telefono :</strong>{{ $nota->Cliente->telefono   }} / <strong>Dieccion : </strong>{{ $nota->Cliente->direccion }} <strong>{{ $nota->nombre_empresa }}</strong> </p>
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

<table class="container" align="center">
    <thead class="text-center" style="background-color: #00ffa0; color: #000000">
        <tr>
            <th>Producto</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Costo unitario</th>
            <th>Costo total</th>
            </tr>
    </thead>
    <tbody class="text-center">
        @php
            $totalSubtotal = 0;
            $totalIVA = 0;
            $totalGeneral = 0;
        @endphp

        @foreach ($nota_productos as $item)
            @php
                if ($item->cantidad == 0) {
                    $unitario = $item->total / 1;
                } else {
                    $unitario = $item->total / $item->cantidad;
                }

                $totalSubtotal += $item->total;
                $totalIVA += $item->total_iva;
                $totalGeneral += $item->subtotal_iva;
            @endphp

            <tr>
                <td>
                    <p>
                        <img src="{{ asset('imagen_serv/'.$item->Servicio->imagen) }}" alt="" width="130px"> <br>
                    </p>
                </td>

                <td>
                    {{ $item->Servicio->descripcion }}
                    @if($mostrarInstalacion)
                       ${{ number_format($item->instalacion ?? 0, 1) }}
                    @endif
                </td>

                <td>{{ $item->cantidad }}</td>

                <td>${{ number_format($unitario, 2) }}</td>


                <td>${{ number_format($item->total, 1) }}</td>


            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr style="background-color: #ffffff;">
            <td style="text-align: right"><b>Subtotal</b></td>
            <td>${{ number_format($totalSubtotal, 1) }}</td>
        </tr>
        <tr style="background-color: #ffffff;">
            <td style="text-align: right"><b>IVA</b></td>
            <td>${{ number_format($totalIVA, 1) }}</td>
        </tr>
        <tr style="background-color: #ffffff;">
            <td style="text-align: right"><b>Total</b></td>
            <td>${{ number_format($totalGeneral, 1) }}</td>
        </tr>
    </tfoot>
</table>

    <table class="html_text" align='center' width='100%' border='0' cellpadding='0' cellspacing="0" style='border-collapse:separate;'>
                <tr>
                    <td valign='top' dir="ltr"style='font-size: 15px;width:540px;line-height:22px;background-image:none;padding:15px 5px 14px;border-radius:6px;border-top:2px solid #3c434a;border-right:2px solid #3c434a;border-bottom:2px solid #3c434a;border-left:2px solid #3c434a;'>
                        <div
                            class='text-item '>
                            <p>
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
