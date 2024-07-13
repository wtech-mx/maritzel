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
            $cliente->id_empresa = auth()->user()->id_empresa;
            $cliente->save();

            $cliente = $cliente->id;
        }

        $descuento = floatval($request->get('descuento', 0));
        $envio = $request->get('envio');
        $nuevosCampos4 = $request->input('campo4', []);
        $nuevosCampos4 = array_map('floatval', $nuevosCampos4); // Convierte a números
        $sumaCampo4 = array_sum($nuevosCampos4);

        // Aplicar descuento si $descuento es mayor que 0
        if ($descuento > 0) {
            $descuentoAplicado = $sumaCampo4 * ($descuento / 100);
            $totalDesc = ($envio + $sumaCampo4) - $descuentoAplicado;
            if($request->get('factura') == NULL){
                $factura = 0;
                $totalConDescuento = $totalDesc;
            }else{
                $factura = $totalDesc * .16;
                $totalConDescuento = $totalDesc + $factura;
            }
        } else {
            $descuentoAplicado = 0;
            $totalDesc = $envio + $sumaCampo4;
            if($request->get('factura') == NULL){
                $factura = 0;
                $totalConDescuento = $totalDesc;
            }else{
                $factura = $totalDesc * .16;
                $totalConDescuento = $totalDesc + $factura;
            }
        }

        $notas_productos->id_cliente =  $cliente;
        $notas_productos->metodo_pago = $request->get('metodo_pago');
        $notas_productos->fecha = $request->get('fecha');
        $notas_productos->subtotal = $sumaCampo4;
        $notas_productos->restante = $request->get('descuento');
        $notas_productos->total = $totalConDescuento;
        $notas_productos->nota = $request->get('nota');
        $notas_productos->metodo_pago2 = $request->get('metodo_pago2');
        $notas_productos->monto = $request->get('monto');
        $notas_productos->monto2 = $request->get('monto2');
        $notas_productos->estatus_cotizacion = 'pendiente';

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

        $notas_productos->envio =  $request->get('envio');


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

        if ($request->has('campo')) {
            $nuevosCampos = $request->input('campo');
            $nuevosCampos2 = $request->input('campo4');
            $nuevosCampos5 = $request->input('campo5');
            $nuevosCampos3 = $request->input('campo3');
            $nuevosCampos4 = $request->input('descuento_prod');

            foreach ($nuevosCampos as $index => $campo) {
                $notas_inscripcion = new ServiciosCotizaciones;
                $notas_inscripcion->id_notas_servicios = $notas_productos->id;
                $notas_inscripcion->producto = $campo;
                $notas_inscripcion->price = $nuevosCampos2[$index];
                $notas_inscripcion->cantidad = $nuevosCampos3[$index];
                $notas_inscripcion->descuento = $nuevosCampos4[$index];
                $notas_inscripcion->dimenciones = $nuevosCampos5[$index];
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

        return view('cotizaciones.edit', compact('cotizacion', 'documentacion', 'clientes','gastos_extras', 'gastos_ope'));
    }

    public function update(Request $request, $id){


        Session::flash('edit', 'Se ha editado sus datos con exito');
        return redirect()->back()
            ->with('success', 'Estatus updated successfully');
    }


}
