<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comentarioevento extends Model
{
    use HasFactory;
    protected $fillable = [
        'idEventoComentario',
        'idUsuarioComentario',
        'comentario',
        'puntuacion',
    ];
}
