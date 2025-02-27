<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cotizaciones extends Model
{
    use HasFactory;
    protected $table = 'cotizaciones';

    protected $fillable = [
        'id_cliente',
        'id_subcliente',
        'fecha',
        'subtotal',
        'iva_porcentaje',
        'iva',
        'total',
        'dinero_recibido',
        'restante',
        'descuento',
        'metodo_pago',
        'monto',
        'foto_pago',
        'metodo_pago2',
        'monto2',
        'foto_pago2',
        'factura',
        'situacion_fiscal',
        'razon_social',
        'rfc',
        'cfdi',
        'correo_fac',
        'telefono_fac',
        'direccion_fac',
        'estatus_cotizacion',
        'id_admin',
    ];

    public function Cliente()
    {
        return $this->belongsTo(Client::class, 'id_cliente');
    }

    public function Subcliente()
    {
        return $this->belongsTo(Subclientes::class, 'id_subcliente');
    }

    public function Admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }
}
