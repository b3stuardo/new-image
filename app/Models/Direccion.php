<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direccion';
    protected $primaryKey = 'idDireccion';
    public $timestamps = false;

    protected $fillable = [
        'zona',
        'departamento'
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

}
