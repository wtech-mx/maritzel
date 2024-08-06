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
use PDF;

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
        $servicios = Servicios::where('id_categoria', '=', '1')->orderBy('nombre', 'desc')->get();

        return view('cotizaciones.create',compact('clientes','servicios'));
    }

    public function create_vinil(){

        $clientes = Client::get();
        $servicios = Servicios::where('id_categoria', '=', '2')->orderBy('nombre', 'desc')->get();

        return view('cotizaciones.cotizaciones_vinil',compact('clientes','servicios'));
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
        $notas_productos->fecha = $request->get('fecha');
        $notas_productos->nota = $request->get('nota');
        $notas_productos->estatus_cotizacion = 'pendiente';
        $notas_productos->envio =  $request->get('envio');
        $notas_productos->tipo_nota = 'Cotizacion';
        $tipoNota = $notas_productos->tipo_nota;
        $notas_productos->nombre_empresa = $request->get('nombre_empresa');

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
        $notas_productos->save();

        if ($request->has('cantidad') || $request->has('m2')) {
            $cantidad = $request->input('cantidad');
            $producto = $request->input('producto');
            $dimenciones = $request->input('dimenciones');
            $subtotal = $request->input('subtotal');
            $precio_cm = $request->input('precio_cm');
            $total_precio_cm = $request->input('total_precio_cm');
            $material = $request->input('material');
            $utilidad = $request->input('utilidad');
            $subtotalIva = $request->input('subtotalIva');
            $largo = $request->input('largo');
            $ancho = $request->input('ancho');
            $m2 = $request->input('m2');
            $iva = $request->input('iva');
            $totalIva = $request->input('totalIva');
            $instalacion = $request->input('instalacion');
            $total_instalacion = $request->input('total_instalacion');
            $imagen = $request->hasFile('imagen');


            foreach ($producto as $index => $campo) {
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
                $notas_inscripcion->subtotal_iva = $subtotalIva[$index];
                $notas_inscripcion->largo = $largo[$index];
                $notas_inscripcion->ancho = $ancho[$index];
                $notas_inscripcion->m2 = $m2[$index];
                $notas_inscripcion->iva = $iva[$index];
                $notas_inscripcion->total_iva = $totalIva[$index];
                $notas_inscripcion->instalacion = $instalacion[$index];
                $notas_inscripcion->total_instalacion = $total_instalacion[$index];

                if (isset($imagenes[$index])) { // Verifica si existe una imagen en este índice
                    $file = $imagenes[$index];
                    $path = public_path('materiales'); // Usar barra normal y sin concatenar comillas
                    $fileName = uniqid() . '_' . $file->getClientOriginalName();
                    $file->move($path, $fileName);
                    $notas_inscripcion->foto = $fileName;
                }
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

    public function update(Request $request, $id)
    {
        // Buscar la cotización existente
        $notas_productos = Cotizaciones::findOrFail($id);

        // Actualizar la información del cliente
        if ($request->get('nombre_cliente') != NULL) {
            $cliente = new Client;
            $cliente->nombre = $request->get('nombre_cliente');
            $cliente->correo = $request->get('correo_cliente');
            $cliente->telefono = $request->get('telefono_cliente');
            $cliente->save();

            $notas_productos->id_cliente = $cliente->id;
        } else {
            $notas_productos->id_cliente = $request->get('id_cliente');
        }

        // Actualizar la información de la cotización
        $notas_productos->fecha = $request->get('fecha');
        $notas_productos->nota = $request->get('nota');
        $notas_productos->envio = $request->get('envio');
        $notas_productos->nombre_empresa = $request->get('nombre_empresa');

        $notas_productos->update();

        // Eliminar productos anteriores asociados a la cotización
        ServiciosCotizaciones::where('id_notas_servicios', $id)->delete();

        // Guardar los nuevos productos
        if ($request->has('cantidad') || $request->has('m2')) {
            $cantidad = $request->input('cantidad');
            $producto = $request->input('producto');
            $dimenciones = $request->input('dimenciones');
            $subtotal = $request->input('subtotal');
            $precio_cm = $request->input('precio_cm');
            $total_precio_cm = $request->input('total_precio_cm');
            $material = $request->input('material');
            $utilidad = $request->input('utilidad');
            $subtotalIva = $request->input('subtotalIva');
            $largo = $request->input('largo');
            $ancho = $request->input('ancho');
            $m2 = $request->input('m2');
            $iva = $request->input('iva');
            $totalIva = $request->input('totalIva');
            $instalacion = $request->input('instalacion');
            $total_instalacion = $request->input('total_instalacion');
            $imagenes = $request->file('imagen');

            foreach ($producto as $index => $campo) {
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
                $notas_inscripcion->subtotal_iva = $subtotalIva[$index];
                $notas_inscripcion->largo = $largo[$index];
                $notas_inscripcion->ancho = $ancho[$index];
                $notas_inscripcion->m2 = $m2[$index];
                $notas_inscripcion->iva = $iva[$index];
                $notas_inscripcion->total_iva = $totalIva[$index];
                $notas_inscripcion->instalacion = $instalacion[$index];
                $notas_inscripcion->total_instalacion = $total_instalacion[$index];

                if (isset($imagenes[$index])) { // Verifica si existe una imagen en este índice
                    $file = $imagenes[$index];
                    $path = public_path('materiales'); // Usar barra normal y sin concatenar comillas
                    $fileName = uniqid() . '_' . $file->getClientOriginalName();
                    $file->move($path, $fileName);
                    $notas_inscripcion->foto = $fileName;
                }
                $notas_inscripcion->save();
            }
        }

        return redirect()->back()->with('success', 'Se ha actualizado con éxito');
    }


    public function imprimir($id){
        $today =  date('d-m-Y');

        $nota = Cotizaciones::find($id);

        $nota_productos = ServiciosCotizaciones::where('id_notas_servicios', $id)->get();

        $pdf = \PDF::loadView('cotizaciones.pdf', compact('nota', 'today', 'nota_productos'))->setPaper([0, 0, 700, 600], 'landscape');

        if($nota->folio == null){
            $folio = $nota->id;
        }else{
            $folio = $nota->folio;
        }
       //  return $pdf->stream();

       return $pdf->stream();

    }
}
