<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'descripcion',
        'fecha_creacion',
        'fecha modificacion',
    ];
    public function productos()
    {
        return $this->belongsTo(productos::class);
    }
    
}
