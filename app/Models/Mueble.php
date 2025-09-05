<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mueble extends Model
{
    use HasFactory;
    protected $fillable = ['nro_inventario', 'nombre', 'estado']; // Quitamos 'estado'

    public function aulas()
    {
        return $this->belongsToMany(Aula::class)
                    ->withPivot('cantidad', 'cantidad_danada') // <-- Importante
                    ->withTimestamps();
    }
}