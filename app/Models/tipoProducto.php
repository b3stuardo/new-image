<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoProducto extends Model
{
    protected $table = 'tipoproducto';
    protected $primaryKey = 'idTipoProducto';
    public $timestamps = false;

    protected $fillable = [
        'descripcion',
        'estado'
    ];

    public function producto(){
        return $this->hasOne(Producto::class);
    }
}
