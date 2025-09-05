<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'ubicacion', 'capacidad'];

    // ... otras relaciones ...

    public function muebles()
    {
        return $this->belongsToMany(Mueble::class)
                    ->withPivot('cantidad', 'cantidad_danada') // <-- Importante
                    ->withTimestamps();
    }
}