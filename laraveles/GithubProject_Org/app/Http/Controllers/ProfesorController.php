<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use \Exception;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProfesorController extends Controller
{
    private const RULES = [
        'nombre'       => 'required|string|max:100|min:2',
        'apellidos'    => 'required|string|max:130|min:3',
        'especialidad' => 'required|string|max:100|min:2',
        'fecalta'      => 'nullable|date',
        'salario'      => 'nullable|numeric|gte:0|lt:1000000|decimal:0,2',
    ];

    private const MESSAGES = [
        // Nombre
        'nombre.required' => 'El nombre es obligatorio.',
        'nombre.string'   => 'El nombre debe ser una cadena de texto.',
        'nombre.max'      => 'El nombre no puede superar los 100 caracteres.',
        'nombre.min'      => 'El nombre debe tener al menos 2 caracteres.',

        // Apellidos
        'apellidos.required' => 'Los apellidos son obligatorios.',
        'apellidos.string'   => 'Los apellidos deben ser una cadena de texto.',
        'apellidos.max'      => 'Los apellidos no pueden superar los 130 caracteres.',
        'apellidos.min'      => 'Los apellidos deben tener al menos 3 caracteres.',

        // Especialidad
        'especialidad.required' => 'La especialidad es obligatoria.',
        'especialidad.string'   => 'La especialidad debe ser una cadena de texto.',
        'especialidad.max'      => 'La especialidad no puede superar los 100 caracteres.',
        'especialidad.min'      => 'La especialidad debe tener al menos 2 caracteres.',

        // Fecha de alta
        'fecalta.date' => 'La fecha de alta no es válida.',

        // Salario
        'salario.numeric' => 'El salario debe ser un número.',
        'salario.gte'     => 'El salario no puede ser negativo.',
        'salario.lt'      => 'El salario debe ser inferior a 1.000.000.',
        'salario.decimal' => 'El salario debe tener como máximo 2 decimales.',
    ];

    public function create(): View {
        return view('profesor.create', []);
    }

    public function destroy(Profesor $profesor): RedirectResponse {
        $profesor->delete();
        return redirect()->route('profesor.index');
    }

    public function edit(Profesor $profesor): View {
        return view('profesor.edit', ['profesor' => $profesor]);
    }

    public function index(): View {
        //select * from profesor
        $profesores = Profesor::all();
        return view('profesor.index', ['profesores' => $profesores]);
    }

    public function show(Profesor $profesor): View {
        return view('profesor.show', ['profesor' => $profesor]);
    }

    public function store(Request $request): RedirectResponse {
        //1º validar
        $validator = Validator::make($request->all(), self::RULES, self::MESSAGES);
        if($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        //2º guardar
        $profesor = new Profesor($validator->validated());
        try {
            $profesor->save();
        } catch(UniqueConstraintViolationException $e) {
            return back()->withInput()->withErrors([
                'error' => 'Ya existe un profesor con ese nombre y apellidos.',
            ]);
        }
        return redirect()->route('profesor.index');
    }

    public function update(Request $request, Profesor $profesor): RedirectResponse {
        //1º validar
        $validator = Validator::make($request->all(), self::RULES, self::MESSAGES);
        if($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        //2º actualizar y redirigir
        try {
            $profesor->update($validator->validated());
        } catch(UniqueConstraintViolationException $e) {
            return back()->withInput()->withErrors([
                'error' => 'Clave única duplicada'
            ]);
        } catch(Exception $e){
            echo('global');
            dd($e);
        }
        return redirect()->route('alumno.index');
    }
}
