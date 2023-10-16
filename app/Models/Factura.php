<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'factura';
    protected $primaryKey = 'idFactura';
    public $timestamps = false;

    protected $fillable = [
        'noSerie',
        'fecha',
        'totalCobrar'
    ];

    public function pago(){
        return $this->belongsTo(Pago::class);
    }
}
