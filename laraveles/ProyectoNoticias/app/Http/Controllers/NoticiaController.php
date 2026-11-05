<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::withCount('comentarios')->latest()->get();
        return view('noticias.index', compact('noticias'));
    }

    public function create()
    {
        return view('noticias.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'texto'  => 'required|string',
        ]);

        Noticia::create($validated);
        return redirect()->route('noticias.index')->with('success', 'Noticia creada con éxito.');
    }

    public function show(Noticia $noticia)
    {
        $noticia->load('comentarios');
        return view('noticias.show', compact('noticia'));
    }

    public function edit(Noticia $noticia)
    {
        if (!$noticia->esEditable()) {
            return redirect()->route('noticias.index')
                ->with('error', 'No se puede editar: la noticia lleva más de 20 minutos publicada.');
        }

        return view('noticias.edit', compact('noticia'));
    }

    public function update(Request $request, Noticia $noticia)
    {
        if (!$noticia->esEditable()) {
            return redirect()->route('noticias.index')
                ->with('error', 'Tiempo límite de edición (20 minutos) superado.');
        }

        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'texto'  => 'required|string',
        ]);

        $noticia->update($validated);
        return redirect()->route('noticias.index')->with('success', 'Noticia actualizada correctamente.');
    }

    public function destroy(Noticia $noticia)
    {
        if (!$noticia->esEliminable()) {
        return redirect()->route('noticias.index')
            ->with('error', 'No se puede borrar una noticia que contiene comentarios.');
    }

    try {
        $noticia->delete();
        return redirect()->route('noticias.index')->with('success', 'Noticia eliminada correctamente.');
    } catch (\Exception $e) {
        return redirect()->route('noticias.index')
            ->with('error', 'Ocurrió un error en la base de datos al intentar eliminar la noticia.');
    }
    }
}
