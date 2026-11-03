<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Noticia;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, Noticia $noticia)
    {
        $validated = $request->validate([
            'mensaje'    => 'required|string',
            'valoracion' => 'required|in:positivo,negativo',
        ]);

        $noticia->comentarios()->create($validated);
        return back()->with('success', 'Comentario añadido correctamente.');
    }

    public function update(Request $request, Comentario $comentario)
    {
        if (!$comentario->esEditable()) {
            return back()->with('error', 'Han pasado más de 5 minutos; ya no se puede editar este comentario.');
        }

        $validated = $request->validate([
            'mensaje'    => 'required|string',
            'valoracion' => 'required|in:positivo,negativo',
        ]);

        $comentario->update($validated);
        return back()->with('success', 'Comentario actualizado.');
    }

    public function destroy(Comentario $comentario)
    {
        if (!$comentario->esEliminable()) {
            return back()->with('error', 'Han pasado más de 3 minutos; ya no se puede eliminar este comentario.');
        }

        $comentario->delete();
        return back()->with('success', 'Comentario eliminado.');
    }
}
