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
        'dimensiones',
        'price',
        'cantidad',
        'descuento',
        'total',
    ];
}
