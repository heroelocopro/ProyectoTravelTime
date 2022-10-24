<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'fechaInicio',
        'fechaFin',
        'ciudades',
    ];

    public function lugarturisticos(){
        return $this->belongsToMany(lugarturistico::class,'lugaresturisticos_eventos','idEvento','id');
    }
}
