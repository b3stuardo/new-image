<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model implements Authenticatable
{
    protected $table = 'usuario';
    protected $primaryKey = 'idUsuario';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido',
        'contraseña',
        'email',
        'telefono',
        'fechaNacimiento'
    ];
    
    public function cliente(){
        return $this->hasOne(Cliente::class);
    }
    public function empleado(){
        return $this->hasOne(Empleado::class);
    }
}
