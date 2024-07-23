<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiciosCotizaciones extends Model
{
    use HasFactory;

    protected $table = 'servicios_cotizaciones';

    protected $fillable = [
        'id_notas_servicios',
        'id_servicios',
        'producto',
        'cantidad',
        'descuento',
        'total',
        'dimenciones_cm',
        'dimenciones_largo',
        'dimenciones_ancho',
        'precio_cm',
        'total_precio_cm',
        'material',
        'utilidad',
    ];

    public function Servicio()
    {
        return $this->belongsTo(Servicios::class, 'id_servicios');
    }
}
