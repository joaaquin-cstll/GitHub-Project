<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AlumnoController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View{
        return view('index', []);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno){
        return redirect() ->route('index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno): View{
        return view('index', []);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View{
        return view('index', []);
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno): View{
        //
        return view('index', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        //
        return redirect() ->route('index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno){
        //
        return redirect() ->route('index');
    }
}
