<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pago';
    protected $primaryKey = 'idPago';
    public $timestamps = false;

    protected $fillable = [
        'fecha',
        'montoTotal'
    ];

    public function factura(){
        return $this->hasOne(Factura::class);
    }

    public function servicio(){
        return $this->belongsTo(Servicio::class);
    }

}
