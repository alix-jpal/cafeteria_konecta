<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class ventas extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'id_producto',
        'cantidad',
        'precio_unidad',
        'total',
        'fecha_creacion',
    ];

    
}
