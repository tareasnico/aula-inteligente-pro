<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foco extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'ubicacion',
        'tipo',
        'intensidad',
        'aula_id',
        'estado',
    ];

    protected $casts = [
        'estado' => 'boolean',
        'intensidad' => 'integer',
    ];

    /**
     * Un foco pertenece a un aula.
     */
    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}