<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estado';
    protected $primaryKey = 'idEstado';
    public $timestamps = false;

    protected $fillable = [
        'descripcion'
    ];

    public function cita(){
        return $this->hasOne(Cita::class);
    }
    public function recordatorio(){
        return $this->hasOne(Recordatorio::class);
    }
}
