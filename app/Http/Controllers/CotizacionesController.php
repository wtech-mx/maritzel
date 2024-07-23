<?php

namespace App\Http\Controllers;


use App\Models\Client;
use App\Models\Configuracion;
use App\Models\ServiciosCotizaciones;
use App\Models\Subclientes;
use App\Models\Servicios;
use App\Models\Cotizaciones;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use DB;

class CotizacionesController extends Controller
{
    public function index(){

        $cotizaciones_proceso = Cotizaciones::where('estatus_cotizacion','=','proceso')->get();
        $cotizaciones_pendiente = Cotizaciones::where('estatus_cotizacion','=','pendiente')->get();
        $cotizaciones_finalizado = Cotizaciones::where('estatus_cotizacion','=','finalizado')->get();
        $cotizaciones_aprovado = Cotizaciones::where('estatus_cotizacion','=','aprobada')->get();
        $cotizaciones_cancelado = Cotizaciones::where('estatus_cotizacion','=','cancelada')->get();

        return view('cotizaciones.index', compact('cotizaciones_proceso','cotizaciones_pendiente','cotizaciones_finalizado','cotizaciones_aprovado','cotizaciones_cancelado'));
    }

    public function create(){

        $clientes = Client::get();
        $servicios = Servicios::orderBy('nombre', 'desc')->get();

        return view('cotizaciones.create',compact('clientes','servicios'));
    }

    public function store(request $request){
        // Creacion de user
        $code = Str::random(8);

        $notas_productos = new Cotizaciones;

        if($request->get('nombre_cliente') == NULL){
            $cliente = $request->get('id_cliente');
        }else{
            $cliente = new Client;
            $cliente->nombre = $request->get('nombre_cliente');
            $cliente->correo = $request->get('correo_cliente');
            $cliente->telefono = $request->get('telefono_cliente');
            $cliente->save();

            $cliente = $cliente->id;
        }

        $notas_productos->id_cliente =  $cliente;
        $notas_productos->metodo_pago = $request->get('metodo_pago');
        $notas_productos->fecha = $request->get('fecha');
        $notas_productos->subtotal = $request->get('total');
        $notas_productos->descuento = $request->get('descuento');
        $notas_productos->total = $request->get('totalDescuento');
        $notas_productos->nota = $request->get('nota');
        $notas_productos->metodo_pago2 = $request->get('metodo_pago2');
        $notas_productos->monto = $request->get('monto');
        $notas_productos->monto2 = $request->get('monto2');
        $notas_productos->estatus_cotizacion = 'pendiente';
        $notas_productos->envio =  $request->get('envio');
        $notas_productos->tipo_nota = 'Cotizacion';
        $tipoNota = $notas_productos->tipo_nota;

        // Obtener todos los folios del tipo de nota específico
        $folios = Cotizaciones::where('tipo_nota', $tipoNota)->pluck('folio');

        // Extraer los números de los folios y encontrar el máximo
        $maxNumero = $folios->map(function ($folio) use ($tipoNota) {
            return intval(substr($folio, strlen($tipoNota[0])));
        })->max();

        // Si hay un folio existente, sumarle 1 al máximo número
        if ($maxNumero) {
            $numeroFolio = $maxNumero + 1;
        } else {
            // Si no hay un folio existente, empezar desde 1
            $numeroFolio = 1;
        }

        // Crear el nuevo folio con el tipo de nota y el número
        $folio = $tipoNota[0] . $numeroFolio;

        // Asignar el nuevo folio al objeto
        $notas_productos->folio = $folio;



        if($request->get('factura') != NULL){
            $notas_productos->factura = $request->get('factura');
            $notas_productos->razon_social = $request->get('razon_social');
            $notas_productos->rfc = $request->get('rfc');
            $notas_productos->cfdi = $request->get('cfdi');
            $notas_productos->correo_fac = $request->get('correo_fac');
            $notas_productos->telefono_fac = $request->get('telefono_fac');
            $notas_productos->direccion_fac = $request->get('direccion_fac');
        }

        $notas_productos->save();

        if ($request->has('cantidad')) {
            $cantidad = $request->input('cantidad');
            $producto = $request->input('producto');
            $dimenciones = $request->input('dimenciones');
            $subtotal = $request->input('subtotal');
            $precio_cm = $request->input('precio_cm');
            $total_precio_cm = $request->input('total_precio_cm');
            $material = $request->input('material');
            $utilidad = $request->input('utilidad');

            foreach ($cantidad as $index => $campo) {
                $notas_inscripcion = new ServiciosCotizaciones;
                $notas_inscripcion->id_notas_servicios = $notas_productos->id;
                $notas_inscripcion->id_servicios = $campo;
                $notas_inscripcion->producto = $notas_inscripcion->Servicio->nombre;
                $notas_inscripcion->cantidad = $cantidad[$index];
                $notas_inscripcion->total = $subtotal[$index];
                $notas_inscripcion->dimenciones_cm = $dimenciones[$index];
                $notas_inscripcion->precio_cm = $precio_cm[$index];
                $notas_inscripcion->total_precio_cm = $total_precio_cm[$index];
                $notas_inscripcion->material = $material[$index];
                $notas_inscripcion->utilidad = $utilidad[$index];
                $notas_inscripcion->save();
            }
        }

        return redirect()->route('index.cotizaciones')
        ->with('success', 'Se ha creado su cotizacion con exito');
    }

    public function update_estatus(Request $request, $id){
        $this->validate($request, [
            'estatus' => 'required',
        ]);

        $cotizaciones = Cotizaciones::find($id);
        $cotizaciones->estatus_cotizacion = $request->get('estatus');
        $cotizaciones->update();

        Session::flash('edit', 'Se ha editado sus datos con exito');
        return redirect()->route('index.cotizaciones')
            ->with('success', 'Estatus updated successfully');
    }

    public function edit($id){
        $cotizacion = Cotizaciones::find($id);
        $servicios_cotizacion = ServiciosCotizaciones::where('id_notas_servicios', '=', $id)->get();

        $clientes = Client::get();
        $servicios = Servicios::orderBy('nombre', 'desc')->get();

        return view('cotizaciones.edit', compact('cotizacion', 'servicios_cotizacion', 'clientes','servicios'));
    }

    public function update(Request $request, $id){
        $nuevosCampos = $request->input('campo');
        $nuevosCampos2 = $request->input('campo4');
        $nuevosCampos5 = $request->input('campo5');
        $nuevosCampos3 = $request->input('campo3');
        $nuevosCampos4 = $request->input('descuento_prod');


        for ($count = 0; $count < count($nuevosCampos); $count++) {
            if($nuevosCampos[$count] != NULL){
                $cleanPrice = floatval(str_replace(['$', ','], '', $nuevosCampos2[$count]));
                if($nuevosCampos2[$count] == NULL){
                    $unitario = 0;
                }else{
                    $unitario = $cleanPrice / $nuevosCampos3[$count];
                }

                $notas_inscripcion = new ServiciosCotizaciones;
                $notas_inscripcion->id_notas_servicios = $id;
                $notas_inscripcion->id_servicios = $nuevosCampos[$count];
                $notas_inscripcion->producto = $notas_inscripcion->Servicio->nombre;
                $notas_inscripcion->price = $unitario;
                $notas_inscripcion->cantidad = $nuevosCampos3[$count];
                $notas_inscripcion->descuento = $nuevosCampos4[$count];
                $notas_inscripcion->dimenciones = $nuevosCampos5[$count];
                $notas_inscripcion->total = $cleanPrice;
                $notas_inscripcion->save();

            }
        }

        $producto = $request->input('productos');
        $price = $request->input('price');
        $cantidad = $request->input('cantidad');
        $descuento = $request->input('descuento');
        $dimenciones = $request->input('dimenciones');

        for ($count = 0; $count < count($producto); $count++) {
            $productos = ServiciosCotizaciones::where('producto', $producto[$count])
            ->where('id_notas_servicios', $id)
            ->firstOrFail();
            $precio = $price[$count];
            $cleanPrice2 = floatval(str_replace(['$', ','], '', $precio));

            $productos->price = $cleanPrice2;
            $productos->cantidad = $cantidad[$count];
            $productos->descuento = $descuento[$count];
            $productos->dimenciones = $dimenciones[$count];
            $productos->update();


        }

        $nota = Cotizaciones::findOrFail($id);
        $total_final = $request->get('total_final');
        $cleanPrice3 = floatval(str_replace(['$', ','], '', $total_final));
        $cleanPrice4 = floatval(str_replace(['$', ','], '', $request->get('subtotal_final')));
        $nota->subtotal = $cleanPrice4;
        $nota->total = $cleanPrice3;
        $nota->save();

        return redirect()->back()->with('success', 'Se ha actualizado con exito');
    }

    public function imprimir($id){
        $diaActual = date('Y-m-d');
        $today =  date('d-m-Y');

        $nota = Cotizaciones::find($id);

        $nota_productos = ServiciosCotizaciones::where('id_notas_servicios', $id)->get();

        $pdf = \PDF::loadView('cotizaciones.pdf', compact('nota', 'today', 'nota_productos'));
        if($nota->folio == null){
            $folio = $nota->id;
        }else{
            $folio = $nota->folio;
        }
       //  return $pdf->stream();
        return $pdf->download('Cotizacion '. $folio .'/'.$today.'.pdf');
    }
}
