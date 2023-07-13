<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'nombre',
        'referencia',
        'precio',
        'peso',
        'id_categoria',
        'stock',
        'created_at',
        'updated_at',
    ];
    public function categorias()
    {
        return $this->hasOne(categorias::class, 'id','id_categoria');
        
    }
    
}
