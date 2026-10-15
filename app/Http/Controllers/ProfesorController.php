<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProfesorController extends Controller
{
    //alta del profesor
    public function create(): View
    {
        return view('profesor.create');
    }

    //elimina un profesor
    public function destroy(Profesor $profesor): RedirectResponse
    {
        $profesor->delete();
        return redirect()->route('profesor.index')
            ->with('success', 'Profesor eliminado correctamente.');
    }

    //formulario de edición
    public function edit(Profesor $profesor): View
    {
        return view('profesor.edit', ['profesor' => $profesor]);
    }

    //listado de profesores
    public function index(): View
    {
        $profesores = Profesor::all();
        return view('profesor.index', ['profesores' => $profesores]);
    }

    //guarda un profesor nuevo
    public function store(Request $request): RedirectResponse
    {
        //$fillable del modelo filtra los campos
        $profesor = Profesor::create($request->all());
        return redirect()->route('profesor.show', $profesor)
            ->with('success', 'Profesor creado correctamente.');
    }

    //ficha de un profesor
    public function show(Profesor $profesor): View
    {
        return view('profesor.show', ['profesor' => $profesor]);
    }

    //guarda los cambios
    public function update(Request $request, Profesor $profesor): RedirectResponse
    {
        $profesor->update($request->all());
        return redirect()->route('profesor.show', $profesor)
            ->with('success', 'Profesor actualizado correctamente.');
    }
}
