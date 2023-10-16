<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';
    protected $primaryKey = 'idRol';
    public $timestamps = false;

    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }
    public function especialidad(){
        return $this->belongsTo(Especialidad::class);
    }

}
