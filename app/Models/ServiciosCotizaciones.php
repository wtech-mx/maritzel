<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiciosCotizaciones extends Model
{
    use HasFactory;

    protected $table = 'servicios_cotizaciones';

    protected $fillable = [
        'id_nota_cotizacion',
        'id_registro',
        'id_servicios',
        'cantidad',
        'dimenciones',
        'subtotal',
        'precio',
        'total_precio',
        'mano_obra',
    ];

    public function Cotizacion(){
        return $this->belongsTo(Cotizaciones::class, 'id_nota_cotizacion');
    }

    public function Registro(){
        return $this->belongsTo(RegistroCotizaciones::class, 'id_registro');
    }

    public function Servicio(){
        return $this->belongsTo(Servicios::class, 'id_servicios');
    }
}
