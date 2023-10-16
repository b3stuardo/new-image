<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicio';
    protected $primaryKey = 'idServicio';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'tiempoEstimado'
    ];

    public function pago(){
        return $this->hasMany(Pago::class);
    }
    public function oferta() {
        return $this->belongsTo(Oferta::class);
    }
    public function cita(){
        return $this->belongsTo(Cita::class);
    }
    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
