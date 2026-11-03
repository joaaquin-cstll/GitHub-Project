<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentario extends Model
{
    protected $fillable = ['noticia_id', 'mensaje', 'valoracion'];

    public function noticia(): BelongsTo
    {
        return $this->belongsTo(Noticia::class);
    }

    // Se puede borrar antes de los 3 minutos
    public function esEliminable(): bool
    {
        return $this->created_at->diffInMinutes(now()) < 3;
    }

    // Se puede editar antes de los 5 minutos
    public function esEditable(): bool
    {
        return $this->created_at->diffInMinutes(now()) < 5;
    }
}
