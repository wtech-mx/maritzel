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
        'origen',
        'destino',
        'tamano',
        'peso_contenedor',
        'precio_viaje',
        'burreo',
        'maniobra',
        'estadia',
        'otro',
        'fecha_modulacion',
        'fecha_entrega',
        'iva',
        'retencion',
        'estatus',
        'sobrepeso',
        'peso_reglamentario',
        'peso_kg',
        'precio_sobre_peso',
        'precio_tonelada',
        'id_banco1',
        'id_banco2',
        'id_empresa',
        'prove_restante',
        'id_cuenta_prov',
        'id_cuenta_prov2',
    ];

    public function Cliente()
    {
        return $this->belongsTo(Client::class, 'id_cliente');
    }

    public function Subcliente()
    {
        return $this->belongsTo(Subclientes::class, 'id_subcliente');
    }
    public function BancoProv()
    {
        return $this->hasOne(CuentasBancarias::class, 'id_cuenta_prov');
    }

    public function ServiciosCotizaciones()
    {
        return $this->hasOne(ServiciosCotizaciones::class, 'id_notas_servicios');
    }

}
