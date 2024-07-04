<?php

namespace App\Http\Controllers;

use App\Models\Asignaciones;
use App\Models\Bancos;
use App\Models\Client;
use App\Models\ComprobanteGastos;
use App\Models\Configuracion;
use App\Models\Coordenadas;
use App\Models\Cotizaciones;
use App\Models\DocumCotizacion;
use App\Models\Empresas;
use App\Models\Equipo;
use App\Models\GastosExtras;
use App\Models\GastosOperadores;
use App\Models\Operador;
use App\Models\Proveedor;
use App\Models\Subclientes;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use DB;

class CotizacionesController extends Controller
{
    public function index(){

        $cotizaciones = Cotizaciones::where('id_empresa' ,'=',auth()->user()->id_empresa)->where('estatus','=','Pendiente')->orderBy('created_at', 'desc')->get();
        $cotizaciones_aprovadas = Cotizaciones::where('id_empresa' ,'=',auth()->user()->id_empresa)->where('estatus','=','Aprobada')
        ->where(function($query) {
            $query->where('estatus_planeacion', '=', 0)
                  ->orWhere('estatus_planeacion', '=', NULL);
        })->orderBy('created_at', 'desc')->get();
        $cotizaciones_canceladas = Cotizaciones::where('id_empresa' ,'=',auth()->user()->id_empresa)->where('estatus','=','Cancelada')->orderBy('created_at', 'desc')->get();
        $cotizaciones_planeadas = Cotizaciones::where('id_empresa' ,'=',auth()->user()->id_empresa)->where('estatus','=','Aprobada')->where('estatus_planeacion','=', 1)->orderBy('created_at', 'desc')->get();
        $cotizaciones_finalizadas = Cotizaciones::where('id_empresa' ,'=',auth()->user()->id_empresa)->where('estatus','=','Finalizado')->orderBy('created_at', 'desc')->get();

        $equipos_dolys = Equipo::where('id_empresa' ,'=',auth()->user()->id_empresa)->where('tipo','=','Dolys')->get();
        $equipos_chasis = Equipo::where('id_empresa' ,'=',auth()->user()->id_empresa)->where('tipo','=','Chasis / Plataforma')->get();
        $equipos_camiones = Equipo::where('id_empresa' ,'=',auth()->user()->id_empresa)->where('tipo','=','Tractos / Camiones')->get();
        $operadores = Operador::get();
        $bancos = Bancos::get();
        $proveedores = Proveedor::get();
        $empresas = Empresas::get();

        return view('cotizaciones.index', compact('empresas', 'proveedores','bancos','operadores','equipos_dolys','equipos_chasis','equipos_camiones','cotizaciones','cotizaciones_aprovadas','cotizaciones_canceladas', 'cotizaciones_planeadas','cotizaciones_finalizadas'));
    }

    public function create(){
        $clientes = Client::where('id_empresa' ,'=',auth()->user()->id_empresa)->get();

        return view('cotizaciones.create',compact('clientes'));
    }

    public function getSubclientes($clienteId)
    {
        // Buscar los subclientes asociados al cliente
        $subclientes = Subclientes::where('id_empresa' ,'=',auth()->user()->id_empresa)->where('id_cliente', $clienteId)->get();

        // Devolver los subclientes en formato JSON
        return response()->json($subclientes);
    }

    public function store(Request $request){
        $this->validate($request, [
            'origen' => 'required',
            'destino' => 'required',
            'tamano' => 'required'
        ]);

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

        $cotizaciones = new Cotizaciones;
        $cotizaciones->id_cliente = $cliente;
        $cotizaciones->id_subcliente = $request->get('id_subcliente');
        $cotizaciones->origen = $request->get('origen');
        $cotizaciones->destino = $request->get('destino');
        $cotizaciones->tamano = $request->get('tamano');
        $cotizaciones->peso_contenedor = $request->get('peso_contenedor');

        $cotizaciones->otro = $request->get('otro');
        $cotizaciones->fecha_modulacion = $request->get('fecha_modulacion');
        $cotizaciones->fecha_entrega = $request->get('fecha_entrega');
        $cotizaciones->iva = $request->get('iva');
        $cotizaciones->retencion = $request->get('retencion');
        $cotizaciones->peso_reglamentario = $request->get('peso_reglamentario');
        $cotizaciones->precio_sobre_peso = $request->get('precio_sobre_peso');
        $cotizaciones->sobrepeso = $request->get('sobrepeso');
        $cotizaciones->estatus = 'Pendiente';
        $cotizaciones->precio_viaje = $request->get('precio_viaje');
        $cotizaciones->burreo = $request->get('burreo');
        $cotizaciones->maniobra = $request->get('maniobra');
        $cotizaciones->estadia = $request->get('estadia');
        $cotizaciones->base_factura = $request->get('base_factura');
        $cotizaciones->base_taref = $request->get('base_taref');

        $precio_tonelada = str_replace(',', '', $request->get('precio_tonelada'));
        $cotizaciones->precio_tonelada = $precio_tonelada;

        $total = str_replace(',', '', $request->get('total'));
        $cotizaciones->total = $total;
        $cotizaciones->restante = $cotizaciones->total;
        $cotizaciones->estatus_pago = '0';
        $cotizaciones->save();

        $docucotizaciones = new DocumCotizacion;
        $docucotizaciones->id_cotizacion = $cotizaciones->id;
        $docucotizaciones->num_contenedor = $request->get('num_contenedor');
        $docucotizaciones->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->route('index.cotizaciones')
            ->with('success', 'Cotizacion created successfully.');

    }

    public function update_estatus(Request $request, $id){
        $this->validate($request, [
            'estatus' => 'required',
        ]);

        $cotizaciones = Cotizaciones::find($id);
        $cotizaciones->estatus = $request->get('estatus');
        $cotizaciones->estatus_planeacion = null;
        $cotizaciones->update();


        if($request->get('estatus') == 'Cancelada' || $request->get('estatus') == 'Pendiente'){
            if($cotizaciones->DocCotizacion){
                if($cotizaciones->DocCotizacion->Asignaciones){
                    $asignaciones_id = $cotizaciones->DocCotizacion->Asignaciones->id;
                    $asignaciones = Asignaciones::find($asignaciones_id);

                        $asignaciones->fecha_inicio = null;
                        $asignaciones->fecha_fin = null;

                    $asignaciones->update();
                }
            }
        }

        Session::flash('edit', 'Se ha editado sus datos con exito');
        return redirect()->route('index.cotizaciones')
            ->with('success', 'Estatus updated successfully');
    }

    public function edit($id){
        $cotizacion = Cotizaciones::where('id', '=', $id)->first();
        $documentacion = DocumCotizacion::where('id_cotizacion', '=', $cotizacion->id)->first();
        $gastos_extras = GastosExtras::where('id_cotizacion', '=', $cotizacion->id)->get();
        $clientes = Client::where('id_empresa' ,'=',auth()->user()->id_empresa)->get();
        $gastos_ope = GastosOperadores::where('id_cotizacion', '=', $cotizacion->id)->get();

        return view('cotizaciones.edit', compact('cotizacion', 'documentacion', 'clientes','gastos_extras', 'gastos_ope'));
    }

    public function pdf($id){
        $cotizacion = Cotizaciones::where('id', '=', $id)->first();
        $documentacion = DocumCotizacion::where('id_cotizacion', '=', $cotizacion->id)->first();
        $gastos_extras = GastosExtras::where('id_cotizacion', '=', $cotizacion->id)->get();
        $clientes = Client::get();
        $configuracion = Configuracion::first();
        $bancos_oficiales = Bancos::where('tipo', '=', 'Oficial')->get();
        $bancos_no_oficiales = Bancos::where('tipo', '=', 'No Oficial')->get();

        $fecha = date('Y-m-d');
        $fechaCarbon = Carbon::parse($fecha);

        $pdf = \PDF::loadView('cotizaciones.pdf', compact('cotizacion', 'documentacion', 'clientes','gastos_extras', 'configuracion', 'fechaCarbon', 'bancos_oficiales', 'bancos_no_oficiales'));
        //return $pdf->stream();
        return $pdf->download('cotizacion'.$cotizacion->Cliente->nombre.'_#'.$cotizacion->id.'.pdf');
    }


    public function update(Request $request, $id){

        $doc_cotizaciones = DocumCotizacion::where('id_cotizacion', '=', $id)->first();
        $doc_cotizaciones->num_contenedor = $request->get('num_contenedor');
        $doc_cotizaciones->terminal = $request->get('terminal');
        $doc_cotizaciones->num_autorizacion = $request->get('num_autorizacion');
        $doc_cotizaciones->num_boleta_liberacion = $request->get('num_boleta_liberacion');
        $doc_cotizaciones->num_doda = $request->get('num_doda');
        $doc_cotizaciones->num_carta_porte = $request->get('num_carta_porte');
        $doc_cotizaciones->boleta_vacio = $request->get('boleta_vacio');
        $doc_cotizaciones->fecha_boleta_vacio = $request->get('fecha_boleta_vacio');
        $doc_cotizaciones->eir = $request->get('eir');

        if ($request->hasFile("doc_eir")) {
            $file = $request->file('doc_eir');
            $path = public_path() . '/cotizaciones/cotizacion'. $id;
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $doc_cotizaciones->doc_eir = $fileName;
        }

        if ($request->hasFile("boleta_liberacion")) {
            $file = $request->file('boleta_liberacion');
            $path = public_path() . '/cotizaciones/cotizacion'. $id;
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $doc_cotizaciones->boleta_liberacion = $fileName;
        }

        if ($request->hasFile("doda")) {
            $file = $request->file('doda');
            $path = public_path() . '/cotizaciones/cotizacion'. $id;
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $doc_cotizaciones->doda = $fileName;
        }

        $doc_cotizaciones->ccp = $request->get('ccp');

        if ($request->hasFile("doc_ccp")) {
            $file = $request->file('doc_ccp');
            $path = public_path() . '/cotizaciones/cotizacion'. $id;
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $doc_cotizaciones->doc_ccp = $fileName;
        }

        $doc_cotizaciones->update();

        $cotizaciones = Cotizaciones::where('id', '=', $id)->first();
        $cotizaciones->id_cliente = $request->get('id_cliente');
        $cotizaciones->id_subcliente = $request->get('id_subcliente');
        $cotizaciones->origen = $request->get('cot_origen');
        $cotizaciones->destino = $request->get('cot_destino');
        $cotizaciones->burreo = $request->get('cot_burreo');
        $cotizaciones->estadia = $request->get('cot_estadia');
        $cotizaciones->fecha_modulacion = $request->get('cot_fecha_modulacion');
        $cotizaciones->fecha_entrega = $request->get('cot_fecha_entrega');
        $cotizaciones->precio_viaje = $request->get('cot_precio_viaje');
        $cotizaciones->tamano = $request->get('cot_tamano');
        $cotizaciones->peso_contenedor = $request->get('cot_peso_contenedor');
        $cotizaciones->maniobra = $request->get('cot_maniobra');
        $cotizaciones->otro = $request->get('cot_otro');
        $cotizaciones->iva = $request->get('cot_iva');
        $cotizaciones->retencion = $request->get('cot_retencion');
        $cotizaciones->bloque = $request->get('bloque');
        $cotizaciones->bloque_hora_i = $request->get('bloque_hora_i');
        $cotizaciones->bloque_hora_f = $request->get('bloque_hora_f');
        $cotizaciones->peso_reglamentario = $request->get('peso_reglamentario');
        $cotizaciones->fecha_eir = $request->get('fecha_eir');
        $cotizaciones->base_factura = $request->get('base_factura');
        $cotizaciones->base_taref = $request->get('base_taref');

        if($request->get('cot_peso_contenedor') > $request->get('peso_reglamentario')){
            $sobrepeso = $request->get('cot_peso_contenedor') - $request->get('peso_reglamentario');
        }else{
            $sobrepeso = 0;
        }
        $cotizaciones->sobrepeso = $sobrepeso;
        $precio_tonelada = str_replace(',', '', $request->get('precio_sobre_peso'));
        $cotizaciones->precio_sobre_peso = $precio_tonelada;
        $cotizaciones->precio_tonelada = $precio_tonelada * $sobrepeso;
        $total = ($cotizaciones->precio_tonelada + $request->get('cot_precio_viaje') + $request->get('cot_burreo') + $request->get('cot_maniobra') + $request->get('cot_estadia') + $request->get('cot_otro') + $request->get('cot_iva')) - $request->get('cot_retencion');
        $cotizaciones->total = $total;

        if ($request->hasFile("carta_porte")) {
            $file = $request->file('carta_porte');
            $path = public_path() . '/cotizaciones/cotizacion'. $id;
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $cotizaciones->carta_porte = $fileName;
        }

        if ($request->hasFile("img_boleta")) {
            $file = $request->file('img_boleta');
            $path = public_path() . '/cotizaciones/cotizacion'. $id;
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $cotizaciones->img_boleta = $fileName;
        }

        $cotizaciones->update();

        $gasto_descripcion = $request->input('gasto_descripcion');
        $gasto_monto = $request->input('gasto_monto');
        $ticket_ids = $request->input('ticket_id');

        for ($count = 0; $count < count($gasto_descripcion); $count++) {
            $data = array(
                'id_cotizacion' => $cotizaciones->id,
                'descripcion' => $gasto_descripcion[$count],
                'monto' => $gasto_monto[$count],
            );

            if (isset($ticket_ids[$count])) {
                // Actualizar el ticket existente
                $ticket = GastosExtras::findOrFail($ticket_ids[$count]);
                $ticket->update($data);
            } elseif($gasto_descripcion[$count] != NULL) {
                // Crear un nuevo ticket
                GastosExtras::create($data);
            }
        }

            // Convertir los valores a números si son cadenas
            // $maniobra = is_numeric($cotizaciones->maniobra) ? $cotizaciones->maniobra : 0;
            // $burreo = is_numeric($cotizaciones->burreo) ? $cotizaciones->burreo : 0;
            // $otro = is_numeric($cotizaciones->otro) ? $cotizaciones->otro : 0;
            // $estadia = is_numeric($cotizaciones->estadia) ? $cotizaciones->estadia : 0;
            // $precio_viaje = is_numeric($cotizaciones->precio_viaje) ? $cotizaciones->precio_viaje : 0;
            // $iva = is_numeric($cotizaciones->iva) ? $cotizaciones->iva : 0;

            // SUMA TOTAL DE COTIZACION
            $suma =  $cotizaciones->total;

            foreach ($gasto_monto as $monto) {
                // Convertir el valor a número si es una cadena
                $monto = is_numeric($monto) ? $monto : 0; // Si $monto no es numérico, se asume 0
                $suma += $monto;
            }
            $cotizaciones->total = $suma;
            $cotizaciones->restante = $cotizaciones->total;
            $cotizaciones->update();

            $asignacion = Asignaciones::where('id_contenedor', '=', $doc_cotizaciones->id)->first();

            if ($asignacion) {
                if($asignacion->id_proveedor == NULL){
                    $cantidad_ope = $request->input('cantidad_ope');
                    $tipo_ope = $request->input('tipo_ope');
                    $ticket_ids_ope = $request->input('ticket_id_ope');
                    $suma_cantidad_ope = 0;

                    for ($count = 0; $count < count($cantidad_ope); $count++) {
                        $suma_cantidad_ope += $cantidad_ope[$count];

                        $data = array(
                            'id_asignacion' => $asignacion->id,
                            'id_operador' => $asignacion->id_operador,
                            'id_cotizacion' => $cotizaciones->id,
                            'cantidad' => $cantidad_ope[$count],
                            'tipo' => $tipo_ope[$count],
                        );

                        if (isset($ticket_ids_ope[$count])) {
                            // Actualizar el ticket existente
                            $ticket = GastosOperadores::findOrFail($ticket_ids_ope[$count]);
                            $ticket->update($data);
                        } elseif($cantidad_ope[$count] != NULL) {
                            // Crear un nuevo ticket
                            GastosOperadores::create($data);
                        }
                    }

                    $suma_ope = ($asignacion->sueldo_viaje + $suma_cantidad_ope) - $asignacion->dinero_viaje;
                    $asignacion->pago_operador = $suma_ope;
                    $asignacion->restante_pago_operador = $suma_ope;
                    $asignacion->update();
                }else if($asignacion->id_operador == NULL){

                    $asignacion->precio = $request->get('precio_proveedor');
                    $asignacion->burreo = $request->get('burreo_proveedor');
                    $asignacion->maniobra = $request->get('maniobra_proveedor');
                    $asignacion->estadia = $request->get('estadia_proveedor');
                    $asignacion->otro = $request->get('otro_proveedor');
                    $asignacion->iva = $request->get('iva_proveedor');
                    $asignacion->retencion = $request->get('retencion_proveedor');
                    $asignacion->total_proveedor = $request->get('total_proveedor');
                    $asignacion->update();
                }
            }

        Session::flash('edit', 'Se ha editado sus datos con exito');
        return redirect()->back()
            ->with('success', 'Estatus updated successfully');
    }

    public function update_cambio(Request $request, $id){
        // Capturar todos los inputs
        $inputs = $request->all();

        // Encontrar el radio input seleccionado
        $tipo_cambio = null;
        foreach ($inputs as $key => $value) {
            if (strpos($key, 'formType') === 0 && $value) {
                $tipo_cambio = $value;
                break;
            }
        }


        $asignacion = Asignaciones::find($id);

        if ($tipo_cambio  == 'propio') {
            // Cambiar a propio
            $asignacion->id_proveedor = null;
            $asignacion->precio = null;
            $asignacion->burreo = null;
            $asignacion->maniobra = null;
            $asignacion->estadia = null;
            $asignacion->otro = null;
            $asignacion->iva = null;
            $asignacion->retencion = null;
            $asignacion->total_proveedor = null;
            $asignacion->id_camion = $request->camion;
            $asignacion->id_chasis = $request->chasis;
            $asignacion->id_dolys = $request->nuevoCampoDoly;
            $asignacion->id_operador = $request->operador;
            $asignacion->id_chasis2 = $request->chasisAdicional1;
            $asignacion->fecha_inicio = $request->fecha_inicio;
            $asignacion->fecha_fin = $request->fecha_fin . ' 23:00:00';
            $asignacion->sueldo_viaje = $request->sueldo_viaje;
            $asignacion->dinero_viaje = $request->dinero_viaje;
            $asignacion->id_banco1_dinero_viaje = $request->id_banco1_dinero_viaje;
            $asignacion->cantidad_banco1_dinero_viaje = $request->cantidad_banco1_dinero_viaje;
            $asignacion->id_banco2_dinero_viaje = $request->id_banco2_dinero_viaje;
            $asignacion->cantidad_banco2_dinero_viaje = $request->cantidad_banco2_dinero_viaje;
            $asignacion->id_banco1_pago_operador = $request->id_banco1_pago_operador;
            $asignacion->cantidad_banco1_pago_operador = $request->cantidad_banco1_pago_operador;
            $asignacion->id_banco2_pago_operador = $request->id_banco2_pago_operador;
            $asignacion->cantidad_banco2_pago_operador = $request->cantidad_banco2_pago_operador;
            $asignacion->fecha_pago_salida = date('Y-m-d');
            $asignacion->estatus_pagado = 'Pendiente Pago';
            $asignacion->update();
        } else if ($tipo_cambio  == 'subcontratado'){
            // Cambiar a subcontratado
            $asignacion->id_camion = null;
            $asignacion->id_chasis = null;
            $asignacion->id_dolys = null;
            $asignacion->id_operador = null;
            $asignacion->id_chasis2 = null;
            $asignacion->sueldo_viaje = null;
            $asignacion->dinero_viaje = null;
            $asignacion->id_banco1_dinero_viaje = null;
            $asignacion->cantidad_banco1_dinero_viaje = null;
            $asignacion->id_banco2_dinero_viaje = null;
            $asignacion->cantidad_banco2_dinero_viaje = null;
            $asignacion->id_banco1_pago_operador = null;
            $asignacion->cantidad_banco1_pago_operador = null;
            $asignacion->id_banco2_pago_operador = null;
            $asignacion->cantidad_banco2_pago_operador = null;
            $asignacion->fecha_pago_salida = null;
            $asignacion->fecha_pago_operador = null;
            // Actualizar otros campos según el formulario de subcontratado
            $asignacion->id_proveedor = $request->id_proveedor;
            $asignacion->precio = $request->precio;
            $asignacion->burreo = $request->cot_burreo;
            $asignacion->maniobra = $request->cot_maniobra;
            $asignacion->estadia = $request->cot_estadia;
            $asignacion->otro = $request->cot_otro;
            $asignacion->iva = $request->cot_iva;
            $asignacion->retencion = $request->cot_retencion;
            $asignacion->total_proveedor = $request->total_proveedor;
            $asignacion->fecha_inicio = $request->fecha_inicio_proveedor;
            $asignacion->fecha_fin = $request->fecha_fin_proveedor . ' 23:00:00';
            $asignacion->update();

            $doc = DocumCotizacion::where('id',  '=', $asignacion->id_contenedor)->first();

            $cotizacionesPorPagar = Cotizaciones::where('id', '=', $doc->id_cotizacion)->first();
            $cotizacionesPorPagar->prove_restante = $request->total_proveedor;
            $cotizacionesPorPagar->update();
        }



        return redirect()->back()->with('success', 'Ha sido cambiado exitosamente.');
    }

    public function cambiar_empresa(Request $request, $id){

        // Obtener la cotización actual
        $cotizacion = DB::table('cotizaciones')->where('id', $id)->first();

        // Obtener el id_cliente actual de la empresa anterior
        $idClienteAnterior = DB::table('clients')
            ->where('id', $cotizacion->id_cliente)
            ->value('id');

        // Obtener el correo del cliente anterior
        $correoCliente = DB::table('clients')
            ->where('id', $idClienteAnterior)
            ->value('correo');

        // Verificar si hay un cliente con el mismo correo en la nueva empresa
        $nuevoIdEmpresa = $request->get('id_empresa');
        $nuevoIdCliente = DB::table('clients')
            ->where('correo', $correoCliente)
            ->where('id_empresa', $nuevoIdEmpresa)
            ->value('id');

        if ($nuevoIdCliente) {
            $contenedor = DocumCotizacion::where('id_cotizacion',  '=', $cotizacion->id)->first();

            if ($contenedor) {
                $asignacionExiste = Asignaciones::where('id_contenedor', '=', $contenedor->id)->exists();

                if ($asignacionExiste) {
                    // Obtener la asignación correspondiente
                    $asignacion = Asignaciones::where('id_contenedor', '=', $contenedor->id)->first();

                    // Obtener los datos necesarios del request
                    $nuevoIdEmpresa = $request->get('id_empresa');

                    // Verificar si id_operador es null y actualizar id_proveedor
                    if (is_null($asignacion->id_operador)) {
                        // Obtener el id_proveedor actual
                        $idProveedorAnterior = $asignacion->id_proveedor;

                        // Obtener el correo del proveedor anterior
                        $correoProveedor = DB::table('proveedores')
                            ->where('id', $idProveedorAnterior)
                            ->value('correo');

                        // Buscar el nuevo id_proveedor en la nueva empresa
                        $nuevoIdProveedor = DB::table('proveedores')
                            ->where('correo', $correoProveedor)
                            ->where('id_empresa', $nuevoIdEmpresa)
                            ->value('id');

                        if ($nuevoIdProveedor) {
                            // Actualizar id_proveedor y id_empresa
                            DB::table('asignaciones')
                                ->where('id_contenedor', '=', $contenedor->id)
                                ->update([
                                    'id_empresa' => $nuevoIdEmpresa,
                                    'id_proveedor' => $nuevoIdProveedor
                                ]);
                        }else{
                            $ProveedorAnterior = DB::table('proveedores')
                            ->where('id', $idProveedorAnterior)
                            ->first();

                            $proveedor = new Proveedor;
                            $proveedor->nombre = $ProveedorAnterior->nombre;
                            $proveedor->correo = $ProveedorAnterior->correo;
                            $proveedor->telefono = $ProveedorAnterior->telefono;
                            $proveedor->id_empresa = $request->get('id_empresa');
                            $proveedor->save();

                            DB::table('asignaciones')
                            ->where('id_contenedor', '=', $contenedor->id)
                            ->update([
                                'id_empresa' => $nuevoIdEmpresa,
                                'id_proveedor' => $proveedor->id
                            ]);
                        }
                    }

                    // Verificar si id_proveedor es null y actualizar id_operador
                    if (is_null($asignacion->id_proveedor)) {
                        // Obtener el id_operador actual
                        $idOperadorAnterior = $asignacion->id_operador;

                        // Obtener el correo del operador anterior
                        $correoOperador = DB::table('operadores')
                            ->where('id', $idOperadorAnterior)
                            ->value('correo');

                        // Buscar el nuevo id_operador en la nueva empresa
                        $nuevoIdOperador = DB::table('operadores')
                            ->where('correo', $correoOperador)
                            ->where('id_empresa', $nuevoIdEmpresa)
                            ->value('id');

                        if ($nuevoIdOperador) {
                            // Actualizar id_operador y id_empresa
                            DB::table('asignaciones')
                                ->where('id_contenedor', '=', $contenedor->id)
                                ->update([
                                    'id_empresa' => $nuevoIdEmpresa,
                                    'id_operador' => $nuevoIdOperador
                                ]);
                        }else{
                            $OperadorAnterior = DB::table('operadores')
                            ->where('id', $idOperadorAnterior)
                            ->first();

                            $proveedor = new Operador;
                            $proveedor->nombre = $OperadorAnterior->nombre;
                            $proveedor->correo = $OperadorAnterior->correo;
                            $proveedor->telefono = $OperadorAnterior->telefono;
                            $proveedor->id_empresa = $request->get('id_empresa');
                            $proveedor->save();

                            DB::table('asignaciones')
                            ->where('id_contenedor', '=', $contenedor->id)
                            ->update([
                                'id_empresa' => $nuevoIdEmpresa,
                                'id_operador' => $proveedor->id
                            ]);
                        }
                    }
                }
            }

            // Actualizar la cotización con el nuevo id_empresa y id_cliente
            $cotizaciones = DB::table('cotizaciones')
            ->where('id', $id)
            ->update([
                'id_empresa' => $nuevoIdEmpresa,
                'id_cliente' => $nuevoIdCliente
            ]);

            $contenedores = DB::table('docum_cotizacion')
            ->where('id_cotizacion',  '=', $cotizacion->id)
            ->update(['id_empresa' => $request->get('id_empresa')]);

            return redirect()->route('index.cotizaciones')
                ->with('success', 'Se ha editado sus datos con exito');
        } else {
            return redirect()->route('index.cotizaciones')
                ->with('error', 'No tiene cliente con el mismo correo a la empresa que quiere cambiar');
        }


    }
}
