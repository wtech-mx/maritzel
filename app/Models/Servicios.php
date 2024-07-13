<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;

    protected $table = 'servicios';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio_rebajado',
        'precio_normal',
        'imagen',
        'id_categoria',
    ];

    public function Categoria()
    {
        return $this->belongsTo(Categorias::class, 'id_categoria');
    }
}
