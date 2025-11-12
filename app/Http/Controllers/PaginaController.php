<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaController extends Controller
{
    public function inicio(){

        return view('pagina.inicio');
    }

    public function letras3d(){

        return view('pagina.secciones.letras3d');
    }

    public function letreros_neon(){

        return view('pagina.secciones.neon');
    }

    public function impresion_digital(){

        return view('pagina.secciones.impresion_digital');
    }

    public function anuncios_luminosos(){

        return view('pagina.secciones.anuncios_luminosos');
    }

    public function promocionales(){

        return view('pagina.secciones.promocionales');
    }

    public function señaletica(){

        return view('pagina.secciones.señaletica');
    }

    public function vinil(){

        return view('pagina.secciones.vinil');
    }

    public function prb(){

        return view('pagina.prb');
    }

    public function prb2(){

        return view('pagina.prb2');
    }

    public function prb3(){

        return view('pagina.prb3');
    }

    public function prb4(){

        return view('pagina.prb4');
    }

}
