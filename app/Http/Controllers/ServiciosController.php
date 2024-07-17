<?php

namespace App\Http\Controllers;
use App\Models\Categorias;
use App\Models\Servicios;

use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use DB;

class ServiciosController extends Controller
{
    public function index()
    {

        $Categorias = Categorias::orderBy('nombre', 'desc')->get();
        $servicios = Servicios::orderBy('nombre', 'desc')->get();

        return view('servicios.index', compact('Categorias','servicios'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nombre' => 'required',
        ]);


        $Servicios = new Servicios;

        $Servicios->nombre = $request->get('nombre');
        $Servicios->descripcion = $request->get('descripcion');
        $Servicios->precio_normal = $request->get('precio_normal');
        $Servicios->precio_rebajado = $request->get('precio_rebajado');
        $Servicios->id_categoria = $request->get('id_categoria');
        if ($request->hasFile("imagen")) {
            $file = $request->file('imagen');
            $path = public_path() . '/imagen_serv';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $Servicios->imagen = $fileName;
        }
        $Servicios->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->back()
            ->with('success', 'Cliente created successfully.');

    }

    public function update(Request $request, Servicios $id)
    {

        $Servicios = Servicios::find($id);
        $Servicios->nombre = $request->get('nombre');
        $Servicios->descripcion = $request->get('descripcion');
        $Servicios->precio_normal = $request->get('precio_normal');
        $Servicios->precio_rebajado = $request->get('precio_rebajado');
        $Servicios->id_categoria = $request->get('id_categoria');
        if ($request->hasFile("imagen")) {
            $file = $request->file('imagen');
            $path = public_path() . '/imagen_serv';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $Servicios->imagen = $fileName;
        }
        $Servicios->update();

        Session::flash('edit', 'Se ha editado sus datos con exito');
        return redirect()->route('index.servicios')
            ->with('success', 'servicios updated successfully');
    }
}
