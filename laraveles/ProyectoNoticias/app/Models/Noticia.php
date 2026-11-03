<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Comentario;

class Noticia extends Model
{
    protected $fillable = ['titulo', 'texto'];

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class);
    }

    // Se puede editar si lleva publicada menos de 20 minutos
    public function esEditable(): bool
    {
        return $this->created_at->diffInMinutes(now()) < 20;
    }

    // Se puede borrar solo si no tiene comentarios asociados
    public function esEliminable(): bool
    {
        return $this->comentarios()->count() === 0;
    }
}
