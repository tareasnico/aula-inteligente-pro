<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AireAcondicionado extends Model
{
    use HasFactory;
    protected $table = 'aire_acondicionado';
    protected $fillable = ['marca_modelo', 'estado', 'mantenimiento', 'aula_id'];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}