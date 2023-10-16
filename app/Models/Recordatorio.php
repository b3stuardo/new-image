<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recordatorio extends Model
{
    protected $table = 'recordatorio';
    protected $primaryKey = 'idRecordatorio';
    public $timestamps = false;

    protected $fillable = [
        'intento'
    ];

    public function estado(){
        return $this->belongsTo(Estado::class);
    }
    public function cita(){
        return $this->belongsTo(Cita::class);
    }
}
