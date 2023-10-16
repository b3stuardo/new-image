<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horario';
    protected $primaryKey = 'idHorario';
    public $timestamps = false;

    protected $fillable = [
        'horaInicio',
        'horaFin',
        'fecha'
    ];

    public function cita(){
        return $this->belongsTo(Cita::class);
    }
}
