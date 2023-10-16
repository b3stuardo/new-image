<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = 'oferta';
    protected $primaryKey = 'idOferta';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descuento',
        'fechaInicio',
        'fechaFin'
    ];

    public function servicio(){
        return $this->hasOne(Servicio::class);
    }
}
