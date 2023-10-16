<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'cita';
    protected $primaryKey = 'idCita';
    public $timestamps = false;

    protected $fillable = [
        'precio'
    ];
    /*
    -->REPLANTEAR LA RELACION ENTRE RECORDATORI Y CITA <--
    public function recordatorio(){
        return $this->hasOne(Recordatorio::class);
    }
    */
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function horario(){
        return $this->belongsTo(Horario::class);
    }
    public function estado(){
        return $this->belongsTo(Estado::class);
    }
    public function empleado() {
        return $this->belongsTo(Empleado::class);
    }
}
