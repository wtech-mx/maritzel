<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Configuracion;
use App\Models\ServiciosCotizaciones;
use App\Models\Subclientes;
use App\Models\Servicios;
use App\Models\Cotizaciones;
use App\Models\CotizacionFoto;
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

    public function create_new(){
        $clientes = Client::get();
        $servicios = Servicios::where('id_categoria', '=', '1')->orderBy('nombre', 'desc')->get();

        return view('cotizaciones.letreros.create',compact('clientes','servicios'));
    }

    public function create_vinil(){

        $clientes = Client::get();
        $servicios = Servicios::where('id_categoria', '=', '2')->orderBy('nombre', 'desc')->get();

        return view('cotizaciones.cotizaciones_vinil',compact('clientes','servicios'));
    }

    public function store(request $request){
        // Creacion de user
        $code = Str::random(8);

        $producto2 = $request->input('producto2');
        $producto = $request->input('producto');

        if($producto != NULL && $producto2 != NULL){
            $count_serv = 1 + count($producto2);
        }elseif($producto != NULL){
            $count_serv = 1;
        }elseif($producto2 != NULL){
            $count_serv = count($producto2);
        }

        if($request->get('envio') != NULL){
            $div_envio = $request->get('envio') / $count_serv;
        }else{
            $div_envio = 0;
        }

        if($request->get('instalacion') != NULL){
            $div_instalacion = $request->get('instalacion') / $count_serv;
        }else{
            $div_instalacion = 0;
        }

        $suma_indiv = $div_envio + $div_instalacion;

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
        $notas_productos->suma_indiv = $suma_indiv;
        $notas_productos->fecha = $request->get('fecha');
        $notas_productos->nota = $request->get('nota');
        $notas_productos->estatus_cotizacion = 'pendiente';
        $notas_productos->envio =  $request->get('envio');
        $notas_productos->subtotal =  $request->get('total');
        $notas_productos->iva_porcentaje =  $request->get('ivaPorcentaje');
        $notas_productos->iva_total =  $request->get('ivaTotal');
        $notas_productos->total =  $request->get('totalIva');
        $notas_productos->tipo_nota = 'Cotizacion';
        $tipoNota = $notas_productos->tipo_nota;
        $notas_productos->nombre_empresa = $request->get('nombre_empresa');
        $notas_productos->instalacion = $request->get('instalacion');
        $notas_productos->utilidad_fijo = $request->get('utilidad_fijo');
        $notas_productos->utilidad = $request->get('utilidad');
        $notas_productos->envio_externo = $request->get('envio_externo');
        $notas_productos->instalacion_aparte = $request->get('instalacion_aparte');
        $notas_productos->mensaje_envio = $request->get('mensaje_envio');
        $notas_productos->mensaje_instalacion = $request->get('mensaje_instalacion');
        $notas_productos->cantidad_letreros = $request->get('cantidad_letreros');

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

        if ($request->hasFile('foto')) {
            $files = $request->file('foto');  // Obtén todas las imágenes
            $cotizacionId = $notas_productos->id; // Supongamos que ya tienes el ID de la cotización

            foreach ($files as $file) {
                $path = public_path('/materiales');  // Directorio de almacenamiento
                $fileName = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
                $file->move($path, $fileName);  // Mueve el archivo al directorio

                // Guarda la imagen en la tabla cotizaciones_fotos
                CotizacionFoto::create([
                    'id_cotizacion' => $cotizacionId,  // ID de la cotización
                    'tipo' => '1',
                    'foto' => $fileName  // Nombre del archivo guardado
                ]);
            }
        }

        if (!empty($request->input('cantidad')) && array_filter($request->input('cantidad')) !== []) {
            $cantidad = $request->input('cantidad');
            $dimenciones = $request->input('dimenciones');
            $subtotal = $request->input('subtotal');
            $precio_cm = $request->input('precio_cm');
            $total_precio_cm = $request->input('total_precio_cm');
            $material = $request->input('material');
            $subtotalIva = $request->input('subtotalIva');
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
                $notas_inscripcion->tipo = '1';
                $notas_inscripcion->save();
            }
        }

        if (!empty($request->input('cantidad2')) && array_filter($request->input('cantidad2')) !== []) {
            $cantidad2 = $request->input('cantidad2');
            $dimenciones2 = $request->input('dimenciones2');
            $subtotal2 = $request->input('subtotal2');
            $precio_cm2 = $request->input('precio_cm2');
            $total_precio_cm2 = $request->input('total_precio_cm2');
            $material2 = $request->input('material2');
            $subtotalIva2 = $request->input('subtotalIva2');
            $nombre2 = $request->input('nombre_empresa2');

            foreach ($producto2 as $index => $campo) {
                $notas_inscripcion = new ServiciosCotizaciones;
                $notas_inscripcion->id_notas_servicios = $notas_productos->id;
                $notas_inscripcion->id_servicios = $campo;
                $notas_inscripcion->producto = $notas_inscripcion->Servicio->nombre;
                $notas_inscripcion->cantidad = $cantidad2[$index];
                $notas_inscripcion->total = $subtotal2[$index];
                $notas_inscripcion->dimenciones_cm = $dimenciones2[$index];
                $notas_inscripcion->precio_cm = $precio_cm2[$index];
                $notas_inscripcion->total_precio_cm = $total_precio_cm2[$index];
                $notas_inscripcion->material = $material2[$index];
                $notas_inscripcion->nombre = $nombre2[$index];
                $notas_inscripcion->tipo = '2';
                $notas_inscripcion->save();

                if (isset($fotos2[$index])) {
                    $file = $fotos2[$index];
                    $path = public_path('/materiales');
                    $fileName = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
                    $file->move($path, $fileName);

                    // Guarda la foto en la tabla CotizacionFoto
                    CotizacionFoto::create([
                        'id_cotizacion' => $notas_productos->id,
                        'serv_id' => $notas_inscripcion->id,
                        'tipo' => '2',
                        'foto' => $fileName,
                    ]);
                }
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
        $cotizacion_fotos = CotizacionFoto::where('id_cotizacion', $cotizacion->id)->get();

        $clientes = Client::get();
        $servicios = Servicios::orderBy('nombre', 'desc')->get();

        return view('cotizaciones.edit', compact('cotizacion', 'servicios_cotizacion', 'clientes','servicios', 'cotizacion_fotos'));
    }

    public function update(Request $request, $id)
    {
        // Buscar la cotización existente
        $notas_productos = Cotizaciones::findOrFail($id);

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

        $cantidad_letreros = $request->get('cantidad_letreros') * $request->get('total');
        $cantidad_letreros_iva = $request->get('cantidad_letreros') * $request->get('totalIva');

        $notas_productos->id_cliente =  $cliente;
        $notas_productos->fecha = $request->get('fecha');
        $notas_productos->nota = $request->get('nota');
        $notas_productos->estatus_cotizacion = 'pendiente';
        $notas_productos->envio =  $request->get('envio');
        $notas_productos->subtotal =  $cantidad_letreros;
        $notas_productos->iva_porcentaje =  $request->get('ivaPorcentaje');
        $notas_productos->iva_total =  $request->get('ivaTotal');
        $notas_productos->total =  $cantidad_letreros_iva;
        $notas_productos->tipo_nota = 'Cotizacion';
        $tipoNota = $notas_productos->tipo_nota;
        $notas_productos->nombre_empresa = $request->get('nombre_empresa');
        $notas_productos->instalacion = $request->get('instalacion');
        $notas_productos->utilidad_fijo = $request->get('utilidad_fijo');
        $notas_productos->utilidad = $request->get('utilidad');
        $notas_productos->envio_externo = $request->get('envio_externo');
        $notas_productos->instalacion_aparte = $request->get('instalacion_aparte');
        $notas_productos->mensaje_envio = $request->get('mensaje_envio');
        $notas_productos->mensaje_instalacion = $request->get('mensaje_instalacion');
        $notas_productos->cantidad_letreros = $request->get('cantidad_letreros');
        $notas_productos->update();

        // Eliminar productos anteriores asociados a la cotización
        ServiciosCotizaciones::where('id_notas_servicios', $id)->delete();

        if ($request->hasFile('foto')) {
            $files = $request->file('foto');  // Obtén todas las imágenes
            $cotizacionId = $notas_productos->id; // Supongamos que ya tienes el ID de la cotización

            foreach ($files as $file) {
                $path = public_path('/materiales');  // Directorio de almacenamiento
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $file->move($path, $fileName);  // Mueve el archivo al directorio

                // Guarda la imagen en la tabla cotizaciones_fotos
                CotizacionFoto::create([
                    'id_cotizacion' => $cotizacionId,  // ID de la cotización
                    'foto' => $fileName  // Nombre del archivo guardado
                ]);
            }
        }

        if ($request->has('cantidad') || $request->has('m2')) {
            $cantidad = $request->input('cantidad');
            $producto = $request->input('producto');
            $dimenciones = $request->input('dimenciones');
            $subtotal = $request->input('subtotal');
            $precio_cm = $request->input('precio_cm');
            $total_precio_cm = $request->input('total_precio_cm');
            $material = $request->input('material');
            $subtotalIva = $request->input('subtotalIva');
            $largo = $request->input('largo');
            $ancho = $request->input('ancho');
            $m2 = $request->input('m2');
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
                $notas_inscripcion->largo = $largo[$index];
                $notas_inscripcion->ancho = $ancho[$index];
                $notas_inscripcion->m2 = $m2[$index];
                $notas_inscripcion->total_instalacion = $total_instalacion[$index];
                $notas_inscripcion->save();
            }
        }

        return redirect()->back()->with('success', 'Se ha actualizado con éxito');
    }

    public function eliminarImagen(Request $request){
        $request->validate([
            'id' => 'required|exists:cotizaciones_fotos,id'
        ]);

        $foto = CotizacionFoto::find($request->id);

        // Ruta de la imagen en el servidor
        $rutaImagen = public_path('materiales/' . $foto->foto);

        // Eliminar la imagen del servidor
        if (file_exists($rutaImagen)) {
            unlink($rutaImagen);
        }

        // Eliminar el registro de la imagen en la base de datos
        $foto->delete();

        return response()->json(['success' => 'Imagen eliminada con éxito']);
    }

    public function imprimir($id){
        $today =  date('d-m-Y');

        $nota = Cotizaciones::find($id);

        $fotos = CotizacionFoto::where('id_cotizacion', $id)->get();

        $nota_productos = ServiciosCotizaciones::where('id_notas_servicios', $id)
            ->where('tipo', '1')
            ->get()
            ->groupBy('id_notas_servicios')  // Agrupa por id_servicios
            ->map(function ($group) {   // Mapea cada grupo de servicios
                return [
                    'id_notas_servicios' => $group->first()->id_notas_servicios,
                    'cantidad' => $group->sum('cantidad'),
                    'total' => $group->sum('total'),
                    'total_iva' => $group->sum('total_iva'),
                    'subtotal_iva' => $group->sum('subtotal_iva'),
                    'Servicio' => $group->first()->Servicio,  // Obtén el primer servicio del grupo para los datos relacionados
                    'imagen' => $group->first()->Servicio->imagen,
                ];
            });

        $nota_productos2 = ServiciosCotizaciones::where('id_notas_servicios', $id)->where('tipo', '2')->get();

        $pdf = \PDF::loadView('cotizaciones.pdf', compact('nota', 'today', 'nota_productos', 'fotos', 'nota_productos2'))->setPaper([0, 0, 700, 600], 'landscape');

        if($nota->folio == null){
            $folio = $nota->id;
        }else{
            $folio = $nota->folio;
        }
       return $pdf->stream();

    }

    public function create_personalizado(){

        $clientes = Client::get();
        $servicios = Servicios::where('id_categoria', '=', '1')->orderBy('nombre', 'desc')->get();

        return view('cotizaciones.personalizado.create',compact('clientes','servicios'));
    }

    // ============================================== P E R S O N A L I Z A D O ==============================================
        public function store_personalizado(request $request){
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
            $notas_productos->subtotal =  $request->get('total');
            $notas_productos->iva_porcentaje =  $request->get('ivaPorcentaje');
            $notas_productos->iva_total =  $request->get('ivaTotal');
            $notas_productos->total =  $request->get('totalIva');
            $notas_productos->tipo_nota = 'Personalizado';
            $tipoNota = $notas_productos->tipo_nota;
            $notas_productos->nombre_empresa = $request->get('nombre_empresa');
            $notas_productos->instalacion = $request->get('instalacion');
            $notas_productos->utilidad_fijo = $request->get('utilidad_fijo');
            $notas_productos->utilidad = $request->get('utilidad');
            $notas_productos->envio_externo = $request->get('envio_externo');
            $notas_productos->instalacion_aparte = $request->get('instalacion_aparte');
            $notas_productos->mensaje_envio = $request->get('mensaje_envio');
            $notas_productos->mensaje_instalacion = $request->get('mensaje_instalacion');
            $notas_productos->cantidad_letreros = $request->get('cantidad_letreros');
            $notas_productos->nota = $request->input('descripcion');

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

            if ($request->hasFile('foto')) {
                $files = $request->file('foto');  // Obtén todas las imágenes
                $cotizacionId = $notas_productos->id; // Supongamos que ya tienes el ID de la cotización

                foreach ($files as $file) {
                    $path = public_path('/materiales');  // Directorio de almacenamiento
                    $fileName = uniqid() . '_' . $file->getClientOriginalName();
                    $file->move($path, $fileName);  // Mueve el archivo al directorio

                    // Guarda la imagen en la tabla cotizaciones_fotos
                    CotizacionFoto::create([
                        'id_cotizacion' => $cotizacionId,  // ID de la cotización
                        'foto' => $fileName  // Nombre del archivo guardado
                    ]);
                }
            }

            $producto = $request->input('producto');
            $subtotal = $request->input('subtotal');
            $fotos = $request->file('foto');

            foreach ($producto as $index => $producto) {

                $servicioCotizacion = new ServiciosCotizaciones;
                $servicioCotizacion->id_notas_servicios = $notas_productos->id;
                $servicioCotizacion->producto = $producto;
                $servicioCotizacion->total = $subtotal[$index];
                $servicioCotizacion->cantidad = '1';
                $servicioCotizacion->save();
            }

            return redirect()->route('index.cotizaciones')
            ->with('success', 'Se ha creado su cotizacion con exito');
        }

        public function edit_personalizado($id){
            $cotizacion = Cotizaciones::find($id);
            $servicios_cotizacion = ServiciosCotizaciones::where('id_notas_servicios', '=', $id)->get();
            $cotizacion_fotos = CotizacionFoto::where('id_cotizacion', $cotizacion->id)->get();

            $clientes = Client::get();
            $servicios = Servicios::orderBy('nombre', 'desc')->get();

            return view('cotizaciones.personalizado.edit', compact('cotizacion', 'servicios_cotizacion', 'clientes','servicios', 'cotizacion_fotos'));
        }

        public function imprimir_personalizado($id){
            $today =  date('d-m-Y');

            $nota = Cotizaciones::find($id);

            $fotos = CotizacionFoto::where('id_cotizacion', $id)->get();

            $nota_productos = ServiciosCotizaciones::where('id_notas_servicios', $id)->get();

            $pdf = \PDF::loadView('cotizaciones.personalizado.pdf', compact('nota', 'today', 'nota_productos', 'fotos'))->setPaper([0, 0, 700, 600], 'landscape');

            if($nota->folio == null){
                $folio = $nota->id;
            }else{
                $folio = $nota->folio;
            }
           //  return $pdf->stream();

           return $pdf->stream();

        }
    // ============================================== E N D  P E R S O N A L I Z A D O ==============================================
}
