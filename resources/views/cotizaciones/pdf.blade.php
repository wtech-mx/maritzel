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
    <title>Cotización Imaginarte 3D @if ($nota->folio == null) {{ $nota->id }} @else {{ $nota->folio }} @endif</title>
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
                        <p><strong>Nombre :</strong>{{ $nota->Cliente->nombre }}</p>
                        <p><strong>Correo :</strong>{{ $nota->Cliente->correo  }}</p>
                        <p><strong>Telefono :</strong>{{ $nota->Cliente->telefono   }}</p>
                        <p><strong>Direccion :  </strong>Av vasco de Quiroga 1235</p>
                    </div>
                </td>

                <td>
                    <div class="text-item client-details text-center">
                        <p>Datos del Facturacion</p>
                    </div>
                    <div class="details">
                        <p><strong> Razon Social:</strong> {{ $nota->razon_social }}</p>
                        <p><strong> Correo Factura:</strong>{{ $nota->correo_fac }} </p>
                        <p><strong> Telefono Factura:</strong>{{ $nota->telefono_fac }}</p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="container" align="center">
        <thead class="text-center" style="background-color: #00ffa0; color: #000000">
            <tr>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Costo unitario</th>
                <th>Cantidad</th>
                <th>Costo total</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($nota_productos as $nota_producto)
                <tr>
                    <td>
                        {{ $nota_producto->foto }}
                    </td>
                    <td>
                        {{ $nota->nombre_empresa }} <br>
                        {{ $nota_producto->Servicio->descripcion }}
                    </td>
                    <td>
                        @php
                            $unitario = $nota_producto->total / $nota_producto->cantidad;
                        @endphp
                        {{ $unitario }}
                    </td>
                    <td>
                        {{ $nota_producto->cantidad }}
                    </td>
                    <td>
                        ${{ $nota_producto->total }}
                    </td>
                </tr>
           @endforeach
        </tbody>
        <tfoot >
            <tr style="background-color: #ffffff;">
                <td></td>
                <td></td>
                <td></td>
              <td style="text-align: right"><b>Subtotal</b> </td>
              <td>${{ $nota->subtotal }}</td>
            </tr>
            @if ($nota->descuento > 0)
                <tr style="background-color: #ffffff;">
                    <td></td>
                    <td></td>
                    <td></td>
                <td style="text-align: right"><b>Descuento</b> </td>
                <td>{{ $nota->descuento }}%</td>
                </tr>
            @endif
            @if ($nota->envio == NULL)
                <tr style="background-color: #ffffff;">
                    <td></td>
                    <td></td>
                    <td></td>
                <td style="text-align: right"><b>Envío</b> </td>
                <td>${{$nota->envio}}</td>
                </tr>
            @endif
            @if ($nota->factura == '1')
                <tr style="background-color: #ffffff;">
                    <td></td>
                    <td></td>
                    <td></td>
                <td style="text-align: right"><b>IVA</b> </td>
                <td>16%</td>
                </tr>
            @endif
            <tr style="background-color: #ffffff;">
                <td></td>
                <td></td>
                <td></td>
              <td style="text-align: right"><b>Total</b> </td>
              <td><b>${{ $nota->total }}</b> </td>
            </tr>
        </tfoot>
    </table>

    <table class="html_text" align='center' width='100%' border='0' cellpadding='0' cellspacing="0" style='border-collapse:separate;'>
                <tr>
                    <td valign='top' dir="ltr"style='font-size: 15px;width:540px;line-height:22px;background-image:none;padding:15px 5px 14px;border-radius:6px;border-top:2px solid #3c434a;border-right:2px solid #3c434a;border-bottom:2px solid #3c434a;border-left:2px solid #3c434a;'>
                        <div
                            class='text-item '>
                            <p><strong>Términos y condiciones:</strong></p>
                            <p>&nbsp;</p>
                            <p>1. Todo proyecto requiere como mínimo el <strong>70% de anticipo y a contra entrega el 30% restante.</strong></p>
                            <p>&nbsp;</p>
                            <p>2. Por ningún motivo se realizan instalaciones sin liquidación.</p>
                            <p>&nbsp;</p>
                            <p>3. Todas nuestras obras e instalaciones tienen 6 meses de garantía a excepción de <strong>productos eléctricos (fuentes de poder, iluminación RGB, conexiones electrónicas, etc.)</strong> o tonos de impresión y pintura sin previo aviso.</p>
                            <p>&nbsp;</p>
                            <p>4. En el caso de las impresiones a base de <strong>Pantone Matching System (PMS) o colores específicos,</strong> es necesario indicar si requieren una muestra (con costo adicional) antes de imprimir el proyecto, ya que no nos hacemos responsable del o los tonos que lea la máquina de acuerdo con el archivo enviado, por lo tanto, no estará dentro de la garantía.</p>
                            <p>&nbsp;</p>
                            <p>5. Una vez autorizado el proyecto no hay devoluciones.</p>
                            <p>&nbsp;</p>
                            <p>6. La entrega o instalación del proyecto a realizar, tiempo estimada de 5 a 10 días hábiles.</p>
                            <p>&nbsp;</p>
                            <p>7. Esta cotización tiene vigencia de 45 días para respetar el costo.</p>
                        </div>
                    </td>
                </tr>
    </table>

</body>
</html>
