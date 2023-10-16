<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'idCliente';
    public $timestamps = false;

    protected $fillable = [
        'nit',
        'dpi'
    ];

    public function direccion(){
        return $this->belongsTo(Direccion::class);
    }
    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
    public function cita(){
        return $this->hasOne(Cita::class);
    }
}
