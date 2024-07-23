<?php

namespace App\Http\Controllers;
use App\Models\Categorias;

use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use DB;

class CategoriasController extends Controller
{
    public function index()
    {

        $Categorias = Categorias::orderBy('created_at', 'desc')->get();

        return view('categorias.index', compact('Categorias'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nombre' => 'required',
        ]);

        $categorias = new Categorias;

        $categorias->nombre = $request->get('nombre');
        $categorias->precio_cm = $request->get('precio_cm');
        $categorias->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->back()
            ->with('success', 'Cliente created successfully.');

    }

    public function update(Request $request, Categorias $id)
    {

        $id->update($request->all());

        Session::flash('edit', 'Se ha editado sus datos con exito');
        return redirect()->route('index.categorias')
            ->with('success', 'Categorias updated successfully');
    }
}
