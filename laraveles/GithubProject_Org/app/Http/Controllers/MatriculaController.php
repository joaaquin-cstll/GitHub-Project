<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Alumno;
use App\Models\Modulo;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;  
use Illuminate\Http\Request;
use Illuminate\View\View;

class MatriculaController extends Controller
{
    private const RULES = [
        'alumno_id' => 'required|numeric|exists:alumno,id',
        'modulo_id' => 'required|numeric|exists:modulo,id',
    ];

    private const MESSAGES = [
        'alumno_id.required' => 'El alumno es obligatorio.',
        'alumno_id.numeric' => 'El alumno no se ha seleccionado correctamente.',
        'alumno_id.exists' => 'El alumno no existe.',
        'modulo_id.required' => 'El módulo es obligatorio.',
        'modulo_id.numeric' => 'El módulo no se ha seleccionado correctamente.',
        'modulo_id.exists' => 'El módulo no existe.',
    ];

    private function getCurso(): Int {
        //si el mes es 9 o mayor año actual, sino año anterior
        if(Carbon::now()->month >= 9) {
            return Carbon::now()->year;
        } else {
            return Carbon::now()->year - 1;
        }
    }

    private function getCursoEscolar(): String {
        return $this->getCurso() . '/' . $this->getCurso() + 1;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lista = [
            'uno' => 121,
            121 => 'dos',
            'tres' => 'cuatro',
        ];
        var_dump($lista);
        foreach($lista as $elemento) {
            echo $elemento .'<br>';
        }

        foreach($lista as $indice => $elemento) {
            echo $elemento . ' está en la posición '. $indice .'<br>';
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matricula.create', [
            'alumnos' => Alumno::orderBy('apellidos')->orderBy('nombre')->get(),
            'curso_escolar' => $this->getCursoEscolar(),
            'modulos' => Modulo::pluck('nombre','id'),
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validardor
        $validator = Validator::make($request->all(), self::RULES, self::MESSAGES);
        if($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $matricula = new Matricula($request->all());
        $matricula->curso = $this->getCurso();
        dd($matricula);

        try {
            $matricula->save();
            return redirect()->route('matricula.create')->with([
                'success' => 'Matriculado Correctamente'
            ]);
        } catch(\Exception $e) {
            return back()->withInput()->withErrors([
                'error' => 'Error al matricular'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Matricula $matricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matricula $matricula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matricula $matricula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matricula $matricula)
    {
        //
    }
}
