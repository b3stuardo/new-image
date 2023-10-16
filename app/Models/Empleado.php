<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';
    protected $primaryKey = 'idEmpleado';
    public $timestamps = false;

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
    public function cita(){
        return $this->hasOne(Cita::class);
    }
    public function especialidad(){
        return $this->hasMany(Especialidad::class);
    }
    public function rol(){
        return $this->hasMany(Rol::class);
    }
}
