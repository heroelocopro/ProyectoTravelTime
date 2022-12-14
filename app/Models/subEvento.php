<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subEvento extends Model
{
    use HasFactory;
    protected $fillable = [
        'idEvento',
        'idLugar',
        'nombre',
        'descripcion',
        'dia',
        'horaInicio',
        'horaFinal',
        'foto'
    ];
}
