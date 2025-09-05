<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    // Permitimos la asignación masiva de estos campos
    protected $fillable = [
        'nombre',
        'carrera',
        'año',
        'tipo_cursada',
        'docente_id',
        'aula_recomendada_id',
    ];

    /**
     * Una materia es impartida por un docente. (Relación N a 1)
     */
    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    /**
     * El aula recomendada para la materia. (Relación N a 1)
     */
    public function aulaRecomendada()
    {
        return $this->belongsTo(Aula::class, 'aula_recomendada_id');
    }
}