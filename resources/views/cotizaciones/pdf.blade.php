<!doctype html>
<html lang="en">
<head>
  <style>
        body{
            font-family: sans-serif;
        }
        @page {
            margin: 160px 50px;
        }
        header {
            position: fixed;
            left: 0px;
            top: -160px;
            right: 0px;
            height: 100px;
            background-color: #7f5adc;
            color: #fff;
            text-align: center;
        }
        header h1{
            margin: 10px 0;
        }
        header h2{
            margin: 0 0 10px 0;
        }
        footer {
            position: fixed;
            left: -50px;
            bottom: -160px;
            right: -50px;
            height: 180px;
            background-color: #7f5adcaf;
            color: #fff
        }
        footer .page:after {
            content: counter(page);
        }
        footer table {
            width: 100%;
        }
        footer p {
            text-align: right;
        }
        footer .izq {
            text-align: left;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #F7EAED;
        }
  </style>
<body>
  <header>
    <h1>Cotización #@if ($nota->folio == null) {{ $nota->id }} @else {{ $nota->folio }} @endif</h1>
    <h3>Publicidad que destaca. Fabricamos, instalamos y potencializamos tu marca.</h3>
  </header>

  <footer>
    <table>
        <tr>
            <td>
                <p class="izq">
                <h2>Datos de contacto</h2>
                <b for="">Razon Social:</b> {{ $nota->razon_social }} <br>
                <b for="">Correo Factura:</b> {{ $nota->correo_fac }} <br>
                <b for="">Telefono Factura:</b> {{ $nota->telefono_fac }} <br>
                </p>
            </td>
            <td>
                <p class="page">
                    <img src="https://imaginarte3d.com.mx/wp-content/uploads/2022/01/cropped-new-log.png" class="navbar-brand-img h-100" alt="main_logo">
                </p>
            </td>
        </tr>
    </table>
  </footer>

  <div id="content">

    <table class="table text-center table-bordered border-primary">
        <thead >
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
           <tr>
            <td>
                    {{ $nota->Cliente->nombre }}
            </td>
            <td>
                    {{ $nota->Cliente->correo }}
            </td>
            <td>
                    {{ $nota->Cliente->telefono }}
            </td>
            <td>
                Fecha: {{ date('d/n/y', strtotime($nota->fecha)) }}
            </td>
           </tr>
        </tbody>
    </table>

    <table class="table table-bordered border-primary">
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

    @if ($nota->factura == '1')
        <h2>Datos de Factura</h2>
        <b for="">Razon Social:</b> {{ $nota->razon_social }} <br>
        <b for="">RFC:</b> {{ $nota->rfc }} <br>
        <b for="">CFDI:</b> {{ $nota->cfdi }} <br>
        <b for="">Correo Factura:</b> {{ $nota->correo_fac }} <br>
        <b for="">Telefono Factura:</b> {{ $nota->telefono_fac }} <br>
        <b for="">Dirección:</b> {{ $nota->direccion_fac }}<br>
    @endif

    <h2>Términos y condiciones:</h2>
    1. Todo proyecto requiere como mínimo el 70% de anticipo y a contra entrega el 30% restante. <br>
    2. Por ningún motivo se realizan instalaciones sin liquidación.<br>
    3. Todas nuestras obras e instalaciones tienen 6 meses de garantía a excepción de productos eléctricos (fuentes de
    poder, iluminación RGB, conexiones electrónicas, etc.) o tonos de impresión y pintura sin previo aviso.<br>
    4. En el caso de las impresiones a base de Pantone Matching System (PMS) o colores específicos, es necesario indicar
    si requieren una muestra (con costo adicional) antes de imprimir el proyecto, ya que no nos hacemos responsable del o los
    tonos que lea la máquina de acuerdo con el archivo enviado, por lo tanto, no estará dentro de la garantía.<br>
    5. Una vez autorizado el proyecto no hay devoluciones.<br>
    6. La entrega o instalación del proyecto a realizar, tiempo estimada de 5 a 10 días hábiles.<br>
    7. Esta cotización tiene vigencia de 45 días para respetar el costo.<br>
  </div>
</body>
</html>
