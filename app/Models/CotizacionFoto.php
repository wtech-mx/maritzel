<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionFoto extends Model
{
    use HasFactory;
    protected $table = 'cotizaciones_fotos';

    protected $fillable = [
        'id_cotizacion',
        'id_registro',
        'foto',
    ];

    public function Cotizaciones()
    {
        return $this->belongsTo(Cotizaciones::class, 'id_cotizacion');
    }

    public function Registro()
    {
        return $this->belongsTo(RegistroCotizaciones::class, 'id_registro');
    }
}
