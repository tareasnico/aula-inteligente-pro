<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'dia',
        'turno',
        'periodo',
        'hora_inicio',
        'hora_fin',
        'necesita_reserva',
    ];
}