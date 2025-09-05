<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'tipo_origen',
        'aula_id',
        'materia_id',
        'horario_id',
    ];

    /**
     * Una reserva pertenece a un aula.
     */
    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
    
    /**
     * Una reserva pertenece a una materia.
     */
    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    /**
     * Una reserva se realiza en un horario específico.
     */
    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }
}