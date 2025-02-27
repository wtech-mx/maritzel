<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroCotizaciones extends Model
{
    use HasFactory;
    protected $table = 'registro_cotizacion';

    protected $fillable = [
        'id_nota_cotizacion',
        'nombre_empresa',
        'envio',
        'instalacion',
        'utilidad_porcentaje',
        'utilidad_fijo',
        'total_registro',
    ];

    public function Cotizacion()
    {
        return $this->belongsTo(Cotizaciones::class, 'id_nota_cotizacion');
    }
}
