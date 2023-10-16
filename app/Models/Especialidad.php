<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'especialidad';
    protected $primaryKey = 'idEspecialidad';
    public $timestamps = false;

    protected $fillable = [
        'descripcion'
    ];

    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }
    public function rol(){
        return $this->hasOne(Rol::class);
    }
}
