<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'idProducto';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'codigo',
        'precio',
        'cantidad',
        'idTipoProducto'
    ];

    public function tipoProducto(){
        return $this->belongsTo(tipoProducto::class,'idTipoProducto');
    }
    public function servicio(){
        return $this->hasMany(Servicio::class);
    }
}
