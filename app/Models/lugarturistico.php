<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lugarturistico extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'ubicacion'
    ];

    public function eventos(){
        return $this->belongsToMany(evento::class,'lugaresturisticos_eventos','idLugarTuristico','id');
    }
}
